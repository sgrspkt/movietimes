<?php
session_start();
require_once('../model/connection.class.php');
require_once('../model/admin.class.php');

$conObj = new Connection();
$objValidate=new admin();

$username=mysqli_real_escape_string($objValidate->conxn,$_POST['username']);
$password=mysqli_real_escape_string($objValidate->conxn,$_POST['password']);
$password=md5($password);
$objValidate->setUsername($username);
$objValidate->setPassword($password);
$view= $objValidate->validateAdmin();
echo $view;
?>