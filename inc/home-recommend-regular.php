<?php if(get_option("iemo_recommend_post")) { ?>

  <?php
    if(count(get_option("iemo_recommend_post")) == 1) { ?>
      <script>
        $(`
          <style>
          .home article .top .regular {
            grid-template-columns: 1fr;
          }
          .home article .top .regular .regular-box a {
            height: 300px;
            margin-bottom: 15px;
          }
          .home article .top .regular .regular-box h2 {
            font-size: 18px;
          }
          .home article .top .regular .regular-box p {
            font-size: 15px;
          }
          .home article .top .regular .regular-box a .regular-post-info {
            padding: 0 30px 30px 30px;
          }
          .home article .top .regular .regular-box:last-child {
            display: block;
          }

          @media screen and (max-width: 700px) {
            .home article .top .regular .regular-box a {
              height: 280px;
              margin-bottom: 15px;
            }
            .home article .top .regular .regular-box h2 {
              font-size: 16px;
            }
            .home article .top .regular .regular-box p {
              font-size: 14px;
            }
          }
          @media screen and (max-width: 600px) {
            .home article .top .regular .regular-box a {
              height: 260px;
              margin-bottom: 10px;
            }
            .home article .top .regular .regular-box a .regular-post-info {
              padding: 0 20px 20px 20px;
            }
          }
          @media screen and (max-width: 500px) {
            .home article .top .regular .regular-box a {
              height: 180px;
            }
            .home article .top .regular .regular-box h2 {
              font-size: 15px;
            }
          }
          </style>
        `).appendTo('head');
      </script>
    <?php } else if(count(get_option("iemo_recommend_post")) == 2) { ?>
      <script>
        $(`
          <style>
          .home article .top .regular {
            grid-template-columns: 1fr 1fr;
          }
          .home article .top .regular .regular-box a {
            height: 240px;
          }

          @media screen and (max-width: 1200px) {
            .home article .top .regular .regular-box a {
              height: 220px;
            }
          }
          @media screen and (max-width: 800px) {
            .home article .top .regular .regular-box a {
              height: 200px;
            }
          }
          @media screen and (max-width: 700px) {
            .home article .top .regular .regular-box:last-child {
              display: block;
            }
            .home article .top .regular .regular-box a {
              height: 170px;
            }
          }
          @media screen and (max-width: 600px) {
            .home article .top .regular .regular-box a {
              height: 150px;
            }
          }
          @media screen and (max-width: 500px) {
            .home article .top .regular {
              grid-template-columns: 1fr;
            }
            .home article .top .regular .regular-box:last-child {
              display: none;
            }
            .home article .top .regular .regular-box a {
              height: 180px;
            }
          }
          </style>
        `).appendTo('head');
      </script>
    <?php }
  ?>

  <?php
    if(is_array(get_option("iemo_recommend_post"))) {
      $iemo_post = implode(',',get_option("iemo_recommend_post"));
    }
    $recommend_query = new WP_Query(array(
      'post__in' => explode(',', $iemo_post),
      'post__not_in' => get_option('sticky_posts'),
      'orderby' => 'post__in',
      'showposts' => 3,
    ));
  ?>
  <div class="top">
    <div class="regular">
      <?php $recommend_i = 0; ?>
      <?php if($recommend_query->have_posts()) : while($recommend_query->have_posts()) : $recommend_query->the_post(); ?>
        <div class="regular-box">
          <a href="<?php the_permalink(); ?>">
            <?php
              if (has_post_thumbnail()) {
                the_post_thumbnail('large');
              } else { ?>
                <img src="<?php if(first_post_cover(get_the_content())){echo first_post_cover(get_the_content());}else{echo default_post_cover();} ?>?recommend=<?php $recommend_i++; echo $recommend_i; ?>" alt="" >
              <?php }
            ?>
            <div class="regular-post-info">
              <h2><?php the_title(); ?></h2>
            </div>
          </a>
          <p><?php the_excerpt(); ?></p>
        </div>
      <?php endwhile; endif; ?>
    </div>
  </div>
<?php } ?>