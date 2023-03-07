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
  <meta name="keywords" content="<?=is_home() ? bloginfo('name') : the_title()?>" />
  <meta name="description" content="<?=bloginfo('description')?>" />
  <title><?=function_exists('show_wp_title') ? show_wp_title() : bloginfo('name')?></title>
  <link rel="shortcut icon" href="<?=has_site_icon() ? site_icon_url() : fileUri().'/assets/images/wp-logo-blue.png'?>" type="image/x-icon">
  <link rel="stylesheet" href="<?=fileUri()?>/assets/css/style.css">
  <link rel="stylesheet" href="<?=fileUri()?>/assets/static/iconfont/iconfont.css">
  <script src="<?=fileUri(); ?>/assets/js/jquery.min.js"></script>
  <link rel="stylesheet" href="<?=fileUri()?>/assets/static/nprogress/nprogress.css">
  <?php
    if(get_option("iemo_page_animation")) { ?>
      <style>
        article,
        .home article .top,
        .home main .content article .bottom .post-part ul li,
        .category main .content article .cate-box ul li,
        .tag main .content article .tag-box ul li,
        .search main .content article .search-box ul li,
        .note main .content article .note-page li,
        .archive main .content article .archive-box h3,
        .archive main .content article .archive-box li,
        .link .single,
        .link .link-box,
        .comments {
          animation: FadeIn-<?=get_option("iemo_page_animation")?> .5s forwards !important;
        }
      </style>
    <?php }
  ?>
</head>
<body>