<?php
/*
 * The template for displaying Author bios
 */
?>

<div class="author-info">
	<div class="row">
		<div class="col-xs-12 col-md-2 col-sm-4">
			<div class="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'bireliness_author_bio_avatar_size', 72 ) ); ?>
				<?php brideliness_share_buttons_output(); ?>
			</div><!-- .author-avatar -->
				<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
					<?php printf( esc_html__( 'All posts', 'brideliness' ), get_the_author() ); ?>
				</a>
		</div>
		<div class="col-xs-12 col-md-10 col-sm-4">
			<div class="author-description">
				<p class="written"><?php esc_html_e('written by', 'brideliness'); ?></p>
				<h2 class="author-title"><?php echo esc_attr(get_the_author()); ?></h2>
				<p class="author-bio">
				<?php the_author_meta( 'description' ); ?>
				</p>
			</div><!-- .author-description -->
		</div>
	</div>
</div><!-- .author-info -->
