$(function(){
// アコーディオン
    $(".accordion dt").click(function(){
    $(this).next("dd").slideToggle();
    $(this).next("dd").siblings("dd").slideUp();
    $(this).toggleClass("open");    
    $(this).siblings("dt").removeClass("open");
});
    
// スヌーススクロール    
       $('a[href^="#"]').click(function() {
      var speed = 400;
      var href= $(this).attr("href");
      var target = $(href == "#" || href == "" ? 'html' : href);
      var position = target.offset().top;
      $('body,html').animate({scrollTop:position}, speed, 'swing');
      return false;
   });    
    
//page topボタン
var topBtn=$('#pageTop');
topBtn.hide();
$(window).scroll(function(){
  if($(this).scrollTop()>80){
    topBtn.fadeIn();
  }else{
    topBtn.fadeOut();
  }
});
topBtn.click(function(){
  $('body,html').animate({
  scrollTop: 0},500);
  return false;
});
    
    
$('.navToggle').click(function() {
        $(this).toggleClass('active');
 
        if ($(this).hasClass('active')) {
            $('.globalMenuSp').addClass('active');
        } else {
            $('.globalMenuSp').removeClass('active');
        }
    });  

$('.globalMenuSp > ul > li > a').click(function () {
    $('.globalMenuSp').removeClass('active');
  });
    
$('.globalMenuSp > ul > li > a').click(function () {
    $('.navToggle').removeClass('active');
  });    
 
});

