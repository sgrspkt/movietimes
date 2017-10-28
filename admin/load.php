<?php
$page = isset($_GET['page']) ? $_GET['page'] : '';

$action = isset($_GET['action']) ? $_GET['action'] : '';


switch($page){
/*admin section */

case 'admin':
if($action == 'add'){

$page_to_load = "views/add_admin.php";
break;
}
else if($action == 'view'){
$page_to_load= "views/view_admin.php";
break;
}else if ($action=='delete'){
	$page_to_load="controller/process_admin.php";
	break;
}
	else if($action=='update'){
		$page_to_load="views/update_admin.php";
	break;
	}
default:
{
	$page_to_load="dashboard.php";
}

/*hall section */

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
		$page_to_load="views/update_moviehall.php";
	break;
	}
default:
{
	$page_to_load="dashboard.php";
}

/*about section */

case 'about':
if($action == 'add'){

$page_to_load = "views/add_about.php";
break;
}
else if($action == 'view'){
$page_to_load= "views/view_about.php";
break;
}else if ($action=='delete'){
	$page_to_load="controller/process_about.php";
	break;
}
	else if($action=='update'){
		$page_to_load="views/update_about.php";
	break;
	}
default:
{
	$page_to_load="dashboard.php";
}


				/*now showing Section*/

case 'nowshowing';
if($action == 'view'){
$page_to_load= "views/nowshowing.php";
}
break;
default:
{
	$page_to_load="dashboard.php";
}

/*upcoming Section*/

case 'upcoming';
if($action == 'view'){
$page_to_load= "views/upcoming.php";
}
break;
default:
{
$page_to_load="dashboard.php";
}

}
?>
