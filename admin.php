<?php 
session_start();
require_once "actions.php";


if(isset($_SESSION["auth"])) {
    $class = new Actions();  
} else {
    header("Location: index.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <?php
        if($_GET === []) {
    ?>
    <script type="module" src="./js/date.js"></script>
    <?php } ?>
    <title>Admin Page</title>
</head>
<body>
    <div class="wrapper">
        <?php

            if(isset($_GET["logout"])) {
                unset($_SESSION["auth"]);
            }
            
            if(isset($_GET["blog"])) {
                require_once "./components/adminContent.php";
            } else {
                require_once "./components/admin.php";
            }
        ?>

    </div>

</body>
</html>