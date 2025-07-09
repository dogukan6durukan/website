<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="My homepage containing my blogs all about from programming to personal life.">
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

