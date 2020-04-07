<?php require_once 'includes/functions.php' ?>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="Styles/Stylesheet.css" />

</head>

  <div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" name="logo" href="index.php">
        <img src='images/logo2.png'/> 
      </a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link mr-5" href="parts.php">Parts </a>
          </li>
          <li class="nav-item">
            <a class="nav-link mr-5" href="tools.php">Tools & Equipements</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mr-5" href="oil-fluid.php">Oil & Fluids</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mr-5" href="contact.php">Contact us</a>
          </li>
        </ul>
      </div>
      <ul class="nav justify-content-end login-link">
        <li class="nav-item">
        <?php if (isLoggedIn()): ?>
          <div class="nav-link">
              <span>Hi, <?=$_SESSION['username']?>!</span>
              <a href="logout.php">Logout</a>
        </div>
              <?php else: ?>
                <a class="nav-link" name="log" href="login.php"> Login</a>
                <?php endif; ?>  
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Cart</a>
        </li>
    </ul>
    </nav>
  </div>
</html>
