"use strict";



var lastScrollTop = 0;
// element should be replaced with the actual target element on which you have applied scroll, use window in case of no target element.

var el = document.getElementById('map');

window.addEventListener("scroll", function(){ // or window.addEventListener("scroll"....
   var st = window.pageYOffset || document.documentElement.scrollTop; // Credits: "https://github.com/qeremy/so/blob/master/so.dom.js#L426"
   


   if (st > lastScrollTop){
      // downscroll code
    
      $('#georgia-travel-parallax').css("transform","translate(0px,"+st / 15+"%") 
   } else {
      // upscroll code
      
   }
   lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
}, false);



$( document ).ready(function(){
    $( ".city" ).hover( function(){ // задаем функцию при наведении курсора на элемент и при его отведении 
      $(this).find('.btn_city').toggleClass('active');
    });

    $('.place-plus').on('click', function(){
  $(this).parent().addClass('active');
})

$('.close').on('click', function(){
  $(this).parent().removeClass('active');
})
  });


