jQuery(document).ready(function ($) {
    $("ul.menu-mobile").before('<div id="primary-menu-toggle" class="menu-toggle primary"><button class="toggle-switch show" href="#" role="button" aria-pressed="false"><span>Show Menu</span><i class="fa fa-bars"></i></button></div>');
    $( 'ul.menu-mobile .sub-menu' ).before( '<button class="sub-menu-toggle" role="button" aria-pressed="false"></button>' ); // Add toggles to sub menus

    $(".menu-toggle, .sub-menu-toggle").on('click', function () {
        var $this = $( this );
        $this.attr( 'aria-pressed', function( index, value ) {
            return 'false' === value ? 'true' : 'false';

        if ($(".menu-mobile").is(":hidden")) {
            $(".menu-mobile").slideDown(500);
            $(this).attr("class", "toggle-switch hide").attr("title", "Hide Menu");
            $("#primary-menu-toggle span").replaceWith("<span>Hide Menu</span>")
        } else {
            $(".menu-mobile").hide(500);
            $(this).attr("class", "toggle-switch show").attr("title", "Show Menu");
            $("#primary-menu-toggle span").replaceWith("<span>Show Menu</span>")
        }
    });
        });
    $this.toggleClass( 'activated' ).next( '.menu-toggle, .sub-menu' ).slideToggle( 'fast' );

}); 


    jQuery(".scroll, .gototop a").click(function (e) {
        e.preventDefault();
        jQuery("html,body").animate({
            scrollTop: jQuery(this.hash).offset().top
        }, 500)
    });

/*
( function( window, $, undefined ) {
    'use strict';

    $( '#mobile-nav' ).before( '<button class="menu-toggle" role="button" aria-pressed="false"></button>' ); // Add toggles to menus
    $( 'ul.menu-mobile .sub-menu' ).before( '<button class="sub-menu-toggle" role="button" aria-pressed="false"></button>' ); // Add toggles to sub menus

    // Show/hide the navigation
    $( '.menu-toggle, .sub-menu-toggle' ).on( 'click', function() {
        var $this = $( this );
        $this.attr( 'aria-pressed', function( index, value ) {
            return 'false' === value ? 'true' : 'false';
        });

        $this.toggleClass( 'activated' ).next( 'nav, .sub-menu' ).slideToggle( 'fast' );

    });

})( this, jQuery );
*/