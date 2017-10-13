<?php
session_start();

require_once('../admin/classes/connection.class.php');
require_once('../classes/user.class.php');

$adduserobj=new User();
/*echo '<pre>';
print_r($adduserobj);
echo '</pre>';
exit;*/

//$user_id=mysqli_real_escape_string($adduserobj->conxn,$_POST['user_id']);
$first_name=mysqli_real_escape_string($adduserobj->conxn,$_POST['first_name']);
$middle_name=mysqli_real_escape_string($adduserobj->conxn,$_POST['middle_name']);
$last_name=mysqli_real_escape_string($adduserobj->conxn,$_POST['last_name']);

$username=mysqli_real_escape_string($adduserobj->conxn,$_POST['username']);

$password=mysqli_real_escape_string($adduserobj->conxn,$_POST['password']);
$password = md5($password);
$ckpassword=mysqli_real_escape_string($adduserobj->conxn,$_POST['ckpassword']);
$ckpassword = md5($ckpassword); 
 $email=mysqli_real_escape_string($adduserobj->conxn,$_POST['email']);
 $address=mysqli_real_escape_string($adduserobj->conxn,$_POST['address']);
 $dob=mysqli_real_escape_string($adduserobj->conxn,$_POST['dob']);
 $user_thumb_image = mysqli_real_escape_string($adduserobj->conxn,$_FILES['user_thumb_image']['name']);
 $phone_numbers = $_POST['fields'];

//$adduserobj->setUserID($user_id);
$adduserobj->setFirstName($first_name);
$adduserobj->setMiddleName($middle_name);
$adduserobj->setLastName($last_name);
$adduserobj->setUsername($username);
$adduserobj->setPassword($password);
$adduserobj->setCkPassword($ckpassword);
$adduserobj->setEmail($email);
$adduserobj->setAddress($address);
$adduserobj->setDob($dob);
$adduserobj->setUserThumbImage($user_thumb_image);
$adduserobj->setPhoneNumber($phone_numbers);



//$adduserobj->setError($er);
//$adduserobj->setMessage($msg);


$flag=$adduserobj->addUser();
/*echo '<pre>';
print_r ($adduserobj);
echo '</pre>';
exit;*/

if($flag){
	$_SESSION['user_added'] = true;
	$_SESSION['user_added_msg']=$adduserobj->msg="Thanks, You have registered sucessfully";
     header('location:../login.php'); 
}
else{
	echo $_SESSION['msg']=$adduserobj->msg="Sorry the user has not been  added, please try again later";
}

?>