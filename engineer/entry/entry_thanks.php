<?php
session_name('DV-PHPSESSID');
session_destroy();                     // 関連データの廃棄
setCookie( 'PHPSESSID' );              // 通常はこれで削除できる
setCookie( 'PHPSESSID', '', 0, '/' );  // 上記でクッキーを削除できないとき
?>
<!DOCTYPE html>
<html><!-- InstanceBegin template="/Templates/contents.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<title>無料エントリー | エンジニアファン</title>
<meta name="keywords" content="無料エントリー,登録,エンジニア,フリー,フリーランス,求人,転職,エンジニアファン">
<?php include($_SERVER['DOCUMENT_ROOT'].'/engineer/Include/htmlheader.php'); ?>
</head>
<body>
<?php include($_SERVER['DOCUMENT_ROOT'].'/engineer/Include/body_tagmanager.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/engineer/Include/header.php'); ?>
<!-- InstanceBeginEditable name="cntents" -->
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
    <p class="arrowdown_thx"><img src="img/fig_mv_decoarrow.png" alt=""></p>
    <h2><img src="img/text_title_entry.png" alt="無料エントリー"></h2>
    <p class="text"><img src="img/text_sub_title_entry_thanks.png" alt="ご登録ありがとうございます。"></p>
  </div>
</div>
<section id="ef_entry_contents">
  <div class="special_thx">
    <div class="inner">
      <div class="main">
        <p class="flow_input"><img src="img/fig_flow_sent.png" alt=""></p>
        <p class="text">このたびは、エンジニアファンにご登録いただき、誠にありがとうございました。<br>お送りいただきました内容を確認の上、折り返しご連絡させていただきます。</p>
        <p class="text">尚、数日経過しても連絡がない場合やお急ぎの場合、ご質問やご不明な点がある場合には、<br>
          下記の連絡先までお問い合わせくださいませ。</p>
        <p class="text">また、ご記入いただきましたメールアドレスへ、自動返信の確認メールを送付しています。<br>
          万が一、自動返信メールが届かない場合は、入力いただいたメールアドレスに間違いがあった可能性がございます。<br>
          メールアドレスをご確認の上、もう一度エントリーよりご入力頂けますようお願い申し上げます。</p>
      </div>
      <div class="info_area">
        <ul>
          <li>
			<a href="/engineer/contact/"><img src="./img/btn_contanct.png"></a>
          </li>
          <li>
            <p class="title">お問い合わせ電話番号</p>
            <p class="tel">03-6661-9626</p>
            <p class="day_time">平日 : 10:00〜19:00</p>
          </li>
        </ul>
      </div>
    </div>
  </div>
<nav class="ef_breadcrumbs">
<div class="inner" id="breadcrumbs_inner">
    <ul>
      <li class="home"><a href="http://www.engineer-fan.jp/">ホーム</a></li>
      <li>無料エントリー</li>
    </ul>
</div>
</nav>
</section>
<!-- InstanceEndEditable -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/engineer/Include/footer.php'); ?>
<!-- Begin INDEED conversion code -->
<script type="text/javascript">
/* <![CDATA[ */
var indeed_conversion_id = '6503373045500504';
var indeed_conversion_label = '';
/* ]]> */
</script>
<script type="text/javascript" src="//conv.indeed.com/pagead/conversion.js">
</script>
<noscript>
<img height=1 width=1 border=0 src="//conv.indeed.com/pagead/conv/6503373045500504/?script=0">
</noscript>
<!-- End INDEED conversion code -->
<!-- Google Code for &#28961;&#26009;&#12456;&#12531;&#12488;&#12522;&#12540;&#65288;PC&#65289; Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 999035701;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "fQuOCN3Y0GsQtaaw3AM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/999035701/?label=fQuOCN3Y0GsQtaaw3AM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<!-- Yahoo Code for your Conversion Page -->
<script type="text/javascript">
    /* <![CDATA[ */
    var yahoo_conversion_id = 1000119374;
    var yahoo_conversion_label = "nVgCCND51WsQvLDu2gM";
    var yahoo_conversion_value = 1;
    /* ]]> */
</script>
<script type="text/javascript" src="//s.yimg.jp/images/listing/tool/cv/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//b91.yahoo.co.jp/pagead/conversion/1000119374/?value=1&label=nVgCCND51WsQvLDu2gM&guid=ON&script=0&disvt=true"/>
    </div>
</noscript>
</body>
<!-- InstanceEnd --></html>
