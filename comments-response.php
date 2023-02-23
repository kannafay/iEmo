<h2>发表评论</h2>
<div class="info">
  <div class="user">
    <div class="avatar">
      <?php
        //if(get_current_user_id() == 1) {
        //  the_avatar_author();
        //} else {
        //  echo '<img src="https://ldbbs.ldmnq.com/bbs/topic/attachment/2023-2/935a9ec7-ddce-4d9f-a57b-5e5a82ed8a69.jpg">';
        //}
      ?>
    </div>
    <h3>
      <?php 
        if(is_user_logged_in()) {
          echo get_user_role(get_current_user_id()) -> display_name;
        } else {
          echo '陌生人';
        }
      ?>
    </h3>
  </div>
  <div class="response-btns">
    <button class="write">写点</button>
    <div class="submit-btns">
      <button class="submit" name="submit" type="submit">提交</button>
      <button class="cancal">取消</button>
    </div>
    <div></div>
  </div>
</div>
<div class="text">
  <!-- <form id="commentform" action="<?php //bloginfo('url'); ?>/wp-comments-post.php" method="post">
    <textarea id="comment" name="comment"></textarea>
    <button id="submit" class="submit" name="submit" type="submit">提交</button>
  </form> -->
  
</div>

<?php comment_form() ?>