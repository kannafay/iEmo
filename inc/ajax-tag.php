<script>

  // tag change bar
  $('<div class="slider"></div>').appendTo($('.tag-bar ul'));
  $(document).ready(function() {
    let url = location.href;
    $('.tag .tag-bar ul li a').each(function() {
      if($(this).attr('href') == url) {
        $('.tag .tag-bar ul li a').removeClass('active');
        $(this).addClass('active');

        $('.tag .tag-bar ul .slider').width($(this).outerWidth());
        let position = $(this).position();
        let scrollLeft = $('.tag .tag-bar ul').scrollLeft();
        $(".tag .tag-bar ul .slider").css({
          left: position.left + scrollLeft,
        });
      }

      $(this).click(function() {
        $('.tag .tag-bar ul li a').removeClass('active');
        $(this).addClass('active');
        let width = $(this).outerWidth();
        let position = $(this).position();
        let scrollLeft = $('.tag .tag-bar ul').scrollLeft();
        $(".tag .tag-bar ul .slider").css({
          width: width,
          left: position.left + scrollLeft,
        });
      })
    })
  })









  // click event
  $(document).ready(function() {
    $('.tag .tag-bar ul li a').on('click',function(){
      let url = $(this).attr("href");
      let title = $(this).text();
      $('.tag .tag-bar ul li a').removeClass('active');
      $(this).addClass('active');
      $.ajax({
        type: 'get',
        url: url,
        success: function(data){
          // console.log(data);
          posts = $(data).find('.tag-box > *');
          $('.tag-box').html(posts);
          $('title').html(title + ' &#8211 ' + '<?php bloginfo('name'); ?>');
          window.history.pushState('', '', url);
          bind_tag_next();
        }
      });
      return false;
    });
  })









  // popstate
  $(document).ready(function() {
    window.addEventListener('popstate', onPopState);
    function onPopState() {
      // console.log(location.href);
      let url = location.href;
      let title = '';
      $('.tag .tag-bar ul li').removeClass('active');
      $('.tag .tag-bar ul li').each(function() {
        if($(this.querySelector('a')).attr('href') == url) {
          $(this).addClass('active');
          title = $(this)[0].querySelector('a').innerText;
        }
      })
      
      $('.tag .tag-bar ul li a').each(function() {
        if($(this).attr('href') == url) {
          $('.tag .tag-bar ul li a').removeClass('active');
          $(this).addClass('active');

          $('.tag .tag-bar ul .slider').width($(this).outerWidth());
          let position = $(this).position();
          let scrollLeft = $('.tag .tag-bar ul').scrollLeft();
          $(".tag .tag-bar ul .slider").css({
            left: position.left + scrollLeft,
          });
        }

        $(this).click(function() {
          $('.tag .tag-bar ul li a').removeClass('active');
          $(this).addClass('active');
          let width = $(this).outerWidth();
          let position = $(this).position();
          let scrollLeft = $('.tag .tag-bar ul').scrollLeft();
          $(".tag .tag-bar ul .slider").css({
            width: width,
            left: position.left + scrollLeft,
          });
        })
      })

      // console.log(title);
      $.ajax({
        type: 'get',
        url: url,
        success: function(data){
          // console.log(data);
          posts = $(data).find('.tag-box > *');
          $('.tag-box').html(posts);
          $('title').html(title + ' &#8211 ' + '<?php bloginfo('name'); ?>');
          bind_tag_next();
        }
      });
      return false;
    }
  })



  




  
  // ajax loading post 
  const bind_tag_next = ()=>{
    jQuery(document).ready(function($) { 
    //点击下一页的链接(即那个a标签)
      $('#pagination-post a').click(function() {
        
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
              $this.removeClass('loading').html('<i class="iconfont icon-activity"></i> 加载更多文章'); //移除loading属性
              var $res = $(data).find("article .tag-box ul li"); //从数据中挑出文章数据，请根据实际情况更改
              $('article .tag-box ul').append($res.fadeOut(0).fadeIn(300)); //将数据加载加进posts-loop的标签中。
              var newhref = $(data).find("#pagination-post a").attr("href"); //找出新的下一页链接
              if (newhref != undefined) {
                $("#pagination-post a").attr("href", newhref);
              } else {
                // $("#pagination-post a").remove(); //如果没有下一页了，隐藏
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
  }

  bind_tag_next();
</script>
