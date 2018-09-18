<?php

if ( class_exists( 'WPBakeryShortCode' ) ) :

/* New Param for positioning */
vc_add_shortcode_param( 'position', 'brideliness_position_settings_field' );
function brideliness_position_settings_field( $settings, $value ) {
	return '<div class="position_block">'
	        .'<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-numberinput ' .
	        esc_attr( $settings['param_name'] ) . ' ' .
	        esc_attr( $settings['type'] ) . '_field" type="number" value="' . esc_attr( $value ) . '" />' .
	        '</div>'; // This is html markup that will be outputted in content elements edit form
}

add_action( 'vc_before_init', 'dash_banner' );

function dash_banner() {
	 vc_map( array(
			'name' => esc_html__( 'Brideliness Banner', 'themeszone-add-vc-shortcodes' ),
			'base' => 'dash_banner',
			'description' => esc_html__( 'Creates unique banner with hover effect', 'themeszone-add-vc-shortcodes' ),
			'category' => esc_html__( 'Brideliness', 'themeszone-add-vc-shortcodes'),
			'icon' => plugin_dir_url(__FILE__) . 'images/vc-icon.png',
			'params' => array(
				array(
					'type' => 'attach_image',
					'heading' => esc_html__( 'Banner Image', 'themeszone-add-vc-shortcodes' ),
					'param_name' => 'banner_img',
					'description' => esc_html__( 'Select image from media library.', 'themeszone-add-vc-shortcodes' ),
				),
				array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Image size', 'themeszone-add-vc-shortcodes' ),
				'param_name' => 'banner_img_size',
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
					'type' => 'textarea_raw_html',
					'holder' => 'div',
					'heading' => esc_html__( 'Banner main caption', 'themeszone-add-vc-shortcodes' ),
					'param_name' => 'main_caption',
					'value' => base64_encode( '<p>I am raw html block.<br/>Click edit button to change this html</p>' ),
				),
				array(
					'type' => 'position',
					'heading' => esc_html__( 'Specify left offset for banner main caption (in %)', 'themeszone-add-vc-shortcodes' ),
					'param_name' => 'main_caption_pos_left',
					'value'=>'',
					'std'=> '50',
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
					'type' => 'position',
					'heading' => esc_html__( 'Specify top offset for banner main caption (in %)', 'themeszone-add-vc-shortcodes' ),
					'param_name' => 'main_caption_pos_top',
					'value'=>'',
					'std'=> '50',
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Check for Animate Main Caption', 'themeszone-add-vc-shortcodes' ),
					'param_name' => 'main_caption_animate',
					'value' => array( esc_html__( 'Yes', 'themeszone-add-vc-shortcodes' ) => 'yes' ),
					'std' => 'no',
				),
				array(
					'type' => 'textarea_raw_html',
					'holder' => 'div',
					'heading' => esc_html__( 'Banner secondary caption', 'themeszone-add-vc-shortcodes' ),
					'param_name' => 'secondary_caption',
					'value' => base64_encode( '<p>I am raw html block.<br/>Click edit button to change this html</p>' ),
				),
				array(
					'type' => 'position',
					'heading' => esc_html__( 'Specify left offset for banner secondary caption (in %)', 'themeszone-add-vc-shortcodes' ),
					'param_name' => 'secondary_caption_pos_left',
					'value'=>'',
					'std'=> '50',
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
					'type' => 'position',
					'heading' => esc_html__( 'Specify top offset for banner secondary caption (in %)', 'themeszone-add-vc-shortcodes' ),
					'param_name' => 'secondary_caption_pos_top',
					'value'=>'',
					'std'=> '50',
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Check for Animate Secondary Caption', 'themeszone-add-vc-shortcodes' ),
					'param_name' => 'secondary_caption_animate',
					'value' => array( esc_html__( 'Yes', 'themeszone-add-vc-shortcodes' ) => 'yes' ),
					'std' => 'no',
				),
				array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Choose hover effect for Banner', 'themeszone-add-vc-shortcodes' ),
				'param_name' => 'hover_effect',
				'value' => array(
					'lily' => 'lily',
					'sadie' => 'sadie',
					'roxy' => 'roxy',
					'bubba' => 'bubba',
					'bubba1' => 'bubba1',
					'bubba2' => 'bubba2',
					'romeo' => 'romeo',
					'honey' => 'honey',
					'oscar' => 'oscar',
					'marley' => 'marley',
					'ruby' => 'ruby',
					'milo' => 'milo',
					'dexter' => 'dexter',
					'sarah' => 'sarah',
					'chico' => 'chico',
					'julia' => 'julia',
					'goliath' => 'goliath',
					'selena' => 'selena',
					'kira' => 'kira',
					'ming' => 'ming',
					'without hover' => 'without-hover',
					),
					'std'=> 'lily',
				),
				array(
				'type' => 'vc_link',
				'heading' => esc_html__( 'Add link to banner', 'themeszone-add-vc-shortcodes' ),
				'param_name' => 'banner_link',
				'value' => '',
				'description' => esc_html__( "Enter image size. You can change these images' dimensions in wordpress media settings.", 'themeszone-add-vc-shortcodes' ),
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Check for Delete Button', 'themeszone-add-vc-shortcodes' ),
					'param_name' => 'button_banner',
					'value' => array( esc_html__( 'Yes', 'themeszone-add-vc-shortcodes' ) => 'yes' ),
					'description' => esc_html__( 'Use font family from the theme.', 'themeszone-add-vc-shortcodes' ),
					'std' => 'yes',
				),
				array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Choose hover effect for Banner', 'themeszone-add-vc-shortcodes' ),
				'param_name' => 'button_type',
				'value' => array(
					'Button Type 1' => 'button1',
					'Button Type 2' => 'button2',
					'Button Type 3' => 'button3',
					'Button Type 4' => 'button4',
					'Button Type 5' => 'button5',
					'Button Type 6' => 'button6',
					),
					'dependency' => array(
						'element' => 'button_banner',
						'value_not_equal_to' => 'yes',
					),
					'std'=> 'lily',
				),
				array(
				'type' => 'position',
				'heading' => esc_html__( 'Specify top offset for button banner (in %)', 'themeszone-add-vc-shortcodes' ),
				'param_name' => 'banner_link_pos_top',
				'value'=>'',
				'std'=> '70',
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
				'type' => 'position',
				'heading' => esc_html__( 'Specify left offset for button banner (in %)', 'themeszone-add-vc-shortcodes' ),
				'param_name' => 'banner_link_pos_left',
				'value'=>'',
				'std'=> '70',
				'edit_field_class' => 'vc_col-sm-6 vc_column',
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
		)
	);
}

