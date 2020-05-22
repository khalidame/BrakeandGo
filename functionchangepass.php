function changepassAccess() {
    define('DUP_KEY_CODE', 1062);
    $username = $_POST['username'];
    $newpassword = $_POST['newpassword'];
    $confirmnew = $_POST['confirmnew'];

    //echo "<pre>";
    //print_r($_POST);
    //echo "</pre>";

    if (empty($username) || empty($newpassword) || empty($confirmnew)) {
        return 'Sorry, all fields are required';
    }

    if ($newpassword !== $confirmnew) {
        return 'Sorry, your new passwords do not match';
    }

    $hash = password_hash($newpassword, PASSWORD_BCRYPT);

    //$sql = "INSERT INTO users(username, password) 
      //  VALUES('$username','$hash')";
    
    $sql = "UPDATE users SET password = '$hash' WHERE username = '$username'";

    $conn = getConnection();
    $result = $conn->query($sql);
    //return 'password changed successfully! command is '.$sql;   <- This was for error checking

    header('Location: login.php'); 
}