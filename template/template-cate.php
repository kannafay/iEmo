<?php
/**
 * Template Name: 分类模板
 */
?>

<style>
  article * {
    display: none;
  }
  article {
    animation: none !important;
  }
</style>

<?php get_head(); ?>
  <div class="container category">
    <?php get_header(); ?>
    <script>
      // $('header .menu ul li.cate').addClass('current-menu-item');
    </script>
    <main>
      <?php get_nav(); ?>
      <div class="content">
        <article>
          <?php wp_list_categories(); ?>
        </article>
        <?php get_aside(); ?>
      </div>
    </main>
  </div>
<?php get_foot(); ?>

<script>
  $('title').text('');
  window.location.href = document.querySelector('article ul li a').getAttribute('href');
</script>