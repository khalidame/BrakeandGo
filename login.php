<?php require_once 'includes/header.php' ?>


<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-sm-12 col-md-8">

      <form action="login-submit.php" method="post" class="text-center border border-light px-3 pt-3">

        <p class="h4 mb-4">Sign in</p>

        <input type="text" id="username" name="username" class="form-control mb-4" placeholder="username*">

        <input type="password" id="password" name="password" class="form-control mb-4" placeholder="Password*">

        <button class="btn btn-primary my-4 btn-block" type="submit">Sign in</button>
        <p>If you don't have an account, please <a href="registration.php"> click here</a> to register</p>
      </form>
      
      <div class="row justify-content-center px-3">
        <div class="col text-center">
          <p>If you forgot your username/password please reset below </p>
        </div>
        <div>
          <button class="btn border border-color mb-3 mr-3">Forgot Username</button>
          <button class="btn border border-color mb-3">Forget Password</button>
        </div>
      </div>
    </div>
  </div>