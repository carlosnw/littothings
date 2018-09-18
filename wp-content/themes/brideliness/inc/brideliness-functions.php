<?php

/*-------Brideliness Theme Functions----------*/

	/* Contents:
		1.  Brideliness Replaces the excerpt "More" text
		2.  Brideliness Meta output functions
		3.  Brideliness Header and footer background functions
		4.  Brideliness Main content class
		5.  Brideliness Comment walker
		6.  Brideliness Custom Comment Form
		7.  Brideliness Single content class
		8.  Brideliness Single post navigation	
		9.  Brideliness "Back to top" button
		10. Brideliness Custom media fields function
		11. Brideliness Description meta box
		12. Brideliness Add specials class for body
		13. Brideliness Add custom image sizes attribute to enhance responsive image functionality for post thumbnails
		14. Brideliness Add inline styles
		15. Brideliness Add font for visual composer
		16. Brideliness Add specials function for theme options
		17. Brideliness Main Site wrapper functions
		18. Header Bottom Box Shadow
		19. Extra markup for tiny mce
		20. Add new style to visual composer accordion
		21. Sticky Menu
	*/
 
/* 1. Brideliness Replaces the excerpt "More" text  (start)*/

	function brideliness_excerpt_more() {
		if ( !brideliness_get_option('blog_read_more_text')=='') {
			return brideliness_get_option('blog_read_more_text');
		}
		else { return esc_html__('Continue Reading', 'brideliness'); }
	}
	add_filter('brideliness_more', 'brideliness_excerpt_more');
	
	function brideliness_wrap_more_link($more) {
		return '<div class="wrapper-more link">'.$more.'</div>';
	}
	add_filter('the_content_more_link','brideliness_wrap_more_link');
	
	
	function brideliness_excerpt_more_lookbook() {
		if ( !brideliness_get_option('lookbook_read_more_text')=='') {
			return brideliness_get_option('lookbook_read_more_text');
		}
		else { return esc_html__('Shop Look', 'brideliness'); }
	}
	add_filter('brideliness_lookbook_more', 'brideliness_excerpt_more_lookbook');
	
/* 1. Brideliness Replaces the excerpt "More" text  (end)*/

/* 2. Brideliness Meta output functions (start)*/

	if ( ! function_exists( 'brideliness_entry_publication_time' ) ) {
		function brideliness_entry_publication_time($brideliness_day='j', $brideliness_month='M', $brideliness_year='Y') {?>
		<div class="time-wrapper">
			<?php printf('<time class="entry-date" datetime="%1$s" itemprop="datePublished">%3$s<span class="day"> %2$s<span class="delimeter">,</span></span> <span class="year">%4$s</span> </time>',
			esc_attr( get_the_date('c')),
			esc_html( get_the_date($brideliness_day)),
			esc_html( get_the_date($brideliness_month)),
			esc_html( get_the_date($brideliness_year))
			); ?>
		</div>
		<?php 
			$last_modified_time = get_the_modified_date('F j, Y');
			if ($last_modified_time && $last_modified_time!='') {
					echo '<meta itemprop="dateModified" content="'. esc_attr($last_modified_time) .'">';
			}
		 }
	}

	if ( ! function_exists( 'brideliness_entry_comments_counter' ) ) {
		function brideliness_entry_comments_counter() {?>
			<div class="post-comments <?php if(post_password_required()){echo'comment-required';}?>" itemprop="interactionCount">
				<?php comments_popup_link( '0', '1', '%', 'comments-link', esc_html__('off', 'brideliness')); ?>
				<span class="comments"><?php esc_html_e('comments', 'brideliness'); ?></span>	
			</div>
		<?php }
	}

	if ( ! function_exists( 'brideliness_entry_post_cats' ) ) {
		function brideliness_entry_post_cats() {
			$brideliness_categories_list = get_the_category_list( esc_html__( ', ', 'brideliness' ) );
			if ( $brideliness_categories_list ) { ?> 
			<div class="post-cats" itemprop="articleSection"><span class="category"><?php esc_html_e('In ', 'brideliness'); ?></span> <?php echo wp_kses_post($brideliness_categories_list); ?></div>
			<?php }
		}
	}

	function brideliness_entry_post_tags() {
		$brideliness_tag_list = get_the_tag_list();
			if ( $brideliness_tag_list ) { ?> 
			<div class="post-tags"><span><?php esc_html_e('Tag:', 'brideliness'); ?></span> <div class="post-tags-list"><?php echo wp_kses_post($brideliness_tag_list); ?></div></div>
			<?php }
	}

	if ( ! function_exists( 'brideliness_entry_author' ) ) {
		function brideliness_entry_author() {
			$brideliness_author = sprintf( '<div class="post-author">by<a href="%1$s" title="%2$s" itemscope="itemscope" itemtype="http://schema.org/Person">  %3$s</a></div>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_attr( sprintf( esc_html__( 'View all posts by %s', 'brideliness' ), get_the_author() ) ),
				get_the_author()
			);
		echo $brideliness_author; 
		}
	}

	if ( ! function_exists( 'brideliness_entry_post_views' ) ) {
		function brideliness_entry_post_views() {
			global $post;
			$brideliness_views = get_post_meta ($post->ID,'views',true);
			if ($brideliness_views) { 
				return '<div class="post-views" title="Total Views"><i class="fa fa-eye"></i>'.esc_attr($brideliness_views).'</div>';
			 } else { 
				return '<div class="post-views" title="Total Views"><i class="fa fa-eye"></i>0</div>';
			 }
		}
	}

	if ( ! function_exists( 'brideliness_entry_post_format' ) ) {
		function brideliness_entry_post_format() {
			global $post;
			$format = get_post_format($post->ID);
			if ( false === $format ) { $format = 'standard'; }
			$icons = array(
				'aside' => '<i class="fa fa-comment-o"></i>',
				'standard' => '<i class="fa fa-file-text-o"></i>',
				'chat' => '<i class="fa fa-users"></i>', 
				'gallery' => '<i class="fa fa-picture-o"></i>', 
				'link' => '<i class="fa fa-link"></i>', 
				'image' => '<i class="fa fa-camera-retro"></i>', 
				'quote' => '<i class="fa fa-quote-right"></i>', 
				'status' => '<i class="fa fa-exclamation-circle"></i>', 
				'video' => '<i class="fa fa-film"></i>', 
				'audio' => '<i class="fa fa-headphones"></i>', 
			);
			echo '<span class="post-format">'.wp_kses($icons[$format], $allowed_html=array('i' => array( 'class'=>array()))).'</span>';
		}
	}

/* 2. Brideliness Meta output functions (end)*/

/* 3. Header and Footer Background functions (start)*/

	// Hader Background (start)
	if (!function_exists('brideliness_custom_header_bg')) {
		function brideliness_custom_header_bg() {
			$background = brideliness_get_option('header_bg');
			if ( $background ) {
				if ( $background['image'] ) {
					echo ' style="background-image:url('. esc_url($background['image']) .');
											  background-repeat:'. esc_attr($background['repeat']) .';
											  background-position:'. esc_attr($background['position']) .';
											  background-attachment:'. esc_attr($background['attachment']) .';
											  background-color:'. esc_attr($background['color']) .'"';
				} else {
					echo ' style="background-color:'. esc_attr($background['color']) .';"';
				}
			} else {
				return false;
			};
		}
	}
	// Hader Background (end)	

	// Footer Background  (start)
	if (!function_exists('brideliness_custom_footer_bg')) {
		function brideliness_custom_footer_bg() {
			$background = brideliness_get_option('footer_bg');
			if ( $background ) {
				if ( $background['image'] ) {
					echo ' style="background-image:url('. esc_url($background['image']) .');
											  background-repeat:'. esc_attr($background['repeat']) .';
											  background-position:'. esc_attr($background['position']) .';
											  background-attachment:'. esc_attr($background['attachment']) .';
												background-color:'. esc_attr($background['color']) .'"';
				} else {
					echo ' style="background-color:'. esc_attr($background['color']) .';"';
				}
			} else {
				return false;
			};
		}
	}
	
	if (!function_exists('brideliness_custom_footer_bottom_bg')) {
		function brideliness_custom_footer_bottom_bg() {
			$background = brideliness_get_option('footer_bottom_bg');
			if ( $background ) {
				if ( $background['image'] ) {
					echo ' style="background-image:url('. esc_url($background['image']) .');
											  background-repeat:'. esc_attr($background['repeat']) .';
											  background-position:'. esc_attr($background['position']) .';
											  background-attachment:'. esc_attr($background['attachment']) .';
												background-color:'. esc_attr($background['color']) .'"';
				} else {
					echo ' style="background-color:'. esc_attr($background['color']) .';"';
				}
			} else {
				return false;
			};
		}
	}
	// Footer Background  (end)

	if (!function_exists('brideliness_custom_page_title_bg')) {
		function brideliness_custom_page_title_bg() {
			$background = brideliness_get_option('page_title_bg');
			if ( $background ) {
				if ( $background['image'] ) {
					echo ' style="background-image:url('. esc_url($background['image']) .');
											  background-repeat:'. esc_attr($background['repeat']) .';
											  background-position:'. esc_attr($background['position']) .';
											  background-attachment:'. esc_attr($background['attachment']) .';
												background-color:'. esc_attr($background['color']) .'"';
				} else {
					echo ' style="background-color:'. esc_attr($background['color']) .';"';
				}
			} else {
				return false;
			};
		}
	}
	// Footer Background  (end)
	
