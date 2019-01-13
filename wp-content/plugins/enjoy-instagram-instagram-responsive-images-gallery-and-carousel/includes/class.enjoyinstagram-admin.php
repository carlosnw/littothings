<?php
/**
 * This class handles all admin actions
 */

if( ! defined( 'ABSPATH' ) ) {
    exit; // exit if call directly
}

class EnjoyInstagram_Admin {

    /**
     * Single plugin instance
     * @since 9.0.0
     * @var \EnjoyInstagram_Admin
     */
    protected static $instance;

    /**
     * Plugin options page name
     * @var string
     */
    protected $_options_page = 'enjoyinstagram_plugin_options';

    /**
     * Plugin options page name
     * @var array
     */
    protected $_tabs = [];

    /**
     * Plugin options page name
     * @var array
     */
    protected $_plugin_options = [];

    /**
     * Returns single instance of the class
     *
     * @return \EnjoyInstagram_Admin
     * @since 1.0.0
     */
    public static function get_instance(){
        if( is_null( self::$instance ) ){
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Construct
     *
     * @return void
     */
    private function __construct(){
        $this->init();
        add_action( 'admin_menu', array( $this, 'add_admin_menus' ) );
        // register default options group
        add_action( 'admin_init', array( $this, 'register_settings' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_styles_scripts' ) );
        add_filter( 'plugin_action_links_'.plugin_basename( ENJOYINSTAGRAM_DIR . '/' . basename( ENJOYINSTAGRAM_FILE ) ), array( $this, 'settings_link' ) );
        // add/remove user
        add_action( 'admin_init', array( $this, 'add_user' ), 1 );
        add_action( 'admin_init', array( $this, 'remove_user' ), 1 );
    }

    /**
     * Init admin class variables
     *
     * @since 9.0.0
     * @return void
     */
    protected function init(){
        // init tabs
        $this->_tabs = apply_filters( 'enjoyinstagram_plugin_admin_tabs', array(
            'enjoyinstagram_general_settings'   => __( 'Profile', 'enjoyinstagram' ),
            'enjoyinstagram_advanced_settings'  => __( 'Settings', 'enjoyinstagram' )
        ) );

        if( file_exists( ENJOYINSTAGRAM_DIR . 'plugin-options/options.php' ) ) {
            $this->_plugin_options = include( ENJOYINSTAGRAM_DIR . 'plugin-options/options.php' );
        }
    }

    /**
     * Build an admin url
     *
     * @param string $tab
     * @param array $params
     * @since 4.0.0
     * @return string
     */
    public function build_admin_url( $tab, $params = array() ){
        $params_string = '';
        foreach( $params as $key => $value ) {
            $params_string .= '&'.$key.'='.$value;
        }

        return admin_url("options-general.php?page={$this->_options_page}&tab={$tab}{$params_string}");
    }

    /**
     * Enqueue plugin styles and scripts
     *
     * @since 9.0.0
     * @return void
     */
    public function admin_styles_scripts(){
        wp_register_style( 'enjoyinstagram_settings', ENJOYINSTAGRAM_ASSETS_URL . '/css/enjoyinstagram_settings.css', array(), ENJOYINSTAGRAM_VERSION );

        if( isset( $_GET['page'] ) && $_GET['page'] == $this->_options_page ) {
            wp_enqueue_style( 'enjoyinstagram_settings' );
        }
    }

    /**
     * Add admin menu under Settings
     *
     * @since 9.0.0
     * @return void
     */
    public function add_admin_menus() {
        add_options_page(
            __( 'Enjoy Plugin for Instagram', 'enjoyinstagram' ),
            __( 'Enjoy Plugin for Instagram', 'enjoyinstagram' ),
            'manage_options',
            $this->_options_page,
            array( $this, 'output_options_page' ) );
    }

    /**
     * Add plugin settings link
     *
     * @since 9.0.0
     * @param string $links
     * @return string
     */
    public function settings_link( $links ){
        $links[]  = '<a href="options-general.php?page=' .$this->_options_page.'">' . __( 'Settings', 'enjoyinstagram' ) . '</a>';
        $links[]  = '<a href="widgets.php">' . __( 'Widgets', 'enjoyinstagram' ) . '</a>';
        $links[]  = '<a href="http://www.mediabeta.com/enjoy-instagram/">' . __( 'Premium Version', 'enjoyinstagram' ) . '</a>';

        return $links;
    }

    /**
     * Register settings
     *
     * @since 9.0.0
     * @return void
     */
    public function register_settings(){
        if( empty( $this->_plugin_options ) ) {
            return;
        }

        foreach( $this->_plugin_options as $group => $options ) {
            foreach( $options as $option_id => $default ) {
                register_setting( $group, $option_id );
            }
        }
    }

    /**
     * Get plugin admin tabs
     *
     * @sine 9.0.0
     * @return array
     */
    public function get_tabs(){
        return $this->_tabs;
    }

    /**
     * Get current active tab or return the first one
     *
     * @since 9.0.0
     * @return string
     */
    public function get_active_tab(){
        if( ! is_array( $this->_tabs ) ){
            return '';
        }

        $c = isset( $_GET['tab'] ) ? $_GET['tab'] : '';
        reset( $this->_tabs );
        return isset( $this->_tabs[ $c ] ) ? $c : key( $this->_tabs );
    }

    /**
     * Get admin tab url
     *
     * @since 9.0.0
     * @param string $tab
     * @return string
     */
    public function get_tab_url( $tab ){
        return add_query_arg( array( 'page' => $this->_options_page, 'tab' => $tab ), admin_url( 'options-general.php' ) );
    }

    /**
     * Output plugin options page
     *
     * @since 9.0.0
     * @return void
     */
    public function output_options_page(){
        $tabs       = $this->get_tabs();
        $active_tab = $this->get_active_tab();

        include( ENJOYINSTAGRAM_TEMPLATE_PATH . '/admin/settings.php' );
    }

    /**
     * Manage Instagram response and add a new user
     *
     * @since 4.0.0
     * @return void
     */
    public function add_user(){
        if( ! isset( $_GET['access_token'] ) || ! isset( $_GET['page'] ) || $_GET['page'] != $this->_options_page ){
            return;
        }



        $user = EnjoyInstagram_Api_Connection()->get_user_info( $_GET['access_token'] );
        if( empty( $user ) ) {
            return;
        }

        update_option( 'enjoyinstagram_user_id', $user['data']['id'] );
        update_option( 'enjoyinstagram_user_username', enjoyinstagram_replace4byte($user['data']['username']));
        update_option( 'enjoyinstagram_user_profile_picture', $user['data']['profile_picture'] );
        update_option( 'enjoyinstagram_user_fullname', enjoyinstagram_replace4byte($user['data']['full_name']));
        update_option( 'enjoyinstagram_user_website', $user['data']['website'] );
        update_option( 'enjoyinstagram_user_bio', enjoyinstagram_replace4byte($user['data']['bio']));
        update_option( 'enjoyinstagram_access_token', $_GET['access_token'] );

        // redirect to main settings page
        wp_redirect( $this->build_admin_url( 'enjoyinstagram_general_settings' ) );
        exit;
    }

    /**
     * Remove and user from plugin
     *
     * @since 4.0.0
     * @return void
     */
    public function remove_user(){

        if( ! isset( $_REQUEST['action'] ) || $_REQUEST['action'] != 'enjoyinstagram_remove_user' ){
            return;
        }

        update_option( 'enjoyinstagram_user_id', '' );
        update_option( 'enjoyinstagram_user_username', '' );
        update_option( 'enjoyinstagram_user_profile_picture', '' );
        update_option( 'enjoyinstagram_user_fullname', '' );
        update_option( 'enjoyinstagram_user_website', '' );
        update_option( 'enjoyinstagram_user_bio', '' );
        update_option( 'enjoyinstagram_access_token', '' );

        // redirect to main settings page
        wp_redirect( $this->build_admin_url( 'enjoyinstagram_general_settings' ) );
        exit;
    }

    /**
     * Get Instagram login url
     *
     * @since 4.0.0
     * @return string
     */
    public function get_instagram_login_url(){
        $return_url = admin_url("options-general.php?page={$this->_options_page}");
        $state_url = admin_url("options-general.php?page-{$this->_options_page}");
        return "https://instagram.com/oauth/authorize/?client_id=cac0b53396ee466293d81c8fb86835fe&scope=public_content&redirect_uri=http://www.mediabetaprojects.com/put_access_token.php&response_type=token&state={$state_url}";
    }
}

/**
 * Unique access to instance of EnjoyInstagram_Admin class
 *
 * @return \EnjoyInstagram_Admin
 * @since 9.0.0
 */
function EnjoyInstagram_Admin() {
    return EnjoyInstagram_Admin::get_instance();
}

EnjoyInstagram_Admin();