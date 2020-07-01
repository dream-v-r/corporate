<?php
/*
echo '<pre><br>----------------<br>';
echo "現在のセッションIDは 　　　". session_id() ." です。<br>";
	if (isset($_COOKIE["DV-PHPSESSID"])){
		echo 'TRUE:';
        echo $_SESSION['DV-PHPSESSID'];
    }else{
		echo 'FALSE:';
        $flag = setcookie("DV-PHPSESSID", session_id());
    }

echo '<br>----------------<br>';
var_dump($_COOKIE);
var_dump($_SESSION);
echo '<br>----------------<br></pre>';
*/
session_name('DV-PHPSESSID');
session_start();
//echo '------------------------------スタート-------------------------------------<br>';
/*
echo "現在のセッションIDは 　　　". session_id() ." です。<br>";
echo "現在のセッションNAMEは 　　　" .session_name() ." です。<br>";
echo '<pre><br>----------------<br>';
	if (isset($_COOKIE["DV-PHPSESSID"])){
		echo 'TRUE:';
        echo $_SESSION['DV-PHPSESSID'];
    }else{
		echo 'FALSE:';
        $flag = setcookie("DV-PHPSESSID", session_id());
    }

echo '<br>----------------<br>';
var_dump($_COOKIE);
var_dump($_SESSION);
echo '<br>----------------<br></pre>';
*/
 ?>
<?php //ini_set('display_errors',1); ?>
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
//$to = "yamatou@dream-v.co.jp";

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
$subject = "求人エントリー";

// 送信確認画面の表示(する=1, しない=0)
$confirmDsp = 1;

// 送信完了後に自動的に指定のページ(サンクスページなど)に移動する(する=1, しない=0)
// CV率を解析したい場合などはサンクスページを別途用意し、URLをこの下の項目で指定してください。
// 0にすると、デフォルトの送信完了画面が表示されます。
$jumpPage = 1;

// 送信完了後に表示するページURL（上記で1を設定した場合のみ）※httpから始まるURLで指定ください。
$thanksPage = "https://www.dream-v.co.jp/engineer/entry/entry_thanks.php";

// 必須入力項目を設定する(する=1, しない=0)
$requireCheck = 1;

/* 必須入力項目(入力フォームで指定したname属性の値を指定してください。（上記で1を設定した場合のみ）
値はシングルクォーテーションで囲み、複数の場合はカンマで区切ってください。フォーム側と順番を合わせると良いです。 
配列の形「name="○○[]"」の場合には必ず後ろの[]を取ったものを指定して下さい。*/
$require = array('氏名','ふりがな','メールアドレス','電話番号','利用規約の承諾');


//----------------------------------------------------------------------
//  自動返信メール設定(START)
//----------------------------------------------------------------------

// 差出人に送信内容確認メール（自動返信メール）を送る(送る=1, 送らない=0)
// 送る場合は、フォーム側のメール入力欄のname属性の値が上記「$Email」で指定した値と同じである必要があります
$remail = 1;

//自動返信メールの送信者欄に表示される名前　※あなたの名前や会社名など（もし自動返信メールの送信者名が文字化けする場合ここは空にしてください）
$refrom_name = "エンジニアファン運営事務局";

// 差出人に送信確認メールを送る場合のメールのタイトル（上記で1を設定した場合のみ）
$re_subject = "登録ありがとうございました";

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



/*-----------------------------------------------------
  ファイル添付機能
------------------------------------------------------*/

//
$filename = 'スキルシート' ;

//ファイル添付機能を使うかどうか（trueにしなければ送信しない）
define('FILETEMP',true);

//ファイルを添付せずに保存するかどうか（trueで保存）
define('FILEPOOL',false);

//ファイルの最大サイズ(kb)
define("MAXSIZE",1000);

//添付ファイルの一時保存ディレクトリ（zeromail.phpと同階層のフォルダを用意すること）
define("UPLOADPASS","upfile/");
$SESSION = array();
//画像確認時のWindowターゲット
//_string → target="_string"
//string → rel="string"
define("IMG_CHECK_TARGET","_blank");

$FILES = array();
//確認・完了・エラーページの出力文字コード（"UTF-8,EUC-JP,SJIS"など）
define('TEXTCODE','UTF-8');

//メールの文字コード(ja = 日本向け uni = 英語・マルチバイト文字対応）
define('MAILCODE', 'ja');

