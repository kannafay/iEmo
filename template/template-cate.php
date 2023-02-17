<?php
/**
 * Template Name: 分类模板
 */
?>

<style>
  * {
    display: none;
  }
</style>

<?php wp_list_categories(); ?>
<script>
  window.location.href = document.querySelector('ul li a').getAttribute('href');
</script>