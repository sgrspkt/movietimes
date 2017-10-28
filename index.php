<?php
/*session_start();
if(!isset($_SESSION['username'])){
  header('location:login.php');
}*/
//var_dump($_SESSION); die();

?>

<div>
	<?php
	require_once('admin/model/connection.class.php');
	require_once('admin/model/nowshowing.php');
	require_once('admin/model/upcoming.php');

	?>
	<?php

	$viewobj=new Nowshowing();
	$viewUpcommingobj=new Upcoming();

	$nowshowing=$viewobj->addMovie();
	$upcoming=$viewUpcommingobj->addUpcomingMovie();



	?>
