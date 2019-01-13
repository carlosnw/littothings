<?php
function my_theme_enqueue_styles() {

    $parent_style = 'brideliness-basic'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function enqueue_custom_css() {
    wp_enqueue_style('style-min', get_stylesheet_directory_uri() . '/assets/css/style.min.css');
}

add_action( 'wp_enqueue_scripts', 'enqueue_custom_css' );

function my_custom_script_load(){
    wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/assets/js/modules/custom-scripts.js', array ( 'jquery' ));
}

add_action( 'wp_enqueue_scripts', 'my_custom_script_load' );

?>

<?php

add_theme_support( 'post-thumbnails' );

add_image_size( 'blog-thumb', 720, 360, true );

?>