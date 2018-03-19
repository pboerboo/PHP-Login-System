<?php 

//Allow the config
define('__CONFIG__', true);

//Require the config
require_once "../inc/config.php";

//alert('bla');

if ($_SERVER['REQUEST_METHOD'] == 'POST' or 1==1) {
    //always return JSON format
    header('Content-Type: application/json');
    
    $return = [];
    
    $email = Filter::String($_POST['email']);
    
    $findUser = $con->prepare("SELECT user_id FROM users WHERE email = LOWER(:email) LIMIT 1");
    $findUser -> bindParam(':email', $email, PDO::PARAM_STR);
    $findUser -> execute();
    
    if ($findUser->rowCount() > 0) {
        // user exists
        $return['error'] = "You already have an account. <a href='/PHP-Login-System/login.php'>Go to login </a>";
        $return['user_logged_in'] = false;
    } else {
        //User not exists, create user
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        $addUser = $con->prepare("INSERT INTO users(email, password) VALUES(LOWER(:email), :password)");
        $addUser -> bindParam(':email', $email, PDO::PARAM_STR);
        $addUser -> bindParam(':password', $password, PDO::PARAM_STR);
        $addUser -> execute();
        
        $user_id = $con -> lastInsertId();
        
        $_SESSION['$user-id'] = (int) $user_id;
        
        $return['redirect'] = 'PHP-Login-System/dashboard.php?message=welcome';
        $return['user_logged_in'] = true;
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
