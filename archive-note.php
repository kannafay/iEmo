<?php get_head(); ?>
  <div class="container note">
    <?php get_header(); ?>
    <main>
      <?php get_nav(); ?>
      <div class="content">
        <article>
          <h2>说说 <span>Notes.</span></h2>
          <div class="note-page">
            <ul>
              <?php 
                $limit = get_option('posts_per_page');$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                query_posts('post_type=note&post_status=publish&paged=' . $paged);
                if (have_posts()) : while (have_posts()) : the_post(); 
              ?>
                <li>
                  <div class="top">
                    <div class="left">
                      <?php the_avatar_author(); ?>
                    </div>
                    <div class="right">
                      <div class="note-author"><?php echo get_user_role(1)->display_name; ?></div>
                      <div class="note-date"><?php echo get_the_date(); ?> <?php the_time(); ?></div>
                    </div>
                  </div>
                  <div class="center">
                    <div class="notes-content">
                      <?php the_content(); ?>
                    </div>
                  </div>
                  <div class="bottom">
                    <a href="<?php the_permalink(); ?>"><i class="iconfont icon-message-square"></i>查看原文</a>
                  </div>
                </li>
              <?php 
                endwhile;
                endif; 
              ?>
            </ul>
          </div>
          <?php require_once('inc/ajax-note-page.php'); ?>
        </article>
        <?php get_aside(); ?>
      </div>
    </main>
  </div>
<?php get_foot(); ?>