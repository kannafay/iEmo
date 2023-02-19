<?php

/**
 * Author: kannafay
 * Email: me@onll.cn
 */

// 后台设置
add_action('admin_menu', 'add_theme_options_menu');
function add_theme_options_menu() {
  add_theme_page(
    'iEmo主题设置',
    'iEmo主题设置',
    'edit_theme_options',
    'iemo_option',
    'iemo_option_admin'
  );
}
function iemo_option_admin() {
  require get_template_directory()."/admin/option.php";
}



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
  if(get_option("iemo_cover_post")) {
    return get_option("iemo_cover_post");
  } else {
    return fileUri().'/assets/images/cover-post.jpg';
  }
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

if ( ! function_exists( 'dr_filter_get_avatar' ) ) {
  function dr_filter_get_avatar( $avatar ) {
      // 新 Gravatar 头像源，可自行修改
      $new_gravatar_sever = 'cravatar.cn';

      $sources = array(
          'www.gravatar.com/avatar/',
          '0.gravatar.com/avatar/',
          '1.gravatar.com/avatar/',
          '2.gravatar.com/avatar/',
          'secure.gravatar.com/avatar/',
          'cn.gravatar.com/avatar/'
      );

      return str_replace( $sources, $new_gravatar_sever.'/avatar/', $avatar );
  }
  add_filter( 'get_avatar', 'dr_filter_get_avatar' );
}





// 获取头像
function get_avatar_author() {
  if(get_option("iemo_avatar_author")) {
    echo '<img src="'.get_option("iemo_avatar_author").'">';
  } else {
    echo get_avatar(1, '400');
  }
}



// 添加媒体外链
require_once('plugins/external-media-without-import/external-media-without-import.php');



// 个人背景图片
// function user_profile( $userProfile ) {
//   $userProfile['bgi'] = '背景图片';
//   return $userProfile;
// }
// add_filter('user_contactmethods','user_profile');




// 注册菜单
register_nav_menus( array(        
  'menu' => '左侧菜单',
  'aside' => '社交链接'
) );

// 返回函数
function menu_fallback(){
  if(is_user_logged_in()) {
    if(is_home()) {
      echo '<div class="menu">
        <ul class="menu">
          <li class="current-menu-item"><a href="'.home_url().'" title="首页"><i class="iconfont icon-home"></i></a></li>
          <li><a href="'.home_url().'/wp-admin/nav-menus.php" title="前往设置菜单"><i class="iconfont icon-settings"></i></a></li>
        </ul>
      </div>';
    } else {
      echo '<div class="menu">
        <ul class="menu">
          <li><a href="'.home_url().'" title="首页"><i class="iconfont icon-home"></i></a></li>
          <li><a href="'.home_url().'/wp-admin/nav-menus.php" title="前往设置菜单"><i class="iconfont icon-settings"></i></a></li>
        </ul>
      </div>';
    }
    
  } else {
    if(is_home()) {
      echo '<div class="menu">
        <ul class="menu">
          <li class="current-menu-item"><a href="'.home_url().'" title="首页"><i class="iconfont icon-home"></i></a></li>
        </ul>
      </div>';
    } else {
      echo '<div class="menu">
        <ul class="menu">
          <li><a href="'.home_url().'" title="首页"><i class="iconfont icon-home"></i></a></li>
        </ul>
      </div>';
    }
  }
}



// 说说
function note_init() { 
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
  register_post_type('note', $args); 
}
add_action('init', 'note_init');



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
    $output .= '<li><span>〔'.get_the_time('d日〕').'</span><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
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
    ashu_add_page('说说','note','archive-note.php');
    ashu_add_page('链接','link','template/template-link.php');
	}   
}   

add_action( 'load-themes.php', 'ashu_add_pages' ); 




// 搜索排除页面
add_filter('pre_get_posts', function($wp_query){
  if($wp_query->is_search){
    $wp_query->set('post_type', 'post');
  }
  return $wp_query;
});



// 登出账户后重定向
add_action('wp_logout','redirect_after_logout');
function redirect_after_logout(){
  wp_safe_redirect(home_url());
  exit();
}