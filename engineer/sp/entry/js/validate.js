

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
/*

$("#kana_sei").blur(function() {
  $("#kana_mei").valid();
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
			'電話番号':{
				required: true,
				telnum:true
			},
			'利用規約の承諾':{
				required: true
			}
        }
		,groups: {
			'氏名': "氏名[0] 氏名[1]",
			'ふりがな': "ふりがな[0] ふりがな[1]",
			'生年月日': "生年月日[0] 生年月日[1]　生年月日[2]"
		},
		messages:{
			'お問い合わせ項目':'お問い合わせ項目をえらんでください。',
			'氏名[0]':'氏名が入力されていません。',
			'氏名[1]':'氏名が入力されていません。',
			'生年月日[0]':'生年月日が入力されていません。',
			'生年月日[1]':'生年月日が入力されていません。',
			'生年月日[2]':'生年月日が入力されていません。',
			'ふりがな[0]':'全角かなで入力してください。',
			'ふりがな[1]':'全角かなで入力してください。',
			'メールアドレス':'メールアドレスの形式が正しくありません。',
			'お問い合わせ内容':'お問い合わせ内容が入力されていません。',
			'利用規約の承諾':'上記内容をご確認のうえチェックをお願いいたします。',
			'電話番号':'ハイフンあり、半角12-13文字で入力してください。',
			email: "メールアドレスの形式が正しくありません。",
	//required: "必須項目です",
//	maxlength: jQuery.format("{0} 文字以下を入力してください"),
//	minlength: jQuery.format("{0} 文字以上を入力してください"),
//	rangelength: jQuery.format("{0} 文字以上 {1} 文字以下で入力してください"),
	email: "メールアドレスを入力してください",
	url: "URLを入力してください",
	dateISO: "日付を入力してください",
	number: "有効な数字を入力してください",
	digits: "0-9までを入力してください",
	equalTo: "同じ値を入力してください",
//	range: jQuery.format(" {0} から {1} までの値を入力してください"),
//	max: jQuery.format("{0} 以下の値を入力してください"),
//	min: jQuery.format("{0} 以上の値を入力してください"),
	creditcard: "クレジットカード番号を入力してください"
		},
		errorPlacement: function(error, element) {
			console.log(error);
			// お問い合わせ項目
			console.log(error.text())
			if(error.text().search(/お問い合わせ項目をえらんでください。/)>=0){
				error.appendTo( element.parent() );
			}else if(error.text().search(/上記内容をご確認のうえチェックをお願いいたします。/)>=0){
				//console.log('利用規約の承諾')
				error.appendTo( element.parent() );
			}else if(error.text().search(/生年月日が入力されていません。/)>=0){
				//console.log('利用規約の承諾')
				error.appendTo( element.parent() );
			}else if(error.text().search(/ハイフンあり、半角12-13文字で入力してください。/)>=0){
				//console.log('利用規約の承諾')
				error.appendTo( element.parent() );
			}else if(error.text().search(/メールアドレスの形式が正しくありません。/)>=0){
				//console.log('利用規約の承諾')
				error.appendTo( element.parent() );
			}else{
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

})
/*
	$("#ef_contact_form").setItemAllValidator = function () {
			$('#kana_mei').rules('add', {
				required: true,
				messages: {
					required: '姓名が入力されていません。'
				}
			});
	};
	$("#ef_contact_form").setItemAllValidator = function () {
			$('#simai_mei').rules('add', {
				required: true,
				messages: {
					required: 'ふりがなが入力されていません。'
				}
			});
	};
*/
//電話番号（例:012-345-6789）
jQuery.validator.addMethod("telnum", function(value, element) {
	return this.optional(element) || /^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/.test(value);
	}, "ハイフンあり、半角12-13文字で入力してください。"
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
/*
jQuery.extend(jQuery.validator.messages, {
	required: "必須項目です",
	email: "メールアドレスを入力してください",
	url: "URLを入力してください",
	dateISO: "日付を入力してください",
	number: "有効な数字を入力してください",
	digits: "0-9までを入力してください",
	equalTo: "同じ値を入力してください",
	creditcard: "クレジットカード番号を入力してください"
});
*/
/*
$.validator.addMethod("selectCheck", function(value, element, origin) {
return origin != value;
}, "エラーメッセージ");
*/

$(function(){
	
	$('#addskill button').on('click',function(){
		var $skildl = $('#skilllist');
		var dtIndes = $('#skilllist').find('dt').length;
		$skildl.append(
		'<dt><input type="text" name="スキル名'+dtIndes+'"  class="entry_input_zone" onblur="this.placeholder=\'例 : JAVA\'" onfocus="this.placeholder=\'\'"  placeholder="例 : JAVA"></dt>'
        +'<dd class="year"><input type="text" name="経験年数'+dtIndes+'"  class="entry_input_zone" onblur="this.placeholder=\'例 : 3年\'" onfocus="this.placeholder=\'\'"  placeholder="例 : 3年"></dd>'
		);
		return false;
	})
	
		$(document).on('keydown','#ef_contact_form input',function(e){
			if ((e.which && e.which === 13) || (e.keyCode && e.keyCode === 13)) {
                return false;
            } else {
                return true;
            }
		})
	$('input[type=file]').on('change',function(){
		console.log($(this));
		if($(this).next().hasClass('error')){
			$(this).next().remove();
		}
	})
	$('input[type=file]').on('load',function(){
		if($(this).val() != '' && $(this).next().hasClass('error')){
			$(this).next().remove();
		}
	})
	
})
function selectColor() {
//	console.log('test');
  // 現在選択されてる項目によって色設定
  if($('select').find('option:selected').hasClass('not-select')) {
    $('select').css({'color': '#a7a7a7'});
  }
 
　 // 項目が変更された時、条件によって色変更
  $('select').on('change', function(){
    if($(this).find('option:selected').hasClass('not-select')) {
      $(this).css({'color': '#a7a7a7'});
    } else {
      $(this).css({'color': '#333'});
    }
  });
}
selectColor();