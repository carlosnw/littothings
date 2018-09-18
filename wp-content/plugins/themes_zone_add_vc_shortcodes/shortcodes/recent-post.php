<?php
if ( class_exists( 'WPBakeryShortCode' ) ) :

add_action( 'vc_before_init', 'recent_post' );


function recent_post(){
	
vc_map( array(
      "name" => esc_html__( 'Carousel Recent Post', 'themeszone-add-vc-shortcodes' ),
      "base" => "recent_post",
	  "category" => esc_html__( 'Brideliness', 'themeszone-add-vc-shortcodes'),
	  "description" => esc_html__( 'Output  Recent Post', 'themeszone-add-vc-shortcodes' ),
	  'icon' => plugin_dir_url(__FILE__) . 'images/vc-icon.png',
      "params" => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Element Title', 'themeszone-add-vc-shortcodes' ),
				'param_name' => 'el_title',
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Posts per row', 'themeszone-add-vc-shortcodes' ),
				'param_name' => 'per_row',
				'value' => array(
						'3 Posts' => '3',
						'4 Posts' => '4',
					),
				'std'=> '3',
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Total number of Posts to show', 'themeszone-add-vc-shortcodes' ),
				'param_name' => 'number_recent_post',
				'value' =>'5',
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Orderby Parameter', 'themeszone-add-vc-shortcodes' ),
				'param_name' => 'recent_orderby',
				'value' => array(
						esc_html__( 'Date', 'themeszone-add-vc-shortcodes' ) => 'date' ,
                        esc_html__( 'Random', 'themeszone-add-vc-shortcodes' ) => 'rand',
                        esc_html__( 'Author', 'themeszone-add-vc-shortcodes' ) => 'author',
                        esc_html__( 'Comments Quantity', 'themeszone-add-vc-shortcodes' ) => 'comment_count',
					),
				'std'=> 'date',
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Order Parameter', 'themeszone-add-vc-shortcodes' ),
				'param_name' => 'order_param',
				'value' => array(
                            esc_html__( 'Ascending', 'themeszone-add-vc-shortcodes' ) => 'ASC',
                            esc_html__( 'Descending', 'themeszone-add-vc-shortcodes' ) => 'DESC',
					),
				'std'=> 'DESC',
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Posts by Category slug', 'themeszone-add-vc-shortcodes' ),
				'param_name' => 'by_category',
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Featured Image', 'themeszone-add-vc-shortcodes' ),
				'param_name' => 'featured_img',
				'std' => 'true',
				'edit_field_class' => 'vc_col-sm-3 vc_column',
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Title with Meta Data', 'themeszone-add-vc-shortcodes' ),
				'param_name' => 'meta_data',
				'std' => 'true',
				'edit_field_class' => 'vc_col-sm-3 vc_column',
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Post Excerpt', 'themeszone-add-vc-shortcodes' ),
				'param_name' => 'post_excerpt',
				'std' => 'true',
				'edit_field_class' => 'vc_col-sm-3 vc_column',
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Buttons', 'themeszone-add-vc-shortcodes' ),
				'param_name' => 'buttons',
				'std' => 'true',
				'edit_field_class' => 'vc_col-sm-3 vc_column',
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'With border and without padding', 'themeszone-add-vc-shortcodes' ),
				'param_name' => 'style_1',
				'std' => 'false',
				'edit_field_class' => 'vc_col-sm-3 vc_column',
			),				
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Use autoplay', 'themeszone-add-vc-shortcodes' ),
				'param_name' => 'autoplay',
				'edit_field_class' => 'vc_col-sm-3 vc_column',
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Show Arrows', 'themeszone-add-vc-shortcodes' ),
				'param_name' => 'show_arrows',
				'edit_field_class' => 'vc_col-sm-3 vc_column',
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Show Navigation', 'themeszone-add-vc-shortcodes' ),
				'param_name' => 'page_navi',
				'edit_field_class' => 'vc_col-sm-3 vc_column',
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'themeszone-add-vc-shortcodes' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'themeszone-add-vc-shortcodes' ),
			),
			array(
				'type' => 'css_editor',
				'heading' => esc_html__( 'CSS box', 'themeszone-add-vc-shortcodes' ),
				'param_name' => 'css',
				'group' => esc_html__( 'Design Options', 'themeszone-add-vc-shortcodes' ),
			),

      )
   ) );
	
}


class WPBakeryShortCode_recent_post extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {
		
		extract( shortcode_atts( array(
			'el_title'           => '',
			'per_row' 			 => '3',
			'number_recent_post' => '5',
			'recent_orderby' 	 => 'date',
			'order_param' 		 => 'DESC',
			'by_category' 		 => '',
			'show_arrows' 		 => 'false',
			'autoplay' 			 => 'false',
			'page_navi'   		 => 'false',
			'featured_img'		 => 'true',
			'meta_data'   		 => 'true',
			'post_excerpt'		 => 'true',
			'buttons'      		 => 'true',
			'style_1'            => 'false',
			'el_class'    		 => '',
			'css'         		 => '',
		), $atts ) );	
		
