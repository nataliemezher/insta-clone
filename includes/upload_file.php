<?php

require_once 'config.php';


//$errMes = '';



//$backonefolder = dirname(__DIR__,1);
$vs_directory = __DIR__."/../user/$currentUser/";
//$target_directory = $backonefolder ."/". $vs_directory;
$filename = $_FILES['filename']['name'];
$tmp = $_FILES['filename']['tmp_name'];

$target_file = $vs_directory . $filename;

$title = $_POST['title'];
$content = $_POST['content'];

$sendToDB = "user/$currentUser/$filename";


if(isset($_POST['submit'])){

    var_dump($target_file);

    if(move_uploaded_file($tmp, $target_file)){
        $pdo = startConn();
        $sql = $pdo->prepare("INSERT INTO posts (picture, user_id, title, content) VALUES (:picture, :user_id, :title, :content)");
        $sql->bindValue(':picture', $sendToDB);
        $sql->bindValue(':user_id', $currentId);
        $sql->bindValue(':title', $title);
        $sql->bindValue(':content', $content);
        $sql->execute();

        header("location: /instaclone/profile.php?user_id=$currentId");
        //echo "<img class='img-preview' width='300' height='300' src='".$vs_directory.$filename."'> ";

    }else{
        echo "error";
    }
}

?>