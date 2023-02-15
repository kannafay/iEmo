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
  window.location.href = document.querySelectorAll('ul li a')[0].getAttribute('href');
</script>