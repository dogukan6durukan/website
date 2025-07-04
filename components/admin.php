<?php
$result = $class::fetchBlogs(); 
$type = "ADMIN";
?>

<h1>Welcome to Admin Page</h1>
<div class="navigate">
    <a href="./">Home</a>
    <a href="admin.php?logout=true">Log out</a>
</div>

    <?php include_once "layouts/adminForm.php"; ?>

    <?php
        // Add Blog
        if(isset($_POST["submit"])) {
           $title = htmlspecialchars($_POST["title"]);
           $content = $_POST["content"];
           $date = htmlspecialchars($_POST["date"]);
           $class::write($title, $content, $date);
        ?>
        <div>
            <h2>Preview</h2>
        </div>
        <?php
            echo $class::parseMD($content);
        }
    ?>

    <div class="listBlogs">
        <h2>My Blogs</h2>
            <?php
                include_once "layouts/listBlogs.php";
            ?>
    </div>
