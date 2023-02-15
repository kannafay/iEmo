<?php
/**
 * Template Name: 链接模板
 */
?>

<?php get_head(); ?>
  <div class="container link">
    <?php get_header(); ?>
    <main>
      <?php get_nav(); ?>
      <div class="content">
        <article>
          <h2>友人帐 <span>Friends.</span></h2>
          <div class="link-box">
            <ul>
              <?php
                $bookmarks = get_bookmarks();
                if (!empty($bookmarks) ) {
                  foreach ($bookmarks as $bookmark) {
              ?>
                <li>
                  <a href="<?php echo $bookmark->link_url; ?>">
                    <div class="left">
                      <img src="<?php echo $bookmark->link_image; ?>" alt="">
                    </div>
                    <div class="right">
                      <h3><?php echo $bookmark->link_name; ?></h3>
                      <p><?php echo $bookmark->link_description; ?></p>
                    </div>
                  </a>
                </li>
              <?php
                  }
                }
              ?>
            </ul>
          </div>
        </article>
        <?php get_aside(); ?>
      </div>
    </main>
  </div>
<?php get_foot(); ?>