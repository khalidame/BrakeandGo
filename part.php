<?php
require_once 'includes/header.php';


if (isset($_GET['id'])) {
  
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_GET['id']]);
  
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
  
    if (!$product) {     
        die ('Part does not exist!');
    }
} else {  
    die ('Part does not exist!');
}
?>

<div class='container'>
<div class="container-fluid mobile-card-container">
<div class="container product content-wrapper row">
    <img src="imgs/<?=$product['img']?>" width="500" height="500" alt="<?=$product['name']?>">
    <div class='product-details'>
        <h1 class="name"><?=$product['name']?></h1>
        <span class="price">
            &dollar;<?=$product['price']?>
            <?php if ($product['rrp'] > 0): ?>
            <span class="discount_price">&dollar;<?=$product['rrp']?></span>
            <?php endif; ?>
        </span>
        <form action="cart.php" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$product['id']?>">
            <!-- <input type="submit" value="Add To Cart"> -->
            <input class="btn btn-primary btn-block my-4" type="submit" value="Add To Cart"> 
            
        </form>
        <div class="description">
            <?=$product['desc']?>
        </div>
    </div>
</div>
</div>
</div>


<?=template_footer()?>