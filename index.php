<?php get_head(); ?>
  <div class="container home">
    <?php get_header(); ?>
    <main>
      <?php get_nav(); ?>
      <div class="content">
        <article>
          <h2>首页 <span>Home.</span></h2>
          <?php 
            if(get_option("iemo_recommend_show") == 'regular') {
              require 'inc/home-recommend-regular.php';
            } else if(get_option("iemo_recommend_show") == 'swiper'){
              require 'inc/home-recommend-swiper.php';
            }
          ?>
          <div class="bottom">
            <div class="recommend-bar">
              <ul>
                <li><a class="active"><i class="iconfont icon-bookmark"></i> 最新发布</a></li>
                <li><a><i class="iconfont icon-flag"></i> 为你推荐</a></li>
                <div class="slider"></div>
              </ul>
            </div>
            <?php require 'inc/home-new.php'; ?>
            <?php require 'inc/home-sticky.php'; ?>
            <?php require 'inc/home-color.php'; ?>
          </div>
        </article>
        <?php get_aside(); ?>
      </div>
    </main>
  </div>
<?php get_foot(); ?>