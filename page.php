<link rel="stylesheet" href="<?php echo fileUri(); ?>/assets/css/single.css">
<link rel="stylesheet" href="<?php echo fileUri(); ?>/assets/static/fancybox/fancybox.css">
<link rel="stylesheet" href="<?php echo fileUri(); ?>/assets/static/highlight/styles/vs2015.min.css">

<?php get_head(); ?>
  <div class="container single">
    <?php get_header(); ?>
    <main>
      <?php get_nav(); ?>
      <div class="content">
        <article>
          <div class="post-cover">
            <div class="cover">
              <?php
                if (has_post_thumbnail()) {
                  the_post_thumbnail('large');
                } else { ?>
                  <img src="<?php if(first_post_cover(get_the_content())){echo first_post_cover(get_the_content());}else{echo default_post_cover();} ?>" alt="">
                <?php }
              ?>
              <img id="color-thief" src="" alt="" crossorigin="anonymous" style="display:none">
            </div>
            <script>$('.single .post-cover .cover #color-thief').attr('src',$('.single .post-cover .cover img:first').attr('src'));</script>
            <div class="post-info">
              <div class="title" title="<?php the_title(); ?>"><?php the_title(); ?></div>
              <div class="more">
                <div class="time">
                  <i class="iconfont icon-clock"></i>
                  <span><?php echo get_the_date(); ?> <?php the_time(); ?></span>
                </div>
              </div>
            </div>
          </div>
          <div class="post-content">
            <?php the_content(); ?>
          </div>
        </article>
        <?php get_aside(); ?>
      </div>
    </main>
  </div>
<?php get_foot(); ?>

<?php require_once('inc/single-color.php'); ?>

<script>
  let postImg = document.querySelectorAll('.post-content img');
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
<script src="<?php echo fileUri(); ?>/assets/static/highlight/highlight.min.js"></script>