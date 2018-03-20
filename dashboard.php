<?php

//Allow the config
define('__CONFIG__', true);

//Require the config
require_once "inc/config.php";

ForceLogin();

$userId = $_SESSION['user-id'];

$getUserInfo = $con->prepare("SELECT email, reg_date_time FROM users WHERE user_id = :user_id LIMIT 1");
$getUserInfo -> bindParam(':user_id', $userId, PDO::PARAM_INT);
$getUserInfo -> execute();

if ($getUserInfo->rowCount() == 1) {
    $user = $getUserInfo->fetch(PDO::FETCH_ASSOC);
    } else {
    header("location: /PHP-Login-System/index.php");
}

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
            <h2>Dashboard</h2>
            Dear <?php echo $user['email'] ?> ,<br>
            You are logged in as user:
            <?php echo $userId ?><br> You registered on:
            <?php echo $user['reg_date_time'] ?>
            <p>
                <a href="/PHP-Login-System/logout.php">Logout</a>
            </p>
        </div>

        <?php require_once "inc/footer.php"; ?>

    </body>


    </html>
