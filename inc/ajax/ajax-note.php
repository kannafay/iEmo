<?php 
  if(get_next_posts_link()) { ?>
    <div id="pagination-aside" class="pagination-aside">
      <?php next_posts_link(__('<i class="iconfont icon-activity"></i> 加载更多说说')); ?>
    </div>
    <script>
      const noteNextUri = '<?php bloginfo('url'); ?>' + '/note/' + /page\/\d+/.exec($('#pagination-aside a').attr('href'));
      $('#pagination-aside a').attr('href', noteNextUri);
    </script>
  <?php } else {
    echo '<div class="no-more-note"><a><i class="iconfont icon-anchor"></i> 好像就这么多</a></div>';
  }
?>

<script language=javascript>
jQuery(document).ready(function($) {
    $('#pagination-aside a').click(function() {
      $this = $(this);
      $this.addClass('loading').html('<i class="iconfont icon-loader"></i> 加载中...');
      var href = $this.attr("href");
      if (href != undefined) {
        $.ajax({
          url: href,
          type: "get",
          error: function(request) {
            // console.log('error');
          },
          success: function(data) {
            $this.removeClass('loading').html('<i class="iconfont icon-activity"></i> 加载更多说说');
            var $res = $(data).find("aside .notes-box ul li");
            $('aside .notes-box ul').append($res.fadeOut(0).fadeIn(300));
            var newhref = $(data).find("#pagination-aside a").attr("href");
            if (newhref != undefined) {
              $("#pagination-aside a").attr("href", newhref);
            } else {
              $("#pagination-aside a").removeAttr("href");
              $("#pagination-aside a").html('<i class="iconfont icon-anchor"></i> 好像就这么多');
              $("#pagination-aside a").parent().addClass('no-more-post');
              $("#pagination-aside a").off("click");
              $('.aside-content .main-page').off("scroll");
            }
          }
        });
      }
      return false;
    });
  });
</script>


<?php
  if(get_option('iemo_auto_load') == 'true') { ?>

    <script>

      // throttle
      function throttle(fn) {
        return function() {
          if(fn.timer) return;
          fn.timer = setTimeout(() => {
            fn.call(this);
            fn.timer = null;
          }, 300);
        }
      }
      

      // note scroll ajax
      function note_scroll() {
        return throttle(function(){
          let height = $('.aside-content .main-page').height();
          let scrollTop = $('.aside-content .main-page').scrollTop();
          let scrollHeight = $('.aside-content .main-page')[0].scrollHeight;
          if(scrollHeight - (height + scrollTop) <= 50) {
            $('.aside-content .main-page').off('scroll');
            note_scroll_ajax();
          }
        })
      }


      // scroll ajax
      const note_scroll_ajax = () => {
        $this = $('#pagination-aside a');
        $this.addClass('loading').html('<i class="iconfont icon-loader"></i> 加载中...');
        var href = $this.attr("href");
        if (href != undefined) {
          $.ajax({
            url: href,
            type: "get",
            error: function(request) {
              // console.log('error');
            },
            success: function(data) {
              $this.removeClass('loading').html('<i class="iconfont icon-activity"></i> 加载更多文章');
              var $res = $(data).find("aside .notes-box ul li");
              $('aside .notes-box ul').append($res.fadeOut(0).fadeIn(300));
              var newhref = $(data).find("#pagination-aside a").attr("href");
              if (newhref != undefined) {
                $("#pagination-aside a").attr("href", newhref);
                $('.aside-content .main-page').off('scroll');
                $('.aside-content .main-page').on('scroll', note_scroll());
              } else {
                $("#pagination-aside a").removeAttr("href");
                $("#pagination-aside a").html('<i class="iconfont icon-anchor"></i> 好像就这么多');
                $("#pagination-aside a").parent().addClass('no-more-post');
                $("#pagination-aside a").off("click");
                $('.aside-content .main-page').off("scroll");
              }
            }
          });
        }
        return false;
      }

      $('.aside-content .main-page').on('scroll', note_scroll());

    </script>

  <?php } else { ?>
    <script>
      let note_scroll = ()=>{};
    </script>
  <?php }
?>