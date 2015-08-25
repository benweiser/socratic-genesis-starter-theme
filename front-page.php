<?php

/**
 * Home Page.
 *
 * @category   Genesis_Sandbox
 * @package    Templates
 * @subpackage Home
 * @author     Travis Smith and Jonathan Perez, for Surefire Themes
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link       http://wpsmith.net/
 * @since      1.1.0
 */

add_action( 'get_header', 's_home_helper' );
/**
 * Add widget support for homepage. If no widgets active, display the default loop.
 *
 */
function s_home_helper() {
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        if ( is_active_sidebar( 'home-top' ) || is_active_sidebar( 'home-left' ) || is_active_sidebar( 'home-right' ) 
            || is_active_sidebar( 'home-bottom' ) || is_plugin_active( 'bw-core-functionality/plugin.php' ) )  {

                remove_action( 'genesis_loop', 'genesis_do_loop' );
                add_filter( 'genesis_markup_site-inner', '__return_null' );
                add_filter( 'genesis_markup_content-sidebar-wrap_output', '__return_false' );
                add_filter( 'genesis_markup_content', '__return_null' );
                add_action( 'genesis_loop', 's_home_widgets' );
                
                /** Force Full Width */
                add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
                add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );
                
        }
}



/**
 * Add widget support for homepage. If no widgets active, display the default loop.
 *
 */
function s_home_widgets() {

        genesis_widget_area(
                'home-top', 
                array( 
                        'before' => '<div id="home-top" class="home-widget widget-area">',
                        'after'  => '</div><!-- end #home-top -->',
                ) 
        );

        if (is_active_sidebar('home-middle-1') || is_active_sidebar('home-middle-2') || is_active_sidebar('home-middle-3') ) {
        echo '<div id="home-middle" class="home-panel">';

             genesis_widget_area( 
                'home-middle-1', 
                array(
                        'before' => '<div id="home-middle-1"><div class="home-widget widget-area">', 
                        'after' => '</div></div><!-- end #home-middle-1 -->',
                ) 
        );
     genesis_widget_area( 
                'home-middle-2', 
                array(
                        'before' => '<div id="home-middle-2"><div class="home-widget widget-area">', 
                        'after' => '</div></div><!-- end #home-middle-2 -->',
                ) 
        );
     genesis_widget_area( 
                'home-middle-3', 
                array(
                        'before' => '<div id="home-middle-3"><div class="home-widget widget-area">', 
                        'after' => '</div></div><!-- end #home-middle-3 -->',
                ) 
        );


        echo '</div>';

        }
        
        if (is_active_sidebar('home-left') || is_active_sidebar('home-right')) {
        echo '<div id="home-middle" class="home-panel">';
        genesis_widget_area( 
                'home-left', 
                array(
                        'before' => '<div id="home-left"><div class="home-widget widget-area">', 
                        'after' => '</div></div><!-- end #home-left -->',
                ) 
        );
        
        genesis_widget_area( 
                'home-right', 
                array(
                        'before' => '<div id="home-right"><div class="home-widget widget-area">', 
                        'after' => '</div></div><!-- end #home-right -->',
                ) 
        );
        echo '</div>';
        }
        

        genesis_widget_area( 
                'home-bottom', 
                array(
                        'before' => '<div id="home-bottom"><div class="home-widget widget-area">', 
                        'after' => '</div></div><!-- end #home-left -->',
                ) 
        );                              
}



genesis();