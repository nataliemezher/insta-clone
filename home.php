<?php
include "includes/header.php";

require_once 'includes/functions-inc.php';

require 'includes/comment-inc.php';

require 'includes/hidecomment-inc.php';

$currentId = $_SESSION['userid'];

?>

<!DOCTYPE html>
<html lang="en">

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
    <!-- Header -->

    <!-- //End of Header -->

    <div class="main-page">
        <div class="main-container">
            <div class="main-left">
                <div class="flow-container">
                    <div class="flow-feed-flex">
                        <?php getFeed(); ?>
                    </div>
                </div>
            </div>
            <div class="main-right">
                <div class="follower-menu">
                    <div><img src="./icons/profile2.png" alt="profile icon picture"></div>
                    <!-- Take from DB -->
                    <div id="user-data">
                        <h2><?php echo ucwords($currentUser) ?></h2><br>

                    </div>
                </div>
                <div class="follower-suggestions">
                    <div>

                        <?php listSuggestion(); ?>


                    </div>
                    <div>
                        <p>Visar alla</p>
                    </div>

                </div>

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
        <script src="js/main.js"></script>


</body>

</html>