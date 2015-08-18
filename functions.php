<?php

/**
 * Custom amendments for the theme.
 *
 * @category   Socratic
 * @package    Functions
 * @subpackage Functions
 * @author     Ben Weiser
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link       http://benweiser.com
 * @since      1.1
 */


//if ( is_admin() ) {
/** Customizer Options **/
//include_once( get_stylesheet_directory()  . '/lib/admin/s-customizer.php' );

/**Image Reloaded **/
//include_once( get_stylesheet_directory() .  '/lib/admin/s-customize-image-reloaded.php' );
//}

// Initialize
require_once( get_stylesheet_directory() . '/lib/init.php');





add_action( 'genesis_setup', 's_theme_setup', 15 );

//Theme Set Up Function
function s_theme_setup() {
	/** 
	 * 01 Set width of oEmbed
	 * genesis_content_width() will be applied; Filters the content width based on the user selected layout.
	 *
	 * @see genesis_content_width()
	 * @param integer $default Default width
	 * @param integer $small Small width
	 * @param integer $large Large width
	 */
	$content_width = apply_filters( 'content_width', 600, 430, 920 );
	
	//Custom Image Sizes
	add_image_size( 'featured-image', 225, 160, TRUE );
	add_image_size( 'card-image', 559, 160, TRUE );
	
	// Enable Custom Background
	add_theme_support( 'custom-background' );

	// Enable Custom Header
	//add_theme_support('genesis-custom-header');

	//* Add HTML5 markup structure
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );


	// Add support for structural wraps
	add_theme_support( 'genesis-structural-wraps', array(
		'header',
		'nav',
		'subnav',
	//	'inner',
		'footer-widgets',
		'footer'
	) );

	remove_action( 'genesis_after_header','genesis_do_nav' ) ;
 	add_action( 'genesis_header_right','genesis_do_nav' );

/* Remove layouts which are horrible for UX */
	genesis_unregister_layout( 'content-sidebar-sidebar' );
	genesis_unregister_layout( 'sidebar-sidebar-content' );
	genesis_unregister_layout( 'sidebar-content-sidebar' );
 	
	/**
	 * 07 Footer Widgets
	 * Add support for 3-column footer widgets
	 * Change 3 for support of up to 6 footer widgets (automatically styled for layout)
	 */
	add_theme_support( 'genesis-footer-widgets', 3 );

	/**
	 * 08 Genesis Menus
	 * Socratic comes with 2 navigation systems built-in ready.
	 * Delete any menu systems that you do not wish to use.
	 */
	add_theme_support(
		'genesis-menus', 
		array(
			'primary'   => __( 'Primary Navigation Menu', CHILD_DOMAIN ), 
			'secondary' => __( 'Secondary Navigation Menu', CHILD_DOMAIN ),
		)
	);
	
	/**
	 * 09 Woocommerce
	 * Uncomment and use with Genesis WooCommerce Connect
	 */
	
	add_theme_support( 'genesis-connect-woocommerce' );
	
	
	//Enqueue Sandbox Scripts
	add_action( 'wp_enqueue_scripts', 's_enqueue_scripts' );
	
	/**
	 * 13 Editor Styles
	 * Takes a stylesheet string or an array of stylesheets.
	 * Default: editor-style.css 
	 */
	//add_editor_style();
	
	
	// Register Sidebars
	s_register_sidebars();
	
	// Unregister SuperFish - Won't be needed in 2.0	
	add_action( 'wp_enqueue_scripts', 's_unregister_superfish' );
	function s_unregister_superfish() {
		wp_deregister_script( 'superfish' );
		wp_deregister_script( 'superfish-args' );
	}

} // End of Set Up Function



add_action('genesis_before', 'bw_hook_top_bar');
function bw_hook_top_bar(){
genesis_widget_area( 'top-bar', array(
			'before' => '<div class="top-bar widget-area"><div class="wrap">',
			'after' => '</div></div>',
	) );
}


