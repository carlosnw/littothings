<?php // Related Posts
	global $post;
	$orig_post = $post;
	$categories = get_the_category($post->ID);
	$html = '';

	if ( brideliness_show_layout()=='layout-one-col' ) { 
	    $per_row = 4;
	    $class = ' col-lg-3 col-md-3 col-sm-6 col-xs-12';
	} else { 
	    $per_row = 3;
	    $class = ' col-md-4 col-sm-12 col-xs-12';
	}

	if ($categories) {
	    $category_ids = array();
	    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
		
		$args = array(
			'category__in' => $category_ids,
			'post__not_in' => array($post->ID),
			'posts_per_page'=> $per_row,
			'ignore_sticky_posts'=>1,
		);

	    $the_query = new wp_query( $args );

	    if ( $the_query->have_posts() ) : ?>
	    	<aside id="related_posts">
	    		<h2 class="related-posts-title"><span><?php esc_html_e('Related Posts', 'brideliness'); ?></span></h2>
				<ul class="post-list row columns-<?php echo esc_attr($per_row); ?>">
				<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<li class="post<?php echo esc_attr($class); ?>" itemscope="itemscope" itemtype="http://schema.org/Article">
						<div class="wrapper-content">
						
						<?php if ( has_post_thumbnail() ) { ?> 
						<div class="time has-thumbnail">
							<?php brideliness_entry_publication_time('M', 'j', ' '); ?>
						</div>
						<?php }
						else { ?>
						
						<div class="time">
							<?php brideliness_entry_publication_time('l', 'j', 'Y'); ?>
						</div>
						<?php }?>
						
							<?php if ( has_post_thumbnail() ) { ?>
							<div class='thumb-wrapper' itemprop="image" itemscope="itemscope" itemtype="http://schema.org/ImageObject">
								<div class="thumb-backgraund"></div>
								<a class="related-posts-search" href="<?php echo esc_url( get_permalink(get_the_ID()) ); ?>" title="<?php esc_html_e( 'Click to learn more', 'brideliness'); ?>"><i class="icon-search"></i></a>
								<a class="posts-img-link" rel="bookmark" href="<?php //echo esc_url( get_permalink(get_the_ID()) ); ?>" title="<?php //_e( 'Click to learn more', 'brideliness'); ?>"><?php //_e('Read More', 'brideliness'); ?></a>
								<?php the_post_thumbnail('brideliness-related-thumb', array('itemprop'=>'url' ));
											$post_thumb_extra_data = wp_get_attachment_image_src( get_post_thumbnail_id(), 'post-thumbnail' );
											if ( is_array($post_thumb_extra_data) && $post_thumb_extra_data !='') {
											echo '<meta itemprop="width" content="'.esc_attr($post_thumb_extra_data['1']).'">';
											echo '<meta itemprop="height" content="'.esc_attr($post_thumb_extra_data['2']).'">';
										}
								?>
							</div>
							<?php } ?>

							<div class="item-content">
								<div class="entry-header">
								<meta itemprop="mainEntityOfPage" content="<?php echo esc_url(get_permalink());?>">
								<a rel="bookmark" href="<?php echo esc_url( get_permalink(get_the_ID()) ); ?>" title="<?php esc_html_e( 'Click to learn more', 'brideliness'); ?>">
									<h3 itemprop="headline"><?php echo esc_attr(get_the_title(get_the_ID())); ?></h3>
								</a>
								</div>
								<div class="related-author"itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person"><a><span itemprop="name"><?php esc_attr(the_author());?></span></a></div>
								<span itemprop="publisher" itemscope="itemscope" itemtype="https://schema.org/Organization">
									<meta itemprop="name" content="<?php echo esc_attr(get_bloginfo('name')); ?>">
									<meta itemprop="url" content="<?php echo esc_url(home_url('/')); ?>">
									<?php if(brideliness_get_option('site_logo')&& !brideliness_get_option('site_logo')!==''):?>
										<div itemprop="logo" itemscope="itemscope" itemtype="http://schema.org/ImageObject"><meta itemprop="url" content="<?php echo esc_attr(brideliness_get_option('site_logo')); ?>"></div>
									<?php endif;?>
								</span>
							</div>
						</div>
					</li>
				<?php endwhile; ?>
				</ul>
			</aside>
	<?php endif;

		$post = $orig_post;
		wp_reset_postdata();
	}
