<?php
if (get_option("iemo_page_toggle")) { ?>
  <style>
    .comments .response .comment-component .comment-btns button,
    .comments .response .text .pholder {
      animation: FadeIn-<?php echo get_option("iemo_page_toggle"); ?> .5s forwards !important;
    }
  </style>
<?php }
?>

<h3 id="response-title">参与讨论</h3>

<?php

global $current_user;

if (is_user_logged_in()) { ?>

  <form action="<?php bloginfo('url') ?>/wp-comments-post.php" method="post">
    <div class="comment-component">
      <div class="user-info">
        <?php
        if ($current_user->ID == '1') {
          the_avatar_author();
        } else
          echo get_avatar($current_user->user_email);
        ?>
        <p><?= $current_user->display_name ?></p>
      </div>
      <div class="comment-btns">
        <div class="submit-comment-btn">
          <button type="submit" name="submit" class="submit">提交</button>
          <button type="button" class="cancal cancal1">取消</button>
          <button type="button" class="cancal cancal2" style="display:none">取消回复</button>
        </div>
        <div class="write-comment-btn">
          <button type="button" class="write">我要发言</button>
        </div>
      </div>
    </div>
    <div class="text">
      <div class="pholder"></div>
      <textarea id="comment" name="comment" placeholder="我想说两句..." required="required" rows="6" maxlength="65525"></textarea>
    </div>
    <input type="hidden" name="comment_post_ID" value="" id="comment_post_ID">
    <input type="hidden" name="comment_parent" id="comment_parent" value="">
  </form>

<?php } else { ?>

  <?php
    if(get_option("iemo_comments_visitor") == 'true') { ?>

      <?php
        if(isset($_COOKIE["comment_author_" . COOKIEHASH])) {
          $comment_author = $_COOKIE["comment_author_" . COOKIEHASH];
        } else {
          $comment_author = '';
        }

        if(isset($_COOKIE["comment_author_email_" . COOKIEHASH])) {
          $comment_author_email = $_COOKIE["comment_author_email_" . COOKIEHASH];
        } else {
          $comment_author_email = '';
        }
      ?>

      <form action="<?php bloginfo('url') ?>/wp-comments-post.php" method="post">
        <div class="comment-component">
          <div class="user-info">
            <a>
              <?=get_avatar($comment_author_email)?>
              <?php
                if(!empty($comment_author)) { ?>
                  <p><?=$comment_author?></p>
                <?php } else { ?>
                  <p><?='点击填写用户信息'?></p>
                <?php } 
              ?>
            </a>
          </div>
          <div class="comment-btns">
            <div class="submit-comment-btn">
              <button type="submit" name="submit" class="submit">提交</button>
              <button type="button" class="cancal cancal1">取消</button>
              <button type="button" class="cancal cancal2" style="display:none">取消回复</button>
            </div>
            <div class="write-comment-btn">
              <button type="button" class="write">我要发言</button>
            </div>
          </div>
        </div>
        <div class="text">
          <div class="pholder"></div>
          <textarea id="comment" name="comment" placeholder="我想说两句..." required="required" rows="6" maxlength="65525"></textarea>
        </div>
        <input type="hidden" name="comment_post_ID" id="comment_post_ID" value="">
        <input type="hidden" name="comment_parent" id="comment_parent" value="">

        <div class="visitor">
          <input id="author" name="author" type="text" value="<?=$comment_author?>" placeholder="昵称*" size="30" maxlength="245" autocomplete="name" required="required">
          <input id="email" name="email" type="text" value="<?=$comment_author_email?>" placeholder="邮箱*" size="30" maxlength="100" aria-describedby="email-notes" autocomplete="email" required="required">
          <input id="url" name="url" type="text" value="" placeholder="网站" size="30" maxlength="200" autocomplete="url">
          <label for="wp-comment-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="" <?=!empty($comment_author) ? 'checked' : ''?>>保存我的信息方便下次使用。</label>
        </div>
      </form>

    <?php } else { ?>

      <form onsubmit="return false;">
        <div class="comment-component">
          <div class="user-info">
            <a href="<?php echo wp_login_url(home_url(add_query_arg(array()))); ?>">
              <?=get_avatar($comment_author)?>
              <p><?='点击登录参与讨论'?></p>
            </a>
          </div>
          <div class="comment-btns">
            <div class="submit-comment-btn">
              <button type="button" class="cancal cancal1">取消</button>
              <button type="button" class="cancal cancal2" style="display:none">取消回复</button>
            </div>
            <div class="write-comment-btn">
              <button type="button" class="write">我要发言</button>
            </div>
          </div>
        </div>
        <div class="text">
          <div class="pholder"></div>
          <textarea id="comment" name="comment" placeholder="我想说两句..." required="required" rows="6" maxlength="65525"></textarea>
        </div>
      </form>
      
    <?php } 
  ?>

<?php }
?>






















