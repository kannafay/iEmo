<?php
/**
 * Template Name: 归档模板
 */
?>

<?php get_head(); ?>
  <div class="container archive">
    <?php get_header(); ?>
    <main>
      <?php get_nav(); ?>
      <div class="content">
        <article>
          <h2>归档 <span>Archives.</span></h2>
          <div class="archive-box">
            <?php iemo_archives_list(); ?>
          </div>
        </article>
        <?php get_aside(); ?>
      </div>
    </main>
  </div>
<?php get_foot(); ?>