/* 3. Header and Footer Background functions (end)*/

/* 4. Brideliness Main Content class (start)*/

	if (!function_exists('brideliness_main_content_class')) {
		function brideliness_main_content_class(){
			if ( brideliness_show_layout()=='layout-one-col' ) {
				$content_class = "col-xs-12 col-md-12 col-sm-12";
			} 
			elseif ( brideliness_show_layout()=='layout-two-col-left' ) {
				$content_class = "site-content col-xs-12 col-md-9 col-sm-8 col-md-push-3 col-sm-push-4"; 
			}
			else {
				$content_class = " col-xs-12 col-md-9 col-sm-9";
			}
					
		/* Live preview */
			if( isset( $_GET['b_type'] ) ){ 
					$blog_type = esc_attr($_GET['b_type']);
					if ( $blog_type=='2cols' || $blog_type=='3cols' || $blog_type=='4cols') {
						$content_class = "col-xs-12 col-md-12 col-sm-12";
					}
				} else {
					$blog_type = '';
				}
		/* Advanced Blog layout */
				if (get_option('blog_frontend_layout')=='grid'|| isset( $_GET['b_type'] )) {
					$content_class .= ' grid-layout '.esc_attr(get_option('blog_grid_columns') .$blog_type);
				}
				
			echo esc_attr($content_class);
		}
	}
	
/* 4. Brideliness Main Content class (end)*/

/* 5. Brideliness Comment Walker (start) */

	if ( ! class_exists('brideliness_comments_walker')) {
		class brideliness_comments_walker extends Walker_Comment {
			var $tree_type = 'comment';
			var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );

			// wrapper for child comments list
			function start_lvl( &$output, $depth = 0, $args = array() ) {
				$GLOBALS['comment_depth'] = $depth + 1; ?>
				<div class="child-comments comments-list">
			<?php }

			// closing wrapper for child comments list
			function end_lvl( &$output, $depth = 0, $args = array() ) {
				$GLOBALS['comment_depth'] = $depth + 1; ?>
				</div>
			<?php }

			// HTML for comment template
			function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
			  $depth++;
			  $GLOBALS['comment_depth'] = $depth;
			  $GLOBALS['comment'] = $comment;
			  $parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' );
			  $add_below = 'comment';

			if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type )	{ ?>
			<article <?php comment_class( '', $comment ); ?> id="comment-<?php comment_ID() ?>" itemscope itemtype="http://schema.org/UserComments">
				<?php edit_comment_link(esc_html__('Edit', 'brideliness'),'',''); ?>
				<header class="comment-meta">
						<?php esc_html_e( 'Pingback:', 'brideliness' ); ?> <?php esc_url(comment_author_link( $comment )); ?> <?php esc_url(edit_comment_link(esc_html__('Edit', 'brideliness'),'','')); ?>
				</header>
					<?php } else { ?>
			<article <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>" itemscope itemtype="http://schema.org/UserComments">
			  <?php edit_comment_link('Edit','',''); ?>
			  <figure class="gravatar"><?php echo get_avatar( $comment, 72, '', esc_html__("Author's gravatar", "brideliness") ); ?></figure>

			 <div class="comment-wrapper">
			  <header class="comment-meta">
				<h3 class="comment-author" itemprop="creator" itemscope="itemscope" itemtype="http://schema.org/Person">
				  <?php if (get_comment_author_url() != '') { ?>
					<a class="comment-author-link" href="<?php esc_url(comment_author_url()); ?>" itemprop="url"><span itemprop="name"><?php esc_attr(comment_author()); ?></span></a>
				  <?php } else { ?>
					<span class="author" itemprop="name"><?php esc_attr(comment_author()); ?></span>
				  <?php } ?>
				</h3>
				<div class="comment-time"><time class="comment-meta-time" datetime="<?php comment_date('Y-m-d') ?>T<?php comment_time('H:iP') ?>" itemprop="commentTime"><?php comment_date('F d, Y') ?> <?php esc_html_e('at ','brideliness'); comment_time('H:i a.')?></time></div>
			  </header>

			  <?php if ($comment->comment_approved == '0') : ?>
				<p class="comment-meta-item"><?php esc_html_e('Your comment is awaiting moderation.', 'brideliness'); ?></p>
			  <?php endif; ?>

			  <div class="comment-content post-content" itemprop="commentText">
				<?php comment_text() ?>
					<div class="wrapper-edit-replay-link">
						<i class="fa fa-reply" aria-hidden="true"></i>
						<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				  </div>
			  </div>

					<?php } // end for else ?>

			<?php }
			// end_el – closing HTML for comment template
			function end_el( &$output, $comment, $depth = 0, $args = array() ) { ?>
			</div>
				</article>
			<?php }

		}
	}
	
/* 5. Brideliness Comment Walker (end) */

/* 6. Brideliness Custom Comment Form (start) */

if ( ! function_exists( 'brideliness_comment_form' ) ) {
	function brideliness_comment_form() {

	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$user = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	$custom_args = array(
	    'id_form'           => 'commentform',
	    'id_submit'         => 'submit',
	    'title_reply' 		=> wp_kses(esc_html__( 'Leave a Reply', 'brideliness') , $allowed_html=array('span' => array('href'=>array()))),
	    'title_reply_to'    => esc_html__( 'Leave Your Reply to %s', 'brideliness' ),
	    'cancel_reply_link' => esc_html__( 'Cancel Reply', 'brideliness' ),
	    'label_submit'		=> esc_html__( 'Submit', 'brideliness'),
		'fields' => apply_filters( 'comment_form_default_fields', array(
						'author' =>	'<p class="comment-form-author">
										<label for="author">'. esc_html__( 'Name', 'brideliness' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label>
										<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" aria-required="true"/>
									</p>',
						'email'   =>'<p class="comment-form-email">
										<label for="email">'. esc_html__( 'E-mail', 'brideliness' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label>
										<input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" aria-required="true" aria-describedby="email-notes" />
									</p>',
						'url' 	  =>'<p class="comment-form-url">
										<label for="url">'. esc_html__( 'Website', 'brideliness' ) . '</label>
										<input id="url" name="url" type="text" value="' . esc_url( $commenter['comment_author_url'] ) . '"/>
									</p>',
									
		)),
		'comment_field' => '<p class="comment-form-comment">
								<label for="comment">' . esc_html__( 'Comment ', 'brideliness' ) . '</label>
								<textarea id="comment" name="comment" cols="38" rows="8" aria-required="true"></textarea>
							</p>',
	    'must_log_in' => '<p class="must-log-in">'.
	                          sprintf( wp_kses( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'brideliness' ), $allowed_html=array('a' => array('href'=>array())) ), wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) ).
	                     '</p>',

	    'logged_in_as' => '<p class="logged-in-as">'.
	                           sprintf( '%1$s<a href="%2$s">%3$s</a>. <a href="%4$s" title="%5$s">%6$s</a>',
	                            esc_html__('Logged in as ', 'brideliness'),
	                            esc_url(admin_url( 'profile.php' )),
	                            $user_identity,
	                            wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ),
	                            esc_html__('Log out of this account', 'brideliness'),
	                            esc_html__('Log out?', 'brideliness') ).
	                      '</p>',

	    'comment_notes_before' => '<p class="comment-notice">'.esc_html__('Your email address will not be published. Required fields are marked', 'brideliness').'<span class="required">*</span></p>',
	    'comment_notes_after' => '',
	    );
	    comment_form( $custom_args );
	}
}

