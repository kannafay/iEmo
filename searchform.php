<form class="search-box" method="get" action="<?php bloginfo('url') ?>">
  <label for="search" class="iconfont icon-search"></label>
  <input id="search" type="text" value="<?php the_search_query(); ?>" name="s" placeholder="搜索..." required>
</form>