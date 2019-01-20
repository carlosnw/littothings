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
    wp_enqueue_script( 'scroll-to', get_stylesheet_directory_uri() . '/assets/js/modules/scroll-to-subscribe.js', array ( 'jquery' ));
}

add_action( 'wp_enqueue_scripts', 'my_custom_script_load' );

?>



<?php
//Extra image sizes
add_theme_support( 'post-thumbnails' );

//Blog Thumbnails
add_image_size( 'blog-thumb', 720, 360, true );

//Full Width Images
add_image_size( 'full-landscape', 2000, 850, array( 'center', 'top' ) );

//Tile Images
add_image_size( 'tile-portrait', 720, 950, false );
add_image_size( 'tile-landscape', 2280, 350, false );

?>