add_filter('comment_form_fields', function($fields) {
	return array_merge(array_splice($fields, 1), $fields);
});

/* 6. Brideliness Custom Comment Form (end) */

/* 7. Brideliness Single Content Class (start) */

if (!function_exists('brideliness_single_content_class')) {
	function brideliness_single_content_class() {
		$classes = '';
		if (brideliness_get_option('blog_frontend_layout')=='grid' && !is_single() && !is_search() ) {
			$blog_cols = brideliness_get_option('blog_grid_columns');
			switch ($blog_cols) {
				case 'cols-2':
					$classes = 'col-md-6 col-sm-12 col-xs-12 post-grid cols-2';
				break;
				case 'cols-3':
					$classes = 'col-md-4 col-sm-6 col-xs-12 post-grid cols-3';
				break;
				case 'cols-4':
					$classes = 'col-md-3 col-sm-6 col-xs-12 post-grid cols-4';
				break;
			}
		}
		else{$classes ='post-list';}
		
		/* Live preview */
		if( isset( $_GET['b_type'] ) ){
			$blog_type = $_GET['b_type'];
			switch ($blog_type) {
				case '2cols':
					$classes = 'col-md-6 col-sm-12 col-xs-12 post-grid cols-2';
				break;
				case '3cols':
					$classes = 'col-md-4 col-sm-6 col-xs-12 post-grid cols-3';
				break;
				case '4cols':
					$classes = 'col-md-3 col-sm-6 col-xs-12 post-grid cols-4';
				break;
				case 'sblog':
					$classes = 'post-list';
				break;
			}
		}
		return esc_attr($classes);
	}
}

/* 7. Brideliness Single Content Class (end) */

/* 8. Single post Navigation (start)*/	

if ( ! function_exists( 'brideliness_post_nav' ) ) :
	function brideliness_post_nav() {
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );
		if ( ! $next && ! $previous ) {
			return;
		}
		else{ ?>
			
		<nav class="single-post-navigation">
			<div class="row">
				<div class="col-xs-12 col-md-6 col-sm-6">
					<?php $prevPost = get_previous_post(true);
					if($prevPost) : ?>
					<div class="previous">
						<?php $prevthumbnail ='<div class="previous-thumbnail">'.get_the_post_thumbnail($prevPost->ID, 'brideliness-navi-thumb' ).'</div>'  ?>
						<?php $previous_brideliness=wp_kses(__('<span class="previous-arrow"><span class="arrow">&larr;</span>previous</span>' ,'brideliness'), $allowed_html=array('span' => array('class'=>true))) ?>
						<?php previous_post_link('%link', "<div class='content-wrapper'>$previous_brideliness <h3>%title</h3></div> $prevthumbnail", true); ?>
					</div>
					<?php endif;?>
				</div>
				<div class="col-xs-12 col-md-6 col-sm-6">
					<?php $nextPost = get_next_post(true);
					if($nextPost) : ?>
					<div class="next">
						<?php $nextthumbnail ='<div class="next-thumbnail">'.get_the_post_thumbnail($nextPost->ID, 'brideliness-navi-thumb' ).'</div>'   ?>
						<?php $next_brideliness=wp_kses(__('<span class="next-arrow">next<span class="arrow">&rarr;</span></span>','brideliness'), $allowed_html=array('span' => array('class'=>true)) )?>
						<?php next_post_link('%link',"<div class='content-wrapper'>$next_brideliness  <h3>%title</h3></div> $nextthumbnail", true); ?>
					</div>
					<?php endif;?>
				</div>
			</div>
		</nav>
			
		<?php }
	}
	endif;

/* 8. Single post Navigation (end)*/

/* 9. Brideliness "Back to top" button (start)*/

	function brideliness_to_top_button(){ ?>

		<div id="toTop">
			<div class="toTop-pointer">
				<i class="fa fa-angle-up first"></i>
				<i class="fa fa-angle-up second"></i>
				<i class="fa fa-angle-up third"></i>
			</div>
			<p class="toTopText"><?php esc_html_e('Back To Top', 'brideliness');?></p>
		</div>
	
	<?php }

/* 9. Brideliness "Back to top" button (start)*/

/* 10. Brideliness custom media fields function (start)*/
	
	function brideliness_custom_media_fields( $form_fields, $post ) {
		$form_fields['portfolio_filter'] = array(
			'label' => esc_html__('Portfolio Filters', 'brideliness'),
			'input' => 'text',
			'value' => get_post_meta( $post->ID, 'portfolio_filter', true ),
			'helps' => esc_html__('Used only for Portfolio and Gallery Pages Isotope filtering', 'brideliness'),
	);
		return $form_fields;
	}

	add_filter( 'attachment_fields_to_edit', 'brideliness_custom_media_fields', 10, 2 );

	function brideliness_custom_media_fields_save( $post, $attachment ) {
		if( isset( $attachment['portfolio_filter'] ) )
			update_post_meta( $post['ID'], 'portfolio_filter', $attachment['portfolio_filter'] );
		if( isset( $attachment['hover_style'] ) )
			update_post_meta( $post['ID'], 'hover_style', $attachment['hover_style'] );
		return $post;
	}
	add_filter( 'attachment_fields_to_save', 'brideliness_custom_media_fields_save', 10, 2 );

/* 10. Brideliness custom media fields function (end)*/	

/* 11. Brideliness description meta box (start)*/

add_action('add_meta_boxes', 'brideliness_description_add_meta_box');
add_action( 'save_post', 'brideliness_description_save_postdata' );

function brideliness_description_add_meta_box() {
	add_meta_box( 'brideliness_page_title', 'Page description', 'brideliness_description_meta_box_callback', 'page', 'side' );
}

function brideliness_description_meta_box_callback($post) {

	wp_nonce_field( 'brideliness_description_meta_box_callback', 'brideliness_page_title_meta_box_nonce' ); ?>

	<label for="brideliness_description_page"><?php esc_html__("Description for this field", 'brideliness' ); ?></label>
	<input type="text" id= "brideliness_description_page" name="brideliness_description_page" value="<?php echo esc_attr(get_post_meta($post->ID, '_title_brideliness_description_meta_value_key', true)); ?>" placeholder="<?php esc_html_e('Description here', 'brideliness');?>"/>

	<?php }

function brideliness_description_save_postdata( $post_id ) {

	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return;

	if ( ! isset( $_POST['brideliness_page_title_meta_box_nonce'] ) )
		return;
	
	if ( ! wp_verify_nonce( $_POST['brideliness_page_title_meta_box_nonce'], 'brideliness_description_meta_box_callback' ) )
		return;
	
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['brideliness_description_page'] );

	update_post_meta( $post_id, '_title_brideliness_description_meta_value_key', $my_data );
}

/* 11. Brideliness description meta box (end)*/

/* 12. Brideliness add specials class for body (start)*/

	add_filter('body_class','brideliness_fixed_menu');
	function brideliness_fixed_menu( $classes ) {

		if( brideliness_get_option('fixed_header') )
			$classes[] = 'fixed-menu';

		return $classes;
	}

/* 12. Brideliness add specials class for body (end)*/

/* 13. Brideliness add custom image sizes attribute to enhance responsive image functionality for post thumbnails (start)*/

