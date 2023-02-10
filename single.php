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
            <div class="title"><?php the_title(); ?></div>
            <div class="more">
              <div class="time">
                <i class="iconfont icon-clock"></i>
                <span><?php echo get_the_date(); ?> <?php the_time(); ?></span>
              </div>
              <div class="cate">
                <?php echo the_category(' ', 'single') ?>
              </div>
              <!-- <div class="tag">
                <a href="">UI</a>
                <a href="">UE</a>
              </div> -->
              <?php if(get_the_tag_list()){ ?><div class="tag"><?php echo get_the_tag_list('',' ',''); ?></div><?php } ?>
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
      // console.log(color);
      let color =  `rgb(${colors[0]},${colors[1]},${colors[2]})`;
      $(`
      <style>
        .single main .content article .post-cover .cover::before {background:linear-gradient(to top, ${color}, rgba(0 0 0 / 0))}
        ::-moz-selection{background-color: ${color}); color:#fff}
        ::-webkit-selection{background-color: ${color}; color:#fff}
        ::selection{background-color: ${color}; color:#fff}
        .single main .content article .post-cover .post-info .more .cate a:hover,
        .single main .content article .post-cover .post-info .more .tag a:hover {
          background-color: ${color};
          color: #fff;
        }
        main .content article::-webkit-scrollbar-thumb,
        main .content aside .aside-content::-webkit-scrollbar-thumb,
        header .menu ul li a.current,
        header .menu ul li a.current:hover {
          background: ${color};
        }
      </style>
      `).appendTo('head');
    }
    if (img.complete) {
      getColorFun();
    } else {
      img.addEventListener('load', function () {
        getColorFun(); 
      });
    }
  </script>
</html>