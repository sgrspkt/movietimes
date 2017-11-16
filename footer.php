<?php
require_once('admin/model/connection.class.php');
require_once('admin/model/upcoming.php');
$viewobj=new Upcoming();
$views=$viewobj->viewUpcomingMovies();


?>
<div class="contact-w3ls" id="contact">
  <div class="footer-w3lagile-inner">
    <h2>Sign up for our <span>Newsletter</span></h2>
    <p class="para">Do subscribe to know the information about now showing and upcomming movie.</p>
    <div class="footer-contact">
      <form action="admin/controller/process_add_subscribe.php" method="post">
        <input type="email" name="email" placeholder="Enter your email...." required="required">
        <input type="submit" value="Subscribe" name="submit_subscribe">
       
      </form>

    
     
    </div>    
      <h3 class="text-center follow">Connect <span>Us</span></h3>
        <ul class="social-icons1 agileinfo">
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
          <li><a href="#"><i class="fa fa-youtube"></i></a></li>
          <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
        </ul>

   </div>

  </div>
  <div class="w3agile_footer_copy">
        <p>© 2017 Movie Times. All rights reserved | Design by <a href="http://sagars.com.np/movietimes">MovieTimes</a></p>
  </div>
<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

<script src="js/jquery-1.11.1.min.js"></script>
<!-- Dropdown-Menu-JavaScript -->
  <script>
    $(document).ready(function(){
      $(".dropdown").hover(
        function() {
          $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
          $(this).toggleClass('open');
        },
        function() {
          $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
          $(this).toggleClass('open');
        }
      );
    });
  </script>
<!-- //Dropdown-Menu-JavaScript -->


<script type="text/javascript" src="js/jquery.zoomslider.min.js"></script>
<!-- search-jQuery -->
    <script src="js/main.js"></script>
  <script src="js/simplePlayer.js"></script>
  <script>
    $("document").ready(function() {
      $("#video").simplePlayer();
    });
  </script>
  <script>
    $("document").ready(function() {
      $("#video1").simplePlayer();
    });
  </script>
  <script>
    $("document").ready(function() {
      $("#video2").simplePlayer();
    });
  </script>
    <script>
    $("document").ready(function() {
      $("#video3").simplePlayer();
    });
  </script>

  <!-- pop-up-box -->
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<!--//pop-up-box -->

  <div id="small-dialog1" class="mfp-hide">
  <iframe src="https://player.vimeo.com/video/165197924?color=ffffff&title=0&byline=0&portrait=0"></iframe>
</div>
<div id="small-dialog2" class="mfp-hide">
<iframe src="https://player.vimeo.com/video/165197924?color=ffffff&title=0&byline=0&portrait=0"></iframe>
</div>
<script>
$(document).ready(function() {
$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
  type: 'inline',
  fixedContentPos: false,
  fixedBgPos: true,
  overflowY: 'auto',
  closeBtnInside: true,
  preloader: false,
  midClick: true,
  removalDelay: 300,
  mainClass: 'my-mfp-zoom-in'
});

});
</script>
<script src="js/easy-responsive-tabs.js"></script>
<script>
$(document).ready(function () {
$('#horizontalTab').easyResponsiveTabs({
type: 'default', //Types: default, vertical, accordion
width: 'auto', //auto or any width like 600px
fit: true,   // 100% fit in a container
closed: 'accordion', // Start closed if in accordion view
activate: function(event) { // Callback function if tab is switched
var $tab = $(this);
var $info = $('#tabInfo');
var $name = $('span', $info);
$name.text($tab.text());
$info.show();
}
});
$('#verticalTab').easyResponsiveTabs({
type: 'vertical',
width: 'auto',
fit: true
});
});
</script>
<link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all">
<script src="js/owl.carousel.js"></script>
<script>
$(document).ready(function() {
$("#owl-demo").owlCarousel({

 autoPlay: 3000, //Set AutoPlay to 3 seconds
  autoPlay : true,
   navigation :true,

  items : 5,
  itemsDesktop : [640,4],
  itemsDesktopSmall : [414,3]

});

});
</script>

<!--/script-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    $(".scroll").click(function(event){
      event.preventDefault();
      $('html,body').animate({scrollTop:$(this.hash).offset().top},900);
    });
  });
</script>
<script type="text/javascript">
        $(document).ready(function() {
          /*
          var defaults = {
              containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
          };
          */

          $().UItoTop({ easingType: 'easeOutQuart' });

        });
      </script>
<!--end-smooth-scrolling-->
<script src="js/bootstrap.js"></script>
<script src="js/custom.js"></script>
