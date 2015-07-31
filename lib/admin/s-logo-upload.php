<?php 

function s_logo_uploader( $wp_customize ) {
    
    // Add the section to the theme customizer in WP
    $wp_customize->add_section( 's_logo_section' , array(
	    'title'       => __( 'Upload Logo', CHILD_DOMAIN ),
	    'priority'    => 30,
	    'description' => __( 'Upload your logo to the header of the site.', CHILD_DOMAIN ),
	) );

	// Register the new setting
	$wp_customize->add_setting( 's_logo', array(
		'default' 	=> get_stylesheet_directory_uri() .'/images/logo.png',
		'transport' => 'postMessage'
		)
	);

	// Tell WP to use an image uploader using WP_Customize_Image_Control
	$wp_customize->add_control( new S_Customize_Image_Reloaded_Control( $wp_customize, 's_logo', array(
	    'label'    => __( 'Logo', CHILD_DOMAIN ),
	    'section'  => 's_logo_section',
	    'settings' => 's_logo',
	) ) );

}

add_action('customize_register', 's_logo_uploader');



// Sanitize text 
function sanitize_text( $text ) {    
  return sanitize_text_field( $text );

}


// Custom js for theme customizer
function s_customizer_js() {
  wp_enqueue_script(
    's_theme_customizer',
    get_stylesheet_directory_uri() . 'lib/js/theme-customizer.js',
    array( 'jquery', 'customize-preview' ),
    '',
    true
  );
}

add_action( 'customize_preview_init', 's_customizer_js' );