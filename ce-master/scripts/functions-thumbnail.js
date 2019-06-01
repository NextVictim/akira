function thumbnail_resize(elem){
  jQuery( elem ).each(function( index ) {
    var photo_width = jQuery(this).width();
    var photo_width2 = photo_width * 0.618;
    jQuery(this).height(photo_width2);
  });
}

function thumbnail_resize_square(elem){
  jQuery( elem ).each(function( index ) {
    var photo_width = jQuery(this).width();
    var photo_width2 = photo_width;
    jQuery(this).height(photo_width2);
  });
}
