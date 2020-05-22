<?php
require_once 'includes/header.php';


// Select products ordered by the date added
$stmt = $pdo->prepare("SELECT * FROM products");
$stmt->execute();

$parts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of products
$total_products = $pdo->query("SELECT * FROM products ")->rowCount();
?>
<div class="container">
<div class="container-fluid mobile-card-container">

<div class="row container parts content-wrapper">
    <h1>Parts management</h1>
    <div class="parts-wrapper">
                <div class="form-row mb-4">
                    
                        <?php 
                            if ( isset($_SESSION['save_success']) && !empty($_SESSION['save_success'])){
                                echo '<div class="col alert alert-success"><span class="success">';
                                echo $_SESSION['save_success'];
                                echo '</span></div>';
                                cleanUpSession();
                            }
                        ?>
                    
                    
                </div>
                
    <div class="buttons">
        <a href="edit_product.php?id=new">Add new part</a>      
    </div>
    
    <table class="table table-striped">
        <caption>
            <?=$total_products?> parts available
        </caption>
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">New Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Image</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parts as $part): ?>

            <tr>
                <th scope="row"><?=$part['name']?></th>
                <td><?=$part['desc']?></td>
                <td>&dollar;<?=$part['price']?></td>
                <td>&dollar;<?=$part['rrp']?></td>
                <td><?=$part['quantity']?></td>
                <td><img src="imgs/<?=$part['img']?>" width="50" height="50" alt="<?=$part['name']?>"></td>
                <td>
                    
                    <a href="save_product.php?id=<?=$part['id']?>" alt="Remove product" class="btn btn-sm btn-default text-warning"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    <a href="edit_product.php?id=<?=$part['id']?>" alt="Edit product" class="btn btn-sm btn-default text-primary"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        
            
        </tbody>
    </table>
    </div>
        
    </div>
</div>

</div>
<?=template_footer()?>