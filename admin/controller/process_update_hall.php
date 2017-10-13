<?php
session_start();
require_once('../model/connection.class.php');
require_once('../model/hall.class.php');
require_once('../model/locate.class.php');
?>
<?php
if(isset($_POST['update_hall'])){

echo $hall_id = $_POST['hall_id'];
die();
$hall_name=$_POST['hall_name'];
$hall_location=$_POST['hall_location'];
$hall_map=$_POST['hall_map'];

}

$updateHallObj = new Hall();
$updateHallObj->setHallId($hall_id);
$updateHallObj->setHallName($hall_name);
$updateHallObj->setHallLocation($hall_location);
$updateHallObj->setHallMap($hall_map);

$flag=$updateHallObj->updateHall();
$lohallObj = new Locate();

if($flag){
	$_SESSION['update_hall'] = true;
	$_SESSION['update_hall_msg']="The hall successfully updated";
$lohallObj->getLocation('../index.php?page=hall&action=view');
	
}else
{
	$_SESSION['update_not_hall'] = true;
	$_SESSION['update_not_hall_msg']="The hall couldn't be updated";
$locateObj->getLocation('../index.php?page=hall&action=view');
	}

?>