<?php
/**
 * Template Name: 标签模板
 */
?>

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

          <div class="tag-box"></div>
        </article>
        <?php get_aside(); ?>
      </div>
    </main>
  </div>
<?php get_foot(); ?>

<?php get_template_part('inc/ajax/ajax-tag-tpl'); ?>