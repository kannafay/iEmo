<?php
/**
 * Template Name: 标签模板
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
  <div class="container tag">
    <?php get_header(); ?>
    <script>
      // $('header .menu ul li.tag').addClass('current-menu-item');
    </script>
    <main>
      <?php get_nav(); ?>
      <div class="content">
        <article>
          <?php wp_tag_cloud(); ?>
        </article>
        <?php get_aside(); ?>
      </div>
    </main>
  </div>
<?php get_foot(); ?>

<script>
  $('title').text('');
  window.location.href = document.querySelector('article a').getAttribute('href');
</script>