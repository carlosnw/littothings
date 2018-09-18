<?php  
	/* Top panel background options */
	if( isset( $_GET['home_type'] ) ){
		$home_type = esc_attr($_GET['home_type']);
	} 
	else{ $home_type='';}
	
	if(brideliness_get_option('header_top_panel_border')=='on' || ($home_type && $home_type!='home1') ){
		$top_border='bordered';
	}
	else{$top_border='';}
	
	if ( brideliness_get_option( 'top_panel_bg_color' ) && brideliness_get_option( 'top_panel_bg_color' )!== ''  && !$home_type) {
		$top_panel_bg = ' style="background: '.esc_attr(brideliness_get_option( 'top_panel_bg_color' )).';"';
	}
	elseif(brideliness_get_option( 'top_panel_bg_color' ) && brideliness_get_option( 'top_panel_bg_color' )!== '' && $home_type!=='home1'){
		$top_panel_bg = ' style="background: #ffffff;"';
	}
	else{$top_panel_bg = '';}	
?>

	<div class="header-top <?php echo esc_attr($top_border); ?>" <?php echo $top_panel_bg; ?>><!-- Header top section -->
		<div class="container">
			<div class="row">
			
				<div class="top-widgets col-xs-12  col-md-2 col-sm-4">
					<?php if ( is_active_sidebar('top-sidebar') ) dynamic_sidebar( 'top-sidebar' ); ?>
				</div>
				<div class="info-container col-xs-12 col-md-5 col-sm-4">
					<?php if ( get_option('top_panel_info') !='' || get_option('top_panel_info_phone') !='' || get_option('top_panel_info_mail') !='' ):?>
						<ul class="info-top-header">
						<?php if(brideliness_get_option('top_panel_info_phone') !=''): ?>
							<li class="info-phone">
								<?php echo brideliness_get_option('top_panel_info_phone'); ?>
							</li>
						<?php endif; ?>
						<?php if(brideliness_get_option('top_panel_info_mail') !='') : ?>
							<li class="info-mail">
								<?php echo brideliness_get_option('top_panel_info_mail'); ?>
							</li>
						<?php endif; ?>
						<?php if(brideliness_get_option('top_panel_info') !=''): ?>
							<li class="other-info">
							<?php echo brideliness_get_option('top_panel_info'); ?>
							</li>
						<?php endif; ?>
						</ul>
					<?php endif; ?>
				</div>
				<div class="top-nav-container col-xs-12 col-md-5 col-sm-4">
					<?php if (has_nav_menu( 'header-top-nav' )) : ?>
						<nav class="header-top-nav" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
							<a class="screen-reader-text skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'brideliness' ); ?></a>
							<?php wp_nav_menu( array('theme_location'  => 'header-top-nav') ); ?>
						</nav>
					<?php endif;?>
				</div>
				
			</div>
		</div>
	</div>