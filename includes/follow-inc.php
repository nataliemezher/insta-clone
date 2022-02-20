<?

require_once 'config.php';

$pdo = startConn();

if(isset($_POST['follow'])){
    $currentId = $_SESSION['userid'];
    $followerid = $_POST['followerid'];

    $stmt = $pdo->prepare("SELECT * FROM followers WHERE follower_status = 0 AND stalking_id = $_GET[user_id] AND stalker_id = $currentId");
    $stmt->execute();
    $count = count($stmt->fetchAll());
        if($count >= 1){
            $stmt = $pdo->prepare("UPDATE followers SET follower_status = 1 WHERE stalking_id = $_GET[user_id] AND stalker_id = $currentId");
            $stmt -> execute();
        }else{

    $stmt = $pdo->prepare("INSERT INTO followers (stalker_id, stalking_id, follower_status)
    VALUES (:stalker_id, :stalking_id, :follower_status)");
    $stmt -> bindValue('stalker_id', $currentId);
    $stmt -> bindValue('stalking_id', $followerid);
    $stmt -> bindValue('follower_status', 1);
    $stmt -> execute();
}
}
