<?php 
session_start();
require_once "actions.php";


$class = new Actions();
$class::login();

?>