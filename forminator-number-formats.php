<?php
/**
 * Plugin Name: [ Forminator ] - Number Formats
 * Version: 1.0.0
 * Plugin URI:  https://premium.wpmudev.org/project/forminator/
 * Description: Adds number formats to Forminator Input fields. It currently can be used only for Forminator's Input fields (normal textboxes), so it won't work with Number, Phone or other fields. Uses https://nosir.github.io/cleave.js/
 * Author: Panos Lyrakis @ WPMUDEV
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
	private $plugin_path;

	/**
	 * @return string
	 */
	public function getPluginPath() {
		return $this->plugin_path;
	}

	/**
	 * @return string
	 */
	public function getPluginUrl() {
		return $this->plugin_url;
	}

	/**
	 * @var string
	 */
	private $plugin_url;

	/**
	 * @var string
	 */
	//public $domain = 'wpmudev_forminator_number_formats';

	/**
	 * @var string
	 */
	public $version = "1.0.0";

	/**
	 * @var string
	 */
	public $db_version = "1.0.0";

	/**
	 * @var string
	 */
	public $isFree = false;

	/**
	 * @var array
	 */
	public $global = array();

	/**
	 * @var string
	 */
	private static $plugin_slug = 'forminator-number-formats/forminator-number-formats.php';


	/**
	 * @return WPMUDEV_Forminator_Number_Formats
	 */
	public static function instance() {
		if ( ! is_object( self::$_instance ) ) {
			self::$_instance = new WPMUDEV_Forminator_Number_Formats();
		}

		return self::$_instance;
	}

	/**
	 * WP_Sites constructor.
	 */
	private function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	public function enqueue_scripts() {

		global $post;
		if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'forminator_form' ) ) {
			wp_enqueue_script( "{$this->plugin_name}-cleave", plugin_dir_url( __FILE__ ) . 'js/cleave/cleave.min.js', array( 'jquery' ), $this->version, true );
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/front.js', array( 'jquery' ), $this->version, true );
		}
		

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
