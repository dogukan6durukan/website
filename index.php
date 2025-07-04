<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <?php
        if($_GET === []) {
    ?>
    <script type="module" src="js/paging.js"></script>
    <?php } ?>
    <title>Homepage</title>
</head>
<body>

    <div class="wrapper">
        <?php include "./components/layouts/header.php"; ?>
        <?php include "./components/homepage.php"; ?>
        <?php include "./components/layouts/footer.php"; ?>
    </div>    
</body>
</html>

