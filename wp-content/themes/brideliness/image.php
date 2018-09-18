<?php  /* The template for displaying image attachments */
	  
get_header();?>

	<main class="site-content<?php if (function_exists('brideliness_main_content_class')) brideliness_main_content_class(); ?>" itemscope="itemscope" itemprop="mainContentOfPage"><!-- Main content -->

		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();?>
				
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemprop="ImageObject">

				<div class="entry-attachment"><!-- .entry-attachment (start)-->
					<div class="attachment-image">
						<?php echo wp_get_attachment_image( $post->ID, 'attach-page-image-thumb', false, array('itemprop' => 'thumbnail') ); ?>
					</div>
				</div><!-- .entry-attachment (end)-->
					
				<div class="entery-content"><!-- .entry-content (start)-->
						
					<?php edit_post_link( esc_html__( 'Edit', 'brideliness' ), '<span class="edit-link">', '</span>' ); ?>
							
					<header><!-- .entry-header (start)-->
						<h2 class="entry-title"><?php the_title(); ?></h2>
					</header><!-- .entry-header (end)-->

					<?php if ( has_excerpt() ) : ?>
						<div class="entry-caption"><!-- .entry-caption (start)-->
							<?php esc_attr(the_excerpt()); ?>
						</div><!-- .entry-caption (end)-->
					<?php endif; ?>
							
					<?php if ( ! empty( $post->post_content ) ) : ?>
						<div class="entry-description">
							<?php echo $post->post_content; ?>
						</div><!-- .entry-description -->
					<?php endif; ?>
						
					<div class="entry-meta"><!-- .entry-meta (start)-->
						<div class="date"><strong><?php esc_html_e('Date:&nbsp;', 'brideliness'); ?></strong><?php brideliness_entry_publication_time() ?></div>
						<div class="comments"><strong><?php esc_html_e('Comments:&nbsp;', 'brideliness'); ?></strong><?php brideliness_entry_comments_counter(); ?></div>
						<div class="source"><span class="source-title"><strong><?php esc_html_e('Source Image:&nbsp;', 'brideliness'); ?></strong></span>
							<?php 
								$metadata = wp_get_attachment_metadata();
								printf( '<span class="attachment-meta full-size-link"><a href="%1$s" title="%2$s">%3$s (%4$s &times; %5$s)</a></span>',
									esc_url( wp_get_attachment_url() ),
									esc_attr__( 'Link to full-size image', 'brideliness' ),
									esc_html__( 'Full resolution', 'brideliness' ),
									$metadata['width'],
									$metadata['height']
								);
							?>
						</div>
					</div><!-- .entry-meta (end)-->
					
					<nav id="image-navigation" class="navigation image-navigation"><!-- #image-navigation (start)-->
						<div class="nav-links">	
							<?php  previous_image_link( false, wp_kses(__( '<span class="arrow">←</span></i>&nbsp;&nbsp;Previous Image', 'brideliness' ), $allowed_html=array('i' => array('class'=>array())) )); ?>
							<?php  next_image_link( false, wp_kses(__( 'Next Image&nbsp;&nbsp;&nbsp;<span class="next-arrow">&nbsp;&nbsp;<span class="arrow">→</span></span>', 'brideliness' ), $allowed_html=array('i' => array('class'=>array())) )); ?>
						</div>
					</nav><!-- #image-navigation (end)-->	
					
				</div><!-- .entry-content (end)-->
					
				<div class="entry-meta-bottom"><!-- .entry-meta-bottom (start)-->
					<div class="row">
						<div class="col-xs-12 col-md-6 col-sm-6">
							<?php if ( brideliness_get_option('image_share_buttons')=='on'){brideliness_share_buttons_output();} ?>						
						</div>
						<div class="col-xs-12 col-md-6 col-sm-6 right">						
							<i class="icon-speech-bubble"></i><?php if ( function_exists( 'brideliness_entry_comments_counter' ) ) {brideliness_entry_comments_counter();} ?>
							<?php if ( function_exists( 'brideliness_output_like_button') && brideliness_get_option('site_post_likes')=='on' ) { echo '<span class="separator">|</span>'.brideliness_output_like_button( get_the_ID() ); } ?>
						</div>
					</div>
				</div><!-- .entry-meta-bottom (end)-->
					
			</article><!-- #post-## -->

				<?php comments_template(); ?>

			<?php endwhile; // end of the loop. ?>

	</main><!-- end of Main content -->
	
	<?php get_sidebar(); ?>

<?php get_footer(); ?>

