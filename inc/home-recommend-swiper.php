<?php if(count(get_option("iemo_recommend_post")) >= 3) { ?>
  <link rel="stylesheet" href="<?php echo fileUri(); ?>/assets/static/swiper/swiper-bundle.min.css">
  <?php
    if(is_array(get_option("iemo_recommend_post"))) {
      $iemo_post = implode(',',get_option("iemo_recommend_post"));
    }
    $recommend_query = new WP_Query(array(
      'post__in' => explode(',', $iemo_post),
      'post__not_in' => get_option('sticky_posts'),
      'orderby' => 'post__in',
      'showposts' => 10,
    ));
    $recommend_i = 0;
  ?>
  <div class="top">
    <div class="box">
    <div class="swiper">
      <div class="swiper-wrapper">
        <?php if($recommend_query->have_posts()) : while($recommend_query->have_posts()) : $recommend_query->the_post(); ?>
          <div class="swiper-slide">
            <a href="<?php the_permalink(); ?>">
              <?php
                if (has_post_thumbnail()) {
                  the_post_thumbnail('large');
                } else { ?>
                  <img src="<?php if(first_post_cover(get_the_content())){echo first_post_cover(get_the_content());}else{echo default_post_cover();} ?>?recommend=<?php $recommend_i++; echo $recommend_i; ?>" alt="" >
                <?php }
              ?>
              <div class="swiper-post-info">
                <h2><?php the_title(); ?></h2>
              </div>
            </a>   
          </div>
        <?php endwhile; endif; ?>
      </div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-pagination"></div>
    </div>
    </div>
    

    <script src="<?php echo fileUri(); ?>/assets/static/swiper/swiper-bundle.min.js"></script>  
    <script>
      var swiper = new Swiper('.swiper', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 10,
        centeredSlides: true,
        speed: 500,
        breakpoints: { 
          500: {
            slidesPerView: 2,
            spaceBetween: -10,
            
          },
          800: {
            slidesPerView: 3,
            spaceBetween: -10,
          },
        },
        autoplay: { 
          delay: 4000,
          disableOnInteraction: false,
          pauseOnMouseEnter: true,
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
          type: 'bullets',
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
      $(document).ready(()=> {
        $('.home article .top .swiper-slide').css('transition','all .5s');
      })
    </script>
  </div>
<?php } ?>



