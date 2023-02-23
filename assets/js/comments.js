

$('.reply-btn a').each(function(){
  $(this).click((e)=>{
    e.preventDefault();
    replyUrl = $(this).attr('href');
    console.log(replyUrl);
    window.history.pushState('', '', replyUrl);
  })
})