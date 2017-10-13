<?php 
session_start();
if(!isset($_SESSION['username'])){
  header('location:login.php');
}
//var_dump($_SESSION); die();

?>

<div>
	<?php
	require_once('admin/classes/connection.class.php');
	require_once('admin/classes/category.class.php');
	require_once('admin/classes/question-answer.class.php');
	?>
	<?php

	$viewobj=new Category();
	
	$views=$viewobj->viewCategory();

	?>
	
	<!DOCTYPE html>
	<html>
	<head>
	<title>QuizApp | Homepage</title>
	<link rel="stylesheet" type="text/css" href="css/search.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
<!--homepage dropdown-->
<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>	
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/cs-select.css" />
		<link rel="stylesheet" type="text/css" href="css/cs-skin-underline.css" />
<!--homepage dropdown-->
	
	<script src="popup/js/jquery.min.js"></script>
	 <script type="text/javascript" src="js/custom.js"></script>
	</head>
	<?php include('header.php');?>
	<!-- search form 1 -->

<div class="col-md-4"></div>
<div class="col-md-4">
<h2 class="select_cat" style="color:#ff9999">SELECT CATEGORY</h2>
<form name="selectCategory" action="process/process_playQuiz.php" method="post">


			<!-- Top Navigation -->
			
				<select class="cs-select cs-skin-underline" name="category_name">

				<?php 
if(sizeof($views)>0){
foreach ($views as $value) {
	# code...
	
?>
					<option name="category_name"><?php echo $value['category_name'];?></option>
					<?php 
}
}?>
				</select>
			
			<!-- Related demos -->
			

	<button type="submit" name="submit" class="btn btn-primary btn-block" value="submit" id="play">PLAY QUIZ</button>
</form>

	</div>
	<div class="col-md-4"></div>
	
	</script>
	 <script src="js/classie.js"></script>
		<script src="js/selectFx.js"></script>
		<script>
			(function() {
				[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
					new SelectFx(el);
				} );
			})();
		</script>
	        
	      
	</body>
	</html>
</div>