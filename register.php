<?php

require_once 'includes/signup-inc.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrera</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container-register">
        <div id="content-register">
            <div class="login-box">
                <div>
                    <h1>Instagram</h1>
                    <h3 style="text-align: center; margin: 15px; width: 90%; font-size: 100%; font-weight: bold;">Registrera dig om du vill se foton och videoklipp från dina vänner.</h3>
                </div>
                <button><img src="sitepics/fblg.png" width=15px height=15px> Logga in med Facebook</button>
                <div id="eller-lines">
                    <div></div>
                    <div>
                        ELLER
                    </div>
                    <div>
                    </div>
                </div>
                <form method="post">
                    <div>
                        <input type="text" name="username" placeholder="Username">
                    </div>
                    <div>
                        <input type="text" name="email" placeholder="Email">
                    </div>
                    <div>
                        <input type="password" name="password" placeholder="Password">

                    </div>
                    <div class="error-message">
                        <?php echo $errorMessage ?>
                        <br>
                        <?php echo $errorWithDB ?>
                    </div>
                    <div>
                        <button type="submit" name="submit">Registrera</button>
                    </div>
                    <div class="disclaimer-box">
                        <p>Genom att registrera dig godkänner du våra användarvillkor, vår datapolicy och vår policy för cookies. Läs mer om hur vi samlar in, använder och delar dina uppgifter i vår datapolicy och hur vi använder cookies och liknande teknologi i vår policy för cookies.</p>
                    </div>

            </div>


            <div class="register-box">
                Har du ett konto? <a href="index.php">Logga in</a>
            </div>
            <div class="app-box">
            <div style="margin: 10px 0px 15px 0px; font-weight:400;">Skaffa appen.</div>
                <div class="app-buttons">
                    <button class="app-button" type="button">Hämta i App Store</button>
                    <button class="app-button" type="button">Ladda ned på Google Play</button>
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