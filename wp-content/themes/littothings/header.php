<?php  /* The Header for Brideliness theme */   ?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">

<!--  Site Header (start)-->
<?php  $header_fixed='';
if((brideliness_get_option('site_header')=='fixed' && is_front_page()) || (isset($_GET['home_type']) && $_GET['home_type']=='home1')){
    $header_fixed='fixed';
}
elseif((brideliness_get_option('site_header')=='fixed' && !isset( $_GET['home_type']) ) || (isset($_GET['home_type']) && $_GET['home_type']=='home1')){
    $header_fixed='fixed-header';
}
else{$header_fixed='standart';}
$home_type='';
if( isset( $_GET['home_type'] ) ){
    $home_type = esc_attr($_GET['home_type']);
}
?>

<?php if (function_exists('brideliness_site_wrapper_start')) brideliness_site_wrapper_start(); ?>

<header id="masthead" class="site-header <?php echo esc_attr($home_type);?> <?php echo esc_attr($header_fixed);?>" <?php brideliness_custom_header_bg(); ?> itemscope="itemscope" itemtype="http://schema.org/WPHeader">

    <!-- Header Top panel (start) -->
    <?php
    if ( (brideliness_get_option( 'header_top_panel' ) == 'on' || isset( $_GET['home_type'] )) && (has_nav_menu( 'header-top-nav' ) || brideliness_get_option('top_panel_info_phone')|| brideliness_get_option('top_panel_info_mail') || brideliness_get_option('top_panel_info') || is_active_sidebar('top-sidebar')) && $home_type!=='home1' ) {
        get_template_part('part-templates/header-top');
    }
    ?>
    <!-- Header Top panel (end) -->

    <!-- Logo & hgroup (start)-->
    <div class="logo-wrapper" <?php if (brideliness_get_option('header_box_shadow')=='on' && !isset( $_GET['home_type'])){ brideliness_bottom_box_shadow();}?>>
        <div class="container">
            <div class="row">
                <?php get_template_part( 'part-templates/logo-group' ); ?>
            </div>
        </div>
    </div>
    <!-- Logo & hgroup (end)-->
</header>
<!--  Site Header (end)-->

<?php if(brideliness_get_option('page_title')): ?>
    <?php if(!is_front_page() && !is_page_template('page-templates/front-page.php') && !is_404()) : ?>
        <?php get_template_part( 'part-templates/page-title' ); ?>
    <?php endif; ?>
<?php endif; ?>

<?php if ( class_exists('Woocommerce') && brideliness_get_option('store_banner') === 'on' ) {brideliness_store_banner();}  ?>

<?php if ( class_exists('Woocommerce') ) {
    if (!is_woocommerce()  && !is_page_template('page-templates/front-page.php')) { ?>
        <?php get_template_part( 'part-templates/breadcrumbs' ); ?>
    <?php } } else { ?>
    <?php get_template_part( 'part-templates/breadcrumbs' ); ?>
<?php } ?>

<!-- Content wrapper (start)-->
<?php if(is_404()) :?><div class="wrapper-error-404" style="background: url(<?php echo esc_attr(brideliness_get_option('page_404_bg')); ?>) no-repeat center center;"><?php endif;?>

<?php if(is_front_page()) :?>
    <?php
    $hero_img = get_field('hero_image');
    $hero_size = 'large'; // (thumbnail, medium, large, full or custom size)
    $hero_url = $hero_img['sizes'][ $hero_size ];
    ?>

    <div class="u-box-margin--bottom" style="background: url('<?= $hero_url;?>') no-repeat center; background-size: cover; height:600px; margin-top: -40px; position: relative; overflow: hidden;">
        <div class="cta cta--right">
            <div class="cta-content">
                <h3 class="cta-tagline">Made with Love</h3>
                <h1 class="cta-title u-text-white">Every little things<br/> we do</h1>
                <div class="buttons-wrapper">
                    <a rel="nofollow" href="/?add-to-cart=96" data-quantity="1" data-product_id="96" data-product_sku="1278923" class="main-button">View Products</a>
                </div>
            </div>
        </div>
    </div>

<?php endif;?>
    <div id="main" class="site-main container">
        <div class="row">
