<?php /** The template for displaying Archive pages **/

get_header(); ?>

	<main class="site-content<?php if (function_exists('brideliness_main_content_class')) brideliness_main_content_class(); ?>" itemscope="itemscope" itemprop="mainContentOfPage"><!-- Main content -->
			<h2 class="page-title">
				<?php
					if ( is_day() ) :
						printf( esc_html__( 'Daily Archives: %s', 'brideliness' ), get_the_date() );
						
					elseif ( is_month() ) :
						printf( esc_html__( 'Monthly Archives: %s', 'brideliness' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'brideliness' ) ) );

					elseif ( is_year() ) :
						printf( esc_html__( 'Yearly Archives: %s', 'brideliness' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'brideliness' ) ) );

					else :
						esc_html_e( 'Archives', 'brideliness' );
					endif;
					?>
			</h2>
		
		<?php if ( have_posts() ) : ?>
			
			<?php 
				if ( brideliness_get_option('blog_frontend_layout')=='grid' || brideliness_get_option('blog_frontend_layout')=='grid_filter' || (isset( $_GET['b_type'] ) && $_GET['b_type']!=='infinite' )) {
					echo "<div class='blog-grid-wrapper' data-isotope=container data-isotope-layout=masonry data-isotope-elements=post>";
				}
				
				// Start the Loop.
				while ( have_posts() ) : the_post();

					get_template_part( 'content', get_post_format() );

				endwhile;
				
					if (brideliness_get_option('blog_frontend_layout')=='grid' || brideliness_get_option('blog_frontend_layout')=='grid_filter' || (isset( $_GET['b_type'] ) && $_GET['b_type']!=='infinite' )) { echo "</div>"; }
			
				// Previous/next page navigation.
				get_template_part( 'part-templates/pagination' );

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );
					
				endif;
			?>
				
	</main><!-- end of Main content -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>

