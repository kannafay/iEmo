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
  },1000)
}




function mask_close() {
  $('.mask').removeClass('active');
}