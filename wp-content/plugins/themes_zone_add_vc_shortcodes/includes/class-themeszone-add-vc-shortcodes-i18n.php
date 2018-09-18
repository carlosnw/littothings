<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       themeszone-add-vc
 * @since      1.0.0
 *
 * @package    Themeszone_Add_Vc_Shortcodes
 * @subpackage Themeszone_Add_Vc_Shortcodes/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Themeszone_Add_Vc_Shortcodes
 * @subpackage Themeszone_Add_Vc_Shortcodes/includes
 * @author     Themes Zone
 */
class Themeszone_Add_Vc_Shortcodes_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'themeszone-add-vc-shortcodes',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
