<?php

session_start();
require_once('../model/connection.class.php');
require_once('../model/rating.class.php');
//$con = new connection();
$rate=new Rating();
// var_dump($rating);
// die();

if(isset($_POST['submit_rating'])){
$name = $_POST['name'];
$email = $_POST['email'];
$rating = $_POST['rating'];
$movie_id = $_POST['movie_id'];

}

$rate->setName($name);
$rate->setEmail($email);
$rate->setRatingValue($rating);
$rate->setMovieId($movie_id);

$flag=$rate->addRating();

if($flag){
	$_SESSION['rating'] = true;
		//$_SESSION['rating_msg']=$addaboutObj->success="The hall successfully added";
		header('location:../../single.php?id='.$movie_id);
	}
else{
	die('not added');

	}

?>
