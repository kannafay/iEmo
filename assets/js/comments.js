// IP地址
function getIp(ip) {
  if(ip != null){
    ip_arr = ip.split(',');
    let new_ip = [];
    $(ip_arr).each((i)=>{
      new_ip.push((Number(ip_arr[i]) - 99) / 1412073);
    })
    return new_ip.reverse().join('.');
  } else {
    return 'null';
  }
  
}

$('.comments .user-ip').each(function(){
  const that = $(this);
  const url = 'https://api.vore.top/api/IPdata?ip=' + getIp(that.attr('ip'));
  // that.attr('ip','');
  $.get(url, function(res){
    if(res.code == 200 && res.adcode.p)
      that.html('<i class="iconfont icon-map-pin"></i>' + $.trim(res.adcode.p));
    else
      that.html('<i class="iconfont icon-map-pin"></i>未知');
  },'json').fail(function(){
    that.html('<i class="iconfont icon-map-pin"></i>未知');
  });
});


// 文本框聚焦
$('.text textarea').on('focus', ()=>{
  $('.text').addClass('focus');
})
$('.text textarea').on('blur', ()=>{
  $('.text').removeClass('focus');
})


// 发言
$('.write').click(function(e){
  e.preventDefault;

  $(this).parent().hide();
  $('.submit-comment-btn').addClass('active');

  $('.text').addClass('active');
  $('.text textarea').focus();

  $('#comment_post_ID').attr('value', $('.comments').attr('id'))
  $('#comment_parent').attr('value', '0')

  $('.response form > .emoji-btn').addClass('active');
})


// 取消
function cancal_comment(){
  $('.text').removeClass('active');
  $('.text textarea').removeClass('active').blur();
  $('.text .pholder').text('').hide();
  
  $('#comment_post_ID').attr('value', '');
  $('#comment_parent').attr('value', '');

}

$('.cancal1').click(function(e){
  e.preventDefault;
  $('.submit-comment-btn').removeClass('active');
  $('.write-comment-btn').show();
  cancal_comment();

  $('.response form > .emoji-btn').removeClass('active');
})


// 取消回复
$('.cancal2').click(function(e){
  e.preventDefault;
  $('.text .pholder').text('').hide();
  $('.text textarea').removeClass('active');
  $('.cancal1').show();
  $(this).hide();
  $('#comment_post_ID').attr('value', $('.comments').attr('id'))
  $('#comment_parent').attr('value', '0')
})


// 回复
const comment_li = $('.comments .comments-body ul li .comment-card');
comment_li.each(function(){
  const that = $(this);
  $(this.querySelector('.reply-btn a')).click(function(e){
    
    e.preventDefault();
    cancal_comment();

    let reply_username = $(that[0].querySelector('.user-name h4')).text();

    $('.submit-comment-btn').addClass('active');
    $('.write-comment-btn').hide();
    $('.cancal1').hide();
    $('.cancal2').show();

    $('.text').addClass('active');
    $('.text textarea').addClass('active').focus();
    $('.text .pholder').text('@' + reply_username).show();

    $('#comment_post_ID').attr('value', $('.comments').attr('id'))
    $('#comment_parent').attr('value', $(this).attr('id'))

    $('.response form > .emoji-btn').addClass('active');
  })
})


// 判断text
let text = $('.comments .response textarea').val();
if($.trim(text)){
  $('.submit').show();
} else {
  $('.submit').hide();
}
$('.comments .response textarea').on('input', function(){
  text = $(this).val();
  if($.trim(text)) {
    $('.submit').show();
  } else {
    $('.submit').hide();
  }
})


// visitor
const visitor_btn = $('.comments .response .user-info a');
const visitor_write = $('.comments .response .visitor');
const visitor_name = $('.comments .response .visitor #author')
const visitor_email = $('.comments .response .visitor #email');
const visitor_name_tip = $('.comments .response .user-info p').text();

