<?php

/**
 * Init File
 *
 * This file defines the Child Theme's constants & tells WP not to update.
 *
 * @category   Socratic
 * @package    Admin
 * @subpackage Init
 * @author     Ben Weiser
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link       http://benweiser.com/
 * @since      1.0
 */

/** Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit( 'Cheatin&#8217; uh?' );

add_action( 'genesis_init', 'bw_constants', 15 );
/**
 * This function defines the Genesis Child theme constants
 *
 * Data Constants: CHILD_SETTINs_FIELD, CHILD_DOMAIN, CHILD_THEME_VERSION
 * CHILD_THEME_NAME, CHILD_THEME_URL, CHILD_DEVELOPER, CHILD_DEVELOPER_URL
 * Directories: CHILD_LIB_DIR, CHILD_IMAGES_DIR, CHILD_ADMIN_DIR, CHILD_JS_DIR, CHILD_CSS_DIR
 * URLs: CHILD_LIB, CHILD_IMAGES, CHILD_ADMIN, CHILD_JS, CHILD_CSS
 *
 * @since 1.1.0
 */
function bw_constants() {
	$theme = wp_get_theme();
	
	// Child theme (Change but do not remove)
		/** @type constant Child Theme Options/Settings. */
		define( 'CHILD_SETTINs_FIELD', $theme->get('TextDomain') . '-settings' );
		
		/** @type constant Text Domain. */
		define( 'CHILD_DOMAIN', $theme->get('TextDomain') );
		
		/** @type constant Child Theme Version. */
		define( 'CHILD_THEME_VERSION', $theme->Version );
		
		
	
	// Define Directory Location Constants
		/** @type constant Child Theme Library/Includes URL Location. */
		define( 'CHILD_LIB_DIR',    CHILD_DIR . '/lib' );
		
		/** @type constant Child Theme Images URL Location. */
		define( 'CHILD_IMAGES_DIR', CHILD_DIR . '/images' );
		
		/** @type constant Child Theme Admin URL Location. */
		define( 'CHILD_ADMIN_DIR',  CHILD_LIB_DIR . '/admin' );
		
		/** @type constant Child Theme JS URL Location. */
		define( 'CHILD_JS_DIR',     CHILD_DIR .'/js' );
		
		/** @type constant Child Theme JS URL Location. */
		define( 'CHILD_CSS_DIR',    CHILD_DIR .'/css' );
	
	// Define URL Location Constants
		/** @type constant Child Theme Library/Includes URL Location. */
		define( 'CHILD_LIB',    CHILD_URL . '/lib' );
		
		/** @type constant Child Theme Images URL Location. */
		define( 'CHILD_IMAGES', CHILD_URL . '/images' );
		
		/** @type constant Child Theme Admin URL Location. */
		define( 'CHILD_ADMIN',  CHILD_LIB . '/admin' );
		
		/** @type constant Child Theme JS URL Location. */
		define( 'CHILD_JS',     CHILD_URL .'/js' );
		
		/** @type constant Child Theme JS URL Location. */
		define( 'CHILD_CSS',    CHILD_URL .'/css' );	
}

add_action( 'genesis_init', 'bw_init', 15 );
/**
 * This function calls necessary child theme files
 *
 * @since 1.1.0
 */
function bw_init() {
		
	/** Theme Specific Functions */
	include_once( CHILD_LIB_DIR . '/functions/bw-functions.php' );	
	
	// Load admin files when necessary
	if ( is_admin() ) {

		// Admin files here
		
		
	}

		/** Customizer Options 
		Must be outside is_admin check because the Customizer displays a theme page**/
		include_once( CHILD_LIB_DIR . '/admin/bw-customizer.php' );

		/**Image Reloaded **/
		include_once( CHILD_LIB_DIR . '/admin/bw-customize-image-reloaded.php' );

	genesis_register_sidebar( array(
	'id'            => 'top-bar',
	'name'          => __( 'Top Bar', CHILD_DOMAIN ),
	'description'   => __( 'This is a widget area that is the top bar', CHILD_DOMAIN ),
	) );

}

add_filter( 'http_request_args', 'bw_prevent_theme_update', 5, 2 );
/**
 * Don't update theme from .org repo.
 *
 * If there is a theme in the repo with the same name,
 * this prevents WP from prompting an update. Future proofs themes.
 *
 * @since 1.1.0
 *
 * @author Mark Jaquith
 * @link   http://markjaquith.wordpress.com/2009/12/14/excluding-your-plugin-or-theme-from-update-checks/
 */
function bw_prevent_theme_update( $r, $url ) {
	if ( 0 !== strpos( $url, 'http://api.wordpress.org/themes/update-check' ) )
		return $r; // Not a theme update request. Bail immediately.
	$themes = unserialize( $r['body']['themes'] );
	unset( $themes[ get_option( 'template' ) ] );
	unset( $themes[ get_option( 'stylesheet' ) ] );
	$r['body']['themes'] = serialize( $themes );
	return $r;
}

