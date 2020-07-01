<!DOCTYPE html>
<html lang="ja">
<head>
<title>お問い合わせ | エンジニアファン</title>
<meta name="keywords" content="お問い合わせ,エンジニア,フリー,フリーランス,求人,転職,エンジニアファン">
<meta name="description" content="お問い合わせ | 圧倒的な案件数と徹底的なサポートのフリーエンジニア向け求人サイト エンジニアファン">
<?php include($_SERVER['DOCUMENT_ROOT'].'/engineer/Include/htmlheader.php'); ?>
</head>
<body>
<?php include($_SERVER['DOCUMENT_ROOT'].'/engineer/Include/body_tagmanager.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/engineer/Include/header.php'); ?>
<nav id="ef_breadcrumbs">
  <div class="inner">
    <ul>
      <li class="home"><a href="http://www.engineer-fan.jp/">ホーム</a></li>
      <li>お問い合わせ</li>
    </ul>
  </div>
</nav>
<div id="ef_mvcontents">
  <div class="inner">
    <p class="arrowdown"><img src="img/fig_mv_decoarrow.png" alt=""></p>
    <h2><img src="img/text_title_contact.png" alt="お問い合わせ"></h2>
    <p class="text"><img src="img/text_sub_title_contact.png" alt="お問い合わせに必要な情報をご入力ください。"></p>
  </div>
