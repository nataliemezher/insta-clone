<?php

/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
include "includes/header.php";

require_once 'includes/functions-inc.php';

require_once 'includes/unfollow-inc.php';

require_once 'includes/follow-inc.php';

require_once 'includes/checkfollow-inc.php';

require 'includes/comment-inc.php';

require_once 'includes/hidecomment-inc.php';

$currentId = $_SESSION['userid'];

$profileUserid = $_GET['user_id']  ?? '';

$profileUser = getUserByPhotos($profileUserid);

$showUser = getUserById($profileUserid);



?>


<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Clone</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
</head>

<body>
    <div class="main-page">
        <div class="profile-header-page">
            <div class="profile-info">
                <div>
                    <h2><?php if (!empty($profileUser)) {
                            echo ucwords($profileUser[0]['username']);
                        } else {
                            echo ucwords($showUser[0]['username']);
                        } ?>
                    </h2>
                </div>
                <div class="follow-area">
                    <form action="profile.php<?php echo '?user_id=' . $profileUserid ?>" method="post">

                        <input type="hidden" value="<?php echo $profileUserid; ?>" name="followerid" />
                        <?php
                        if ($currentId !== $profileUserid && empty($checkfollow['follower_status'])) {
                            echo '<button type="submit" name="follow">Follow</button>';
                        } else if ($currentId !== $profileUserid && !empty($checkfollow['follower_status'])) {
                            echo '<button type="submit" name="unfollow">Unfollow</button>';
                        }
                        ?>
                    </form>
                </div>
                <div class="follower-status-box">
                    <div class="stalker">
                        <p class="stalkerstyle"><b><?php getFollowerAmount(); ?></b> followers</p>

                    </div>
                    <div class="stalking">
                        <p class="stalkingstyle"><b><?php getFollowingAmount(); ?></b> following</p>

                    </div>

                </div>

            </div>
        </div>

        <div class="img-gallery-main" id="img-gallery-main">
            <!-- Implements pictures into profile gallery -->
            <?php require_once 'includes/profilegallery.php'; ?>
        </div>
    </div>

    <div id="popUp" class="popUp">
            <div class="popUpStyle">
                <div class="popUpImageBox">
                    <img src="" data-postid="" id="popUpImage" />
                </div>
                <div class="popUpNonImgContent">
                    <div class="popUpText">
                        <h2 id="popUpTitle"></h2>
                        <p id="popUpContent"></p>
                    </div>
                    <div class="externalComments">
                        <!-- Comments here -->

                        <div id="showComments">

                        </div>

                    </div>
                    <div class="comment-form">
                        <form action="#" method="post">
                            <textarea id="comment-textarea" type="text" name="commentfield" placeholder="Kommentera.."></textarea>
                            <div class="popUpButtonsFormation">
                                <div>
                                    <input type="hidden" value="" name="postid" id="getpostid">
                                    <button class="comment-button" type="submit" name="comment">Skicka</button>
                                </div>
                                <div>
                                    <!-- LIKE BUTTON -->
                                    <a class="like-button" href="xx"><img height="16px" src="icons/heart2.png"></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div>
                    <button id="closeMe">X</button>
                </div>
            </div>
        </div>


    <?php include "./includes/footer.php"; ?>
    <script src="js/main.js"></script>
</body>

</html>