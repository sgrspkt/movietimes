<?php
session_start();
require_once('../model/connection.class.php');
require_once('../model/about.class.php');
require_once('../model/locate.class.php');
?>
<?php
if(isset($_POST['update_about'])){
$about_id=$_POST['about_id'];
$about_title=$_POST['about_title'];
$about_desc=$_POST['about_desc'];
$about_thumbnail=$_POST['about_thumbnail'];
}
$updateaboutObj=new About();
$updateaboutObj->setAboutId($about_id);
$updateaboutObj->setAboutTitle($about_title);
$updateaboutObj->setAboutDesc($about_desc);
$updateaboutObj->setAboutThumbnail($about_thumbnail);
//$updateaboutObj->updateabout();

$flag=$updateaboutObj->updateAbout();
$updateaboutObj = new Locate();

/*echo '<pre>';
var_dump($flag);
echo '</pre>';
exit;*/


if($flag){
	$_SESSION['update_about']="The about successfully updated";
//new Locate('../index.php?page=about&action=view');	
$updateaboutObj->getLocation('../index.php?page=about&action=view');
	
}else
{
	$_SESSION['update_not_about']="The about couldn't be updated";
	$updateaboutObj->getLocation('../index.php?page=about&action=add');

	}

?>