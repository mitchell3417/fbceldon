/* ========================================================================
 * Sticky Scroll
 * ======================================================================== */
jQuery(function() {
  jQuery('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = jQuery(this.hash);
      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        jQuery('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

/* ========================================================================
 * Sticky Header
 * ======================================================================== */
var mh = jQuery("#masthead");

jQuery(window).scroll(function() {
    if ( jQuery(this).scrollTop() > 20 ){
        mh.addClass("main-nav-scroll");
    } else {
        mh.removeClass("main-nav-scroll");
    }
});




// Navigation move out from right
mnuOut = false;

jQuery('.close-menu').click(function(){
    jQuery('#right-nav').animate({
      right: '-100%'
  },300);
    mnuOut = false;
});

jQuery('#menu-trigger').click(function(){
  if (mnuOut){
  		//Menu is visible, so HIDE menu
      jQuery('#right-nav').animate({
        right: '-100%'
    },300);
      mnuOut = false;
  }else{
  		//Menu is hidden, so SHOW menu
      jQuery('#right-nav').animate({
        right: 0
    },300);
      mnuOut = true;
  }
});
