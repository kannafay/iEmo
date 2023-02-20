<?php get_head(); ?>
  <div class="container home">
    <?php get_header(); ?>
    <main>
      <?php get_nav(); ?>
      <div class="content">
        <article>
          <h2>首页 <span>Home.</span></h2>
          <?php require_once('inc/home-recommend.php'); ?>
          <div class="bottom">
            <div class="recommend-bar">
              <ul>
                <li><a class="active"><i class="iconfont icon-bookmark"></i> 最新发布</a></li>
                <li><a><i class="iconfont icon-flag"></i> 为你推荐</a></li> 
                <div class="slider"></div>
              </ul>
            </div>
            <?php require_once('inc/home-new.php'); ?>
            <?php require_once('inc/home-sticky.php'); ?>
            <?php require_once('inc/home-color.php'); ?>
          </div>
        </article>
        <?php get_aside(); ?>
      </div>
    </main>
  </div>
<?php get_foot(); ?>