<div class="page-title-description">
	<div class="overlay"></div>
		<div class="title-wrapper" <?php brideliness_custom_page_title_bg(); ?>>
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12">

					<?php  if ( class_exists('Woocommerce') && !is_shop()) : ?>

						<?php if(is_cart()): ?>
							<p><?php esc_html_e('check your', 'brideliness'); ?></p>
							<h2><?php esc_html_e('shopping cart', 'brideliness'); ?></h2>
						<?php endif; ?>
						
						<?php if(is_checkout()): ?>
							<p><?php esc_html_e('add details to', 'brideliness'); ?></p>
							<h2><?php esc_html_e('chekout', 'brideliness'); ?></h2>
						<?php endif; ?>
						
						<?php if(is_account_page()): ?>
							<p><?php esc_html_e('your account page', 'brideliness'); ?></p>
							<h2><?php esc_html_e('account page', 'brideliness'); ?></h2>
						<?php endif; ?>
						
						<?php if(is_product() && (brideliness_get_option('product_single_type')=='single_type_3' || (isset($_GET['product_type']) && $_GET['product_type']=='product3'))): ?>
							<h2><?php the_title();?></h2>
							<?php woocommerce_breadcrumb();?>
						<?php endif; ?>
						
					<?php endif; ?>
						 
						<?php if(is_home()): ?>
							<p><?php esc_html_e('recently from', 'brideliness'); ?></p>
							<h2><?php wp_title('');?></h2>
						<?php endif; ?>
						
						<?php if(is_singular('post')): ?>
							<p><?php the_title();?></p>
							<h2><?php esc_html_e('our blog', 'brideliness'); ?></h2>
						<?php endif; ?>
						
						<?php if(is_search() && ( class_exists('Woocommerce') &&!is_woocommerce())): ?>
							<p><?php  echo get_search_query();?></p>
							<h2><?php esc_html_e('search', 'brideliness'); ?></h2>
						<?php endif; ?>
						
						<?php if(is_tag()): ?>
							<p><?php  single_tag_title();?></p>
							<h2><?php esc_html_e('Tag', 'brideliness'); ?></h2>
						<?php endif; ?>
						
						<?php if(is_category()): ?>
							<p><?php single_cat_title();?></p>
							<h2><?php esc_html_e('Category', 'brideliness'); ?></h2>
						<?php endif; ?>
						
						<?php if(is_author()): ?>
							<p><?php the_author();?></p>
							<h2><?php esc_html_e('All posts by', 'brideliness'); ?></h2>
						<?php endif; ?>
						
						<?php if ( is_day() ): ?>
							<p><?php echo get_the_date(); ?></p>
							<h2><?php  esc_html_e( 'Daily Archives', 'brideliness' );?></h2>
						<?php endif; ?>
						
						<?php if ( is_month() ): ?>
							<p><?php echo get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'brideliness' ) ); ?></p>
							<h2><?php esc_html_e(  'Monthly Archives', 'brideliness'); ?></h2>
						<?php endif; ?>
						
						<?php if ( is_year()): ?>
							<p><?php echo get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'brideliness' ) );?></p>
							<h2><?php  esc_html_e( 'Yearly Archives', 'brideliness' ); ?></h2>
						<?php endif; ?>
						
						<?php if(is_page() && !class_exists('Woocommerce') || is_page() && ( class_exists('Woocommerce') && !is_account_page() && !is_cart() && !is_checkout() && !is_shop())): ?>
						<?php  $description = get_post_meta($post->ID, '_title_brideliness_description_meta_value_key', true); ?>
							<p><?php echo esc_attr($description); ?></p>
							<h2><?php the_title(); ?></h2>
						<?php endif; ?>
						
						<?php  if(is_attachment()) : ?>
							<p><?php echo get_the_date('F d, Y'); ?></p>
							<h2><?php the_title(); ?></h2>
						<?php endif; ?>
						
						<?php  if(is_post_type_archive('lookbook')) : ?>
							<p><?php esc_html_e( 'take a look at', 'brideliness' ); ?></p>
							<h2><?php esc_html_e( 'lookbook', 'brideliness' ); ?></h2>
						<?php endif; ?>
						
						<?php  if(is_singular( 'lookbook' )) : ?>
							<p><?php the_title(); ?></p>
							<h2><?php esc_html_e( 'lookbook', 'brideliness' ); ?></h2>
						<?php endif; ?>
						
					</div>
				</div>
			</div>
		</div>
</div>