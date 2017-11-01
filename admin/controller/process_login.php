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
// var_dump($view);
// die();
$loadminObj = new Locate();
foreach ($view as $value) {
	// echo '<pre>';
	// var_dump($value);
	$username = $value['username'];
	$role = $value['role'];
}
//die();
if(!empty($view)){

	$_SESSION['username']=$username;
	$loadminObj->getLocation('../index.php?role='.$role);
	//header('location:../index.php?Email='.$email);

}else{
$loadminObj->getLocation('../admin/login.php');

}

?>
