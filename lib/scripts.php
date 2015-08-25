<?php

/**
 * Script Register and Enqueue
 *
 * @package      Socratic
 * @author       Ben Weiser
 * @copyright    Copyright (c) 2015 Ben Weiser
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since        1.0
 */

/*
Scripts
---------------------------------------------------------------------------------------------------- */
add_action('init', 'bw_register_scripts');

/**
 * Registers Appropriate Scripts and Styles when needed based on Debugging.
 * Assumes that the normal *.min.js/*.min.css is the minified version & *.js is beautified version.
 * To make the styles appear AFTER your base style, in the array(), place sanitize_title_with_dashes( CHILD_THEME_NAME )
 * so that: array( sanitize_title_with_dashes( CHILD_THEME_NAME ) )
 * e.g., wp_register_style( 's-twitter-bootstrap', CHILD_CSS . '/' . s_script_suffix( 'bootstrap', 'css' ), array( sanitize_title_with_dashes( CHILD_THEME_NAME ) ), '1.0.0' );
 *
 * @uses wp_enqueue_script() WP adds JS to page safely.
 * @uses s_script_suffix() Adds proper CSS/JS suffix based on WP_DEBUG or SCRIPT_DEBUG
 */
function bw_register_scripts() {
    
    /* Load theme's style.css last */
    remove_action('genesis_meta', 'genesis_load_stylesheet');
    add_action('wp_enqueue_scripts', 'genesis_enqueue_main_stylesheet', 45);
    
    /* Add Google Fonts */
    wp_register_style('google-fonts', '//fonts.googleapis.com/css?family=Open+Sans:300,400,700,900|Oswald:300|400|700|900', array());
    
    /**
     * Font Awesome
     * @link http://www.bootstrapcdn.com/?v=10292012225705
     * @link http://fontawesome.github.com/Font-Awesome/
     */
    
    wp_register_style('bw-font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css', array(), '4.0.3');
    
    /**
     * Pretty Photo
     * @link http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/
     * @link http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/documentation
     */
    wp_register_style('bw-pretty-photo', CHILD_CSS . '/' . bw_script_suffix('prettyPhoto', 'css'), array(), '3.1.4');
    wp_register_script('bw-pretty-photo', CHILD_JS . '/' . bw_script_suffix('jquery.prettyPhoto', 'js'), array('jquery'), '3.1.4');
    
    /** Common, site specific */
    wp_register_script('bw-dist', CHILD_JS . '/' . bw_script_suffix('dist'), array('jquery'), CHILD_THEME_VERSION, true);
}

/**
 * Enqueues Appropriate Scripts and Styles when needed based on Debugging.
 * Assumes that the normal *.min.js/*.min.css is the minified version & *.js is beautified version.
 *
 * @uses wp_enqueue_script() WP adds JS to page safely.
 */
function bw_enqueue_scripts() {
    
    wp_enqueue_style('google-fonts');
    wp_enqueue_style('bw-font-awesome');    
    wp_enqueue_style( 'bw-pretty-photo' );
    
    // Scripts
    wp_enqueue_script( 'bw-pretty-photo' );
    add_action( 'wp_footer', 'bw_init_pretty_photo' );
    
    // Localize Script
    /*
    // This enables you to create variable variables in JS that will be referred to as gs.greeting
    $l10n_args = array(
    //REFERENCE => VALUE, example in next line, CHILD_DOMAIN is the text domain for internationalization.
    'greeting'  => __( 'Hello World!', CHILD_DOMAIN ),
    );
    
    // @link http://codex.wordpress.org/Function_Reference/wp_localize_script
    // wp_localize_script( REGISTERED-HANDLE, OBJECT_NAME, OBJECT_DATA );
    wp_localize_script( 's-common-scripts', 'gs', $l10n_args );
    */
    wp_enqueue_script('bw-dist');
}

