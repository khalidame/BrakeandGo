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

      <form action="login-submit.php" method="post" class="text-center border border-light px-2 pt-3">

        <p class="h4 mb-4">Sign in</p>

        <input type="text" id="username" name="username" value="<?= isset($_SESSION['reset_username_username']) ? $_SESSION['reset_username_username']: '';?>" class="form-control mb-4" placeholder="Username*">

        <input type="password" id="password" name="password" class="form-control mb-4" placeholder="Password*">

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

        <button class="btn btn-primary my-4 btn-block" type="submit">Sign in</button>
        <p>New to Brake & Go?<a href="registration.php"> Click here</a> to Register</p>
      </form>
      
      <div class="row justify-content-center px-3">
        
          <button class="btn border border-color mb-3 mr-2">
            <a href="reset_username_step_1.php">Forgot Username</a>    
          </button>
          <button class="btn border border-color mb-3">
            <a href="reset_pwd_step_1.php">Forget Password</a>           
          </button>

      </div>
    </div>
  </div>
</div>
</body>
<?=template_footer()?>
</html>