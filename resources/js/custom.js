$(window).scroll(function() {    // this will work when your window scrolled.
    var height = $(window).scrollTop();  //getting the scrolling height of window
    
    if(height  <= 400) {
      $(".main-nav").removeClass('sticky');
      $('.main-nav').animate({top: '0px', opacity: '1'}, 0);
    } 
    else if(height <= 500) {
      $('.main-nav').animate({top: '-100px', opacity: '0'}, 0);
    }
    else {
      $(".main-nav").addClass('sticky');
      $('.main-nav').animate({top: '0px', opacity: '1'}, 0);
    }
  
    // animation
    if(height == 0) {
      $('.animate-top').css({
        margin: '0'
      });
    }
    else {
      $('.animate-top').animate({
        margin: '-' + height + 'px 0px 0px 0px'
      }, 0);
    }
  
    // animation
    if(height == 0) {
      $('.animate-top-xs').css({
        margin: '0'
      });
    }
    else {
      $('.animate-top-xs').animate({
        margin: '-' + height*0.2 + 'px 0px 0px 0px'
      }, 0);
      // banner
      $('.c-banner').animate({
        'background-position-y': -height*0.2 + 'px'
      }, 0);
    }
});

$(document).ready(function() {

    // dashboard
    $('#minified').on('click', function() {
        $('body').toggleClass('sidebar-minified');
    });
});