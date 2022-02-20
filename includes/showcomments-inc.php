<?php

require_once 'config.php';

$pdo = startConn();

$postId = $_GET['post_id'];
$currentId = $_SESSION['userid'];

$stmt = $pdo->prepare("SELECT comments.comment_id,posts.user_id AS userid,users.username,comments.user_id,comments.createdAt,comments.content,posts.post_id,comments.deleted FROM comments
INNER JOIN posts ON comments.post_id =  posts.post_id
INNER JOIN users ON comments.user_id = users.user_id
WHERE posts.post_id = $postId AND comments.deleted = 0");
try{
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_CLASS);

    $resultsSet = ['userid' => $currentId, 'comments' => $results];
    echo json_encode($resultsSet);

    exit();

}catch(PDOException $e){
    print_r($e -> getMessage());
}
