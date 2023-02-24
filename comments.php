<?php
  if(comments_open()) {
    $comments = get_comments(); ?>

    <link rel="stylesheet" href="<?php echo fileUri(); ?>/assets/css/comments.css">
      
    <div class="comments">
    <?php //var_dump(get_comments()); ?><br>
    <?php //var_dump(get_comment_author('29')); ?>
      
      <div class="response">
      <?php 
        //var_dump(wp_get_current_commenter());
      ?>

      <?php require_once('comment-response.php'); ?>
      <?php //comment_form(); ?>
      </div>
      <?php
        $comment_count = get_comment_count(get_the_ID())['approved'];
      ?>
      <div class="comments-body">
        <?php
          if($comment_count >= 1) { ?>
            <h3>发现<?=$comment_count?>条评论</h3>
            <div class="comments-item">
              <ul>
                <?php 
                $commentIndexs = [];
                foreach ($comments as $item){
                  if (!isset($commentIndexs[$item->comment_parent])) {
                    $commentIndexs[$item->comment_parent] = [];
                  }
                  $commentIndexs[$item->comment_parent][$item->comment_ID] = $item;
                  // var_dump($item->comment_parent.'='.$item->comment_content);
                }
                // var_dump($commentIndexs);
                foreach($commentIndexs['0'] as $value) {
                  if($value -> comment_post_ID == get_the_ID() && $value -> comment_parent == '0' && $value -> comment_approved == '1') { //var_dump($value -> comment_ID);?>
                    <li>
                      <div class="parent" id="comment-<?=$value -> comment_ID?>">
                        <div class="user-avatar">
                          <div class="avatar">
                            <?php
                              if($value -> user_id == 1) {
                                the_avatar_author();
                              } else {
                                echo get_avatar($value -> user_id);
                              }
                            ?>
                          </div>
                          <?php
                            if(is_user_logged_in() && current_user_can('level_7')) { ?>
                              <div class="change-comment">
                                <a href="<?=bloginfo('url').'/wp-admin/comment.php?action=editcomment&c='.$value -> comment_ID?>">编辑</a>
                              </div>
                            <? }
                          ?>
                        </div>
                        <div class="comment-info">
                          <div class="info">
                            <div class="user">
                              <?php
                                $user_name = get_comment_author($value -> comment_ID);
                                //var_dump($user_name);
                              ?>
                              <div class="user-name">
                                <h4><?=$user_name; ?></h4>
                                <?=$value -> user_id == 1 ? '<span class="master">博主</span>' : ''?>
                              </div>
                              <p><i class="iconfont icon-clock"></i><?=date('Y年m月d日 H:i', strtotime($value -> comment_date)); ?><span class="user-ip" ip="<?=$value -> comment_author_IP?>"></span></p>
                            </div>
                            <div class="reply-btn"><a href="?replytocom=<?=$value -> comment_ID; ?>#respond">回复</a></div>
                          </div>
                          <div class="comment-content">
                            <p><?=$value->comment_content?></p>
                          </div>
                        </div>
                      </div>
                        <?php 
                          $parentComment = $value;
                          // var_dump($parentId);
                          if (isset($commentIndexs[$parentComment->comment_ID])) {
                            require 'comment-child.php'; 
                          }
                        ?>
                    </li>
                  <?php }
                } ?>
              </ul>
            </div>
          <? } else { ?>
            <h3>没有发现评论</h3>
            <div class="no-comments">
              <div class="no-comment-img">
                <img src="<?php echo fileUri(); ?>/assets/images/no-comment.png" alt="">
                <p>里面居然是空的</p>
              </div>
            </div>
          <?php }
        ?>
        
      </div>
    </div>  
    <script src="<?php echo fileUri(); ?>/assets/js/comments.js"></script>
<?php } ?>