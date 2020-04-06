
<?php require_once 'includes/header.php'?>


<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-sm-12 col-md-8">
    
<form action="login-submit.php" method="post" class="text-center border border-light px-3 py-3">

    <p class="h4 mb-4">Sign in</p>

    <input type="text" id="username" name="username"  class="form-control mb-4" placeholder="username">

    <input type="password" id="password" name="password" class="form-control mb-4" placeholder="Password">
  
    <button class="btn btn-primary my-4 btn-block" type="submit">Sign in</button>
    <p>If you don't have an account, please click below</p>
   
</form>
<button class="btn border border-color btn-block my-4" type="submit"><a href="registration.php">Sign up</a></button>
</div>
</div>
</div>
