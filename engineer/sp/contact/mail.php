<?php header("Content-Type:text/html;charset=utf-8"); ?>
<?php //error_reporting(E_ALL | E_STRICT);
##-----------------------------------------------------------------------------------------------------------------##
#
#  PHPメールプログラム　フリー版 最終更新日2014/12/12
#　改造や改変は自己責任で行ってください。
#	
#  今のところ特に問題点はありませんが、不具合等がありましたら下記までご連絡ください。
#  MailAddress: info@php-factory.net
#  name: K.Numata
#  HP: http://www.php-factory.net/
#
#  重要！！サイトでチェックボックスを使用する場合のみですが。。。
#  チェックボックスを使用する場合はinputタグに記述するname属性の値を必ず配列の形にしてください。
#  例　name="当サイトをしったきっかけ[]"  として下さい。
#  nameの値の最後に[と]を付ける。じゃないと複数の値を取得できません！
#
##-----------------------------------------------------------------------------------------------------------------##
if (version_compare(PHP_VERSION, '5.1.0', '>=')) {//PHP5.1.0以上の場合のみタイムゾーンを定義
	date_default_timezone_set('Asia/Tokyo');//タイムゾーンの設定（日本以外の場合には適宜設定ください）
}
/*-------------------------------------------------------------------------------------------------------------------
* ★以下設定時の注意点　
* ・値（=の後）は数字以外の文字列（一部を除く）はダブルクオーテーション「"」、または「'」で囲んでいます。
* ・これをを外したり削除したりしないでください。後ろのセミコロン「;」も削除しないください。
* ・また先頭に「$」が付いた文字列は変更しないでください。数字の1または0で設定しているものは必ず半角数字で設定下さい。
* ・メールアドレスのname属性の値が「Email」ではない場合、以下必須設定箇所の「$Email」の値も変更下さい。
* ・name属性の値に半角スペースは使用できません。
*以上のことを間違えてしまうとプログラムが動作しなくなりますので注意下さい。
-------------------------------------------------------------------------------------------------------------------*/


//---------------------------　必須設定　必ず設定してください　-----------------------

//サイトのトップページのURL　※デフォルトでは送信完了後に「トップページへ戻る」ボタンが表示されますので
$site_top = "http://engineer-fan.jp/";

// 管理者メールアドレス ※メールを受け取るメールアドレス(複数指定する場合は「,」で区切ってください 例 $to = "aa@aa.aa,bb@bb.bb";)
$to = "engineer-fan@dream-v.co.jp";
//$to = "hanari@dream-v.co.jp";

//フォームのメールアドレス入力箇所のname属性の値（name="○○"　の○○部分）
$Email = "メールアドレス";

/*------------------------------------------------------------------------------------------------
以下スパム防止のための設定　
※有効にするにはこのファイルとフォームページが同一ドメイン内にある必要があります
------------------------------------------------------------------------------------------------*/

//スパム防止のためのリファラチェック（フォームページが同一ドメインであるかどうかのチェック）(する=1, しない=0)
$Referer_check = 0;

//リファラチェックを「する」場合のドメイン ※以下例を参考に設置するサイトのドメインを指定して下さい。
$Referer_check_domain = "https://www.dream-v.co.jp/";

//---------------------------　必須設定　ここまで　------------------------------------


//---------------------- 任意設定　以下は必要に応じて設定してください ------------------------


// 管理者宛のメールで差出人を送信者のメールアドレスにする(する=1, しない=0)
// する場合は、メール入力欄のname属性の値を「$Email」で指定した値にしてください。
//メーラーなどで返信する場合に便利なので「する」がおすすめです。
$userMail = 1;

// Bccで送るメールアドレス(複数指定する場合は「,」で区切ってください 例 $BccMail = "aa@aa.aa,bb@bb.bb";)
$BccMail = "";

// 管理者宛に送信されるメールのタイトル（件名）
$subject = "お問い合わせありがとうございました";

