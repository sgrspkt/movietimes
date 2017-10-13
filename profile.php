 <?php
 session_start();
require_once('admin/classes/connection.class.php');
require_once('classes/user.class.php');
require_once('classes/test.class.php');


$viewobj=new User();
$viewScore = new Test();

if(isset($_SESSION['user_id'])){
$user_id = $_SESSION['user_id'];
$viewobj->setUserId($user_id);

$views=$viewobj->viewUser();

$viewScore->setUserId($user_id);

$highView = $viewScore->getHighestScore();




/*echo '<pre>';
print_r($highView);
echo '</pre>';
die();*/

?>
 
                
               
<link rel="stylesheet" type="text/css" href="css/style.css">
<?php 
include('header.php');
?>
<div class="container">
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
<div class="box-body box-profile">

  <?php
  if(sizeof($views>0)){
  foreach($views as $value){

 
  ?>
  <?php if($value['user_thumb_image']!=''){?>
               <div class="photo">
                  <img class="profile-user-img img-responsive img-circle" src="uploads/<?php echo $value['user_thumb_image'];?>" alt="User profile picture" width="200px" height="200px">
                </div>
                <?php }else{?>
                <div class="photo">
                  <img class="profile-user-img img-responsive img-circle" src="uploads/no_photo.jpg" alt="User profile picture" width="120px" height="120px">
                </div>
                <?php }?>
                  <h3 class="profile-username text-center"><?php echo $value['first_name'].' '.$value['middle_name'].' '.$value['last_name'];?></h3>
               
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Username</b> <a class="pull-right"><?php echo $value['username'];?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Email</b> <a class="pull-right"><?php echo $value['email'];?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Address</b> <a class="pull-right"><?php echo $value['address'];?></a>
                    </li>
                     <li class="list-group-item">
                      <b>Date Of Birth</b> <a class="pull-right"><?php echo $value['dob'];?></a>
                    </li>

                       <?php
              }
}


                ?>

                <?php foreach ($highView as $value) {
                  # code...
                ?>

                     <li class="list-group-item">
                      <b>Total Score</b> <a class="pull-right"><?php echo $value['correct_answer'];?></a>
                    </li>
                    <?php 
}
                    ?>


                  </ul>
               

                  <a href="index.php" class="btn btn-primary btn-block"><b>Play Quiz</b></a>
                </div>
                </div>
                <div class="col-md-4"></div>
                </div>
                </div>
                <?php }else{?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<?php 
include('header.php');
?>
  <a href="index.php" class="btn btn-primary"><b>Play Quiz</b></a>
<?php }?>
<style type="text/css">
	.box-body {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 10px;
}
.img-circle{
	margin-top:-30px;
	margin-left: 100px;
}
h3{
	color:white;
}
