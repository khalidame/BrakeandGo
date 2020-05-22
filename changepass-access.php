<?php
require_once 'includes/functions.php';
$msg = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $msg = changepassAccess(); 
}
?>
Oh no! Sorry, there was a problem. Please try again. <a href="login.php">Return to home</a>
<?php if ($msg): ?>
    <p><?=$msg?></p>
<?php endif; ?>
