<?php 

/**
 * Add footer scripts when another SEO plugin is active.
 *
 * @category   Socratic
 * @package    Functions
 * @subpackage Functions
 * @author     Ben Weiser
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link       http://benweiser.com
 * @since      1.0.0
 */

/** Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit( 'Cheatin&#8217; uh?' );

/**
 * Moves a function to a new hook
 *
 * @author Travis Smith
 * @since 1.1.0
 * @global array $wp_filter
 * @param string Function name.
 * @param string Hook to place function.
 * @param string Priority (defaults to 10).
 * @param string Number of accepted arguments (defaults to 2).
 */
function bw_move_function( $function, $newhook, $priority = 10, $args = 2 ) {
	s_remove_function( $function );
	add_action( $newhook, $function, $priority, $args );
}

/**
 * Removes a function hooked into somewhere
 *
 * @author Travis Smith
 * @since 1.1.0
 * @param string function name
 * @global array $wp_filter
 */
function bw_remove_function( $function ) {
    global $wp_filter;
 
    // Loop through all hooks (yes, stored under the $wp_filter global)
    foreach ( $wp_filter as $hook => $priority)  {
 
		// has_action returns int for the priority
		if ( $priority = has_action( $hook, $function ) ) {

		// If there's a function hooked in, remove the genesis_* function
			// from whichever hook we're looping through at the time.
			remove_action( $hook, $function, $priority );
		}
    }
}

/**
 * Replace genesis_* functions hooked into somewhere for s_* functions
 * of the same suffix, at the same hook and priority
 *
 * Run at get_header to catch all customisations in functions.php
 * 
 * @author Gary Jones
 *
 * @global array $wp_filter 
 * @param  array $functions Array of function names without genesis_ prefix. 
 */
function bw_replace_functions( $functions ) {
	
	global $wp_filter;

	// Loop through all hooks (yes, stored under the $wp_filter global)
	foreach ( $wp_filter as $hook => $priority)  {
		
		// Loop through our array of functions for each hook
		foreach( $functions as $function) {
			
			// has_action returns int for the priority
			if ( $priority = has_action( $hook, 'genesis_' . $function ) ) {
				
				// If there's a function hooked in, remove the genesis_* function 
				// from whichever hook we're looping through at the time.
				remove_action( $hook, 'genesis_' . $function, $priority );
				
				// Add a replacement function in at the same time.
				add_action( $hook, 's_' . $function, $priority );
			}
		}
	}
	
}



/**
 * Creates proper script/style suffix based on WP_DEBUG or SCRIPT_DEBUG.
 *
 * @see wp_default_scripts() for min/dev pattern.
 *
 * @param string $script Script filename basename.
 * @param string $suffix Script suffix: 'css' or 'js'
 * @param string $min Minimization abbreviation. Default = '.min'.
 * @param string $dev Development abbreviation. Default = ''.
 */
function bw_script_suffix( $script, $suffix = 'js', $min = '.min', $dev = '' ) {
	// Suffix Sanitization
	if ( 'js' != $suffix && 'css' != $suffix )
		$suffix = 'js';

	$script  = ( ( defined( 'WP_DEBUG' ) && WP_DEBUG ) || ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ) ? $script . "$dev.$suffix" : $script . "$min.$suffix";

	return $script;
}

add_action( 'admin_notices', 'bw_theme_files_to_edit' );
/**
 * Remove the specific theme files from the Theme Editor
 *
 * @since 1.1.0
 *
 * @global array $allowed_files Array of allowed files.
 * @global WP_Theme Object $theme Current Theme WP_Theme Object.
 * @global string $current_screen Reference to current screen.
 */
function bw_theme_files_to_edit() {

	global $allowed_files, $theme, $current_screen;

	/** Check to see if we are on the editor page */
	if ( 'theme-editor' == $current_screen->id ) {
		/** Do not change anything if we are in the Genesis theme */
		if ( $theme->Name == CHILD_THEME_NAME ) {
			/** Remove files */
			foreach ( array( 'lib/init.php', 'alt/functions-alt.php', 'alt/s-functions-alt.php', 'alt/init-alt.php', 'alt/init.php', 'languages/index.php', ) as $f )
				unset( $allowed_files[ $f ] );
		}
	}

}



/**
 * Instantiate Pretty Photo
 *
 * @param array $args Future Development
 */
function bw_init_pretty_photo( $args = array() ) { ?>
<script type="text/javascript" charset="utf-8">
  jQuery(document).ready(function($){
    $("a[href$='.jpg'], a[href$='.gif'], a[href$='.png'], .prettyPhoto").prettyPhoto();
  });
</script>
<?php
}



//add_action('genesis_before', 's_do_logo');
function bw_do_logo() {
	if ( genesis_get_option('blog_title') == 'image' && get_theme_mod( 's_logo' ) )
		remove_action( 'genesis_site_title', 'genesis_seo_site_title' );
		add_action( 'genesis_site_title', 'bw_replace_logo' );
}


function bw_replace_logo() {
	$s_get_logo = get_theme_mod( 's_logo' );
 	if ( genesis_get_option('blog_title') == 'image' && get_theme_mod( 's_logo' ) )
 		echo '<div class="site-logo"><a href="/"><img src="' . $s_get_logo .'"></a></div>';
}


if ( genesis_get_option('blog_title')  == 'image' ) {
add_filter( 'genesis_seo_title', 'bw_header_inline_logo', 10, 3 );
}

function bw_header_inline_logo( $title, $inside, $wrap ) {
	// remove site tagline
	remove_action('genesis_site_description', 'genesis_seo_site_description');

	if (get_theme_mod('s_logo') ) {
	$logo = '<img id="logo" src="' . get_theme_mod('s_logo') . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" title="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
	} else {
	$logo = '<img id ="logo" src="' . get_stylesheet_directory_uri() . '/images/logo.png" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" title="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
	}

	$inside = sprintf( '<a href="%s" title="%s">%s</a>', trailingslashit( home_url() ), esc_attr( get_bloginfo( 'name' ) ), $logo );

	//* Determine which wrapping tags to use - changed is_home to is_front_page to fix Genesis bug
	$wrap = is_front_page() && 'title' === genesis_get_seo_option( 'home_h1_on' ) ? 'h1' : 'p';

	//* A little fallback, in case an SEO plugin is active - changed is_home to is_front_page to fix Genesis bug
	$wrap = is_front_page() && ! genesis_get_seo_option( 'home_h1_on' ) ? 'h1' : $wrap;

	//* And finally, $wrap in h1 if HTML5 & semantic headings enabled
	$wrap = genesis_html5() && genesis_get_seo_option( 'semantic_headings' ) ? 'h1' : $wrap;

	return sprintf( '<%1$s %2$s>%3$s</%1$s>', $wrap, genesis_attr( 'site-title' ), $inside );


}

/** Reposition the breadcrumbs */
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
add_action( 'genesis_before_content', 'genesis_do_breadcrumbs' );

/** Svg support for media uploader  */
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


?>