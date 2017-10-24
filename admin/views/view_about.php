 <?php

require_once('model/connection.class.php');
require_once('model/about.class.php');
$viewobj=new About();
$views=$viewobj->viewAbout();
/*echo '<pre>';
var_dump($views);
echo '<pre>';
die();*/
?>
 
           <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th>About Id</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php

  if(sizeof($views>0)){
    
  foreach($views as $value){

    ?>
                <tr>
                 <td><?php echo $value['about_id'];?></td>
                  <td><?php echo $value['about_title'];?> </td>
                  <td><?php echo $value['about_desc'];?> </td>
                  <td><img src="uploads/<?php echo $value['about_thumbnail'];?>" height="200px" width="200px"/> </td>
                  <td>
                  <a href="index.php?page=about&action=update&about_id=<?php echo $value['about_id'];?>">
                  <button type="button" class="btn btn-block btn-primary">Update</button>

                  <a onClick="return confirm('Are you sure you want to delete')" href="index.php?page=about&action=delete&hall_id=<?php echo $value['about_id'];?>">
                                    <button type="button" class="btn btn-block btn-danger">Delete</button></a>
                  </td>
                </tr>
                 <?php
}
}
                ?>
               
              </table>
            </div>