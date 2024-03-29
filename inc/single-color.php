<script src="<?php echo fileUri(); ?>/assets/js/color-thief.min.js"></script>
<script>
  const getImgUrl = $('.get_img_url');
  const colorThief = new ColorThief();
  const img = document.querySelector('.single .post-cover .cover .color-thief');
  const getColorFun=()=>{
    // console.log(img.src);
    let colors = colorThief.getColor(img);
    // console.log(`rgb(${colors[0]}, ${colors[1]}, ${colors[2]})`);
    function changeColor() {
      const themeColor = `${colors[0]}, ${colors[1]}, ${colors[2]}`;
      $(`
        <style>
          :root {
            --theme: rgb(${themeColor});
            --theme-op-3: rgb(${themeColor});
            --post-cover: rgb(${themeColor});
            --scroll: rgba(${themeColor}, .5);
            --title-color: rgba(${themeColor}, .2);
            --menu-hover: rgba(${themeColor}, .1);
            --social-hover: rgba(${themeColor}, .1);
            --theme-bak: rgb(${themeColor});
            --code-bgc: rgba(${themeColor}, .1);
          }
        </style>
      `).appendTo('head');
    }
    if(colors[0] > 180 && colors[1] > 180 && colors[2] > 180) {
      changeColor();
      $(`
        <style>
          :root {
            --theme-bak: #333;
            --code-bgc: rgba(0 0 0 / .05);
            --title-color: rgba(0 0 0 / .1);
            --scroll: rgba(0 0 0 / .2);
          }
        </style>
      `).appendTo('head');
    } else{
      changeColor();
    }
    
  }

  if (getImgUrl.length === 0){
    if (img.complete) {
      getColorFun();
    } else {
      $(img).on('load',function (){
        getColorFun(); 
      });
    }
  }

  getImgUrl.each(function (){
    var that = this;
    get_color(function (result){
      const url = result.code === 200 ? result.data.url : '<?=default_post_cover()?>';
      // console.log(url);
      const newImg = $('<img src="'+url+'">');
      $(that).parent().append(newImg);
      newImg.css('opacity','0');
      newImg.on('load',function (){
        $(that).remove();
        <?php
          if(get_option("iemo_page_animation")) { ?>
            $(this).css('animation','FadeIn-<?php echo get_option("iemo_page_animation"); ?> .5s forwards');
          <?php }
        ?>
        newImg.css('opacity','1');
      });
 
      $('.single .post-cover .cover .color-thief').on('load',function (){
        getColorFun();
      }).attr('src',url);
    });
  });
</script>