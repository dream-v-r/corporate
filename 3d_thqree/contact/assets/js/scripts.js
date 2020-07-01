(function(){

	/**
	 * GlobalNav
	 **/
	/* HeaderGlobalNavActive */
	var $jshGactiv = $('#js-HeaderGlobalNavActive'),
		url = window.location.pathname,
		activeUrl = '/' + url.split('/')[1] + '/',
		localUrl = '/' + url.split('/')[2];
	$(window).on('load resize', function(){
		if($(window).width() > 991){
			$jshGactiv.find('a[href="' + activeUrl + '"]').addClass('active');
			if (url === '/') {
				$jshGactiv.find('a[href="' + url + '"]').addClass('active');
			}
			if (localUrl.indexOf('html') != -1) {
				$('.st-header__localNav__list').find('a[href="' + url + '"]').addClass('active');
			} else if(localUrl){
				$('.st-header__localNav__list').find('a[href="' + url + '"]').addClass('active');
			}
		} else {
			$('.st-header__globalNav').find('a[href="' + activeUrl + '"]').removeClass('active');
			if (url === '/') {
				$('.st-header__globalNav').find('a[href="' + url + '"]').removeClass('active');
			}
			$('.st-header__localNav__list').find('a[href="' + url + '"]').removeClass('active');
		}
	});
	/* HeaderGlobalNavLink */
	var $jshGnav = $('.js-HeaderGlobalNavLink'),
		hGnavFind = $('.st-header__globalNav__inner');
	$(window).on('load resize', function(){
		if($(window).width() > 991){
			$jshGnav.mouseover(function(){
				$(this).find('.st-header__globalNav__link').addClass('showActive');
				$(this).find(hGnavFind).stop().slideDown(800, 'easeOutQuint');
				//$('div:not(:animated)', this).show();
				//$('div:not(:animated)', this).slideDown(0);
				//$(this).next().stop().slideDown(100);
			}).mouseout(function () {
				$(this).find('.st-header__globalNav__link').removeClass('showActive');
				$(this).find(hGnavFind).stop().slideUp(800, 'easeOutQuint');
				//$('.st-header__globalNav__inner', this).hide();
				//$('.st-header__globalNav__inner',this).slideUp(0);
				//$(this).next().stop().slideUp(100);
			});
			$jshGnav.children().children('a').unbind('click');
			$(hGnavFind).removeClass('active');
			$(hGnavFind).removeAttr('style');
			$jshGnav.find('.st-header__globalNav__icon').removeClass('active');
			$jshGnav.children().children('a').removeClass('disabled');
		} else {
			$jshGnav.unbind('mouseover').unbind('mouseout');
			$jshGnav.children().children('a').addClass('disabled');
			$jshGnav.children().children('a.disabled').on('click', function(e){
				e.preventDefault();
				if($(this).parent().next(hGnavFind).not(':animated').length >= 1){
					$(this).find('.st-header__globalNav__icon').toggleClass('active');
					$(this).parent().next(hGnavFind).toggleClass('active');
					$(this).parent().next(hGnavFind).slideToggle();
				}
			})
			$(hGnavFind).removeAttr('style');
		}
	});


	/**
	 * FirstViewHeight
	 **/
	var $jsFirstViewHeight = $('#js-FirstViewHeight'),
		getP = $jsFirstViewHeight.css('padding-top'),
		padT = parseInt(getP),
		windowW = 0,
		windowH = 0,
		cutH = 76,
		minH = 574;
	$(window).on('load resize', function() {
		windowW = window.innerWidth,
		windowH = window.innerHeight,
		mainH = windowH - cutH;
		$jsFirstViewHeight.css('padding-top', mainH);
		if(windowW > 767){
			if(mainH < padT && mainH >= minH){
				$jsFirstViewHeight.css('padding-top', mainH);
			} else if(mainH <= minH){
				$jsFirstViewHeight.css('padding-top', minH);
			} else {
				$jsFirstViewHeight.css('padding-top', mainH);
			}
		} else {
			$jsFirstViewHeight.removeAttr('style');
		}
	});


	/**
	 * Recruit
	 **/
	$(window).on('load resize',function(){
		var ww = window.innerWidth;
		if(ww < 1600){
			var biggestHeight = '0';
			$('.recruit-media > *').each(function(){
				if(biggestHeight < $(this).outerHeight(true)){
					biggestHeight = $(this).outerHeight(true);
				}
			});
		} else {
			biggestHeight =$('.recruit-media__img').height();
		}
		$('.recruit-media').height(biggestHeight);
	});


	/**
	 * Swiper
	 **/
	var $jsSwp = $('#js-Swiper');
	if($jsSwp.length){
		var swiper = new Swiper($jsSwp, {
			autoplay: 5000,
			autoplayDisableOnInteraction: false,
			loop: true,
			slidesPerGroup: 2,
			slidesPerView: 2,
			spaceBetween: 30,
			breakpoints:{
				991: {
					initialSlide: 0,
					slidesPerGroup: 1,
					slidesPerView: 1
				},
				767: {
					slidesPerGroup: 1,
					slidesPerView: 1,
					spaceBetween: 0
				}
			},
			nextButton: '.top-btn__next',
			prevButton: '.top-btn__prev',
			pagination: '.top-btn__pagination',
			paginationClickable: true
		});

		$(window).on('load resize', function(){
			if(window.innerWidth <= 991) {
				swiper.removeSlide(3);
			} else {
				if($('#js-SlideClone').length === 0){
					swiper.appendSlide('<span class="top-swiper__slide swiper-slide" id="js-SlideClone"></span>')
				}
			}
		})
	}

}());



