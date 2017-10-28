<?php

require_once('model/connection.class.php');
require_once('model/upcoming.php');
$viewobj=new Upcoming();
$views=$viewobj->viewUpcomingMovies();
// echo '<pre>';
// var_dump($views);
// die();
?>

          <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                  <th>SN</th>
                 <th>Thumbnail</th>
                 <th>Title</th>
                 <th>Cast</th>
                 <th>Release Date</th>
                 <th>Genre</th>
                 <th>Runtime</th>
                 <th>Trailer</th>
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
                 <td><img src="<?php echo $value['thumbnail_image'];?>"</td>
                 <td><?php echo $value['title'];?> </td>
                 <td><?php echo $value['cast'];?> </td>
                 <td><?php echo $value['release_date'];?> </td>
                 <td><?php echo $value['genre'];?> </td>
                 <td><?php echo $value['runtime'];?> </td>
                 <td><iframe width="187" height="140" src="<?php echo $value['trailer'];?>" frameborder="0" allowfullscreen></iframe> </td>
              </tr>
                <?php
                $i++;
}
}
               ?>
              <tfoot>
                <tr>
                  <th>SN</th>
                 <th>Thumbnail</th>
                 <th>Title</th>
                 <th>Cast</th>
                 <th>Release Date</th>
                 <th>Genre</th>
                 <th>Runtime</th>
                 <th>Trailer</th>
                </tr>
               </tfoot>
             </table>
           </div>
