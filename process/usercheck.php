<?php 
require_once('../admin/classes/connection.class.php');
require_once('../classes/user.class.php');

$userCheck = new user();
$view = $userCheck->checkUsername();
echo $view;
?>