<?php

require_once('model/connection.class.php');
require_once('model/nowshowing.php');
$viewobj=new Nowshowing();
$views=$viewobj->viewMovies();
// echo '<pre>';
// var_dump($views);
// die();
?>

          <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                  <th>SN</th>
                 <th>Hall Detail</th>
                 <th>Contact Detail</th>
                 <th>Time Detail</th>
                 <th>Ticket Detail</th>
               </tr>
               </thead>
               <tbody>
                 <?php

 if(sizeof($views>0)){
$i = 1;
 foreach($views as $value){

   ?>
               <tr>
                <td><?php echo $i;?></td>
                 <td><?php echo $value['hall_detail'];?> </td>
                 <td><?php echo $value['contact_detail'];?> </td>
                 <td><?php echo $value['time_detail'];?> </td>
                 <td><?php echo $value['ticket_detail'];?> </td>
              </tr>
                <?php
                $i++;
}
}
               ?>
              <tfoot>
                <tr>
                   <th>SN</th>
                  <th>Hall Detail</th>
                  <th>Contact Detail</th>
                  <th>Time Detail</th>
                  <th>Ticket Detail</th>
                </tr>
               </tfoot>
             </table>
           </div>
