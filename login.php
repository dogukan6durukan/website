<?php
session_start();
if(isset($_SESSION["auth"])) {
  header("Location: admin.php");
} 
else {

  // CSRF TOKEN
  $_SESSION['token'] = md5(uniqid(mt_rand(), true));
  // MATH QUESTION
  $num = mt_rand(0, 10);
  $question = "What is f(".$num.") = x^2-5";

  include_once "./components/layouts/login.php";
}
?>