<div class="search-m" id="search-box-m">
  <form method="get" action="<?php bloginfo('url') ?>">
    <input id="search-m" type="text" value="<?php the_search_query(); ?>" name="s" placeholder="搜索..." required>
  </form>
</div>
<header class="">
  <div class="logo">
    <a href="/"><img src="<?php if(has_site_icon()) echo site_icon_url(); else echo fileUri().'/assets/images/wp-logo-blue.png'; ?>" alt=""></a>
  </div>
  <!-- <div class="menu">
    <ul>
      <li><a href="/" class="current"><i class="iconfont icon-home"></i></a></li>
      <li><a href="/category.html"><i class="iconfont icon-folder"></i></a></li>
      <li><a href="/tag.html"><i class="iconfont icon-hash"></i></a></li>
      <li><a href="/archive.html"><i class="iconfont icon-archive"></i></a></li>
      <li><a href="/link.html"><i class="iconfont icon-link"></i></a></li>
    </ul>
  </div> -->
  <?php
    wp_nav_menu( array( 
      'theme_location'  => 'menu',
      'container_class' => 'menu',
      'fallback_cb'     => 'menu_fallback'
    ) );
  ?>
</header>