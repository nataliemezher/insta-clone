<?php

require_once 'config.php';

    $pdo = startConn();

    if (isset($_POST['comment'])) {
        $comment = $_POST['commentfield'];
        $currentId = $_SESSION['userid'];
        $postid = $_POST['postid'];


        $stmt = $pdo->prepare('INSERT INTO comments(post_id, user_id,content, deleted)
         VALUES (:post_id,:user_id, :content, :deleted)');
         $stmt -> bindValue('post_id', $postid);
         $stmt -> bindValue('user_id', $currentId);
         $stmt -> bindValue('content', $comment);
         $stmt -> bindValue('deleted', 0);
         $stmt -> execute();


        }
