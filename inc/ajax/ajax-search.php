<div id="pagination-post" class="pagination">
  <?php next_posts_link(__('<i class="iconfont icon-activity"></i> 加载更多文章')); ?>
</div>
<?php if(!get_next_posts_link()) {
  echo '<div class="pagination-post no-more-post"><a><i class="iconfont icon-anchor"></i> 好像就这么多</a></div>';} 
?>

<script language=javascript>
  jQuery(document).ready(function($) { 
    $('#pagination-post a').click(function() {
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
            var $res = $(data).find("article .search-box ul li");
            $('article .search-box ul').append($res);
            var newhref = $(data).find("#pagination-post a").attr("href");
            if (newhref != undefined) {
              $("#pagination-post a").attr("href", newhref);
            } else {
              $("#pagination-post a").removeAttr("href");
              $("#pagination-post a").html('<i class="iconfont icon-anchor"></i> 好像就这么多');
              $("#pagination-post a").parent().addClass('no-more-post');
              $("#pagination-post a").off("click");
              $('article').off("scroll");
              $(document).off("scroll");
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
      function pc_scroll() {
        return throttle(function(){
          let height = $('article').height() + 50;
          let scrollTop = $('article').scrollTop();
          let scrollHeight = $('article')[0].scrollHeight;
          if(scrollHeight - (height + scrollTop) <= 50) {
            $('article').off("scroll");
            $(document).off("scroll");
            scroll_ajax();
          }
        })
      }

      
      // mobile scroll ajax
      function mobile_scroll() {
        return throttle(function(){
          let height = $(window).height();
          let topToBottom = $('article')[0].getBoundingClientRect().bottom;
          if(topToBottom - height <= 100) {
            $('article').off("scroll");
            $(document).off("scroll");
            scroll_ajax();
          }
        })
      }


      // scroll ajax
      const scroll_ajax = () => {
        $this = $('#pagination-post a');
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
              var $res = $(data).find("article .search-box ul li");
              $('article .search-box ul').append($res);
              var newhref = $(data).find("#pagination-post a").attr("href");
              if (newhref != undefined) {
                $("#pagination-post a").attr("href", newhref);
                $('article').off("scroll");
                $('article').on("scroll", pc_scroll());
                $(document).off("scroll");
                $(document).on("scroll", mobile_scroll());
              } else {
                $("#pagination-post a").removeAttr("href");
                $("#pagination-post a").html('<i class="iconfont icon-anchor"></i> 好像就这么多');
                $("#pagination-post a").parent().addClass('no-more-post');
                $("#pagination-post a").off("click");
                $('article').off("scroll");
                $(document).off("scroll");
              }
            }
          });
        }
        return false;
      }

      $('article').on('scroll', pc_scroll());
      $(document).on("scroll", mobile_scroll());

    </script>

  <?php } else { ?>
    <script>
      let pc_scroll = ()=>{};
      let mobile_scroll = ()=>{};
    </script>
  <?php }
?>