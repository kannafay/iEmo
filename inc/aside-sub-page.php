<div class="aside-page sub-page">
  <div class="author">
    <div class="cover">
      <img src="<?php if(get_option("iemo_cover_author")) {echo get_option("iemo_cover_author");} else {echo fileUri().'/assets/images/cover-author.jpg';} ?>" alt="">
    </div>
    <div class="author-info-sub">
      <div class="avatar">
        <?php the_avatar_author(); ?>
      </div>
      <div class="author-name">
        <div class="name"><?php echo get_user_role(1)->display_name; ?></div>
        <?php  ?>
        <div class="des">
          <?php 
            if(get_the_author_meta('description',1)) {
              echo get_the_author_meta('description',1); 
            } else {
              echo '这家伙很懒，什么都没写';
            }
          ?>  
        </div>
      </div>
    </div>
    <div class="aside-btn-close"><i class="iconfont icon-chevron-left"></i>返回</div>
  </div>
  <?php
    if(has_nav_menu('menu_sidebar')) { ?>
      <div class="menu_sidebar_box">
        <h2>菜单 <span>Menus.</span></h2>
        <?php
          wp_nav_menu( array( 
            'theme_location'  => 'menu_sidebar',
            'container_class' => 'menu_sidebar',
            'fallback_cb'     => 'social_fallback'
          ) );
        ?>
      </div>
      <script>
        $('.menu_sidebar > ul > li.menu-item-has-children > a').append('<span class="iconfont icon-chevron-down arrow"></span>');
      </script>
    <?php }
  ?>

  <?php
    if(get_option("iemo_aside_comments") == 'true') { ?>
      <div class="new-comments">
        <h2>评论 <span>Comments.</span></h2>
        <?php require 'aside-comments.php';?>
      </div>
    <?php }
  ?>
  
  <?php
    if(get_option("iemo_about")) { ?>
      <div class="about">
        <h2>关于 <span>About.</span></h2>
        <p><?=get_option("iemo_about")?></p>
      </div>
    <?php }
  ?>
</div>