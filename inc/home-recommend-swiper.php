<?php if(get_option("iemo_recommend_post")) { ?>
<?php
  if(get_option("iemo_swiper_shownum") == 'single' && count(get_option("iemo_recommend_post")) > 1) { ?>
    <style>
      .home article .top .swiper {
        height: 340px;
        padding-top: 0;
        overflow: hidden;
        transition: height 0s;
      }
      .home article .top .swiper-slide {
        transform: scale(1);
      }
      .home article .top .swiper-slide a .swiper-post-info h2 {
        font-size: 16px;
        transition: font-size 0s;
      }
      .home article .top .swiper-button-prev {
        left: 20px;
      }
      .home article .top .swiper-button-next {
        right: 20px;
      }
      .home article .top .swiper-slide a .swiper-post-info {
        padding: 0 30px 30px 30px;
        transition: padding 0s;
      }
      @media screen and (max-width: 700px) {
        .home article .top .swiper {
          height: 280px;
        }
      }
      @media screen and (max-width: 600px) {
        .home article .top .swiper {
          height: 220px;
        }
        .home article .top .swiper-slide a .swiper-post-info {
          padding: 0 20px 20px 20px;
          transition: all 0s;
        }
        .home article .top .swiper-slide a .swiper-post-info h2 {
          font-size: 15px;
          transition: all 0s;
        }
      }
    </style>
    <script>
      let spaceBetween = 20;
      let slidesPerView = 1;
      let breakpoints = {};
      let autoplay = {
        delay: 4000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
      };
    </script>
  <?php } else { ?>
    <?php 
      if(count(get_option("iemo_recommend_post")) == 1) { ?>
        <style>
          .home article .top .swiper {
            height: 300px;
            border-radius: 8px;
            overflow: hidden;
            padding: 0;
            margin-bottom: 5px;
            transition: height 0s;
          }
          .home article .top .swiper-slide a .swiper-post-info h2 {
            font-size: 16px;
            transition: font-size 0s;
          }
          .home article .top .swiper-button-prev, 
          .home article .top .swiper-button-next {
            margin-top: 0;
          }
          .home article .top .swiper-button-prev {
            left: 20px;
          }
          .home article .top .swiper-button-next {
            right: 20px;
          }
          .home article .top .swiper-slide a .swiper-post-info {
            padding: 0 30px 30px 30px;
            transition: padding 0s;
          }
          @media screen and (max-width: 700px) {
            .home article .top .swiper {
              height: 240px;
            }
          }
          @media screen and (max-width: 600px) {
            .home article .top .swiper {
              height: 180px;
              margin-bottom: 15px;
            }
            .home article .top .swiper-slide a .swiper-post-info {
              padding: 0 20px 20px 20px;
              transition: all 0s;
            }
            .home article .top .swiper-slide a .swiper-post-info h2 {
              font-size: 15px;
              transition: all 0s;
            }
          }
        </style>
        <script>
          let spaceBetween = 20;
          let slidesPerView = 1;
          let breakpoints = {};
          let autoplay = false;
        </script>
      <?php } else if(count(get_option("iemo_recommend_post")) == 2) { ?>
        <style>
          .home article .top .swiper {
            height: 300px;
            transition: height 0s;
          }
          @media screen and (max-width: 800px) {
            .home article .top .swiper {
              height: 280px;
            }
          }
          @media screen and (max-width: 700px) {
            .home article .top .swiper {
              height: 250px;
            }
          }
          @media screen and (max-width: 600px) {
            .home article .top .swiper {
              height: 220px;
            }
          }
        </style>
        <script>
          let spaceBetween = 20;
          let slidesPerView = 1;
          let breakpoints = {
            500: {
              slidesPerView: 2,
              spaceBetween: -10,
            },
          };
          let autoplay = {
            delay: 4000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
          };
        </script>
      <? } else if(count(get_option("iemo_recommend_post")) >= 3) { ?>
        <script>
          let spaceBetween = 20;
          let slidesPerView = 1;
          let breakpoints = {
            500: {
              slidesPerView: 2,
              spaceBetween: 0,
            },
            800: {
              slidesPerView: 3,
              spaceBetween: 0,
            },
          };
          let autoplay = {
            delay: 4000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
          };
        </script>
      <? }
    ?>
  <?php }
?>
  



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

    <script src="<?php echo fileUri(); ?>/assets/static/swiper/swiper-bundle.min.js"></script>  
    <script>
      var swiper = new Swiper('.swiper', {
        loop: true,
        spaceBetween: spaceBetween,
        slidesPerView: slidesPerView,
        breakpoints: breakpoints,
        centeredSlides: true,
        speed: 500,
        autoplay: autoplay,
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



