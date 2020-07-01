<?php
session_name('DV-PHPSESSID');
session_destroy();                     // 関連データの廃棄
setCookie( 'PHPSESSID' );              // 通常はこれで削除できる
setCookie( 'PHPSESSID', '', 0, '/' );  // 上記でクッキーを削除できないとき
?>
<?php //ini_set('display_errors',1);
//session_cache_limiter("private_no_expire");
//session_start();
//$_SESSION = array();
if(isset($_GET)){
	//var_dump($_GET);
	if(isset($_GET['id'])){
		$number = $_GET['id'];
	}
}
//if(isset($_POST)){
//	echo '<pre>';
//	var_dump($_POST);
//	echo '</pre>';
//}

?>
<script type="text/javascript">
//var url = location.pathname;
var url = location.href;
var start = url.search(/\?/);
result = url.slice( start , url.length )
//console.log(result);
if ((navigator.userAgent.indexOf('iPhone') > 0 && navigator.userAgent.indexOf('iPad') == -1) || navigator.userAgent.indexOf('iPod') > 0 || navigator.userAgent.indexOf('Android') > 0) {
  location.href = '/engineer/sp/entry/index.php'+result;
}
</script>
<!DOCTYPE html>
<html><!-- InstanceBegin template="/Templates/contents.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<title>無料エントリー | エンジニアファン</title>
<meta name="keywords" content="無料エントリー,登録,エンジニア,フリー,フリーランス,求人,転職,エンジニアファン">
<meta name="description" content="無料エントリー | 圧倒的な案件数と徹底的なサポートのフリーエンジニア向け求人サイト エンジニアファン">

<?php include($_SERVER['DOCUMENT_ROOT'].'/engineer/Include/htmlheader.php'); ?>
</head>
<body>
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
    <p class="text"><img src="img/text_sub_title_entry.png" alt="ご登録後、コーディネーターより今後のサービスの流れのご案内、ご希望条件のヒアリングのご連絡をさせていただきます。"></p>
  </div>
</div>
<section id="ef_entry_contents">
  <form method="post" id="ef_contact_form" enctype="multipart/form-data" action="mail.php">
  <div class="inner">
    <p class="flow_input"><img src="img/fig_flow_input.png"></p>
    <div class="form_area">
      <table>
        <tr>
          <th><p>氏名</p>
		  <?php
		  if(isset($_POST['氏名'])){
			$name = explode(' ',$_POST['氏名']);
		  }
		  if(isset($_POST['ふりがな'])){
			$huri = explode(' ',$_POST['ふりがな']);
		  }
		  ?>
		  
            <span><img src="img/icon_required.png" alt="必須"></span> </th>
          <td><span class="sex_k">姓</span>
            <input type="text" name="氏名[0]" id="simai_sei" size="15" value="<?php if(isset($name))echo $name[0]?>" class="w_middle">
            <span class="name_k">名</span>
            <input type="text" name="氏名[1]" id="simai_mei" size="15" value="<?php if(isset($name))echo $name[1]?>" class="w_middle"></td>
        </tr>
        <tr>
          <th><p>かな</p>
            <span><img src="img/icon_required.png" alt="必須"></span></th>
          <td><span class="sex_h">せい</span>
            <input type="text" name="ふりがな[0]" id="kana_sei" size="15" value="<?php if(isset($huri))echo $huri[0] ?>" class="w_middle">
            <span class="name_h">めい</span>
            <input type="text" name="ふりがな[1]" id="kana_mei" size="15" value="<?php if(isset($huri))echo $huri[1] ?>" class="w_middle"></td>
        </tr>
		  <?php
		  if(isset($_POST['生年月日'])){
			$tosi = explode(' ',$_POST['生年月日']);
		  }
		  ?>
        <tr>
          <th><p>生年月日</p>
            <span><img src="img/icon_required.png" alt="必須"></span></th>
          <td id='toshi'>
