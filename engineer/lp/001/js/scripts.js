$(function(){

	/*
	 * Birthday
	*/
	/*var year = 1999;
	for (var i = year; i >= 1937; i--) {
		$('#birthYear').append('<option value="' + i + '">' + i + '</option>');
	}
	for (var i = 1; i <= 12; i++) {
		$('#birthMonth').append('<option value="' + i + '">' + i + '</option>');
	}
	for (var i = 1; i <= 31; i++) {
		$('#birthDay').append('<option value="' + i + '">' + i + '</option>');
	}*/


	/*
	 * ImageSwitch
	*/
	var $elm = $('.js-ImgSwitch'),
		pc = '-pc',
		sp = '-sp',
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


	/*
	 * Select Color
	*/
	function selectColor() {
		if($('#entry__tbl select').find('option:selected').hasClass('notSelect')) {
			$('#entry__tbl select').css({'color': '#bbc4c9'});
		}

		$('#entry__tbl select').on('change', function(){
			if($(this).find('option:selected').hasClass('notSelect')){
				$(this).css({'color': '#bbc4c9'});
			} else {
				$(this).css({'color': '#555a5d'});
			}
		})
	}
	selectColor();


	/*
	 * Validate
	*/
	var jsContactForm = $('#js-ContactForm');
	$(jsContactForm).validate({
		rules: {
			'lastName': {
				required: true
			},
			'firstName': {
				required: true
			},
			'lastNameKana': {
				required: true
			},
			'firstNameKana': {
				required: true
			},
			'birthYear': {
				required: true
			},
			'birthMonth': {
				required: true
			},
			'birthDay': {
				required: true
			},
			'email': {
				required: true,
				emails: true
			},
			'tel': {
				phone: true,
				required:true
			},
			'language': {
				required: true
			},
			'years': {
				required: true
			}
		},
		groups: {
			'birth': 'birthYear birthMonth birthDay',
			'ex':'language years'
		},
		messages: {
			'lastName': '姓を入力してください。',
			'firstName': '名を入力してください。',
			'lastNameKana': 'セイを入力してください。',
			'firstNameKana': 'メイを入力してください。',
			'birthYear': '生年月日を選択してください。',
			'birthMonth': '生年月日を選択してください。',
			'birthDay': '生年月日を選択してください。',
			'email': {
				required: 'メールアドレスを入力してください。',
				email: 'メールアドレスを入力してください、もしくは形式が異なります。'
			},
			'tel':{
				required:'電話番号を入力してください。',
			},
			'language': '経験を選択してください。',
			'years': '経験を選択してください。'
		},
		errorPlacement: function (error, element) {
			error.addClass('error_message');
			if(element.attr('name') === 'birthYear' || element.attr('name') === 'birthMonth' || element.attr('name') === 'birthDay'){
				error.appendTo(element.parents('.birth'));
			} else if(element.attr('name') === 'language' || element.attr('name') === 'years'){
				error.appendTo(element.parents('.entry__tbl__experience'));
			} else {
				error.appendTo(element.parent());
			}
		},
	});
	jQuery.validator.addMethod('phone', function(value, element) {
		return this.optional(element) || /^(0{1}\d{9,10})$/.test(value);
	}, '電話番号の形式が異なります。数値のみ(10～11桁)で入力してください。' );
	jQuery.validator.addMethod('emails', function(value, element) {
		return this.optional(element) || /^([a-zA-Z0-9])+([\.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)+/i.test(value);
	}, 'メールアドレスを入力してください、もしくは形式が異なります。' );
});
