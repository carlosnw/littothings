<?php   /* The Footer for Brideliness theme */  ?>


		</div>
	</div><!-- Content wrapper (end)-->
<?php if(is_404()) :?></div><?php endif;?>
	
	<?php if ( class_exists('Woocommerce') ): ?>
	<?php  if(is_shop() || is_product() || is_product_category() || is_product_tag() && (is_active_sidebar('footer-content-bottom-shop1') || is_active_sidebar('footer-content-bottom-shop2') || is_active_sidebar('footer-content-bottom-shop3'))): ?>
		<aside id="sidebar-shop-bottom" class="widget-area" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">		
			<div class="container">
				<div class="row">
					<div class="shop-bottom-sidebar col-xs-12 col-sm-12 col-md-6">
						<?php dynamic_sidebar('footer-content-bottom-shop1'); ?>
					</div>
					<div class="shop-bottom-sidebar col-xs-12 col-sm-12 col-md-6">
						<?php dynamic_sidebar('footer-content-bottom-shop2'); ?>
					</div>
				</div>
			</div>
		</aside>
	<?php endif ?>
	<?php endif ?>
	
	<?php if (is_singular( 'lookbook' ) ): 
	
	$loop_lookbook = new WP_Query(array('post_type' => 'lookbook', 'post_status' => 'publish')); ?>
	
	<div class="lookbook-featured">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php while ( $loop_lookbook->have_posts() ) : $loop_lookbook->the_post(); ?>
						<div class="thubm-container">
							<a href="<?php echo esc_attr(get_post_permalink());?>">
							<?php the_post_thumbnail('brideliness-lookbook-thumb'); ?>
							</a>
						</div>
						<?php endwhile; ?>
					<?php wp_reset_postdata();?>
				</div>
			</div>
		</div>
	</div>
	<?php endif ?>
	
	<footer id="colophon" class="site-footer" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
		
	<?php if(is_active_sidebar( 'footer-sidebar-1' ) || is_active_sidebar( 'footer-sidebar-2' ) || is_active_sidebar( 'footer-sidebar-3' ) || is_active_sidebar( 'footer-sidebar-4')) :?>
		
		<div class="footer-top widget-area" <?php brideliness_custom_footer_bg();?> role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
				<div class="container">
					<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-3">
								<?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) : ?>
									<?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
								<?php endif; ?>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-3">
								<?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) : ?>
								<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
								<?php endif; ?>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-3">
								<?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) : ?>
									<?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
									<?php endif; ?>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-3">
								<?php if ( is_active_sidebar( 'footer-sidebar-4' ) ) : ?>
									<?php dynamic_sidebar( 'footer-sidebar-4' ); ?>
								<?php endif; ?>
							</div>
					</div>
				</div>
		</div>
		
	<?php endif; ?>
		
		<div id="footer-bottom" class="footer-bottom" <?php brideliness_custom_footer_bottom_bg(); ?>>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="site-info">
							<?php $copyright = esc_attr(brideliness_get_option('site_copyright'));
								if ($copyright != '') {
									echo esc_attr($copyright);
								} else {
									echo esc_attr(' Copyright &copy; '.date('Y') .' by brideliness . Made with Love by ').'<a href="https://themes.zone/">Themeszone</a>';
								}
							?>
						</div>
					</div>
					
					<?php 	if (brideliness_get_option('totop_button')=='on' ) {brideliness_to_top_button();} ?>
					
					<div class="col-xs-12 col-sm-6 col-md-6">
						<?php if ( is_active_sidebar( 'footer-bottom' ) ) : ?>
								<?php dynamic_sidebar( 'footer-bottom' ); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
			
	</footer><!-- #colophon -->
	
<?php if (function_exists('brideliness_site_wrapper_end')){ brideliness_site_wrapper_end();}?>

	<?php  wp_footer(); ?>
	
	</body>
</html>