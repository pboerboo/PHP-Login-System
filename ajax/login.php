<?php

//Allow the config
define('__CONFIG__', true);

//Require the config
require_once "../inc/config.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //always return JSON format
    header('Content-Type: application/json');
    
    $return = [];
    
    $email = Filter::String($_POST['email']);
    $password = $_POST['password'];
    
    $findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1");
    $findUser -> bindParam(':email', $email, PDO::PARAM_STR);
    $findUser -> execute();
    
    //$userFound = User::Find($email, true);
    
    if ($findUser->rowCount() == 1) {
        // user exists
        $User = $findUser->fetch(PDO::FETCH_ASSOC);
        
        $user_id = (int) $User['user_id'];
        $hash = (string) $User['password'];
        
        if (password_verify($password, $hash)) {
            $return['redirect'] = 'PHP-Login-System/dashboard.php?message=welcome';
            $return['user_logged_in'] = true;
        
            $_SESSION['user-id'] = (int) $user_id;
        } else {
            $return['error'] = "Wrong email/password combination";
        }
    } else {
        //User not exists, create user
        $return['error'] = "You do not have an account.<br> <a href='PHP-Login-System/register.php'>Create one now? </a>";
        //$return['redirect'] = 'PHP-Login-System/register.php?message=Create your user account';
        
                
    }
    
    //make sure user does not exist
    
    //make sure user CAN be added AND is added
    
    //return proper infor to JS and redirect
    
   
    echo json_encode($return, JSON_PRETTY_PRINT);
    exit;

} else {
    //code to stop the script
    exit('Invalid URL');
};


?>
