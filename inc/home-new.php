<div class="post-part new active">
  <ul>
    <?php $new_i = 0; ?>
    <?php 
      $sticky = get_option( 'sticky_posts' );
      $args = array(
      	'ignore_sticky_posts' => 1,
      );
      query_posts(array_merge($args, $wp_query->query)); 
      if ( have_posts() ) : while ( have_posts() ) : the_post(); 
    ?> 
      <li>
        <div class="left">
          <a class="cover" href="<?php the_permalink(); ?>">
            <?php
              if (has_post_thumbnail()) {
                the_post_thumbnail();
              } else { ?>
                <img src="<?php if(first_post_cover(get_the_content())){echo first_post_cover(get_the_content());}else{echo default_post_cover();} ?>?new=<?php $new_i++; echo $new_i; ?>" alt="" >
              <?php }
            ?>
            <img class="color-thief" src="" alt="" crossorigin="anonymous" style="display:none">
          </a>
          <div class="cate-view">
            <?php echo the_category(' <span>/</span> '); ?>
          </div>
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
    <?php 
      endwhile; else: endif; 
      wp_reset_query(); 
    ?>
  </ul>
  <?php require_once('ajax-home.php'); ?>
</div>
