<?php
  if(comments_open()) {
    $comments = get_comments(); ?>

    <link rel="stylesheet" href="<?php echo fileUri(); ?>/assets/css/comments.css">
      
    <div class="comments">
    <?php //var_dump(get_comments()); ?><br>
      
      <div class="response">
      <?php //require_once('comments-response.php'); ?>
      <?php comment_form() ?>
      </div>
      
      <div class="comments-body">
        <?php echo count($comments) >= 1 ? '<h2>发现'.count($comments).'条评论</h2>': '<h2>没有发现评论</h2>' ; ?>
        <div class="comments-item">
          <ul>
            <?php foreach($comments as $value) {
              if($value -> comment_post_ID == get_the_ID() && $value -> comment_parent == '0') { ?>
                <li>
                  <div class="parent">
                    <div class="user-avatar">
                      <div class="avatar">
                        <?php
                          if($value -> user_id == 1) {
                            the_avatar_author();
                          } else {
                            echo '<img src="https://ldbbs.ldmnq.com/bbs/topic/attachment/2023-2/935a9ec7-ddce-4d9f-a57b-5e5a82ed8a69.jpg">';
                          }
                        ?>
                      </div>
                    </div>
                    <div class="comment-info">
                      <div class="info">
                        <div class="user">
                          <h4><?php echo $value -> comment_author; ?><?php echo $value -> user_id == 1 ? '<span>博主</span>' : ''; ?></h4>
                          <p><?php echo $value -> comment_date; ?> <span>北京</span></p>
                        </div>
                        <div class="reply-btn"><a href="?replytocom=<?php echo $value -> comment_ID; ?>#respond">回复</a></div>
                      </div>
                      <div class="comment-content">
                        <p><?php echo $value->comment_content; ?></p>
                      </div>
                    </div>
                  </div>



                    <?php foreach($comments as $child) {
                      if($child -> comment_parent ==  $value -> comment_ID) { ?>
                          <div class="child">
                            <div class="user-avatar">
                              <div class="avatar">
                                <?php
                                  if($child -> user_id == 1) {
                                    the_avatar_author();
                                  } else {
                                    echo '<img src="https://ldbbs.ldmnq.com/bbs/topic/attachment/2023-2/935a9ec7-ddce-4d9f-a57b-5e5a82ed8a69.jpg">';
                                  }
                                ?>
                              </div>
                            </div>
                            <div class="comment-info">
                              <div class="info">
                                <div class="user">
                                  <h4><?php echo $child -> comment_author; ?><?php echo $child -> user_id == 1 ? '<span>博主</span>' : ''; ?></h4>
                                  <p><?php echo $child -> comment_date; ?> <span>北京1</span></p>
                                </div>
                                <div class="reply-btn"><a href="?replytocom=<?php echo $child -> comment_ID; ?>#respond">回复</a></div>
                              </div>
                              <div class="comment-content">
                                <p><?php echo $child->comment_content; ?></p>
                              </div>
                            </div>
                          </div>
                      <?php }
                    } ?>




                </li>
              <?php }
            } ?>
          </ul>
        </div>
      </div>
    </div>  
    <script src="<?php echo fileUri(); ?>/assets/js/comments.js"></script>
<?php } ?>



<ul>
  <li>
    <?php 
      foreach($comments as $parent) {
        if($parent -> comment_post_ID == get_the_ID() && $parent -> comment_parent == '0') {
          echo '<p>我是父亲</p>';
          foreach($comments as $child) {
            if($child -> comment_parent == $parent -> comment_ID) {
              echo '<li><p>我是孩子</p></li>';
            }
          }       
        }
      }       
    ?>
  </li>
</ul>