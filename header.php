<div class="search-m" id="search-box-m">
  <form method="get" action="<?php bloginfo('url') ?>">
    <input id="search-m" type="text" value="<?php the_search_query(); ?>" name="s" placeholder="搜索..." required>
  </form>
</div>
<header class="">
  <div class="logo">
    <a href="/"><img src="<?php if(has_site_icon()) echo site_icon_url(); else echo fileUri().'/assets/images/wp-logo-blue.png'; ?>" alt=""></a>
  </div>

  <?php
    wp_nav_menu( array( 
      'theme_location'  => 'menu',
      'container_class' => 'menu',
      'fallback_cb'     => 'menu_fallback'
    ) );
  ?>
</header>