//------------------------------- 任意設定ここまで ---------------------------------------------


// 以下の変更は知識のある方のみ自己責任でお願いします。


//----------------------------------------------------------------------
//  関数実行、変数初期化
//----------------------------------------------------------------------
$encode = TEXTCODE;//このファイルの文字コード定義（変更不可）

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
// echo '_POST'; var_dump($_POST);
 echo '_FILES'; var_dump($_FILES);
// echo '_SESSION'; var_dump($_SESSION);
 echo '</pre>';
*/

 if($requireCheck == 1) {
	$requireResArray = requireCheck($require);//必須チェック実行し返り値を受け取る
/*
echo '<pre>----------------------------<br>$requireResArray<br>';
var_dump($requireResArray);
echo '--------------------------</pre>';
*/
	$errm = $requireResArray['errm'];
	$empty_flag = $requireResArray['empty_flag'];
}
//ファイルの処理
//echo FILETEMP;
if(FILETEMP){
//	echo 'ok';
	foreach($_POST as $key=>$val) {
		if( strpos($key, $filename)!== false ){
			if($val !== ''){
				//echo '$key:'.$key.'<br>';
				//echo '$val:'.$val.'<br>';
				/*
				echo '<br>---------------$FILES<br>';
				var_dump($FILES);
				echo '<br>---------------<br>';
				*/
				$FILES += array($key=>$val);
			}
		}
	}
//checkUploadData($FILES);
/*
 echo '<pre>';
	var_dump($FILES);
 echo '</pre>';
*/
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
/*
 echo '<pre>';
 echo '_POST'; var_dump($_POST);
 echo '_FILES'; var_dump($_FILES);
 echo '_SESSION'; var_dump($_SESSION);
 echo '</pre>';
*/

	//差出人に届くメールをセット
	if($remail == 1) {
		$userBody = mailToUser($_POST,$dsp_name,$remail_text,$mailFooterDsp,$mailSignature,$encode);
		$reheader = userHeader($refrom_name,$to,$encode);
		$re_subject = "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($re_subject,"JIS",$encode))."?=";
	}
	//管理者宛に届くメールをセット
//echo '$subject'.$subject;
	$adminBody = mailToAdmin($_POST,$subject,$mailFooterDsp,$mailSignature,$encode,$confirmDsp,$_SESSION);
	$header = adminHeader($userMail,$post_mail,$BccMail,$to,$_SESSION);
	//$subject = "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($subject,"JIS",$encode))."?=";
	$subject = mb_convert_encoding($subject, 'JIS', 'UTF-8');
	$subject = '=?iso-2022-jp?B?' . base64_encode($subject) . '?=';
	
	// 添付ファイルへの処理
	$tempBody = mailTempAdmin($_SESSION,$encode);
//echo $tempBody;

	$adminBody .= $tempBody ;
/*
	echo '<pre>------------------$to<br>';
	echo $to;
	echo "\r\n------------------------------------subject\r\n";
	echo $subject;
	echo "\r\n------------------------------------adminBody\r\n";
	echo $adminBody;
	echo "\r\n------------------------------------header\r\n";
	echo $header;
	
	echo '</pre>';
*/
	mail($to,$subject,$adminBody,$header);
	if($remail == 1 && !empty($post_mail)) mail($post_mail,$re_subject,$userBody,$reheader);
}
else if($confirmDsp == 1){ 

/*　▼▼▼送信確認画面のレイアウト※編集可　オリジナルのデザインも適用可能▼▼▼　*/
?>
<!DOCTYPE html>
<html>
<title>無料エントリー | エンジニアファン</title>
<meta name="keywords" content="無料エントリー,登録,エンジニア,フリー,フリーランス,求人,転職,エンジニアファン">
<meta name="description" content="無料エントリー | 圧倒的な案件数と徹底的なサポートのフリーエンジニア向け求人サイト エンジニアファン">
<?php include($_SERVER['DOCUMENT_ROOT'].'/engineer/Include/htmlheader.php'); ?>
<body>
<?php include($_SERVER['DOCUMENT_ROOT'].'/engineer/Include/body_tagmanager.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/engineer/Include/header.php'); ?>
<nav id="ef_breadcrumbs">
  <div class="inner">
    <ul>
      <li class="home"><a href="http://www.engineer-fan.jp/">ホーム</a></li>
      <li>無料エントリー</li>
    </ul>
  </div>
</nav>
<div id="ef_mvcontents">
  <div class="inner">
    <p class="arrowdown"><img src="img/fig_mv_decoarrow.png" alt=""></p>
    <h2><img src="img/text_title_entry.png" alt="無料エントリー"></h2>
    <p class="text"><img src="img/text_sub_title_confirm.png" alt="入力内容のご確認"></p>
	
  </div>
</div>
<section id="ef_entry_contents">
  <div class="entry_confirm">
    <div class="inner">
      <p class="flow_input"><img src="img/fig_flow_confirm.png"></p>
      <p class="into_text">「この内容で送信する」を押していただくと、登録が完了します<br>
        送信完了後は内容の確認・修正ができません。<br>
        この画面をプリントアウトして保管いただきますようお願いいたします。</p>
      <div class="form_area">

<!-- ▲ Headerやその他コンテンツなど　※自由に編集可 ▲-->

<!-- ▼************ 送信内容表示部　※編集は自己責任で ************ ▼-->
<div id="formWrap">
<?php if($empty_flag == 1){ ?>
<div align="center">
<h4>入力にエラーがあります。下記をご確認の上「戻る」ボタンにて修正をお願い致します。</h4>
<div><?php echo $errm; ?></div><br /><br />

</div>
<?php } ?>

<form action="<?php echo h($_SERVER['SCRIPT_NAME']); ?>" name="test" method="POST">
<table class="formTable">
<?php echo confirmOutput($_POST,$_FILES);//入力内容を表示?>
</table>
    <ul class="submit_area">
<?php if($empty_flag == 1){ ?>
        <li> 
            <div class="btn_submit" id="gho_87">
                <input type="button" value="前画面に戻る" onClick='mySubmit();' class="corre_btn" id="gho_90">
            </div>
        </li>
<?php }else{ ?>
        <li> 
            <div class="btn_submit" id="gho_87">
                <input type="button" value="前画面に戻る" onClick='mySubmit();' class="corre_btn" id="gho_90">
            </div>
        </li>
        <li>
            <div class="btn_submit" id="gho_87">
                <input type="hidden" name="mail_set" value="confirm_submit">
<input type="hidden" name="httpReferer" value="<?php echo h($_SERVER['HTTP_REFERER']);?>">
<input type="hidden" name="httpReferer2" value="<?php echo (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"]; ?>">
<input type="submit" value="　送信する　" class="enrty_btn" id="gho_91" >
            </div>
         </li>
<?php } ?>		 
    </ul>  
