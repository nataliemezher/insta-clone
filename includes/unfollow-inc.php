<?php

require_once 'config.php';

$pdo = startConn();

if(isset($_POST['unfollow'])){

    $stmt = $pdo->prepare("UPDATE followers SET follower_status = 0 WHERE stalking_id = $_GET[user_id] AND stalker_id = $currentId");
    $stmt -> execute();

}
