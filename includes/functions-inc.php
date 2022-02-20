<?php

require 'config.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function listSuggestion()
{
    $currentUser = $_SESSION['username'];

    $pdo = startConn();

    $stmt = $pdo->prepare("SELECT user_id, username FROM users WHERE NOT username ='$currentUser'");
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_CLASS);

    echo '<ul>';
    foreach ($results as $users) {
        echo '<li><a href="./profile.php?user_id=' . $users->user_id . '">' . ucwords($users->username) . '</a></li>';
    }
    echo  '</ul>';
}


function getUserByPhotos($user_id)
{
    $pdo = startConn();

    $stmt = $pdo->prepare('SELECT * FROM users INNER JOIN posts ON users.user_id = posts.user_id WHERE users.user_id = :id');
    $stmt->bindParam(':id', $user_id);
    $stmt->execute();


    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUserById($user_id){
    $pdo = startConn();

    $stmt = $pdo->prepare('SELECT * FROM users WHERE user_id = :user_id');
    $stmt->execute([':user_id' => $user_id]);

    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $user;


}


function getFeed()
{

    $currentId = $_SESSION['userid'];

    $pdo = startConn();
    $stmt = $pdo->prepare('SELECT * FROM users
    INNER JOIN posts ON users.user_id = posts.user_id
    INNER JOIN followers ON users.user_id = followers.stalking_id
    WHERE followers.stalker_id = :stalker_id
    AND follower_status = 1
    ORDER BY createdAt DESC
    ');
    $stmt->bindValue('stalker_id', $currentId);


    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_CLASS);


    foreach ($results as $pictures) {

        echo "<div class='flow-item'>
        <div class='flow-title-box'>

           <h4>$pictures->title</h4><p>$pictures->createdAt</p>
        </div>
        <div class='flow-image-box'>
           <img class='img-gallery' data-title='$pictures->title' data-postid='$pictures->post_id' data-content='$pictures->content' width='500' height='auto' src='" . $pictures->picture . "'>
        </div>
        <div>

           <p><b>$pictures->username:</b> $pictures->content<p>
        </div>
        </div>";


    }
}

    function getFollowerAmount(){
        $pdo = startConn();
        $stmt = $pdo->prepare("SELECT stalking_id,follower_status,count(*) as followerAmount FROM followers WHERE follower_status = 1 AND stalking_id = '$_GET[user_id]' group BY stalking_id");
        $stmt -> execute();
        $results = $stmt -> fetch();

        if(empty($results['followerAmount'])){
            echo "0";
            } else if(!empty($results['followerAmount'])){
                echo $results['followerAmount'];
            }
    }

    function getFollowingAmount(){
        $pdo = startConn();
        $stmt = $pdo->prepare("SELECT stalker_id,follower_status,count(*) as followingAmount FROM followers WHERE follower_status = 1 AND stalker_id = '$_GET[user_id]' group BY stalker_id");
        $stmt -> execute();
        $results = $stmt -> fetch();


        if(empty($results['followingAmount'])){
        echo "0";
        } else if(!empty($results['followingAmount'])){
            echo $results['followingAmount'];
        }
    }
