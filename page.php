<link rel="stylesheet" href="<?php echo fileUri(); ?>/assets/css/single.css">
<link rel="stylesheet" href="<?php echo fileUri(); ?>/assets/static/fancybox/fancybox.css">
<link rel="stylesheet" href="<?php echo fileUri(); ?>/assets/static/highlight/styles/<?=get_option("iemo_code_css") == '' ? 'vs2015' : get_option("iemo_code_css")?>.min.css">

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
                if (has_post_thumbnail()) { ?>
                <img class="thumbnail_loading" src="<?php echo fileUri() ?>/assets/images/loading.gif" alt="">
                <?php the_post_thumbnail('large'); ?>
                <img class="color-thief" src="" alt="" crossorigin="anonymous" style="display:none">
                <script>
                  const imgELem1 = $('.single .post-cover .cover img:eq(1)');
                  imgELem1.css('opacity','0');
                  imgELem1.on('load',function (){
                    $('.single .post-cover .cover img:first').remove();
                    <?php
                      if(get_option("iemo_page_animation")) { ?>
                        $(this).css('animation','FadeIn-<?php echo get_option("iemo_page_animation"); ?> .5s forwards');
                      <?php }
                    ?>
                    $(this).css('opacity','1');
                  });
                  $('.single .post-cover .cover .color-thief').attr('src',imgELem1.attr('src'));
                </script>
              <?php } else {
                $imgUrl = first_post_cover(get_the_content());
                if($imgUrl){ ?>
                  <img class="thumbnail_loading" src="<?php echo fileUri() ?>/assets/images/loading.gif" alt="">
                  <img src="<?=$imgUrl?>" alt="">
                  <img class="color-thief" src="<?=$imgUrl?>" alt="" crossorigin="anonymous" style="display:none">
                  <script>
                    const imgELem2 = $('.single .post-cover .cover img:eq(1)');
                    imgELem2.css('opacity','0');
                    imgELem2.on('load',function (){
                      $('.single .post-cover .cover img:first').remove();
                      <?php
                        if(get_option("iemo_page_animation")) { ?>
                          $(this).css('animation','FadeIn-<?php echo get_option("iemo_page_animation"); ?> .5s forwards');
                        <?php }
                      ?>
                      $(this).css('opacity','1');
                    });
                  </script>
                <?php }else{ ?>  
                  <img class="get_img_url" src="<?php echo fileUri() ?>/assets/images/loading.gif" alt="">
                  <img class="color-thief" src="" alt="" crossorigin="anonymous" style="display:none">
                <?php } ?>
              <?php } ?>
            </div>
            
            <?php
              if(get_option("iemo_comments") == 'true') {
                if(comments_open()) { ?>
                  <div class="to-comment">
                    <a><i class="iconfont icon-message-circle"></i>参与讨论</a>
                  </div>
                <?php }
              }
            ?>

            <div class="post-info">
              <div class="title">
                <h2 title="<?php the_title(); ?>"><?php the_title(); ?></h2>
              </div>
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
          <?php
            if(get_option("iemo_comments") == 'true') {
              require 'comments.php';
            }
          ?>
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