class WPBakeryShortCode_dash_banner extends WPBakeryShortCode {
	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'banner_img' 				 => '',
			'banner_img_size'			 => 'full',
			'main_caption'				 => '',
			'main_caption_pos_left' 	 => '50',
			'main_caption_pos_top' 		 => '50',
			'main_caption_animate'       => '',
			'secondary_caption' 		 => '',
			'secondary_caption_pos_left' => '50',
			'secondary_caption_pos_top'  => '50',
			'secondary_caption_animate'       => '',
			'hover_effect' 				 => 'lily',
			'banner_link' 				 => '',
			'button_banner' 			 => 'yes',
			'button_type'                => '',
			'banner_link_pos_left'		 => '70',
			'banner_link_pos_top'		 => '70',
			'el_class' 					 => '',
			'css'						 => '',
		), $atts ) );

		$image_attributes = false;
		$img = '';
		$output = '';

		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
		
		
		$image_attributes = wp_get_attachment_image_src( $banner_img, $banner_img_size );
		if( $image_attributes ) {
			$img = wp_get_attachment_image( $banner_img, $banner_img_size );
		}
		$animate_caption_m = $main_caption_animate ? "animated": '';
		$animate_caption_s = $secondary_caption_animate ? "animated": '';
		$href = vc_build_link($banner_link);
		
		
		$output .= '<figure class="brideliness-banner banner-with-effects effect-' . esc_attr($hover_effect) . ' ' . $css_class . ' ' .  $el_class . '">';
		$output .='<a href='.esc_url( $href["url"] ).'>';
		$output .= $img;
		$output .= '<figcaption>';
		
		if ($main_caption && $main_caption!='') {
			$output .= '<h3 class="main-caption '.$animate_caption_m.'" style="left:'.esc_attr($main_caption_pos_left).'%; top:'.esc_attr($main_caption_pos_top).'%;">' . rawurldecode( base64_decode( strip_tags( $main_caption ) ) ) . '</h3>';
		}
		if ($secondary_caption && $secondary_caption!='') {
			$output .= '<h4 class="secondary-caption '.$animate_caption_s.'" style="left:'.esc_attr($secondary_caption_pos_left).'%; top:'.esc_attr($secondary_caption_pos_top).'%;">' . rawurldecode( base64_decode( strip_tags( $secondary_caption ) ) ) . '</h4>';
		}
		$output .= '</figcaption>';
		if ($button_banner!=='yes' && $banner_link && $banner_link!='') {
			$output .= '<a class="button-banner '.$button_type.'" style="left:'.esc_attr($banner_link_pos_left).'%; top:'.esc_attr($banner_link_pos_top).'%;" href="' . esc_url( $href["url"] ) . '" title="' . esc_attr( $href["title"] ) . '" target="' . esc_attr( $href["target"] ) . '">'.$href['title'].'</a>';
		}
		$output .='</a>';
		$output .= '</figure>';

		
		return $output;
	}
}


endif;
