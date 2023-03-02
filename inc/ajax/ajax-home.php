<?php 
  if(get_next_posts_link()) { ?>
    <div id="pagination-home" class="pagination-post">
      <?php next_posts_link(__('<i class="iconfont icon-activity"></i> 加载更多文章')); ?>
    </div>
  <?php } else {
    echo '<div class="no-more-post"><a><i class="iconfont icon-anchor"></i> 好像就这么多</a></div>';
  }
?>

<script>
  $(document).ready(function($) { 
    $('#pagination-home a').click(function() {
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
            $this.removeClass('loading').html('<i class="iconfont icon-activity"></i> 加载更多文章');
            var $res = $(data).find("article .bottom .new ul li");
            $('article .bottom .new ul').append($res);
            var newhref = $(data).find("#pagination-home a").attr("href");
            if (newhref != undefined) {
              $("#pagination-home a").attr("href", newhref);
            } else {
              $("#pagination-home a").removeAttr("href");
              $("#pagination-home a").html('<i class="iconfont icon-anchor"></i> 好像就这么多');
              $("#pagination-home a").parent().addClass('no-more-post');
              $("#pagination-home a").unbind("click");
              $('article').unbind("scroll");
              $(document).unbind("scroll");
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

      // 封装节流
      function throttle(fn) {
        return function() {
          if(fn.timer) return;
          fn.timer = setTimeout(() => {
            fn.call(this);
            fn.timer = null;
          }, 300);
        }
      }
      
      // pc scroll ajax
      const pc_scroll_event = () => {
        $('article').on('scroll', throttle(function(){
          let height = $('article').height() + 50;
          let scrollTop = $('article').scrollTop();
          let scrollHeight = $('article')[0].scrollHeight;
          if(scrollHeight - (height + scrollTop) <= 50) {
            scroll_ajax();
          }
        }));
      }

      // mobile scroll ajax
      const mobile_scroll_event = () => {
        $(document).on('scroll', throttle(function(){
          let height = $(window).height();
          let topToBottom = $('article')[0].getBoundingClientRect().bottom;
          if(topToBottom - height <= 100) {
            scroll_ajax();
          }
        }))
      }


      // scroll ajax
      const scroll_ajax = () => {
        $this = $('#pagination-home a');
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
              var $res = $(data).find("article .bottom .new ul li");
              $('article .bottom .new ul').append($res);
              var newhref = $(data).find("#pagination-home a").attr("href");
              if (newhref != undefined) {
                $("#pagination-home a").attr("href", newhref);
              } else {
                $("#pagination-home a").removeAttr("href");
                $("#pagination-home a").html('<i class="iconfont icon-anchor"></i> 好像就这么多');
                $("#pagination-home a").parent().addClass('no-more-post');
                $("#pagination-home a").unbind("click");
                $('article').unbind("scroll");
                $(document).unbind("scroll");
              }
            }
          });
        }
        return false;
      }

      $(document).ready(() => { 
        pc_scroll_event();
        mobile_scroll_event();
      });
    </script>

  <?php }
?>