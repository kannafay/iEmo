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
                  <div class="left">
                    <?php echo get_avatar(1, '200'); ?>
                  </div>
                  <div class="right">
                    <div class="top">
                      <div class="author-name"><?php echo get_user_role(1)->display_name; ?></div>
                      <div class="view-all"><a href="<?php the_permalink(); ?>"><i class="iconfont icon-message-square"></i>查看全文</a></div>
                    </div>
                    <div class="bottom">
                      <p><?php the_excerpt(); ?></p>
                    </div>
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