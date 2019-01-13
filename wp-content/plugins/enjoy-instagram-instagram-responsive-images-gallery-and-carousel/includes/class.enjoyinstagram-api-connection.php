<?php
/**
 * This class handles Instagram API connection
 */

if( ! defined( 'ABSPATH' ) ) {
    exit; // exit if call directly
}

class EnjoyInstagram_Api_Connection {

    /**
     * Single plugin instance
     * @since 4.0.0
     * @var \EnjoyInstagram_Api_Connection
     */
    protected static $instance;

    /**
     * String Access Token
     * @var string
     */
    public $access_token = '';

    /**
     * Returns single instance of the class
     *
     * @return \EnjoyInstagram_Api_Connection
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
        $this->access_token = get_option('enjoyinstagram_access_token', '');
    }

    /**
     * Handle curl connection to API
     *
     * @since 4.0.0
     * @param string $api_url
     * @return mixed
     */
    private function _curl_connect( $api_url ){
        try {
            $connection_c = curl_init(); // initializing
            curl_setopt( $connection_c, CURLOPT_URL, $api_url ); // API URL to connect
            curl_setopt( $connection_c, CURLOPT_RETURNTRANSFER, true ); // return the result, do not print
            curl_setopt( $connection_c, CURLOPT_TIMEOUT, 30 );
            curl_setopt( $connection_c, CURLOPT_SSL_VERIFYPEER, false );
            $json_return = curl_exec( $connection_c ); // connect and get json data
            curl_close( $connection_c ); // close connection
            return json_decode( $json_return, true ); // decode and return
        }
        catch( Exception $e ) {
            return array();
        }
    }

    /**
     * Get data
     *
     * @since 4.0.0
     * @param string $url
     * @param integer $count
     * @param array $hashtags
     * @return array
     */
    private function _get_data( $url, $count, $hashtags ) {

        $result         = $this->_curl_connect( $url );
        $res            = $result;
        $res['data']    = array(); // reset data
        $hashtags       = array_filter( $hashtags ); // be sure to remove empty values

        if( ! isset( $result['data'] ) ) {
            return $res;
        }

        foreach( $result['data'] as $post ) {
            if( ! empty( $hashtags ) ){
                foreach( $hashtags as $hash ){
                    if( in_array( $hash, $post["tags"] ) && ! in_array( $post, $res['data'] ) ){
                        array_push( $res['data'], $post );
                    }
                }
            } else{
                array_push( $res['data'], $post );
            }
        }

        if( count( $res['data'] ) < $count && isset( $result['pagination']['next_url'] ) ){

            do {

                if( empty( $result['pagination']['next_url'] ) ) {
                    break;
                }

                $result = $this->_curl_connect( $result['pagination']['next_url'] );
                if( empty( $result['data'] ) ) {
                    break;
                }

                foreach( $result['data'] as $post ) {

                    if( count( $res['data'] ) == $count ) {
                        break;
                    }

                    if( ! empty( $hashtags ) ){
                        foreach( $hashtags as $hash ){
                            if( in_array( $hash, $post["tags"] ) && ! in_array( $post, $res['data'] ) ){
                                array_push( $res['data'], $post );
                            }
                        }
                    } else {
                        array_push( $res['data'], $post );
                    }
                }
            } while( count( $res['data'] ) < $count );
        }

        return $res;
    }

    /**
     * Get user info
     *
     * @since 4.0.0
     * @param string $user
     * @param string $access_token
     * @return array
     */
    public function get_user_info( $access_token = '', $user = '' ){
        if( ! $access_token  ) {
            return array();
        }

        $url = 'https://api.instagram.com/v1/users/self/?access_token='.$access_token;
        return $this->_curl_connect( $url );
    }

    /**
     * Get user
     *
     * @since 4.0.0
     * @param string $user
     * @param integer $count
     * @param string $hashtag
     * @return array|boolean
     */
    public function get_user( $user, $count = 20, $hashtag = "" ){
        $hashtags       = explode( ',', $hashtag );
        $url            = 'https://api.instagram.com/v1/users/self/media/recent?count='.$count.'&access_token='.$this->access_token;

        return $this->_get_data( $url, $count, $hashtags );
    }

    /**
     * Get hashtag media
     *
     * @since 4.0.0
     * @param integer $count
     * @param string $hashtags
     * @return array|boolean
     */
    public function get_hash( $hashtags, $count = 20 ){
        $hashtags       = str_replace( '#', '', $hashtags );
        $hashtags       = explode( ',', $hashtags );
        $url            = 'https://api.instagram.com/v1/users/self/media/recent?count=1&access_token='.$this->access_token;

        return $this->_get_data( $url, $count, $hashtags );
    }

    /**
     * Get user code
     *
     * @since 4.0.0
     * @param string $user
     * @param integer $count
     * @return string
     */
    public function get_user_code( $user, $count ){

        if( ! $this->access_token ) {
            return '';
        }

        $url            = 'https://api.instagram.com/v1/users/self/media/recent?count='.$count.'&access_token='.$this->access_token;
        $result         = $this->_curl_connect( $url );

        return isset( $result['meta']['code'] ) ? $result['meta']['code'] : '';
    }

    /**
     * Get a media
     *
     * @since 4.0.0
     * @param string $user
     * @param string $media
     * @return array
     */
    public function get_media( $user, $media ){

       if( ! $this->access_token ) {
           return array();
       }

       $url            = 'https://api.instagram.com/v1/media/'.$media.'?access_token='.$this->access_token;
       return $this->_curl_connect( $url );
    }
}

/**
 * Unique access to instance of EnjoyInstagram_Api_Connection class
 *
 * @return \EnjoyInstagram_Api_Connection
 * @since 9.0.0
 */
function EnjoyInstagram_Api_Connection() {
    return EnjoyInstagram_Api_Connection::get_instance();
}