<?php
require_once('admin/model/connection.class.php');
require_once('admin/model/upcoming.php');

$viewobj=new Upcoming();
$addMovie=$viewobj->addUpcomingMovie();

$views = $viewobj->viewUpcomingMovies();

// $viewobj=new Upcoming();
// $views=$viewobj->viewUpcomingMovies();
// var_dump($views);



?>
<h3 class="agile_w3_title">Upcoming <span>Movies</span> </h3>
<div class="wthree_agile-requested-movies" id="upcoming">
  <div class="upcoming-movies">
  <?php
  // echo '<pre>';
  // var_dump($views);
  
  $i=1;
  if(sizeof($views>0)){
  foreach($views as $value){
    $old = $value['thumbnail_image'];
    $new =  substr($old, 0, strpos($old, "&"));

  ?>
  
       <div class="col-md-2 w3l-movie-gride-agile requested-movies">
                 <a href="single.php?id=<?php echo $value['upcoming_movie_id']?>" class="hvr-sweep-to-bottom">
                   <img src="<?php echo $new;?>" width="300px" height="300px" title="Movies Pro" class="img-responsive" id="img-res-<?php echo $i;?>">
                   <div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
                 </a>
                   <div class="mid-1 agileits_w3layouts_mid_1_home">
                     <div class="w3l-movie-text">
                       <h6><a href="single.php?id=<?php echo $value['upcoming_movie_id']?>"><?php echo $value['title'];?></a></h6>
                     </div>
                     <div class="mid-2 agile_mid_2_home">
                       <p><?php echo $value['release_date'];?></p>
                       <div class="block-stars">
                         <ul class="w3l-ratings">
                           <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                         </ul>
                       </div>
                       <div class="clearfix"></div>
                     </div>
                   </div>
                 <div class="ribben one">
                   <p>NEW</p>
                 </div>
             </div>



</div>
<?php
$i++;
}
}else{
  echo 'no data found';
}
?>
</div>

<div class="clearfix"></div>
<!-- </div>
</div> -->
