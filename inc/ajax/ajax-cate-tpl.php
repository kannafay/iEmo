<script>

  $('<div class="slider"></div>').appendTo($('.categories ul'));

  let tagA = $('.category .categories ul li a');
  let firstTagA = $('.category .categories ul li a:first');
  let url = firstTagA.attr('href');
  let title = firstTagA.text();

  let tagUl = $('.category .categories ul');
  let solider = $('.category .categories ul .slider');

  $(document).ready(()=>{
    firstTagA.addClass('active');
    firstTagA[0].scrollIntoView({behavior:'smooth', inline:'center'});
    solider.width(firstTagA.outerWidth());
    let position = firstTagA.position();
    let scrollLeft = tagUl.scrollLeft();
    solider.css({
      left: position.left + scrollLeft,
    });

    $.ajax({
      type: 'get',
      url: url,
      success: function(data){
        posts = $(data).find('.cate-box > *');
        $('.cate-box').html(posts);
        $('title').html(title + ' &#8211 ' + '<?php bloginfo('name'); ?>');
        window.history.pushState('', '', url);
      }
    });
    return false;
  })






    // click event
    $(document).ready(()=>{
    tagA.on('click',function(){
      let url = $(this).attr('href');
      let title = $(this).text();
      tagA.removeClass('active');
      $(this).addClass('active');
      this.scrollIntoView({behavior:'smooth', inline:'center'});
      solider.width($(this).outerWidth());
      let position = $(this).position();
      let scrollLeft = tagUl.scrollLeft();
      solider.css({
        left: position.left + scrollLeft,
      });

      // request data
      $.ajax({
        type: 'get',
        url: url,
        success: function(data){
          posts = $(data).find('.cate-box > *');
          $('.cate-box').html(posts);
          $('title').html(title + ' &#8211 ' + '<?php bloginfo('name'); ?>');
          window.history.pushState('', '', url);
          bind_cate_next();
        }
      });
      return false;
    });
  })







  // popstate event
  $(document).ready(()=>{
    window.onpopstate = () => {
      let url = location.href;
      let title = '';
      tagA.each(function(){
        if($(this).attr('href') == url) {
          title = $(this).text();
          tagA.removeClass('active');
          $(this).addClass('active');
          this.scrollIntoView({behavior:'smooth', inline:'center'});
          solider.width($(this).outerWidth());
          let position = $(this).position();
          let scrollLeft = tagUl.scrollLeft();
          solider.css({
            left: position.left + scrollLeft,
          });
        }
      })


      // request data
      $.ajax({
        type: 'get',
        url: url,
        success: function(data){
          posts = $(data).find('.cate-box > *');
          $('.cate-box').html(posts);
          $('title').html(title + ' &#8211 ' + '<?php bloginfo('name'); ?>');
          bind_cate_next();
        }
      });
      return false;
    }
  })







  // ajax loading post 
  const bind_cate_next = () => {
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
              var $res = $(data).find("article .cate-box ul li");
              $('article .cate-box ul').append($res);
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
  }

  bind_cate_next();





  // browser Back event
  $(function() { 
    pushHistory(); 
    window.addEventListener("popstate", function(e) { 
      let cateUrl = $('header .menu ul .cate a').attr('href');
      if(location.href == cateUrl) {
        history.go(-2);
      }
    }, false); 
    function pushHistory() { 
      var state = { 
        title: 'title', 
        url: ''
      }; 
      window.history.pushState(state, 'title', ''); 
    } 
  });

</script>