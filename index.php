<?php

//Allow the config
define('__CONFIG__', true);
//Require the config
require_once "inc/config.php";
?>

    <!DOCTYPE html>

    <html lang="en">

    <head>
        <Title>Project Pascal</Title>
        <base href="/" />
        <!-- UIkit CSS -->
        <link rel="stylesheet" href="uikit/css/uikit.min.css" />


    </head>

    <body>
        <div class="uk-section uk-container">
            <?php
            echo "Vandaag is het: ";
            echo date("D d M Y")."<br>";
            ?>
            <br>
            <a href="/PHP-Login-System/login.php">Login</a>
            <br>
            <a href="/PHP-Login-System/register.php">Register</a>
        </div>

        <?php require_once "inc/footer.php"; ?>

    </body>


    </html>
