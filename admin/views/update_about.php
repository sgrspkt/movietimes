<?php
require_once('model/connection.class.php');
require_once('model/about.class.php');
?>
<?php
$about_id=isset($_GET['about_id'])?(int)$_GET['about_id']:'';
$updateObj=new About();
$updateObj->setAboutId($about_id);
$abouts=$updateObj->viewAbout();
/*echo '<pre>';
print_r($abouts);
die();*/
?>

<script type="text/javascript" src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
<form name="add_about" method="post" action="controller/process_update_about.php">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update about</h3>
            </div>
            <?php
            foreach($abouts as $value){
            /*  echo '<pre>';
  var_dump($value);*/

?>
           
           <form name="add_about" method="post" action="controller/process_add_about.php">
<div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Update about</h3> -->
            </div>
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="about_title" name="about_title" placeholder="Enter title Here" required="required" value="<?php echo $value['about_title']?>">
                </div>
                <div class="form-group">
                  <label for="desc">Description</label>
                  <input type="about_desc" class="form-control" id="about_desc" name="about_desc" placeholder="Enter Description Here" required="required" value="<?php echo $value['about_desc']?>">
                </div>
                 <div class="form-group">
                  <label for="aboutthumbnail">Image</label>
                  <input type="file" class="form-control" name="about_thumbnail" id="about_thumbnail" required="required" value="<?php echo $value['final_file_name']?>" />
                  <input type="hidden" name="about_id" value="<?php echo $value['about_id'];?>">
                </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="update_about">Submit</button>
              </div>
            </form>
         <?php }?>
          </div>
      </form>

      