<aside class="">
  <div class="aside-content">
    <div class="author">
      <div class="cover">
        <!-- <img src="<?php //if(get_the_author_meta('bgi',1)) {the_author_meta('bgi',1);} else {echo fileUri().'/assets/images/cover-author.jpg';} ?>" alt=""> -->
        <img src="<?php if(get_option("iemo_cover_author")) {echo get_option("iemo_cover_author");} else {echo fileUri().'/assets/images/cover-author.jpg';} ?>" alt="">
      </div>
      <div class="author-info">
        <div class="avatar">
          <?php echo get_avatar(1, '400'); ?>
        </div>
        <div class="name"><?php echo get_user_role(1)->display_name; ?></div>
        <?php  ?>
        <div class="des">
          <?php 
            if(get_the_author_meta('description',1)) {
              echo get_the_author_meta('description',1); 
            } else {
              echo '这家伙很懒，什么都没写';
            }
          ?>  
        </div>
        <div class="post-info">
          <div class="posts">
            <i>文章</i>
            <span><?php echo wp_count_posts()->publish; ?></span>
          </div>
          <div class="tags">
            <i>标签</i>
            <span><?php echo wp_count_terms('post_tag'); ?></span>
          </div>
          <div class="notes">
            <i>说说</i>
            <span><?php echo wp_count_posts('note')->publish; ?></span>
          </div>
        </div>
      </div>
    </div>
    <?php
      if(has_nav_menu('aside')) { ?>
        <div class="social">
          <h2>社交 <span>Social.</span></h2>
          <?php
            wp_nav_menu( array( 
              'theme_location'  => 'aside',
              'container_class' => 'social-content',
              'fallback_cb'     => 'aside_fallback'
            ) );
          ?>
        </div>
      <?php }
    ?>
    <div class="notes-box">
      <h2>说说 <span>Notes.</span></h2>
      <ul>
        <?php 
          $limit = get_option('posts_per_page');$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
          query_posts('post_type=note&post_status=publish&paged=' . $paged);
          if (have_posts()) : while (have_posts()) : the_post(); 
        ?>
          <li>
            <div class="notes-content">
              <?php the_content(); ?>
            </div>
            
            <div class="notes-info">
              <div class="time">
                <span><?php echo get_the_date(); ?></span>
              </div>
              <?php 
                $note_time = time() - (get_post_datetime()->getTimestamp());
                if($note_time < 86400*3) { 
              ?>
                <div class="new">
                  <span>New</span>
                </div>
              <?php } ?>
            </div>
            <div class="view-detail"><a href="<?php the_permalink(); ?>">查看详情</a></div>
          </li>
        <?php endwhile; endif; ?>
      </ul>
      <?php require_once('ajax-note.php'); ?>
    </div>
  </div>
  <?php get_footer(); ?>
</aside>