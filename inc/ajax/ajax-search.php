<div id="pagination-post" class="pagination-post">
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
              $("#pagination-post a").unbind("click");
              $("#pagination-post a")[0].innerHTML = '<i class="iconfont icon-anchor"></i> 好像就这么多';
              $(`
                <style>
                  #pagination-post a,
                  #pagination-post a i,
                  #pagination-post a:hover,
                  #pagination-post a:hover i {
                    background-color: transparent;
                    color: #999;
                  }
                </style>
              `).appendTo('head');
            }
          }
        });
      }
      return false;
    });
  });
</script>