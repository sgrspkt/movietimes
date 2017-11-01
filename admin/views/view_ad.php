 <?php

require_once('model/connection.class.php');
require_once('model/ad.class.php');
$viewobj=new Ad();
$views=$viewobj->viewAd();
// echo '<pre>';
// var_dump($views);
// echo '<pre>';
// die();
?>

           <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th>Ad Id</th>
                  <th>Company Name</th>
                  <th>Url</th>
                  <th>Package</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Action</th>
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
                  <td><?php echo $value['ad_company'];?> </td>
                  <td><?php echo $value['ad_url'];?> </td>
                  <td><?php
                  switch ($value['ad_package']) {
                    case '0':
                      echo '<button type="button" class="btn btn-block btn-primary">Weekly</button>';
                      break;
                      case '1':
                        echo '<button type="button" class="btn btn-block btn-success">Monthly</button>';
                        break;
                        case '2':
                        echo '<button type="button" class="btn btn-block btn-info">6 months</button>';
                          break;
                          case '3':
                          echo '<button type="button" class="btn btn-block btn-warning">Yearly</button>';
                            break;

                    default:
                        echo '<button type="button" class="btn btn-block btn-primary">Weekly</button>';
                      break;
                  } ?>
                </td>

                  <td><img src="uploads/<?php echo $value['ad_image'];?>" height="200px" width="200px"/> </td>
                  <td><?php
                  switch ($value['ad_action']) {
                    case '0':
                      echo '<button type="button" class="btn btn-block btn-success" value="0">Active</button>';
                      break;
                      case '1':
                        echo '<button type="button" class="btn btn-block btn-danger" value="1">Inactive</button>';
                        break;

                    default:
                      echo '<button type="button" class="btn btn-block btn-success">Active</button>';
                      break;
                  }
                  ?></td>
                  <td><div class="btn-group">
                  <button type="button" class="btn btn-info">Action</button>
                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="index.php?page=ad&action=update&ad_id=<?php echo $value['ad_id'];?>&val=0" class="action-enable">Enable</a></li>
                    <li><a href="index.php?page=ad&action=update&ad_id=<?php echo $value['ad_id'];?>&val=1" class="action-disable">Disable</a></li>
                  </ul>
                </div></td>
                </tr>
                 <?php
                 $i++;
}
}
                ?>

              </table>
            </div>
