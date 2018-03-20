<?php
//Allow the config
define('__CONFIG__', true);
//Require the config
require_once "inc/config.php";

ForceDashboard();

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
        <div class="uk-grid uk-child-width-1-3@s uk-child-width-1-1" uk-grid="">
                       
            <h2>Login</h2>

            <form class="uk-form-stacked js-login">
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-text">Email</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="form-stacked-text" type="email" required="required" placeholder="Your email address">
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-text">Password</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="form-stacked-text" type="password" required="required" placeholder="Your password">
                    </div>
                </div>
                
                <div class="uk-margin uk-alert-uk-alert-danger js-error" style="display:none"></div>

                <div class="uk-margin">
                    <button class="uk-button uk-button-default" type="Submit">Login</button>
                </div>

            </form>
        </div>
    </div>


<?php require_once "inc/footer.php"; ?>
   
</body>


</html>