<?php
/**
 * Theme Settings.
 * Requires Genesis 1.8 or later
 *
 * This file registers all of this child theme's 
 * specific Theme Settings, accessible from
 * Genesis > Contact Details
 *
 * @category   Socratic
 * @package    Admin
 * @subpackage Settings
 * @author     Ben Weiser
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link       http://benweiser.com
 * @since      1.1.0
 */

/** Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit( 'Cheatin&#8217; uh?' );
 

class S_Settings extends Genesis_Admin_Boxes {
	
	/**
	 * Create an admin menu item and settings page.
	 * 
	 * @since 1.0.0
	 */
	function __construct() {
		
		// Specify a unique page ID. 
		$page_id = 'child';
		
		// Set it as a child to genesis, and define the menu and page titles
		$menu_ops = array(
			'submenu' => array(
				'parent_slug' => 'genesis',
				'page_title'  => 'Genesis - Child Theme Settings',
				'menu_title'  => 'Child Theme Settings',
			)
		);
		
		// Set up page options. These are optional, so only uncomment if you want to change the defaults
		$page_ops = array(
		//	'screen_icon'       => 'options-general',
		//	'save_button_text'  => 'Save Settings',
		//	'reset_button_text' => 'Reset Settings',
		//	'save_notice_text'  => 'Settings saved.',
		//	'reset_notice_text' => 'Settings reset.',
		);		
		
		// Give it a unique settings field. 
		// You'll access them from genesis_get_option( 'option_name', 'child-settings' );
		$settings_field = 'child-settings';
		
		// Set the default values
		$default_settings = array(
			's_phone'   => '',
			's_dayweek' => 'Monday - Friday',
			's_hours'	=> '9am - 5pm',
		);
		
		// Create the Admin Page
		$this->create( $page_id, $menu_ops, $page_ops, $settings_field, $default_settings );
		// Initialize the Sanitization Filter
		add_action( 'genesis_settings_sanitizer_init', array( $this, 'sanitization_filters' ) );
			
	}
	/** 
	 * Set up Sanitization Filters
	 *
	 * See /lib/classes/sanitization.php for all available filters.
	 *
	 * @since 1.0.0
	 */	
	function sanitization_filters() {
		
		genesis_add_option_filter( 'no_html', $this->settings_field,
			array(
				's_phone',
				's_alt_phone',
				's_fax',
				's_street',
				's_suite',
				's_city',
				's_state',
				's_zip',
				's_country',
				's_hours',
				's_daysweek',


			) );
	}
	
	/**
	 * Set up Help Tab
	 * Genesis automatically looks for a help() function, and if provided uses it for the help tabs
	 * @link http://wpdevel.wordpress.com/2011/12/06/help-and-screen-api-changes-in-3-3/
	 *
	 * @since 1.0.0
	 */
	 function help() {
	 	$screen = get_current_screen();
		$screen->add_help_tab( array(
			'id'      => 'sample-help', 
			'title'   => 'Sample Help',
			'content' => '<p>Help content goes here.</p>',
		) );
	 }
	
	/**
	 * Register metaboxes on Child Theme Settings page
	 *
	 * @since 1.0.0
	 *
	 * @see Child_Theme_Settings::contact_information() Callback for contact information
	 */
	function metaboxes() {
		
		add_meta_box('contact-information', 'Contact Information', array( $this, 'contact_information' ), $this->pagehook, 'main', 'high');
		
	}
	
	/**
	 * Callback for Contact Information metabox
	 *
	 * @since 1.0.0
	 *
	 * @see Child_Theme_Settings::metaboxes()
	 */
	function contact_information() {
		
		echo '<p>Phone Number:<br />';
		echo '<input type="text" name="' . $this->get_field_name( 's_phone' ) . '" id="' . $this->get_field_id( 's_phone' ) . '" value="' . esc_attr( $this->get_field_value( 's_phone' ) ) . '" size="50" />';
		echo '</p>';

		echo '<p>Secondary Phone Number:<br />';
		echo '<input type="text" name="' . $this->get_field_name( 's_alt_phone' ) . '" id="' . $this->get_field_id( 's_alt_phone' ) . '" value="' . esc_attr( $this->get_field_value( 's_alt_phone' ) ) . '" size="50" />';
		echo '</p>';

	
		echo '<p>Fax Number:<br />';
		echo '<input type="text" name="' . $this->get_field_name( 's_fax' ) . '" id="' . $this->get_field_id( 's_fax' ) . '" value="' . esc_attr( $this->get_field_value( 's_fax' ) ) . '" size="50" />';
		echo '</p>';

		echo '<p>Street Address:<br />';
		echo '<input type="text" name="' . $this->get_field_name( 's_street' ) . '" id="' . $this->get_field_id( 's_street' ) . '" value="' . esc_attr( $this->get_field_value( 's_street' ) ) . '" size="50" />';
		echo '</p>';

		echo '<p>Suite #:<br />';
		echo '<input type="text" name="' . $this->get_field_name( 's_suite' ) . '" id="' . $this->get_field_id( 's_suite' ) . '" value="' . esc_attr( $this->get_field_value( 's_suite' ) ) . '" size="50" />';
		echo '</p>';


		echo '<p>City:<br />';
		echo '<input type="text" name="' . $this->get_field_name( 's_city' ) . '" id="' . $this->get_field_id( 's_city' ) . '" value="' . esc_attr( $this->get_field_value( 's_city' ) ) . '" size="50" />';
		echo '</p>';



		echo '<p>State Or Province:<br />';
		echo '<input type="text" name="' . $this->get_field_name( 's_state' ) . '" id="' . $this->get_field_id( 's_state' ) . '" value="' . esc_attr( $this->get_field_value( 's_state' ) ) . '" size="50" />';
		echo '</p>';

		echo '<p>Zip:<br />';
		echo '<input type="text" name="' . $this->get_field_name( 's_zip' ) . '" id="' . $this->get_field_id( 's_zip' ) . '" value="' . esc_attr( $this->get_field_value( 's_zip' ) ) . '" size="50" maxlength="5"/>';
		echo '</p>';


		echo '<p>Hours Of Operation:<br />';
		echo '<input type="text" name="' . $this->get_field_name( 's_hours' ) . '" id="' . $this->get_field_id( 's_hours' ) . '" value="' . esc_attr( $this->get_field_value( 's_hours' ) ) . '" size="50"/>';
		echo '</p>';

		echo '<p>Open (Days Of The Week):<br />';
		echo '<input type="text" name="' . $this->get_field_name( 's_daysweek' ) . '" id="' . $this->get_field_id( 's_daysweek' ) . '" value="' . esc_attr( $this->get_field_value( 's_daysweek' ) ) . '" size="50" />';
		echo '</p>';	
	

		}
	
	
}


