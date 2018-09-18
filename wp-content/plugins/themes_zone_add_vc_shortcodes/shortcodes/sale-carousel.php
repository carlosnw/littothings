<?php
if ( class_exists( 'WPBakeryShortCode' ) ) :

add_action( 'vc_before_init', 'sale_carousel' );

function sale_carousel(){
	
vc_map( array(
      "name" => esc_html__( 'Sale Carousel', 'themeszone-add-vc-shortcodes' ),
      "base" => "sale_carousel",
	  "category" => esc_html__( 'Brideliness', 'themeszone-add-vc-shortcodes'),
	  "description" => esc_html__( 'Output  Sale Product width Carousel', 'themeszone-add-vc-shortcodes' ),
	  'icon' => plugin_dir_url(__FILE__) . 'images/vc-icon.png',
      "params" => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Transition Type', 'themeszone-add-vc-shortcodes' ),
				'param_name' => 'transition_type',
				'value' => array(
						'Fade' => 'fade',
						'Back Slide' => 'backSlide',
						'Go Down' => 'goDown',
						'Fade Up' => 'fadeUp', 
					),
				'std'=> 'fade',
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Autoplay', 'themeszone-add-vc-shortcodes' ),
				'param_name' => 'autoplay',
				'description' => esc_html__( 'Whether to running your carousel automatically or not', 'themeszone-add-vc-shortcodes' ),
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Show Arrows', 'themeszone-add-vc-shortcodes' ),
				'param_name' => 'show_arrows',
				'description' => esc_html__( 'Show/hide arrow buttons', 'themeszone-add-vc-shortcodes' ),
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Show Page Navigation', 'themeszone-add-vc-shortcodes' ),
				'param_name' => 'page_navi',
				'description' => esc_html__( 'Show/hide navigation buttons under your carousel', 'themeszone-add-vc-shortcodes' ),
			),
			
			
			array(
			'type' => 'param_group',
			'heading' => esc_html__( 'Testimonials Items', 'themeszone-add-vc-shortcodes' ),
			'param_name' => 'sale_carousel_item',
			'value' => urlencode( json_encode( array(
				array(
					'product_id' => ' ',
					'target_data' => esc_html__( 'Name', 'themeszone-add-vc-shortcodes' ),
					'pre_countdown_text' => esc_html__( 'Occupation', 'themeszone-add-vc-shortcodes' ),
					'show_product_image' => esc_html__( 'Text', 'themeszone-add-vc-shortcodes' ),
				),

			) ) ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter Sale Product ID', 'themeszone-add-vc-shortcodes' ),
					'param_name' => 'product_id',
					'description' => esc_html__( 'Add Product ID for Item', 'themeszone-add-vc-shortcodes' ),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Target Date', 'themeszone-add-vc-shortcodes' ),
					'param_name' => 'target_data',
					'description' => esc_html__( 'Set target date (YYYY-MM-DD) when special offer ends', 'themeszone-add-vc-shortcodes' ),
					
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Pre-Countdown text', 'themeszone-add-vc-shortcodes' ),
					'param_name' => 'pre_countdown_text',
					'description' => esc_html__( 'Pre-Countdown Text', 'themeszone-add-vc-shortcodes' ),
					
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Show Product Image', 'themeszone-add-vc-shortcodes' ),
					'param_name' => 'show_product_image',
					'description' => esc_html__( 'Check to Show Product Image', 'themeszone-add-vc-shortcodes' ),
					
				),
			),
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

class WPBakeryShortCode_sale_carousel extends WPBakeryShortCode {
	protected function content( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'transition_type' => 'fade',
			'autoplay' => 'false',
			'show_arrows' => '',
			'page_navi' => 'false',
			'sale_carousel_item'=> '',
			'css' => '',
			'el_class'=> '',
		), $atts ) );
		
		$output='';
		$new_items='';
		$sale_carousel_item_content=vc_param_group_parse_atts($sale_carousel_item);
		$container_id = uniqid('owl',false);
		$total_item = count($sale_carousel_item_content);

	foreach ($sale_carousel_item_content as $position => $item) {
	$product_ = wc_get_product(  $item['product_id'] );

	if($product_==true){
		$product = new WC_Product( $item['product_id'] );
		if(array_key_exists('product_id', $item ) && $product->is_on_sale()){

			$container_id_ = uniqid('countdown',false);
			
			$new_items .= '<div class="carousel-item">';
			$new_items .= '<div class="item-wrapper">';
			$new_items .= '<div class="img-wrapper col-md-6">'.$product->get_image( 'shop_catalog' ).'</div>';
			$new_items .= '<div class="sale-info-wrapper col-md-6">';
			$new_items .= '<h3><a href="'.$product->get_permalink().'">'.$product->get_title().'</a></h3>';
			$new_items .= '<div class="price-wrapper">'.$product->get_price_html().'</div>';
			$new_items .= '<div  class="wrap-rating">'.wc_get_rating_html($product->get_average_rating()).'</div>';
			if(array_key_exists('pre_countdown_text', $item )){
				$new_items .= '<div class="pre-countdown-text">'.$item['pre_countdown_text'].'</div>';
			}
			if (array_key_exists('target_data', $item) ) {
				$target = explode("-", $item['target_data']);
				$new_items .= '<div id="'.$container_id_.'"></div>';
				$new_items .='
				<script type="text/javascript">
					(function($) {
						$(document).ready(function() {
							var container = $("#'.$container_id_.'");
							var newDate = new Date('.$target[0].', '.$target[1].'-1, '.$target[2].');
							container.countdown({
								until: newDate,
								compact: true, 
								layout: \'<div id="countdown-Layout">\'+
								\'<div class="countdown-day">\'+									
								\'<span class="countdown-amount">{d10}</span>\'+ 
								\'<span class="countdown-amount">{d1}</span>\'+
								\'<div class="day">days</div>\'+
								\'</div>\'+
								\'<div class="countdown-hour">\'+
								\'<span class="countdown-amount">{h10}</span>\'+ 
								\'<span class="countdown-amount">{h1}</span>\'+ 
								\'<div class="hour">hrs</div>\'+
								\'</div>\'+
								\'<div class="countdown-minute">\'+
								\'<span class="countdown-amount">{m10}</span>\'+ 
								\'<span class="countdown-amount">{m1}</span>\'+ 
								\'<div class="minute">min</div>\'+
								\'</div>\'+
								\'<div class="countdown-second">\'+
								\'<span class="countdown-amount">{s10}</span>\'+
								\'<span class="countdown-amount">{s1}</span>\'+
								\'<div class="second">sec</div>\'+									
								\'</div>\'+
								\'</div>\'
								});
							});
						})(jQuery);
					</script>';
				}
			if(array_key_exists('product_id', $item )){
				$new_items .= '<span class="add_to_cart">'.do_shortcode('[add_to_cart id="'.$item['product_id'].'"]').'</span>';
			}

			$new_items .= '</div>';
			$new_items .= '</div>';
			$new_items .= '</div>';
			}
		}
		}
		
		
		$output .= '<div class="brideliness-sales-carousel '.$el_class.' '.$css.'" id="'.$container_id.'">';
		if ($show_arrows){$output .= "<div class='slider-navi'><span class='prev'><i class='fa fa-angle-left'></i></span><span class='next'><i class='fa fa-angle-right'></i></span></div>"; }
		$output .= '<div class="carousel-container">';
		$output .= $new_items;
		$output .= '</div>';
		$output .= '</div>';
		$output .= '<script type="text/javascript">
					(function($) {
						$(document).ready(function() {
							var owl = $("#'.$container_id.' .carousel-container");
							
							owl.owlCarousel({
								navigation : false,
								pagination : '.$page_navi.',
								autoPlay   : '.$autoplay.',
								slideSpeed : 300,
								paginationSpeed : 400,
								singleItem : true,
								transitionStyle : "'.$transition_type.'",
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