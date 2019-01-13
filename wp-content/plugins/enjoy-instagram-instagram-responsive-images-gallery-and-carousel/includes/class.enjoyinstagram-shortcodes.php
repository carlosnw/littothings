<?php
/**
 * This class handles plugin shortcodes
 */

if( ! defined( 'ABSPATH' ) ) {
    exit; // exit if call directly
}

class EnjoyInstagram_Shortcodes {

    /**
     * Single plugin instance
     * @since 9.0.0
     * @var \EnjoyInstagram_Shortcodes
     */
    protected static $instance;

    /**
     * Shortcode index
     * @since 9.0.0
     * @var integer
     */
    public static $index = 1;

    /**
     * @since 9.0.0
     * @var boolean
     */
    public $enqueued = false;

    /**
     * Returns single instance of the class
     *
     * @return \EnjoyInstagram_Shortcodes
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
    public function __construct(){
        // register common scripts
        add_action( 'wp_enqueue_scripts', array( $this, 'register_scripts' ), 5 );
        add_action( 'wp_head', array( $this, 'functions_in_head' ) );
        if( ! is_admin() ){
            add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 15 );
        }

        add_shortcode( 'enjoyinstagram_mb', array( $this, 'carousel_shortcode' ) );
        add_shortcode( 'enjoyinstagram_mb_grid', array( $this, 'grid_shortcode' ) );
        add_shortcode( 'enjoyinstagram_mb_widget', array( $this, 'carousel_shortcode_widget' ) );
        add_shortcode( 'enjoyinstagram_mb_grid_widget', array( $this, 'grid_shortcode_widget' ) );
    }

    /**
     * Register common scripts
     *
     * @since 4.0.0
     * @return void
     */
    public function register_scripts(){
        wp_register_script('owl', ENJOYINSTAGRAM_ASSETS_URL . '/js/owl.carousel.min.js', array('jquery'), ENJOYINSTAGRAM_VERSION );
        wp_register_script('swipebox', ENJOYINSTAGRAM_ASSETS_URL . '/js/jquery.swipebox.min.js', array('jquery'), ENJOYINSTAGRAM_VERSION );
        wp_register_script('gridrotator', ENJOYINSTAGRAM_ASSETS_URL . '/js/jquery.gridrotator.min.js', array('jquery'), ENJOYINSTAGRAM_VERSION );
        wp_register_script('modernizr.custom.26633', ENJOYINSTAGRAM_ASSETS_URL . '/js/modernizr.custom.26633.min.js', array('jquery'), ENJOYINSTAGRAM_VERSION );
        wp_register_script('orientationchange', ENJOYINSTAGRAM_ASSETS_URL . '/js/ios-orientationchange-fix.min.js', array('jquery'), ENJOYINSTAGRAM_VERSION );

        wp_register_style('owl_style', ENJOYINSTAGRAM_ASSETS_URL . '/css/owl.carousel.css' );
        wp_register_style('owl_style_2', ENJOYINSTAGRAM_ASSETS_URL . '/css/owl.theme.css' );
        wp_register_style('owl_style_3', ENJOYINSTAGRAM_ASSETS_URL . '/css/owl.transitions.css' );
        wp_register_style('swipebox_css', ENJOYINSTAGRAM_ASSETS_URL . '/css/swipebox.css' );
        wp_register_style('grid_fallback', ENJOYINSTAGRAM_ASSETS_URL . '/css/grid_fallback.css' );
        wp_register_style('grid_style', ENJOYINSTAGRAM_ASSETS_URL . '/css/grid_style.css' );
    }

    /**
     * Enqueue scripts ans styles
     *
     * @since 4.0.0
     */
    public function enqueue_scripts(){

        if( $this->enqueued ) {
            return;
        }
        wp_enqueue_script('modernizr.custom.26633');
        wp_enqueue_script('gridrotator');
        wp_localize_script('gridrotator', 'GridRotator', array('pluginsUrl' => plugins_url(),));
        wp_enqueue_script('owl');
        wp_enqueue_script('swipebox');
        wp_enqueue_script('orientationchange');
        wp_enqueue_style( 'owl_style' );
        wp_enqueue_style( 'owl_style_2' );
        wp_enqueue_style( 'owl_style_3' );
        wp_enqueue_style( 'swipebox_css' );
        wp_enqueue_style( 'grid_fallback' );
        wp_enqueue_style( 'grid_style' );

        $this->enqueued = true;
    }

