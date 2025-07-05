<?php
class Conn
{
    public static object $dbh;
    public function __construct()
    {        
    require_once "credentials.php";
     $user = $user_db;
     $pass = $password_db;
     try {
        self::$dbh = new PDO('mysql:host=localhost;dbname=contents', $user, $pass);
     } catch (PDOException $e) {
         echo $e->getMessage();
     }

    }
}
?>