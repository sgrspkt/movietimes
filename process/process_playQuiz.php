<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="../js/custom.js"></script>
<link rel="stylesheet" type="text/css" href="../css/custom.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/cs-seleect.css">
<link rel="stylesheet" type="text/css" href="../css/cs-skin-underline.css">
<link rel="stylesheet" type="text/css" href="../css/creditly.css">
</head>
<body>


<?php 

session_start();
require_once('../admin/classes/connection.class.php');
require_once('../admin/classes/question-answer.class.php');
require_once('../admin/classes/category.class.php');

$addQaObj=new QuestionAnswer();
$catObj = new Category();

if(isset($_POST['submit'])){
	$category_name = $_POST['category_name'];
}
$_SESSION['category_name'] = $category_name;
$catObj->setcategoryName($category_name);
$views = $catObj->viewCategory();
if(sizeof($views)>0){
	foreach ($views as $value) {
		# code...
		$category_id = $value['category_id'];
	}
}

$addQaObj->setCategoryId($category_id);
$views = $addQaObj->viewQa();
/*echo '<pre>';
print_r($views);
echo '</pre>';
die();*/


//echo '<a href="">&times;</a>';
echo '<button type="button" class="close">&times;</button>';
echo '<section class="creditly-wrapper"><div class="credit-card-wrapper"><form name="question-answer" method="post" action="check.php"><div class="alert alert-danger" id="num"></div>';
if(sizeof($views)>0){
	$newArr = array();
	    foreach($views as $key=>$paper) {

	        $id = $paper['question_title'];
	        $question_id = $paper['question_id'];
	        
	        if (!isset($newArr[$id])) {
	            $newArr[$id] = $paper;
	            $newArr[$id]['answer'] = array();
	        }
	        $newArr[$id]['answer'][] = $paper['answer'];
	    }
	
	    $ques = 1;
	$counter = 0;
	$i = 0;


	  foreach($newArr as $key=>$value){
	  	/*echo '<pre>';
	  	print_r($newArr); die();*/

	  	$count = sizeof($newArr);
	  	$remaining = $count-$ques;
	  	echo '<div class="question-wrapper">Q.'.$ques.' out of '.$count.'<div class="right-ans-rem">Questions Remaining:'.$remaining.'</div><table id="questions-'.$counter.'" class="table table-bordered table-hover" border="0">';
	   echo '<tr><td>'.$value['question_title'].'</td></tr>' ;
	  // $question_id = $value['$question_id'];
	  	foreach ($value['answer'] as $key => $values) {
	  		# code...
	  		/*echo '<pre>';
	  		print_r($values); */
	  		echo '<tr><td><input type="radio" id="'.$i.'" name="'.$value['question_id'].'" class="answer" value="'.$values.'"><label for="'.$i.'">'.$values.'</label></td></tr>';
	  		$i++;
	  	}

	 
	echo '</table><ul class="pager">
	  <li class="previous" id="prev"><a href="#">Previous</a></li>
	  <li class="next" name="next" id="next"><a href="#">Next</a></li>
	</ul>';
echo '<button type="submit" name="qa-submit" value="submit" id="submitbtn" class="btn btn-primary">SUBMIT</button></div>';
	  ?>    
	                <?php
	                $counter++;
	                $ques++;
	}
}
echo '<input type="hidden" name="category-id" value="'.$category_id.'"/>';

echo '</form></div>
					</section>';
?>
</html>