// Register Sidebars
function s_register_sidebars() {
	$sidebars = array(
		array(
			'id'			=> 'home-top',
			'name'			=> __( 'Home Top', CHILD_DOMAIN ),
			'description'	=> __( 'This is the top homepage section.', CHILD_DOMAIN ),
			'before_title' => '<h2 class="widgettitle">',
        	'after_title' => '</h2>'

		),
		array(
			'id'			=> 'home-middle-1',
			'name'			=> __( 'Home Middle 1', CHILD_DOMAIN ),
			'description'	=> __( 'This is the homepage middle 1.', CHILD_DOMAIN ),
			'before_title' => '<h3 class="widgettitle">',
        	'after_title' => '</h3>'
		),
		array(
			'id'			=> 'home-middle-2',
			'name'			=> __( 'Home Middle 2', CHILD_DOMAIN ),
			'description'	=> __( 'This is the homepage middle 2.', CHILD_DOMAIN ),
			'before_title' => '<h3 class="widgettitle">',
        	'after_title' => '</h3>'
		),
		array(
			'id'			=> 'home-middle-3',
			'name'			=> __( 'Home Middle 3', CHILD_DOMAIN ),
			'description'	=> __( 'This is the homepage middle 3.', CHILD_DOMAIN ),
			'before_title' => '<h3 class="widgettitle">',
        	'after_title' => '</h3>'
		),
		array(
			'id'			=> 'home-left',
			'name'			=> __( 'Home Left', CHILD_DOMAIN ),
			'description'	=> __( 'This is the homepage left section.', CHILD_DOMAIN ),
			'before_title' => '<h3 class="widgettitle">',
        	'after_title' => '</h3>'
		),
		array(
			'id'			=> 'home-right',
			'name'			=> __( 'Home Right', CHILD_DOMAIN ),
			'description'	=> __( 'This is the homepage right section.', CHILD_DOMAIN ),
			'before_title' => '<h3 class="widgettitle">',
        	'after_title' => '</h3>'
		),
		array(
			'id'			=> 'home-bottom',
			'name'			=> __( 'Home Bottom', CHILD_DOMAIN ),
			'description'	=> __( 'This is the homepage right section.', CHILD_DOMAIN ),
		),
		array(
			'id'			=> 'portfolio',
			'name'			=> __( 'Portfolio', CHILD_DOMAIN ),
			'description'	=> __( 'This is the portfolio page template', CHILD_DOMAIN ),
		),
	);
	
	foreach ( $sidebars as $sidebar )
		genesis_register_sidebar( $sidebar );
}

/**
 * Enqueue and Register Scripts - Twitter Bootstrap, Font-Awesome, and Common.
 */
require_once('lib/scripts.php');

/**
 * Add navigation menu 
 * Required for each registered menu.
 * 
 * @uses s_navigation() Sandbox Navigation Helper Function in s-functions.php.
 */


add_theme_support( 'genesis-accessibility', 
  array( 'headings', 'drop-down-menu', 'search-form', 'skip-links', 'rems' ) 
);



	//* Remove default CSS
	//wp_dequeue_style( 'genesis-sample-theme' );

	//* Add compiled CSS
	//wp_register_style( 'genesis-sample-styles', get_stylesheet_directory_uri() . '/style' . $minnified . '.css', array(), CHILD_THEME_VERSION );
	//wp_enqueue_style( 'genesis-sample-styles' );

	//* Add compiled JS
	//wp_enqueue_script( 'genesis-sample-scripts', get_stylesheet_directory_uri() . '/js/project' . $minnified . '.js', array( 'jquery' ), CHILD_THEME_VERSION, true );



/**
 * Place a cart icon with number of items and total cost in the menu bar.
 *
 * Source: http://wordpress.org/plugins/woocommerce-menu-bar-cart/
 */
//add_filter('wp_nav_menu_items','sk_wcmenucart', 10, 2);
function sk_wcmenucart($menu, $args) {

	// Check if WooCommerce is active and add a new item to a menu assigned to Primary Navigation Menu location
	if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || 'primary' !== $args->theme_location )
		return $menu;

	ob_start();
		global $woocommerce;
		$viewing_cart = __('View your shopping cart', 'your-theme-slug');
		$start_shopping = __('Start shopping', 'your-theme-slug');
		$cart_url = $woocommerce->cart->get_cart_url();
		$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
		$cart_contents_count = $woocommerce->cart->cart_contents_count;
		$cart_contents = sprintf(_n('%d item', '%d items', $cart_contents_count, 'your-theme-slug'), $cart_contents_count);
		$cart_total = $woocommerce->cart->get_cart_total();
		// Uncomment the line below to hide nav menu cart item when there are no items in the cart
		// if ( $cart_contents_count > 0 ) {
			if ($cart_contents_count == 0) {
				$menu_item = '<li class="right"><a class="wcmenucart-contents" href="'. $shop_page_url .'" title="'. $start_shopping .'">';
			} else {
				$menu_item = '<li class="right"><a class="wcmenucart-contents" href="'. $cart_url .'" title="'. $viewing_cart .'">';
			}

			$menu_item .= '<i class="fa fa-shopping-cart"></i> ';

			$menu_item .= $cart_contents.' - '. $cart_total;
			$menu_item .= '</a></li>';
		// Uncomment the line below to hide nav menu cart item when there are no items in the cart
		// }
		echo $menu_item;
	$social = ob_get_clean();
	return $menu . $social;

}

