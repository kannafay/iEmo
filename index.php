<?php get_head(); ?>
  <div class="container home">
    <?php get_header(); ?>
    <main>
      <?php get_nav(); ?>
      <div class="content">
        <article>
          <?php if(get_option("iemo_recommend_post")) { ?>
            <?php
              $recommend_query = new WP_Query(array(
                'post__in' => explode(',', get_option("iemo_recommend_post")),
                'post__not_in' => get_option('sticky_posts'),
                'orderby' => 'post__in',
                'showposts' => 3,
              ));
              if(1) { ?>
                <div class="top">
                  <section>
                  <?php if($recommend_query->have_posts()) : while($recommend_query->have_posts()) : $recommend_query->the_post(); ?>
                    <div>
                      <a href="<?php the_permalink(); ?>">
                        <?php
                          if (has_post_thumbnail()) {
                            the_post_thumbnail('large');
                          } else { ?>
                            <img src="<?php if(first_post_cover(get_the_content())){echo first_post_cover(get_the_content());}else{echo default_post_cover();} ?>" alt="<?php the_title_attribute(); ?>" >
                          <?php }
                        ?>
                        <h2><?php the_title(); ?></h2>
                      </a>
                      <p><?php the_excerpt(); ?></p>
                    </div>
                  <?php endwhile; endif; ?>
                  </section>
                </div>
              <?php }
            ?>
          <?php } ?>

          <div class="bottom">
            <div class="recommend-bar">
              <ul>
                <li><a href="/" class="current">最新发布</a></li>
                <li><a href="/">为你推荐</a></li>
              </ul>
            </div>
            <div class="post-part">
              <ul>
              <?php if(have_posts()) : ?>
              <?php while(have_posts()) : the_post(); ?>
                <li>
                  <div class="left">
                    <a class="cover" href="<?php the_permalink(); ?>">
                      <?php
                        if (has_post_thumbnail()) {
                          the_post_thumbnail();
                        } else { ?>
                          <img src="<?php if(first_post_cover(get_the_content())){echo first_post_cover(get_the_content());}else{echo default_post_cover();} ?>" alt="<?php the_title_attribute(); ?>" >
                        <?php }
                      ?>
                    </a>
                    <script>$('.home main .content article .bottom .post-part ul li .left a.cover img').attr('crossorigin','anonymous');</script>
                    <?php echo the_category(' ', 'single'); ?>
                  </div>
                  <div class="right">
                    <div class="text">
                      <div class="title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                      </div>
                      <p><?php the_excerpt(); ?></p>
                    </div>
                    <div class="post-info">
                      <div class="time">
                        <i class="iconfont icon-clock"></i>
                        <span><?php echo get_the_date(); ?></span>
                      </div>
                      <div class="read-more">
                        <a href="<?php the_permalink(); ?>">
                          <span>阅读更多</span>
                          <i class="iconfont icon-arrow-right"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </li>
              <?php endwhile; ?>
              <?php endif; ?>
              </ul>
            </div>
            <?php require_once('inc/ajax-home.php'); ?>
          </div>
        </article>
        <?php get_aside(); ?>
      </div>
    </main>
  </div>
<?php get_foot(); ?>