<?php


include "includes/header.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload page</title>

</head>

<body>
    <div class="main-page">
        <div>
            <form class="upload-form" action="includes/upload_file.php" method="post" enctype="multipart/form-data">

                <div class="upload-form-right">
                    <div>
                        <h3>Select a file to upload, <?php echo ucwords($currentUser) ?>!</h3>
                    </div>
                    <div>
                        <input type="file" name="filename" accept="image/png, image/jpg, image/jpeg">
                    </div>
                    <div>
                        <label for="title"></label>
                        <input id="upload-input" type="text" name="title" placeholder="Lägg till titel">
                    </div>
                    <div>
                        <label for="content"></label>
                        <textarea id="upload-textarea" type="text" name="content" placeholder="Lägg till kommentar"></textarea>

                    </div>
                    <div>
                        <button id="upload-button" type="submit" name="submit">Ladda upp</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>