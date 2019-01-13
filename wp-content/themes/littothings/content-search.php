<?php /** The default template for displaying content of Brideliness Theme. Used for both single and index/archive/search. **/

/* Add responsive bootstrap classes */
$classes = array();
if (function_exists('brideliness_single_content_class')) $classes[] = brideliness_single_content_class();
if(isset($_GET['b_type'])){
	$blog_type=$_GET['b_type'];
}
else{$blog_type='';}

/* Add specials classes */
$entry_content_class='';
if(isset( $_GET['b_type']) && $_GET['b_type']!=='sblog'){
	$entry_content_class='col-xs-12 col-md-12 col-sm-12';
}
else{$entry_content_class='col-xs-12 col-md-10 col-sm-8';}

$blog_pagination = brideliness_get_option('blog_pagination');
$blog_layout = brideliness_get_option('blog_frontend_layout');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?> itemscope="itemscope" itemtype="http://schema.org/Article">

	<?php if ( is_sticky() && is_home() && ! is_paged() ) { printf( '<span class="sticky-post">%s</span>', esc_html__( 'Featured', 'brideliness' ) ); }?>
	<?php edit_post_link( esc_html__( 'Edit', 'brideliness' ), '<div class="edit-link">', '</div>' ); ?>
	<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
		<div class="thumbnail-wrapper" itemprop="image" itemscope="itemscope" itemtype="http://schema.org/ImageObject">
			<?php the_post_thumbnail('post-thumbnail', array('itemprop'=>'url' ));
				  $post_thumb_extra_data = wp_get_attachment_image_src( get_post_thumbnail_id(), 'post-thumbnail' );
					if ( is_array($post_thumb_extra_data) && $post_thumb_extra_data !='') {
							echo '<meta itemprop="width" content="'.esc_attr($post_thumb_extra_data['1']).'">';
							echo '<meta itemprop="height" content="'.esc_attr($post_thumb_extra_data['2']).'">';
					}
			?>
		</div>
	<?php endif; ?>

	<div class="entry-content">
		<?php if (((is_home()|| is_search() || is_archive()|| $blog_pagination=='infinite') && $blog_layout!=='grid' && $blog_type=='' && !is_single()) || $blog_type=='sblog'): ?>
			<div class="<?php echo esc_attr($entry_content_class);?>">
		<?php endif; ?>

			<header class="entry-header">
				<?php
					if ( is_single() ) : ?>
						<meta itemprop="mainEntityOfPage" content="<?php echo esc_url(get_permalink());?>">
				<?php  the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' );
					elseif ( is_search() ) : // Search Results
						$title = get_the_title();
						$keys = explode(" ", $s);
						$title = preg_replace('/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt">\0</strong>', $title); ?>
						<h1 class="entry-title search-title" itemprop="headline">
							<a href="<?php esc_url(the_permalink()); ?>" title="<?php echo esc_attr( sprintf( __( 'Click to read more about %s', 'brideliness' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark" itemprop="url"><?php echo wp_kses($title, array('strong' => array('class' => array()))); ?></a>
						</h1>
				<?php else :
						$title = get_the_title();
						if ( empty($title) || $title = '' ) {?>
						<h1 class="entry-title" itemprop="headline">
							<a href="<?php echo esc_url(get_permalink());?>" title="<?php esc_html__( 'Click here to read more', 'brideliness' );?>" rel="bookmark" itemprop="url"><?php esc_html_e( 'Click here to read more', 'brideliness' ); ?></a>
						</h1>
				<?php } else {
							echo '<meta itemprop="mainEntityOfPage" content="'.esc_url(get_permalink()).'">';
							the_title( '<h1 class="entry-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" title="'.esc_attr( sprintf( __( 'Click to read more about %s', 'brideliness' ), the_title_attribute( 'echo=0' ) ) ).'" rel="bookmark" itemprop="url">', '</a></h1>' );
							}
					endif;
				?>
			</header>

		<?php if( is_home() && (($blog_type!=='' && $blog_type!=='sblog') || ($blog_layout=='grid' && $blog_type!=='sblog'))  )  : ?>
			<div class="post-author-gride" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person">
				<span><?php esc_html_e( 'by ', 'brideliness' ); ?></span>
				<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta( 'ID' ))); ?>" class="post-author" rel="author" itemprop="url"><span itemprop="name"><?php echo esc_attr(get_the_author());?></span></a>
				<?php if ( function_exists( 'brideliness_entry_post_cats') ){brideliness_entry_post_cats();} ?>
			</div>
		<?php endif; ?>

		<?php if(is_singular() )  : ?>
			<div class="entery-meta-single">
				<?php if ( function_exists( 'brideliness_entry_publication_time') ) {brideliness_entry_publication_time('j', 'F', 'Y');} ?>,
				<?php if ( function_exists( 'brideliness_entry_post_cats') ) {brideliness_entry_post_cats();} ?>,
				<span itemprop="publisher" itemscope="itemscope" itemtype="https://schema.org/Organization">
					<meta itemprop="name" content="<?php echo esc_attr(get_bloginfo('name')); ?>">
					<meta itemprop="url" content="<?php echo esc_attr(home_url('/')); ?>">
					<?php if(brideliness_get_option('site_logo')&& !brideliness_get_option('site_logo')!==''):?>
						<div itemprop="logo" itemscope="itemscope" itemtype="http://schema.org/ImageObject"><meta itemprop="url" content="<?php echo esc_attr(brideliness_get_option('site_logo')); ?>"></div>
					<?php endif;?>
				</span>
				<div class="post-author-single" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person">
				<span><?php esc_html_e( 'by ', 'brideliness' ); ?></span>
					<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta( 'ID' ))); ?>"><span itemprop="name"><?php echo esc_attr(get_the_author());?><span></a>
				</div>
			</div>
		<?php endif; ?>

		<?php if ( is_search() ) : // Only display Excerpts for Search
			$excerpt = get_the_excerpt();
			$keys = explode(" ",$s);
			$excerpt = preg_replace('/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt">\0</strong>', $excerpt);
		?>
		<div class="entry-summary">
				<?php echo wp_kses($excerpt, array('strong' => array('class' => array()))); ?>
		</div><!-- .entry-summary -->

		<?php else : ?>

			<div class="content-post" itemprop="articleBody">
				<?php the_content( apply_filters( 'brideliness_more', 'Continue Reading') ); ?>
			</div>

		<?php if((($blog_type!=='' && $blog_type!=='sblog') || $blog_layout=='grid' && $blog_type!=='sblog') && !is_single()) : ?>
			<div class="buttons-wrapper">
				<div class="comments-qty"><i class="icon-speech-bubble"></i><?php brideliness_entry_comments_counter();?></div>
					<?php if (function_exists('brideliness_output_likes_counter') && brideliness_get_option('site_post_likes')=='on'): ?>
							<span>|</span>
							<div class="wrapper-likes"><i class="icon-shapes" ></i><?php echo brideliness_output_likes_counter(get_the_ID());?></div>
						<?php endif; ?>
				<a class="posts-img-link button" rel="bookmark" href="<?php echo esc_url(get_permalink(get_the_ID()))?>" title="<?php esc_html_e( 'Click to read more', 'brideliness');?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
			</div>
		<?php endif; ?>

		<?php wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'brideliness' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
		) ); ?>

		<?php if(is_single() || is_home() ||is_archive() || brideliness_get_option('blog_pagination')=='infinite' ||($blog_type!=='' && $blog_type=='sblog'))  : ?>

			<?php if(is_single() && brideliness_get_option('single_post_share_buttons')=='on' || !is_single() && brideliness_get_option('blog_share_buttons')=='on') : ?>

			<div class="share">
				<?php if(is_single() && brideliness_get_option('single_post_share_buttons')=='on') :?>
					<h3><?php esc_html_e( 'Share this article with your friends ...', 'brideliness' ); ?></h3>
				<?php endif; ?>
					<?php
						if (is_single() && brideliness_get_option('single_post_share_buttons')=='on') {brideliness_share_buttons_output();}
						if (!is_single() && brideliness_get_option('blog_share_buttons')=='on') {brideliness_share_buttons_output();}
					?>
			</div>
			<?php endif; ?>
		<?php endif; ?>

		<?php if(is_single())  : ?>

			<div class="entry-meta-bottom">
				<div class="row">
					<div class="col-xs-12 col-md-6 col-sm-6">
						<div class="entry-meta-bottom-left">
							<?php if ( function_exists( 'brideliness_entry_post_tags' ) ) {brideliness_entry_post_tags();} ?>
						</div>
					</div>
					<div class="col-xs-12 col-md-6 col-sm-6">
						<div class="entry-meta-bottom-right">
							<?php if ( function_exists( 'brideliness_entry_comments_counter' ) ) {brideliness_entry_comments_counter();} ?>
							<?php if ( function_exists( 'brideliness_output_like_button') && brideliness_get_option('site_post_likes')=='on' ) { echo '<span class="separator">|</span>'.brideliness_output_like_button( get_the_ID() ); } ?>
						</div>
					</div>
				</div>
			</div><!-- .entry-meta -->

			<?php if ( get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
				<?php get_template_part( 'part-templates/author-bio' ); ?>
			<?php endif; ?>

		<?php endif; ?>

			<?php if (((is_home()|| is_search() || is_archive()|| $blog_pagination=='infinite') && $blog_layout!=='grid' && $blog_type=='' && !is_single()) || $blog_type=='sblog'): ?></div><?php endif; ?>

		<?php endif; ?>

	</div>

</article><!-- #post-## -->


