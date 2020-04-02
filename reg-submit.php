<?php require_once 'includes/functions.php';


$msg = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $msg = regSubmit();  // should redirect to login.php
} 
?>
There was a problem :  <a href="registration.php">Go back</a>
<?php if ($msg): ?>
    <p><?=$msg ?></p>
<?php endif; ?>

