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
        <div class='container' >
            
  <div class="row home-body">
    <div class="col-xm-12 col-lg-8">

      <form action="login-submit.php" method="post" class="text-center border border-light px-2 pt-3">

        <p class="h4 mb-4">Sign in</p>

        <input type="text" id="username" name="username" class="form-control mb-4" placeholder="Username*">

        <input type="password" id="password" name="password" class="form-control mb-4" placeholder="Password*">

        <button class="btn btn-primary my-4 btn-block" type="submit">Sign in</button>
        <p>Or please <a href="registration.php"> click here</a> to register</p>
      </form>
      
      <div class="row justify-content-center px-3">
        
          <button class="btn border border-color mb-3 mr-2">Forgot Username</button>
          <button class="btn border border-color mb-3">Forget Password</button>
       
      </div>
    </div>
  </div>
</div>
</body>
</html>