		$recent_post_style='';
		if($style_1){
			$recent_post_style='style-border';
		};
		$output = '';
		$container_id = uniqid('owl',false);
		// Excerpt filters
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
		$new_excerpt_more = create_function('$more', 'return " ";');
		add_filter('excerpt_more', $new_excerpt_more);

		$new_excerpt_length = create_function('$length', 'return "14";');
		add_filter('excerpt_length', $new_excerpt_length);
		
		// The Query
			$the_query = new WP_Query(
				array(
					'orderby' => $recent_orderby,
					'order' => $order_param,
					'category_name' => $by_category,
					'post_type' => 'post',
					'post_status' => 'publish',
					'ignore_sticky_posts' => 1,
					'posts_per_page' => $number_recent_post,
				)
			);
		$output .= '<div class="brideliness-posts-shortcode  '.$el_class.' '.$css_class.'" id="'.$container_id.'">';
		$output .= '<div class="title-wrapper"><h3><span>'.$el_title.'</span></h3>';
		if ($show_arrows=='true'){$output .= "<div class='slider-navi'><span class='prev'><i class='fa fa-angle-left'></i></span><span class='next'><i class='fa fa-angle-right'></i></span></div>"; }
		$output .='</div>';
		
		$output .= '<ul class="post-list columns-'.esc_attr($per_row).'">';
		while( $the_query->have_posts() ) : $the_query->the_post();
		
		$output .='<li>';
			if ( $featured_img && has_post_thumbnail() ) {
				$output .= '<div class="thumb-wrapper">';
				$output .= '<div class="thumb-background"></div>'; 
				$output .= '<div class="date"><span class="day">'.esc_html( get_the_date('d')).'</span><span class="month">'.esc_html( get_the_date('M')).'</span></div>';
				$output .= get_the_post_thumbnail(get_the_ID(), 'brideliness-recent-post');
				$output .= '</div>';
				}
				$output .= '<div class="item-content-wrapper '.$recent_post_style.'">';
				$output .= '<div class="item-content">';
				$output .= '<h3><a rel="bookmark" href="'.esc_url(get_permalink(get_the_ID())).'" title="'.esc_html__( 'Click to read more', 'themeszone-add-vc-shortcodes').'">';
				$output .= esc_attr(get_the_title(get_the_ID()));
				$output .= '</a></h3>';
				
				if ($meta_data) {
					$output .= '<div class="meta-wrapper">';
					$output .= '<div class="author">'.esc_html__('by', 'themeszone-add-vc-shortcodes').' '.get_the_author().' '.esc_html__('in', 'themeszone-add-vc-shortcodes').'</div>';
					$output .= '<div class="category">'.get_the_category_list(', ').'</div>';
					$output .= '</div>';
				}
				if ($post_excerpt) {
					$output .= '<div class="entry-excerpt">'.get_the_excerpt().'</div>';
				}

				if ($buttons) {
					$output .= '<div class="buttons-wrapper">';
					$output .= '<div class="comments-qty"><i class="icon-speech-bubble"></i>'.get_comments_number(get_the_ID()).'</div>';
					if (function_exists('brideliness_output_likes_counter')) {
						$output .='<span class="delimeter">|</span>';
						$output .='<div class="wrapper-likes"><i class="icon-shapes"></i>'. brideliness_output_likes_counter(get_the_ID()).'</div>';
					}
					$output .= '<a class="posts-img-link button" rel="bookmark" href="'.esc_url(get_permalink(get_the_ID())).'" title="'.esc_html__( 'Click to read more', 'themeszone-add-vc-shortcodes').'"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>';
					$output .= '</div>';
				}
		$output .= '</div>';
		$output .= '</div>';
		$output .='</li>';
		
		endwhile;
		wp_reset_postdata();
		$output .= '</ul>';
		
		$output .= '</div>';
		
		    if ( brideliness_show_layout()=='layout-one-col' && $per_row==4 ) {
					$qty_sm = 3;
				} else {
					$qty_sm = $per_row-2;
				}

			$output.='
				<script type="text/javascript">
					(function($) {
						$(document).ready(function() {
							var owl = $("#'.$container_id.' ul.post-list");

							owl.owlCarousel({
							items : '.$per_row.',
							itemsDesktop : '.$per_row.',
							itemsDesktopSmall : [900,'.($per_row-1).'],
							itemsTablet: [600,'.$qty_sm.'],
							itemsMobile : [479,1],
							pagination: '.$page_navi.',
							autoPlay   : '.$autoplay.',
							navigation : false,
							slideSpeed : 300,
							paginationSpeed : 400,
							});

							// Custom Navigation Events
							$("#'.$container_id.'").find(".next").click(function(){
							owl.trigger("owl.next");
							})
							$("#'.$container_id.'").find(".prev").click(function(){
							owl.trigger("owl.prev");
							})

						});
					})(jQuery);
				</script>';

		
		return $output;
		
	}
	
}

endif;