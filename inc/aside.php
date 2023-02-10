<aside>
  <div class="aside-content">
    <div class="author">
      <div class="cover">
        <img src="https://ldbbs.ldmnq.com/bbs/topic/attachment/2023-2/d15e781c-82ca-4a37-98e4-3d80b546c2e0.jpg" alt="">
      </div>
      <div class="author-info">
        <div class="avatar">
          <img src="https://ldbbs.ldmnq.com/bbs/topic/attachment/2023-2/126c7431-5876-498e-9500-9072060e8531.jpg" alt="">
        </div>
        <div class="name"><?php echo get_user_role(1)->display_name; ?></div>
        <div class="des">
          <?php 
            if(get_the_author_meta('description',1)) {
              echo get_the_author_meta('description',1); 
            } else {
              echo '这家伙很懒，什么都没写';
            }
          ?>  
        </div>
        <div class="post-info">
          <div class="posts">
            <i>文章</i>
            <span><?php echo wp_count_posts()->publish; ?></span>
          </div>
          <div class="tags">
            <i>标签</i>
            <span><?php echo wp_count_terms('post_tag'); ?></span>
          </div>
          <div class="notes">
            <i>说说</i>
            <span>12</span>
          </div>
        </div>
      </div>
    </div>
    <div class="social">
      <h2>社交 <span>Social.</span></h2>
      <div class="social-content">
        <ul>
          <li><a href="#"><i class="iconfont icon-QQ"></i></a></li>
          <li><a href="#"><i class="iconfont icon-weixin"></i></a></li>
          <li><a href="#"><i class="iconfont icon-bilibili-line"></i></a></li>
          <li><a href="#"><i class="iconfont icon-Youtube-fill"></i></a></li>
          <!-- <li><a href=""><i class="iconfont icon-github"></i></a></li> -->
          <!-- <li><a href=""><i class="iconfont icon-gitee"></i></a></li> -->
        </ul>
      </div>
    </div>
    <div class="notes-box">
      <h2>说说 <span>Notes.</span></h2>
      <ul>
        <li>
          <div class="notes-content">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis cumque odio esse dolor quidem harum, nulla molestiae consequatur quis nesciunt, dicta facilis ullam sed quia officiis quisquam eveniet excepturi ducimus?</div>
          <div class="notes-info">
            <div class="time">
              <i class="iconfont icon-clock"></i>
              <span>2023-02-07</span>
            </div>
            <div class="new">
              <i class="iconfont icon-bookmark"></i>
              <span>最新说说</span>
            </div>
          </div>
        </li>
        <li>
          <div class="notes-content">设计师需要自己搭建图标库来适合自己的多个产品和业务，网站站长也是需要自己搭建图标库来让博客使用自定义图标。通常大家都是采用iconfont来做，我曾经也是。不过我最近发现一个新的图标库搭建</div>
          <div class="notes-info">
            <div class="time">
              <i class="iconfont icon-clock"></i>
              <span>2023-02-07</span>
            </div>
            <!-- <div class="new">
              <i class="iconfont icon-bookmark"></i>
              <span>最新说说</span>
            </div> -->
          </div>
        </li>
        <li>
          <div class="notes-content">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis cumque odio esse dolor quidem harum, nulla molestiae consequatur quis nesciunt, dicta facilis ullam sed quia officiis quisquam eveniet excepturi ducimus?</div>
          <div class="notes-info">
            <div class="time">
              <i class="iconfont icon-clock"></i>
              <span>2023-02-07</span>
            </div>
            <!-- <div class="new">
              <i class="iconfont icon-bookmark"></i>
              <span>最新说说</span>
            </div> -->
          </div>
        </li>
      </ul>
      <div class="notes-more"><a href="">查看更多说说</a></div>
    </div>
  </div>
  <footer>
      <div class="copyright">
        <p>Copyright © 2022-2023 <a href="">iEmo主题</a></p>
        <p><a href="">渝ICP备20000001号-6</a></p>
        <p><a href="">渝公网安备42010100000001号</a></p>
      </div>
    </footer>
</aside>