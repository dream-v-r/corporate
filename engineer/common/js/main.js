$(function(){
    $('#ef_header .menu-item').hover(function(){
        $(this).addClass('hover')
        $("div:not(:animated)", this).slideDown(0);
    }, function(){
         $(".child_box",this).slideUp(0);
        $(this).removeClass('hover')
    });
});

$(function(){
	var $contents = $('.job_contents .right_main .searchBox')
	var max_contents = $contents.length;
	var cont = 0;
	$('.job_contents .section_wap').append('<div  id="searchmore" class="btn_more_are"><p><a href="#">もっとみる</a></p></div>');

	$contents.each(function(i){
		$(this).css('display',"none");
		cont = 15;
		if(i < cont){
			$(this).css('display',"block");
if(i>=max_contents-1){ $('#searchmore').remove(); }
		}
		
	})
	$('.job_contents .section_wap').on('click','#searchmore',function(){
		cont += 15;
		$contents.each(function(i){
			$(this).css('display',"none");
			if(i < cont){
				$(this).css('display',"block");
if(i>=max_contents-1){ $('#searchmore').remove(); }
			}


			
	})
		return false;
	})

})



$(function(){
	var val;
	$(window).on('scroll load',function(){
		var footer = $('footer').offset().top;
		var wh = $(window).height();
		val = $(window).scrollTop();
		if(val < 300){
			$('#totop').removeClass('move');
		}else if(val > footer-wh+70){
			$('#totop').removeClass('move');
		}else{
			$('#totop').addClass('move');
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

