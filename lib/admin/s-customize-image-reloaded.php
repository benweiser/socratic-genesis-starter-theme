<?php 
global $wp_customize;
if ( isset( $wp_customize ) ) { 
  class S_Customize_Image_Reloaded_Control extends WP_Customize_Image_Control {
    /**
     * Constructor.
     *
     * @since 3.4.0
     * @uses WP_Customize_Image_Control::__construct()
     *
     * @param WP_Customize_Manager $manager
     */
    public function __construct( $manager, $id, $args = array() ) {
      parent::__construct( $manager, $id, $args );
    }
    
    /**
     * Search for images within the defined context
     */
    public function tab_uploaded() {
      $my_context_uploads = get_posts( array(
          'post_type'  => 'attachment',
          'meta_key'   => '_wp_attachment_context',
          'meta_value' => $this->context,
          'orderby'    => 'post_date',
          'nopaging'   => true,
      ) );
      ?>
    
      <div class="uploaded-target"></div>
      
      <?php
      if ( empty( $my_context_uploads ) )
          return;
      
      foreach ( (array) $my_context_uploads as $my_context_upload ) {
          $this->print_tab_image( esc_url_raw( $my_context_upload->guid ) );
      }
    }
  }  
}

?>