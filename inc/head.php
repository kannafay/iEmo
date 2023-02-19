<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Cache-Control" content="no-transform" />
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <meta name="renderer" content="webkit" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />
  <title><?php if(function_exists('show_wp_title')){show_wp_title();} ?></title>
  <link rel="shortcut icon" href="<?php if(has_site_icon()) echo site_icon_url(); else echo fileUri().'/assets/images/wp-logo-blue.png'; ?>" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo fileUri(); ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo fileUri(); ?>/assets/static/iconfont/iconfont.css">
  <script src="<?php echo fileUri(); ?>/assets/js/jquery.min.js"></script>
  <?php
    if(get_option("iemo_page_toggle")) { ?>
      <style>
        article,
        .home main .content article .bottom .post-part.active {
          animation: FadeIn-<?php echo get_option("iemo_page_toggle"); ?> .5s forwards;
        }
      </style>
    <?php }
  ?>
  
</head>
<body>