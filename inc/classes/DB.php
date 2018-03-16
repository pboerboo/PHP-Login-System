<?php namespace inc;

if (!defined('__CONFIG__')) {
    exit("You do not have a config file");
}

class DB
{
    protected static $con;
    
    private function __construct()
    {
        try {
            self::$con = new PDO('mysql:charset=utf8mb4;host=localhost;port=3306;dbname=Login_course', 'logsitedbj', 'rcLY3As3f2NchWMl');
            self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$con->setAttribute(PDO::ATTR_PERSISTENT, false);
        }
        catch (PDOException $e) {
            exit("Could not connect to the database");
        }
    }
    
    public static function getConnection()
    {
        // if the instance was not started, start it here
        if (!self::$con) {
            new DB();
        }
        //return the writable database connection
        return self::$con;
    }
}

?>
