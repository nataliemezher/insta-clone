<?php
//session_start();
require("config.php");

//$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
//$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

$errorMessage = '';

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $errorMessage = "Make sure to fill in all fields!";
    }

    if (!preg_match('/^[a-zA-Z]+$/', $username)) {
        $errorMessage = "Use only letters in your username";
    }

    if(empty($errorMessage)){
        $pdo = startConn();

    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    $stmt->bindValue('username', $username);
    $stmt->execute();
    $count = count($stmt->fetchAll());
        if($count == 0){
            $errorMessage = "User does not exist";
        }else{
          $secondstmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
          $secondstmt->execute(['username'=> $username]);
          $user = $secondstmt->fetch();

          if (password_verify($password, $user['password'])){
              session_start();
              $_SESSION['username'] = $user['username'];
              $_SESSION['userid'] = $user['user_id'];
              header("location: ../instaclone/home.php");
          }else{
              $errorMessage = "Password does not match";
          }
        }

}
}
