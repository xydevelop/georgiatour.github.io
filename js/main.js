"use strict";

$(window).scroll(function(e) {
  var scrollVar = $($this).scrollTop();
  console.log(111);
  $('#georgia-travel-parallax').css("transform","translate(0px,"+scrollVar / 2+"%")
})

