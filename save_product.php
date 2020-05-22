<?php require_once 'includes/functions.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $msg = saveProduct(); 
    if ( isset($msg) && !empty($msg)){
        $_SESSION['validation_errors'] = $msg;
        header('Location: edit_product.php');
        exit;
    }
    else{
        $_SESSION['save_success'] = 'Product saved successfuly';
        header('Location: admin.php');
        exit;
    }
    
}
else{
    if (is_numeric($_GET['id'])) {
        
        removeProduct();

        $_SESSION['save_success'] = 'Product removed successfuly';
        header('Location: admin.php');
        exit;
    } 
}
