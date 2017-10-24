<?php
require_once('model/connection.class.php');
require_once('model/admin.class.php');
?>
<?php
$admin_id=isset($_GET['admin_id'])?(int)$_GET['admin_id']:'';
$updateObj=new Admin();
$updateObj->setadminId($admin_id);
$admins=$updateObj->viewadmin();
/*echo '<pre>';
print_r($admins);*/
?>

<script type="text/javascript" src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
<form name="add_admin" method="post" action="controller/process_update_admin.php">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Admin</h3>
            </div>
            <?php
            foreach($admins as $value){
            /*  echo '<pre>';
  var_dump($value);*/

?>
           
           <form name="add_admin" method="post" action="controller/process_add_admin.php">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update Admin</h3>
            </div>
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Enter username Here" required="required" value="<?php echo $value['username']?>">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password Again" required="required" value="<?php echo $value['password']?>">
                </div>
                <div class="form-group">
                  <label for="password">Check Password</label>
                  <input type="password" class="form-control" id="ckpassword" name="ckpassword" placeholder="Enter password Again" required="required" value="<?php echo $value['ckpassword']?>">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter email Here" required="required" value="<?php echo $value['email']?>">
                </div>
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone Here" required="required" value="<?php echo $value['phone']?>">
                </div>
                <div class="form-group">
                  <label for="logo">logo</label>
                  <input type="text" class="form-control" id="logo" name="logo" placeholder="Enter logo Here" required="required" value="<?php echo $value['logo']?>">
                </div>
                
                <div class="form-group">
                  <label for="facebook_url">facebook url</label>
                  <input type="text" class="form-control" id="facebook_url" name="facebook_url" placeholder="Enter facebook url Here" required="required" value="<?php echo $value['facebook_url']?>">
                </div>
                <div class="form-group">
                  <label for="twitter_url">twitter url</label>
                  <input type="text" class="form-control" id="twitter_url" name="twitter_url" placeholder="Enter twitter url Here" required="required" value="<?php echo $value['twitter_url']?>">
                </div>
                <div class="form-group">
                  <label for="instagram_url">instagram url</label>
                  <input type="text" class="form-control" id="instagram_url" name="instagram_url" placeholder="Enter instagram url Here" required="required" value="<?php echo $value['instagram_url']?>">
                  <input type="hidden" value="<?php echo $admin_id; ?>" name="admin_id">
                </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="update_admin">Submit</button>
              </div>
            </form>
         <?php }?>
          </div>
      </form>

      