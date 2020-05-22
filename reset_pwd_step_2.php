
<?php require_once 'includes/functions.php' ; ?>
<?php 
    if ( isset($_GET["username"]) && !empty($_GET["username"]) && isset($_GET["email"]) && !empty($_GET["email"])){
      
      $username = $_GET["username"];
      $email = $_GET["email"];

      $msg = getsecurityQuestion($_GET["username"],$_GET["email"]);

      if(isset($msg) && !empty($msg)){
        $_SESSION['validation_errors'] = $msg;
        header('Location: reset_pwd_step_1.php');
        exit;
      }
    }
    else if(!isset($_SESSION['validation_errors']) && empty($_SESSION['validation_errors']))
    {
      $_SESSION['validation_errors'] = 'All fields are required';
        header('Location: reset_pwd_step_1.php');
        exit;
    }
    else{

      $username = $_SESSION['reset_pwd_username'];
      $email = $_SESSION['reset_pwd_email'];
    }
?>     

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
            src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/scss" href="Styles/Stylesheet.scss" />
</head>
<body>
<div class="container-fluid">
<?php require_once 'includes/header.php' ?>
<div class="container" >
            
  <div class="row home-body justify-content-center">
    <div class="col-xm-12 col-md-8">

      <div class="form-row mb-4 mt-5">      
              <?php 
                  if ( isset($_SESSION['save_success']) && !empty($_SESSION['save_success'])){
                      echo '<div class="col alert alert-success"><span class="success">';
                      echo $_SESSION['save_success'];
                      echo '</span></div>';
                      cleanUpSession();
                  }
              ?>        
      </div>
                  
      <form action="reset_pwd_submit.php" method="post" class="text-center border border-light px-2 pt-3">

        <p class="h4 mb-4">Reset password - step 2/3</p>


        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3">Your question : </span>
          </div>
          <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" disabled value="<?php echo $_SESSION['security_question'] ?>">
        </div>
        <input type="text" id="security_answer" name="security_answer" class="form-control mb-4" placeholder="Enter your asnwer*">
        <input type="hidden" id="username" name="username" class="form-control mb-4" value="<?php echo $username ?>">
        <input type="hidden" id="email" name="email" class="form-control mb-4" value="<?php echo $email ?>">
        <div class="form-row mb-4">                 
            <?php 
                if ( isset($_SESSION['validation_errors']) && !empty($_SESSION['validation_errors'])){
                    echo '<div class="col alert alert-danger"><span class="warning">';
                    echo $_SESSION['validation_errors'];
                    echo '</span></div>';
                    cleanUpSession();
                }
            ?>                               
        </div>

        <button class="btn btn-primary my-4 btn-block" type="submit">Next</button>
        <p>New to Brake & Go?<a href="registration.php"> Click here</a> to Register</p>
      </form>
      
      <div class="row justify-content-center px-3">
        
          <button class="btn border border-color mb-3 mr-2">
            <a href="reset_username_step_1.php">Forgot Username</a>    
          </button>
          <button class="btn border border-color mb-3">
            <a href="login.php">Log in</a>           
          </button>
       
      </div>
    </div>
  </div>
</div>
</body>
<?=template_footer()?>
</html>