// 送信確認画面の表示(する=1, しない=0)
$confirmDsp = 1;

// 送信完了後に自動的に指定のページ(サンクスページなど)に移動する(する=1, しない=0)
// CV率を解析したい場合などはサンクスページを別途用意し、URLをこの下の項目で指定してください。
// 0にすると、デフォルトの送信完了画面が表示されます。
$jumpPage = 0;

// 送信完了後に表示するページURL（上記で1を設定した場合のみ）※httpから始まるURLで指定ください。
$thanksPage = "https://www.dream-v.co.jp/engineer/contact/contact_thanks.html";

// 必須入力項目を設定する(する=1, しない=0)
$requireCheck = 1;

/* 必須入力項目(入力フォームで指定したname属性の値を指定してください。（上記で1を設定した場合のみ）
値はシングルクォーテーションで囲み、複数の場合はカンマで区切ってください。フォーム側と順番を合わせると良いです。 
配列の形「name="○○[]"」の場合には必ず後ろの[]を取ったものを指定して下さい。*/
$require = array('お問い合わせ項目','氏名','ふりがな','メールアドレス','お問い合わせ内容','利用規約の承諾');


//----------------------------------------------------------------------
//  自動返信メール設定(START)data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAYgAAABOCAIAAAC15xZsAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA4ZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDIxIDc5LjE1NTc3MiwgMjAxNC8wMS8xMy0xOTo0NDowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDplNDA3YmVlMi03NDZkLTQ4YWEtOTQ2MC00YzM0ZWM2NjA1ZGEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6RDI2MEE0RTZEQjlCMTFFNTgyNzVGMzU1Nzc0NjNCRDMiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6RDI2MEE0RTVEQjlCMTFFNTgyNzVGMzU1Nzc0NjNCRDMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUgKE1hY2ludG9zaCkiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoxNDc1NjQ1OC03NTgwLTRkMGItODliNy01NDM3YWY4NjNlNTkiIHN0UmVmOmRvY3VtZW50SUQ9ImFkb2JlOmRvY2lkOnBob3Rvc2hvcDpiOTMxNmY4ZS0wNTg0LTExNzktODI2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
//----------------------------------------------------------------------

// 差出人に送信内容確認メール（自動返信メール）を送る(送る=1, 送らない=0)
// 送る場合は、フォーム側のメール入力欄のname属性の値が上記「$Email」で指定した値と同じである必要があります
$remail = 1;

//自動返信メールの送信者欄に表示される名前　※あなたの名前や会社名など（もし自動返信メールの送信者名が文字化けする場合ここは空にしてください）
$refrom_name = "エンジニアファン運営事務局";

// 差出人に送信確認メールを送る場合のメールのタイトル（上記で1を設定した場合のみ）
$re_subject = "お問い合わせありがとうございました";

//フォーム側の「名前」箇所のname属性の値　※自動返信メールの「○○様」の表示で使用します。
//指定しない、または存在しない場合は、○○様と表示されないだけです。あえて無効にしてもOK
$dsp_name = '氏名';

//自動返信メールの冒頭の文言 ※日本語部分のみ変更可
$remail_text = <<< TEXT

お問い合わせありがとうございました。
担当よりご連絡いたしますので今しばらくお待ちください。

送信内容は以下になります。

TEXT;


//自動返信メールに署名（フッター）を表示(する=1, しない=0)※管理者宛にも表示されます。
$mailFooterDsp = 1;

//上記で「1」を選択時に表示する署名（フッター）（FOOTER～FOOTER;の間に記述してください）
$mailSignature = <<< FOOTER

◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆
エンジニアファン運営事務局

運営会社：ドリームビジョン株式会社

