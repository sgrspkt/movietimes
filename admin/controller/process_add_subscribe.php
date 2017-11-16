<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1);

session_start();
require_once('../model/connection.class.php');
require_once('../model/subscribe.class.php');

$subscriber=new subscribe();


if(isset($_POST['submit_subscribe'])){
$email = $_POST['email'];
$subscriber->setSubscribeEmail($email);
$verifySubscriber = $subscriber->verifySubscriber();
if($verifySubscriber){
	header('location:../../index.php?msg="You are already subscribed"');
}else{
$date = date('Y-m-d H:i:s');
$subscriber->setSubscribeEmail($email);
$subscriber->setSubscribeDate($date);

$flag=$subscriber->addSubscribe();

if($flag){
$to = $email;
$subject = "Subscription email";
$txt = "You have successfully subscribed to our newsletter, you will be notified when Now showing and Upcomming movies are added to the website Movietimes";
$headers = "From: info@sagars.com.np" . "\r\n" .
"CC: somebodyelse@example.com";

mail($to,$subject,$txt,$headers);
}



	$_SESSION['subscriber'] = true;
		//$_SESSION['rating_msg']=$addaboutObj->success="The hall successfully added";
		header('location:../../index.php?msg="Thanks for the subscription"');
	}
}
else{
	die('not added');

	}

?>
