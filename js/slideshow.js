

(function(){
   
   var autoslide;
   var delay;
   
   var slideNumber = $('.slide-img').length;

   var currentPosition = 0;
   var nextPosition = 1;
   
   function setAuto() {
     autoslide = window.setInterval(function() {
       changeSlide((currentPosition + 1) % slideNumber, 1000);
       }, 7000);
   };
  
  
  $('.slide').hide();
  $('.slide:nth-child(1)').show();
  $('.slide-nav-item:nth-child(1)').addClass('selected');
  
  function changeSlide(next, ms){
    nextPosition = next;
    $('.slide:nth-child(' + (currentPosition + 1) + ')').fadeOut(ms, function(){
      $('.slide:nth-child(' + (next + 1) + ')').fadeIn(ms);
    });
    $('.slide-nav-item:nth-child(' + (currentPosition + 1)  + ')').removeClass('selected');
    $('.slide-nav-item:nth-child(' + (next + 1) + ')').addClass('selected');
    currentPosition = next;
  };
  
  $('#next-slide').click(function(e) {
    changeSlide((currentPosition + 1) % slideNumber, 0);
    window.clearInterval(autoslide);
    window.clearTimeout(delay);
    delay = window.setTimeout(setAuto, 10000);
  });
  
  $('#prev-slide').click(function(e) {
    changeSlide((currentPosition + (slideNumber - 1)) % slideNumber, 0);
    window.clearInterval(autoslide);
    window.clearTimeout(delay);
    delay = window.setTimeout(setAuto, 10000);
  });

  setAuto();
  
  $('.slide').dblclick(function() {
    window.clearInterval(autoslide);
    window.clearTimeout(delay);
    console.log('Slideshow Auto off.');
  });
  
  $('.slide-nav-item').click(function(e) {
    changeSlide($(this).index(), 0);
    
    window.clearInterval(autoslide);
    window.clearTimeout(delay);
    delay = window.setTimeout(setAuto, 10000);
    
  });
  
  $('#center .slide').click(function() {
    console.log('#slide_link_'+ ($(this).index() + 1));
    $('#slide_link_'+ ($(this).index() + 1)).trigger('click');
  });
  
  function tile() {
    var w = ($('.main_container').width()) / 3;
    var ptop = parseInt($('.main_container').css('padding-top'));
    var pleft = parseInt($('.main_container').css('padding-left'));
    var n = $('.category-container').length;
    var c = [ptop,ptop,ptop];
    
    $('.category-container').css('position', 'absolute');
    
    $('.category-container:nth-child(3n + 1)').css('left', pleft);
    
    $('.category-container:nth-child(3n + 2)').css('left', w + pleft);
    $('.category-container:nth-child(3n)').css('left', (w * 2) - 1 + pleft);
    for(var i = 1; i <= n; i++) {
      $('.category-container:nth-child(' + i + ')').css('top', c[(i - 1) % 3] );
       c[(i - 1) % 3] += $('.category-container:nth-child(' + i + ')').outerHeight(true);
    };
    $('.main_container').height(Math.max(c[0], c[1], c[2]));
  };
  
 // tile();
    
    




})();