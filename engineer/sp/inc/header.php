    <header>
      <div class="header_inner">
        <div class="logo_wrap">
          <h1><a href="http://www.engineer-fan.jp/sp/"><img src="/engineer/assets/images/sp_common/images/header_logo.png" alt="圧倒的な案件数と徹底的なサポートのフリーエンジニア向け求人サイト Engineer Fan!!!"></a></h1>
        </div>
        <!--logo_wrap-->
        <div class="head_menu_wrap">
          <p id="head_menu"><img src="/engineer/assets/images/sp_common/images/menu.png" alt="メニュー"></p>
        <!--head_menu_wrap-->


        <div id="menu01" class="mordal-content">

          <p class="close_top close_bottom">
            <a class="modal-close"><img src="/engineer/assets/images/sp_common/images/close.png" alt="閉じる"></a>
          </p>
          <div class="modal_inner">
            <ul>
              <li class="accordion_border">
                <p class="toggle_wrap"><a class="toggle" href="http://www.engineer-fan.jp/sp/">ホーム</a></p>
              </li>
              <li class="accordion_border">
                <p class="toggle_wrap"><a class="toggle" href="http://www.engineer-fan.jp/sp/service/service_index.html">サービスについて</a></p>
                <ul>
                  <li><a href="http://www.engineer-fan.jp/sp/service/melit.html">エンジニアファンのメリット</a></li>
                  <li><a href="http://www.engineer-fan.jp/sp/service/consultant.html">コンサルタント紹介</a></li>
                  <li><a href="http://www.engineer-fan.jp/sp/service/freelance.html">フリーランスとは？</a></li>
                </ul>
              </li>
              <li class="accordion_border">
                <p class="toggle_wrap"><a class="toggle" href="http://www.engineer-fan.jp/sp/job/job_index.html">求人情報</a></p>
              </li>
              <li class="accordion_border">
                <p class="toggle_wrap"><a class="toggle" href="http://www.engineer-fan.jp/sp/guide/guide_index.html">ご利用ガイド</a></p>
                <ul>
                  <li><a href="http://www.engineer-fan.jp/sp/guide/howto.html">エンジニアファンの使い方</a></li>
                  <li><a href="http://www.engineer-fan.jp/sp/guide/faq.html">よくあるご質問</a></li>
                </ul>
              </li>
              <li class="accordion_border">
                <p class="toggle_wrap"><a class="toggle" href="http://www.engineer-fan.jp/sp/company/company_index.html">運営会社情報</a></p>
              </li>
              <li class="accordion_border">
                <p class="toggle_wrap"><a class="toggle" href="https://www.dream-v.co.jp/engineer/sp/contact/">お問い合わせ</a></p>
              </li>
               <li class="accordion_border">
                <p class="toggle_wrap"><a class="toggle" href="http://www.engineer-fan.jp/sp/privacy/privacy_index.html">プライバシーポリシー</a></p>
              </li>
            </ul>
            <p class="close_bottom"><img src="/engineer/assets/images/sp_top/images/close_btn.png" alt="閉じる"></p>
          </div>
          <!--modal_inner-->
        </div>
        <!--menu01 modal-content-->
      </div>
      <!--header_inner-->
     </div>
	      <script>// <![CDATA[
              $(function(){
                  $("#head_menu").next().css('display', 'none');
                  $("#head_menu").on("click", function() {
                      $("body").css('position', 'fixed');
                      $(this).next().fadeIn();
                      $(this).css('opacity', '0');
                      $(this).next().css('display', 'block');
                      $(this).next().css('overflow', 'auto');
                  });
                  $(".close_bottom").on("click", function() {
                      $("body").css('position', 'relative');
                      $("#head_menu").next().fadeOut();
                      $("#head_menu").css('display', 'block');
                      $("#head_menu").css('opacity', '1');
                        });
              });
      // ]]>
      </script> 
    </header>
