<?php 
require_once 'includes/functions.php';

$msg = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $msg = loginSubmit(); 

    if ( isset($msg) && !empty($msg)){
        $_SESSION['validation_errors'] = $msg;
        header('Location: login.php');
        exit;
    }else{

        if (isset($_SESSION['to_be_redirectted_to_placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            unset($_SESSION['to_be_redirectted_to_placeorder']);
            header('Location: placeorder.php');
            exit;
        }
        else{
            header('Location: parts.php');
            exit;
        }
    }
}
else{
    header('Location: index.php');
    exit;
}
?>