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