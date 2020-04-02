<?php require_once 'includes/header.php';
require_once 'includes/functions.php';

$msg = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $msg = loginSubmit(); 
}
?>

<?php if ($msg): ?>
    <p><?=$msg?></p>
<?php endif; ?>
There was a problem, please click on the Log in tab again.