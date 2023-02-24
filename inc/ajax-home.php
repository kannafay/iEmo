<?php 
  if(get_next_posts_link()) { ?>
    <div id="pagination-home" class="pagination-post">
      <?php next_posts_link(__('<i class="iconfont icon-activity"></i> 加载更多文章')); ?>
    </div>
  <?php } else {
    echo '<div class="no-more-post"><a><i class="iconfont icon-anchor"></i> 好像就这么多</a></div>';
  }
?>

<script language=javascript>
  jQuery(document).ready(function($) { 
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
              $("#pagination-home a").unbind("click");
              $("#pagination-home a")[0].innerHTML = '<i class="iconfont icon-anchor"></i> 好像就这么多';
              $(`
                <style>
                  #pagination-home a,
                  #pagination-home a i,
                  #pagination-home a:hover,
                  #pagination-home a:hover i {
                    background-color: transparent;
                    color: #999;
                  }
                </style>
              `).appendTo('head');
            }
            titleColor(); //card hover
          }
        });
      }
      return false;
    });
  });
</script>