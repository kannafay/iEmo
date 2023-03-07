// Remove tag A wuth mousedown
$('body').on('mousedown', 'a', function(e) {
  e.preventDefault();
});


// Search btn - Mobile
$('#search-btn').click(function() {
  $('.search-m').toggleClass('active');
  if($('.search-m').attr('class') == 'search-m active') {
    $('#search-m').focus();
    $('.nav').css('border-bottom','1px solid #fff');
  } else {
    $('#search-m').blur();
    $('.nav').css('border-bottom','1px solid #e2e2e2');
  }
})
function close_search_m() {
  $('.search-m').removeClass('active');
  if($('.search-m').attr('class') != 'search-m active') {
    $('.nav').css('border-bottom','1px solid #e2e2e2');
  }
}


// Menu btn
$('#menu-btn').click(function() {
  if($('header').attr('class') == $('aside').attr('class')) {
    $('header').toggleClass('active');
    $('aside').toggleClass('active');
  } else if($('header').attr('class') == 'active' && $('aside').attr('class') != 'active') {
    $('header').removeClass('active');
  } else if($('header').attr('class') != 'active' && $('aside').attr('class') == 'active') {
    $('header').addClass('active');
  }

  close_search_m();
})

$('#aside-btn').click(function() {
  $('aside').toggleClass('active');
  close_search_m();
})








// Nav user menu
const user_set_btn = document.querySelector('main .nav .user-menu #user-menu-btn');
const user_set_menu = document.querySelector('main .nav .user-menu .user-menu-box');
function remove_set_menu(e) {
  user_set_menu.classList.remove('active');
  document.removeEventListener("click",remove_set_menu);
}

if(user_set_btn) {
  user_set_btn.addEventListener("click",(e)=>{
    e.stopPropagation();
    close_search_m();
    if(user_set_menu.classList.toggle('active')) {
      document.addEventListener("click",remove_set_menu);
    }
  })
  user_set_menu.addEventListener("click",(e)=>e.stopPropagation());
}



// Scrolling with hide menu and search
$('article, aside .aside-content').scroll(function() {
  $(user_set_menu).removeClass('active');
  close_search_m();
})

$(document).scroll(function() {
  $(user_set_menu).removeClass('active');
  close_search_m();
})

$('article').scroll(function() {
  $('header').removeClass('active');
  $('aside').removeClass('active');
})

$('article').click(function() {
  $('header').removeClass('active');
  $('aside').removeClass('active');
  close_search_m();
})






// Horizontal scrolling
const cateTagContainer = document.querySelectorAll(`
  .category main .content article .categories ul, 
  .tag main .content article .tag-bar ul,
  .single main .content article .post-cover .post-info .more,
  .home main .content article .bottom .recommend-bar
`);

if(cateTagContainer) {
  $(cateTagContainer).each(function(i) {
    cateTagContainer[i].addEventListener("wheel", (event) => {
      event.preventDefault();
      cateTagContainer[i].scrollLeft += event.deltaY;
    });
  })
}




// Menu tooltip
const menuItemA = document.querySelectorAll('header .menu > li > a');

if(menuItemA) {
  let menuItemTitle = [];
  $(menuItemA).each(function(i) {
    menuItemTitle[i] = $(menuItemA[i]).attr('title');
    if(menuItemTitle[i]) {
      $(menuItemA[i]).attr('title','');
      $('<span class="menu-item-title"></span>').text(menuItemTitle[i]).appendTo(menuItemA[i]);
    } else {
      // console.log(false);
    }
  })
}





// Home new or sticky
$('.home .recommend-bar ul .slider').width($('.home .recommend-bar ul li a.active').outerWidth());
$('.home .recommend-bar ul li a').each(function(i) {
  $(this).attr('index',i);
  $(this).click(function() {
    $('.home .recommend-bar ul li a').removeClass('active');
    $(this).addClass('active');
    let width = $(this).outerWidth();
    let position = $(this).position();
    let scrollLeft = $('.home .recommend-bar ul').scrollLeft();
    $(".home .recommend-bar ul .slider").css({
      width: width,
      left: position.left + scrollLeft,
    });
    // console.log(position.left);
    $('.home .post-part').removeClass('active');
    $($('.home .post-part')[$(this).attr('index')]).addClass('active');
  })
})


// color-theif
function get_color(callback) {
  $.ajax({
		type: 'POST',
		url: '/wp-admin/admin-ajax.php',
		contentType: "application/x-www-form-urlencoded",
		dataType: "json",
		data: {
			"action": "random_img",
		}
	}).done(function(data) {
    callback(data);
	}).fail(function(jqXHR, textStatus, errorThrown) {
		// console.debug(jqXHR);
	})
}


// aside sub page
const aside_btn_open = $('aside .aside-content .aside-btn-open');
const aside_btn_close = $('aside .aside-content .aside-btn-close');

aside_btn_open.on('click', function() {
  $('aside .aside-content').addClass('active');
  $('aside .aside-content .main-page').removeClass('active');
  $('aside .aside-content .sub-page').addClass('active');
})
aside_btn_close.on('click', function() {
  $('aside .aside-content').removeClass('active');
  $('aside .aside-content .sub-page').removeClass('active');
  $('aside .aside-content .main-page').addClass('active');
})



// aside sub page menu
const menu_parent = $('.sub-page .menu_sidebar > ul > li.menu-item-has-children');
let menu_parent_hight = [];
let menu_parent_a_hight = [];
$(document).ready(function() {
  $(menu_parent).each(function(i) {
    menu_parent_hight[i] = $(this).outerHeight();
    menu_parent_a_hight[i] = $(this).children('a').outerHeight();
    $(this).height(menu_parent_a_hight[i]);
    $(this).children('a').on('click', function() {
      if(!$(this).hasClass('active')) {
        $(this).parent().height(menu_parent_hight[i]);
        $(this).children('span').addClass('active');
        $(this).addClass('active');
      } else {
        $(this).parent().height(menu_parent_a_hight[i]);
        $(this).children('span').removeClass('active');
        $(this).removeClass('active');
      }
    })

    $(document).click((e)=>{
      if($(this).children('a').hasClass('active')) {
        if(!$(e.target).is($(this).children('a, ul')) && !$(e.target).is(this.querySelector('ul li ul li a'))) {
          $(this).height(menu_parent_a_hight[i]);
          $(this).children('a').removeClass('active');
          $(this).children('span').removeClass('active');
        }
      }
    })
  })
})

