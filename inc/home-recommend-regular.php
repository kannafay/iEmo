<?php if(get_option("iemo_recommend_post")) { ?>
  <?php
    if(is_array(get_option("iemo_recommend_post"))) {
      $iemo_post = implode(',',get_option("iemo_recommend_post"));
    }
    $recommend_query = new WP_Query(array(
      'post__in' => explode(',', $iemo_post),
      'post__not_in' => get_option('sticky_posts'),
      'orderby' => 'post__in',
      'showposts' => 3,
    ));
  ?>
  <div class="top">
    <div class="regular">
      <?php $recommend_i = 0; ?>
      <?php if($recommend_query->have_posts()) : while($recommend_query->have_posts()) : $recommend_query->the_post(); ?>
        <div class="regular-box">
          <a href="<?php the_permalink(); ?>">
            <?php
              if (has_post_thumbnail()) {
                the_post_thumbnail('large');
              } else { ?>
                <img src="<?php if(first_post_cover(get_the_content())){echo first_post_cover(get_the_content());}else{echo default_post_cover();} ?>?recommend=<?php $recommend_i++; echo $recommend_i; ?>" alt="" >
              <?php }
            ?>
            <div class="regular-post-info">
              <h2><?php the_title(); ?></h2>
            </div>
          </a>
          <p><?php the_excerpt(); ?></p>
        </div>
      <?php endwhile; endif; ?>
    </div>
  </div>
<?php } ?>