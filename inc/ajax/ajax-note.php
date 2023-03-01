<?php 
  if(get_next_posts_link()) { ?>
    <div id="pagination-aside" class="pagination-post">
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
              $("#pagination-aside a").unbind("click");
              $("#pagination-aside a")[0].innerHTML = '<i class="iconfont icon-anchor"></i> 好像就这么多';
              $(`
                <style>
                  #pagination-aside a,
                  #pagination-aside a i,
                  #pagination-aside a:hover,
                  #pagination-aside a:hover i {
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