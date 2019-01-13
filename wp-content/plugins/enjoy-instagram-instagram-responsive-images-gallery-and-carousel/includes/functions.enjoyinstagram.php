<?php
/**
 * Common functions for plugin Enjoy Instagram
 */

if( ! defined( 'ABSPATH' ) ) {
    exit; // exit if call directly
}

if( ! function_exists( 'enjoyinstagram_shuffle_assoc' ) ) {
    function enjoyinstagram_shuffle_assoc(&$array) {
        if( empty($array) ) {
            return false;
        }

        $keys = array_keys($array);
        shuffle($keys);
        foreach($keys as $key) {
            $new[$key] = $array[$key];
        }
        $array = $new;
        return true;
    }
}

if( ! function_exists( 'enjoyinstagram_replace4byte' ) ){
    /**
     * @param $string
     * @return null|string|string[]
     */
    function enjoyinstagram_replace4byte($string) {
        return preg_replace('%(?:
          \xF0[\x90-\xBF][\x80-\xBF]{2}      # planes 1-3
        | [\xF1-\xF3][\x80-\xBF]{3}          # planes 4-15
        | \xF4[\x80-\x8F][\x80-\xBF]{2}      # plane 16
    )%xs', '', $string);
    }
}

if( ! function_exists( 'enjoyinstagram_isHttps' ) ) {
    /**
     * Check HTTPS
     *
     * @return bool
     */
    function enjoyinstagram_isHttps() {
        return ! empty( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] != 'off';
    }
}

if( ! function_exists( 'enjoyinstagram_format_entry_before_print' ) ) {
    /**
     * Format an entry before print
     *
     * @since 4.0.0
     * @param array $entry
     * @return array
     */
    function enjoyinstagram_format_entry_before_print( $entry ) {
        $entry['caption']['text'] = ! empty( $entry['caption'] ) ? str_replace("\"","&quot;",$entry['caption']['text']) : '';
        if( enjoyinstagram_isHttps() ) {
            $thumb_url = isset( $entry['images']['thumbnail'] ) ? $entry['images']['thumbnail']['url'] : $entry['images']['standard_resolution']['url'];
            $entry['images']['thumbnail']['url'] = str_replace('http://', 'https://', $thumb_url );
            $entry['images']['standard_resolution']['url'] = str_replace('http://', 'https://', $entry['images']['standard_resolution']['url']);
        }

        return $entry;
    }
}

/************************************
 * RETROCOMPATIBILITY
 ***********************************/
function get_user_info($access_token){
    return EnjoyInstagram_Api_Connection()->get_user_info( $access_token );
}
//ANDREA NEW FUNC
function get_user_by_name($user,$count, $account_name, $hashtag = ""){
    return array();
}

function get_hash($hashtag,$count){
    return EnjoyInstagram_Api_Connection()->get_hash( $hashtag, $count );
}

function get_hash_code($hashtag,$count){
    return '';
}

function get_user($user,$count, $hashtag = ""){
    return EnjoyInstagram_Api_Connection()->get_user( $user,$count, $hashtag );
}

function get_user_code($user,$count){
    return EnjoyInstagram_Api_Connection()->get_user_code( $user,$count );
}

function get_media($user,$media){
    return EnjoyInstagram_Api_Connection()->get_media( $user,$media );
}

function get_likes($user,$count){
    return array();
}

function get_likes_code($user,$count){
    return '';
}

function replace4byte($string) {
    return enjoyinstagram_replace4byte( $string );
}

function isHttps() {
    return enjoyinstagram_isHttps();
}

function defer_parsing_of_js ( $url ) {
    return enjoyinstagram_defer_parsing_of_js( $url );
}