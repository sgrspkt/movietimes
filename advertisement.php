<?php
require_once('admin/model/connection.class.php');
require_once('admin/model/ad.class.php');
$ads=new Ad();
$adsObj=$ads->viewFrontendAd();
// echo '<pre>';
// print_r($adsObj);

?>

<h3 class="agile_w3_title">Advertise <span>ment</span> </h3>
<div class="wthree_agile-requested-movies" id="upcoming">
  <?php
  // echo '<pre>';
  // var_dump($views);
  $i=1;
  if(sizeof($adsObj>0)){
  foreach($adsObj as $value){
  ?>
       <div class="col-md-2 w3l-movie-gride-agile requested-movies">
                 <a href="<?php echo $value['ad_url'];?>" class="hvr-sweep-to-bottom" target="_blank"><img src="admin/uploads/<?php echo $value['ad_image'];?>" width="250px" height="300px" title="Movies Pro" class="img-responsive" id="img-res-<?php echo $i;?>">
                   <div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
                 </a>
                   <div class="mid-1 agileits_w3layouts_mid_1_home">
                     <div class="w3l-movie-text">
                       <h6><a href="<?php echo $value['ad_url']?>" target="_blank"></a><?php echo $value['ad_company'];?></h6>
                     </div>
                     <div class="mid-2 agile_mid_2_home">
                       <p><?php //echo $value['release_date'];?></p>

                       <div class="clearfix"></div>
                     </div>
                   </div>

             </div>


</div>
<?php
// $i++;
}
}
?>


<div class="clearfix"></div>
</div>
