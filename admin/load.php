<?php
$page = isset($_GET['page']) ? $_GET['page'] : '';

$action = isset($_GET['action']) ? $_GET['action'] : '';


switch($page){
			/*question section */

case 'hall':
if($action == 'add'){
	
$page_to_load = "views/add_moviehall.php";
break;
}
else if($action == 'view'){
$page_to_load= "views/view_moviehall.php";
break;
}else if ($action=='delete'){
	$page_to_load="controller/process_moviehall.php";
	break;
}
	else if($action=='update'){
		$page_to_load="view/update_moviehall.php";
	break;
	}
default:
{
	$page_to_load="dashboard.php";
}

		

				/*Score Section*/

case 'score';
if($action == 'view'){
$page_to_load= "views/view_score.php";
}
break;
default:
{
	$page_to_load="dashboard.php";
}

}
?>