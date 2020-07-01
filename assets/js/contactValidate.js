$(function () {
	var jsContactFrom = $('#js-ContactFrom');
	$(jsContactFrom).validate({
		rules: {
			'sei': {
				required: true
			},
			'mei': {
				required: true
			},
			'furi_sei': {
				required: true
			},
			'furi_mei': {
				required: true
			},
			'inquiry': {
				required: true
			},
			'email': {
				required: true,
				email: true
			},
			'mail_check': {
				required: true,
				email: true,
				equalTo: '[name=email]'
			},
			'inquiry_area': {
				required: true
			},
			'cons': {
				required: true
			},
			'tel': {
				phone: true
			}
		},
		groups: {
			'sei': 'sei mei',
			'furi': 'furi_sei furi_mei'
		},
		messages: {
			'sei': '必須項目が入力されておりません。',
			'mei': '必須項目が入力されておりません。',
			'furi_sei': '必須項目が入力されておりません。',
			'furi_mei': '必須項目が入力されておりません。',
			'inquiry': '必須項目が選択されておりません。',
			'email': {
				required: '必須項目が入力されておりません。',
				email: 'メールアドレスの形式が異なります。'
			},
			'mail_check': {
				required: '必須項目が入力されておりません。',
				email: 'メールアドレスの形式が異なります。',
				equalTo: 'メールアドレスが一致していません。'
			},
			'inquiry_area': '必須項目が入力されておりません。',
			'cons': '必須項目にチェックがされておりません。'
		},
		showErrors: function (errorMap, errorList) {
			this.defaultShowErrors();
			if ($('.error:not([style*="display: none"])').length > 0) {
				$('#js-ErrorMassage').addClass('show');
			} else {
				$('#js-ErrorMassage').removeClass('show');
			}
			if ($('[name=cons]').attr('class') === 'error') {
				if ($('[name=cons]').prop('checked')) {
					$('.footer_box').removeClass('cons_error_back')
				} else {
					$('.footer_box').addClass('cons_error_back')
				}
			} else {
				$('.footer_box').removeClass('cons_error_back')
			}
		},
		errorPlacement: function (error, element) {
			error.addClass('error_message');
			error.appendTo(element.parent());
		}
	});
	jQuery.validator.addMethod('phone', function(value, element) {
		return this.optional(element) || /^(0{1}\d{9,10})$/.test(value);
	}, '電話番号を正しく入力してください（例:0123456789）' );
});
