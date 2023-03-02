<script>

  $('<div class="slider"></div>').appendTo($('.tag-bar ul'));

  let tagA = $('.tag .tag-bar ul li a');
  let firstTagA = $('.tag .tag-bar ul li a:first');
  let url = firstTagA.attr('href');
  let title = firstTagA.text();

  let tagUl = $('.tag .tag-bar ul');
  let solider = $('.tag .tag-bar ul .slider');

  $(document).ready(()=>{
    firstTagA.addClass('active');
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
        posts = $(data).find('.tag-box > *');
        $('.tag-box').html(posts);
        $('title').html(title + ' &#8211 ' + '<?php bloginfo('name'); ?>');
        window.history.pushState('', '', url);
        bind_tag_next();
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
      this.scrollIntoView({behavior:'smooth', inline:'center', block:'nearest'});
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
          posts = $(data).find('.tag-box > *');
          $('.tag-box').html(posts);
          $('title').html(title + ' &#8211 ' + '<?php bloginfo('name'); ?>');
          window.history.pushState('', '', url);
          bind_tag_next();

          $('article').off("scroll");
          $('article').on("scroll", pc_scroll());

          $(document).off("scroll");
          $(document).on("scroll", mobile_scroll());
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
          this.scrollIntoView({behavior:'smooth', inline:'center', block:'nearest'});
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
          posts = $(data).find('.tag-box > *');
          $('.tag-box').html(posts);
          $('title').html(title + ' &#8211 ' + '<?php bloginfo('name'); ?>');
          bind_tag_next();

          $('article').off("scroll");
          $('article').on("scroll", pc_scroll());

          $(document).off("scroll");
          $(document).on("scroll", mobile_scroll());
        }
      });
      return false;
    }
  })


  // ajax loading post 
  const bind_tag_next = () => {
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
              var $res = $(data).find("article .tag-box ul li");
              $('article .tag-box ul').append($res);
              var newhref = $(data).find("#pagination-post a").attr("href");
              if (newhref != undefined) {
                $("#pagination-post a").attr("href", newhref);
              } else {
                $("#pagination-post a").removeAttr("href");
                $("#pagination-post a").html('<i class="iconfont icon-anchor"></i> 好像就这么多');
                $("#pagination-post a").parent().addClass('no-more-post');
                $("#pagination-post a").unbind("click");
                $('article').unbind("scroll");
                $(document).unbind("scroll");
              }
            }
          });
        }
        return false;
      });
    });
  }

  bind_tag_next();

  // browser Back event
  $(function() { 
    pushHistory(); 
    window.addEventListener("popstate", function() { 
      let tagUrl = $('header .menu ul .tag a').attr('href');
      if(location.href == tagUrl) {
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
            scroll_ajax();
          }
        })
      }

      const pc_scroll_event = () => {
        $('article').on('scroll', pc_scroll());
      }


      // mobile scroll ajax
      function mobile_scroll() {
        return throttle(function(){
          let height = $(window).height();
          let topToBottom = $('article')[0].getBoundingClientRect().bottom;
          if(topToBottom - height <= 100) {
            scroll_ajax();
          }
        })
      }

      const mobile_scroll_event = () => {
        $(document).on('scroll', mobile_scroll())
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
              var $res = $(data).find("article .tag-box ul li");
              $('article .tag-box ul').append($res);
              var newhref = $(data).find("#pagination-post a").attr("href");
              if (newhref != undefined) {
                $("#pagination-post a").attr("href", newhref);
              } else {
                $("#pagination-post a").removeAttr("href");
                $("#pagination-post a").html('<i class="iconfont icon-anchor"></i> 好像就这么多');
                $("#pagination-post a").parent().addClass('no-more-post');
                $("#pagination-post a").unbind("click");
                $('article').unbind("scroll");
                $(document).unbind("scroll");
              }
            }
          });
        }
        return false;
      }

      pc_scroll_event();
      mobile_scroll_event();

    </script>

  <?php } else { ?>
    <script>
      let pc_scroll = ()=>{};
      let mobile_scroll = ()=>{};
    </script>
  <?php }
?>