function brideliness_post_thumbnail_sizes_attr($attr, $attachment, $size) {
		 switch ($size) {
			 case 'post-thumbnail':
			 		if (brideliness_show_layout()=='layout-one-col') {
			 				$attr['sizes'] = '(max-width: 768px) 92vw, (max-width: 992px) 718px, (max-width: 1200px) 938px, 1138px';
					} else {
							$attr['sizes'] = '(max-width: 768px) 92vw, (max-width: 992px) 468px, (max-width: 1200px) 696px, 820px';
					}
			 break;
			 case 'shop_single':
					if (brideliness_show_layout()=='layout-one-col') {
						 $attr['sizes'] = '(max-width: 768px) 92vw, (max-width: 992px) 345px, (max-width: 1200px) 455px, 555px';
				  } else {
						 $attr['sizes'] = '(max-width: 768px) 92vw, (max-width: 992px) 400px, (max-width: 1200px) 334px, 409px';
					}
			 break;
			 case 'full':
					$attr['sizes'] = '(max-width: 768px) 92vw, (max-width: 992px) 970px, (max-width: 1200px) 1170px, 1200px';
			 break;
		 };
     return $attr;
 }
add_filter('wp_get_attachment_image_attributes', 'brideliness_post_thumbnail_sizes_attr', 10 , 3);

/* 13. Brideliness add custom image sizes attribute to enhance responsive image functionality for post thumbnails (end)*/

