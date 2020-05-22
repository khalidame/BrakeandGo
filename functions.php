<?php
session_start();
// database instance access, connect to db
function pdo_connect_mysql()
{
    // Update the details below with your MySQL details
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'mydb';
    try {
        return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
        // If there is an error with the connection, stop the script and display the error.
        echo $exception;
        die('Failed to connect to database!');
    }
}

//
// function getConnection() {
//      // new mysqli(host, user, pwd, db)
//     $conn = new mysqli('localhost','root','mydb');

//     if ($conn->connect_error) {
//         exit("Connect Error ($conn->connect_errno) $conn->connect_error)");
//     }
//     return $conn;
// }

// function getResult(string $sql) {
//     $conn = pdo_connect_mysql();
//     $result = $conn->query($sql);

//     if (!$result) {
//         exit("Query error: $conn->errorInfo()");
//     }

//     return $result;
// }

function regSubmit()
{
    // define('DUP_KEY_CODE', 1062);
    // get form data
    $first_name = $_POST['First_name'];
    $last_name = $_POST['Last_name'];
    $email = $_POST['Email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $security_question = $_POST['security_question'];
    $security_answer = $_POST['security_answer'];

    // save data for a better users experience used in case of error of form validation during post back
    $_SESSION['First_name'] = $first_name;
    $_SESSION['Last_name'] = $last_name;
    $_SESSION['Email'] = $email;
    $_SESSION['username'] = $username;
    $_SESSION['security_question'] = $security_question;
    $_SESSION['security_answer'] = $security_answer;


    // validate
    if (
        empty($first_name) || empty($last_name) || empty($username) || empty($password) || empty($confirm)
        || empty($security_question) || empty($security_answer)
    ) {
        return 'All fields required';
    }


    if ($password !== $confirm) {
        return 'Passwords do not match';
    }

    if (isEmailAlreadyUsed($email)) {
        return 'Email already used!';
    }

    if (isUsernameAlreadyUsed($username)) {
        return 'Username already used!';
    }

    // password encryption in the db
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $hashanswer = password_hash($security_answer, PASSWORD_BCRYPT);

    // declare and initialize a variable
    $sql = "INSERT INTO user(First_name, Last_name, Email, username, password,security_question,security_answer) 
        VALUES( '$first_name', '$last_name', '$email', '$username', '$hash','$security_question','$hashanswer')";


    $conn = pdo_connect_mysql();
    //inserting data into db
    $result = $conn->query($sql);

    // connection db error
    if (!$result) {
        return $conn->errorInfo();
    }
}

// update password function
function updatePwd()
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    // validate
    if (empty($username) || empty($password) || empty($confirm)) {
        return 'All fields required';
    }


    if ($password !== $confirm) {
        return 'Passwords do not match';
    }

    $hash = password_hash($password, PASSWORD_BCRYPT);

    $sql = "UPDATE user SET password = '$hash' WHERE username = '$username'";

    $conn = pdo_connect_mysql();
    $result = $conn->query($sql);

    if (!$result) {
        return $conn->errorInfo();
    }
}

// log in function with post to evoid security breach,
function loginSubmit()
{
    // form data
    $username = $_POST['username'];
    $password = $_POST['password'];


    $_SESSION['username'] = $username;

    if (empty($username) || empty($password)) {
        return 'All fields required';
    }


    $conn = pdo_connect_mysql();
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = $conn->query($sql);

    if (!$result) {
        return $conn->errorInfo();
    }

    if ($result->rowCount() === 0) {
        return 'User not found';
    }

    $user = $result->fetchObject();

    if (!password_verify($password, $user->password)) {
        return 'Invalid username or password';
    }


    $_SESSION['login_username'] = $user->username;
    $_SESSION['isAdmin'] = $user->IsAdmin;
}

function getsecurityQuestion($username, $email)
{
    $conn = pdo_connect_mysql();

    $sql = "SELECT * FROM user WHERE Email = '$email' AND username = '$username'";

    $result = $conn->query($sql);

    if (!$result) {
        return $conn->errorInfo();
    }

    if ($result->rowCount() === 0) {
        return 'User not found';
    }

    $user = $result->fetchObject();

    $_SESSION['security_question'] = $user->security_question;
}


function showUsername()
{
    $email = $_POST['email'];
    $answer = $_POST['security_answer'];

    if (empty($email) || empty($answer)) {
        return 'Answer is required';
    }


    $conn = pdo_connect_mysql();
    $sql = "SELECT * FROM user WHERE Email = '$email'";
    $result = $conn->query($sql);

    if (!$result) {
        return $conn->errorInfo();
    }

    if ($result->rowCount() === 0) {
        return 'User not found';
    }

    $user = $result->fetchObject();

    if (!password_verify($answer, $user->security_answer)) {
        return 'Invalid answer';
    }


    $_SESSION['reset_username_username'] = $user->username;
    $_SESSION['save_success'] = 'Your username is : ' . $user->username;
}

function resetPwdSubmit()
{
    // form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $answer = $_POST['security_answer'];

    $_SESSION['reset_pwd_username'] = $username;
    $_SESSION['reset_pwd_email'] = $email;

    if (empty($email) || empty($answer) || empty($username)) {
        return 'All fields required';
    }


    $conn = pdo_connect_mysql();
    $sql = "SELECT * FROM user WHERE Email = '$email' AND username = '$username'";
    $result = $conn->query($sql);

    if (!$result) {
        return $conn->errorInfo();
    }

    if ($result->rowCount() === 0) {
        return 'User not found';
    }

    $user = $result->fetchObject();

    if (!password_verify($answer, $user->security_answer)) {
        return 'Invalid answer';
    }
}

