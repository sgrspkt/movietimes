$(document).ready(function(){
$('.requested-movies').each(function(){
  //var id = $('.requested-movies .img-responsive').attr('id');
  //jQuery(this).children("img");
  var src = $('.requested-movies .hvr-sweep-to-bottom .img-responsive').attr('src');
  //var res = src.replace('220','550');
  console.log(src.replace(/220/g, "550"));
  src.replace(/140/g, "550");
  src.replace(/4:/g, "3");

})
$(".first").click(function(){
    $(".second").click(); 
});
})