〒103-0001
東京都中央区日本橋小伝馬町9-10小伝馬町ビル5階
■代表番号
TEL ：03-6661-9626
FAX ：03-6661-9629
■システムソリューショングループ直通
TEL ：03-6661-9628
URL ：http://www.dream-v.co.jp/
+++-----------------------------------------------+++
【秘密保持のお願い】
送信したメールには、個人情報や機密情報が含まれている
場合がございます。
誠に恐れ入りますが、誤って送信されたメールを受信され
た際には、このメールのコピー・使用・公開等をなさらず、
速やかに送信元にご連絡いただくとともに、
このメールを削除いただきますようお願い申し上げます。
◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆

FOOTER;


//----------------------------------------------------------------------
//  自動返信メール設定(END)
//----------------------------------------------------------------------

//メールアドレスの形式チェックを行うかどうか。(する=1, しない=0)
//※デフォルトは「する」。特に理由がなければ変更しないで下さい。メール入力欄のname属性の値が上記「$Email」で指定した値である必要があります。
$mail_check = 1;

//全角英数字→半角変換を行うかどうか。(する=1, しない=0)
$hankaku = 0;

//全角英数字→半角変換を行う項目のname属性の値（name="○○"の「○○」部分）
//※複数の場合にはカンマで区切って下さい。（上記で「1」を指定した場合のみ有効）
//配列の形「name="○○[]"」の場合には必ず後ろの[]を取ったものを指定して下さい。
$hankaku_array = array('電話番号','金額');


//------------------------------- 任意設定ここまで ---------------------------------------------


// 以下の変更は知識のある方のみ自己責任でお願いします。


//----------------------------------------------------------------------
//  関数実行、変数初期化
//----------------------------------------------------------------------
$encode = "UTF-8";//このファイルの文字コード定義（変更不可）

if(isset($_GET)) $_GET = sanitize($_GET);//NULLバイト除去//
if(isset($_POST)) $_POST = sanitize($_POST);//NULLバイト除去//
if(isset($_COOKIE)) $_COOKIE = sanitize($_COOKIE);//NULLバイト除去//
if($encode == 'SJIS') $_POST = sjisReplace($_POST,$encode);//Shift-JISの場合に誤変換文字の置換実行
$funcRefererCheck = refererCheck($Referer_check,$Referer_check_domain);//リファラチェック実行

//変数初期化
$sendmail = 0;
$empty_flag = 0;
$post_mail = '';
$errm ='';
$header ='';
/*
 echo '<pre>';
 var_dump($_POST);
 echo '</pre>';
*/
 if($requireCheck == 1) {
	$requireResArray = requireCheck($require);//必須チェック実行し返り値を受け取る
	$errm = $requireResArray['errm'];
	$empty_flag = $requireResArray['empty_flag'];
}
//メールアドレスチェック
if(empty($errm)){
	foreach($_POST as $key=>$val) {
		if($val == "confirm_submit") $sendmail = 1;
		if($key == $Email) $post_mail = h($val);
		if($key == $Email && $mail_check == 1 && !empty($val)){
			if(!checkMail($val)){
				$errm .= "<p class=\"error_messe\">【".$key."】はメールアドレスの形式が正しくありません。</p>\n";
				$empty_flag = 1;
			}
		}
	}
}
  
