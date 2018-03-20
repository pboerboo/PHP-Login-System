<?php

//Function to check if user is logged in, only allow to continue if user is logged in
function ForceLogin() {
    if (isset($_SESSION['user-id'])) {
    //if logged in, allow continue
    } else {
        header('location: /PHP-Login-System/login.php?Login_before_you_enter_a_page');
        exit;
    }
}

//Function to force logged in user to go to dashboard instead of logn or regster
function ForceDashboard() {
    if (isset($_SESSION['user-id'])) {
        header('location: /PHP-Login-System/dashboard.php');
        exit;
    }
}

//Function to check if user exists in DB
function FindUser($con, $email, $return_assoc = false) {
    
    $email = (string) Filter::String($email);
    
    $findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1");
    $findUser -> bindParam(':email', $email, PDO::PARAM_STR);
    $findUser -> execute();
    
    if ($return_assoc) {
        return $findUser->fetch(PDO::FETCH_ASSOC);
    }
    
    $userFound = (boolean) $findUser->rowCount();
    
    return $userFound;
     
}

?>