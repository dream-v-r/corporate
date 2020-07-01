// JavaScript Document

$(function(){
	$('a').hover(
		function(){
			$(this).css("opacity",0.5)
		},
		function(){
			$(this).css("opacity",1)
		}
	);

	// スムーズスクロール
	$('a[href^=#]').click(function() {
      var speed = 400; // ミリ秒
	  var val = $(window).scrollTop();
      var href= $(this).attr("href");
      var target = $(href == "#" || href == "" ? 'html' : href);
	  var position = target.offset().top-10;
	  //if(position<664){ position=0; }
      $('body,html').stop().animate({scrollTop:position}, speed, 'swing');
      return false;
   });



/*
	
 $('#clniccon .cliniacc').next().css('display','none');
 $(' #clniccon .cliniacc').bind('click', function() {
  $(this).next().slideToggle(400);
  var titleImg = $(this).find('p'); 
  var imgURL = titleImg.css('background-image');
  if(imgURL.search(/open/) > 0){
   imgURL = imgURL.replace(/open/g,'close');
   titleImg.css('background-image',imgURL);
  }else if(imgURL.search(/close/) > 0){
   imgURL = imgURL.replace(/close/g,'open');
   titleImg.css('background-image',imgURL);
  }
 })
	

	
 $('#footer h2').next().css('display','none');
 $(' #footer h2').bind('click', function() {
  $(this).next().slideToggle(400);
  var titleImg = $(this).find('img'); 
  var imgURL = titleImg.attr('src');
  if(imgURL.search(/open/) > 0){
   imgURL = imgURL.replace(/open/g,'close');
   titleImg.attr('src',imgURL);
  }else if(imgURL.search(/close/) > 0){
   imgURL = imgURL.replace(/close/g,'open');
   titleImg.attr('src',imgURL);
  }
 })
 */
 /*
 $('#drcon .dracc').next().css('display','none');
 $(' #drcon .dracc').bind('click', function() {
  $(this).next().slideToggle(400);
  var titleImg = $(this).find('h2:first'); 
  var imgURL = titleImg.css('background-image');
  if(imgURL.search(/open/) > 0){
   imgURL = imgURL.replace(/open/g,'close');
   titleImg.css('background-image',imgURL);
  }else if(imgURL.search(/close/) > 0){
   imgURL = imgURL.replace(/close/g,'open');
   titleImg.css('background-image',imgURL);
  }
 })
 */
 	
 
 
 /*
  $('#footer .agoconAcc').next().css('display','none');
 $(' #footer .agoconAcc').bind('click', function() {
  $(this).next().slideToggle(400);
  var titleImg = $(this).find('h3:first'); 
  var imgURL = titleImg.css('background-image');
  if(imgURL.search(/open/) > 0){
   imgURL = imgURL.replace(/open/g,'close');
   titleImg.css('background-image',imgURL);
  }else if(imgURL.search(/close/) > 0){
   imgURL = imgURL.replace(/close/g,'open');
   titleImg.css('background-image',imgURL);
  }
 })
 */
 



	//Google MAP
	/*
	$('#gMapLink').bind('click', function() {
		var map = $('#map')
		var rel = map.find('iframe').attr('rel');
		map.find('iframe').attr('src',rel);
	});
	*/



	/* ページ内リンク用 アコーディオン */
    /*
	$('#btnarea a').bind('click', function() {
		var name = $(this).attr('href');
		var accordionBody = $(name).parent().next();
		if(accordionBody.css('display') == 'none'){
			accordionBody.slideToggle();
			alert(naem)
			var titleImg = $(name); 
			var imgURL = titleImg.css('background-image');
			alert(imgURL)
			if(imgURL.search(/open/) > 0){
				imgURL = imgURL.replace(/open/g,'close');
				titleImg.attr('background-image',imgURL);
			}else if(imgURL.search(/close/) > 0){
				imgURL = imgURL.replace(/close/g,'open');
				titleImg.attr('background-image',imgURL);
			}
		}
    });
	*/

	
	/* 続きを読む */
	/*
	$(".more").css('display','none').after("<p class='btn_more'><span>続きを読む</span></p>");
	$(".btn_more").bind('click', function() {
		$(this).prev().slideToggle(400);
		var text = $(this).text();
		if(text == "続きを読む"){
			$(this).html("<span>閉じる</span>").addClass("close");
		}else{
			$(this).html("<span>続きを読む</span>").removeClass("close");
		}
	})
	*/
	
	
})