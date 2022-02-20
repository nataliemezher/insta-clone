<?php

session_start();

$currentUser = $_SESSION['username'];
$currentId = $_SESSION['userid'];

function startConn(){
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=instaclone_db", 'root', 'test');
       //echo 'connection works';
        // set the PDO error mode to exception
        //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
      return $pdo;
    }