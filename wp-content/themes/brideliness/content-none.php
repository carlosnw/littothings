<?php /** The template for displaying a "No posts found" message **/
?>

	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e('Nothing Found', 'brideliness' ); ?></h1>
	</header>

	<div class="page-content page-content-none">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

		<p><?php esc_html__( 'Ready to publish your first post? ', 'brideliness'); ?>
			<a href="<?php echo admin_url( 'post-new.php' );?>"><?php esc_html__( 'Get started here', 'brideliness' ); ?></a>.
		</p>

		<?php elseif ( is_search() ) : ?>

		<p class="not-found">
		<?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'brideliness' ); ?>
		</p>
		<?php get_search_form(); ?>

		<?php else : ?>

		<p class="not-found">
		<?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'brideliness' ); ?>
		</p>
		<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->
