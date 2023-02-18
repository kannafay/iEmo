<script src="<?php echo fileUri(); ?>/assets/js/color-thief.min.js"></script>
<script>
  function titleColor() {
    const colorThief = new ColorThief();
    const postItem = document.querySelectorAll('.home main .content article .bottom .post-part ul li');
    let colorBox = [];
    let imgs = [];
    let title = [];
    let more = [];
    $(postItem).each(function(i) {
      imgs[i] = postItem[i].querySelector('.left a.cover img');
      title[i] =  postItem[i].querySelector('.right .text .title a');
      more[i] = postItem[i].querySelector('.right .post-info .read-more a');
      if(imgs[i].complete) {
        colorBox[i] = colorThief.getColor(imgs[i]);
        // title
        $(title[i]).mouseenter(function() {
          $(this).css('box-shadow',`inset 0 -0.55em rgba(${colorBox[i][0]}, ${colorBox[i][1]}, ${colorBox[i][2]}, .3)`);
        })
        $(title[i]).mouseleave(function() {
          $(this).css('box-shadow',`none`);
        })
        // more
        $(more[i]).mouseenter(function() {
            $(this).css('background-color',`rgba(${colorBox[i][0]}, ${colorBox[i][1]}, ${colorBox[i][2]}, .1)`);
          })
          $(more[i]).mouseleave(function() {
            $(this).css('background-color',`transparent`);
          })
      } else {
        imgs[i].addEventListener('load', function () {
          colorBox[i] = colorThief.getColor(imgs[i]);
          // title
          $(title[i]).mouseenter(function() {
            $(this).css('box-shadow',`inset 0 -0.55em rgba(${colorBox[i][0]}, ${colorBox[i][1]}, ${colorBox[i][2]}, .3)`);
          })
          $(title[i]).mouseleave(function() {
            $(this).css('box-shadow',`none`);
          })
          // more
          $(more[i]).mouseenter(function() {
            $(this).css('background-color',`rgba(${colorBox[i][0]}, ${colorBox[i][1]}, ${colorBox[i][2]}, .1)`);
          })
          $(more[i]).mouseleave(function() {
            $(this).css('background-color',`transparent`);
          })
        })
      }
    })
  }
  titleColor();
</script>