</form>
	</div>
</div>
</div>

</div><!-- /formWrap -->
<!-- ▲ *********** 送信内容確認部　※編集は自己責任で ************ ▲-->

<!-- ▼ Footerその他コンテンツなど　※編集可 ▼-->
</div><!-- entry_confirm -->
</div><!-- inner -->
</div><!-- form_area -->
<nav class="ef_breadcrumbs">
<div class="inner" id="breadcrumbs_inner">
    <ul>
      <li class="home"><a href="http://www.engineer-fan.jp/">ホーム</a></li>
      <li>無料エントリー</li>
    </ul>
</div>
</nav>
</section><!-- ef_entry_contents -->

<?php include($_SERVER['DOCUMENT_ROOT'].'/engineer/Include/footer.php'); ?>
 <script type="text/javascript">
 <!--
 function mySubmit() {
   // サブミットするフォームを取得
   var f = document.forms['test'];
 
   f.method = 'POST'; // method(GET or POST)を設定する
   f.action = 'index.php'; // action(遷移先URL)を設定する
   f.submit(); // submit する
   return true;
 }
 // -->
 </script>
</body>
</html>

<?php
/* ▲▲▲送信確認画面のレイアウト　※オリジナルのデザインも適用可能▲▲▲　*/
}

if(($jumpPage == 0 && $sendmail == 1) || ($jumpPage == 0 && ($confirmDsp == 0 && $sendmail == 0))) { 

/* ▼▼▼送信完了画面のレイアウト　編集可 ※送信完了後に指定のページに移動しない場合のみ表示▼▼▼　*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<title>無料エントリー | エンジニアファン</title>
<meta name="keywords" content="無料エントリー,登録,エンジニア,フリー,フリーランス,求人,転職,エンジニアファン">
<meta name="description" content="無料エントリー | 圧倒的な案件数と徹底的なサポートのフリーエンジニア向け求人サイト エンジニアファン">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>完了画面</title>
</head>
<body>
<div align="center">
<?php if($empty_flag == 1){ ?>
<h4>入力にエラーがあります。下記をご確認の上「戻る」ボタンにて修正をお願い致します。</h4>
<div style="color:red"><?php echo $errm; ?></div>
            <div class="btn_submit" id="gho_87">
                <input type="button" value="前画面に戻る" onClick='mySubmit();' class="corre_btn" id="gho_90">
            </div>
</div>
</body>
</html>
<?php }else{ ?>
送信ありがとうございました。<br />
送信は正常に完了しました。<br /><br />
<a href="<?php echo $site_top ;?>">トップページへ戻る&raquo;</a>
</div>
<!--  CV率を計測する場合ここにAnalyticsコードを貼り付け -->
</body>
</html>
<?php 
/* ▲▲▲送信完了画面のレイアウト 編集可 ※送信完了後に指定のページに移動しない場合のみ表示▲▲▲　*/
  }
}
//確認画面無しの場合の表示、指定のページに移動する設定の場合、エラーチェックで問題が無ければ指定ページヘリダイレクト
else if(($jumpPage == 1 && $sendmail == 1) || $confirmDsp == 0) { 
	if($empty_flag == 1){ ?>
<div align="center"><h4>入力にエラーがあります。下記をご確認の上「戻る」ボタンにて修正をお願い致します。</h4>
<div style="color:red"><?php echo $errm; ?></div><br /><br />
            <div class="btn_submit" id="gho_87">
                <input type="button" value="前画面に戻る" onClick='mySubmit();' class="corre_btn" id="gho_90">
            </div>
<?php 
	}else{
	// サンキュー画面遷移
	header("Location: ".$thanksPage); 
	}
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
		//if($out != "confirm_submit" && $key != "httpReferer") {
		if($out != "confirm_submit" && $key != "httpReferer" && $key != "httpReferer2") {
			$resArray .= "【 ".h($key)." 】 ".h($out)."\n";
		}
	}
	return $resArray;
}
//確認画面の入力内容出力用関数
function confirmOutput($arr,$files){
	global $hankaku,$hankaku_array;
	$html = '';
//echo '<pre>';
//var_dump($arr);
//var_dump($files);
//echo '</pre>';
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
		
		$html .= "<tr><th>".$key."</th><td>".$out;
		$html .= '<input type="hidden" name="'.$key.'" value="'.str_replace(array("<br />","<br>"),"",$out).'" />';
		$html .= "</td></tr>\n";
	}
	
	foreach($files as $key => $val) {
		//var_dump($val);
		$html .= "<tr><th>".$key."</th><td>".$val['name'];
		$html .= '<input type="hidden" name="'.$key.'" value="'.str_replace(array("<br />","<br>"),"",$val['name']).'" />';
		$html .= "</td></tr>\n";
	}
	return $html;
}
// 戻る
function confirmOutput2($arr){
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
		
		$html .= '<input type="hidden" name="'.$key.'" value="'.str_replace(array("<br />","<br>"),"",$out).'" />';
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
function adminHeader($userMail,$post_mail,$BccMail,$to,$SESSION){
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
	//var_dump($SESSION);
$header .= "MIME-Version: 1.0\n";
if (count($SESSION)==0) {
  $header .= "Content-Type: text/plain; charset=\"iso-2022-jp\"\n";
} else {
  $header .= "Content-Type: multipart/mixed; boundary=\"__Boundary__\"\n";
}
$header .= "Content-Transfer-Encoding: 7bit";
//echo $header;
		return $header;
}
//管理者宛送信メールボディ
function mailToAdmin($arr,$subject,$mailFooterDsp,$mailSignature,$encode,$confirmDsp,$SESSION){
	
if(count($SESSION)!=0){
		$adminBody .= "--__Boundary__\n";
		$adminBody .= "Content-type: text/plain; charset=ISO-2022-JP\n";
		$adminBody .= "Content-transfer-encoding: 7bit \n";
}


	
	$adminBody .="「".$subject."」からメールが届きました\n\n";
	$adminBody .="＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
	$adminBody.= postToMail($arr);//POSTデータを関数からセット
	$adminBody.="\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n";
	$adminBody.="送信された日時：".date( "Y/m/d (D) H:i:s", time() )."\n";
	$adminBody.="送信者のIPアドレス：".@$_SERVER["REMOTE_ADDR"]."\n";
	$adminBody.="送信者のホスト名：".getHostByAddr(getenv('REMOTE_ADDR'))."\n";
	if($confirmDsp != 1){
		$adminBody.="問い合わせのページURL：".@$_SERVER['HTTP_REFERER']."\n";
	}else{
		//$adminBody.="問い合わせのページURL：".@$arr['httpReferer']."\n";
		$adminBody.="問い合わせのページURL：".@$arr['httpReferer2']."\n";
	}
	if($mailFooterDsp == 1) $adminBody.= $mailSignature;
	
	//$adminBody = $adminBody . "--__Boundary__\n";
	/*
	echo '<pre>';
	echo $adminBody;
	echo mb_convert_encoding($adminBody,"ISO-2022-JP-MS",$encode);
	echo '</pre>';
	*/
	return mb_convert_encoding($adminBody,"ISO-2022-JP-MS",$encode);
}
// 管理者添付送信

function mailTempAdmin($files,$encode){
	$i = 1;
//	echo '<pre>------------------mailTempAdmin<br>';
//	var_dump($files);
//	echo '</pre>';
	/*
	foreach($files as $key => $val){
		echo $key .':'. var_dump($val) .'<br>';
		$filename = UPLOADPASS.$val['name'];
		$handle = fopen($filename, 'r');
		$attachFile = fread($handle, filesize($filename));
		$flag = fclose($handle);
		if ($flag){ print('無事クローズしました');}else{ print('クローズに失敗しました'); }
		//$attachEncode = base64_encode($attachFile);
		$attachEncode = chunk_split(base64_encode($attachFile)); //エンコード
		
		$body .= "Content-Type: ".$val["type"]."; name=". $val['name'] ."\r\n";
		$body .= "Content-Transfer-Encoding: base64\r\n";
		$body .= "Content-Disposition: attachment; filename=". $val['name'] ."\r\n";
		$body .= "\r\n";
		$body = mb_convert_encoding($body,"JIS",$encode);
		//$body .= chunk_split($attachEncode) . "\r\n";
		$body .= $attachEncode;
	}*/
		foreach($files as $key => $val){
			$filename = UPLOADPASS.$val['name'];
			//$fp = fopen($filename, "r"); //ファイルの読み込み
			//$contents = fread($fp, filesize($filename));
			//fclose($fp);
			//$encoded = chunk_split(base64_encode($contents)); //エンコード
			//$encoded = chunk_split( base64_encode(file_get_contents( $contents ) ) , 76 ,"\n" );



			$msg .= "\r\n--__Boundary__\r\n";
			
			$msg .= "Content-Type: " . $val["type"] . "; ";
			$msg .= "name=\"".mb_convert_encoding($val["name"], 'JIS', 'UTF-8')."\"\n";
			$msg .= "Content-Disposition: attachment; ";
			$msg .= "filename=\"".mb_convert_encoding($val["name"], 'JIS', 'UTF-8')."\"\n";
			$msg .= "Content-Transfer-Encoding: base64\r\n\r\n";
			$msg .= chunk_split(base64_encode(file_get_contents($filename)))."\n";
			//$msg = chunk_split($msg);
			//$msg = mb_convert_encoding($msg,"JIS",$encode);
			
			$msg .= $encoded."\r\n";
		}
if(count($files)!=0){
		$msg .= "__Boundary__";
}

		RemoveFiles(UPLOADPASS);//ファイル削除
		//$subject = zm_encode_mimeheader($mailsubject);
	//echo $msg;
	return $msg;
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
	
	if(isset($_FILES)&&count($_FILES)!=0){
		$error += checkUploadData($_FILES);
		//echo '$error:' . $error;
		//var_dump($_SESSION);
		if(isset($_SESSION) && $error != 0){
			foreach($_SESSION as $key => $val ){
				//echo '$key:'.$key;
				//echo '$val:'.$val;
				if(!is_array($val)){
					$res['errm'] .= "<p class=\"error_messe\">".($val)."</p>\n";
					$res['empty_flag'] = 1;
				}
			}	
		}
	}
/*
	echo '<pre><br>error<br>';
	var_dump($error);
	echo $error;
	echo '</pre>';
*/
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
	//echo '<a style="display:block;text-align:center;margin:15px 0;font-size:11px;color:#aaa;text-decoration:none" href="http://www.php-factory.net/" target="_blank">- PHP工房 -</a>';
}

/************************************************************
 *
 * 添付ファイルのチェック
 *
 ************************************************************/
function checkUploadData($FILES)
{
	$_SESSION = array();
	$err = 0;
/*
echo '<pre>checkUploadData<br>$FILES<br>';
	var_dump($FILES);
echo '-----------------------------</pre>';
*/
/*
echo '<pre>$_SESSION';
	var_dump($_SESSION);
echo '</pre>';
*/
	foreach ($FILES as $name => $array) {

		$filename = $array["name"];
/*
echo '$name:';
var_dump($name);
echo '<br>';
*/		
		//アップロード許可されていない場合
		if(FILETEMP === false){
			
			$_SESSION[$name] = convert_encode("<strong class=\"error\">ファイルのアップロードが許可されていません。</strong>");
			$err = 1;
		//エラーチェック
		}elseif ($array["error"] == 0) {
//echo 'エラーチェック:'.$filename.'<br>';
			$filename =$array["name"];
			$filetype = $array['type'];
			$tmp_name =$array["tmp_name"];
			$filesize = $array["size"];
			
			if(isset($filename)){
				preg_match("/^.+?((?:\.\w{3})*\.\w{2,4})$/i", $filename, $extension);//拡張子
			}
			if(!check_minetype($filetype, strtolower($extension[1]))){
				$_SESSION[$name] = convert_encode('<strong class="error">'.$label."[".$filename."] のファイル形式が不適切です。</strong>");
				$err = 1;
			}
			if($filesize >= MAXSIZE*1024 ){ //ファイルサイズ
				$_SESSION[$name] = convert_encode('<strong class="error">'.$label."[".$filename."] のファイルサイズ(".($filesize/1000)."kb)が大きすぎます</strong>");
				$err = 1;
			}
			
			//echo 'エラーがない場合の処理<br>';
			if(!$err){
			
				if((FILEPOOL === true) || ! preg_match("/^[\w\d_\-\.]+?\.\w{2,4}$/i", $filename)){//FILEPOOL=ON | 画像が日本語だったら
					//$filename = substr(md5(microtime()), 0, rand(5, 8)).$extension[1];//適当に名前付ける
					$filename = convert_encode($filename);
				}else{
					//echo '<br>アルファベット?'.$filename.'<br>';
					$filename = strtolower($filename);
				}
				
				$target = (strpos(IMG_CHECK_TARGET,"_")===0) ? ' target="'.IMG_CHECK_TARGET.'"':' rel="'.IMG_CHECK_TARGET.'"';
		
				//$SESSION[$name] = convert_encode($filename." (".($filesize/1000)."kb)".' <a href="'.UPLOADPASS.$filename.'"'.$target.' class="zmPreview">ファイルの確認</a>');
				//$SESSION["FILES"][] = array('filename'=>$filename, 'type' =>$filetype);
				//$SESSION["FILETEMP"] = true;

				
				//tmpファイルを移動
				$mes = move_uploaded_file($tmp_name,UPLOADPASS.$filename);
				$_SESSION[$name] = array(
					'name' => $filename,
					'type'=>$filetype,
					'tmp_name'=>$tmp_name,
					'size'=>$filesize
					);

//echo '$mes:'.$mes.'<br>';
/*
echo '<pre>checkUploadData<br>';	
var_dump($_SESSION);
echo '</pre>';	
*/
			}
		}elseif($array["error"] != 4){
		
			switch($array["error"]){
				case 1:
					$SESSION[$name] = convert_encode("<strong class=\"error\">[".$filename."] のファイルサイズが大きすぎます</strong>");
					$err = 1;
				break;
				
				case 2:
					$SESSION[$name] = convert_encode("<strong class=\"error\">[".$filename."] のファイルサイズが大きすぎます</strong>");
					$err = 1;
				break;
				
				case 6:
					$SESSION[$name] = convert_encode("<strong class=\"error\">テンポラリフォルダがありません</strong>");
					$err = 1;
				break;
				
				default:
					$SESSION[$name] = convert_encode("<strong class=\"error\">[".$filename."] はアップロードできませんでした</strong>");
					$err = 1;
			}
			
		}
		
	}
/*
echo '<pre>checkUploadData<br>-----------------<br>err<br>';
echo $err;
echo '<br>-----------------<br>mes<br>';
var_dump($mes);
echo '<br>-----------------<br>_SESSION<br>';
var_dump($_SESSION);
echo '<br>---------------------<br>SESSION<br>';
var_dump($SESSION);
echo '</pre>';
*/
	if(isset($err)){
		//var_dump($err);
		return $err;
	}
	
}
/*-----------------------------------------------------
  ファイルタイプのチェック
------------------------------------------------------*/
function check_minetype($filetype, $extension)
{
	//echo '$filetype:'.$filetype.'<br>';
	//echo '$extension:'.$extension.'<br>';
	
	$minetype = array(
		"image/jpeg",
		"image/pjpeg",
		"image/x-png",
		"image/png",
		"image/gif",
		"image/bmp",
		"application/pdf",
		"application/octet-stream",
		"application/x-shockwave-flash",
		"text/plain","application/x-zip",
		"application/zip",
		"application/x-zip-compressed",
		"application/x-lha-compressed",
		"application/mspowerpoint",
		"application/x-compress",
		"application/x-excel",
		"application/excel",
		"application/vnd.ms-excel",
		"application/msword",
		"application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
		"application/vnd.openxmlformats-officedocument.wordprocessingml.document",
		"application/vnd.openxmlformats-officedocument.presentationml.presentation",
		"application/vnd.ms-powerpoint",
		"application/x-msexcel",
		"application/x-gzip"
		);
	$ext  = array(
	".gif",
	".png",
	".jpg",
	".bmp",
	".pdf",
	".swf",
	".txt",
	".xls",
	".xlsx",
	".doc",
	".docx",
	".ppt",
	".pptx",
	".zip",
	".lzh",
	".tar.gz"
	);
	if(array_search($filetype,$minetype)===false){
		//echo '<br>-------------------------------filetype<br>';
		return false;
	}elseif(array_search($extension,$ext)===false){
		//echo '<br>-------------------------------extension<br>';
		return false;
	}else{
		//echo '<br>-------------------------------OK<br>';
		return true;
	}
}

/*---------------------* 削除禁止 *-------------------------*/

//エンコード変換
function convert_encode($str){return mb_convert_encoding($str,TEXTCODE,"UTF-8");}

//rep[name]の指定による置換
function zeromail_regtag_replace($formitem, $key){
	if(isset($formitem["reps"]) && array_key_exists($key,$formitem["reps"])!==false) {
		
		preg_match_all("/\{(?:([^\{\}\:]+)\:{1})*([\w\d\-]+)(?:\:{1}([^\{\}\:]+))*\}/", $formitem["reps"][$key], $match);
		
		$str = $formitem["reps"][$key];
		
		foreach($match[0] as $i => $tag){
			if(!empty($formitem[$match[2][$i]]))
				$str = str_replace($tag, $match[1][$i].$formitem[$match[2][$i]].$match[3][$i], $str);
			else
				$str = str_replace($tag, "", $str);
		}
		
		return $str;
		
	}else{
		
		return $formitem[$key];
	}
}

//空入力スキップ確認
function is_empty_skip($val)
{
	return (defined('ZM_EMPTY_VALUE_SKIP') && ZM_EMPTY_VALUE_SKIP === true && mb_strlen($val) <= 0);
}

/*-----------------------------------------------------
  MIMEヘッダエンコード
------------------------------------------------------*/
function zm_encode_mimeheader($str)
{
	
	$encode = (MAILCODE === 'ja') ? 'ISO-2022-JP' : 'UTF-8';
	
	if($encode && (MAILCODE === 'ja')){
		$str = mb_convert_encoding($str, $MAILCODE, 'UTF-8');
	}
	return mb_encode_mimeheader($str, $encode, "B");
}
/*-----------------------------------------------------
  添付ファイル削除
------------------------------------------------------*/
function RemoveFiles($dir)
{
    if(!$dh = @opendir($dir)) return;
    while (false !== ($obj = readdir($dh))) {
        if($obj=='.' || $obj=='..') continue;
        @unlink($dir.'/'.$obj);
    }
    closedir($dh);
}

//----------------------------------------------------------------------
//  関数定義(END)
//----------------------------------------------------------------------
?>