 <?php

require_once('model/connection.class.php');
require_once('model/subscribe.class.php');
$viewobj=new subscribe();
$views=$viewobj->viewSubscriber();
// echo '<pre>';
// var_dump($views);
// echo '<pre>';
// die();
?>

           <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th>Subscriber Id</th>
                  <th>Subscriber Email</th>
                  <th>Subscribed Date</th>
                </tr>
                </thead>
                <tbody>
                  <?php

  if(sizeof($views>0)){
$i=1;
  foreach($views as $value){

    ?>
                <tr>
                 <td><?php echo $i;?></td>
                  <td><?php echo $value['subscriber_email'];?> </td>
                  <td><?php echo $value['subscriber_date'];?> </td>

                 <?php
                 $i++;
}
}
                ?>

              </table>
            </div>
