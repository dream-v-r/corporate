(function(){
	$(window).on('load resize', function() {
		var ww = window.innerWidth;
		if(ww <= 1300){
			$('.imgCard__inner').css('height', parseInt((564 * ww) / 1230) + 'px');
		} else {
			$('.imgCard__inner').removeAttr('style');
		}
	});
}());

$(function(){

	/*
	 * loadingCover
	*/
	var $ldCover = $('.loadingCover');
	//$(window).on('load', function(){
		setTimeout(function(){
			$ldCover.fadeOut(1000);
			$('.top-hero__ttl__txt--lato').addClass('is-appeared is-transition');
			$('.top-hero__ttl--txt').addClass('is-appeared is-transition');
			$('.top-hero__copy').addClass('is-fade');
			$('.top-hero__copy--rock').addClass('is-appeared is-transition');
			$('.top-hero__copy--txt').addClass('is-appeared is-transition');
			$('#Recruit .top-hero').addClass('is-zoomOut');
			$('#Recruit .top-hero__ttl__txt--lato').addClass('is-appeared is-transition');
			$('#Recruit .top-hero__copy__local--rock').addClass('is-appeared is-transition');
			$('#Recruit .top-hero__copy__local--txt').addClass('is-appeared is-transition');
			$('#Recruit .top-hero__scroll').addClass('is-appeared is-transition');
			/*$('#Recruit .animation').addClass('is-act');
			$('#Recruit .copy').addClass('is-show');
			$('#Recruit .animation h2').addClass('is-act');*/
			//$('#Recruit .sample').addClass('is-appeared is-transition');
		}, 500);
	//})


	/*
	 * Recruit
	*/
	//[data-appeared="hide"]
	var $Recruit = $('#Recruit'),
		recTtl = $('.recruit-ttl'),
		recMedBox = $('.recruit-media__box'),
		recMedImg = $('.recruit-media__img'),
		dataAppeared = $Recruit.find('[data-appeared="hide"]');
	$(window).on('load resize', function(){
		if(window.innerWidth > 767){
			$(dataAppeared).css({'visibility': 'hidden'});
		} else {
			$(dataAppeared).removeAttr('style');
		}
	});
	$(window).on('load scroll resize', function(){
		var wh = $(window).height(),
			wt = $(window).scrollTop(),
			ww = window.innerWidth;
		$(recTtl).each(function(){
			var op = $(this).offset().top;
			if(wt > op - wh + 300){
				$(this).children().addClass('is-appeared is-transition');
			}
		});
		$(recMedBox).each(function(){
			var op = $(this).offset().top;
			if(wt > op - wh + 50){
				$(this).children().addClass('is-appeared is-mask');
				$(this).children().children().addClass('is-appeared is-show');
			}
		});
		$(recMedImg).each(function(){
			var op = $(this).offset().top;
			if(wt > op - wh + 300){
				$(this).children().addClass('is-hide');
				$(this).children().children().addClass('is-appeared is-mask');
				//$(this).children().children().addClass('is-appeared is-show');
			}
		});
		$(dataAppeared).each(function(){
			var op = $(this).offset().top;
			if(ww > 767){
				if(wt > op - wh + 300){
					$(this).addClass('is-appeared');
					$(dataAppeared).attr('data-appeared', 'show');
				}
			}
		});
	});

	$(window).on('load resize scroll', function(){
		var xW = $('#MessageSection .recruit-media__box.box-basic').children().innerWidth(),
			yW = $('#PointSecond .recruit-media__box.box-secondary').children().innerWidth();
		if(window.innerWidth > 991){
			$('#MessageSection .recruit-media__box__inner').css({
				'width': xW,
			});
			$('#PointSecond .recruit-media__box__inner').css({
				'width': yW,
			});
		} else {
			$('#MessageSection .recruit-media__box__inner').removeAttr('style');
			$('#PointSecond .recruit-media__box__inner').removeAttr('style');
		}
	});

})
