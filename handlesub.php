<?php
require_once 'includes/functions.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id = '';
    $name = $_POST['name'];
    $code = $_POST['code'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $rrp = $_POST['rrp'];
    $quantity = 1; //however much the default stock should be
    //$img = $_POST['img'];  Left this out because it didn't work for me
    $date_added = null; // Added in, probably default to current timestamp
    
    //Database magic goes here
    //Basic SQL insert goes here

} else {
    //header('Location: index.php');
    echo 'this didnt work';
}
?>
<?php if(!empty($message)): ?>
    <p style="color:red"><?=$message?></p> 
<?php endif; ?>
<a href="createpart.php">Go Back</a>
