<?php 
require_once 'includes/functions.php';

$msg = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $_SESSION['validation_errors'] = '';
  
  if ( isset($_SESSION["reset_pwd_username"]) && !empty($_SESSION["reset_pwd_username"])){
    $msg = updatePwd(); 

    if ( isset($msg) && !empty($msg)){
      $_SESSION['validation_errors'] = $msg;
      header('Location: reset_pwd_step_3.php');
      exit;
    }else{
      $_SESSION["reset_pwd_username"] = '';
      header('Location: login.php');
      exit;
    }

  }
  else{


    $msg = resetPwdSubmit(); 

    if ( isset($msg) && !empty($msg)){
        $_SESSION['validation_errors'] = $msg;
        header('Location: reset_pwd_step_2.php');
        exit;
    }else{

      header('Location: reset_pwd_step_3.php');
      exit;
    }

  }
}
else{
    header('Location: index.php');
    exit;
}
?>