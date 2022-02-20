<?php

require_once 'includes/login-inc.php'



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="image"><img src="sitepics/login-pic.png" alt="login-picture" height=auto width=350px></a></div>
            <div id="box-content">
                <div class="login-box">
                    <h1>Instagram</h1>
                    <form method="post">
                        <div>
                            <input type="text" name="username" placeholder="Användarnamn">
                        </div>
                        <div>
                            <input type="password" name="password" placeholder="Lösenord">
                        </div>
                        <?php echo $errorMessage ?>
                        <div>
                            <button type="submit" name="submit">Logga in</button>
                        </div>
                        <div class="alt-login">
                            <div id="eller-lines">
                                <div></div>
                                <div>
                                    ELLER
                                </div>
                                <div>
                                </div>
                            </div>
                            <div>
                                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><img src="sitepics/fblg.png" width=15px height=15px><b> Logga in med Facebook</b></a>
                            </div>
                            <div>
                                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">Glömt lösenordet?</a>
                            </div>
                        </div>
                </div>


                <div class="register-box">
                    Har du inget konto? <a href="register.php">Registrera dig</a>
                </div>
                <div class="app-box">
                <div style="margin: 10px 0px 15px 0px; font-weight:400;">Skaffa appen.</div>
                    <div class="app-buttons">
                        <button class="app-button" type="button"><img src="icons/apple.png" width="20px" height="auto">Hämta i App Store</button>
                        <button class="app-button" type="button"><img src="icons/google.png" width="20px" height="auto">Ladda ned på Google Play</button>
                        <div>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <?php include "./includes/footer.php"; ?>
</body>

</html>