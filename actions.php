<?php

require_once "connection.php";

Interface Template
{
    public static function login();
    public static function write($title, $markdown, $date);
    public static function update($id, $title, $content, $date);
    public static function delete($id);
    public static function fetchBlogs();
    public static function fetchBlog($id);
    public static function parseMD($markdown);
   
}

// Util function
function print_r2($val) {
        echo '<pre>';
        print_r($val);
        echo '</pre>';
}


class Actions extends Conn implements Template
{
     public static function login() {
        $stmt = self::$dbh->prepare("SELECT * FROM admin");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $pass = $result["password"];
        
        if(isset($_POST["submit"])) 
        {
            $password = htmlspecialchars($_POST["password"]);
            $answer = htmlspecialchars($_POST["answer"]);
            $value = htmlspecialchars($_POST["value"]);
            $token = htmlspecialchars($_POST["token"]);


            $result = pow($value, 2) - 5;
            if(
                password_verify($password, $pass) &&
                $token === $_SESSION["token"] &&
                $answer == $result
            ) {

                // SUCCESS 
                unset($_SESSION["token"]);
                $_SESSION["auth"]=1;
                header("Location: admin.php"); 

            } else {
                echo "Invalid password!";
            }

        } else {
            echo "Unauthorized!";
        }
     }

     public static function parseMD($markdown) {
       require __DIR__.'/vendor/autoload.php';
       $Parsedown = new Parsedown();
       return $Parsedown->text($markdown);
     }

     public static function fetchBlogs() {
        $stmt = self::$dbh->prepare("SELECT * FROM blog");
        $stmt->execute();

        $result = $stmt->fetchAll();
        return $result;
    }

    public static function fetchBlog($id) {
        $stmt = self::$dbh->prepare("SELECT * FROM blog WHERE id=:id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function write($title, $content, $date) {
        $stmt = self::$dbh->prepare("INSERT INTO blog (title, content, date) VALUES (:title, :content, :date)");
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->execute();
    }   
    
    public static function update($id, $title, $content, $date) {
        $stmt = self::$dbh->prepare("UPDATE blog SET title=:title, content=:content, date=:date WHERE id=:id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public static function delete($id) {
        $stmt = self::$dbh->prepare("DELETE FROM blog WHERE id=:id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

}

?>