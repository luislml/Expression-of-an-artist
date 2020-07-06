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

  /* Auth */
  var  $v01  = $('.vertical0')
  		,$v02  = $('.vertical1')
  		,$v03  = $('.vertical2')
  		,$v04  = $('.vertical3')
  		,$v05  = $('.vertical4')
      ,$v06  = $('.vertical5')
      ,$v07  = $('.vertical6')
      ,$v08  = $('.vertical7')
      ,$v09  = $('.vertical8')
      ,$v10  = $('.vertical9')
  		,$login= $('.modal')
  		,speed = 60
  		,tl = new TimelineLite({onComplete:restart});
  
  		tl.fromTo($v01,speed*0.70,{y:-250} ,{y:-750} ,'sync')
  			.fromTo($v02,speed*0.75,{y:-950} ,{y:-1250},'sync')
  			.fromTo($v03,speed*0.95,{y:-1000},{y:-1850},'sync')
  			.fromTo($v04,speed*0.75,{y:-1250},{y:-1750},'sync')
  			.fromTo($v05,speed*0.85,{y:-1100},{y:-2000},'sync')
      	.fromTo($v06,speed*0.65,{y:-900},{y:-1950},'sync')
      	.fromTo($v07,speed*0.70,{y:-1300},{y:-2100},'sync')
      	.fromTo($v08,speed*0.95,{y:-850},{y:-1460},'sync')
        .fromTo($v09,speed*0.55,{y:-1000},{y:-1750},'sync')
        .fromTo($v10,speed*0.80,{y:-1200},{y:-1600},'sync')
  			.fromTo($login,1,{scale:0,autoAlpha:0},{scale:1,autoAlpha:1, ease:Elastic.easeInOut},'sync');
  		
  		tl.play();
  
      function restart(){
        tl.stop();
        tl.restart();
      }
  /* Auth */
  $('[data-change="on"]').on('click', function() {
    $('#auth').toggleClass('change');
  });
  /* end auth */


  // dashboard
  $('#minified').on('click', function() {
      $('body').toggleClass('sidebar-minified');
  });
});