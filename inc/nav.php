<div class="nav">
  <div class="left">
    <div class="menu-btn" id="menu-btn"><span class="iconfont icon-copy"></span></div>
    <div class="search-btn" id="search-btn"><span class="iconfont icon-search"></span></div>
    <?php get_search_form(); ?>
  </div>
  <div class="user-menu">
    <span class="iconfont icon-user" id="aside-btn"></span>
    <?php if(current_user_can('level_7')) { ?>
      <span class="iconfont icon-more-horizontal" id="user-menu-btn"></span>
      <div class="user-menu-box">
        <ul>
          <li><a href="<?php bloginfo('url') ?>/wp-admin/post-new.php"><i class="iconfont icon-edit"></i> 发布新文章</a></li>
          <li><a href="<?php bloginfo('url') ?>/wp-admin/post-new.php?post_type=say"><i class="iconfont icon-edit-"></i> 发布新说说</a></li>
          <li><a href="<?php bloginfo('url') ?>/wp-admin"><i class="iconfont icon-settings"></i> 后台设置</a></li>
          <li><a href="<?php echo wp_logout_url(); ?>" class="logout"><i class="iconfont icon-power"></i> 登出账户</a></li>
        </ul>
      </div>
    <?php } ?>
    
  </div>
</div>