
<?php 
require_once 'includes/header.php';
require_once 'includes/functions.php';
unset($_SESSION['cart']);
?>

<div class="container">

<div class="placeorder content-wrapper">
    <h1>Your Order Has Been Placed</h1>
    <p>Thank you for ordering with us, we'll contact you by email with your order details.</p>
</div> 

<div class="row justify-content-center px-3">
     <div class="col text-center">
         <p><a href="index.php"> Click here</a> to go back to home page</p>
     </div>
</div>

</div>



<?=template_footer()?>


