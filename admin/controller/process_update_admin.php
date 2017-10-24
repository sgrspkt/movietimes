<?php
session_start();
require_once('../model/connection.class.php');
require_once('../model/admin.class.php');
require_once('../model/locate.class.php');
?>
<?php
if(isset($_POST['update_admin'])){
$admin_id = $_POST['admin_id'];
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
$admin = new Admin();
$admin->setAdminID($admin_id);
$admin->setUsername($username);
$admin->setPhone($admin_phone);
$admin->setLogo($logo);
$admin->setEmail($admin_email);
$admin->setPassword($admin_password);
$admin->setCkPassword($admin_ckpassword);
$admin->setFacebookUrl($facebook_url);
$admin->setTwitterUrl($twitter_url);
$admin->setInstagramUrl($instagram_url);
//$admin_id = $_GET['admin_id'];
$flag=$admin->updateAdmin($admin_id);
$loadminObj = new Locate();

if($flag){
	$_SESSION['update_admin'] = true;
	$_SESSION['update_admin_msg']="The admin successfully updated";
$loadminObj->getLocation('../index.php?page=admin&action=view');
	
}else
{
	$_SESSION['update_not_admin'] = true;
	$_SESSION['update_not_admin_msg']="The admin couldn't be updated";
$loadminObj->getLocation('../index.php?page=admin&action=view');
	}

?>