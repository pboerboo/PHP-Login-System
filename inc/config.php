<?php

if (!defined('__CONFIG__')) {
    exit("You do not have a config file");
}

if (!isset($_SESSION)) {
    session_start();
}
//Allow errors
error_reporting(-1);
ini_set('display_errors', 'On');

//include the  neede php files
include_once "classes/DB.php";
include_once "classes/filter.php";
include_once "functions.php";

$con = DB::getConnection();

?>
