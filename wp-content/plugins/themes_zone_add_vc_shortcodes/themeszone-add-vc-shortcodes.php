<?php 
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://themes.zone
 * @since             1.0.0
 * @package           themeszone_add_vc_shortcode
 *
 * @wordpress-plugin
 * Plugin Name:       Themes Zone Add Visual Composer Custom Elements
 * Plugin URI:        https://themes.zone/themeszone-add-vc-shortcode-plugin/
 * Description:       Plugin Adds Custom Elements For Visual Composer Plugin
 * Version:           1.0.0
 * Author:            Themes Zone
 * Author URI:        https://themes.zone/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       themeszone_add_vc_shortcode
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-themeszone-addon-vc-activator.php
 */
function activate_themeszone_add_vc_shortcodes() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-themeszone-add-vc-shortcodes-activator.php';
	Themeszone_Add_Vc_Shortcodes_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-themeszone-addon-vc-deactivator.php
 */
function deactivate_themeszone_add_vc_shortcodes() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-themeszone-add-vc-shortcodes-deactivator.php';
	Themeszone_Add_Vc_Shortcodes_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_themeszone_add_vc_shortcodes' );
register_deactivation_hook( __FILE__, 'deactivate_themeszone_add_vc_shortcodes' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-themeszone-add-vc-shortcodes.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_themeszone_add_vc_shortcodes(){

	$plugin = new Themeszone_Add_Vc_Shortcodes();
	$plugin->run();

}
run_themeszone_add_vc_shortcodes();
