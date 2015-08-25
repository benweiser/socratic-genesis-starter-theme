//************************************
// 
// Hides top bar when scrolling down and shows when scrolling up or not scrolling at all. For use with
// top bar widget area
// 
//************************************

jQuery(document).ready(function ($) {
// Hide Top bar on on scroll down
var didScroll;
var lastScrollTop = 0;
var delta = 5;
var topbarHeight = $('.top-bar').outerHeight();

$(window).scroll(function(event){
    didScroll = true;
});

setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 250);

function hasScrolled() {
    var st = $(this).scrollTop();
    

    if(Math.abs(lastScrollTop - st) <= delta)
        return;
    

    if (st > lastScrollTop && st > topbarHeight){
        // Scroll Down
     //   $('.top-bar').removeClass('bar-down').addClass('bar-up');
    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
     //       $('.top-bar').removeClass('bar-up').addClass('bar-down');
        }
    }
    
    lastScrollTop = st;
}


}); // end ready