if(($confirmDsp == 0 || $sendmail == 1) && $empty_flag != 1){
	
	//差出人に届くメールをセット
	if($remail == 1) {
		$userBody = mailToUser($_POST,$dsp_name,$remail_text,$mailFooterDsp,$mailSignature,$encode);
		$reheader = userHeader($refrom_name,$to,$encode);
		$re_subject = "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($re_subject,"JIS",$encode))."?=";
	}
	//管理者宛に届くメールをセット
	$adminBody = mailToAdmin($_POST,$subject,$mailFooterDsp,$mailSignature,$encode,$confirmDsp);
	$header = adminHeader($userMail,$post_mail,$BccMail,$to);
	$subject = "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($subject,"JIS",$encode))."?=";
	
	mail($to,$subject,$adminBody,$header);
	if($remail == 1 && !empty($post_mail)) mail($post_mail,$re_subject,$userBody,$reheader);
}
else if($confirmDsp == 1){ 

/*　▼▼▼送信確認画面のレイアウト※編集可　オリジナルのデザインも適用可能▼▼▼　*/
?>
<!DOCTYPE html>
<html>
<head>
<title>お問い合わせ | エンジニアファン </title>
<meta name="Description" content="お問い合わせ | 圧倒的な案件数と徹底的なサポートのフリーエンジニア向け求人サイト エンジニアファン" />
<meta name="keywords" content="お問い合わせ,エンジニア,フリー,フリーランス,求人,転職,エンジニアファン" />
<?php include($_SERVER['DOCUMENT_ROOT'].'/engineer/sp/inc/htmlheader.php'); ?>
</head>
<body>
<?php include($_SERVER['DOCUMENT_ROOT'].'/engineer/Include/body_tagmanager.php'); ?>
<div id="wrapper">
<?php include($_SERVER['DOCUMENT_ROOT'].'/engineer/sp/inc/header.php'); ?>

<!-- Start content -->
<div class="mv_contents">
<div class="service_bread">
      <nav class="breadcrumbs">
<div class="inner">
          
<ul>
<li class="home"><a href="http://www.engineer-fan.jp/sp/">ホーム</a></li>
<li class="melit">お問い合わせ</li>
</ul>
</div>
<!--inner-->
      </nav>
      <!--breadcrumbs-->
    </div>
<!--service_bread-->
  </div>
<h2><img alt="お問い合わせ" src="../../assets/images/sp_contact/images/contact_ttl.png" /></h2>
<div class="entry_read">
<p class="entry_flow contact_flow"><img alt="../../入力...確認...送信" src="../../assets/images/sp_contact/images/contact_flow_Confirmation.png"></p>
<p>この内容で送信する」を押していただくと、お問い合わせが完了します。</p>
<!-- p>送信完了後は内容の確認・修正ができません。</p>
<p>この画面をプリントアウトして保管いただきますようお願いいたします。</p -->
</div>
<!-- ▲ Headerやその他コンテンツなど　※自由に編集可 ▲-->

<!-- ▼************ 送信内容表示部　※編集は自己責任で ************ ▼-->
<div id="formWrap">
<?php if($empty_flag == 1){ ?>
	<div align="center">
	<h4>入力にエラーがあります。下記をご確認の上「戻る」ボタンにて修正をお願い致します。</h4>
	<?php echo $errm; ?><br /><br /><input type="button" value=" 前画面に戻る " onClick="history.back()">
	</div>
<?php }else{ ?>
<form action="<?php echo h($_SERVER['SCRIPT_NAME']); ?>" method="POST">
<dl class="formTable">
<?php echo confirmOutput($_POST);//入力内容を表示?>
</dl>
 </div>
 
 
     <div class="btn_submit" id="gho_87">
        <ul>
          <li>
<button type="submit" value="　送信する"  class="btn_send" id="gho_91"><img src="/engineer/assets/images/sp_entry/images/btn_send.png"></button>
<!-- input type="submit" value="　送信する"  class="btn_send" id="gho_91" -->
	</li>
          <li>
<input type="hidden" name="mail_set" value="confirm_submit">
<input type="hidden" name="httpReferer" value="<?php echo h($_SERVER['HTTP_REFERER']);?>">
<!-- input type="button" value="前画面に戻る"  class="btn_corre" id="gho_90" onClick="history.back()" -->
<button value="前画面に戻る" type="button" class="btn_corre" id="gho_90" onClick="history.back()"><img src="/engineer/assets/images/sp_entry/images/btn_corre.png"></button>
          </li>

        </ul>
      </div>
    </div>
  </div>
</section>
</form>
<?php } ?>
</div><!-- /formWrap -->
<!-- ▲ *********** 送信内容確認部　※編集は自己責任で ************ ▲-->

<!-- ▼ Footerその他コンテンツなど　※編集可 ▼-->
<p>
<div class="engineer_start">
      <div class="start_bdr">
        <p class="start_ttl"><img src="/engineer/assets/images/sp_service/images/start.png" alt="全ての一歩はココからスタート!!"></p>
      </div>
      <p class="Registration"><img src="/engineer/assets/images/sp_service/images/registration.png" alt="まずは、スタッフ登録から"></p>
      <p class="entry_btn">
        <a href="https://www.dream-v.co.jp/engineer/sp/entry/"><img src="/engineer/assets/images/sp_service/images/entry_btn.png" alt="エントリーする"></a>
      </p>
</div>
</p>
<div class="breadcrumbs_wrap">
    <nav class="breadcrumbs">
<div class="inner">
          
<ul>
<li class="home"><a href="http://www.engineer-fan.jp/sp/">ホーム</a></li>
<li class="melit">お問い合わせ</li>
</ul>
</div>
</nav>
    </div>
<!-- End content -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/engineer/sp/inc/footer.php'); ?>
</div>
<!--wrapper-->
<script type="text/javascript">// <![CDATA[
        $(function(){
            $(".accordion").next().css('display', 'none');
            $(".accordion").on("click", function() {
                $(this).next().slideToggle();
                $(this).toggleClass("open");
                $(this).next().css('display', 'block');
            });
        });
// ]]></script>
<script src="/engineer/common/js/jquery.validate.js"></script>
<script src="./js/validate.js"></script>
</body>
</html>




<?php
/* ▲▲▲送信確認画面のレイアウト　※オリジナルのデザインも適用可能▲▲▲　*/
}

