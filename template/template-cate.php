<?php
/**
 * Template Name: 分类模板
 */
?>

<title></title>
<?php get_head(); ?>
  <div class="container category">
    <?php get_header(); ?>
    <script>
      $('header .menu ul li.cate').addClass('current-menu-item');
    </script>
    <main>
      <?php get_nav(); ?>
      <div class="content">
        <article>
          <?php wp_list_categories(array('title_li' => '<h2>分类 <span>Categories.</span></h2>')); ?>
          <div class="cate-box"></div>
        </article>
        <?php get_aside(); ?>
      </div>
    </main>
  </div>
<?php get_foot(); ?>

<?php get_template_part('inc/ajax/ajax-cate-tpl'); ?>