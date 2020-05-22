<nav>
    <a href="./">Return to home</a>
</nav>

<form action="changepass-access.php" method="post">
<fieldset>
    <legend>Change Password</legend>
    <div>
        <label for="username">Your Username:</label>
        <input type="text" name="username" id="username">
    </div>
    <div>
        <label for="newpassword">New Password:</label>
        <input type="password" name="newpassword" id="newpassword">
    </div>
    <div>
        <label for="confirmnew">Confirm New Password:</label>
        <input type="password" name="confirmnew" id="confirmnew">
    </div>
    <div>
        <button type="submit">Create your New Password</button>
    </div>
</fieldset>
</form>
<?php require_once 'includes/footer.php' ?>
