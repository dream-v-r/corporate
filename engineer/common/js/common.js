$(function(){
	var val;
	var wh;
	var footer = $('footer#ef_footer').offset().top;
	//console.log(footer);
	$(window).on('scroll resize load',function(){
	val = $(window).scrollTop();
	footer = $('footer#ef_footer').offset().top;
	//console.log('footer:'+footer);
	wh = window.innerHeight ? window.innerHeight: $(window).height();
	//console.log('wh:'+wh);
	
	//console.log(val)
	if(val < 300){
		$('#totop').removeClass('move');
		//console.log('off')
	}else if(val > footer-wh-170){
		$('#totop').removeClass('move');
		//console.log('off')
	}else{
		$('#totop').addClass('move');
//console.log('ok')
	}
	});
});


$(function(){
   // #で始まるアンカーをクリックした場合に処理
   $('#totop a').click(function() {
      // スクロールの速度
      var speed = 400; // ミリ秒
      // アンカーの値取得
      var href= $(this).attr("href");
      // 移動先を取得
      var target = $('#ef_header');//$(href == "#" || href == "" ? 'html' : href);
      // 移動先を数値で取得
      var position = target.offset().top;
      // スムーススクロール
      $('body,html').animate({scrollTop:position}, speed, 'swing');
      return false;
   });
});