/* 14. Brideliness Add inline styles (start)*/

	//Menu inline style
	if ( !function_exists( 'brideliness_add_inline_menu_styles' ) ) {
		function brideliness_add_inline_menu_styles() {
		/* Variables */
		$main_menu_color=esc_attr(brideliness_get_option('main_menu_color_item'));
		$main_menu_hover_color=esc_attr(brideliness_get_option('main_menu_color_item_hover'));

		$out = 'header.fixed-header #mega-menu-wrap-primary-nav #mega-menu-primary-nav > li.mega-menu-item > a.mega-menu-link{
				color: '.esc_attr($main_menu_color).';
			}
			header.fixed-header #mega-menu-wrap-primary-nav #mega-menu-primary-nav > li.mega-menu-item > a.mega-menu-link:hover{
				color: '.esc_attr($main_menu_hover_color).';
			}	
			@media (max-width: 800px){
				header.fixed #mega-menu-wrap-primary-nav #mega-menu-primary-nav > li.mega-menu-item > a.mega-menu-link{
					color: '.esc_attr($main_menu_color).';
			}
			header.fixed #mega-menu-wrap-primary-nav #mega-menu-primary-nav > li.mega-menu-item > a.mega-menu-link:hover,
			header.fixed #mega-menu-wrap-primary-nav #mega-menu-primary-nav > li.mega-menu-item > a.mega-menu-link:focus,
			header.fixed #mega-menu-wrap-primary-nav #mega-menu-primary-nav > li.mega-menu-item.mega-toggle-on > a.mega-menu-link{
				color: '.esc_attr($main_menu_hover_color).';
				}	
			}';
			wp_add_inline_style( 'brideliness-basic', $out );
		}
	}
	if(brideliness_get_option('main_menu_color_item') || brideliness_get_option('main_menu_color_item')){
		add_action ( 'wp_enqueue_scripts', 'brideliness_add_inline_menu_styles' );
	}
	
	//Inline style
	if ( !function_exists( 'brideliness_add_inline_styles' ) ) {
		function brideliness_add_inline_styles() {
		/* Variables */
		$main_text = brideliness_get_option('primary_text_typography');
		$secondary_text_color = brideliness_get_option('secondary_text_color');
		$content_headings = brideliness_get_option('content_headings_typography');
		$sidebar_headings = brideliness_get_option('sidebar_headings_typography');
		$footer_headings = brideliness_get_option('footer_headings_typography');
		$footer_text_color = brideliness_get_option('footer_text_color');
		$link_color = brideliness_get_option('link_color');
		$link_color_hover = brideliness_get_option('link_color_hover');
		$button_typography = brideliness_get_option('button_typography');
		$button_background_color = brideliness_get_option('button_background_color');
		$button_background_hover_color = brideliness_get_option('button_background_hover_color');
		$button_text_hovered_color = brideliness_get_option('button_text_hovered_color');
		$main_decor_color = brideliness_get_option('main_decor_color');
		$main_border_color = brideliness_get_option('main_border_color');
		
		$out = 'body.custom-color-sheme button,
			body.custom-color-sheme .more-link,
			body.custom-color-sheme .widget_search .search-submit,
			body.custom-color-sheme .widget_search .search-submit,
			body.custom-color-sheme .widget_shopping_cart .widget_shopping_cart_content .buttons a:first-child,
			body.custom-color-sheme .widget_shopping_cart .widget_shopping_cart_content .buttons a.checkout,
			body.custom-color-sheme.woocommerce ul.products li.product  .add_to_cart_button,
			.woocommerce ul.products li.product .add_to_cart_button,
			.woocommerce ul.products li.product	.button.product_type_external,
			.woocommerce ul.products li.product	.button.product_type_grouped,
			.woocommerce ul.products li.product .product_type_variable,
			body.custom-color-sheme.woocommerce ul.products li.product .product_type_external,
			body.custom-color-sheme.woocommerce ul.products li.product .product_type_grouped,
			body.custom-color-sheme.woocommerce ul.products li.product .product_type_simple,
			body.custom-color-sheme.woocommerce ul.products li.product .product_type_variable,
			body.custom-color-sheme.single-product.woocommerce .product-type-simple .single_add_to_cart_button,
			body.custom-color-sheme.woocommerce .cart-collaterals .cart_totals a.checkout-button.button,
			body.custom-color-sheme.woocommerce-page .cart-collaterals .cart_totals a.checkout-button.button,
			body.custom-color-sheme.woocommerce-account.woocommerce-page .woocommerce-MyAccount-content .button,
			.woocommerce-account .woocommerce .u-column1.col-1 .button, 
			.woocommerce-account .woocommerce .u-column2.col-2 .button{
				font-size: '. esc_attr($button_typography['size']) .';
				font-weight: '. esc_attr($button_typography['style']) .';
				color: '. esc_attr($button_typography['color']) .';
				font-family: "'.esc_attr(str_replace('_', ' ', $button_typography['face'])).'", sans-serif;	
			}
			input[type=submit],
			input[type="button"],
			input[type="reset"],
			.comment-form .form-submit input,
			body.custom-color-sheme input[type=submit],
			body.custom-color-sheme input[type="button"],
			body.custom-color-sheme input[type="reset"],
			body.custom-color-sheme .brideliness-get-more-posts{
				color: '. esc_attr($button_typography['color']) .';
				background:'.esc_attr($button_background_color).';
				box-shadow: none;
			}
			input[type=submit]:hover,
			input[type="button"]:hover,
			input[type="reset"]:hover,
			body.custom-color-sheme input[type=submit]:hover,
			body.custom-color-sheme input[type="button"]:hover,
			body.custom-color-sheme input[type="reset"]:hover{
				color:'.esc_attr($button_text_hovered_color).';
			}
			body.custom-color-sheme .brideliness-get-more-posts:hover{
				background: #ffffff;
				color:#585858;
				box-shadow: inset 0 0 0 2px hsl(0, 0%, 100%), inset 0 0 0 3px hsl(0, 0%, 91%);
			}
			body.custom-color-sheme input[type=submit]:hover,
			body.custom-color-sheme input[type="button"]:hover,
			body.custom-color-sheme input[type="reset"]:hover,
			body.custom-color-sheme .widget_search .search-submit:hover,
			body.custom-color-sheme .widget_search .search-submit:hover,
			body.custom-color-sheme .wysija-submit:hover{
				background:'.esc_attr($button_background_hover_color).';
				box-shadow:none;
			}
			body.custom-color-sheme button,
			.single-product.woocommerce.single_type_3 .product-type-variable .single_variation_wrap .single_add_to_cart_button,
			.woocommerce-account .woocommerce .u-column1.col-1 .button,
			.woocommerce-account .woocommerce .u-column2.col-2 .button,
			body.custom-color-sheme .more-link,
			body.custom-color-sheme.woocommerce ul.products li.product  .added_to_cart,
			body.custom-color-sheme.single-product.woocommerce .product-type-simple .single_add_to_cart_button,
			body.custom-color-sheme.woocommerce .cart-collaterals .cart_totals a.checkout-button.button,
			body.custom-color-sheme.woocommerce-page .cart-collaterals .cart_totals a.checkout-button.button,
			body.custom-color-sheme.woocommerce-page .return-to-shop a.wc-backward,
			body.custom-color-sheme.woocommerce-account.woocommerce-page .woocommerce-MyAccount-content .button,
			body.custom-color-sheme #place_order,
			.woocommerce form.checkout_coupon input.button,
			.single-product.woocommerce.single_type_2  .single_add_to_cart_button,
			.single-product.woocommerce-page.single_type_2  .single_add_to_cart_button,
			.single-product.woocommerce.single_type_2  .product_type_external,
			.single-product.woocommerce-page.single_type_2  .product_type_external,
			.single-product.woocommerce.single_type_3 .product-type-grouped .single_add_to_cart_button,
			.single-product.woocommerce.single_type_3 .product-type-external .single_add_to_cart_button,
			.single-product.woocommerce.single_type_1 div.product.product-type-grouped .single_add_to_cart_button,
			.single-product.woocommerce .product-type-variable .single_variation_wrap .single_add_to_cart_button,
			.single-product.woocommerce.single_type_1 .product-type-external .single_add_to_cart_button,
			.single-product.woocommerce-page.single_type_1 .product-type-external .single_add_to_cart_button,
			.search .site-content .search-form .search-submit{
				background:'.esc_attr($button_background_color).';
				box-shadow: inset 0 0 0 2px '.esc_attr($button_background_color).', inset 0 0 0 3px hsl(0, 0%, 100%);
			}
			.widget_shopping_cart .widget_shopping_cart_content .buttons a.checkout{
				background:'.esc_attr($button_background_color).';
			}
			.widget_shopping_cart .widget_shopping_cart_content .buttons a.checkout:before{
				border-color:'.esc_attr($button_background_color).';	
			}
			.widget_shopping_cart .widget_shopping_cart_content .buttons a:first-child:before{
				border-color:'.esc_attr($button_background_hover_color).';
			}
			.widget_shopping_cart .widget_shopping_cart_content .buttons a:first-child{
				background:'.esc_attr($button_background_hover_color).';
			}
			.widget_shopping_cart .widget_shopping_cart_content .buttons a:first-child:hover,
			body.custom-color-sheme .widget_shopping_cart .widget_shopping_cart_content .buttons a:first-child:hover{
				color:'.esc_attr($button_background_hover_color).';
			}
			body.custom-color-sheme .widget_shopping_cart .widget_shopping_cart_content .buttons a.checkout:hover,
			.search .site-content .search-form .search-submit:hover{
				color:'.esc_attr($button_background_color).';
			}
			body.custom-color-sheme.woocommerce ul.products li.product  .add_to_cart_button:before,
			body.custom-color-sheme.woocommerce ul.products li.product  .product_type_external:before,
			body.custom-color-sheme.woocommerce ul.products li.product .product_type_grouped:before,
			body.custom-color-sheme.woocommerce ul.products li.product .product_type_simple:before,
			body.custom-color-sheme.woocommerce ul.products li.product .roduct_type_variable:before,
			.woocommerce ul.products li.product .add_to_cart_button:before,
			.woocommerce ul.products li.product .product_type_external:before,
			.woocommerce ul.products li.product .product_type_grouped:before,
			.woocommerce ul.products li.product .product_type_simple:before,
			.woocommerce ul.products li.product .roduct_type_variable:before,
			.woocommerce ul.products li.product:hover  .add_to_cart_button:before,
			.woocommerce ul.products li.product:hover  .added_to_cart:before,
			.woocommerce ul.products li.product:hover  .product_type_external:before,
			.woocommerce ul.products li.product:hover .product_type_grouped:before,
			.woocommerce ul.products li.product:hover .product_type_simple:before,
			.woocommerce ul.products li.product:hover .roduct_type_variable:before{
				border-color:'.esc_attr($button_background_color).';
			}
			body.custom-color-sheme.woocommerce ul.products li.product  .add_to_cart_button,
			body.custom-color-sheme.woocommerce ul.products li.product  .product_type_external,
			body.custom-color-sheme.woocommerce ul.products li.product .product_type_grouped,
			body.custom-color-sheme.woocommerce ul.products li.product .product_type_simple,
			body.custom-color-sheme.woocommerce ul.products li.product .roduct_type_variable,
			.woocommerce ul.products li.product .add_to_cart_button,
			.woocommerce ul.products li.product .product_type_external,
			.woocommerce ul.products li.product .product_type_grouped,
			.woocommerce ul.products li.product .product_type_simple,
			.woocommerce ul.products li.product .roduct_type_variable,
			.woocommerce ul.products li.product:hover  .add_to_cart_button,
			.woocommerce ul.products li.product:hover  .added_to_cart,
			.woocommerce ul.products li.product:hover  .product_type_external,
			.woocommerce ul.products li.product:hover .product_type_grouped,
			.woocommerce ul.products li.product:hover .product_type_simple,
			.woocommerce ul.products li.product:hover .roduct_type_variable{
				background:'.esc_attr($button_background_color).';
			}
			body.custom-color-sheme #place_order:hover,
			.single-product.woocommerce.single_type_1 div.product.product-type-grouped .single_add_to_cart_button:hover,
			.woocommerce form.checkout_coupon input.button:hover,
			.woocommerce-account .woocommerce .u-column1.col-1 .button:hover, 
			.woocommerce-account .woocommerce .u-column2.col-2 .button:hover,
			.single-product.woocommerce.single_type_3   .product-type-variable .single_variation_wrap .single_add_to_cart_button:hover,
			.single-product.woocommerce.single_type_2  .single_add_to_cart_button:hover,
			.single-product.woocommerce-page.single_type_2  .single_add_to_cart_button:hover,
			.single-product.woocommerce.single_type_2  .product_type_external:hover,
			.single-product.woocommerce-page.single_type_2  .product_type_external:hover,
			.single-product.woocommerce.single_type_3 .single_add_to_cart_button:hover,
			.single-product.woocommerce-page.single_type_3 .single_add_to_cart_button:hover,
			.single-product.woocommerce.single_type_3 .product_type_external:hover,
			.single-product.woocommerce-page.single_type_3 .product_type_external:hover,
			.single-product.woocommerce .product-type-variable .single_variation_wrap .single_add_to_cart_button:hover,
			.single-product.woocommerce.single_type_3 .product-type-grouped .single_add_to_cart_button:hover,
			.single-product.woocommerce.single_type_3 .product-type-external .single_add_to_cart_button:hover,
			.single-product.woocommerce .product-type-variable .single_variation_wrap .single_add_to_cart_button:hover,
			.single-product.woocommerce.single_type_1 .product-type-external .single_add_to_cart_button:hover,
			.single-product.woocommerce-page.single_type_1 .product-type-external .single_add_to_cart_button:hover,
			.woocommerce ul.products li.product .add_to_cart_button:hover,
			.woocommerce ul.products li.product .product_type_external:hover,
			.woocommerce ul.products li.product .product_type_grouped:hover,
			.woocommerce ul.products li.product .product_type_simple:hover,
			.woocommerce ul.products li.product .roduct_type_variable:hover,
			.woocommerce ul.products li.product:hover  .add_to_cart_button:hover,
			.woocommerce ul.products li.product:hover  .added_to_cart:hover,
			.woocommerce ul.products li.product:hover  .product_type_external:hover,
			.woocommerce ul.products li.product:hover .product_type_grouped:hover,
			.woocommerce ul.products li.product:hover .product_type_simple:hover,
			.woocommerce ul.products li.product:hover .roduct_type_variable:hover{
				color:'.esc_attr($button_background_color).';
				background:none;
			}
			.woocommerce .shop_table.cart .buttons-update .clear-cart{
				box-shadow: inset 0 0 0 2px '.esc_attr($button_background_color).', inset 0 0 0 3px hsl(0, 0%, 100%);
				color:'.esc_attr($button_background_color).';
			}
			.woocommerce .shop_table.cart .buttons-update .clear-cart:hover{
				box-shadow: inset 0 0 0 2px '.esc_attr($button_background_color).', inset 0 0 0 3px hsl(0, 0%, 100%);
				background:'.esc_attr($button_background_color).';
				color: '. esc_attr($button_typography['color']) .';
			}
			body.custom-color-sheme button:hover,
			body.custom-color-sheme .more-link:hover,
			body.custom-color-sheme.woocommerce ul.products li.product  .added_to_cart:hover,
			body.custom-color-sheme.woocommerce ul.products li.product  .add_to_cart_button:hover,
			body.custom-color-sheme.woocommerce ul.products li.product  .product_type_external:hover,
			body.custom-color-sheme.woocommerce ul.products li.product .product_type_grouped:hover,
			body.custom-color-sheme.woocommerce ul.products li.product .product_type_simple:hover,
			body.custom-color-sheme.woocommerce ul.products li.product .roduct_type_variable:hover,
			body.custom-color-sheme.single-product.woocommerce .product-type-simple .single_add_to_cart_button:hover,
			body.custom-color-sheme.woocommerce .cart-collaterals .cart_totals a.checkout-button.button:hover,
			body.custom-color-sheme.woocommerce-page .cart-collaterals .cart_totals a.checkout-button.button:hover,
			body.custom-color-sheme.woocommerce-account.woocommerce-page .woocommerce-MyAccount-content .button:hover,
			body.custom-color-sheme.woocommerce-page .return-to-shop a.wc-backward:hover{
				background:none;
				color:'.$button_background_color.';
			}
			body.custom-color-sheme .woocommerce-page form.woocommerce-shipping-calculator .button,
			body.custom-color-sheme .woocommerce form.woocommerce-shipping-calculator .button,
			body.custom-color-sheme .woocommerce table.cart .coupon input.button,
			body.custom-color-sheme .woocommerce .shop_table.cart .buttons-update .update-cart,
			.single-product.woocommerce.single_type_1  .wrapper-yith-button a,
			.single-product.woocommerce-page.single_type_1 .wrapper-yith-button a,
			.single-product.woocommerce.single_type_1  .wrapper-yith-button a,
			.single-product.woocommerce-page.single_type_1 .wrapper-yith-button a,
			.single-product.woocommerce div.product .summary   .yith-wcwl-add-to-wishlist a{
				background:'.esc_attr($button_background_hover_color).';
				color: '. esc_attr($button_typography['color']) .';
				box-shadow: inset 0 0 0 2px '.esc_attr($button_background_hover_color).', inset 0 0 0 3px hsl(0, 0%, 100%);
			}
			body.custom-color-sheme .woocommerce-page form.woocommerce-shipping-calculator .button:hover,
			body.custom-color-sheme .woocommerce form.woocommerce-shipping-calculator .button:hover,
			body.custom-color-sheme .woocommerce table.cart .coupon input.button:hover,
			body.custom-color-sheme .woocommerce .shop_table.cart .buttons-update .update-cart:hover,
			.single-product.woocommerce.single_type_1  .wrapper-yith-button a:hover,
			.single-product.woocommerce-page.single_type_1 .wrapper-yith-button a:hover,
			.single-product.woocommerce.single_type_1  .wrapper-yith-button a:hover,
			.single-product.woocommerce-page.single_type_1 .wrapper-yith-button a:hover,
			.single-product.woocommerce div.product .summary   .yith-wcwl-add-to-wishlist a:hover,
			.single-product.woocommerce.single_type_1 div.product .summary   .yith-wcwl-add-to-wishlist a:hover,
			.single-product.woocommerce-page.single_type_1 div.product .summary   .yith-wcwl-add-to-wishlist a:hover{
				background:none;
				color: '. esc_attr($button_background_hover_color) .'!important;	
			}
			body.custom-color-sheme	.content-post,
			body.custom-color-sheme.woocommerce .site-content .entry-content,
			body.custom-color-sheme.single-product.woocommerce div.product div.summary p{
				font-size: '. esc_attr($main_text['size']) .';
				font-weight: '. esc_attr($main_text['style']) .';
				color: '. esc_attr($main_text['color']) .';
				font-family: "'.esc_attr(str_replace('_', ' ', $main_text['face'])).'", sans-serif;
			}
			body.custom-color-sheme	.entery-meta-left,
			body.custom-color-sheme article.post-list .entery-meta-left .time-wrapper,
			body.custom-color-sheme article.post-list .entery-meta-left .post-comments a,
			body.custom-color-sheme.single article.post .entry-content .share h3,
			body.custom-color-sheme.single .post-tags span,
			body.custom-color-sheme.single article.post .entry-content .entry-meta-bottom .post-comments span,
			body.custom-color-sheme.single article.post .entry-content .entry-meta-bottom .post-comments a,
			body.custom-color-sheme.single article.post .entry-content .entry-meta-bottom .like-wrapper span,
			body.custom-color-sheme.single article.post .entry-content .entry-meta-bottom .like-wrapper .liked span.count,
			body.custom-color-sheme.single .author-info .written,
			body.custom-color-sheme.single .author-info .author-bio,
			body.custom-color-sheme.single .comment-meta time,
			body.custom-color-sheme.single .comment-notes, body.custom-color-sheme.single .logged-in-as,
			.comment-form-comment textarea,
			body.custom-color-sheme.single-product.woocommerce .product_meta span.sku_wrapper,
			body.custom-color-sheme.single-product.woocommerce .product_meta span.posted_in,
			body.custom-color-sheme.single-product.woocommerce .product_meta span.tagged_as,
			body.custom-color-sheme.woocommerce .woocommerce-message, body.custom-color-sheme .woocommerce-page .woocommerce-message,
			body.custom-color-sheme.woocommerce .woocommerce .woocommerce-message:before, body.custom-color-sheme.woocommerce .woocommerce-page .woocommerce-message:before,
			body.custom-color-sheme .breadcrumbs-wrapper .breadcrumbs a,
			body.custom-color-sheme .comments-area .comment-content,
			body.custom-color-sheme.single-product.woocommerce .woocommerce-tabs.wc-tabs-wrapper .woocommerce-Tabs-panel p,
			body.custom-color-sheme.single-product.woocommerce .shop_attributes,
			body.custom-color-sheme.single-product.woocommerce #reviews #comments ol.commentlist li  .comment-text .description p, .single-product.woocommerce-page #reviews #comments ol.commentlist li  .comment-text .description p,
			body.custom-color-sheme .woocommerce .woocommerce-breadcrumb a, .woocommerce-page .woocommerce-breadcrumb a,
			.single-product.woocommerce #reviews #comments ol.commentlist li .comment-text p.meta, .single-product.woocommerce-page #reviews #comments ol.commentlist li .comment-text p.meta{
				  color: '. esc_attr($secondary_text_color) .';
			}
			body.custom-color-sheme .entry-title a,
			body.custom-color-sheme .entry-header h1.entry-title,
			body.custom-color-sheme.single  #related_posts h2,
			body.custom-color-sheme.single .comments-area h2,
			body.custom-color-sheme .comment-respond h3,
			body.custom-color-sheme.attachment article .entery-content h2,
			body.custom-color-sheme.single-product.woocommerce div.product div.summary h1.product_title,
			body.custom-color-sheme.single-product.woocommerce-page #content div.product div.summary h1.product_title,
			body.custom-color-sheme.single-product.woocommerce div.product .related h2 span,
			body.custom-color-sheme.single-product.woocommerce-page div.product .related  h2 span,
			body.custom-color-sheme .cart-collaterals .cross-sells .title-wrapper h2 span{
				font-size: '. esc_attr($content_headings['size']) .';
				font-weight: '. esc_attr($content_headings['style']) .';
				color: '. esc_attr($content_headings['color']) .';
				font-family: "'.esc_attr(str_replace('_', ' ', $content_headings['face'])).'", sans-serif;
			}
			body.custom-color-sheme .widget-area.sidebar .widget-title, .widget.specials .widget-title{
				font-size: '. esc_attr($sidebar_headings['size']) .';
				font-weight: '. esc_attr($sidebar_headings['style']) .';
				color: '. esc_attr($sidebar_headings['color']) .';
				font-family: "'.esc_attr(str_replace('_', ' ', $sidebar_headings['face'])).'", sans-serif;
			}
			body.custom-color-sheme .site-footer .widget .widget-title{
				font-size: '. esc_attr($footer_headings['size']) .';
				font-weight: '. esc_attr($footer_headings['style']) .';
				color: '. esc_attr($footer_headings['color']) .';
				font-family: "'.esc_attr(str_replace('_', ' ', $footer_headings['face'])).'", sans-serif;
			}
			body.custom-color-sheme footer.site-footer{
				color: '. esc_attr($footer_text_color) .';
			}
			.custom-color-sheme a,
			.custom-color-sheme .widget_brideliness_shop_filters_widget ul li,
			.custom-color-sheme .widget.widget_brideliness_collapsing_categories ul li a,
			.custom-color-sheme .widget.widget_archive ul li a{
				color: '. esc_attr($link_color) .';
 			}
			.custom-color-sheme a:hover,
			.custom-color-sheme a:active,
			.custom-color-sheme .widget.widget_archive ul li a:hover,
			.custom-color-sheme .widget.widget_brideliness_collapsing_categories ul li a:hover,
			.custom-color-sheme .widget.widget_dash_shop_filters li.is-checked,
			.custom-color-sheme .widget.widget_dash_shop_filters li:hover,
			.custom-color-sheme .breadcrumbs-wrapper .breadcrumbs a:hover,
			.custom-color-sheme .breadcrumbs-wrapper .woocommerce-breadcrumb a:hover,
			.custom-color-sheme .breadcrumbs-wrapper .breadcrumbs a:active,
			.custom-color-sheme .breadcrumbs-wrapper .woocommerce-breadcrumb a:active,
			.widget_brideliness_shop_filters_widget ul li:hover			{
				color: '. esc_attr($link_color_hover) .';
			}
			.custom-color-sheme .special-filter-widget-area,
			.custom-color-sheme.woocommerce .woocommerce-ordering .select2-container .select2-choice,
			.custom-color-sheme .widget.widget_brideliness_collapsing_categories ul li,
			.custom-color-sheme .widget_brideliness_shop_filters_widget .filters-group li,
			.custom-color-sheme article.post-list.has-post-thumbnail .entry-content,
			.custom-color-sheme .widget.widget_archive ul li,
			.custom-color-sheme .widget.widget_calendar #calendar_wrap tfoot tr td:after,
			.custom-color-sheme .sidebar  .brideliness-socials-widget li:first-of-type,
			.custom-color-sheme .sidebar  .brideliness-socials-widget li,
			.custom-color-sheme .widget_brideliness_recent_post_widget ul li,
			.custom-color-sheme .widget_search .search-field,
			.custom-color-sheme.single article.post .entry-content .entry-meta-bottom,
			.custom-color-sheme.single  .single-post-navigation .previous,
			.custom-color-sheme.single  .single-post-navigation .next,
			.custom-color-sheme.single  #related_posts ul li .wrapper-content,
			.custom-color-sheme textarea,
			.custom-color-sheme input[type="text"],
			.custom-color-sheme input[type="email"],
			.custom-color-sheme input[type="search"],
			.custom-color-sheme input[type="password"],
			.custom-color-sheme input[type="tel"],
			.custom-color-sheme .wpcf7-form-control-wrap .wpcf7-textarea,
			.custom-color-sheme.woocommerce-checkout .shop_table.woocommerce-checkout-review-order-table tfoot tr.order-total th,
			.custom-color-sheme.woocommerce-checkout .shop_table.woocommerce-checkout-review-order-table tfoot tr.order-total td,
			.custom-color-sheme.woocommerce-page .shop_table.woocommerce-checkout-review-order-table tr.cart_item td,
			.custom-color-sheme .select2-container .select2-choice, 
			.custom-color-sheme.attachment article .entry-meta-bottom,
			.custom-color-sheme.woocommerce-account.woocommerce-page .woocommerce-MyAccount-content,
			.custom-color-sheme.woocommerce-account.woocommerce-page .woocommerce-MyAccount-navigation ul li a,
			.custom-color-sheme .woocommerce .my_account_orders tbody tr,
			.custom-color-sheme.single-product.woocommerce .product_meta,
			.custom-color-sheme.single-product.woocommerce-page .product_meta,
			.custom-color-sheme .shop_table.cart tr.cart_item td.product-quantity div.quantity input,
			.custom-color-sheme.single-product.woocommerce .summary.entry-summary  input.qty,
			.custom-color-sheme.single-product.woocommerce .woocommerce-tabs.wc-tabs-wrapper ul.tabs.wc-tabs,
			.custom-color-sheme.single-product.woocommerce-page .woocommerce-tabs.wc-tabs-wrapper ul.tabs.wc-tabs,
			.custom-color-sheme.single-product.woocommerce .woocommerce-tabs.wc-tabs-wrapper ul.tabs.wc-tabs li,
			.custom-color-sheme.single-product.woocommerce-page .woocommerce-tabs.wc-tabs-wrapper ul.tabs.wc-tabs li,
			.custom-color-sheme.single-product.woocommerce .woocommerce-tabs.wc-tabs-wrapper ul.tabs.wc-tabs li:last-of-type,
			.custom-color-sheme.single-product.woocommerce-page .woocommerce-tabs.wc-tabs-wrapper ul.tabs.wc-tabs li:last-of-type,
			.custom-color-sheme.single-product.woocommerce .woocommerce-tabs.wc-tabs-wrapper ul.tabs.wc-tabs li a,
			.custom-color-sheme.single-product.woocommerce-page .woocommerce-tabs.wc-tabs-wrapper ul.tabs.wc-tabs li a,
			.custom-color-sheme.woocommerce table.cart td.actions, .woocommerce #content table.cart td.actions, .woocommerce-page table.cart td.actions,
			.custom-color-sheme .shop_table.cart tr.cart_item  > td,
			.custom-color-sheme.woocommerce table.cart td.actions .coupon .input-text, .woocommerce #content table.cart td.actions .coupon .input-text,
			.custom-color-sheme.woocommerce-page table.cart td.actions .coupon .input-text,
			.custom-color-sheme.woocommerce-page #content table.cart td.actions .coupon .input-text,
			.custom-color-sheme.woocommerce .cart-collaterals tr.order-total th, .woocommerce .cart-collaterals tr.order-total td,
			.custom-color-sheme.woocommerce-page .cart-collaterals tr.order-total th, .woocommerce-page .cart-collaterals tr.order-total td{
				border-color:'.esc_attr($main_border_color).';
			}
			.custom-color-sheme .star-rating span:before,
			.custom-color-sheme .woocommerce ul.products li.product  ins,
			.custom-color-sheme .woocommerce-page ul.products li.product ins,
			.custom-color-sheme .woocommerce ul.products li.product span.price,
			.custom-color-sheme .woocommerce-page ul.products li.product span.price,
			.custom-color-sheme.woocommerce .pt-view-switcher .pt-grid.active,
			.custom-color-sheme.woocommerce-page .pt-view-switcher .pt-grid.active,
			.custom-color-sheme.woocommerce .pt-view-switcher .pt-list:hover, .woocommerce-page .pt-view-switcher .pt-list:hover,
			.custom-color-sheme.woocommerce .pt-view-switcher .pt-grid:hover, .woocommerce-page .pt-view-switcher .pt-grid:hover,
			.custom-color-sheme.woocommerce .quantity-show,
			.custom-color-sheme.woocommerce .total,
			.custom-color-sheme.single-product.woocommerce .amount,
			.custom-color-sheme.single-product.woocommerce-page.amount,
			.custom-color-sheme.single-product.woocommerce .woocommerce-review-link:hover,
			.custom-color-sheme.single-product.woocommerce-page .woocommerce-review-link:hover,
			.custom-color-sheme.single-product.woocommerce .related.products ul.products li .price .amount,
			.custom-color-sheme.single-product.woocommerce-page .related.products ul.products li .price .amount,
			.custom-color-sheme.single-product.woocommerce .up-sells ul.products li .price .amount,
			.custom-color-sheme.single-product.woocommerce-page .up-sells ul.products li .price .amount,
			.custom-color-sheme .widget_shopping_cart .heading.standart-style .cart-icon,
			.custom-color-sheme .widget_shopping_cart .cart-widget-title,
			.custom-color-sheme .widget_shopping_cart .cart-contents{
				color:'.esc_attr($main_decor_color).';
			}
			.custom-color-sheme .paging-navigation .page-numbers.current,
			.custom-color-sheme .paging-navigation .page-numbers:hover,
			.custom-color-sheme .woocommerce nav.woocommerce-pagination .page-numbers li .page-numbers.current,
			.custom-color-sheme.woocommerce nav.woocommerce-pagination ul li a:hover,
			.custom-color-sheme.woocommerce nav.woocommerce-pagination ul li span:hover{
				background:'.esc_attr($main_decor_color).';
				border-color:'.esc_attr($main_decor_color).';
			}';
		wp_add_inline_style( 'brideliness-basic', $out );
		}
	}

	if(brideliness_get_option('site_custom_colors')=='on'){
		add_action ( 'wp_enqueue_scripts', 'brideliness_add_inline_styles' );
		function brideliness_color_sheme_body_class( $classes ) {
			$classes[] = 'custom-color-sheme';
			return $classes;
		}
		add_filter( 'body_class', 'brideliness_color_sheme_body_class');
	}
	
