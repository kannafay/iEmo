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
  wp_title( '&#8211;', true, 'right' );
  bloginfo( 'name' );
  $site_description = get_bloginfo( 'description', 'display' );
  if($site_description && (is_home() || is_front_page()))
    echo ' &#8211; ' . $site_description;
  if ( $paged >= 2 || $page >= 2 )
    echo ' &#8211; ' . sprintf('第%s页', max( $paged, $page ));
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



// 头像
require_once('plugins/simple-local-avatars/simple-local-avatars.php');



// 添加媒体外链
require_once('plugins/external-media-without-import/external-media-without-import.php');



// 个人背景图片
function user_profile( $userProfile ) {
  $userProfile['bgi'] = '背景图片'; //增加
  return $userProfile;
}
add_filter('user_contactmethods','user_profile');




// 注册菜单
register_nav_menus( array(        
  'menu' => '左侧菜单',
  'aside' => '社交链接'
) );



// 说说
function say_init() { 
  $labels = [ 
    'name' => '说说',
    'singular_name' => '说说', 
    'all_items' => '所有说说',
    'add_new' => '发表说说', 
    'add_new_item' => '撰写新说说',
    'edit_item' => '编辑说说', 
    'new_item' => '新说说', 
    'view_item' => '查看说说', 
    'search_items' => '搜索说说', 
    'not_found' => '暂无说说', 
    'not_found_in_trash' => '没有已遗弃的说说', 
    'parent_item_colon' => '',
    'menu_name' => '说说'
  ]; 
  $args = [ 
    'labels' => $labels, 
    'public' => true, 
    'publicly_queryable' => true, 
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true, 
    'rewrite' => true, 
    'capability_type' => 'post', 
    'has_archive' => true, 
    'hierarchical' => false, 
    'menu_position' => null, 
    'supports' => array('title','editor','author','comments'),
  ]; 
  register_post_type('say', $args); 
}
add_action('init', 'say_init');



// 链接
add_filter( 'pre_option_link_manager_enabled', '__return_true' );
function friend_links($output){
  if(!is_home()|| is_paged()) {
    $output = '';
  }
  return $output;
}
add_filter('wp_list_bookmarks','friend_links');



// 归档页
function iemo_archives_list() {
  if( !$output = get_option('iemo_archives_list') ) {
  $the_query = new WP_Query( 'posts_per_page=-1&ignore_sticky_posts=1&showposts=-1' );
  $year=0; $mon=0; $i=0; $j=0;
  while ( $the_query->have_posts() ) : $the_query->the_post();
    $year_tmp = get_the_time('Y');
    $mon_tmp = get_the_time('m');
    if ($year != $year_tmp || $mon != $mon_tmp) {
      $year = $year_tmp;
      $mon = $mon_tmp;
      $output .= '<h3>'. $year .'年'.$mon.'月</h3>';
    }
    $output .= '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
    endwhile;
    wp_reset_postdata();
    update_option('iemo_archives_list', $output);
  }
  echo $output;
}

function iemo_clear_cache() {
  update_option('iemo_archives_list', '');
}
add_action('save_post', 'iemo_clear_cache');



// 自动添加页面模板
function ashu_add_page($title,$slug,$page_template=''){   
  $allPages = get_pages();
  $exists = false;   
  foreach( $allPages as $page ){   
    if( strtolower( $page->post_name ) == strtolower( $slug ) ){   
      $exists = true;   
    }   
  }  

  if( $exists == false ) {   
    $new_page_id = wp_insert_post(   
      array(   
        'post_title' => $title,   
        'post_type'     => 'page',   
        'post_name'  => $slug,   
        'comment_status' => 'closed',   
        'ping_status' => 'closed',   
        'post_content' => '',   
        'post_status' => 'publish',   
        'post_author' => 1,   
        'menu_order' => 0   
      )   
    );   
    if($new_page_id && $page_template!=''){   
      update_post_meta($new_page_id, '_wp_page_template',  $page_template);   
    }   
  }   
}

function ashu_add_pages() {   
	global $pagenow;   
	if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) ){
		ashu_add_page('分类','category','template/template-cate.php');
		ashu_add_page('标签','tag','template/template-tag.php');
		ashu_add_page('归档','archive','template/template-archive.php');
    ashu_add_page('链接','link','template/template-link.php');
	}   
}   

add_action( 'load-themes.php', 'ashu_add_pages' ); 