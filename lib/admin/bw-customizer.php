<?php



function s_register_theme_customizer( $wp_customize ) {

//var_dump($wp_customize);


// Add Custom Logo Settings
  $wp_customize->add_section( 'custom_logo' , array(
    'title'      => __('Change Your Logo','wptthemecustomizer'), 
    'priority'   => 20    
  ) );  

  $wp_customize->add_setting(
      's_logo',
      array(
          'default'         => get_stylesheet_directory_uri() . '/images/logo.png',
          'transport'       => 'postMessage'
      )
  );
  $wp_customize->add_control(
       new S_Customize_Image_Reloaded_Control(
           $wp_customize,
           'custom_logo',
           array(
               'label'      => __( 'Change Logo', 'Socratic' ),
               'section'    => 'custom_logo',
               'settings'   => 's_logo',
               'context'    => 's-custom-logo' 
           )
       )
   ); 


}

add_action( 'customize_register', 's_register_theme_customizer' );

// Sanitize text 
function sanitize_text( $text ) {    
  return sanitize_text_field( $text );

}


// Custom js for theme customizer
function s_customizer_js() {
  wp_enqueue_script(
    'wpt_theme_customizer',
    get_stylesheet_directory_uri() . 'admin/js/theme-customizer.js',
    array( 'jquery', 'customize-preview' ),
    '',
    true
  );
}

add_action( 'customize_preview_init', 's_customizer_js' );


?>