<?php

session_start();
require_once('../model/connection.class.php');
require_once('../model/subscribe.class.php');
//$con = new connection();
$subscriber=new subscribe();
// var_dump($rating);
// die();

if(isset($_POST['submit_subscribe'])){
$email = $_POST['email'];
}
$date = date('Y-m-d H:i:s');
$subscriber->setSubscribeEmail($email);
$subscriber->setSubscribeDate($date);

$flag=$subscriber->addSubscribe();

if($flag){
	require_once('mail.php');
	$_SESSION['subscriber'] = true;
		//$_SESSION['rating_msg']=$addaboutObj->success="The hall successfully added";
		header('location:../../index.php');
	}
else{
	die('not added');

	}

?>
