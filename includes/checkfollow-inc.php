<?php

require_once 'config.php';

$pdo = startConn();

$stmt = $pdo->prepare("SELECT * FROM followers WHERE stalking_id = $_GET[user_id] AND stalker_id = $currentId ");
$stmt->execute();
$checkfollow = $stmt->fetch();
