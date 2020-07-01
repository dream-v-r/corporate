<?php
session_name('DV-PHPSESSID');
session_destroy();                     // 関連データの廃棄
setCookie( 'PHPSESSID' );              // 通常はこれで削除できる
setCookie( 'PHPSESSID', '', 0, '/' );  // 上記でクッキーを削除できないとき
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
<h2><img alt="お問い合わせ" src="/engineer/assets/images/sp_entry/images/entry_ttl.png" /></h2>

<section id="ef_entry_contents">
  <div class="special_thx">
    <div class="inner">
      <div class="contents_wrapper">
        <p class="entry_thanks"><img src="img/fig_flow_sent.png" alt=""></p>
        <p class="entry_thanks">このたびは、エンジニアファンにご登録いただき、誠にありがとうございました。<br>お送りいただきました内容を確認の上、折り返しご連絡させていただきます。</p>
        <p class="entry_thanks">尚、数日経過しても連絡がない場合やお急ぎの場合、ご質問やご不明な点がある場合には、<br>
          下記の連絡先までお問い合わせくださいませ。</p>
        <p class="entry_thanks">また、ご記入いただきましたメールアドレスへ、自動返信の確認メールを送付しています。<br>
          万が一、自動返信メールが届かない場合は、入力いただいたメールアドレスに間違いがあった可能性がございます。<br>
          メールアドレスをご確認の上、もう一度エントリーよりご入力頂けますようお願い申し上げます。</p>
      </div>

    </div>
  </div>
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
</section>

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
<!-- Google Code for &#28961;&#26009;&#12456;&#12531;&#12488;&#12522;&#12540;&#65288;SP&#65289; Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 999035701;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "H4IaCKT01WsQtaaw3AM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/999035701/?label=H4IaCKT01WsQtaaw3AM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<!-- Yahoo Code for your Conversion Page -->
<script type="text/javascript">
    /* <![CDATA[ */
    var yahoo_conversion_id = 1000119374;
    var yahoo_conversion_label = "ZmfMCL3f0GsQvLDu2gM";
    var yahoo_conversion_value = 1;
    /* ]]> */
</script>
<script type="text/javascript" src="//s.yimg.jp/images/listing/tool/cv/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//b91.yahoo.co.jp/pagead/conversion/1000119374/?value=1&label=ZmfMCL3f0GsQvLDu2gM&guid=ON&script=0&disvt=true"/>
    </div>
</noscript>
</body>
</html>
