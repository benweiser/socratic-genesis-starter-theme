<?php 

function s_logo_uploader( $wp_customize ) {
    
    // Add the section to the theme customizer in WP
    $wp_customize->add_section( 's_logo_section' , array(
	    'title'       => __( 'Upload Logo', CHILD_DOMAIN ),
	    'panel' 	  => 's_logo_panel',
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
	$wp_customize->add_control( new S_Customize_Image_Reloaded_Control( 
		$wp_customize, 
		's_logo', 
		array(
	    'label'    => __( 'Logo', CHILD_DOMAIN ),
	    'section'  => 's_logo_section',
	    'settings' => 's_logo',
			) 
		) 
	);


 // Create custom panels
  $wp_customize->add_panel( 's_logo_panel', array(
      'priority' => 10,
      'theme_supports' => '',
      'title' => __( 'Top Area', 'wptthemecustomizer' ),
      'description' => __( 'Controls the basic settings for the theme.', 'wptthemecustomizer' ),
  ) );

  echo '<div class="test" style="height:400px;width:400px;background:blue;position:absolute;right:0;top:0;"></div>';

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