if(($jumpPage == 0 && $sendmail == 1) || ($jumpPage == 0 && ($confirmDsp == 0 && $sendmail == 0))) { 

/* ▼▼▼送信完了画面のレイアウト　編集可 ※送信完了後に指定のページに移動しない場合のみ表示▼▼▼　*/
?>
<!DOCTYPE html>
<html>
<head>
<title>お問い合わせ | エンジニアファン </title>
<meta name="Description" content="お問い合わせ | 圧倒的な案件数と徹底的なサポートのフリーエンジニア向け求人サイト エンジニアファン" />
<meta name="keywords" content="お問い合わせ,エンジニア,フリー,フリーランス,求人,転職,エンジニアファン" />
<?php include($_SERVER['DOCUMENT_ROOT'].'/engineer/sp/inc/htmlheader.php'); ?>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5F5ZK6W" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="wrapper">
<?php include($_SERVER['DOCUMENT_ROOT'].'/engineer/sp/inc/header.php'); ?>

<!-- Start content -->
<div class="mv_contents">
<div class="service_bread">
      <nav class="breadcrumbs">
<div class="inner">
          
<ul>
<li class="home"><a href="http://www.engineer-fan.jp/sp/">ホーム</a></li>
<li class="melit">お問い合わせ</li>
</ul>
</div>
<!--inner-->
      </nav>
      <!--breadcrumbs-->
    </div>
<!--service_bread-->
  </div>
<h2><img alt="お問い合わせ" src="../../assets/images/sp_contact/images/contact_ttl.png" /></h2>
<div class="entry_read">


<?php if($empty_flag == 1){ ?>
<div align="center">
<h4>入力にエラーがあります。下記をご確認の上「戻る」ボタンにて修正をお願い致します。</h4>
<div style="color:red"><?php echo $errm; ?></div>
<br /><br /><input type="button" value=" 前画面に戻る " onClick="history.back()">
</div>
</body>
</html>
<?php }else{ ?>
<div>
<p class="entry_flow contact_flow"><img alt="../../入力...確認...送信" src="../../assets/images/sp_contact/images/contact_flow_end.png"></p>

<p class="entry_thanks">このたびは、お問い合わせいただき、誠にありがとうございました。<br>
お送りいただきました内容を確認の上、折り返しご連絡させていただきます。</p>

<p class="entry_thanks">尚、数日経過しても連絡がない場合やお急ぎの場合、ご質問やご不明な点がある場合には、下記の連絡先までお問い合わせくださいませ。</p>

<p class="entry_thanks">また、ご記入いただきましたメールアドレスへ、自動返信の確認メールを送付しています。<br>
万が一、自動返信メールが届かない場合は、入力いただいたメールアドレスに間違いがあった可能性がございます。<br>
メールアドレスをご確認の上、もう一度エントリーよりご入力頂けますようお願い申し上げます。</p>
</div>
<p>
<div class="engineer_start">
      <div class="start_bdr">
        <p class="start_ttl"><img src="/engineer/assets/images/sp_service/images/start.png" alt="全ての一歩はココからスタート!!"></p>
      </div>
      <p class="Registration"><img src="/engineer/assets/images/sp_service/images/registration.png" alt="まずは、スタッフ登録から"></p>
      <p class="entry_btn">
        <a href="https://www.dream-v.co.jp/engineer/sp/entry/"><img src="/engineer/assets/images/sp_service/images/entry_btn.png" alt="エントリーする"></a>
      </p>
</div>
</p>
<div class="breadcrumbs_wrap">
    <nav class="breadcrumbs">
<div class="inner">
          
<ul>
<li class="home"><a href="http://www.engineer-fan.jp/sp/">ホーム</a></li>
<li class="melit">お問い合わせ</li>
</ul>
</div>
</nav>
    </div>
<!-- End content -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/engineer/sp/inc/footer.php'); ?>
</div>
<!--wrapper-->
<script type="text/javascript">// <![CDATA[
        $(function(){
            $(".accordion").next().css('display', 'none');
            $(".accordion").on("click", function() {
                $(this).next().slideToggle();
                $(this).toggleClass("open");
                $(this).next().css('display', 'block');
            });
        });
// ]]></script>
<script src="/engineer/common/js/jquery.validate.js"></script>
<script src="./js/validate.js"></script>
</body>
</html>
<?php 
/* ▲▲▲送信完了画面のレイアウト 編集可 ※送信完了後に指定のページに移動しない場合のみ表示▲▲▲　*/
  }
}
//確認画面無しの場合の表示、指定のページに移動する設定の場合、エラーチェックで問題が無ければ指定ページヘリダイレクト
else if(($jumpPage == 1 && $sendmail == 1) || $confirmDsp == 0) { 
	if($empty_flag == 1){ ?>
<div align="center"><h4>入力にエラーがあります。下記をご確認の上「戻る」ボタンにて修正をお願い致します。</h4><div style="color:red"><?php echo $errm; ?></div><br /><br /><input type="button" value=" 前画面に戻る " onClick="history.back()"></div>
<?php 
	}else{ header("Location: ".$thanksPage); }
}

