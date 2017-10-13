<?php
session_start();

require_once('../admin/classes/connection.class.php');
require_once('../classes/test.class.php');

$addtestobj=new Test();

	if(isset($_POST['qa-submit'])){
				$category_id = $_POST['category-id'];
				foreach ($_POST as $key=>$value) {
					/*echo '<pre>';
					print_r($_POST); die();*/
					$question_id = $key;
	  				$answer = $value;
	  				$user_id = $_SESSION['user_id'];

$addtestobj->setQuestionId($question_id);
$addtestobj->setUserAnswer($answer);
$addtestobj->setUserId($user_id);
$addtestobj->setCategoryId($category_id);
//$addtestobj->setCategoryName($category_name);

$flag=$addtestobj->addTest();
$flag = $addtestobj->addScore();
/*echo '<pre>';
print_r ($addtestobj);
echo '</pre>';
exit;*/
}
if($flag){
	
	
     header('location:../profile.php'); 
}
else{
	echo $_SESSION['msg']=$adduserobj->msg="Sorry the user has not been  added, please try again later";
}


	  			
	  			
}




?>