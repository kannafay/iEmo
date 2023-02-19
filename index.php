<?php get_head(); ?>
  <div class="container home">
    <?php get_header(); ?>
    <main>
      <?php get_nav(); ?>
      <div class="content">
        <article>
          <h2>首页 <span>Home.</span></h2>
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
                  <?php $new_i=0; ?>
                  <?php if($recommend_query->have_posts()) : while($recommend_query->have_posts()) : $recommend_query->the_post(); ?>
                    <div>
                      <a href="<?php the_permalink(); ?>">
                        <?php
                          if (has_post_thumbnail()) {
                            the_post_thumbnail('large');
                          } else { ?>
                            <img src="<?php if(first_post_cover(get_the_content())){echo first_post_cover(get_the_content());}else{echo default_post_cover();} ?>?recommend=<?php $i++; echo $i; ?>" alt="<?php the_title_attribute(); ?>" >
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
                <div class="slider"></div>
                <li><a class="active">最新发布</a></li>
                <li><a>为你推荐</a></li> 
              </ul>
            </div>
            <?php require_once('inc/home-new.php'); ?>
            <?php require_once('inc/home-sticky.php'); ?>
            <?php require_once('inc/home-color.php'); ?>
          </div>
        </article>
        <?php get_aside(); ?>
      </div>
    </main>
  </div>
<?php get_foot(); ?>