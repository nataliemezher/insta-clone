<?php
//session_start();
require("config.php");



$errorMessage = '';



if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($username) || empty($email) || empty($password)) {
        $errorMessage = "Make sure to fill in all fields!";
    }

    if (!preg_match('/^[a-zA-Z]+$/', $username)) {
        $errorMessage = "Use only letters in your username";
    }
    if (strlen($username) <= 4 || (strlen($username) > 50)) {
        $errorMessage = "Username is either too short or too long!";
    }
    if (strlen($email) > 50) {
        $errorMessage = "Email is too long";
    }
    if (strlen($password) <= 4 || (strlen($password) > 20)) {
        $errorMessage = "Password is either too short or too long!";
    }
    //hashed lösenord
    if (empty($errorMessage)) {
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        $pdo = startConn();

        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    $stmt->bindValue('username', $username);
    $stmt->execute();
    $count = count($stmt->fetchAll());

    if ($count == 1) {
        $errorMessage = "Username already exists!";
    }else{

        $stmt = $pdo->prepare('INSERT INTO users (username, email, password, ispublic) VALUES (:username, :email, :password, :ispublic)');
        //binder parametrar till speicifik variabel
        $stmt->bindValue('username', $username);
        $stmt->bindValue('email', $email);
        $stmt->bindValue('password', $hashedPwd);
        $stmt->bindValue('ispublic', 0);
        $stmt->execute();

        mkdir("user/$username");

        header("location: ../instaclone/index.php");
    }
}
    else {
       $errorWithDB = "Something went wrong";
    }

}