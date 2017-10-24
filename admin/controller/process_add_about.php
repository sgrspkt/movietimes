<?php
session_start();
require_once('../model/connection.class.php');
require_once('../model/about.class.php');

$addAboutObj=new About();

if(isset($_POST['add_about'])){
$about_id=$_POST['about_id'];
$about_title=$_POST['about_title'];
$about_desc=$_POST['about_desc'];
$about_thumbnail=$_POST['about_thumbnail'];

}
$addAboutObj->setAboutId($about_id);
$addAboutObj->setAboutTitle($about_title);
$addAboutObj->setAboutDesc($about_desc);
$addAboutObj->setAboutThumbnail($about_thumbnail);



/*echo '<pre>';
print_r($addCategoryObj);
echo '</pre>';
exit;*/

$flag=$addAboutObj->addAbout();
/*var_dump($flag);
die();*/

/*echo '<pre>';
print_r($addCategoryObj->addCategory());
echo '</pre>';
exit;*/
if($flag){
		$_SESSION['error']=$addAboutObj->er="The about successfully added";
		header('location:../index.php?page=about&action=view');
	}
else{
	$_SESSION['error']=$addAboutObj->er="The about couldn't be added";
	header('location:../index.php?page=about&action=add');
	}
?>