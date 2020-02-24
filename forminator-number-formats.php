<?php
/**
 * Plugin Name: [ Forminator ] - Number Formats
 * Version: 1.0.0
 * Plugin URI:  https://premium.wpmudev.org/project/forminator/
 * Task: 0/11289012348292/1163187145138285
 * Description: Adds number formats to Forminator Input fields. It currently can be used only for Forminator's Input fields (normal textboxes), so it won't work with Number, Phone or other fields. Uses https://nosir.github.io/cleave.js/
 * Author: Panos Lyrakis & Tho Bui @ WPMUDEV
 * Author URI: http://premium.wpmudev.org
 */

class WPMUDEV_Forminator_Number_Formats {
	/**
	 * Store the WPMUDEV_Forminator_Number_Formats object for singleton implement
	 *
	 * @var WPMUDEV_Forminator_Number_Formats
	 */
	private static $_instance;

	/**
	 * @var string
	 */
	private $plugin_name = 'wpmudev_forminator_number_formats';

	/**
	 * @var string
	 */
	public $version = "1.0.0";

	/**
	 * @return WPMUDEV_Forminator_Number_Formats
	 */
	public static function instance() {
		if ( ! is_object( self::$_instance ) ) {
			self::$_instance = new WPMUDEV_Forminator_Number_Formats();
		}

		return self::$_instance;
	}

	public $loaded_assets = false;

	/**
	 * WP_Sites constructor.
	 */
	private function __construct() {
		add_action( 'forminator_before_form_render', array( $this, 'maybe_enqueue_scripts' ), 10, 2 );
		add_filter( 'forminator_render_form_placeholder_markup', array( $this, 'maybe_enqueue_scripts' ), 10, 2 );
	}

	public function maybe_enqueue_scripts( $content, $form_type ){
		if( ! $this->loaded_assets && 'custom-form' === $form_type ){
			$this->loaded_assets = 1;

			wp_enqueue_script( "{$this->plugin_name}-cleave", plugin_dir_url( __FILE__ ) . 'js/cleave/cleave.min.js', array( 'jquery' ), $this->version, true );
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/front.js', array( 'jquery' ), $this->version, true );
		}

		return $content;
	}

}


if ( ! function_exists( 'wpmudev_forminator_number_formats' ) ) {

	/**
	 * Shorthand to get the instance
	 * @return WPMUDEV_Forminator_Number_Formats
	 */
	function wpmudev_forminator_number_formats() {
		return WPMUDEV_Forminator_Number_Formats::instance();
	}

	//init
	wpmudev_forminator_number_formats();

}
