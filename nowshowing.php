<?php
require_once('admin/model/connection.class.php');
require_once('admin/model/nowshowing.php');
$now=new Nowshowing();
$addMovie = $now->addMovie();
$nowviews=$now->viewMovies();


?>
<h3 class="agile_w3_title" id="now-showing"> Now Showing <span>Movies</span></h3>
<!--/movies-->
<div class="w3_agile_latest_movies" >

<div id="owl-demo" class="owl-carousel owl-theme">
  <?php
  // echo '<pre>';
  // var_dump($nowviews);
  $i=1;
  if(sizeof($nowviews>0)){
  foreach($nowviews as $value){
   /* echo '<pre>';
    var_dump($value);*/
    if(!empty($value['time_detail'])){    
  ?>
<div class="item">
  <div class="w3l-movie-gride-agile w3l-movie-gride-slider ">
    <div class="movie_time_detail">
    <?php 
    echo $value['time_detail'] = strip_tags($value['time_detail']);
    //echo $value['ticket_detail'];
    //echo $value['time_detail'];
    ?>
  </div>
   
    <div class="mid-1 agileits_w3layouts_mid_1_home">
      <div class="w3l-movie-text">
        <h6><a href="#"><?php echo $value['hall_detail'];?></a></h6>
      </div>
      <?php echo $value['contact_detail'];?>
      <div class="mid-2 agile_mid_2_home">
        <div class="block-stars">
          <ul class="w3l-ratings">
            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
          </ul>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<?php
}} }
?>
   </div>
  </div>
