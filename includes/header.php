<?php

session_start();

$currentUser = $_SESSION['username'];
$currentId = $_SESSION['userid'];

if(!isset($currentUser)){
    header("location: index.php");
    exit;
}

?>

<!DOCTYPE html>

<head>
   <link rel="stylesheet" href="style/style.css">

    <!-- Stylesheet in Isolation from home.php -->
    <link rel="stylesheet" href="../style/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
</head>

<body>
    <div class="navbar-container">
        <div class="navbar-content">
            <div><a href="./home.php">
                    <h2>Instagram</h2>
                </a></div>
            <div><input class="search-field" type="search" placeholder="Sök"></div>
            <div class="navbar-links">
                <a href="./home.php"><img src="./icons/home.png" width="25px" height="auto"></a>
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><img src="./icons/message.png" width="25px" height="auto"></a>
                <a href="upload.php"><img src="./icons/image.png" width="25px" height="auto"></a>
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><img src="./icons/heart.png" width="25px" height="auto"></a>
                <a href="./profile.php<?php echo '?user_id='.$currentId ?>"><img src="./icons/profile.png" width="25px" height="auto"></a>
                <a href="./logout.php"><img src="./icons/logout.png" width="25px" height="auto"></a>
            </div>
        </div>
    </div>
</body>

</html>