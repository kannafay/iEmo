<?php get_head(); ?>
  <div class="container say">
    <?php get_header(); ?>
    <main>
      <?php get_nav(); ?>
      <div class="content">
        <article>
        <div class="notes-box">
          <h2>说说</h2>
          <ul>
            <?php 
              $limit = get_option('posts_per_page');$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
              query_posts('post_type=say&post_status=publish&paged=' . $paged);
              if (have_posts()) : while (have_posts()) : the_post(); 
            ?>

            <?php the_content(); ?>
            
            <?php 
              endwhile;
              endif; 
            ?>
          </ul>
        </div>
        </article>
        <?php get_aside(); ?>
      </div>
    </main>
  </div>
<?php get_foot(); ?>

