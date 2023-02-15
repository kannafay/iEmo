<div id="pagination-aside">
  <?php next_posts_link(__('<i class="iconfont icon-activity"></i> 加载更多说说')); ?>
</div>
<?php if(!get_next_posts_link()) {
  echo '<div class="no-more-say"><a><i class="iconfont icon-anchor"></i> 好像就这么多</a></div>';} 
?>

<script language=javascript>
  const asideUriLast = thePath => thePath.substring(thePath.lastIndexOf('/') + 1);
  $('#pagination-aside a').attr('href', '<?php bloginfo('url'); ?>' + '/say/page/' + asideUriLast($('#pagination-aside a').attr('href')));

  let nextUrl = $('#pagination-aside a').attr('href');
  if(nextUrl.indexOf('?') !== -1) {
    nextUrl = nextUrl.replace(/(\?|#)[^'"]*/, '');
    $('#pagination-aside a').attr('href', nextUrl);
  }

jQuery(document).ready(function($) {
    //点击下一页的链接(即那个a标签)
    $('#pagination-aside a').click(function() {
      $this = $(this);
      $this.addClass('loading').html('<i class="iconfont icon-loader"></i> 加载中...'); //给a标签加载一个loading的class属性，可以用来添加一些加载效果
      var href = $this.attr("href"); //获取下一页的链接地址
      if (href != undefined) { //如果地址存在
        $.ajax({ //发起ajax请求
          url: href, //请求的地址就是下一页的链接
          type: "get", //请求类型是get
          error: function(request) {
              //如果发生错误怎么处理
          },
          success: function(data) { //请求成功
            $this.removeClass('loading').html('<i class="iconfont icon-activity"></i> 加载更多说说'); //移除loading属性
            var $res = $(data).find("aside .notes-box ul li"); //从数据中挑出文章数据，请根据实际情况更改
            $('aside .notes-box ul').append($res.fadeOut(0).fadeIn(300)); //将数据加载加进posts-loop的标签中。
            var newhref = $(data).find("#pagination-aside a").attr("href"); //找出新的下一页链接
            if (newhref != undefined) {
              $("#pagination-aside a").attr("href", newhref);
            } else {
              // $("#pagination-aside a").remove(); //如果没有下一页了，隐藏
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