<?php   /** The Template For Displaying Lookbook Content Post **/  ?>

<article id="post-<?php the_ID(); ?>" itemscope="itemscope" itemtype="http://schema.org/Article">
	<?php edit_post_link( esc_html__( 'Edit', 'brideliness' ), '<div class="edit-link">', '</div>' ); ?>
	
	<?php if(!is_singular( 'lookbook' )): ?>
	<div class="row">
		<div class="col-md-6 lookbook-image">
			<?php if ( has_post_thumbnail() && ! post_password_required() && !is_singular() ) : ?>
				<div class="thumbnail-wrapper" itemprop="image" itemscope="itemscope" itemtype="http://schema.org/ImageObject"> 
					<?php the_post_thumbnail('brideliness-lookbook', array('itemprop'=>'url' ));
						  $post_thumb_extra_data = wp_get_attachment_image_src( get_post_thumbnail_id(), 'brideliness-lookbook' );
							if ( is_array($post_thumb_extra_data) && $post_thumb_extra_data !='') {
										echo '<meta itemprop="width" content="'.esc_attr($post_thumb_extra_data['1']).'">';
										echo '<meta itemprop="height" content="'.esc_attr($post_thumb_extra_data['2']).'">';
								}	
					?>
				</div>
			<?php endif; ?>
		</div>
		<div class="col-md-6 lookbook-content">
			<?php if ( has_post_thumbnail() && ! post_password_required() && !is_singular() ) : ?>
				<div class="thumbnail-wrapper-look" itemprop="image" itemscope="itemscope" itemtype="http://schema.org/ImageObject"> 
					<?php the_post_thumbnail('brideliness-lookbook-thumb', array('itemprop'=>'url' ));
						  $post_thumb_extra_data = wp_get_attachment_image_src( get_post_thumbnail_id(), 'brideliness-lookbook-thumb' );
							if ( is_array($post_thumb_extra_data) && $post_thumb_extra_data !='') {
									echo '<meta itemprop="width" content="'.esc_attr($post_thumb_extra_data['1']).'">';
									echo '<meta itemprop="height" content="'.esc_attr($post_thumb_extra_data['2']).'">';
							}	
					?>
				</div>
			<?php endif; ?>
			
			<header class="entry-header">
		<?php 
			if ( is_single() ) : ?>
				<meta itemprop="mainEntityOfPage" content="<?php echo esc_url(get_permalink());?>">
		<?php  the_title( '<h1 class="entry-title lookbook" itemprop="headline">', '</h1>' );			
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
						<h1 class="entry-title lookbook" itemprop="headline">
							<a href="<?php echo esc_url(get_permalink());?>" title="<?php esc_html__( 'Click here to read more', 'brideliness' );?>" rel="bookmark" itemprop="url"><?php esc_html_e( 'Click here to read more', 'brideliness' ); ?></a>
						</h1>
				<?php } else {
							echo '<meta itemprop="mainEntityOfPage" content="'.esc_url(get_permalink()).'">';
							the_title( '<h1 class="entry-title lookbook" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" title="'.esc_attr( sprintf( __( 'Click to read more about %s', 'brideliness' ), the_title_attribute( 'echo=0' ) ) ).'" rel="bookmark" itemprop="url">', '</a></h1>' );
							}
					endif;
				?>
	</header>
	<?php 
	
	if(get_the_category_list()!==''){ ?>
		<div class="post-cats" itemprop="articleSection">
	<?php	foreach((get_the_category()) as $category) { echo esc_attr($category->cat_name)  . ' '; } ?>
		</div>
	<?php } ?>
	<div class="entry-content">
	<?php the_content( apply_filters( 'brideliness_lookbook_more', 'Shop Look') ); ?>
	</div>
		</div>
</div>

<?php else : ?>

<div class="row">
	<div class="col-md-12">
<?php  
	if ( get_post_gallery() ) {

		$gallery = get_post_gallery( get_the_ID(), false );
		$img_ids = isset($gallery['ids'])? $gallery['ids'] : 0;
		$img_ids_array = explode(",", $img_ids);?>

		<div class="entry-carousel">
					<div class="lookbook-gallery"
								data-owl="container" 
								data-owl-slides="1" 
								data-owl-type="simple"
								data-owl-navi="true" 
								data-owl-pagi="false" 
								data-owl-transition="fade">

					<?php foreach( $img_ids_array as $img_id ) : ?>
						<div class="slide">
							<?php echo wp_get_attachment_image( $img_id, 'large'); ?>
						</div>
						<?php endforeach; ?>

					</div>
		</div>
	<?php }

 ?>
	</div>
	<div class="col-md-8 single-lookbook-content">
		<header class="entry-header">
			<h1 class="entry-title lookbook">
				<?php the_title(); ?>
			</h1>
		</header>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
		<div class="meta-bottom">
			<?php brideliness_entry_post_tags();?>
		</div>
	</div>
	<div class="col-md-4">
		<div class="meta-right">
			<div><span><?php esc_html_e('Date:','brideliness');?></span><?php the_date(); ?></div>
			<div><span><?php esc_html_e('Category:','brideliness');?></span><?php brideliness_entry_post_cats(); ?></div>
		</div>
		<div class="lookbook-share">
			<?php brideliness_share_buttons_output(); ?>
		</div>
	</div>
</div>

<?php endif; ?>

</article>
