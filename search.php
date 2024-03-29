<?php get_head(); ?>
  <div class="container search">
    <?php get_header(); ?>
    <main>
      <?php get_nav(); ?>
      <div class="content">
        <article>
          <h2>搜索 <span>Search.</span></h2>
          <h3>搜索关键词：<span><?php the_search_query(); ?></span></h3>
          <div class="search-box">
            <ul>
              <?php if(have_posts()) : ?>
              <?php while(have_posts()) : the_post(); ?>
                <li>
                  <div class="left">
                    <a href="<?php the_permalink(); ?>">
                      <?php
                        if (has_post_thumbnail()) {
                          the_post_thumbnail();
                        } else { ?>
                          <img src="<?php if(first_post_cover(get_the_content())){echo first_post_cover(get_the_content());}else{echo default_post_cover();} ?>?<?=the_ID()?>" alt="" >
                        <?php }
                      ?>
                    </a>
                  </div>
                  <div class="right">
                    <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                    <span><i class="iconfont icon-clock"></i> <?php echo get_the_date(); ?></span>
                  </div>
                </li>
              <?php endwhile; ?>
              <?php endif; ?>
            </ul>
          </div>
          <?php require 'inc/ajax/ajax-search.php'; ?>
        </article>
        <?php get_aside(); ?>
      </div>
    </main>
  </div>
<?php get_foot(); ?>