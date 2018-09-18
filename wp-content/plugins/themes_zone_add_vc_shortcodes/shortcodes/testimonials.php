<?php
if ( class_exists( 'WPBakeryShortCode' ) ) :


add_action( 'vc_before_init', 'testimonials' );

function testimonials(){
	
	vc_map( array(
      "name" => esc_html__( 'Testimonials', 'themeszone-add-vc-shortcodes' ),
      "base" => "testimonials",
	  "description" => esc_html__( 'Output Testimonials With Owl Carousel', 'themeszone-add-vc-shortcodes' ),
	  "category" => esc_html__( 'Brideliness', 'themeszone-add-vc-shortcodes'),
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
			'type' => 'checkbox',
			'heading' => esc_html__( 'Testimonials  Style#1', 'themeszone-add-vc-shortcodes' ),
			'param_name' => 'sidebar_style',
			'description' => esc_html__( 'Check for Testimonials Style#1', 'themeszone-add-vc-shortcodes' ),
			'value' => false,
		),
		
		array(
			'type' => 'param_group',
			'heading' => esc_html__( 'Testimonials Items', 'themeszone-add-vc-shortcodes' ),
			'param_name' => 'testimonials_item',
			'value' => urlencode( json_encode( array(
				array(
					'image' => ' ',
					'name' => esc_html__( 'Name', 'themeszone-add-vc-shortcodes' ),
					'occupation' => esc_html__( 'Occupation', 'themeszone-add-vc-shortcodes' ),
					'content_text' => esc_html__( 'Text', 'themeszone-add-vc-shortcodes' ),
				),
				array(
					'image' => ' ',
					'name' => esc_html__( 'Name', 'themeszone-add-vc-shortcodes' ),
					'occupation' => esc_html__( 'Occupation', 'themeszone-add-vc-shortcodes' ),
					'content_text' => esc_html__( 'Text', 'themeszone-add-vc-shortcodes' ),
				),
			) ) ),
			'params' => array(
				array(
					'type' => 'attach_image',
					'heading' => esc_html__( ' Image', 'themeszone-add-vc-shortcodes' ),
					'param_name' => 'image',
					'description' => esc_html__( 'Add Image', 'themeszone-add-vc-shortcodes' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Image size', 'themeszone-add-vc-shortcodes' ),
					'param_name' => 'member_img_size',
					'value' => array(
						'Thumbnail' => 'thumbnail',
						'Medium' => 'medium',
						'Large' => 'large',
						'Full' => 'full',
						),
					'std'=> 'full',
					'description' => esc_html__( "Enter image size. You can change these images' dimensions in wordpress media settings.", 'themeszone-add-vc-shortcodes' ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Name', 'themeszone-add-vc-shortcodes' ),
					'param_name' => 'name',
					'description' => esc_html__( 'Enter Name', 'themeszone-add-vc-shortcodes' ),
					
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Name Color', 'themeszone-add-vc-shortcodes' ),
					'param_name' => 'name_color',
					'description' => esc_html__( 'Select Occupation Color', 'themeszone-add-vc-shortcodes' ),
					'value' => '#FFFFFF',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Occupation', 'themeszone-add-vc-shortcodes' ),
					'param_name' => 'occupation',
					'description' => esc_html__( 'Enter Occupation', 'themeszone-add-vc-shortcodes' ),
					
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Occupation Color', 'themeszone-add-vc-shortcodes' ),
					'param_name' => 'occupation_color',
					'description' => esc_html__( 'Select Occupation Color', 'themeszone-add-vc-shortcodes' ),
					'value' => '#FFFFFF',
				),
				array(
					'type' => 'textarea',
					'heading' => esc_html__( 'Content Text', 'themeszone-add-vc-shortcodes' ),
					'param_name' => 'content_text',
					'description' => esc_html__( 'Set content of element', 'themeszone-add-vc-shortcodes' ),
					
				),	
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Content Text color', 'themeszone-add-vc-shortcodes' ),
					'param_name' => 'content_color',
					'description' => esc_html__( 'Select Content Text', 'themeszone-add-vc-shortcodes' ),
					'value' => '#FFFFFF',
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

class WPBakeryShortCode_testimonials extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'transition_type' => 'fade',
			'autoplay' => 'false',
			'show_arrows' => '',
			'page_navi' => 'false',
			'testimonials_item' => '',
			'sidebar_style' => false,
			'css' => '',
			'el_class'=> '',
		), $atts ) );
		
		$output='';
		$new_items='';
		$content_color='';
		$name_color='';
		$occupation_color='';
		$testimonials_item_content=vc_param_group_parse_atts($testimonials_item);
		$container_id = uniqid('owl',false);
		$total_item = count($testimonials_item_content);
		
		if($sidebar_style){

			foreach ($testimonials_item_content as $position => $item) {
				$new_items .= '<div class="carousel-item">';
				$new_items .= '<div class="item-wrapper sidebar-style">';
				if(array_key_exists('content_text', $item )){
					$new_items .= '<div class="text-wrapper" style="color:'.$item['content_color'].'">'.$item['content_text'].'</div>';
				}
				if(array_key_exists('image', $item )){
					$image_attributes = wp_get_attachment_image_src( $item['image'], $item['member_img_size']);
					$img_alt = get_post_meta($item['image'], '_wp_attachment_image_alt', true);
					$new_items .= '<div class="img-wrapper"><img alt="' . esc_attr($img_alt) . '" src="' . esc_url($image_attributes[0]) . '" width="' . esc_attr($image_attributes[1]) . '" height="' . esc_attr($image_attributes[2]) . '" /></div>';
				}
				$new_items .='<div class="wrapper-member">';
				if(array_key_exists('name', $item )){
					$new_items .='<h3 style="color:'.$item['name_color'].'">'.$item['name'].'</h3>';
				}
				if(array_key_exists('occupation', $item )){
					$new_items .='<span class="occupation" style="color:'.$item['occupation_color'].'">'.$item['occupation'].'</span>';
				}
				$new_items .= '</div>';
				$new_items .= '</div>';
				$new_items .= '</div>';
			}
		}
		else{
			foreach ($testimonials_item_content as $position => $item) {
				$new_items .= '<div class="carousel-item">';
				$new_items .= '<div class="item-wrapper">';
				if(array_key_exists('image', $item )){
					$image_attributes = wp_get_attachment_image_src( $item['image'], $item['member_img_size']);
					$img_alt = get_post_meta($item['image'], '_wp_attachment_image_alt', true);
					$new_items .= '<div class="img-wrapper"><img alt="' . esc_attr($img_alt) . '" src="' . esc_url($image_attributes[0]) . '" width="' . esc_attr($image_attributes[1]) . '" height="' . esc_attr($image_attributes[2]) . '" /></div>';
				}
				if(array_key_exists('content_text', $item )){
					$new_items .= '<div class="text-wrapper" style="color:'.$item['content_color'].'">'.$item['content_text'].'</div>';
				}
				if(array_key_exists('name', $item )){
					$new_items .='<h3 style="color:'.$item['name_color'].'">'.$item['name'].'</h3>';
				}
				if(array_key_exists('occupation', $item )){
					$new_items .='<span class="occupation" style="color:'.$item['occupation_color'].'">'.$item['occupation'].'</span>';
				}
				$new_items .= '</div>';
				$new_items .= '</div>';
			}
		}


				

		$output .= '<div class="brideliness-testimonials '.$el_class.' '.$css.'" id="'.$container_id.'">';
		if ($show_arrows){$output .= "<div class='navi'><span class='prev'><i class='fa fa-angle-left'></i></span><span class='next'><i class='fa fa-angle-right'></i></span></div>"; }
		$output .= '<div class="carousel-container">';
		$output .= $new_items;
		$output .= '</div>';
		$output .= '</div>';
		$output.='<script type="text/javascript">
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
								slideSpeed : 300,
								paginationSpeed : 400,
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