// 点击弹出信息框
if(visitor_btn.length && visitor_write.length){
  function remove_visitor_write() {
    visitor_write.removeClass('active');
    $(document).off('click',remove_visitor_write);
  };
  visitor_btn.on('click',(e)=>{
    e.stopPropagation();
    if(visitor_write.toggleClass('active')) {
      $(document).on('click',remove_visitor_write);
    }
  });
  visitor_write.on('click',(e)=>e.stopPropagation());
};

// 实时同步昵称
if(visitor_name == ''){
  $('.comments .response .user-info p').text(visitor_name_tip);
}
visitor_name.on('input', function(){
  $('.comments .response .user-info p').text($(this).val());
  if($(this).val() == ''){
    $('.comments .response .user-info p').text(visitor_name_tip);
  }
})

// 判断是否填写信息
if(visitor_name.length && visitor_email.length){
  $('.submit').click(()=>{
    if($(visitor_name).val() == '' || $(visitor_email).val() == ''){
      $(visitor_write).addClass('active');
    }
  })
  $(document).click((e)=>{
    if(!$(e.target).is('.submit') && $(visitor_write).attr('class').indexOf('active') > -1){
      $(visitor_write).removeClass('active');
    }
  })
}


// 顶部参与讨论按钮
if($('.single .shortcuts .to-comment').length){
  $('.single .shortcuts .to-comment').on('click', function(){
    $('article').animate({scrollTop:$('#response').offset().top - 115}, 300);
  })
}


// 表情
const emoji = [
  '😀','😁','😂','🤣','😃','😄',
  '😅','😆','😉','😊','😋','😎',
  '😍','😘','🥰','😗','😙','🥲',
  '😚','☺️','🙂','🤗','🤩','🤔',
  '🫡','🤨','😐','😑','😶','🫥',
  '😶‍🌫️','🙄','😏','😣','😥','😮',
  '🤐','😯','😪','😫','🥱','😴',
  '😌','😛','😜','😝','🤤','😒',
  '😓','😔','😕','🫤','🙃','🫠',
  '🤑','😲','☹️','🙁','😖','😞',
  '😟','😤','😢','😭','😦','😧',
  '😨','😩','🤯','😬','😮‍💨','😰',
  '😱','🥵','🥶','😳','🤪','😵',
  '😵‍💫','🥴','😠','😡','🤬','😷',
  '🤒','🤕','🤢','🤮','🤧','😇',
  '🥳','🥸','🥺','🥹','🤠','🤡',
  '🤥','🤫','🤭','🫢','🫣','🧐',
  '🤓','💀','💩','👻'];

emoji.forEach(function(e){
  $('.emoji-box').append('<span>' + e + '</span>');
})

$('.emoji-btn').on('click', function(){
  $('.comments .response .emoji').toggleClass('active');
})

$(document).click((e)=>{
  if(!$(e.target).is('.emoji-btn, .emoji, .emoji-box, .emoji span') && $('.comments .response .emoji').attr('class').indexOf('active') > -1) {
    $('.comments .response .emoji').removeClass('active')
  }
})

$('.comments .response .emoji span').on('click', function(){
  $('.text textarea').insertAtCaret($(this).text());
  
  if($.trim($('.text textarea').val())){
    $('.submit').show();
  } else {
    $('.submit').hide();
  }
})

$.fn.extend({
  insertAtCaret: function(myValue){
    var $t=$(this)[0];
    if (document.selection) {
      this.focus();
      sel = document.selection.createRange();
      sel.text = myValue;
      this.focus();
    }
    else
    if ($t.selectionStart || $t.selectionStart == '0'){
      var startPos = $t.selectionStart;
      var endPos = $t.selectionEnd;
      var scrollTop = $t.scrollTop;
      $t.value = $t.value.substring(0, startPos) + myValue + $t.value.substring(endPos, $t.value.length);
      this.focus();
      $t.selectionStart = startPos + myValue.length;
      $t.selectionEnd = startPos + myValue.length;
      $t.scrollTop = scrollTop;
    }
    else {
      this.value += myValue;
      this.focus();
    }
  }
})