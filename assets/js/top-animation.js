(function (){
	$(window).on('load', function (){
		TopAnimation();
	});

	function TopAnimation(){
			
		var h = $(window).height();
		$('.loader-bg').height(h);
			$('.loader-bg').delay(3000).fadeOut(1500);
			$('.loader').delay(3000).fadeOut(3000);
			setTimeout(function () {
				$('#wrapper').css('display', 'block');
				$('html,body').css('overflow', 'visible');
			}, 3000);
			var windowWidth = window.innerWidth;
			if (windowWidth >= 768) {
				$('.is-first_text,.is-second_text').css({
					'width':'0',
					'display':'inline-block'
				});
				$("[data-appeared-text='hide']").css('is-hide');
				$('.top-topic').addClass('is-hide');
				$('#Top .top-hero__scroll span').addClass('is-hide');
				//setTimeout(function () {
					$('.top-container_inner').addClass('Js-ZoomOut');
				//}, 3000);
				//setTimeout(function () {
					$('.top-hero__ttl').css('display', 'block');
					$('.top-hero__ttl').addClass('Js-ZoomOut');
				//}, 4000);
				//setTimeout(function () {
					$('.is-first_text').addClass('Js-FadeInLeft');
				setTimeout(function () {
					$('.mask')
						.animate({
						'width':'100%'
					},350)
						.animate({
						'width':'0%'
					},350)
				},5700);
				setTimeout(function(){
					$('.mask').css('right','0')
				},6050);
				setTimeout(function () {
					$('.mask2')
						.animate({
						'width':'100%'
					},350)
						.animate({
						'width':'0%'
					},350)
				},5900);
				setTimeout(function(){
					$('.mask2').css('right','0')
				},6250);
				//}, 5000);
				//setTimeout(function () {
					$('.is-second_text').addClass('Js-FadeInLeft');
					$('.mask').addClass('is-text-mask');
				//}, 5200);
				//setTimeout(function () {
					$('.top-hero__copy__top--txt-first').addClass('Js-FadeInBottom');
				//}, 5800);
				//setTimeout(function () {
					$('.top-hero__copy__top--txt-second').addClass('Js-FadeInBottom');
				//}, 6000);
				setTimeout(function () {
					$('.top-hero__scroll span').addClass('is-bottom');
				},7100);
				setTimeout(function () {
					$('.top-topic').addClass('is-fadein');
				}, 7500);

			} else {
				$('.is-first_text,.is-second_text').css('width','100');
			
			}
	}
}());






