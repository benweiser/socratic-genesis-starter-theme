//************************************
// 
// Mobile Menu
// 
//************************************


jQuery( document ).ready(function($) {
 //   $( '.nav-primary' ).before( '<button class="menu-toggle" role="button" aria-pressed="false"></button>' ); // Add toggles to menus
    $( '.nav-primary' ).before( '<div class="menu-toggle nav-icon4"><span></span><span></span><span></span></div>' ); // Add toggles to menus
    $( '.nav-secondary' ).before( '<button class="menu-toggle menu-secondary" role="button" aria-pressed="false"></button>' ); // Add toggles to menus
    $( 'nav .sub-menu' ).before( '<button class="sub-menu-toggle" role="button" aria-pressed="false"></button>' ); // Add toggles to sub menus

    // Show/hide the navigation
    $( '.menu-toggle, .sub-menu-toggle' ).on( 'click', function() {
        var $this = $( this );
        $this.attr( 'aria-pressed', function( index, value ) {
            return 'false' === value ? 'true' : 'false';
        });

        $this.toggleClass( 'activated' );
        $this.toggleClass('open');
        $this.next( 'nav, .sub-menu' ).slideToggle( 'fast' );

    }); 
}); 
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
        $('.top-bar').removeClass('bar-down').addClass('bar-up');
    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
        $('.top-bar').removeClass('bar-up').addClass('bar-down');
        }
    }
    
    lastScrollTop = st;
}
}); // end ready


// Why? Because we want some semblance on hover behavior on mobile
document.body.addEventListener('touchstart',function(){},false);
