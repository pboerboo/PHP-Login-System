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
    
    $userFound = FindUser($con, $email, true);
    
    if ($userFound) {
                
        $user_id = (int) $userFound['user_id'];
        $hash = (string) $userFound['password'];
        
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
