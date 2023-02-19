<?php
/**
 * Template Name: 链接模板
 */
?>

<?php get_head(); ?>
<link rel="stylesheet" href="<?php echo fileUri(); ?>/assets/css/single.css">
<link rel="stylesheet" href="<?php echo fileUri(); ?>/assets/static/fancybox/fancybox.css">
<style>
  .single .post-content > *:last-child {
    margin-bottom: 20px;
  }
</style>
  <div class="container link">
    <?php get_header(); ?>
    <main>
      <?php get_nav(); ?>
      <div class="content">
        <article>
          <h2>友人帐 <span>Friends.</span></h2>
          <div class="single">
          <div class="post-content">
            <?php the_content(); ?>
          </div>
          </div>
          
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

<script>
  let postImg = document.querySelectorAll('.post-content .wp-block-image img');
  if(postImg) {
    let postImgUrl = [];
    $(postImg).each(function(i) {
      postImgUrl[i] = $('<a data-fancybox="gallery"></a>').attr('href',$(postImg[i]).attr('src'));
      postImg[i].parentNode.replaceChild($(postImgUrl[i])[0], postImg[i]);
      $(postImg[i]).appendTo($(postImgUrl[i])[0]);
    })
  }
</script>

<script src="<?php echo fileUri(); ?>/assets/static/fancybox/fancybox.umd.js"></script>