<?php
require_once('model/connection.class.php');
require_once('model/ad.class.php');
require_once('model/locate.class.php');
?>
<?php
$ad_id=isset($_GET['ad_id'])?(int)$_GET['ad_id']:'';
$ad_status=isset($_GET['val'])?(int)$_GET['val']:'';
$updateObj=new Ad();
$updateObj->setAdId($ad_id);
$updateObj->setAdAction($ad_status);
$ad=$updateObj->updateAd();
/*echo '<pre>';
print_r($abouts);
die();*/

$lohallObj = new Locate();

if($ad){
	$_SESSION['update_ad'] = true;
	$_SESSION['update_ad_msg']="The ad successfully updated";
$lohallObj->getLocation('index.php?page=ad&action=view');

}else
{
	$_SESSION['update_not_ad'] = true;
	$_SESSION['update_not_ad_msg']="The ad couldn't be updated";
$locateObj->getLocation('../index.php?page=ad&action=view');
	}
?>
