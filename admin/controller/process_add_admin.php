<?php 

session_start();
require_once('../model/connection.class.php');
require_once('../model/admin.class.php');
//$con = new connection();
$admin=new Admin();

if(isset($_POST['add_admin'])){
$username = $_POST['username'];
$admin_password = $_POST['password'];
$admin_ckpassword = $_POST['ckpassword'];
$admin_email = $_POST['email'];
$admin_phone = $_POST['phone'];
$logo = $_POST['logo'];
$facebook_url = $_POST['facebook_url'];
$twitter_url = $_POST['twitter_url'];
$instagram_url = $_POST['instagram_url'];

}

$admin->setUsername($username);
$admin->setPhone($admin_phone);
$admin->setLogo($logo);
$admin->setEmail($admin_email);
$admin->setPassword($admin_password);
$admin->setCkPassword($admin_ckpassword);
$admin->setFacebookUrl($facebook_url);
$admin->setTwitterUrl($twitter_url);
$admin->setInstagramUrl($instagram_url);

$flag=$admin->addAdmin();
/*var_dump($flag); die();*/
if($flag){
	//die('aded');
	$_SESSION['admin_added'] = true;
		$_SESSION['admin_added_msg']=$addaboutObj->success="The hall successfully added";
		header('location:../index.php?page=admin&action=view');
	}
else{
	echo "not added";
	
	}

?>

