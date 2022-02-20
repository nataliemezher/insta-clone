<?php




//include "header.php";
$pdo = startConn();
$stmt = $pdo->prepare('SELECT * FROM posts WHERE user_id = :userid ORDER BY createdAt DESC');
$stmt->bindValue('userid', $profileUserid);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_CLASS);


foreach ($results as $pictures){

    echo "<img class='img-gallery' data-postid='$pictures->post_id' data-title='$pictures->title' data-content='$pictures->content' width='280' height='280' src='".$pictures->picture."'>";


}