</div>
<section id="ef_contact_contents">


  <form method="post" id="ef_contact_form" action="mail.php">
  <div class="inner">
    <p class="flow_input"><img src="img/fig_flow_input.png"></p>
    <div class="form_area">

      <table>
        <tr>
          <th><p>お問い合わせ項目</p>
            <span><img src="img/icon_required.png" alt="必須"></span></th>
          <td id="radio_btn_deco"><div class="radio_btn_deco">
                <input type="radio" name="お問い合わせ項目" id="select1" value="サービスについて">
                <label for="select1">サービスについて</label>
				
                <input type="radio" name="お問い合わせ項目" id="select2" value="協業について">
                <label for="select2">協業について</label>
				
                <input type="radio" name="お問い合わせ項目" id="select3" value="案件掲載について">
                <label for="select3">案件掲載について</label>
				
                <input type="radio" name="お問い合わせ項目" id="select4" value="その他">
                <label for="select4">その他</label>
				
              </div></td>
        </tr>
        <tr>
          <th><p>氏名</p>
          <span><img src="img/icon_required.png" alt="必須"></span>
          </th>
          <td><span class="sex_k">姓</span>
            <input type="text" name="氏名[0]" size="15" class="w_middle">
            <span class="name_k">名</span>
            <input type="text" name="氏名[1]" size="15" class="w_middle"></td>
        </tr>
        <tr>
          <th><p>かな</p>
            <span><img src="img/icon_required.png" alt="必須"></span></th>
          <td><span class="sex_h">せい</span>
            <input type="text" name="ふりがな[0]" size="15" class="w_middle">
            <span class="name_h">めい</span>
            <input type="text" name="ふりがな[1]" size="15" class="w_middle"></td>
        </tr>
        <tr>
          <th><p>メールアドレス</p>
            <span><img src="img/icon_required.png" alt="必須"></span></th>
          <td id="contect_mail"><input type="text" name="メールアドレス" size="40" class="w_long" onblur="this.placeholder='例 : sample@sample.com'" onfocus="this.placeholder=''"  placeholder="例 : sample@sample.com"></td>
        </tr>
        <tr>
          <th><p>会社名</p>
            <span><img src="img/icon_any.png" alt="任意"></span></th>
          <td><input type="text" name="会社名" size="40" class="w_long" onblur="this.placeholder='例 : ドリームビジョン株式会社'" onfocus="this.placeholder=''" placeholder="例 : ドリームビジョン株式会社"></td>
        </tr>
        <tr>
          <th><p>電話番号</p>
            <span><img src="img/icon_any.png" alt="必須"></span></th>
          <td><input type="text" name="電話番号" size="40" class="w_long" onblur="this.placeholder='例 : 03-6661-9625'" onfocus="this.placeholder=''" placeholder="例 : 03-6661-9625"></td>
        </tr>
        <tr>
          <th class="textarea_th"><p>お問い合わせ内容</p>
            <span><img src="img/icon_required.png" alt="必須"></span></th>           
          <td>
		  <textarea name="お問い合わせ内容" rows="10" cols="30" class="textarea" placeholder="例 : サービスに関するお問い合わせ"></textarea>

		  
		  <!-- input type="text" name="お問い合わせ内容" size="40" class="textarea" placeholder="例 : サービスに関するお問い合わせ " -->
          <p class="text">500文字以内</p>
          
          </td>
        </tr>
      </table>
    </div>
    <div class="terms_area">
		<div id="privacypolicy">
			<h2>個人情報の取扱いについて</h2>
			<dl>
				<dt>（１）事業者の氏名または名称</dt>
				<dd>ドリームビジョン株式会社</dd>
				<dt>（２）個人情報保護管理者</dt>
				<dd>代表取締役　前田 俊樹</dd>
				<dt>（３）個人情報の利用目的</dt>
				<dd>お問い合わせいただいた内容に回答するため</dd>
				<dt>（４）個人情報の第三者提供について</dt>
                <dd>取得したスキルシートをパートナー企業に提供する可能性がございます。<br>
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
                </dd>
				<dt>（５）個人情報の取扱いの委託について</dt>
				<dd>取得した個人情報の取扱いの全部又は、一部を委託することはありません。</dd>
				<dt>（６）個人情報を与えなかった場合に生じる結果</dt>
				<dd>個人情報を与えることは任意です。個人情報に関する情報の一部をご提供いただけない場合は、お問い合わせ内容に回答できない可能性があります。</dd>
				<dt>（７）開示対象個人情報の開示等および問い合わせ窓口について</dt>
				<dd>ご本人からの求めにより、当社が保有する開示対象個人情報の利用目的の通知・開示・内容の訂正・追加または削除・利用の停止・消去および第三者への提供の停止（「開示等」といいます。）に応じます。<br>
					開示等に応ずる窓口は下記個人情報問合せ窓口になります。</dd>
				<dt>（８）本人が容易に認識できない方法による個人情報の取得</dt>
				<dd>クッキーやウェブビーコン等を用いるなどして、本人が容易に認識できない方法による個人情報の取得は行っておりません。</dd>
				<dt>（９）個人情報の安全管理措置について</dt>
				<dd>取得した個人情報については、漏洩、減失またはき損の防止と是正、その他個人情報の安全管理のために必要かつ適切な措置を講じます。<br>
					お問合せへの回答後、取得した個人情報は当社内において削除致します。</dd>
				<dt>（１０）個人情報保護方針</dt>
				<dd>当社ホームページの個人情報保護方針をご覧下さい。</dd>
				<dt>（１１）当社の個人情報の取扱いに関する苦情、相談等の問合せ先</dt>
				<dd>
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
				</dd>
			 </dl>
		</div>
      <table>
      <tr>
        <th><img src="img/icon_required.png" alt="必須"></th>
        <td><label for="send_confirm" id="send_confirm_label" class="label_false">
          <input type="checkbox" id="send_confirm" name="利用規約の承諾" value="同意する" class="mfp">
       上記内容に同意する</label>
         </td>
      </tr>
      </table>
    </div>
	
    <div class="btn_submit" id="gho_87">
	<button id="submit" type="submit" value="Submit" class="btn" id="gho_90">送信</button>
	<!-- input type="submit" value="送信する" class="btn" id="gho_90" -->
	</div>
  </div>
</form>
<nav class="ef_breadcrumbs">
<div class="inner" id="breadcrumbs_inner">
    <ul>
      <li class="home"><a href="http://www.engineer-fan.jp/">ホーム</a></li>
      <li>お問い合わせ</li>
    </ul>
</div>
</nav>
</section>
<?php include($_SERVER['DOCUMENT_ROOT'].'/engineer/Include/footer.php'); ?>
<script src="../common/js/jquery.validate.js"></script>
<script src="./js/validate.js"></script>
</body>
</html>