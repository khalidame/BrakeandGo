<?php require_once 'includes/functions.php';


$msg = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $msg = regSubmit();  // should redirect to login.php
    if ( isset($msg) && !empty($msg)){
        $_SESSION['validation_errors'] = $msg;
        header('Location: registration.php');
        exit;
    }
    else{
        $_SESSION['save_success'] = 'Your account has been created successfuly';
        header('Location: login.php');
        exit;
    }
    
} 

?>