jQuery(document).ready(function() {
  var window_w = jQuery(window).width();
  if(window_w >= 1080){
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 3,
      spaceBetween: 30,
      loop: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      }
    });
  }
  else{
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      }
    });
  }

  jQuery('.sizing-thumb').each(function(index, element){
    var vw_thumbnail = jQuery(element).width();
    var vw_thumbnail2 = vw_thumbnail * 0.618;
    jQuery(element).height(vw_thumbnail2);
  });

  jQuery('.sizing-thumb-shift').each(function(index, element){
    var vw_thumbnail = jQuery(element).width();
    var vw_thumbnail2 = vw_thumbnail * 0.5;
    jQuery(element).height(vw_thumbnail2);
  });
});
