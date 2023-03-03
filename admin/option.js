function iemo_post_show() {
  $('#iemo-recommend-post').addClass('active');
  $('.mask').addClass('active');
}


function iemo_post_close() {
  $('#iemo-recommend-post').removeClass('active');
  $('.mask').removeClass('active');
}


let timer;
function change_success() {
  clearInterval(timer);
  $('.success').addClass('active');
  timer = setTimeout(function() {
    $('.success').removeClass('active');
  },1500)
}


function mask_close() {
  $('.mask').removeClass('active');
}


function showMenuIcon() {
  $('.menu-icon p').toggle();
  
  if($('.show-menu-icon').text() == '查看菜单图标') {
    $('.show-menu-icon').text('收起菜单图标');
  } else {
    $('.show-menu-icon').text('查看菜单图标');
  }
}

function showSocialIcon() {
  $('.social-icon p').toggle();
  
  if($('.show-social-icon').text() == '查看社交图标') {
    $('.show-social-icon').text('收起社交图标');
  } else {
    $('.show-social-icon').text('查看社交图标');
  }
}
