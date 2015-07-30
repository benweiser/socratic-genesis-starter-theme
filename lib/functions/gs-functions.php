<?php 

/**
 * Add footer scripts when another SEO plugin is active.
 *
 * @category   Genesis_Sandbox
 * @package    Functions
 * @subpackage Functions
 * @author     Travis Smith
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link       http://wpsmith.net/
 * @since      1.0.0
 */

/** Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit( 'Cheatin&#8217; uh?' );

add_action( 'wp_footer', 'gs_footer_scripts' );
/**
 * Echo footer scripts in to wp_footer().
 *
 * Allows shortcodes.
 *
 * Applies genesis_header_scripts on value stored in header_scripts setting.
 *
 * Also echoes scripts from the post's custom field.
 *
 * @since 1.0.0
 *
 * @uses genesis_get_option() Get theme setting value
 * @uses genesis_get_custom_field() Echo custom field value
 */
function gs_footer_scripts() {

	/** If singular, echo scripts from custom field */
	if ( is_singular() && genesis_get_custom_field( '_genesis_footer_scripts' ) )
		genesis_custom_field( '_genesis_footer_scripts' );

}

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
function gs_move_function( $function, $newhook, $priority = 10, $args = 2 ) {
	gs_remove_function( $function );
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
function gs_remove_function( $function ) {
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
 * Replace genesis_* functions hooked into somewhere for gs_* functions
 * of the same suffix, at the same hook and priority
 *
 * Run at get_header to catch all customisations in functions.php
 * 
 * @author Gary Jones
 *
 * @global array $wp_filter 
 * @param  array $functions Array of function names without genesis_ prefix. 
 */
function gs_replace_functions( $functions ) {
	
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
				add_action( $hook, 'gs_' . $function, $priority );
			}
		}
	}
	
}

/**
 * Add navigation menu to the top.
 *
 * @since 1.0.0
 */
function gs_navigation( $location, $args ) {
	if ( ! has_nav_menu( $location ) )
		return;

	$defaults = array(
		'theme_location' => $location,
		'container_id'   => $location . '-nav',
		'menu_class'     => 'genesis-nav-menu menu menu-' . $location,
		'echo'           => false,
	);
	
	$args = wp_parse_args( $args, $defaults );
	$nav = wp_nav_menu( $args );
	
	$nav_output = sprintf(
		'<div id="%1$s">%3$s%2$s%4$s</div>', 
		$location . '-nav', 
		$nav, 
		genesis_structural_wrap( 'nav', 'open', 0 ), 
		genesis_structural_wrap( 'nav', 'close', 0 ) 
	);
		
	return $nav_output;
}

add_action( 'after_setup_theme', 'gs_responsive', 5 );
/**
 * Create Responsive Functions.
 * Genesis 2.0 will have something different yet similiar.
 */
function gs_responsive() {

	if ( current_theme_supports( 'gs-responsive' ) ) {
		//add_action( 'wp_head', 'genesis_responsive_viewport' );
		
		/** Roll our own due to genesis_responsive_viewport() possible changes */
		add_action( 'wp_head', 'gs_responsive_viewport' );
		add_action( 'wp_enqueue_scripts', 'gs_enqueue_responsive_stylesheet' );
	}
}

/**
 * If child theme supports responsive, look for and enqueue responsive.css.
 *
 * File (responsive.css) can be located either in the root theme directory, or in a /css subdirectory.
 *
 * @since 1.9.0
 */
function gs_enqueue_responsive_stylesheet() {

	$stylesheet = genesis_get_theme_support_arg( 'gs-responsive', 'css' );

	if ( ! $stylesheet )
		return;

	$handle = defined( 'CHILD_THEME_NAME' ) && CHILD_THEME_NAME ? sanitize_title( CHILD_THEME_NAME, 'child-theme' ) . '-responsive' : 'child-theme-responsive';

	if ( file_exists( $stylesheet['dir'] ) ) {
		$version = defined( 'CHILD_THEME_VERSION' ) && CHILD_THEME_VERSION ? CHILD_THEME_VERSION : PARENT_THEME_VERSION;
		$deps    = defined( 'CHILD_THEME_NAME' ) && CHILD_THEME_NAME ? sanitize_title_with_dashes( CHILD_THEME_NAME ) : 'child-theme';
		wp_enqueue_style( $handle, $stylesheet['src'], array( $deps ), $version );
		return;
	}

}

add_action( 'wp_head', 'gs_responsive_viewport' );
/**
 * Checks to see if the child theme supports Genesis responsive CSS viewport tag. If so, it echos it.
 *
 * @since 1.9.0
 */
