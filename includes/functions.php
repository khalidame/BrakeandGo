<?php
session_start();

function getConnection() {
     // new mysqli(host, user, pwd, db)
    $conn = new mysqli('localhost','root','','mydb');

    if ($conn->connect_error) {
        exit("Connect Error ($conn->connect_errno) $conn->connect_error)");
    }
    return $conn;
}

function getResult(string $sql) {
    $conn = getConnection();
    $result = $conn->query($sql);

    if (!$result) {
        exit("Query error: $conn->error");
    }

    return $result;
}

function regSubmit() {
    define('DUP_KEY_CODE', 1062);
    // get form data
    $first_name = $_POST['First_name']; 
    $last_name = $_POST['Last_name']; 
    $phone = $_POST['Phone'];
    $email = $_POST['Email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];


     //validate
    // if (empty($first_name) || empty($last_name) || empty($username) || empty($password) || empty($confirm)) {
    //     return 'All fields required';
    //  }


    if ($password !== $confirm) {
        return 'Passwords do not match';
    }

    $hash = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO customer(First_name, Last_name, Phone, Email, username, password) 
        VALUES( '$first_name', '$last_name','$phone', '$email', '$username', '$hash')";
    
    $conn = getConnection();
    $result = $conn->query($sql);

    if (!$result) {
        if ($conn->errno === DUP_KEY_CODE) {
            return 'Username already taken';
        } else {
            return $conn->error;
        }
    }  

    header('Location: login.php'); // redirect to login page
}

function loginSubmit() {
    // form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if (empty($username) || empty($password)) {
        return 'All fields required';
    }

   
    $conn = getConnection();
    $sql = "SELECT * FROM customers WHERE username = '$username'";
    $result = $conn->query($sql);

    if (!$result) { 
        return $conn->error;
    } 
   
    if ($result->num_rows === 0) {
        return 'User not found';
    }

    $customers = $result->fetch_object();

    if (!password_verify($password, $customers->password)) {
        return 'Invalid username or password';
    }

    
    $_SESSION['username'] = $customers->username;
    
    header('Location: index.php');
}

function isLoggedIn() : bool {
    return isset($_SESSION['username']);
}


