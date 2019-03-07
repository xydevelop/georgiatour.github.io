$('.slider-nav a').on('click',function(e) {
  e.preventDefault();
  let parent = $(this).closest('.slider');
  let slider = parent.find('.slick-slider')
  let nav = $(this).parent();
  let navCurrent = $(this).parent().find('.current');
  if( $(this).hasClass('prev') ) {
    slider.slick('slickPrev')
    navCurrent.text('0'+(slider.slick('slickCurrentSlide')+1));
  } else {
    slider.slick('slickNext');
    navCurrent.text('0'+(slider.slick('slickCurrentSlide')+1));
  }
})


$('.menu li a').on('click', function(e) {
    e.preventDefault();
    let id = $(this).attr('href');
    let section_top = $(id).offset().top;
    $('html, body').animate({
        scrollTop: section_top
    }, 'swing');
});

$('[js-p-slider]').slick({
  slidesToShow:5,
  slidesToScroll:1,
  arrows:false,
  responsive: [
   {
      breakpoint: 1199,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        fade:true
      },
      breakpoint: 576,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        fade:true
      },
    }
  ]
})

$('[js-near-slider]').slick({
  slidesToShow:1,
  slidesToScroll:1,
  arrows:false,
  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        fade:true
      },
      breakpoint: 576,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        fade:true
      },
    }
  ]
})

$('.gallery-slider').slick({
  slidesToShow:1,
  slidesToScroll:1,
  arrows: false
});

$('#albums .list .item').on('click',function(e){
 e.preventDefault();
    var gal = $(this).attr('gal-id');


    if( gal !== undefined){
      jQuery('#modal-wrapper .modal-gallery').css('display','none');

     jQuery('#modal-wrapper').fadeIn().css('display','flex');
     jQuery('#modal-wrapper .modal-gallery[gall-id="'+gal+'"]').fadeIn().css('display','flex');
       jQuery('.gallery-slider').slick('unslick');
       jQuery('#modal-wrapper .modal-gallery[gall-id="'+gal+'"]').find('.gallery-slider').slick({arrows: false});
    $(window).resize();
    }

    
})

/* TABS */
   $('#near_events .item .sub-item').on('click',function(e){
      e.preventDefault();
      var tab_index = parseInt($(this).attr('month'));

      $('#list-events .item').removeClass('cur');
      $('#list-events .item[month="'+tab_index+'"]').addClass('cur');

      /*var parent = $(this).closest('.section__tabs');


   
      $('.section__tabs .tabs a').removeClass('active');
      $(this).addClass('active');
   
      $(parent).find('.tab-content .item').removeClass('active');
      $(parent).find('.tab-content .item:eq('+tab_index+')').addClass('active');*/

   });





   $('#modal-wrapper .modal-close').on('click',function(e){
     e.preventDefault();
     jQuery('#modal-wrapper').fadeOut();
   })