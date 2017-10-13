<?php 

session_start();
require_once('../model/connection.class.php');
require_once('../model/hall.class.php');
//$con = new connection();
$hall=new Hall();

if(isset($_POST['add_hall'])){
$hall_name = $_POST['movie_hall_name'];
$hall_location = $_POST['movie_hall_location'];
$hall_map = $_POST['movie_hall_map'];

}

$hall->setHallName($hall_name);
$hall->sethalllocation($hall_location);
$hall->sethallmap($hall_map);

$flag=$hall->addHall();

if($flag){
	//die('aded');
	$_SESSION['question_added'] = true;
		$_SESSION['question_added_msg']=$addaboutObj->success="The hall successfully added";
		header('location:../index.php?page=hall&action=view');
	}
else{
	die('not added');
	echo "not added";
	
	}

?>

