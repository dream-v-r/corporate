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
/*
if(isset($_POST)){
	echo '<pre>';
	var_dump($_POST);
	echo '</pre>';
}
*/
?>
<!DOCTYPE html>
<html>
<head>
<title>無料エントリー | エンジニアファン </title>
<meta name="Description" content="無料エントリー | 圧倒的な案件数と徹底的なサポートのフリーエンジニア向け求人サイト エンジニアファン" />
<meta name="keywords" content="無料エントリー,登録,エンジニア,フリー,フリーランス,求人,転職,エンジニアファン" />
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
<li class="melit">無料エントリー</li>
</ul>
</div>
<!--inner-->
      </nav>
      <!--breadcrumbs-->
    </div>
<!--service_bread-->
  </div>

<h2><img alt="無料エントリー" src="/engineer/assets/images/sp_entry/images/entry_ttl.png" /></h2>

<div class="entry_read">
<p>ご登録後、コンサルタントより今後のサービスの流れのご案内、 ご希望条件のヒアリングのご連絡をさせていただきます。 </p>
</div>
<p class="entry_flow contact_flow"><img alt="../../入力...確認...送信" src="/engineer/assets/images/sp_contact/images/contact_flow.png" /></p>
<form method="post" id="ef_contact_form" enctype="multipart/form-data" action="mail.php">
  <div class="inner">
    <div class="form_area">
      <dl class="entry_item_list entry_mb entry_item_flex">
          <dt><p>氏名<span><img src="/engineer/assets/images/sp_contact/images/contact_requreid.png" alt="必須"></span></p>
		  <?php
		  if(isset($_POST['氏名'])){
			$name = explode(' ',$_POST['氏名']);
		  }
		  if(isset($_POST['ふりがな'])){
			$huri = explode(' ',$_POST['ふりがな']);
		  }
		  ?>
		  </dt>
          <dd>
			<dl class='second'>
				<dt><span class="sex_k">姓</span></dt>
				<dd><input type="text" name="氏名[0]"  id="simai_sei" size="10" value="<?php if(isset($name))echo $name[0]?>" class="entry_input_zone"></dd>
				<dt><span class="name_k">名</span></dt>
				<dd><input type="text" name="氏名[1]" id="simai_mei" size="10" value="<?php if(isset($name))echo $name[1]?>" class="entry_input_zone"></dd>
			</dl>
			</dd>
          <dt><p>かな<span><img src="/engineer/assets/images/sp_contact/images/contact_requreid.png" alt="必須"></span></p></dt>
          <dd>
			<dl class='second'>
				<dt><span class="sex_h">せい</span></dt>
				<dd><input type="text" name="ふりがな[0]" id="kana_sei" size="10" value="<?php if(isset($huri))echo $huri[0] ?>" class="entry_input_zone"></dd>
				<dt><span class="name_h">めい</span></dt>
				<dd><input type="text" name="ふりがな[1]" id="kana_mei" size="10" value="<?php if(isset($huri))echo $huri[1] ?>" class="entry_input_zone"></dd>
			</dl>
		  <?php
		  if(isset($_POST['生年月日'])){
			$tosi = explode(' ',$_POST['生年月日']);
		  }
		  ?>
		  </dd>
          <dt><p>生年月日<span><img src="/engineer/assets/images/sp_contact/images/contact_requreid.png" alt="必須"></span></p></dt>
          <dd id='toshi'>
	<select id="nen" name="生年月日[0]" class="input_box input_year">
	<option class="not-select" value="">年</option>
	<?php
	$year_val = date('Y');
	for($i = $year_val-75 ; $i < $year_val ; $i++){
		if($i == $tosi[0]){
			echo '<option value="'.$i.'" selected>'.$i.'</option>';
		}else{
			echo '<option value="'.$i.'">'.$i.'</option>';
		}
	}
	?>
	</select>
	<SELECT  id="tuki" name="生年月日[1]" class="input_box input_mon">
	<option class="not-select" value="">月</option>
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
	<SELECT id="nichi" name="生年月日[2]" class="input_box input_day">
		<option class="not-select" value="">日</option>
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
          </dd>
        
        
          <dt><p>メールアドレス<span><img src="/engineer/assets/images/sp_contact/images/contact_requreid.png" alt="必須"></span></p></dt>
          <dd><input type="text" name="メールアドレス" size="40" class="entry_input_zone" value="<?php if(isset($_POST['メールアドレス']))echo $_POST['メールアドレス'] ?>" placeholder="例 : sample@sample.com"></dd>
        
        
          <dt><p>電話番号<span><img src="/engineer/assets/images/sp_contact/images/contact_requreid.png" alt="必須"></span></p></dt>
          <dd><input type="text" name="電話番号" size="40" class="entry_input_zone" value="<?php if(isset($_POST['電話番号']))echo $_POST['電話番号'] ?>" placeholder="例 : 03-6661-9625"></dd>
        
          <dt><p>希望条件<span><img src="/engineer/assets/images/sp_contact/images/contact_any.png" alt="任意"></span></p></dt>
          <dd class="td_ptn2">
		  <!-- p class="icon_open">希望条件を入力する</p -->
			<dl class="conditions">
                <dt><span>希望月額単価</span></dt>
                <dd><input type="text" name="希望月額単価" class="entry_input_zone" value="<?php if(isset($_POST['希望月額単価']))echo $_POST['希望月額単価'] ?>" placeholder="例 : 「○○」万円"></dd>
                <dt><span>希望稼働開始日</span></dt>
                <dd>
				<input type="text" name="希望稼働開始日" value="<?php if(isset($_POST['希望稼働開始日']))echo $_POST['希望稼働開始日'] ?>" class="entry_input_zone" placeholder="例 : 2016年4月1日">
				</dd>
            </dl>
		  
		  
		  </dd>
		  
        
        
          <dt><p>経験スキル<span><img src="/engineer/assets/images/sp_contact/images/contact_any.png" alt="任意"></span></p></dt>
          <dd class="td_ptn2">

                <dl class="conditions" id="skilllist">
                    <dt class="header">スキル名</dt><dd class="header">経験年数</dd>
					<?php if(isset($_POST)):?>
						
						<?php
					$i = 1;
					foreach($_POST as $key=>$val){
						if(strpos($key,'スキル名') !== false){
							echo '<dt><input type="text" name="'.$key.'" value="'.$val.'" class="entry_input_zone" placeholder="例 : PHP"></dt>';
						}
						if(strpos($key,'経験年数') !== false){
							echo '<dd class="year"><input type="text" name="'.$key.'" value="'.$val.'" class="entry_input_zone" placeholder="例 : 1年"></dd>';
						}
					}
						?>
					<?php else: ?>
                    <dt><input type="text" name="スキル名2"  class="entry_input_zone" value="<?php if(isset($_POST['スキル名2']))echo $_POST['スキル名2'] ?>"   placeholder="例 : AVA"></dt>
                    <dd class="year"><input type="text" name="経験年数2" value="<?php if(isset($_POST['経験年数2']))echo $_POST['経験年数2'] ?>" class="entry_input_zone" placeholder="例 : 3年"></dd>
					<?php endif ?>

					</dl>
				<p id="addskill"><button>追加する</button></p>

              </dd>
		<!-- dt><p class="title">スキルシート(技術履歴書)<span><img src="/engineer/assets/images/sp_contact/images/contact_any.png" alt="任意"></span></p></dt>
		<dd>
                <input type="file" name="スキルシート1" size="15" class="inpFile" value=""><?php if(isset($_POST['スキルシート1']) && $_POST['スキルシート1']!=="")echo '<span class="error">再度ファイルを選択してください【'.$_POST['スキルシート1'].'】</span>'; ?><br>
				<input type="file" name="スキルシート2" size="15" class="inpFile"  value=""><?php if(isset($_POST['スキルシート2']) && $_POST['スキルシート2']!=="")echo '<span class="error">再度ファイルを選択してください【'.$_POST['スキルシート2'].'】</span>'; ?><br>
				<input type="file" name="スキルシート3" size="15" class="inpFile"  value=""><?php if(isset($_POST['スキルシート3']) && $_POST['スキルシート3']!=="")echo '<span class="error">再度ファイルを選択してください【'.$_POST['スキルシート3'].'】</span>'; ?><br>
				<p style="margin-top:1em; font-size:12px; line-height:1.2; margin-left:1.5em; text-indent:-1.5em;">※ ファイルサイズが約1Mを超える場合は送信できません。</p>
				<p style="font-size:12px; line-height:1.2; margin-left:1.5em; text-indent:-1.5em;">※ ファイルストレージサービス等にアップ後「その他要望など」にURLでご連絡をお願いします。</p>
		</dd -->
		<dt><p class="title">スキルシートURL<span><img src="/engineer/assets/images/sp_contact/images/contact_any.png" alt="任意"></span></p></dt>
		<dd>

                <input type="url" class="url entry_input_zone" name="ポートフォリオURL" value="<?php if(isset($_POST['ポートフォリオURL']))echo $_POST['ポートフォリオURL'] ?>">
        <p style="font-size:12px; line-height:1.2; margin-left:1.5em; text-indent:-1.5em;">※ スマートフォン版エントリーフォームからはスキルシートの送信ができません。</p>
        <p style="font-size:12px; line-height:1.2; margin-left:1.5em; text-indent:-1.5em;">※ ファイルストレージサービス等にアップ後「スキルシートURL」欄よりご連絡をお願いします。 </p>
		</dd>

		<?php if(isset($number)||isset($_POST['求人ID'])): ?>
        
          <dt class="textarea_th"><p>求人ID<span><img src="/engineer/assets/images/sp_contact/images/contact_any.png" alt="任意"></span></p></dt>
          <dd><input type="text" name="求人ID" size="40" class="entry_input_zone" readonly value="<?php echo $number; echo $_POST['求人ID']; ?>" ></dd>
        
		<?php endif ?>

			  <dt class="textarea_th"><p>その他要望など<span><img src="/engineer/assets/images/sp_contact/images/contact_any.png" alt="任意"></span></p></dt>
        <dd>
		  <textarea name="その他要望など" rows="10" cols="40" class="entry_input_demand" placeholder="例  : 渋谷近辺の案件希望、週数回自宅勤務希望 など "><?php if(isset($_POST['その他要望など']))echo $_POST['その他要望など'] ?></textarea>
		  <!-- input type="text" name="その他要望など" size="40" class="textarea" value="<?php if(isset($_POST['その他要望など']))echo $_POST['その他要望など'] ?>" placeholder="例 : 渋谷近辺の案件希望、週数回自宅勤務希望 など " -->
            <p class="text">500文字以内</p>
			
				<!--entry_item-->
				<div class="entry_terms_box">
				<h2>個人情報の取扱いについて</h2>
				<p class="entry_terms_lead">(1)事業者の氏名または名称
				  <br /> ドリームビジョン株式会社
				</p>
				<p class="entry_terms_lead">(2)個人情報保護管理者
				  <br /> 代表取締役　前田 俊樹</p>
				<p class="entry_terms_lead">(3)個人情報の利用目的
				  <br /> 無料エントリーに登録いただいた内容を元に案件情報を提供するため
				</p>
				<p class="entry_terms_lead">(4)個人情報の第三者提供について
				  <br /><span>取得したスキルシートをパートナー企業に提供する可能性がございます。<br>
                -　第三者に提供する目的<br>
                パートナー企業にご紹介するため。<br>
                -　提供する個人情報の項目<br>
                スキルシートに記載いただいている情報。<br>
                -　提供の手段又は方法<br>
                メールでパートナー企業にデータを送信する。<br>
                -　当該情報の提供を受ける者又は提供を受ける者の組織の種類、及び属性<br>
                ・パートナー企業<br>
                -　個人情報の取扱いに関する契約がある場合はその旨<br>
                ・個人情報の取り扱いに関する覚書を締結
                </span>
				</p>
				<p class="entry_terms_lead">(5)個人情報の取扱いの委託について
				  <br /> 取得した個人情報の取扱いの全部又は、一部を委託することはありません。
				</p>
				<p class="entry_terms_lead">(6)個人情報を与えなかった場合に生じる結果
				  <br /> 個人情報を与えることは任意です。個人情報に関する情報の一部をご提供いただけない場合は、無料エントリーに登録いただいた内容に回答できない可能性があります。
				</p>
				<p class="entry_terms_lead">(7)開示対象個人情報の開示等および問い合わせ窓口について
				  <br /> ご本人からの求めにより、当社が保有する開示対象個人情報の利用目的の通知・開示・内容の訂正・追加または削除・利用の停止・消去および第三者への提供の停止（「開示等」といいます。）に応じます。
				  <br /> 開示等に応ずる窓口は下記個人情報問合せ窓口になります。
				</p>
				<p class="entry_terms_lead">(8)本人が容易に認識できない方法による個人情報の取得
				  <br /> クッキーやウェブビーコン等を用いるなどして、本人が容易に認識できない方法による個人情報の取得は行っておりません。
				</p>
				<p class="entry_terms_lead">(9)個人情報の安全管理措置について
				  <br /> 取得した個人情報については、漏洩、減失またはき損の防止と是正、その他個人情報の安全管理のために必要かつ適切な措置を講じます。
				  <br /> お問合せへの回答後、取得した個人情報は当社内において削除致します。
				</p>
				<p class="entry_terms_lead">(10)個人情報保護方針
				  <br /> 当社ホームページの個人情報保護方針をご覧下さい。
				</p>
				<p class="entry_terms_lead">(11)当社の個人情報の取扱いに関する苦情、相談等の問合せ先</p>
				<table class="form_tbl">
					<tbody>
					<tr>
						<th>窓口の名称</th>
						<td>ドリームビジョン株式会社　個人情報お問合せ窓口</td>
					</tr>
					<tr>
						<th>連絡先</th>
						<td>住所　　：〒103-0001　中央区日本橋小伝馬町9-10 小伝馬町ビル5F<br>
							電話　　：03-6661-9626<br>
							ＦＡＸ　：03-6661-9629
						</td>
					</tr>
					</tbody>
				</table>
				</div>
				<!--entry_terms_box-->
          <div id="confirm_check">
			
            <input type="checkbox" id="send_confirm" name="利用規約の承諾" value="同意する" <?php
				if(isset($_POST['利用規約の承諾'])){
					if($_POST['利用規約の承諾'] == '同意する')	echo 'checked';
				}
			?> class="mfp">
            <label for="send_confirm" id="send_confirm_label" class="label_false">上記内容に同意する<span><img src="/engineer/assets/images/sp_contact/images/contact_requreid.png" alt="必須"></span></label>
          </div>
		  </dd>
        


    </dl>

    <div class="btn_submit" id="gho_87" style="text-align:center;">
		<button type="submit" value="送信する" class="btn" id="gho_90"><img src="../../assets/images/sp_contact/images/contact_btn_confirm.png"></button>
    </div>
  </div></div>
  </form>

<!--entry_item_list-->
<!-- p>
<div class="engineer_start">
      <div class="start_bdr">
        <p class="start_ttl"><img src="/engineer/assets/images/sp_service/images/start.png" alt="全ての一歩はココからスタート!!"></p>
      </div>
      <p class="Registration"><img src="/engineer/assets/images/sp_service/images/registration.png" alt="まずは、スタッフ登録から"></p>
      <p class="entry_btn">
        <a href="../entry/entry_index.html"><img src="/engineer/assets/images/sp_service/images/entry_btn.png" alt="エントリーする"></a>
      </p>
</div>
</p -->
<div class="breadcrumbs_wrap">
    <nav class="breadcrumbs">
<div class="inner">
          
<ul>
<li class="home"><a href="http://www.engineer-fan.jp/sp/">ホーム</a></li>
<li class="melit">無料エントリー</li>
</ul>
</div>
</nav>
    </div>
<!-- End content -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/engineer/sp/inc/en_footer.php'); ?>
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