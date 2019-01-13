<?php
/*
Plugin Name: Enjoy Plugin for Instagram
Plugin URI: http://www.mediabeta.com/enjoy-instagram/
Description: Instagram Responsive Images Gallery and Carousel, works with Shortcodes and Widgets.
Version: 4.0.3
Author: Mediabeta Srl
Author URI: http://www.mediabeta.com/team/
*/

! defined( 'ENJOYINSTAGRAM_VERSION' ) && define( 'ENJOYINSTAGRAM_VERSION', '4.0.3' );
! defined( 'ENJOYINSTAGRAM_FILE' ) && define( 'ENJOYINSTAGRAM_FILE', __FILE__ );
! defined( 'ENJOYINSTAGRAM_URL' ) && define( 'ENJOYINSTAGRAM_URL', plugin_dir_url( __FILE__ ) );
! defined( 'ENJOYINSTAGRAM_DIR' ) && define( 'ENJOYINSTAGRAM_DIR', plugin_dir_path( __FILE__ ) );
! defined( 'ENJOYINSTAGRAM_ASSETS_URL' ) && define( 'ENJOYINSTAGRAM_ASSETS_URL', ENJOYINSTAGRAM_URL . 'assets' );
! defined( 'ENJOYINSTAGRAM_TEMPLATE_PATH' ) && define( 'ENJOYINSTAGRAM_TEMPLATE_PATH', ENJOYINSTAGRAM_DIR . 'templates' );

function enjoyinstagram_require_activation_class(){
    require_once('includes/class.enjoyinstagram-activation.php');
}

register_activation_hook( __FILE__, 'enjoyinstagram_require_activation_class' );

add_action( 'plugins_loaded', 'enjoyinstagram_init_plugin' );
function enjoyinstagram_init_plugin(){

    load_plugin_textdomain( 'enjoyinstagram', false, dirname( plugin_basename( __FILE__ ) ). '/languages/' );

    // common file
    require_once( 'includes/functions.enjoyinstagram.php' );
    require_once( 'includes/class.enjoyinstagram-api-connection.php' );
    require_once( 'includes/class.enjoyinstagram-shortcodes.php' );
    // widgets
    require_once( 'includes/widgets/widgets.php' );
    require_once( 'includes/widgets/widgets_grid.php' );

    // require admin class
    if( is_admin() ) {
        include_once( 'includes/tinymce/tinymce.php' );
        require_once( 'includes/class.enjoyinstagram-admin.php' );
    }
}