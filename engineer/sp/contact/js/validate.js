

//オプション値あり
/*
var options = {rules : {
	comment: {
		required: true,
		minlength: 5
	}
}}
$("#ef_contact_form").validate(options);
*/
/*
	//実装Check
	$.validator.setDefaults({
		submitHandler: function() {
			//console.log($("#ef_contact_form"));
		}
	});
*/
$(function(){
	$("#ef_contact_form").validate({
        rules : {
			'氏名[0]':{
				required: true
			},
			'氏名[1]':{
				required: true
			},
			'ふりがな[0]':{
				required: true,
				hiragana:true
			},
			'ふりがな[1]':{
				required: true,
				hiragana:true
			},
			'メールアドレス':{
				required: true,
				email: true
			},
			'生年月日[0]':{
				required: true
			},
			'生年月日[1]':{
				required: true
			},
			'生年月日[2]':{
				required: true
			},
			'お問い合わせ内容':{
				required: true
			},
			'利用規約の承諾':{
				required: true
			}
        },
		groups: {
			'氏名': "氏名[0] 氏名[1]",
			'ふりがな': "ふりがな[0] ふりがな[1]",
			'生年月日': "生年月日[0] 生年月日[1]　生年月日[2]"
		},
		messages:{
			'お問い合わせ項目':'お問い合わせ項目をえらんでください。',
			'氏名[0]':'氏名が入力されていません。',
			'氏名[1]':'氏名が入力されていません。',
			'ふりがな[0]':'ふりがなが入力されていません。',
			'ふりがな[1]':'ふりがなが入力されていません。',
			'メールアドレス':'メールアドレス が入力されていません。',
			'お問い合わせ内容':'お問い合わせ内容が入力されていません。',
			'利用規約の承諾':'上記内容をご確認のうえチェックをお願いいたします。',
			email: "メールアドレスを正しく入力してください"
		},
		errorPlacement: function(error, element) {
			//console.log(error);
			// お問い合わせ項目
			//console.log(error.text())
			if(error.text().search(/お問い合わせ内容が入力されていません。/)>=0){
				error.appendTo( element.parent() );
			}else if(error.text().search(/上記内容をご確認のうえチェックをお願いいたします。/)>=0){
				error.appendTo( element.parent() );
			}else if(error.text().search(/メールアドレス が入力されていません。/)>=0){
				error.appendTo( element.parent() );
			}else{
				//console.log(error.text())
				error.appendTo( element.parent().parent() );
			}
		},
		focusInvalid: false,
		invalidHandler:function(form, validator) {
			//console.log('cooke');
			var target = $('#wrapper');
			var position = target.offset().top;
			$('body,html').animate({scrollTop:position}, 400, 'swing');
		}
		//debug:true
	});

//電話番号（例:012-345-6789）
jQuery.validator.addMethod("telnum", function(value, element) {
	return this.optional(element) || /^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/.test(value);
	}, "電話番号を入力してください（例:012-345-6789）"
);
//半角カタカナのみ
jQuery.validator.addMethod("hankana", function(value, element) {
	return this.optional(element) || /^([ｧ-ﾝﾞﾟ]+)$/.test(value);
	}, "半角カタカナを入力してください"
);
//全角ひらがなのみ
jQuery.validator.addMethod("hiragana", function(value, element) {
	return this.optional(element) || /^([ぁ-ん]+)$/.test(value);
	}, "全角ひらがなを入力してください"
);
	
	
})
