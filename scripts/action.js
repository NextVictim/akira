jQuery(document).ready(function() {
  var windowh = jQuery(window).outerHeight();
  var navbarh = jQuery('.mm-navbar-top').outerHeight();
  var contentsh = jQuery('.mm-contents').outerHeight();
  var footerh = jQuery('.mm-footer').outerHeight();
  var alladdh = navbarh + contentsh + footerh;
  if(windowh >= alladdh){
    var diffh = windowh - alladdh;
    var addcontentsh = diffh + contentsh

    jQuery('.mm-contents').height(addcontentsh);
  }
});
