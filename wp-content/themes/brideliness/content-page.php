<?php /* The template used for displaying page content */ ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>><!-- Page content start-->
		
		<?php
			//Edit link page.
			edit_post_link( esc_html__('Edit', 'brideliness' ), '<span class="edit-link">', '</span>' );
			
			// Page thumbnail.
			if ( has_post_thumbnail()) : ?>
				<div class="thumbnail-wrapper">
					<?php the_post_thumbnail(); ?>
				</div>
			<?php endif;?>

		<div class="entry-content">
			<?php the_content(); ?>
			
			<?php wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'brideliness' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
			?>
		</div>
		
	</div><!-- end of Page content -->
