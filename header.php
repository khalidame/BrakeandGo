<?php 
require_once 'includes/functions.php' ;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



$pdo = pdo_connect_mysql();
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
  <link rel="stylesheet" type="text/css" href="Styles/Stylesheet.css" />
  <link rel="stylesheet" type="text/css" href="Styles/products.css" />
  
</head>

<div class="container">
<div>
<ul class="nav justify-content-end login-link">
      

      <li class="nav-item">

        <div class="nav-link link-icons">
          <div class="search">
            <form action="parts.php" method="get" >
              <input type="text" name="search" class="form-control" placeholder="Search...">
              <button class="btn" type="submit"><i class="fas fa-search"></i></button>              
            </form>
            
          </div>

          
          <a class="nav-link" id="cart" href="cart.php">
            <i class="fas fa-shopping-cart"></i>
            <span>
                  <?php
                    if (isset($_SESSION["cart"])) {
                      echo $num_items_in_cart = count($_SESSION["cart"]);
                    } else {
                      echo $num_items_in_cart = 0;
                    }
                    ?>

            </span>
          </a>
        </div>
        

      </li>
      <li class="nav-item">
        <?php if (isLoggedIn()) : ?>
          <div class="nav-link">
            <span>Hi, <?= $_SESSION['login_username'] ?>!</span>
            <a href="logout.php">Logout</a>
          </div>
        <?php else : ?>
          <a class="nav-link" name="log" href="login.php"> Login</a>
        <?php endif; ?>
      </li>

      

    </ul>
</div>
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" name="logo" href="index.php">
      <img src='images/logo2.png' />
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <?php if (isLoggedIn() && isAdminLoggedIn()) : ?>
          <li class="nav-item">
            <a class="nav-link mr-5" href="admin.php">Admin </a>
          </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link mr-4" href="parts.php">Parts </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mr-4" href="about.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mr-4" href="contact.php">Contact us</a>
        </li>

      </ul>
    </div>


    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>

 

</div>

</html>