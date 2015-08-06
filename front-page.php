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

        if ( is_active_sidebar( 'home-top' ) || is_active_sidebar( 'home-left' ) || is_active_sidebar( 'home-right' ) || is_active_sidebar( 'home-bottom' ) ) {

                remove_action( 'genesis_loop', 'genesis_do_loop' );
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
        

        genesis_widget_area( 
                'home-bottom', 
                array(
                        'before' => '<div id="home-bottom"><div class="home-widget widget-area">', 
                        'after' => '</div></div><!-- end #home-left -->',
                ) 
        );                              
}

add_action('genesis_after_header', 's_parallax_entry');
function s_parallax_entry(){
        ?>
        <section id="js-parallax-window" class="parallax-window">
        <div class="parallax-static-content">
            <h1>Stop worrying about hosting, search engines, landing pages, contact forms, eCommerce.</h1>
            <p>We remove the headache of building and maintaining your website and help you concentrate on using it to grow your business. Focus on what's important.</p>
            <p><strong>Generate leads. Make sales.         <?php echo genesis_get_option( 's_hours', 'child-settings' ); ?></strong></p>
            <p><strong>Our Phone number is <?php echo genesis_get_option( 's_phone', 'child-settings' ); ?></strong> and our fax number is <strong><?php echo genesis_get_option( 's_fax', 'child-settings' ); ?></strong></p>
            <a class="button" href="javascript:;">Get started</a>

        </div>
        <div id="js-parallax-background" class="parallax-background"></div>
    </section>
<?php
}

genesis();