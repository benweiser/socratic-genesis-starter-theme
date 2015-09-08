<?php

/**
 *
 * @category   Socratic
 * @package    Functions
 * @subpackage Functions
 * @author     Ben Weiser
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link       http://benweiser.com
 * @since      1.0
 */


/*
* Initialize
*/ 
require_once (get_stylesheet_directory() . '/lib/init.php');

add_action('genesis_setup', 'bw_theme_setup', 15);

/*
* Theme Set Up Function
*/
function bw_theme_setup() {
      
    /*
    * Custom Image Sizes
    */
    add_image_size('featured-image', 225, 160, TRUE);
    
    /*
    * Enable custom background
    */
    add_theme_support('custom-background');
    
    /* 
    * Add HTML5 markup structure
    */
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    
    /* 
     * Add support for structural wraps
     */
    add_theme_support('genesis-structural-wraps', array(
    'header',
    'subnav',
    'footer-widgets', 
    'footer'
    ));
    
    remove_action('genesis_after_header', 'genesis_do_nav');
    add_action('genesis_header_right', 'genesis_do_nav');
    
    /* 
    * Remove uneeded layouts 
    */
    genesis_unregister_layout('content-sidebar-sidebar');
    genesis_unregister_layout('sidebar-sidebar-content');
    genesis_unregister_layout('sidebar-content-sidebar');
    
    /*
     * Footer Widgets
     */
    add_theme_support('genesis-footer-widgets', 3);
    
    /*
     * Genesis Menus
     * Socratic comes with 2 navigation systems built-in ready.
     */
    
    add_theme_support('genesis-menus', 
    	array(
    	'primary' => __('Primary Navigation Menu', CHILD_DOMAIN), 
    	'secondary' => __('Secondary Navigation Menu', CHILD_DOMAIN),
    	));
    
    /*
    * Enqueue Scripts
    */
    add_action('wp_enqueue_scripts', 'bw_enqueue_scripts');
    
    
    /*
     * Register Sidebars
     */ 
    bw_register_sidebars();
    
    /*
     * Unregister SuperFish - Won't be needed in 2.0
     */ 
    
    add_action('wp_enqueue_scripts', 'bw_unregister_superfish');
    function bw_unregister_superfish() {
        wp_deregister_script('superfish');
        wp_deregister_script('superfish-args');
    }
} // End theme setup

/*
* Add Optional Top Bar Widget Area
*/
add_action('genesis_before', 'bw_top_bar');
function bw_top_bar() {
    genesis_widget_area('top-bar', array('before' => '<div class="top-bar widget-area"><div class="wrap">', 'after' => '</div></div>',));
}

/*
 * Register Sidebars
 */
function bw_register_sidebars() {
    $sidebars = array(
    	array(
	    	'id' => 'home-top', 
	    	'name' => __('Home Top', CHILD_DOMAIN), 
	    	'description' => __('This is the top homepage section.', CHILD_DOMAIN), 
	    	'before_title' => '<h2 class="widgettitle">', 
	    	'after_title' => '</h2>'), 

    	array(
    		'id' => 'home-middle-1', 
    		'name' => __('Home Middle 1', CHILD_DOMAIN), 
    		'description' => __('This is the homepage middle 1.', CHILD_DOMAIN), 
    		'before_title' => '<h3 class="widgettitle">', 
    		'after_title' => '</h3>'), 

    	array(
    		'id' => 'home-middle-2', 
    		'name' => __('Home Middle 2', CHILD_DOMAIN), 
    		'description' => __('This is the homepage middle 2.', CHILD_DOMAIN), 
    		'before_title' => '<h3 class="widgettitle">', 
    		'after_title' => '</h3>'), 

    	array(
    		'id' => 'home-middle-3', 
    		'name' => __('Home Middle 3', CHILD_DOMAIN), 
    		'description' => __('This is the homepage middle 3.', CHILD_DOMAIN), 
    		'before_title' => '<h3 class="widgettitle">', 
    		'after_title' => '</h3>'), 

    	array(
    		'id' => 'home-left', 
    		'name' => __('Home Left', CHILD_DOMAIN), 
    		'description' => __('This is the homepage left section.', CHILD_DOMAIN), 
    		'before_title' => '<h3 class="widgettitle">', 'after_title' => '</h3>'), 

    	array(
    		'id' => 'home-right', 
    		'name' => __('Home Right', CHILD_DOMAIN), 
    		'description' => __('This is the homepage right section.', CHILD_DOMAIN), 
    		'before_title' => '<h3 class="widgettitle">', 
    		'after_title' => '</h3>'), 

    	array(
    		'id' => 'home-bottom', 
    		'name' => __('Home Bottom', CHILD_DOMAIN), 
    		'description' => __('This is the homepage right section.', CHILD_DOMAIN),),);
    
    foreach ($sidebars as $sidebar) genesis_register_sidebar($sidebar);
}

/*
* Register Scripts - Twitter Bootstrap, Font-Awesome, etc..
*/

require_once ('lib/scripts.php');

add_theme_support('genesis-accessibility', 
	array('headings', 
		'drop-down-menu', 
		'search-form', 
		'skip-links', 
		'rems'
		));

/*
* Reponsive Viewport
*/

add_theme_support( 'genesis-responsive-viewport' );