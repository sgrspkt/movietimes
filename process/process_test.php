<?php
session_start();

require_once('../admin/classes/connection.class.php');
require_once('../classes/test.class.php');


$addtestobj=new Test();
/*$category_name = $_POST['category_name'];
die();*/
/*echo '<pre>';
print_r($addtestobj);
echo '</pre>';
exit;*/

	if(isset($_POST['submit'])){

				$category_name = $_POST['category-name'];
				$_SESSION['category_name'] = $category_name;
				foreach ($_POST as $key=>$value) {
	  				$question_id = $key;
	  				$answer = $value;
	  				$user_id = $_SESSION['user_id'];

$addtestobj->setQuestionId($question_id);
$addtestobj->setUserAnswer($answer);
$addtestobj->setUserId($user_id);
$addtestobj->setCategoryName($category_name);
//$addtestobj->setCategoryName($category_name);

$flag=$addtestobj->addTest();
$flag = $addtestobj->addScore();
/*echo '<pre>';
print_r ($addtestobj);
echo '</pre>';
exit;*/

if($flag){
	
	
     header('location:../profile.php'); 
}
else{
	echo $_SESSION['msg']=$adduserobj->msg="Sorry the user has not been  added, please try again later";
}


	  			}
}




?>