$(function () {
	/**
	 * Loading
	 **/

	$('#wrapper').css('display', 'none');
	/*$('html,body').css('overflow', 'hidden');*/
	var windowWidth,
 	windowHeight = $(window).height();
		$(window).on('scroll resize', function () {
			var windowWidth = window.innerWidth;
			if (windowWidth >= 768) {
				$("[data-appeared='hide']").addClass('is-hide');
				var scroll = $(window).scrollTop();
				$('.top-business__block').each(function () {
					var BusinessBlock = $(this).offset().top;
					if (scroll != 0) {
						if (scroll > BusinessBlock - windowHeight + windowHeight / 7.5) {
							$('.top-business__block').addClass('Js-ZoomIn');
							$('.top-business__block .top-business__ttl--rock').addClass('Js-ZoomOut');
							$('.top-business__block .top-business__ttl--txt').addClass('Js-FadeInBottom-Business');
/*							setTimeout(function () {
								$('.top-business__block:nth-child(2)').addClass('Js-ZoomIn');
								$('.top-business__block:nth-child(2) .top-business__ttl--rock').addClass('Js-ZoomOut-Second');
								$('.top-business__block:nth-child(2) .top-business__ttl--txt').addClass('Js-FadeInBottom-Second');
							}, 100);
							setTimeout(function () {
								$('.top-business__block:nth-child(3)').addClass('Js-ZoomIn');
								$('.top-business__block:nth-child(3) .top-business__ttl--rock').addClass('Js-ZoomOut-Second');
								$('.top-business__block:nth-child(3) .top-business__ttl--txt').addClass('Js-FadeInBottom-Second');
							}, 200);*/
						}
					}
				});
				//$('.top-service').each(function () {
				var ServiceBlock = $('.top-service').offset().top;
				if (scroll != 0) {
					if (scroll > ServiceBlock - windowHeight + windowHeight / 3.5) {

						$('.top-service').addClass('Js-ZoomIn');
						$('.top-service .sllideIn').addClass('Js-SlideIn');
						$('.top-service .is-TopMask').addClass('Js-SlideMask');
						$('.top-service .is-CarouselMask').addClass('Js-SlideMask');
					}
				}
				//});
				//$().each(function () {
				var GreetingBlock = $('.top-greeting').offset().top;
				if (scroll != 0) {
					if (scroll > GreetingBlock - windowHeight + windowHeight / 3.5) {

						$('.top-greeting').addClass('Js-ZoomIn');
						$('.top-greeting .sllideIn').addClass('Js-SlideIn');
						$('.top-greeting .is-TopMask').addClass('Js-SlideMask');
					}
				}
				//});
				//$('.top-recruit').each(function () {
				var RecruitBlock = $('.top-recruit').offset().top;
				if (scroll != 0) {
					if (scroll > RecruitBlock - windowHeight + windowHeight / 3.5) {

						$('.top-recruit').addClass('Js-ZoomIn');
						$('.top-recruit .sllideIn').addClass('Js-SlideIn');
						$('.top-recruit .is-TopMask').addClass('Js-SlideMask');
					}
				}
				//});
				//$('.top-news').each(function () {
				var NewsBlock = $('.top-news').offset().top;
				if (scroll != 0) {
					if (scroll > NewsBlock - windowHeight + windowHeight / 4) {
						$('.top-news__item, .top-news .top-news__btn').css('opacity', '1');
						$('.top-news .top-section__ttl .top-section__ttl--lato, .top-news .top-section__ttl .top-section__ttl--txt').addClass('Js-FadeIn-Ttl');
					}
				}
				//});

				//});
				//$('.top-acccess').each(function () {
				var AccessBlock = $('.top-acccess').offset().top;
				if (scroll != 0) {
					if (scroll > AccessBlock - windowHeight + windowHeight / 4) {
						$('.top-acccess').addClass('Js-ZoomIn');
						$('.top-acccess_add-first, .top-acccess_add-second, .top-acccess__btn').css('opacity', '1');
						$('.top-acccess .top-section__ttl .top-section__ttl--lato, .top-acccess .top-section__ttl .top-section__ttl--txt').addClass('Js-FadeIn-Ttl');
					}

				};

				$('.top-news__item').addClass('fadein');
				//});

			} else {
					$('.top-service').css('opacity','1');
				$("[data-appeared-text='hide'],[data-appeared='hide']").removeClass('is-hide');
				if ($('.top-news__item').hasClass('fadein')) {
					$('.top-news__item').removeClass('fadein');
				}
				$('.top-topic').removeClass('is-hide');
			}
		});
	//};
	$(".is-first_text,.is-second_text").children().addBack().contents().each(function () {
		if (this.nodeType == 3) {
			var $this = $(this);
			$this.replaceWith($this.text().replace(/(\S)/g, "<span>$&</span>"));
		}
	});
	$(window).on('scroll resize', function () {
		var ServiceWidth = $('.is-TopMask').innerWidth(),
			CarouselWidth = $('.is-CarouselMask').innerWidth(),
			windowWidth = window.innerWidth,
			PadWidth = ServiceWidth * 0.08333333,
			PadUd = 0;
		if (ServiceWidth != 0) {
			if (windowWidth >= 768) {
				$('.text-inner').css({
					'width': ServiceWidth,
					'padding': PadWidth,
					'padding-top': '0',
					'padding-bottom': '0'
				});
				$('.carousel_inner').css({
					'width': CarouselWidth,
					'padding' : '0 30px'
				});
				
			} else {
				$('.text-inner').css({
					'width': '100%',
					'padding': '0',
				});
				$('.carousel_inner').css({
					'width': '100%',
					'padding': '0'
				});
				$('.top-section__card__inner').removeClass('Js-SlideIn');
			}
		}
	});
});