/* 14. Brideliness Add inline styles (end)*/

/* 15. Brideliness add font for visual composer (start)*/

	function brideliness_add_font($fonts_list){
		$brideliness_font->font_family = 'EB Garamond';
		$brideliness_font->font_types = "400 regular:400:normal, 800 bold:800:normal";
		$brideliness_font->font_styles = 'regular';
		$fonts_list[] = $brideliness_font;

		return $fonts_list;
	}
	add_filter('vc_google_fonts_get_fonts_filter', 'brideliness_add_font');
	
/* 15. Brideliness add font for visual composer (end)*/


/* 16. Brideliness Add specials function for theme options (start)*/

	function brideliness_optionscheck_change_sanitiziation() {
		remove_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );
		add_filter( 'of_sanitize_textarea', 'brideliness_sanitize_textarea' );
	}

	function brideliness_sanitize_textarea($input) {
		global $allowedposttags;
		$brideliness_custom_allowedtags["i"] = array(
		'class' => array(), // Allow classes
		'style' => array() // Allow style
	);

	$brideliness_custom_allowedtags = array_merge($brideliness_custom_allowedtags, $allowedposttags);
		$output = wp_kses( $input, $brideliness_custom_allowedtags);
		return $output;
	}

	/* Special sidebar on Theme Options */
	add_action('optionsframework_after','brideliness_optionscheck_display_sidebar', 100);

