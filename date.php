<?php get_head(); ?>
  <div class="container date">
    <?php get_header(); ?>
    <script>
      $('header .menu ul li.archive').addClass('current-menu-item');
    </script>
    <main>
      <?php get_nav(); ?>
      <div class="content">
        <article>
        <select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
        	<option value=""><?php echo esc_attr( __( '选择日期' ) ); ?></option> 
          <?php wp_get_archives( 'type=monthly&format=option&show_post_count=1' ); ?>
        </select>
        </article>
        <?php get_aside(); ?>
      </div>
    </main>
  </div>
<?php get_foot(); ?>