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
<p>お問い合わせに必要な情報をご入力ください。</p>
</div>
<form method="post" id="ef_contact_form" action="mail.php">
<!--engineer_read-->
<p class="entry_flow contact_flow"><img alt="../../入力...確認...送信" src="../../assets/images/sp_contact/images/contact_flow.png" /></p>
<div class="contact_item">
<h3 class="contact_ttl_item item_required04">お問い合わせ項目</h3>
</div>
<!--entry_item-->
    <!--entry_item_list-->
<div class="contact_item_list">
      <input value="サービスについて" name="お問い合わせ項目" selected checked id="radio01" type="radio" /><label for="radio01">サービスについて</label>
      <input value="協業について" name="お問い合わせ項目" id="radio02" type="radio" /><label for="radio02">協業について</label>
      <input value="案件掲載について" name="お問い合わせ項目" id="radio03" type="radio" /><label for="radio03">案件掲載について</label>
      <input value="その他" name="お問い合わせ項目" id="radio04" type="radio" /><label for="radio04">その他</label>
    </div>
<!--contact_item_list-->
<div class="contact_item">
<h3 class="contact_ttl_item item_required05">氏名</h3>
</div>
<!--entry_item-->
<div class="entry_item_list">
      <dl>
        <dt class="word01">姓</dt>
        <dd><input class="entry_input_zone" name="氏名[0]" type="text" /></dd>
        <dt class="word01">名</dt>
        <dd><input class="entry_input_zone" name="氏名[1]" type="text" /></dd>
      </dl>
    </div>
<!--entry_item_list-->
<div class="contact_item">
<h3 class="contact_ttl_item item_required05">かな</h3>
</div>
<!--entry_item-->
<div class="entry_item_list">
      <dl>
        <dt class="word02">せい</dt>
        <dd><input class="entry_input_zone" name="ふりがな[0]" type="text" /></dd>
        <dt class="word02">めい</dt>
        <dd><input class="entry_input_zone" name="ふりがな[1]" type="text" /></dd>
      </dl>
    </div>
<!--entry_item_list-->
<div class="contact_item">
<h3 class="contact_ttl_item item_required06">メールアドレス</h3>
</div>
<!--entry_item-->
<div class="entry_item_list">
      <input class="entry_input_zone" name="メールアドレス" type="text" />
    </div>
<!--entry_item_list-->
<div class="contact_item">
<h3 class="contact_ttl_item item_any03">会社名</h3>
</div>
<!--entry_item-->
<div class="entry_item_list">
      <input class="entry_input_zone" name="会社名" type="text" />
    </div>
<!--entry_item_list-->
<div class="contact_item">
<h3 class="contact_ttl_item item_any04">電話番号</h3>
</div>
<!--entry_item-->
<div class="entry_item_list">
      <input class="entry_input_zone" name="電話番号" type="text" />
    </div>
<!--entry_item_list-->
<div class="contact_item">
<h3 class="contact_ttl_item item_required04">お問い合わせ内容</h3>
</div>
<!--entry_item-->
<div class="entry_item_list">
<div>
      <textarea class="entry_input_demand" name="お問い合わせ内容"></textarea>
</div>
	  <div class="entry_terms_box">
<h2>個人情報の取扱いについて</h2>
<p class="entry_terms_lead">(1)事業者の氏名または名称
  <br /> ドリームビジョン株式会社
</p>
<p class="entry_terms_lead">(2)個人情報保護管理者
  <br /> 代表取締役　前田 俊樹</p>
<p class="entry_terms_lead">(3)個人情報の利用目的
  <br /> お問い合わせいただいた内容に回答するため
</p>
<p class="entry_terms_lead">(4)個人情報の第三者提供について 
    <br /> <span>取得したスキルシートをパートナー企業に提供する可能性がございます。<br>
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
  <br /> 個人情報を与えることは任意です。個人情報に関する情報の一部をご提供いただけない場合は、お問い合わせ内容に回答できない可能性があります。
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
		<td>個人情報問合せ窓口</td>
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
<p id="confirm_check" class="entry_terms_consent">
        <input value="上記内容に同意する" name="利用規約の承諾" id="chkbox_entry04" type="checkbox" />
        <label for="chkbox_entry04">上記内容に同意する</label>
      </p>
<p class="entry_btn">
<button class="inp_images" type="submit"><img alt="入力内容を確認する" src="../../assets/images/sp_contact/images/contact_btn_confirm.png" /></button>
<!-- input type="image" class="inp_images" src="../../assets/images/sp_contact/images/contact_btn_confirm.png" -->
</p>
</div>
</form>
<!--entry_item_list-->

<div class="engineer_start">
      <div class="start_bdr">
        <p class="start_ttl"><img src="/engineer/assets/images/sp_service/images/start.png" alt="全ての一歩はココからスタート!!"></p>
      </div>
      <p class="Registration"><img src="/engineer/assets/images/sp_service/images/registration.png" alt="まずは、スタッフ登録から"></p>
      <p class="entry_btn">
        <a href="https://www.dream-v.co.jp/engineer/sp/entry/"><img src="/engineer/assets/images/sp_service/images/entry_btn.png" alt="エントリーする"></a>
      </p>
</div>

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