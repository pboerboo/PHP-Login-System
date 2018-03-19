<?php

//Allow the config
define('__CONFIG__', true);

//Require the config
require_once "inc/config.php";

echo "The user ID is: " .$_SESSION['user-id'];


?>

<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="robots" content="follow">

        <Title>Project Pascal - Dashboard</Title>
        <base href="/" />
        <!-- UIkit CSS -->
        <link rel="stylesheet" href="uikit/css/uikit.min.css" />


    </head>

    <body>
        <div class="uk-section uk-container">
          bla   
        </div>

        <?php require_once "inc/footer.php"; ?>

    </body>


    </html>