// 以下の変更は知識のある方のみ自己責任でお願いします。

//----------------------------------------------------------------------
//  関数定義(START)
//----------------------------------------------------------------------
function checkMail($str){
	$mailaddress_array = explode('@',$str);
	if(preg_match("/^[\.!#%&\-_0-9a-zA-Z\?\/\+]+\@[!#%&\-_0-9a-z]+(\.[!#%&\-_0-9a-z]+)+$/", "$str") && count($mailaddress_array) ==2){
		return true;
	}else{
		return false;
	}
}
function h($string) {
	global $encode;
	return htmlspecialchars($string, ENT_QUOTES,$encode);
}
function sanitize($arr){
	if(is_array($arr)){
		return array_map('sanitize',$arr);
	}
	return str_replace("\0","",$arr);
}
//Shift-JISの場合に誤変換文字の置換関数
function sjisReplace($arr,$encode){
	foreach($arr as $key => $val){
		$key = str_replace('＼','ー',$key);
		$resArray[$key] = $val;
	}
	return $resArray;
}
//送信メールにPOSTデータをセットする関数
function postToMail($arr){
	global $hankaku,$hankaku_array;
	$resArray = '';
	foreach($arr as $key => $val) {
		$out = '';
		if(is_array($val)){
			foreach($val as $key02 => $item){ 
				//連結項目の処理
				if(is_array($item)){
					$out .= connect2val($item);
				}else{
					$out .= $item . ', ';
				}
			}
			$out = rtrim($out,', ');
			
		}else{ $out = $val; }//チェックボックス（配列）追記ここまで
		if(get_magic_quotes_gpc()) { $out = stripslashes($out); }
		
		//全角→半角変換
		if($hankaku == 1){
			$out = zenkaku2hankaku($key,$out,$hankaku_array);
		}
		if($out != "confirm_submit" && $key != "httpReferer") {
			$resArray .= "【 ".h($key)." 】 ".h($out)."\n";
		}
	}
	return $resArray;
}
//確認画面の入力内容出力用関数
function confirmOutput($arr){
	global $hankaku,$hankaku_array;
	$html = '';
	foreach($arr as $key => $val) {
		$out = '';
		if(is_array($val)){
			foreach($val as $key02 => $item){ 
				//連結項目の処理
				if(is_array($item)){
					$out .= connect2val($item);
				}else{
					$out .= $item . ' ';
				}
			}
			$out = rtrim($out,', ');
			
		}else{ $out = $val; }//チェックボックス（配列）追記ここまで
		if(get_magic_quotes_gpc()) { $out = stripslashes($out); }
		$out = nl2br(h($out));//※追記 改行コードを<br>タグに変換
		$key = h($key);
		
		//全角→半角変換
		if($hankaku == 1){
			$out = zenkaku2hankaku($key,$out,$hankaku_array);
		}
		
		$html .= "<dt>".$key."</dt><dd>".$out;
		$html .= '<input type="hidden" name="'.$key.'" value="'.str_replace(array("<br />","<br>"),"",$out).'" />';
		$html .= "</dd>\n";
	}
	return $html;
}

