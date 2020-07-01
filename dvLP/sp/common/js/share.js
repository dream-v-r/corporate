// JavaScript Document

// バージョンチェック
// alert($.fn.jquery);

$(function(){
	// スムーズスクロール
	$('a[href^=#]').click(function() {
      var speed = 400; // ミリ秒
	  	var val = $(window).scrollTop();
      var href= $(this).attr("href");
      var target = $(href == "#" || href == "" ? 'html' : href);
	  	var position = target.offset().top;
      $('body,html').stop().animate({scrollTop:position}, speed, 'swing');
      return false;
   });
	 
	 var $topBtn = $('#topBtn');
	 $(window).on('scroll' , function(){
		 var $scrollTop = $(window).scrollTop();
		 if($scrollTop > 500){
			 $topBtn.fadeIn();
		 }else{
			 $topBtn.fadeOut();
		 }
	 });




});
