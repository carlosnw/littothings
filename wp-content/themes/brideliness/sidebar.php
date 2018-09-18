<?php /** The sidebar containing the main widget area. **/

	/* Adding extra classes based on layout mode */
		$current_layout = brideliness_show_layout();
		if ($current_layout === 'layout-two-col-right') { $sidebar_class = 'col-xs-12 col-md-3 col-sm-3'; }
		if ($current_layout === 'layout-two-col-left') { $sidebar_class = 'col-xs-12 col-sm-4 col-md-3 col-md-pull-9 col-sm-pull-8'; }
?>

	<?php /* Disable sidebars if layout one-col */
		if ( $current_layout != 'layout-one-col') :
	?>

	    <?php if (class_exists('Woocommerce')) : ?>

			<?php
			if ( is_home() || 
			   ( is_single() && !is_product() ) || 
			   ( is_category() && !is_product_category() ) || 
			   ( is_tag() && !is_product_tag() ) || 
			   ( is_tax() && !is_product_category() && !is_product_tag() ) || 
			   ( is_archive() && !is_woocommerce() ) || 
			     is_search() ) : ?>

				<?php if ( is_active_sidebar( 'sidebar-blog' ) && ( $current_layout != 'one-col' ) ) : ?>
					<div id="sidebar-blog" class="widget-area <?php echo esc_attr($sidebar_class); ?> sidebar" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
						<?php dynamic_sidebar( 'sidebar-blog' ); ?>
					</div>
				<?php endif; ?>

			<?php elseif ( is_page() && is_front_page() ) : ?>

				<?php if ( is_active_sidebar( 'sidebar-front' ) && ( $current_layout != 'one-col' ) ) : ?>
					<div id="sidebar-front" class="widget-area <?php echo esc_attr($sidebar_class); ?> sidebar" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
						<?php dynamic_sidebar( 'sidebar-front' ); ?>
					</div>
				<?php endif; ?>

			<?php elseif ( is_page() ) : ?>

				<?php if ( is_active_sidebar( 'sidebar-pages' ) && ( $current_layout != 'one-col' ) ) : ?>
					<div id="sidebar-pages" class="widget-area <?php echo esc_attr($sidebar_class); ?> sidebar" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
						<?php dynamic_sidebar( 'sidebar-pages' ); ?>
					</div>
				<?php endif; ?>

			<?php elseif ( is_shop() || is_product_category() || is_product_tag()) : ?>

				<?php if ( is_active_sidebar( 'sidebar-shop' ) && ( $current_layout != 'one-col' ) ) : ?>
					<div id="sidebar-shop" class="widget-area <?php echo esc_attr($sidebar_class); ?> sidebar" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
						<?php dynamic_sidebar( 'sidebar-shop' ); ?>
					</div>
				<?php endif; ?>

			<?php elseif ( is_product() ) : ?>

				<?php if ( is_active_sidebar( 'sidebar-product' ) && ( $current_layout != 'one-col' ) ) : ?>
					<div id="sidebar-product" class="widget-area <?php echo esc_attr($sidebar_class); ?> sidebar" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
						<?php dynamic_sidebar( 'sidebar-product' ); ?>
					</div>
				<?php endif; ?>

			<?php endif; ?>

		<?php else : ?>

	        <?php if ( is_home() || is_single() || is_category() || is_tag() || is_tax() || is_archive()  || is_search() ) : ?>

	            <?php if ( is_active_sidebar( 'sidebar-blog' ) && ( $current_layout != 'one-col' ) ) : ?>
	                <div id="sidebar-blog" class="widget-area <?php echo esc_attr($sidebar_class); ?> sidebar" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
	                    <?php dynamic_sidebar( 'sidebar-blog' ); ?>
	                </div>
	            <?php endif; ?>

	        <?php elseif ( is_page() && is_front_page() ) : ?>

	            <?php if ( is_active_sidebar( 'sidebar-front' ) && ( $current_layout != 'one-col' ) ) : ?>
	                <div id="sidebar-front" class="widget-area <?php echo esc_attr($sidebar_class); ?> sidebar" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
	                    <?php dynamic_sidebar( 'sidebar-front' ); ?>
	                </div>
	            <?php endif; ?>

	        <?php elseif ( is_page() ) : ?>

	            <?php if ( is_active_sidebar( 'sidebar-pages' ) && ( $current_layout != 'one-col' ) ) : ?>
	                <div id="sidebar-pages" class="widget-area <?php echo esc_attr($sidebar_class); ?> sidebar" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
	                    <?php dynamic_sidebar( 'sidebar-pages' ); ?>
	                </div>
	            <?php endif; ?>

	        <?php endif; ?>

		<?php endif ?>

	<?php endif ?>
