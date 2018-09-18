<?php	/* The main template file */

get_header();

$blog_pagination = brideliness_get_option('blog_pagination');
$blog_layout = brideliness_get_option('blog_frontend_layout');

/* Add responsive bootstrap classes */
if(isset($_GET['b_type'])){$blog_type=$_GET['b_type'];}
else{$blog_type='';}
?>

	<main id="content" class="site-content <?php brideliness_main_content_class(); ?>"  itemscope="itemscope" itemprop="mainContentOfPage">

		<?php global $wp_query;
			
		// If isotope layout get & output all posts
			if ( ($blog_layout=='grid' && $blog_type!=='sblog') || ($blog_type!=='' && $blog_type!=='sblog')) {
				global $query_string; query_posts( $query_string . '&posts_per_page=-1' );
			}

			if ( have_posts() ) {
				if ( ($blog_layout=='grid' && $blog_type!=='sblog') || ($blog_type!=='' && $blog_type!=='sblog')) {
					echo "<div class='blog-grid-wrapper' data-isotope=container data-isotope-layout=masonry data-isotope-elements=post>";
				}
				
				// Start the Loop.
				while ( have_posts() ) : the_post();
				
					get_template_part( 'content', get_post_format() );

				endwhile;

				// Close isotope container
				if ( ($blog_layout=='grid' && $blog_type!=='sblog') || ($blog_type!=='' && $blog_type!=='sblog')) { echo "</div>"; }
				
				// Post navigation.
				if ( $blog_pagination == 'infinite' || $blog_layout!=='grid' || $blog_type=='sblog') {
					$blog_pagination = brideliness_get_option('blog_pagination');
					if ( ($wp_query->max_num_pages > 1) && (($blog_pagination == 'infinite' && $blog_type==''))) {
						echo '<div class="infinity-blog"><span class="brideliness-get-more-posts">'.esc_html__('Show More Posts', 'brideliness').'</span></div>';
					}
					elseif($blog_type=='' || ($blog_type!=='' && $blog_type=='sblog') || $blog_pagination !== 'infinite' || $blog_layout!=='grid') {
						get_template_part( 'part-templates/pagination' );
					}
					else{
						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'brideliness' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
						) );
					}
				}
			}
			else {
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );
			}
			?>
	</main>
	
	<?php if ($blog_type=='' || $blog_type=='sblog') { get_sidebar(); } ?>

<?php get_footer(); ?>

