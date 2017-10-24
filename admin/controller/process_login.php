<?php
session_start();
require_once('../model/connection.class.php');
require_once('../model/admin.class.php');
require_once('../model/locate.class.php');


$conObj = new Connection();
$objValidate=new admin();

$email=$_POST['email'];
$password=$_POST['password'];
$password=md5($password);
$objValidate->setEmail($email);
$objValidate->setPassword($password);
$view= $objValidate->validateAdmin();
/*var_dump($view);
die();*/
$loadminObj = new Locate();
/*echo '<pre>';
print_r($view);*/
if(!empty($view)){
	//echo 'login';
	//header('location:../index.php?page=admin&user='.$name);
	//$_SESSION['email']=$email;
	$loadminObj->getLocation('../admin/index.php?email='.$email);
	//header('location:../index.php?Email='.$email);
	
}else{
	
	header('location:../login.php');
	echo 'not login';
}

?>