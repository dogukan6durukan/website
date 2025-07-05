<?php
require_once "actions.php";

$class = new Actions();
$result = $class::fetchBlogs();

if(isset($_GET["blog"])) {
    $id = htmlspecialchars($_GET["blog"]);
    if(is_numeric($id)) {
        $result = $class::fetchBlog($id);
        if($result === []) {
            echo "Page not found!";
        } else {
            $title = $result["title"];
            $markdown = $result["content"];
            $date = $result["date"];
            
            $parse = $class->parseMD($markdown); 
            
            include_once "layouts/blogcontent.php";
        }
        
    } else {
        header("Location: index.php");
    }

} else{
    $type = "HOME";
    include_once "layouts/homecontent.php";
}