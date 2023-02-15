<?php
/**
 * Template Name: 标签模板
 */
?>

<style>
  * {
    display: none;
  }
</style>

<?php wp_tag_cloud(); ?>
<script>
  window.location.href = document.querySelectorAll('a')[0].getAttribute('href');
</script>