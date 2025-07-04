<?php 
$id = htmlspecialchars($_GET["blog"]);
$result = $class::fetchBlog($id);

if($result === false) {
    echo "Page not found!";
} else {
    include_once "layouts/adminForm.php";

    // UPDATE
    if(isset($_POST["submit"])) {
        $id = htmlspecialchars($_POST["id"]);
        $title = htmlspecialchars($_POST["title"]);
        $content = $_POST["content"];
        $date = htmlspecialchars($_POST["date"]);
        
        $result_db = $class::update($id, $title, $content, $date);

        if($result_db > 0) {
            echo "Success!";
        } else {
            echo "Something went wrong!";
        }
    }

    // DELETE 
    if(isset($_POST["delete"])) {
        $id = htmlspecialchars($_POST["id"]);
        $result_db = $class::delete($id);
        if($result_db > 0) {
            echo "Success!";
        } else {
            echo "Something went wrong!";
        }
    }

}

?>

