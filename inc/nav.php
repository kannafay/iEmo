<div class="nav">
  <div class="left">
    <div class="menu-btn" id="menu-btn"><span class="iconfont icon-layout"></span></div>
    <div class="search-btn" id="search-btn"><span class="iconfont icon-search"></span></div>
    <?php get_search_form(); ?>
  </div>
  <div class="user-menu">
      <span class="iconfont icon-menu" id="user-menu-btn"></span>
      <div class="user-menu-box">
        <ul>
          <?php
            if(is_user_logged_in()) {
              if(current_user_can('level_7')) { ?>
                <li><a href="<?php bloginfo('url') ?>/wp-admin/post-new.php"><i class="iconfont icon-edit"></i> 发布新文章</a></li>
                <li><a href="<?php bloginfo('url') ?>/wp-admin/post-new.php?post_type=note"><i class="iconfont icon-edit-"></i> 发布新说说</a></li>
                <li><a href="<?php bloginfo('url') ?>/wp-admin"><i class="iconfont icon-settings"></i> 后台设置</a></li>
                <li><a href="<?php echo wp_logout_url(); ?>" class="logout"><i class="iconfont icon-power"></i> 登出账户</a></li>
              <?php } else { ?>
                <li><a href="<?php bloginfo('url') ?>/wp-admin"><i class="iconfont icon-settings"></i> 个人资料</a></li>
                <li><a href="<?php echo wp_logout_url(); ?>" class="logout"><i class="iconfont icon-power"></i> 登出账户</a></li>
              <?php } ?>
            <?php } else { ?>
              <li><a href="<?php echo wp_login_url(home_url(add_query_arg(array()))); ?>"><i class="iconfont icon-log-in"></i> 登录账户</a></li>
            <?php }
          ?>
        </ul>
      </div>
    <span class="iconfont icon-user" id="aside-btn"></span>
  </div>
</div>