<?php

require_once 'includes/header.php';

// add part to cart
if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
   
    $part_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
   
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_POST['product_id']]);
  
    $part = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($part && $quantity > 0) {
        
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($part_id, $_SESSION['cart'])) {
               
                $_SESSION['cart'][$part_id] += $quantity;
            } else {
              
                $_SESSION['cart'][$part_id] = $quantity;
            }
        } else {
            
            $_SESSION['cart'] = array($part_id => $quantity);
        }
    }
   
    header('location: cart.php');
    exit;
}




// Remove part
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {

    unset($_SESSION['cart'][$_GET['remove']]);
}


// Update part
if (isset($_POST['update']) && isset($_SESSION['cart'])) {
   
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
         
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
         
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
  
    header('location: cart.php');
    exit;
}

if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart']) && !isLoggedIn()) {
    $_SESSION['to_be_redirectted_to_placeorder'] = 'true';
    header('Location: login.php');
    exit;
}

// place order
if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    header('Location: placeorder.php');
    exit;
}

if (isset($_POST['emptycart']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    unset($_SESSION['cart']);
    header('Location: cart.php');
    exit;
}

if (isset($_POST['continueshopping'])) {
    header('Location: parts.php');
    exit;
}


// Check for parts in cart
$parts_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$parts = array();
$subtotal = 0.00;
$tax = 0.075;
$taxTotal = 0;
$total = 0;

if ($parts_in_cart) {
 
    $array_to_question_marks = implode(',', array_fill(0, count($parts_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id IN (' . $array_to_question_marks . ')');
  
    $stmt->execute(array_keys($parts_in_cart));
    
    $parts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Calculations
    foreach ($parts as $part) {
        $subtotal += $part['price'] * (int)$parts_in_cart[$part['id']];
        $taxTotal += $subtotal * $tax;
        $total = $subtotal + $taxTotal;
    }
}
?>

<div class="container cart content-wrapper">
    <h1>Shopping Cart</h1>
    <form action="cart.php" method="post">
        <table>
            <thead>
                <tr>
                    <td colspan="2">Part</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($parts)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">Empty Shopping Cart! Please Click on the button below to find the best part for your car</td>
                </tr>
                <?php else: ?>
                <?php foreach ($parts as $part): ?>
                <tr>
                    <td class="img">
                        <a href="index.php?page=part&id=<?=$part['id']?>">
                            <img src="imgs/<?=$part['img']?>" width="50" height="50" alt="<?=$part['name']?>">
                        </a>
                    </td>
                    <td>
                        <a href="index.php?page=part&id=<?=$part['id']?>"><?=$part['name']?></a>
                        <br>
                        <a href="cart.php?page=cart&remove=<?=$part['id']?>" class="remove">Remove</a>
                    </td>
                    <td class="price">&dollar;<?=$part['price']?></td>
                    <td class="quantity">
                        <input type="number" name="quantity-<?=$part['id']?>" value="<?=$parts_in_cart[$part['id']]?>" min="1" max="<?=$part['quantity']?>" placeholder="Quantity" required>
                    </td>
                    <td class="price">&dollar;<?=$part['price'] * $parts_in_cart[$part['id']]?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <?php if (!empty($_SESSION['cart'])) : ?>
        <div class="totalCalc">
        <div class="">
            <span class="text">Subtotal</span>
            <span class="price">&dollar;<?=$subtotal?></span>
        </div>
        <div class="">
            <span class="text">Tax (<?=$tax * 100?> %)</span>
            <span class="price">&dollar;<?=round($taxTotal, 2)?></span>
        </div>
        <div class="total">
            <span class="text">Total</span>
            <span class="price">&dollar;<?=round($total, 2)?></span>
        </div>
        </div>
        <?php endif; ?>
        <div class="buttons">
            <input type="submit" class="btn btn-primary " value="Continue Shopping" name="continueshopping">
            <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) : ?>
                <input class="btn btn-primary "  type="submit" value="Empty Cart" name="emptycart">
                <input class="btn btn-primary "  type="submit" value="Update" name="update">
                <input class="btn btn-primary "  type="submit" value="Place Order" name="placeorder">
            <?php endif; ?>
        </div>
    </form>
</div>

<?=template_footer()?>
