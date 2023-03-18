<aside class="">
  <div class="aside-content">
    <div class="aside-page main-page active">
      <div class="author">
        <div class="cover">
          <img src="<?php if(get_option("iemo_cover_author")) {echo get_option("iemo_cover_author");} else {echo fileUri().'/assets/images/cover-author.jpg';} ?>" alt="">
        </div>
        <div class="author-info">
          <div class="avatar">
            <?php the_avatar_author(); ?>
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

        <?php
          if(get_option("iemo_aside_subpage") == 'true') { ?>
            <div class="aside-btn-open">查看更多<i class="iconfont icon-chevron-right"></i></div>
          <?php }
        ?>

      </div>

      <?php
        if((is_single() || is_page()) && get_option("iemo_toc") == 'true') { ?>
          <div class="toc">
            <h2>目录 <span>Toc.</span></h2>
            <ul></ul>
          </div>
        <?php }
      ?>
      

      <?php
        if(has_nav_menu('social')) { ?>
          <div class="social">
            <h2>社交 <span>Social.</span></h2>
            <?php
              wp_nav_menu( array( 
                'theme_location'  => 'social',
                'container_class' => 'social-content',
                'fallback_cb'     => 'social_fallback'
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
        <?php require 'ajax/ajax-note.php'; ?>
      </div>
    </div>
    <?php require 'aside-sub-page.php'; ?>
  </div>
  <?php get_footer(); ?>
</aside>