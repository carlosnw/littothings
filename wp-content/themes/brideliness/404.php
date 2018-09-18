<?php /* The template for displaying 404 pages (Not Found) */

get_header(); ?>

		<main class="site-content content-404" itemscope="itemscope" itemprop="mainContentOfPage"><!-- Main content -->
			
			<header class="page-header">
				<h1 class="page-title">
					<span class="really"><?php esc_html_e( 'We are really', 'brideliness' ); ?></span><span class="sorry"><?php esc_html_e( 'sorry', 'brideliness' ); ?></span>
				</h1>
			</header>
			<div class="page-content">
				<p class="info-404"><?php esc_html_e( 'We are not sure what are you looking for. Maybe try a search or go home by', 'brideliness' ); ?>
					<a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('click here', 'brideliness');?></a>
				</p>
			</div>
			<?php get_search_form(); ?>
	
		</main><!-- end of Main content -->
		
<?php get_footer(); ?>