//全角→半角変換
function zenkaku2hankaku($key,$out,$hankaku_array){
	global $encode;
	if(is_array($hankaku_array) && function_exists('mb_convert_kana')){
		foreach($hankaku_array as $hankaku_array_val){
			if($key == $hankaku_array_val){
				$out = mb_convert_kana($out,'a',$encode);
			}
		}
	}
	return $out;
}
//配列連結の処理
function connect2val($arr){
	$out = '';
	foreach($arr as $key => $val){
		if($key === 0 || $val == ''){//配列が未記入（0）、または内容が空のの場合には連結文字を付加しない（型まで調べる必要あり）
			$key = '';
		}elseif(strpos($key,"円") !== false && $val != '' && preg_match("/^[0-9]+$/",$val)){
			$val = number_format($val);//金額の場合には3桁ごとにカンマを追加
		}
		$out .= $val . $key;
	}
	return $out;
}

//管理者宛送信メールヘッダ
function adminHeader($userMail,$post_mail,$BccMail,$to){
	$header = '';
	if($userMail == 1 && !empty($post_mail)) {
		$header="From: $post_mail\n";
		if($BccMail != '') {
		  $header.="Bcc: $BccMail\n";
		}
		$header.="Reply-To: ".$post_mail."\n";
	}else {
		if($BccMail != '') {
		  $header="Bcc: $BccMail\n";
		}
		$header.="Reply-To: ".$to."\n";
	}
		$header.="Content-Type:text/plain;charset=iso-2022-jp\nX-Mailer: PHP/".phpversion();
		return $header;
}
//管理者宛送信メールボディ
function mailToAdmin($arr,$subject,$mailFooterDsp,$mailSignature,$encode,$confirmDsp){
	$adminBody="「".$subject."」からメールが届きました\n\n";
	$adminBody .="＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
	$adminBody.= postToMail($arr);//POSTデータを関数からセット
	$adminBody.="\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n";
	$adminBody.="送信された日時：".date( "Y/m/d (D) H:i:s", time() )."\n";
	$adminBody.="送信者のIPアドレス：".@$_SERVER["REMOTE_ADDR"]."\n";
	$adminBody.="送信者のホスト名：".getHostByAddr(getenv('REMOTE_ADDR'))."\n";
	if($confirmDsp != 1){
		$adminBody.="問い合わせのページURL：".@$_SERVER['HTTP_REFERER']."\n";
	}else{
		$adminBody.="問い合わせのページURL：".@$arr['httpReferer']."\n";
	}
	if($mailFooterDsp == 1) $adminBody.= $mailSignature;
	return mb_convert_encoding($adminBody,"JIS",$encode);
}

