<?php
session_start();
require_once('../admin/classes/connection.class.php');
require_once('../classes/user.class.php');

$conObj = new Connection();

$objValidate=new user();	
$username=mysqli_real_escape_string($objValidate->conxn,$_POST['user_name']);
$password=mysqli_real_escape_string($objValidate->conxn,$_POST['password']);
$password=md5($password);
$_SESSION['username']=$username;
$objValidate->setUsername($username);
$objValidate->setPassword($password);
$view= $objValidate->validateUser();

echo $view;



?>

