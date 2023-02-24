$('.comments .user-ip').each(function (){
  const that = $(this);
  const url = 'https://ip.useragentinfo.com/json?ip=' + that.attr('ip');
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








// $('.reply-btn a').each(function(){
//   $(this).click((e)=>{
//     e.preventDefault();
//     replyUrl = $(this).attr('href');
//     console.log(replyUrl);
//     window.history.pushState('', '', replyUrl);
//   })
// })


