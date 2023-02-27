function getIp(ip) {
  if(ip != 'null') {
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

$('.comments .user-ip').each(function (){
  const that = $(this);
  const url = 'https://ip.useragentinfo.com/json?ip=' + getIp(that.attr('ip'));
  that.attr('ip','');
  $.get(url, function(res){
    if(res.country || res.province) 
      that.html('<i class="iconfont icon-map-pin"></i>' + $.trim(res.country + ' ' + res.province));
    else
      that.html('<i class="iconfont icon-map-pin"></i>未知');
  },'json').fail(function (){
    that.html('<i class="iconfont icon-map-pin"></i>未知');
  });
});

// 添加
$('.write').click(function(e) {
  e.preventDefault;

  $(this).parent().hide();
  $('.submit-comment-btn').addClass('active');

  $('.text').addClass('active');
  $('.text textarea').focus();

  $('#comment_post_ID').attr('value', $('.comments').attr('id'))
  $('#comment_parent').attr('value', '0')
})


// 取消
function cancal_comment() {
  $('.text').removeClass('active');
  $('.text textarea').removeClass('active');
  $('.text textarea').blur();
  $('.text .pholder').text('').hide();
  
  $('#comment_post_ID').attr('value', '');
  $('#comment_parent').attr('value', '');
}

$('.cancal1').click(function(e) {
  e.preventDefault;
  $('.submit-comment-btn').removeClass('active');
  $('.write-comment-btn').show();
  cancal_comment();
})

// 取消回复
$('.cancal2').click(function(e) {
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
    
    // $('article').animate({scrollTop:$('#response-title').offset().top - 25}, 300);
    // console.log($('#response-title').offset().top);

    let reply_username = $(that[0].querySelector('.user-name h4')).text();

    $('.submit-comment-btn').addClass('active');
    $('.write-comment-btn').hide();
    $('.cancal1').hide();
    $('.cancal2').show();

    $('.text').addClass('active');
    $('.text textarea').focus();
    $('.text textarea').addClass('active');
    $('.text .pholder').text('@' + reply_username).show();

    $('#comment_post_ID').attr('value', $('.comments').attr('id'))
    $('#comment_parent').attr('value', $(this).attr('id'))
  })
})







// 判断text
let text = $('.comments .response textarea').val();
if($.trim(text)) {
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
const visitor_btn = document.querySelector('.comments .response .user-info a');
const visitor_write = document.querySelector('.comments .response .visitor');
if(visitor_btn && visitor_write) {
  function remove_set_menu(e) {
    visitor_write.classList.remove('active');
    document.removeEventListener("click",remove_set_menu);
  };
  visitor_btn.addEventListener("click",(e)=>{
    e.stopPropagation();
    if(visitor_write.classList.toggle('active')) {
      document.addEventListener("click",remove_set_menu);
    };
  });
  visitor_write.addEventListener("click",(e)=>e.stopPropagation());

  $('article').on('click', function(){
    $(visitor_write).removeClass('active');
  })
};


let = visitor_user_name = $('.comments .response .visitor > input:first')
let = visitor_user_name_tip = $('.comments .response .user-info p').text();

if(visitor_user_name == '') {
  $('.comments .response .user-info p').text(visitor_user_name_tip);
}
visitor_user_name.on('input', function(){
  $('.comments .response .user-info p').text($(this).val());
  if($(this).val() == '') {
    $('.comments .response .user-info p').text(visitor_user_name_tip);
  }
})





// const visitor_name = $('.comments .response .visitor > input:first');
// const visitor_email = $('.comments .response .visitor > input:eq(2)');

// if(visitor_name.length) {

// }


if($('.single .to-comment a').length) {
  $('.single .to-comment a').on('click', function() {
    $('article').animate({scrollTop:$('#response').offset().top - 115}, 300);
  })
}