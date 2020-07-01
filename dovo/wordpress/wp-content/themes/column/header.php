<!DOCTYPE html>
<html lang="ja">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php bloginfo('name'); wp_title('|', true, 'left'); ?></title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo get_template_directory_uri(); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="<?php echo get_template_directory_uri(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="<?php echo get_template_directory_uri(); ?>/css/column.css" rel="stylesheet">
  <?php wp_head(); ?>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-135026501-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-135026501-1');
  </script>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <!--a class="navbar-brand" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a-->
      <a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="https://www.dream-v.co.jp/dovo/wordpress/wp-content/uploads/2020/03/logo13.png"></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="https://www.dream-v.co.jp/" target="_blank">COMPANY</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.dream-v.co.jp/recruit/" target="_blank">RECRUIT</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  

