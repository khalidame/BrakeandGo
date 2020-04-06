<?php require_once 'includes/functions.php' ?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="Styles/Stylesheet.scss" />
</head>

<div class="container">

  <ul class="nav justify-content-end">
    <li class="nav-item">
      <?php if (isLoggedIn()) : ?>

        <div class="nav-link">
          <span>Hi, <?= $_SESSION['username'] ?>!</span>

          <a href="logout.php">Logout</a>
        </div>
      <?php else : ?>
        <a class="nav-link" href="login.php"> Login</a>
      <?php endif; ?>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Cart</a>
    </li>
  </ul>

  <div class="desktop">
    <nav class="navbar navbar-expand-lg bg-primary">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">  
            <a class="navbar-brand" name="logo" href="index.php">
        <img src='images/logo2.png'/></a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav mr-5" href="parts.php">Parts </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav mr-5" href="tools.php">Tools & Equipements</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav mr-5" href="oil-fluid.php">Oil & Fluids</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav mr-5" href="contact.php">Contact us</a>
          </li>
        </ul> 
    </nav>
  </div>

  <div class="mobile" class="container justify-content-center">
    <div class="row">
      <div class="col">
        <button onclick= "window.location.href = 'index.php';" class="btn btn-primary btn-block border border-color"><img src='images/logo2.png'/></button>
      </div>
    </div>
    <div class="row">
      <div class="col">
      <button onclick= "window.location.href = 'parts.php';" class="btn btn-primary btn-block border border-color">Parts</button>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <button onclick= "window.location.href = 'tools.php';" class="btn btn-primary btn-block border border-color">Tools & Equipements</button>

      </div>
    </div>
    <div class="row">
      <div class="col">
        <button onclick= "window.location.href = 'oil-fluid.php';" class="btn btn-primary btn-block border border-color">Oil & Fluids</button>

      </div>
    </div>
    <div class="row">
      <div class="col">
        <button onclick= "window.location.href = 'contact.php';" class="btn btn-primary btn-block border border-color">Contact us</button>

      </div>
    </div>
  </div>

</div>

</html>