    /**
     * JS functions in head
     *
     * @since 4.0.0
     */
    public function functions_in_head(){
        ?>
        <script type="text/javascript">
            jQuery(function($) {
                $(".swipebox_grid").swipebox({
                    hideBarsDelay : 0
                });

            });
        </script>
        <?php
    }

    /**
     * Get shortcode data
     *
     * @since 4.0.0
     * @param string $type
     * @return array
     */
    protected function _get_shortcode_data( $type = '' ){
        $data = array();
        ! $type && $type = get_option('enjoyinstagram_user_or_hashtag', 'user');
        if( $type == 'hashtag' ){
            $result = EnjoyInstagram_Api_Connection()->get_hash( urlencode( get_option('enjoyinstagram_hashtag') ), 20 );
        } else {
            $result = EnjoyInstagram_Api_Connection()->get_user( urlencode( get_option('enjoyinstagram_user_username') ), 20 );
        }

        if( isset( $result['data'] ) ) {
            $data = $result['data'];
            foreach( $data as $key => &$entry ) {
                $entry = enjoyinstagram_format_entry_before_print( $entry );
            }
        }

        return $data;
    }

    /**
     * Carousel shortcode callback
     *
     * @since 4.0.0
     * @param array $atts
     * @return string
     */
    public function carousel_shortcode( $atts ){
        extract( shortcode_atts( array(
                'n' => '4'
        ), $atts ) );

        $client = get_option( 'enjoyinstagram_access_token', '' );

        if( ! $client ) {
            return '';
        }

        $items_num  = get_option('enjoyinstagram_carousel_items_number', '4');
        $nav        = get_option('enjoyinstagram_carousel_navigation', 'false');
        $result     = $this->_get_shortcode_data();
        if( empty( $result ) ) {
            return '';
        }
        $i = self::$index;
        self::$index++;

        ob_start();
        include( ENJOYINSTAGRAM_TEMPLATE_PATH . '/shortcodes/carousel.php' );
        return ob_get_clean();
    }

    /**
     * Grid shortcode callback
     *
     * @since 4.0.0
     * @param array $atts
     * @return string
     */
    public function grid_shortcode( $atts ) {
        extract( shortcode_atts( array(
            'rows'  => get_option('enjoyinstagram_grid_rows', '2'),
            'cols'  => get_option('enjoyinstagram_grid_cols', '5')
        ), $atts ) );

        $client = get_option( 'enjoyinstagram_access_token', '' );
        if( ! $client ) {
            return '';
        }

        $result     = $this->_get_shortcode_data();
        if( empty( $result ) ) {
            return '';
        }
        $i = self::$index;
        self::$index++;

        ob_start();
        include( ENJOYINSTAGRAM_TEMPLATE_PATH . '/shortcodes/grid.php' );
        return ob_get_clean();
    }

    /**
     * Carousel shortcode widget callback
     *
     * @since 4.0.0
     * @param array $atts
     * @return string
     */
    public function carousel_shortcode_widget( $atts ) {
        extract(shortcode_atts(array(
            'n'         => '4',
            'id'        => 'owl',
            'n_y_n'     => 'false',
            'u_or_h'    => 'user'
        ), $atts));

        $client = get_option( 'enjoyinstagram_access_token', '' );
        if( ! $client ) {
            return '';
        }

        $result     = $this->_get_shortcode_data( $u_or_h );
        if( empty( $result ) ) {
            return '';
        }

        ob_start();
        include( ENJOYINSTAGRAM_TEMPLATE_PATH . '/shortcodes/carousel-widget.php' );
        return ob_get_clean();
    }

    /**
     * Grid shortcode widget callback
     *
     * @since 4.0.0
     * @param array $atts
     * @return string
     */
    public function grid_shortcode_widget( $atts ) {
        extract( shortcode_atts( array(
            'id' => 'rigrid_default',
            'n_c' => '6',
            'n_r' => '2',
            'u_or_h' => 'user'
        ), $atts ) );

        $client = get_option( 'enjoyinstagram_access_token', '' );
        if( ! $client ) {
            return '';
        }

        $result     = $this->_get_shortcode_data( $u_or_h );
        if( empty( $result ) ) {
            return '';
        }

        ob_start();
        include( ENJOYINSTAGRAM_TEMPLATE_PATH . '/shortcodes/grid-widget.php' );
        return ob_get_clean();
    }
}

/**
 * Unique access to instance of EnjoyInstagram_Shortcodes class
 *
 * @return \EnjoyInstagram_Shortcodes
 * @since 9.0.0
 */
function EnjoyInstagram_Shortcodes() {
    return EnjoyInstagram_Shortcodes::get_instance();
}

EnjoyInstagram_Shortcodes();