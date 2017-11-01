<?php
session_start();
require_once('../model/connection.class.php');
require_once('../model/ad.class.php');


$addAdObj=new Ad();
if(isset($_POST['add_ad'])){
$ad_id=$_POST['ad_id'];
$ad_company=$_POST['ad_company'];
$ad_url=$_POST['ad_url'];
$ad_package=$_POST['ad_package'];
$ad_image=$_POST['ad_image'];

}
$addAdObj->setAdId($ad_id);
$addAdObj->setAdCompany($ad_company);
$addAdObj->setAdUrl($ad_url);
$addAdObj->setAdPackage($ad_package);
$addAdObj->setAdImage($ad_image);



/*echo '<pre>';
print_r($addCategoryObj);
echo '</pre>';
exit;*/

$flag=$addAdObj->addAd();
/*var_dump($flag);
die();*/

/*echo '<pre>';
print_r($addCategoryObj->addCategory());
echo '</pre>';
exit;*/
if($flag){
		$_SESSION['error']=$addAdObj->er="The Ad is successfully added";
		header('location:../index.php?page=ad&action=view');
	}
else{
	$_SESSION['error']=$addAdObj->er="The ad couldn't be added";
	header('location:../index.php?page=ad&action=add');
	}
?>
