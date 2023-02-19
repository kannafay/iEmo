<?php get_head(); ?>
  <div class="container category">
    <?php get_header(); ?>
    <script>
      $('header .menu ul li.cate').addClass('current-menu-item');
    </script>
    <main>
      <?php get_nav(); ?>
      <div class="content">
        <article>
          <?php wp_list_categories(array('title_li' => '<h2>分类 <span>Categories.</span></h2>')); ?>
          <div class="cate-box">
            <ul>
              <?php $cate_i = 0; ?>
              <?php if(have_posts()) : ?>
              <?php while(have_posts()) : the_post(); ?>
                <li>
                  <div class="left">
                    <a href="<?php the_permalink(); ?>">
                      <?php
                        if (has_post_thumbnail()) {
                          the_post_thumbnail();
                        } else { ?>
                          <img src="<?php if(first_post_cover(get_the_content())){echo first_post_cover(get_the_content());}else{echo default_post_cover();} ?>?cate=<?php $cate_i++; echo $cate_i; ?>" alt="" >
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
          <?php require_once('inc/ajax-cate.php'); ?>
        </article>
        <?php get_aside(); ?>
      </div>
    </main>
  </div>
<?php get_foot(); ?>