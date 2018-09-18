<?php /** The template for displaying Comments **/

if ( post_password_required() ) {return;}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

	<h2 class="comments-title">
		<span>
			<?php
				printf( esc_html__(_n( '1 Comment', '%1$s Comments', get_comments_number(), 'brideliness' )),
					number_format_i18n( get_comments_number() ), get_the_title() );
			?>
		</span>
	</h2>

	<?php wp_list_comments( array('walker' => new brideliness_comments_walker() ) ); ?>
	
	<?php /* Comments pagination */
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :

			$comment_navi_type = brideliness_get_option('comments_pagination','numeric'); 
			if ($comment_navi_type == 'numeric') { ?>
		        <nav class="navigation comment-numeric-navigation"><!-- Comments Nav -->
		            <h1 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'brideliness' ); ?></h1>
		            <span class="page-links-title"><?php esc_html_e('Comments Navigation:', 'brideliness'); ?></span>
		            <?php paginate_comments_links( array(
						'prev_text' => '&larr;',
						'next_text' => '&rarr;',
		              	'type'      => 'plain',
		              )); ?>
		       	</nav><!-- end of Comments Nav -->
			<?php } elseif ($comment_navi_type == 'newold') { ?>
		        <nav class="navigation comment-navigation"><!-- Comments Nav -->
		            <h1 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'brideliness' ); ?></h1>
		            <div class="prev"><?php previous_comments_link( esc_html__( ' Older Comments', 'brideliness' ) ); ?></div>
		            <div class="next"><?php next_comments_link( esc_html__( 'Newer Comments ', 'brideliness' ) ); ?></div>
		        </nav><!-- end of Comments Nav -->
			<?php }
		endif; ?>
		


	<?php if ( ! comments_open() ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'brideliness' ); ?></p>
	<?php endif; ?>

	<?php endif; ?>
	
	<?php if (function_exists('brideliness_comment_form')){brideliness_comment_form();}
		  else {comment_form();}
	?> 

</div><!-- #comments -->

