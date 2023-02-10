// 左侧菜单
$('#menu-btn').click(function() {
  $('header').toggleClass('active');
  $(this).toggleClass('active');
})

$('#aside-btn').click(function() {
  $('main .content aside').toggleClass('active');
  $(this).toggleClass('active');
})
