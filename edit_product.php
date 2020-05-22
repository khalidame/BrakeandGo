<?php
require_once 'includes/header.php';
$name='';
$desc='';
$price='';
$discount_price='';
$quantity='';
$img='';
$id='';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Prepare statement and execute, prevents SQL injection
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
  
    $stmt->execute([$_GET['id']]);
   
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
  
    if (!$product) {
    
        die ('Part does not exist!');
    }

    $name=$product['name'];
    $desc=$product['desc'];
    $price=(double)$product['price'];
    $discount_price=$product['rrp'];
    $quantity=$product['quantity'];
    $img=$product['img'];
    $id = $product['id'];
} 
?>


<div class="container products content-wrapper">
    <div class="row home-body justify-content-center">
        <div class="col-sm-12 col-md-8">
            <form action="save_product.php" method="post" class="text-center border border-light px-2 pt-3" enctype="multipart/form-data">
                <p class="h4 mb-4">Add/Edit Part</p>
                <div class="form-row mb-4">
                    <div class="col">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="name">Name*</span>
                            </div>
                            <div class="custom-file">
                                <input type="text" id="name" name="name" value="<?=$name?>" class="form-control" required placeholder="Name*">
                            </div>
                        </div>
                        
                    </div>                    
                </div>
                <div class="form-row mb-4">
                    <div class="col">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="desc">Description*</span>
                            </div>
                            <div class="custom-file">
                            <input type="text" id="desc" name="desc" value="<?=$desc?>" class="form-control" required placeholder="Description*">
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <div class="form-row mb-4">
                    <div class="col">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="price">Price*</span>
                            </div>
                            <div class="custom-file">
                                <input type="number" step="any" d="price" name="price" value="<?=$price?>" class="form-control" required placeholder="Price*">
                            </div>
                        </div>
                        
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="discount_price">New Price</span>
                            </div>
                            <div class="custom-file">
                            <input type="number" step="any" id="discount_price" name="discount_price" value="<?=$discount_price?>" class="form-control" placeholder="discount_price">
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="col">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="quantity">Quantity*</span>
                            </div>
                            <div class="custom-file">
                                <input type="number" step="any" id="quantity" name="quantity" value="<?=$quantity?>" class="form-control" required placeholder="Quantity*">
                            </div>
                        </div>
                        
                    </div>
                    <div class="col">
                        <div class="input-group">    
                            <div class="custom-file">
                                <input type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control" id="img" name='img'
                                aria-describedby="img">
                                
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-row mb-4">
                    
                        <?php 
                            if ( isset($_SESSION['validation_errors']) && !empty($_SESSION['validation_errors'])){
                                echo '<div class="col alert alert-danger"><span class="warning">';
                                 print_r($_SESSION['validation_errors']);
                                echo '</span></div>';
                                cleanUpSession();
                            }
                        ?>
                    
                    
                </div>
                <input type="hidden" id="id" name="id" value="<?=$_GET['id']?>">
                <input type="hidden" id="img_name" name="img_name" value="<?=$img?>">
                <button class="btn btn-primary btn-block my-4" type="submit">Save</button>
            </form>

            <div class="row justify-content-center px-3">
                <div class="col text-center">
                    <p>Want to go back to Parts Management Page? <a href="admin.php"> click here</a> </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?=template_footer()?>