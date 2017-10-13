 <?php

require_once('model/connection.class.php');
require_once('model/hall.class.php');
$viewobj=new Hall();
$views=$viewobj->viewHall();

?>
 
           <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th>Hall Id</th>
                  <th>Hall Name</th>
                  <th>Hall Location</th>
                  <th>Hall Map</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php

  if(sizeof($views>0)){
    
  foreach($views as $value){

    ?>
                <tr>
                 <td><?php echo $value['hall_id'];?></td>
                  <td><?php echo $value['hall_name'];?> </td>
                  <td><?php echo $value['location'];?> </td>
                  <td><?php echo $value['map'];?> </td>
                  <td>
                  <a href="index.php?page=hall&action=update&hall_id=<?php echo $value['hall_id'];?>">
                  <button type="button" class="btn btn-block btn-primary">Update</button>

                   <a onClick="return confirm('Are you sure you want to delete')" href="index.php?page=hall&action=delete&hall_id=<?php echo $value['hall_id'];?>">
                  <button type="button" class="btn btn-block btn-danger">Delete</button></a>
                  </td>
                </tr>
                 <?php
}
}
                ?>
               <tfoot>
                <tr>
                  <th>Hall Id</th>
                  <th>Hall Name</th>
                  <th>Hall Location</th>
                  <th>Hall Map</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>