//ユーザ宛送信メールヘッダ
function userHeader($refrom_name,$to,$encode){
	$reheader = "From: ";
	if(!empty($refrom_name)){
		$default_internal_encode = mb_internal_encoding();
		if($default_internal_encode != $encode){
			mb_internal_encoding($encode);
		}
		$reheader .= mb_encode_mimeheader($refrom_name)." <".$to.">\nReply-To: ".$to;
	}else{
		$reheader .= "$to\nReply-To: ".$to;
	}
	$reheader .= "\nContent-Type: text/plain;charset=iso-2022-jp\nX-Mailer: PHP/".phpversion();
	return $reheader;
}
//ユーザ宛送信メールボディ
function mailToUser($arr,$dsp_name,$remail_text,$mailFooterDsp,$mailSignature,$encode){
	$userBody = '';
	if(isset($arr[$dsp_name])) $userBody = h($arr[$dsp_name]). " 様\n";
	$userBody.= $remail_text;
	$userBody.="\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
	$userBody.= postToMail($arr);//POSTデータを関数からセット
	$userBody.="\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
	$userBody.="送信日時：".date( "Y/m/d (D) H:i:s", time() )."\n";
	if($mailFooterDsp == 1) $userBody.= $mailSignature;
	return mb_convert_encoding($userBody,"JIS",$encode);
}
//必須チェック関数
function requireCheck($require){
	$res['errm'] = '';
	$res['empty_flag'] = 0;
	foreach($require as $requireVal){
		$existsFalg = '';
		foreach($_POST as $key => $val) {
			if($key == $requireVal) {
				
				//連結指定の項目（配列）のための必須チェック
				if(is_array($val)){
					$connectEmpty = 0;
					foreach($val as $kk => $vv){
						if(is_array($vv)){
							foreach($vv as $kk02 => $vv02){
								if($vv02 == ''){
									$connectEmpty++;
								}
							}
						}
						
					}
					if($connectEmpty > 0){
						$res['errm'] .= "<p class=\"error_messe\">【".h($key)."】は必須項目です。</p>\n";
						$res['empty_flag'] = 1;
					}
				}
				//デフォルト必須チェック
				elseif($val == ''){
					$res['errm'] .= "<p class=\"error_messe\">【".h($key)."】は必須項目です。</p>\n";
					$res['empty_flag'] = 1;
				}
				
				$existsFalg = 1;
				break;
			}
			
		}
		if($existsFalg != 1){
				$res['errm'] .= "<p class=\"error_messe\">【".$requireVal."】が未選択です。</p>\n";
				$res['empty_flag'] = 1;
		}
	}
	
	return $res;
}
//リファラチェック
function refererCheck($Referer_check,$Referer_check_domain){
	if($Referer_check == 1 && !empty($Referer_check_domain)){
		if(strpos($_SERVER['HTTP_REFERER'],$Referer_check_domain) === false){
			return exit('<p align="center">リファラチェックエラー。フォームページのドメインとこのファイルのドメインが一致しません</p>');
		}
	}
}
function copyright(){
	echo '<a style="display:block;text-align:center;margin:15px 0;font-size:11px;color:#aaa;text-decoration:none" href="http://www.php-factory.net/" target="_blank">- PHP工房 -</a>';
}
//----------------------------------------------------------------------
//  関数定義(END)
//----------------------------------------------------------------------
?>