<?php
@$iemo_recommend_show = stripslashes($_POST["iemo_recommend_show"]);
@$iemo_avatar_author = stripslashes($_POST["iemo_avatar_author"]);
@$iemo_cover_author = stripslashes($_POST["iemo_cover_author"]);
@$iemo_cover_post = stripslashes($_POST["iemo_cover_post"]);
@$iemo_copyright = stripslashes($_POST["iemo_copyright"]);
@$iemo_icp = stripslashes($_POST["iemo_icp"]);
@$iemo_icp_gov = stripslashes($_POST["iemo_icp_gov"]);
@$iemo_page_toggle = stripslashes($_POST["iemo_page_toggle"]);
@$iemo_upyun = stripslashes($_POST["iemo_upyun"]);

if(@stripslashes($_POST["iemo_option"])){
  update_option("iemo_recommend_show", $iemo_recommend_show);
  update_option("iemo_avatar_author", $iemo_avatar_author);
  update_option("iemo_cover_author", $iemo_cover_author);
  update_option("iemo_cover_post", $iemo_cover_post);
  update_option("iemo_copyright", $iemo_copyright);
  update_option("iemo_icp", $iemo_icp);
  update_option("iemo_icp_gov", $iemo_icp_gov);
  update_option("iemo_page_toggle", $iemo_page_toggle);
  update_option("iemo_upyun", $iemo_upyun);
}
?>

<link rel="stylesheet" href="<?php echo fileUri(); ?>/assets/static/iconfont/iconfont.css">
<link rel="stylesheet" href="<?php echo fileUri(); ?>/admin/option.css">
<script src="<?php echo fileUri(); ?>/assets/js/jquery.min.js"></script>
<script src="<?php echo fileUri(); ?>/admin/option.js"></script>

