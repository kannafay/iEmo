<?php
/**
 * Author: kannafay
 * Email: me@onll.cn
 */

// head标签
function get_head() {
  require_once('inc/head.php');
}

// foot标签
function get_foot() {
  require_once('inc/foot.php');
}

// nav标签
function get_nav() {
  require_once('inc/nav.php');
}

// aside标签
function get_aside() {
  require_once('inc/aside.php');
}

// 静态路径
function fileUri() {
  return get_template_directory_uri();
}

// 网站标题
function show_wp_title() {
  global $page, $paged;
  wp_title( '-', true, 'right' );
  bloginfo( 'name' );
  $site_description = get_bloginfo( 'description', 'display' );
  if($site_description && (is_home() || is_front_page()))
    echo ' - ' . $site_description;
  if ( $paged >= 2 || $page >= 2 )
    echo ' - ' . sprintf('第%s页', max( $paged, $page ));
}

// 摘要长度
function excerpt_length($length) {
  return 300;
}
add_filter('excerpt_length', 'excerpt_length');

// 开启特色图
if(function_exists('add_theme_support')) {
  add_theme_support('post-thumbnails',array('post','page'));
}

// 文章默认封面
function default_post_cover() {
  return fileUri().'/assets/images/cover.jpg';
}

// 获取文章第一张图片
function first_post_cover($content){
  error_reporting(0);
  if ( $content === false ) $content = get_the_content();
  preg_match_all('|<img.*?src=[\'"](.*?)[\'"].*?>|i', $content, $images);
  if($images){      
    return $images[1][0];
  }else{
    return false;
  }
}

//获取用户信息
function get_user_role($id) {
  $user = new WP_User($id);
  return $user->data;
}