<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Login</title>
</head>
<body>

  <div class="login-wrapper">
  <div class="login-form">  
    <h2>Login</h2>
    <form action="./action.php" method="post" class="myForm">
      <div class="form-example">
        <label for="password">Enter your password: </label>
        <input type="password" name="password" id="password" required />
      </div>
      <div class="form-example">
        Question : <?php echo $question; ?>
        <input type="number" name="answer" required>
      </div>
      <input type="hidden" name="value" value="<?php echo $num; ?>">
      <div class="form-example">
        <input type="submit" name="submit" value="Login" />
        <a href="./">Homepage</a>
      </div>
      <!--CSRF-->
      <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?? '' ?>">
    </form>
  </div>
</div>

</body>
</html>