<div class="wrap">
  <h1>iEmo主题设置</h1>
  <form method="post" action="" novalidate="novalidate" target="frameName">
    <table class="form-table">
      <tbody>
        <tr>
          <th scope="row"><label for="">站点图标</label></th>
          <td>
            <p class="description"><a href="<?php site_url(); ?>/wp-admin/customize.php">前往设置</a>（外观 -> 自定义 -> 站点身份 -> 站点图标）</p>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="">菜单图标</label></th>
          <td>
            <p class="description"><span class="iconfont icon-home"></span> 首页：&lt;span class="iconfont icon-home"&gt;&lt;/span&gt;</p>
            <p class="description"><span class="iconfont icon-folder"></span> 分类：&lt;span class="iconfont icon-folder"&gt;&lt;/span&gt;</p>
            <p class="description"><span class="iconfont icon-hash"></span> 标签：&lt;span class="iconfont icon-hash"&gt;&lt;/span&gt;</p>
            <p class="description"><span class="iconfont icon-archive"></span> 归档：&lt;span class="iconfont icon-archive"&gt;&lt;/span&gt;</p>
            <p class="description"><span class="iconfont icon-message-square"></span> 说说：&lt;span class="iconfont icon-message-square"&gt;&lt;/span&gt;</p>
            <p class="description"><span class="iconfont icon-link"></span> 链接：&lt;span class="iconfont icon-link"&gt;&lt;/span&gt;</p>
            <br>
            <p class="description">使用方法：</p>
            <p class="description">外观->菜单->显示选项（右上角）->勾选〔title属性〕和〔CSS类〕</p>
            <p class="description">导航标签请填写以上对应的标签代码（非必填）</p>
            <p class="description">title属性用于文本提示（鼠标移到菜单显示本文内容）</p>
            <p class="description">分类页面CSS类填写〔cate〕，标签页面CSS类填写〔tag〕，说说页面CSS类填写〔note〕</p>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="">社交图标</label></th>
          <td>
            <p class="description"><span class="iconfont icon-QQ"></span> QQ：&lt;span class="iconfont icon-QQ"&gt;&lt;/span&gt;</p>
            <p class="description"><span class="iconfont icon-weixin"></span> WeChat：&lt;span class="iconfont icon-weixin"&gt;&lt;/span&gt;</p>
            <p class="description"><span class="iconfont icon-github"></span> GitHub：&lt;span class="iconfont icon-github"&gt;&lt;/span&gt;</p>
            <p class="description"><span class="iconfont icon-gitee"></span> Gitee：&lt;span class="iconfont icon-gitee"&gt;&lt;/span&gt;</p>
            <p class="description"><span class="iconfont icon-bilibili-line"></span> Bilibili：&lt;span class="iconfont icon-bilibili-line"&gt;&lt;/span&gt;</p>
            <p class="description"><span class="iconfont icon-Youtube-fill"></span> Youtube：&lt;span class="iconfont icon-Youtube-fill"&gt;&lt;/span&gt;</p>
            <p class="description"><span class="iconfont icon-tuitetwitter43"></span> Twitter：&lt;span class="iconfont icon-tuitetwitter43"&gt;&lt;/span&gt;</p>
            <p class="description"><span class="iconfont icon-telegram"></span> Telegram：&lt;span class="iconfont icon-telegram"&gt;&lt;/span&gt;</p>
            <br>
            <p class="description">使用方法：</p>
            <p class="description">外观->菜单->自定义链接->链接文字</p>
            <p class="description">请填写以上对应的标签代码（非必填）</p>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="">为你推荐</label></th>
          <td>
            <p class="description">将文章设为置顶即可在首页〔为你推荐〕中显示，最多10篇</p>
          </td>
        </tr>
        <tr>
          <th scope="row"><label>推荐文章</label></th>
          <td>
            <div class="iemo-recommend-post" onclick="iemo_post_show()">选择文章</div>
            <br><br>
            <p class="description">显示方式（首页顶部）：</p>
            <fieldset>
        	    <label><input type="radio" name="iemo_recommend_show" value="" <?php echo get_option("iemo_recommend_show") == '' ? 'checked' : ''; ?>>不显示</label><br>
        	    <label><input type="radio" name="iemo_recommend_show" value="swiper" <?php echo get_option("iemo_recommend_show") == 'swiper' ? 'checked' : ''; ?>>轮播图（最多支持10篇）</label><br>
              <label><input type="radio" name="iemo_recommend_show" value="regular" <?php echo get_option("iemo_recommend_show") == 'regular' ? 'checked' : ''; ?>>固定卡片（最多支持3篇，移动端仅显示第一篇）</label><br>
        	  </fieldset>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="iemo_avatar_author">个人头像</label></th>
          <td>
            <textarea name="iemo_avatar_author" rows="3" class="regular-text"><?php echo get_option("iemo_avatar_author"); ?></textarea> <br/>
            <p class="description">填写图片URL，显示在侧边栏</p>
            <p class="description">默认：<a href="https://cravatar.cn" target="_blank">Cravatar头像</a></p>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="iemo_cover_author">个人背景</label></th>
          <td>
            <textarea name="iemo_cover_author" rows="3" class="regular-text"><?php echo get_option("iemo_cover_author"); ?></textarea> <br/>
            <p class="description">填写图片URL，显示在侧边栏</p>
            <p class="description">默认：<a href="<?php bloginfo('template_url'); ?>/assets/images/cover-author.jpg" target="_blank">主题目录/assets/images/cover-author.jpg</a></p>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="iemo_cover_post">文章默认封面</label></th>
          <td>
            <textarea name="iemo_cover_post" rows="3" class="regular-text"><?php echo get_option("iemo_cover_post"); ?></textarea> <br/>
            <p class="description">填写图片URL，文章没有设置封面时顶替</p>
            <p class="description">默认：主题目录/assets/images/random/cover-post-x.jpg（随机）</p>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="iemo_copyright">版权号</label></th>
          <td>
            <input name="iemo_copyright" type="number" value="<?php echo get_option("iemo_copyright"); ?>" class="regular-text">
            <p class="description">填写年份（数字）即可</p>
            <p class="description">默认：Copyright © <?php echo date("Y"); ?> <a href="<?php bloginfo('url') ?>"><?php bloginfo('name'); ?></a></p>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="iemo_icp">ICP备案</label></th>
          <td>
            <input name="iemo_icp" type="text" value="<?php echo get_option("iemo_icp"); ?>" class="regular-text">
            <p class="description">填写ICP备案号，没有请留空</p>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="iemo_icp_gov">公网安备号</label></th>
          <td>
            <input name="iemo_icp_gov" type="text" value="<?php echo get_option("iemo_icp_gov"); ?>" class="regular-text">
            <p class="description">填写公网安备号，没有请留空</p>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="iemo_page_toggle">页面切换动画</label></th>
          <td>
            <select name="iemo_page_toggle" id="iemo_page_toggle">
              <option value="" <?php echo get_option("iemo_page_toggle") == '' ? 'selected' : ''; ?>>关闭</option>
              <option value="Left" <?php echo get_option("iemo_page_toggle") == 'Left' ? 'selected' : ""; ?>>从左往右</option>
              <option value="Right" <?php echo get_option("iemo_page_toggle") == 'Right' ? 'selected' : ""; ?>>从右往左</option>
              <option value="Top" <?php echo get_option("iemo_page_toggle") == 'Top' ? 'selected' : ""; ?>>从上往下</option>
              <option value="Bottom" <?php echo get_option("iemo_page_toggle") == 'Bottom' ? 'selected' : ""; ?>>从下往上</option>
              <option value="Enlarge" <?php echo get_option("iemo_page_toggle") == 'Enlarge' ? 'selected' : ""; ?>>放大效果</option>
              <option value="Narrow" <?php echo get_option("iemo_page_toggle") == 'Narrow' ? 'selected' : ""; ?>>缩小效果</option>
            </select>
          </td>
        </tr>
        <tr>
          <th scope="row">又拍云联盟</th>
          <td>
            <fieldset>
              <label><input type='checkbox' name='iemo_upyun' value='true' <?php echo get_option("iemo_upyun") == 'true' ? 'checked' : ""; ?>/>开启</label>
            </fieldset>
          </td>
        </tr>


      </tbody>
    </table>
    <p class="submit">
      <input type="submit" name="iemo_option"  class="button button-primary" value="保存更改" onclick="change_success()">
    </p>




    <!-- 推荐文章 -->
    <div id="iemo-recommend-post">
      <?php
        if(isset($_POST["iemo_option"])){
        	if(isset($_POST["Checkbox"])){
            $post = $_POST["Checkbox"];
          } else {
            $post = "";
          }
          update_option("iemo_recommend_post", $post);
          update_option("iemo_recommend_show", $iemo_recommend_show);
        }
      ?>
      <div class="form">
        <ul>   
          <h2>当前已发布文章：</h2>   
          <?php 
            $args = array(
            	'post_type'=>'post',
              'post_status'=>'publish',
              'showposts' => -1,
            );
            $query = new WP_Query( $args );
            while ($query->have_posts()) : $query->the_post();
          ?> 
            <li><label><input type='checkbox' name='Checkbox[]' value='<?php the_ID();?>' <?php if(is_array(get_option("iemo_recommend_post"))){foreach(get_option("iemo_recommend_post") as $value){if($value == get_the_ID()){echo 'checked';}}} ?>/><?php the_title(); ?>（ID：<?php the_ID(); ?>）</label></li>
          <?php
            endwhile;
            wp_reset_query(); 
          ?>
          <!-- <p>已选择：<?php //var_dump(get_option("iemo_recommend_post")); ?></p> -->
        </ul>
        <button class="submit" type="submit" name="iemo_option" onclick="change_success();">保存</button>
        <button class="reset" type="reset">撤销</button>
        <div class="close" onclick="iemo_post_close()">关闭</div>
      </form>
      <iframe src="" frameborder="0" name="frameName" style="display:none"></iframe>
    </div>
  </div>
</div>

<div class="success">保存成功</div>
<div class="mask" onclick="iemo_post_close();mask_close();"></div>















