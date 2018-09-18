<?php  /* The template for displaying Lookbook archive Page */

get_header(); 

$args = array( 'post_type' => 'lookbook', 'posts_per_page' => 3 );
$brideliness_lookbook = new WP_Query( $args );
?>

	<main class="site-content col-xs-12 col-md-12 col-sm-12" itemscope="itemscope" itemprop="mainContentOfPage"><!-- Main content -->

		<?php if ( $brideliness_lookbook->have_posts() ) { ?>

		<?php // Start the Loop.
			while ( $brideliness_lookbook->have_posts() ) : $brideliness_lookbook->the_post(); ?>
				
			<?php  get_template_part( 'content', 'lookbook'); ?>
				
				<?php wp_reset_postdata();?>
		<?php endwhile; ?>

		<?php } ?>
	
	</main><!-- #content -->

<?php get_footer(); ?>