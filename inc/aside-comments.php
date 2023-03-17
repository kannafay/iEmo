<ul>
  <?php
    $new_aside_num = get_option("iemo_aside_comments_num");
    if($new_aside_num >= 1 && $new_aside_num <= 100) {
      $aside_comments_num = get_option("iemo_aside_comments_num");
    } else {
      $aside_comments_num = 6;
    }

    $new_comments = array_slice(get_comments('status=approve'), 0, $aside_comments_num);

    if(count($new_comments) <= 0) { ?>
      <p><i class="iconfont icon-anchor"></i>暂无评论</p>
    <?php } else {
      foreach($new_comments as $new) { ?>
        <li>
          <div class="top">
            <div class="avatar">
              <?php
                if($new -> user_id == 1) {
                  the_avatar_author();
                } else {
                  echo get_avatar($new -> comment_author_email);
                }
                $name = get_comment_author($new -> comment_ID);
              ?>
            </div>
            <div class="user">
              <div class="name"><?=$name?></div>
              <div class="rdate"><i class="iconfont icon-clock"></i><?=date('Y年m月d日', strtotime($new -> comment_date)); ?></div>
            </div>
          </div>
          <div class="text">
            <?php
              if($new -> comment_parent) { ?>
                <span class="at">
                  <?php
                    foreach(get_comments() as $new_item) {
                      if($new_item -> comment_ID == $new -> comment_parent) {
                        echo '@'.get_comment_author($new_item -> comment_ID);
                      }
                    }
                  ?>
                </span>
              <?php }
            ?>
            <a href="<?=get_permalink($new -> comment_post_ID).'#comment-'.$new -> comment_ID?>">
              <?=$new -> comment_content?>
            </a>
          </div>
        </li>
      <?php }
    }
  ?>
</ul>