function gs_responsive_viewport() {

	if ( true === $viewport = genesis_get_theme_support_arg( 'gs-responsive', 'viewport' ) )
		echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
	elseif ( $viewport = genesis_get_theme_support_arg( 'gs-responsive', 'viewport' ) )
		echo $viewport;

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
function gs_script_suffix( $script, $suffix = 'js', $min = '.min', $dev = '' ) {
	// Suffix Sanitization
	if ( 'js' != $suffix && 'css' != $suffix )
		$suffix = 'js';

	$script  = ( ( defined( 'WP_DEBUG' ) && WP_DEBUG ) || ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ) ? $script . "$dev.$suffix" : $script . "$min.$suffix";

	return $script;
}

add_action( 'admin_notices', 'gs_theme_files_to_edit' );
/**
 * Remove the specific theme files from the Theme Editor
 *
 * @since 1.1.0
 *
 * @global array $allowed_files Array of allowed files.
 * @global WP_Theme Object $theme Current Theme WP_Theme Object.
 * @global string $current_screen Reference to current screen.
 */
function gs_theme_files_to_edit() {

	global $allowed_files, $theme, $current_screen;

	/** Check to see if we are on the editor page */
	if ( 'theme-editor' == $current_screen->id ) {
		/** Do not change anything if we are in the Genesis theme */
		if ( $theme->Name == CHILD_THEME_NAME ) {
			/** Remove files */
			foreach ( array( 'lib/init.php', 'alt/functions-alt.php', 'alt/gs-functions-alt.php', 'alt/init-alt.php', 'alt/init.php', 'languages/index.php', ) as $f )
				unset( $allowed_files[ $f ] );
		}
	}

}

/*
 * Usage for a custom post type named 'movies':
 * unregister_post_type( 'movies' );
 *
 * Usage for the built in 'post' post type:
 * unregister_post_type( 'post', 'edit.php' );
 *
 * To be used on admin_menu hook.
*/
function gs_unregister_post_type( $post_type, $slug = '' ){
	
	global $wp_post_types;
	
	if ( isset( $wp_post_types[ $post_type ] ) ) {
            unset( $wp_post_types[ $post_type ] );
        	
            $slug = ( !$slug ) ? 'edit.php?post_type=' . $post_type : $slug;
            remove_menu_page( $slug );
	}
}


/**
 * Instantiate Pretty Photo
 *
 * @param array $args Future Development
 */
function gs_init_pretty_photo( $args = array() ) { ?>
<script type="text/javascript" charset="utf-8">
  jQuery(document).ready(function($){
    $("a[href$='.jpg'], a[href$='.gif'], a[href$='.png'], .prettyPhoto").prettyPhoto();
  });
</script>
<?php
}

/*
Add Custom Footer Output
---------------------------------------------------------------------------------------------------- */
/**
 * Custom Footer based on options
 *
 * @uses CHILD_SETTINGS_FIELD
 * @uses genesis_get_option()
 * @uses wpautop()
 * @uses gs_footer_navigation()
 */
function gs_do_footer() {
	$pattern = '<div class="one-half%1$s" id="footer-%2$s">%3$s</div>';
	if ( ! genesis_get_option( 'footer_left_nav', CHILD_SETTINGS_FIELD ) )
		printf( $pattern, ' first', 'left', wpautop( genesis_get_option( 'footer_left', CHILD_SETTINGS_FIELD ) ) );
	else
		printf( $pattern, ' first', 'left', gs_footer_navigation() );
	
	if ( ! genesis_get_option( 'footer_right_nav', CHILD_SETTINGS_FIELD) )
		printf( $pattern, '', 'right', wpautop( genesis_get_option( 'footer_right', CHILD_SETTINGS_FIELD ) ) );
	else
		printf( $pattern, '', 'right', gs_footer_navigation() );
}


/**
 * Add Genesis Sandbox Responsive Styles
 * Roll own responsive functions
 * @uses gs_script_suffix() Adds proper CSS/JS suffix based on WP_DEBUG or WP_SCRIPT_DEBUG.
 */
add_theme_support(
	'gs-responsive', 
	array(
		'css'      => array(
			'src' => CHILD_CSS . '/' . gs_script_suffix( 'responsive', 'css' ), 
			'dir' => CHILD_CSS_DIR . '/' . gs_script_suffix( 'responsive', 'css' ), 
		),
		/** 
		 * Default: <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
		 * To over-ride just enter your meta tag instead of true.
		 */
		'viewport' => true,
	)
);

/**
 * Add Logo to header
 */


add_action('genesis_before', 'gs_do_logo');
function gs_do_logo() {
	if ( genesis_get_option('blog_title') == 'image' && get_theme_mod( 'gs_logo' ) )
		remove_action( 'genesis_site_title', 'genesis_seo_site_title' );
		add_action( 'genesis_site_title', 'gs_replace_logo' );
}


function gs_replace_logo() {
	$gs_get_logo = get_theme_mod( 'gs_logo' );
 	if ( genesis_get_option('blog_title') == 'image' && get_theme_mod( 'gs_logo' ) )
 		echo '<div class="site-logo"><a href="/"><img src="' . $gs_get_logo .'"></a></div>';
}
