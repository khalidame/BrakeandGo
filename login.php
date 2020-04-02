<?php require_once 'includes/header.php';
?>



<div class="container-fluid">
  <div class="row w-75">
    <div class="col w-50">
  
    
<form action="login-submit.php" method="post" class="text-center border border-light p-5">

    <p class="h4 mb-4">Sign in</p>

    <input type="text" id="username" name="username"  class="form-control mb-4" placeholder="username">

    <input type="password" id="password" name="password" class="form-control mb-4" placeholder="Password">


  
    <button class="btn btn-info my-4 btn-block" type="submit">Sign in</button>
    <p>If you don't have an account, please <a href="registration.php">click here</a></p>

</form>
</div>
</div>
</div>