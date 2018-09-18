<?php  /* The Header for Brideliness theme */   ?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
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
	<div id="main" class="site-main container">
		<div class="row">
		