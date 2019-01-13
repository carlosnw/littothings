<?php /** The template for displaying Search Results pages **/

get_header(); ?>

	<main class="site-content<?php if (function_exists('brideliness_main_content_class')) brideliness_main_content_class(); ?>" itemscope="itemscope" itemprop="mainContentOfPage"><!-- Main content -->

		<?php 
			if ( have_posts() ) :
			global $query_string;
			query_posts( $query_string . "&s=$s" . '&posts_per_page=5' );
			
			get_search_form();
			
			// Start the Loop.
			while ( have_posts() ) : the_post();
				/*
				* Include the post format-specific template for the content. If you want to
				* use this in a child theme, then include a file called called content-___.php
				* (where ___ is the post format) and that will be used instead.
				*/
				get_template_part( 'content-search', get_post_format() );

			endwhile;

			// Post navigation.	
				$blog_pagination = esc_attr(brideliness_get_option('blog_pagination'));
					
				if ( $wp_query->max_num_pages > 1 ) : ?>

					<?php get_template_part( 'part-templates/pagination' ); ?>
					
				<?php endif; ?>

				<?php else :
				// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );
				endif;
			?>

	</main><!-- #content -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>

