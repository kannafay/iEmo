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
                  <img src="<?php if(first_post_cover(get_the_content())){echo first_post_cover(get_the_content());}else{echo default_post_cover();} ?>" alt="<?php the_title_attribute(); ?>">
                <?php }
              ?>
              <script>$('.single main .content article .post-cover .cover img').attr('crossorigin','anonymous');</script>
            </div>
            <div class="post-info">
              <div class="title" title="<?php the_title(); ?>"><?php the_title(); ?></div>
              <div class="more">
                <div class="time">
                  <i class="iconfont icon-clock"></i>
                  <span><?php echo get_the_date(); ?> <?php the_time(); ?></span>
                </div>
                <div class="cate">
                  <?php echo the_category(' ', 'single') ?>
                </div>
                <?php if(get_the_tag_list()){ ?><div class="tag"><?php echo get_the_tag_list('',' ',''); ?></div><?php } ?>
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
<script src="<?php echo fileUri(); ?>/assets/js/color-thief.min.js"></script>
<script>
  const colorThief = new ColorThief();
  const img = document.querySelector('.single main .content article .post-cover .cover img');
  const getColorFun=()=>{
    let colors = colorThief.getColor(img);
    // console.log(`rgb(${colors[0]}, ${colors[1]}, ${colors[2]})`);
    function changeColor() {
      $(`
        <style>
          :root {
            --theme: rgb(${colors[0]}, ${colors[1]}, ${colors[2]});
            --theme-op-2: rgb(${colors[0]}, ${colors[1]}, ${colors[2]});
            --post-cover: rgb(${colors[0]}, ${colors[1]}, ${colors[2]});
            --scroll: rgba(${colors[0]}, ${colors[1]}, ${colors[2]}, .5);
            --menu-hover: rgba(${colors[0]}, ${colors[1]}, ${colors[2]}, .1);
            --social-hover: rgba(${colors[0]}, ${colors[1]}, ${colors[2]}, .1);
            --theme-bak: rgb(${colors[0]}, ${colors[1]}, ${colors[2]});
            --code-bgc: rgba(${colors[0]}, ${colors[1]}, ${colors[2]}, .1);
          }
        </style>
      `).appendTo('head');
    }
    if(colors[0] > 180 && colors[1] > 180 && colors[2] > 180) {
      changeColor();
      $(`
        <style>
          :root {
            --theme-bak: #333;
            --code-bgc: rgba(0 0 0 / .05);
          }
        </style>
      `).appendTo('head');
    } else{
      changeColor();
    }
    
  }
  if (img.complete) {
    getColorFun();
  } else {
    img.addEventListener('load', function () {
      getColorFun(); 
    });
  }
</script>
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
<script src="<?php echo fileUri(); ?>/assets/static/highlight/highlight.min.js"></script>