$(function () {


	/**
	 * Accordion
	 **/
	var $jsbtnAcdn = $('.js-btnAccordion');
	$jsbtnAcdn.on('click', function(){
		if($(this).next().not(':animated').length >= 1){
			$(this).children().toggleClass('active');
			$(this).next().slideToggle();
		}
	});
	$(window).on('load resize', function(){
		if($(window).width() > 991 ){
			$jsbtnAcdn.children().removeClass('active');
			$jsbtnAcdn.next().removeAttr('style');
		}
	});


	/**
	 *  Height
	 **/
	if($('.js-MatchHeight').length){
		$('.js-MatchHeight .is-height').matchHeight();
		$('#topNews .js-MatchHeight .is-height').matchHeight({byRow:false});
		$('.js-MatchHeight li').matchHeight();
	}
	if($('.js-HeightLine').length){
		$('.js-HeightLine .top-section').heightLine({
			maxWidth: 991,
			minWidth: 768,
			fontSizeCheck: true
		});
	}


	/**
	 * Recruit
	 **/
	var OffsetTop,
		MainHeight,
		NavHeight,
		$jsPnv = $('#js-PageNavLink');
	jQuery.event.add(window, 'load resize', function(){
		NavHeight = $('.st-header__content').outerHeight();
		MainHeight = $('.top-hero').outerHeight();
		OffsetTop = NavHeight + MainHeight;
	});
	if($jsPnv.length){
		$(window).on('load scroll', function(){
				var winTop = $(this).scrollTop();
			if(winTop >= OffsetTop){
				$jsPnv.addClass('fixed');
			} else {
				$jsPnv.removeClass('fixed');
			}
		});
	}
	/* onePageNav */
	if($('#js-OnePageNav').length){
		$('#js-OnePageNav').onePageNav()
	}
	/* recruit media */
	$(window).on('load resize',function(){
		var windowWidth = window.innerWidth;
		if(windowWidth >= 1600){
			var imgheight = $('.recruit-media__img').height(),
				JsHeight = imgheight - 324,
				JsHeight2 = imgheight - 269;
			$('.Js-BoxPrimary').css({
				'top': JsHeight2,
				'bottom': 'auto',
				'margin-top': 0
			});
			$('.right-text_second').css({
				'top': JsHeight2,
				'bottom': 'auto',
				'margin-top':0
			});
			$('.box-basic').css({
				'top': JsHeight,
				'bottom': 'auto',
				'margin-top':0
			});
			$('.right-text').css({
				'top': JsHeight,
				'bottom': 'auto',
				'margin-top':0
			});
		} else if(windowWidth < 1600 && windowWidth > 991){
			$('.box-basic').css({
				'top': 'auto',
				'bottom': 'auto',
				'margin-top':240
			});
			$('.right-text').css({
				'top': 'auto',
				'bottom': 'auto',
				'margin-top':240
			});
			$('.Js-BoxPrimary').css({
				'top': 'auto',
				'bottom': 'auto',
				'margin-top':294
			});
			$('.Js-PrymaryText').css({
				'top': 'auto',
				'bottom': 'auto',
				'margin-top':294
			});
		} else if(windowWidth > 767){
			$('.right-text').css({
				'bottom': 46,
				'top': 'auto',
				'margin-top':0
			});
			$('.box-basic').css({
				'margin-top':0
			});
			$('.Js-PrymaryText').css({
				'bottom': 46,
				'top': 'auto',
				'margin-top':0
			});
			$('.Js-BoxPrimary').css({
				'margin-top':0
			});
		} else {
			$('.right-text').css({
				'bottom': 15,
				'top': 'auto',
				'margin-top':0
			});
			$('.Js-PrymaryText').css({
				'bottom': 15,
				'top': 'auto',
				'margin-top':0
			});
		}
	});


	/**
	* History
	**/
	$('.time_line_block').css('background','none');
	$('.timeline_right').css('visibility','hidden');
	$('.time_line_circle').css('visibility','hidden');
	$('.timeline_left').css('visibility','hidden');
	$('.time_line_block:first-child' +' .timeline_left').addClass('Js-FadeInLeft');
	$('.time_line_block:first-child' +' .time_line_circle').addClass('Js-ZoomIn');
	$(window).on('scroll', function(){
		var i = 1,
			length = $('.time_line_block').length;
		while(i < length){
			var sc = $(this).scrollTop();
			if(sc >= 70 * i){
				var nth = 'nth-child('+(i + 1)+')';
				$('.time_line_block:'+ nth +' .timeline_right').parent().addClass('Js-FadeIn');
				$('.time_line_block:'+ nth +' .timeline_left').addClass('Js-FadeInLeft');
				$('.time_line_block:'+ nth +' .timeline_right').addClass('Js-FadeInRight');
				$('.time_line_block:'+ nth +' .time_line_circle').addClass('Js-ZoomIn');
			}
			i = i+1;
		}
	});


	/**
	 * News
	 **/
	$('.tab li').on('click', function () {
		if ($(this).not('selected')) {
			$(this).addClass('selected').siblings('li').removeClass('selected');
			var index = $('.tab li').index(this);
			$('.news-list__block ul').eq(index).addClass('news-selected').siblings('ul').removeClass('news-selected');
		}
	});


	/**
	 * Contact
	 **/
	var jsInqSct = $('.js-InquirySelect');
	$(jsInqSct).on('click',function(){
		$(this).toggleClass('select_on');
	});
	$(jsInqSct).blur(function(){
		$(this).removeClass('select_on')
	});


	/**
	 * PageTop
	 **/
	var $pageTop = $('#js-PageTop'),
		DURATION = 600;

	$pageTop.hide();

	$(window).on('scroll load resize', function(){
		var scrlHeight = $(document).height(),
			scrlPosition = $(window).height() + $(window).scrollTop(),
			ww = window.innerWidth,
			ftHeight = $('#Footer').innerHeight();

		if(ww > 991){
			if ($(this).scrollTop() > 150) {
				$pageTop.fadeIn('slow');
			} else {
				$pageTop.fadeOut();
			}
		} else {
			$pageTop.hide();
		}

		if(scrlHeight - scrlPosition <= ftHeight - 91){
			$pageTop.css({'position': 'absolute', 'bottom': '98px'});
		} else {
			$pageTop.css({'position': 'fixed', 'bottom': '30px'});
		}

	});
	$pageTop.children('a').on('click', function(e){
		e.preventDefault();
		$('html, body').stop().animate({
			scrollTop: 0
		}, DURATION);
	});


	/**
	 * ImageSwitch
	 **/
	var $elm = $('.js-ImageSwitch'),
		pc = '_pc',
		sp = '_sp',
		rw = 767,
		rTimer;

	function imgSwitch() {
		var ww = window.innerWidth;

		$elm.each(function () {
			var $this = $(this);
			if (ww > rw) {
				$this.attr('src', $this.attr('src').replace(sp, pc));
			} else {
				$this.attr('src', $this.attr('src').replace(pc, sp));
			}
		});
	}
	imgSwitch();

	$(window).on('resize load', function () {
		clearTimeout(rTimer);
		rTimer = setTimeout(function () {
			imgSwitch();
		}, 100);
	});


	/**
	* Smooth scrolling
	**/
	$('a[href^="#"]').on('click',function(){
		var speed = 600,
			href= $(this).attr('href'),
			target = $(href == '#' || href == '' ? 'html' : href),
			position = target.offset().top;
		$('body,html').animate({scrollTop:position}, speed, 'swing');
		return false;
	});

});