function brideliness_optionscheck_display_sidebar() { ?>
	<div id="options-sidebar-holder" class="metabox-holder">
		<div id="options-sidebar">
			<h3><i class="custom-icon-help"></i><?php esc_html_e('Need Help?', 'brideliness'); ?></h3>
		<div class="section">
			<p><?php echo wp_kses( __('Please, create ticket at <a href="https://themeszone.freshdesk.com" target="_blank">https://themeszone.freshdesk.com</a> to get help with the theme.', 'brideliness'), $allowed_html=array('a' => array( 'href'=>array(),'target'=>array() )) ); ?></p>
			<p><?php esc_html_e("Our support team will be glad to answer your questions regarding theme usage. We also provide paid customization and paid theme installation services. Please contact support on this matter!", "brideliness"); ?></p>
			<p><?php esc_html_e("Please, be sure to read the online version of this theme's documentation, it contains answers to many questions people usually ask.", "brideliness" ); ?></p>
		</div>
		<div class="support-links">
			<a href="http://bridelinesshelp.themes.zone" target="_blank" title="<?php esc_html_e('Read Theme Documentation', 'brideliness'); ?>"><i class="custom-icon-docs"></i><?php esc_html_e('Theme Documentation', 'brideliness'); ?></a>
			<span>&nbsp;|&nbsp;</span>
			<a href="https://themeszone.freshdesk.com" target="_blank" title="<?php esc_html_e('Create Support Ticket', 'brideliness'); ?>"><i class="custom-icon-support"></i><?php esc_html_e('Support', 'brideliness'); ?></a>
		</div>
		</div>
	</div>
<?php }

