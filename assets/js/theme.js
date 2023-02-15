// left menu
$('#menu-btn').click(function() {
  if($('header').attr('class') == $('main .content aside').attr('class')) {
    $('header').toggleClass('active');
    $('main .content aside').toggleClass('active');
  } else if($('header').attr('class') == 'active' && $('main .content aside').attr('class') != 'active') {
    $('header').removeClass('active');
  } else if($('header').attr('class') != 'active' && $('main .content aside').attr('class') == 'active') {
    $('header').addClass('active');
  }
})

$('#aside-btn').click(function() {
  $('main .content aside').toggleClass('active');
})





// nav user menu
const user_set_btn = document.querySelector('main .nav .user-menu #user-menu-btn');
const user_set_menu = document.querySelector('main .nav .user-menu .user-menu-box');
function remove_set_menu(e) {
  user_set_menu.classList.remove('active');
  document.removeEventListener("click",remove_set_menu);
}

if(user_set_btn) {
  user_set_btn.addEventListener("click",(e)=>{
    e.stopPropagation();
    if(user_set_menu.classList.toggle('active')) {
        document.addEventListener("click",remove_set_menu);
    }
  })
  user_set_menu.addEventListener("click",(e)=>e.stopPropagation());
}

$('main .content article,main .content aside .aside-content').scroll(function() {
  $(user_set_menu).removeClass('active');
})
