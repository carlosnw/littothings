<?php  /* The Template for displaying all single posts */

get_header(); ?>

	<main class="site-content col-xs-12 col-md-12 col-sm-12" itemscope="itemscope" itemprop="mainContentOfPage"><!-- Main content -->

		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();
			
				 get_template_part( 'content', 'lookbook');

			endwhile;
		?>
		
	</main><!-- end of Main content -->

<?php get_footer(); ?>