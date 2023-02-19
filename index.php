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
                <div class="slider"></div>
                <li><a class="active">最新发布</a></li>
                <li><a>为你推荐</a></li> 
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