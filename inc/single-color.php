<script src="<?php echo fileUri(); ?>/assets/js/color-thief.min.js"></script>
<script>
  const colorThief = new ColorThief();
  const img = document.querySelector('.single main .content article .post-cover .cover .color-thief');
  const getColorFun=()=>{
    let colors = colorThief.getColor(img);
    // console.log(`rgb(${colors[0]}, ${colors[1]}, ${colors[2]})`);
    function changeColor() {
      $(`
        <style>
          :root {
            --theme: rgb(${colors[0]}, ${colors[1]}, ${colors[2]});
            --theme-op-3: rgb(${colors[0]}, ${colors[1]}, ${colors[2]});
            --post-cover: rgb(${colors[0]}, ${colors[1]}, ${colors[2]});
            --scroll: rgba(${colors[0]}, ${colors[1]}, ${colors[2]}, .5);
            --menu-hover: rgba(${colors[0]}, ${colors[1]}, ${colors[2]}, .1);
            --social-hover: rgba(${colors[0]}, ${colors[1]}, ${colors[2]}, .1);
            --theme-bak: rgb(${colors[0]}, ${colors[1]}, ${colors[2]});
            --code-bgc: rgba(${colors[0]}, ${colors[1]}, ${colors[2]}, .1);
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
          }
        </style>
      `).appendTo('head');
    } else{
      changeColor();
    }
    
  }
  if (img.complete) {
    getColorFun();
  } else {
    img.addEventListener('load', function () {
      getColorFun(); 
    });
  }
</script>