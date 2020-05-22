
<?php require_once 'includes/functions.php' ; ?>
<?php 
    if ( isset($_SESSION["reset_pwd_username"]) && !empty($_SESSION["reset_pwd_username"])){
      
      $username = $_SESSION["reset_pwd_username"];
      
    }
    else
    {
      $_SESSION['validation_errors'] = 'Session is invalid';
        header('Location: reset_pwd_step_1.php');
        exit;
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

        <p class="h4 mb-4">Reset password - step 3/3</p>

        <input type="text" id="username" name="username" class="form-control mb-4" value="<?php echo $username ?>" disabled>
        <div class="form-row mb-4">
            <div class="col">
                <input type="password" id="password" name="password" class="form-control mb-4" placeholder="Password*" required>
            </div>
            <div class="col">
                <input type="password" id="confirm" name="confirm" class="form-control mb-4" placeholder="Confirm password*" required>
            </div>
            <input type="hidden" id="username" name="username" class="form-control mb-4" value="<?php echo $username ?>">
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

        <button class="btn btn-primary my-4 btn-block" type="submit">Reset password</button>
      </form>
    </div>
  </div>
</div>
</body>
<?=template_footer()?>
</html>