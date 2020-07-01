

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
            'お問い合わせ項目': {
                required: true
            },
			'氏名[0]':{
				required: true
			},
			'氏名[1]':{
				required: true
			},
			'ふりがな[0]':{
				required: true
			},
			'ふりがな[1]':{
				required: true
			},
			'メールアドレス':{
				required: true,
				email: true
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
			'ふりがな': "ふりがな[0] ふりがな[1]"
		},
		messages:{
			'お問い合わせ項目':'お問い合わせ項目が未選択です。',
			'氏名[0]':'氏名が入力されていません。',
			'氏名[1]':'氏名が入力されていません。',
			'ふりがな[0]':'ふりがなが入力されていません。',
			'ふりがな[1]':'ふりがなが入力されていません。',
			'メールアドレス':'メールアドレスの形式が正しくありません。',
			'お問い合わせ内容':'お問い合わせ内容が入力されていません。',
			'利用規約の承諾':'上記内容をご確認のうえチェックをお願いいたします。',
			email: "メールアドレスの形式が正しくありません。"
		},
		errorPlacement: function(error, element) {
			console.log(error);
			// お問い合わせ項目
			console.log(error.text())
			if(error.text().search(/お問い合わせ項目が未選択です。/)>=0){
				error.appendTo( element.parent("div").parent('td') );
			}else if(error.text().search(/上記内容をご確認のうえチェックをお願いいたします。/)>=0){
				console.log('利用規約の承諾')
				error.appendTo( element.parent("label").parent('td') );
			}else{
				error.appendTo( element.parent('td') );
			}
		}
		//debug:true
	});

})


