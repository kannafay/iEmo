<?php get_head(); ?>
  <div class="container tag">
    <?php get_header(); ?>
    <script>
      $('header .menu ul li.tag').addClass('current-menu-item');
    </script>
    <main>
      <?php get_nav(); ?>
      <div class="content">
        <article>
          <h2>标签 <span>Tags.</span></h2>
          <div class="tag-bar">
            <ul>
              <?php $tag_i = 0; ?>
              <?php
                $tags = get_tags();
                if($tags) : foreach($tags as $tag) : 
              ?>
                <li>
                  <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"><?php echo esc_html( $tag->name ); ?></a>
                </li>
              <?php endforeach; ?>
              <?php endif; ?>
            </ul>
          </div>

          <div class="tag-box">
            <ul>
              <?php if(have_posts()) : ?>
              <?php while(have_posts()) : the_post(); ?>
                <li>
                  <div class="left">
                    <a href="<?php the_permalink(); ?>">
                      <?php
                        if (has_post_thumbnail()) {
                          the_post_thumbnail();
                        } else { ?>
                          <img src="<?php if(first_post_cover(get_the_content())){echo first_post_cover(get_the_content());}else{echo default_post_cover();} ?>?tag=<?php $tag_i++; echo $tag_i; ?>" alt="" >
                        <?php }
                      ?>
                    </a>
                  </div>
                  <div class="right">
                    <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                    <span><i class="iconfont icon-clock"></i> <?php echo get_the_date(); ?></span>
                  </div>
                </li>
              <?php endwhile; ?>
              <?php endif; ?>
            </ul>
            <?php 
              if(get_next_posts_link()) { ?>
                <div id="pagination-post" class="pagination-post">
                  <?php next_posts_link(__('<i class="iconfont icon-activity"></i> 加载更多文章')); ?>
                </div>
              <?php } else {
                echo '<div class="pagination-post no-more-post"><a><i class="iconfont icon-anchor"></i> 好像就这么多</a></div>';
              }
            ?>
          </div>
        </article>
        <?php get_aside(); ?>
      </div>
    </main>
  </div>
<?php get_foot(); ?>

<?php require_once('inc/ajax-tag.php'); ?>