/* 16. Brideliness Add specials function for theme options (end)*/

/* 17. Brideliness Main Site wrapper functions (start)*/

// ----- Main Site wrapper functions
if (!function_exists('brideliness_site_wrapper_start')) {
	function brideliness_site_wrapper_start() {
		if (brideliness_get_option('site_layout')=='boxed') { ?>
			<div class="site-wrapper container">
				<div class="row">
		<?php } else { ?>
			<div class="site-wrapper">
		<?php }
	}
}

if (!function_exists('brideliness_site_wrapper_end')) {
	function brideliness_site_wrapper_end() {
		if (brideliness_get_option('site_layout')=='boxed') { ?>
			</div></div>
		<?php } else { ?>
			</div>
		<?php }
	}
}

/* 17. Brideliness Main Site wrapper functions (end)*/

/* 18. Header Bottom Box Shadow (start)*/

	if (!function_exists('brideliness_bottom_box_shadow')) {
		function brideliness_bottom_box_shadow() {
				echo ' style="box-shadow: 0px 2px 2px 0px rgba(0,0,0,0.1);"';
		}
	}

/* 18. Header Bottom Box Shadow (end)*/

/* 19. Extra markup for tiny mce (start)*/
 
add_filter( 'tiny_mce_before_init', 'brideliness_add_mce_elements' );
add_action( 'init', 'brideliness_add_text_editor_elements' );

function brideliness_add_mce_elements( $init ) {
	$ext = 'i[aria-hidden]';
	if ( isset( $init['extended_valid_elements'] ) ) {
	$init['extended_valid_elements'] .= ',' . $ext;
	} else {
	$init['extended_valid_elements'] = $ext;
	}
	return $init;
}

function brideliness_add_text_editor_elements() {
	global $allowedposttags;

	$tags = array( 'i', 'span' );
	$new_attributes = array(
	'aria-hidden' => array(),
	);
	foreach ( $tags as $tag ) {
		if ( isset( $allowedposttags[ $tag ] ) && is_array( $allowedposttags[ $tag ] ) )
		$allowedposttags[ $tag ] = array_merge( $allowedposttags[ $tag ], $new_attributes );
	}
}

/* 19. Extra markup for tiny mce (end)*/

/* 20. Add new style to visual composer accordion (start)*/
if ( class_exists( 'WPBakeryShortCode' ) ) {
	/* Add new style to visual composer elements */
	add_action( 'vc_after_init', 'add_vc_tabs_brideliness_style' ); /* Note: here we are using vc_after_init because WPBMap::GetParam and mutateParame are available only when default content elements are "mapped" into the system */
	function add_vc_tabs_brideliness_style() {
		//Get current values stored in the color param in "Call to Action" element
		$param = WPBMap::getParam( 'vc_tta_tabs', 'style' );
		//Append new value to the 'value' array
		$param['value'][esc_html__( 'Brideliness Style', 'brideliness' )] = 'brideliness-style';
		//Finally "mutate" param with new values
		vc_update_shortcode_param( 'vc_tta_tabs', $param );
		//Get current values stored in the color param in "Call to Action" element
		$param = WPBMap::getParam( 'vc_tta_accordion', 'style' );
		//Append new value to the 'value' array
		$param['value'][esc_html__( 'Brideliness Style', 'brideliness' )] = 'brideliness-style';
		//Finally "mutate" param with new values
		vc_update_shortcode_param( 'vc_tta_accordion', $param );
	}
}
/* 20. Add new style to visual composer accordion (end)*/

/*  21. Sticky Menu  (start)*/
function brideliness_sticky_menu(){ 
	if(brideliness_get_option('sticky_menu')=='on'){
		$menu_specials='default';
	}
	else{
		$menu_specials='';
	}
	return $menu_specials;
}
/*  21. Sticky Menu  (end)*/