<select id="nen" name="生年月日[0]" class="input_mon">
<option value=""></option>
<?php
for($i = 1900 ; $i < 2030 ; $i++){
	if($i == $tosi[0]){
		echo '<option value="'.$i.'" selected>'.$i.'</option>';
	}else{
		echo '<option value="'.$i.'">'.$i.'</option>';
	}
}
?>
</select>
年
<SELECT  id="tuki" name="生年月日[1]" class="input_mon">
<option value=""></option>
<?php
for($i = 1 ; $i <= 12 ; $i++){
	if($i == $tosi[1]){
		echo '<option value="'.$i.'" selected>'.$i.'</option>';
	}else{
		echo '<option value="'.$i.'">'.$i.'</option>';
	}
}
?>
</SELECT>
月
<SELECT id="nichi" name="生年月日[2]" class="input_day">
<option value=""></option>
<?php
for($i = 1 ; $i <= 31 ; $i++){
	if($i == $tosi[2]){
		echo '<option value="'.$i.'" selected>'.$i.'</option>';
	}else{
		echo '<option value="'.$i.'">'.$i.'</option>';
	}
}
?>
</select>
日 <br>
<br>
          </td>
        </tr>
        <tr>
          <th><p>メールアドレス</p>
            <span><img src="img/icon_required.png" alt="必須"></span></th>
          <td><input type="text" name="メールアドレス" size="40" class="w_long" value="<?php if(isset($_POST['メールアドレス']))echo $_POST['メールアドレス'] ?>" onblur="this.placeholder='例 : sample@sample.com'" onfocus="this.placeholder=''"  placeholder="例 : sample@sample.com"></td>
        </tr>
        <tr>
          <th><p>電話番号</p>
            <span><img src="img/icon_required.png" alt="必須"></span></th>
          <td><input type="text" name="電話番号" size="40" class="w_long" value="<?php if(isset($_POST['電話番号']))echo $_POST['電話番号'] ?>" onblur="this.placeholder='例 : 03-6661-9625'" onfocus="this.placeholder=''"  placeholder="例 : 03-6661-9625"></td>
        </tr>
        <tr>
          <th><p>希望条件</p>
            <span><img src="img/icon_any.png" alt="任意"></span></th>
          <td class="td_ptn2">
		  <!-- p class="icon_open">希望条件を入力する</p -->
			<table class="conditions">
			<tr>
                <th><span>希望月額単価</span></th>
                <td><input type="text" name="希望月額単価" class="w_long" value="<?php if(isset($_POST['希望月額単価']))echo $_POST['希望月額単価'] ?>" onblur="this.placeholder='例 : 「○○」万円'" onfocus="this.placeholder=''"  placeholder="例 : 「○○」万円"></td>
             </tr><tr>
				<th><span>希望稼働開始日</span></th>
                <td>
				<input type="text" name="希望稼働開始日" value="<?php if(isset($_POST['希望稼働開始日']))echo $_POST['希望稼働開始日'] ?>" class="w_long" onblur="this.placeholder='例 : 2016年4月1日'" onfocus="this.placeholder=''"  placeholder="例 : 2016年4月1日">
				</td>
			</tr>
            </table>
		  
		  
		  </td>
		  
        </tr>
        <tr>
          <th><p>経験スキル</p>
            <span><img src="img/icon_any.png" alt="任意"></span></th>
          <td class="td_ptn2">
		  <!-- p class="icon_open">経験スキルを入力する</p -->

                <p class="title">経験スキル</p>
				
				<div class="box">
                <dl class="conditions" id="skilllist">
                    <dt class="header">スキル名</dt>
                    <dd class="header">経験年数</dd>
					<?php if(isset($_POST)):?>
						
						<?php
					$i = 1;
					foreach($_POST as $key=>$val){
						if(strpos($key,'スキル名') !== false){
							echo '<dt><input type="text" name="'.$key.'" value="'.$val.'" class="w_long" onblur="this.placeholder=\'例 : PHP\'" onfocus="this.placeholder=\'\'"  placeholder="例 : PHP"></dt>';
						}
						if(strpos($key,'経験年数') !== false){
							echo '<dd class="year"><input type="text" name="'.$key.'" value="'.$val.'" onblur="this.placeholder=\'例 : 1年\'" onfocus="this.placeholder=\'\'"  class="w_long" placeholder="例 : 1年"></dd>';
						}
					}
						
						?>
						
					<?php else: ?>
                    <dt><input type="text" name="スキル名2"  class="w_long" value="<?php if(isset($_POST['スキル名2']))echo $_POST['スキル名2'] ?>" onblur="this.placeholder='例 : JAVA'" onfocus="this.placeholder=''"   placeholder="例 : JAVA"></dt>
                    <dd class="year"><input type="text" name="経験年数2" value="<?php if(isset($_POST['経験年数2']))echo $_POST['経験年数2'] ?>" class="w_long" onblur="this.placeholder='例 : 3年 onfocus="this.placeholder=''"  placeholder="例 : 3年"></dd>
					<?php endif ?>
					

					


					</dl>
				<p id="addskill"><button>追加する</button></p>
				</div>
              <div class="box">
                <p class="title">スキルシート(技術履歴書)</p>
				
                <input type="file" name="スキルシート1" size="15" class="inpFile" value=""><?php if(isset($_POST['スキルシート1']) && $_POST['スキルシート1']!=="")echo '<span class="error">再度ファイルを選択してください【'.$_POST['スキルシート1'].'】</span>'; ?><br>
				<input type="file" name="スキルシート2" size="15" class="inpFile"  value=""><?php if(isset($_POST['スキルシート2']) && $_POST['スキルシート2']!=="")echo '<span class="error">再度ファイルを選択してください【'.$_POST['スキルシート2'].'】</span>'; ?><br>
				<input type="file" name="スキルシート3" size="15" class="inpFile"  value=""><?php if(isset($_POST['スキルシート3']) && $_POST['スキルシート3']!=="")echo '<span class="error">再度ファイルを選択してください【'.$_POST['スキルシート3'].'】</span>'; ?><br>
				<p style="margin-top:1em;">※ ファイルサイズが約1Mを超える場合フォームからは送信できません。<br>　 ファイルストレージサービス等にアップ後「その他要望など」にURLでご連絡をお願いします。</p>
			  </div>
              <div class="box">
                <p class="title">ポートフォリオURL</p>
                <input type="url" class="url" name="ポートフォリオURL" size="80" value="<?php if(isset($_POST['ポートフォリオURL']))echo $_POST['ポートフォリオURL'] ?>">
              </div>
			  
			  
		  </td>
        </tr>
        <tr>
          <th class="textarea_th"><p>その他要望など</p>
            <span><img src="img/icon_any.png" alt="任意"></span></th>
          <td>
		  <textarea name="その他要望など" rows="10" cols="40" class="textarea" onblur="this.placeholder='例  : 渋谷近辺の案件希望、週数回自宅勤務希望 など '" onfocus="this.placeholder=''"  placeholder="例  : 渋谷近辺の案件希望、週数回自宅勤務希望 など "><?php if(isset($_POST['その他要望など']))echo $_POST['その他要望など'] ?></textarea>
		  <!-- input type="text" name="その他要望など" size="40" class="textarea" value="<?php if(isset($_POST['その他要望など']))echo $_POST['その他要望など'] ?>" placeholder="例 : 渋谷近辺の案件希望、週数回自宅勤務希望 など " -->
            <p class="text">500文字以内</p></td>
        </tr>
		<?php if(isset($number)||isset($_POST['求人ID'])): ?>
        <tr>
          <th class="textarea_th"><p>求人ID</p>
            <span><img src="img/icon_any.png" alt="任意"></span></th>
          <td><input type="text" name="求人ID" size="40" class="w_long" readonly value="<?php echo $number; echo $_POST['求人ID']; ?>" ></td>
        </tr>
		<?php endif ?>
      </table>
    </div>
    <div class="terms_area">
      <dl id="privacypolicy">
        <p class="text">本サービスをご利用いただくにあたって、下記の事項にご承諾くださいますようお願いいたします。<br>
          本webサイトは、利用者が本利用規約の内容すべてに承諾することを条件として利用者に提供されるものです。</p>
        <dt>（１）事業者の氏名または名称</dt>
        <dd>ドリームビジョン株式会社</dd>
        <dt>（２）個人情報保護管理者</dt>
        <dd>代表取締役　前田 俊樹</dd>
        <dt>（３）個人情報の利用目的</dt>
        <dd>お問い合わせいただいた内容に回答するため</dd>
        <dt>（４）個人情報の第三者提供について</dt>
        <dd>取得した個人情報は法令等による場合を除いて第三者に提供することはありません。</dd>
        <dt>（５）個人情報の取扱いの委託について</dt>
        <dd>取得した個人情報は、情報管理等の目的で外部に業務委託することがあります。<br>
          委託に際しては、個人情報の保護水準が、当社が設定する安全対策基準を満たす事業者を選定し、適切な管理、監督を行います。</dd>
        <dt>（６）開示対象個人情報の開示等および問い合わせ窓口について</dt>
        <dd>ご本人からの求めにより、当社が保有する開示対象個人情報の利用目的の通知・開示・内容の訂正・追加または削除・利用の停止・消去および第三者への提供の停止（「開示等」といいます。）に応じます。
          開示等に応ずる窓口は、お問合せいただきました当該部署になります。</dd>
        <dt>（７）本人が容易に認識できない方法による個人情報の取得</dt>
        <dd>クッキーやウェブビーコン等を用いるなどして、本人が容易に認識できない方法による個人情報の取得は行っておりません。</dd>
        <dt>（８）個人情報の安全管理措置について</dt>
        <dd>取得した個人情報については、漏洩、減失またはき損の防止と是正、その他個人情報の安全管理のために必要かつ適切な措置を講じます。<br>
          お問合せへの回答後、取得した個人情報は当社内において削除致します。</dd>
        <dt>（９）個人情報保護方針</dt>
        <dd>当社ホームページの個人情報保護方針をご覧下さい。</dd>
        <dt>（１０）当社の個人情報の取扱いに関する苦情、相談等の問合せ先</dt>
        <dd>当社ホームページの個人情報保護方針をご覧下さい。 </dd>
      </dl>
      <table>
        <tr>
          <th><img src="img/icon_required.png" alt="必須"></th>
          <td><label for="send_confirm" id="send_confirm_label" class="label_false">
            <input type="checkbox" id="send_confirm" name="利用規約の承諾" value="同意する" <?php
				if(isset($_POST['利用規約の承諾'])){
					if($_POST['利用規約の承諾'] == '同意する')	echo 'checked';
				}
			?> class="mfp">
            上記内容に同意する</label>
          </td>
        </tr>
      </table>
    </div>
    <div class="btn_submit" id="gho_87">
      <input type="submit" value="送信する" class="btn" id="gho_90">
    </div>
  </div>
  </form>
<nav class="ef_breadcrumbs">
<div class="inner" id="breadcrumbs_inner">
    <ul>
      <li class="home"><a href="http://www.engineer-fan.jp/">ホーム</a></li>
      <li>無料エントリー</li>
    </ul>
</div>
</nav>
</section>

<?php include($_SERVER['DOCUMENT_ROOT'].'/engineer/Include/footer.php'); ?>

<script src="../common/js/jquery.validate.js"></script>
<script src="./js/validate.js"></script>
</body>
<!-- InstanceEnd --></html>