function removeProduct()
{
    $conn = pdo_connect_mysql();
    // Prepare statement and execute, prevents SQL injection
    $stmt = $conn->prepare('DELETE FROM products WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
}


function resetUsernameSubmit()
{
    $email = $_POST['email'];

    if (empty($email)) {
        return 'Email is required';
    }


    $conn = pdo_connect_mysql();
    $sql = "SELECT * FROM user WHERE Email = '$email'";
    $result = $conn->query($sql);

    if (!$result) {
        return $conn->errorInfo();
    }

    if ($result->rowCount() === 0) {
        return 'User not found';
    }

    $user = $result->fetchObject();

    $_SESSION['security_question_username'] = $user->security_question;
    $_SESSION['email_username'] = $user->Email;
    echo $user->Email;
}


function saveProduct()
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $discount_price = empty($_POST['discount_price']) ? 0.00 : $_POST['discount_price'];
    $img_name = $_POST['img_name'];
    $quantity = $_POST['quantity'];
    $date_added = date('Y-m-d H:i:s');
    $img = '';

    $target_dir = "imgs/";

    // validate
    if (empty($name) || empty($desc) || empty($price)) {
        return 'All fields required';
    }

    if (!!$_FILES['img']['tmp_name']) { // is the file uploaded yet?
        $img_name = basename($_FILES["img"]["name"]);

        $info = explode('.', strtolower($_FILES['img']['name'])); // whats the extension of the file

        if (move_uploaded_file($_FILES['img']['tmp_name'], $target_dir . $_FILES['img']['name'])) {
            echo 'Received file' . $_FILES['file']['name'] . ' with size ' . $_FILES['file']['size'];
        } else {
            echo 'Upload failed!';

            var_dump($_FILES['file']['error']);
        }
    }

    if (is_numeric($id)) {
        $sql = "UPDATE products SET name = '$name', `desc`='$desc',quantity= $quantity,price= $price, rrp=$discount_price, `img`='$img_name',date_added = '$date_added' WHERE id = $id;";
    } else {
        $sql = "INSERT INTO products(`name`, `desc`, `quantity`, `price`, `rrp`, `img`, `date_added`) 
        VALUES( '$name', '$desc', $quantity, $price, $discount_price, '$img_name', '$date_added');";
    }

    $conn = pdo_connect_mysql();
    $result = $conn->query($sql);

    if (!$result) {
        return $conn->errorInfo();
    }
}

function isLoggedIn(): bool
{
    return isset($_SESSION['login_username']);
}

function isAdminLoggedIn(): bool
{
    return isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == '1';
}

function cleanUpSession()
{
    $_SESSION['First_name'] = '';
    $_SESSION['Last_name'] = '';
    $_SESSION['Email'] = '';
    $_SESSION['username'] = '';
    $_SESSION['validation_errors'] = '';
    $_SESSION['save_success'] = '';
}

function isEmailAlreadyUsed($email): bool
{
    $conn = pdo_connect_mysql();
    $sql = "SELECT * FROM user WHERE Email = '$email'";
    $result = $conn->query($sql);
    $count = $result->rowCount();

    return $count > 0;
}

function isUsernameAlreadyUsed($username): bool
{
    $conn = pdo_connect_mysql();
    $sql = "SELECT id FROM user WHERE username = '$username'";
    $result = $conn->query($sql);
    $count = $result->rowCount();

    return $count > 0;
}


// $num_items_in_cart = isset($_SESSION['cart_item']) ? count($_SESSION['cart_item']) : 0;
// $total_quantity += $item["quantity"];

// $num_items_in_cart = isset($_SESSION["cart_item"]) ? count($_SESSION["cart_item"]) : 0;


// Template footer

function template_footer()
{
    $year = date('Y');
    echo '<hr/>
    <footer class="container">
        <p class="float-right"><a href="#cart">Back to top</a></p>
        <p>© ' . $year . ' Brake&Go, Inc.</p>
        <div class="row home-body justify-content-center">
      <div class="mr-4">
        <a href="mailto:brakeandgoap@gmail.com">
<img src="images/Email.png" style="width:42px;height:42px;border:0">
</div>


<div class="mr-4">
<a href="https://www.facebook.com/pg/BrakeandGoAutoParts">
  <img src="images/facebook.png" style="width:42px;height:42px;border:0">
</a>
</div>

<div class="mr-4">
<a href = "https://twitter.com/brake_go">
<img src="images/twitter.png" style="width:42px;height:42px;border:0">
</a>
</div>
</div>

    </footer>';
}

// parts
function getparts(): array
{
    $pdo = pdo_connect_mysql();
    $itemsInPage = 12;

    $active = isset($_GET['p']) && is_numeric($_GET['p']) ? (int) $_GET['p'] : 1;
    $paging = ($active - 1) * $itemsInPage;
    $search = isset($_GET['search']) ? $_GET['search'] : '';

    $stmt = $pdo->prepare("SELECT * FROM products WHERE `name` like '" . $search . "%' ORDER BY date_added DESC LIMIT " . $paging . "," . $itemsInPage);

    $stmt->execute();

    $parts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $parts;
}


function getPartsTotal()
{
    $pdo = pdo_connect_mysql();
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $parts_total = $pdo->query("SELECT * FROM products WHERE `name` like '" . $search . "%'")->rowCount();

    return $parts_total;
}
