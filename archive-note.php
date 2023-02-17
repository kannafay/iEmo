<?php get_head(); ?>
  <div class="container note">
    <?php get_header(); ?>
    <script>
      $('header .menu ul li.note').addClass('current-menu-item');
    </script>
    <main>
      <?php get_nav(); ?>
      <div class="content">
        <article>
        <div class="notes-box">
          <h2>说说 <span>Notes.</span></h2>
          <ul>
            <?php 
              $limit = get_option('posts_per_page');$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
              query_posts('post_type=note&post_status=publish&paged=' . $paged);
              if (have_posts()) : while (have_posts()) : the_post(); 
            ?>

            <p><a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a></p>
            
            
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