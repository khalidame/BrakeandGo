<?php 
require_once 'includes/functions.php';

$msg = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


  if ( isset($_SESSION["email_username"]) && !empty($_SESSION["email_username"])){
    $msg = showUsername(); 

    if ( isset($msg) && !empty($msg)){
      $_SESSION['validation_errors'] = $msg;
      header('Location: reset_username_step_2.php');
      exit;
    }else{
      $_SESSION["email_username"] = '';
      $_SESSION["security_question_username"] = '';
      header('Location: login.php');
      exit;
    }

  }
  else{


    $msg = resetUsernameSubmit(); 

    if ( isset($msg) && !empty($msg)){
        $_SESSION['validation_errors'] = $msg;
        header('Location: reset_username_step_1.php');
        exit;
    }else{

      header('Location: reset_username_step_2.php');
      exit;
    }

  }
}
else{
    header('Location: index.php');
    exit;
}
?>