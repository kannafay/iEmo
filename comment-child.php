<?php 
  foreach($commentIndexs[$parentComment->comment_ID] as $child) {
  // var_dump($child);
  if($child -> comment_approved == '1'){
?>
  <div class="child comment-card" id="comment-<?=$child -> comment_ID?>">
    <div class="user-avatar">
      <div class="avatar">
        <?php
          if($child -> user_id == 1) {
            the_avatar_author();
          } else {
            echo get_avatar($child -> user_id);
          }
        ?>
      </div>
      <?php
        if(is_user_logged_in() && current_user_can('level_7')) { ?>
          <div class="change-comment">
            <a href="<?=bloginfo('url').'/wp-admin/comment.php?action=editcomment&c='.$child -> comment_ID?>">编辑</a>
          </div>
        <? }
      ?>
    </div>
    <div class="comment-info">
      <div class="info">
        <div class="user">
          <?php
            $user_name = get_comment_author($child -> comment_ID);
            $reply_user_name = get_comment_author($parentComment -> comment_ID);
            //var_dump($parentComment -> user_id)
          ?>
          <div class="user-name">
            <?=$child -> user_id == 1 ? '<h4 class="master-name">'.$user_name.'</h4>' : '<h4 class="comment-user-name">'.$user_name.'</h4>'?>
            <?=$child -> user_id == 1 ? '<span class="master">博主</span>' : ''?>
          </div>
          <p><i class="iconfont icon-clock"></i><?=date('Y年m月d日 H:i', strtotime($child -> comment_date))?><span class="user-ip" ip="<?=$child -> comment_author_IP?>"><i class="iconfont icon-map-pin"></i>获取中...</span></p>
        </div>
        <div class="reply-btn"><a href="?replytocom=<?=$child -> comment_ID; ?>#respond" id="<?=$child -> comment_ID; ?>">回复</a></div>
      </div>
      <div class="comment-content">
        <p><span class="at">@<?=$reply_user_name?></span><?=$child->comment_content?></p>
      </div>
    </div>
  </div>
  <?php
  $oldParentComment = $parentComment; 
  $parentComment = $child;
  if (isset($commentIndexs[$parentComment->comment_ID])) {
    require 'comment-child.php';
  }
  $parentComment = $oldParentComment;
  ?>
<?php }
  } 
?>