<?php

require_once 'config.php';

$pdo = startConn();


if (isset($_POST['delete'])) {
    $hideComment = $_POST['delete'];
    $currentId = $_SESSION['userid'];
    $commenterId = $_POST['commenter'];

        $stmt2 = $pdo->prepare("UPDATE comments SET deleted = 1  WHERE  comment_id = $hideComment AND user_id = $commenterId");
        $stmt2->execute();
        $stmt = $pdo->prepare("UPDATE comments SET deleted = 1  WHERE  comment_id = $hideComment AND user_id = $currentId");
        $stmt->execute();


}