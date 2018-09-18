<?php
if ( class_exists( 'WPBakeryShortCode' ) ) :

add_action( 'vc_before_init', 'info_member' );

function info_member(){
	
vc_map( array(
      "name" => esc_html__( 'Member Info and Contacts', 'themeszone-add-vc-shortcodes' ),
      "base" => "info_member",
	  "category" => esc_html__( 'Brideliness', 'themeszone-add-vc-shortcodes'),
	  "description" => esc_html__( 'Output Member Info and Contacts', 'themeszone-add-vc-shortcodes' ),
	  'icon' => plugin_dir_url(__FILE__) . 'images/vc-icon.png',
      "params" => array(
		array(
			'type' => 'attach_image',
			'heading' => esc_html__( 'Member Image', 'themeszone-add-vc-shortcodes' ),
			'param_name' => 'member_img',
			'description' => esc_html__( 'Add Member Image', 'themeszone-add-vc-shortcodes' ),
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
			'heading' => esc_html__( 'Team Member Name', 'themeszone-add-vc-shortcodes' ),
			'param_name' => 'member_name',
			'description' => esc_html__( 'Team Member Name', 'themeszone-add-vc-shortcodes' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Team Member Occupation', 'themeszone-add-vc-shortcodes' ),
			'param_name' => 'member_occupation',
			'description' => esc_html__( 'Team Member Occupation', 'themeszone-add-vc-shortcodes' ),
		),
		array(
			'type' => 'textarea',
			'heading' => esc_html__( 'Team Member Short Biography', 'themeszone-add-vc-shortcodes' ),
			'param_name' => 'member_biography',
			'value' => esc_html__( 'Short biography here', 'themeszone-add-vc-shortcodes' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Enable hover effect', 'themeszone-add-vc-shortcodes' ),
			'param_name' => 'hover_ef',
			'description' => esc_html__( 'Check "enable" to add hover effect for the element', 'themeszone-add-vc-shortcodes' ),
		),
		array(
			'type' => 'param_group',
			'heading' => esc_html__( 'Buttons', 'themeszone-add-vc-shortcodes' ),
			'param_name' => 'buttons',
			'value' => urlencode( json_encode( array(
				array(
					'label' => esc_html__( 'Facebook', 'themeszone-add-vc-shortcodes' ),
					'url' => 'https://www.facebook.com/',
					'icon' => 'facebook',
				),
				array(
					'label' => esc_html__( 'Twitter', 'themeszone-add-vc-shortcodes' ),
					'url' => 'https://twitter.com',
					'icon' => 'twitter',
				),
				array(
					'label' =>esc_html__( 'Google Plus', 'themeszone-add-vc-shortcodes' ),
					'url' => 'https://plus.google.com',
					'icon' => 'google-plus',
				),
			) ) ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'themeszone-add-vc-shortcodes' ),
					'param_name' => 'label',
					'description' => esc_html__( 'Enter Title', 'themeszone-add-vc-shortcodes' ),
					'admin_label' => true,
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'URL', 'themeszone-add-vc-shortcodes' ),
					'param_name' => 'url',
					'description' => esc_html__( 'Enter URL for button', 'themeszone-add-vc-shortcodes' ),
					'admin_label' => true,
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Icon for button', 'themeszone-add-vc-shortcodes' ),
					'param_name' => 'icon',
					'description' => esc_html__( 'Enter Icon for button', 'themeszone-add-vc-shortcodes' ),
					'admin_label' => true,
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

class WPBakeryShortCode_info_member extends WPBakeryShortCode {
	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'member_img' => '',
			'member_img_size' => 'full',
			'member_name' => '',
			'member_occupation' => '',
			'member_biography' => 'Short biography here',
			'css' => '',
			'buttons'=> '',
			'el_class'=> '',
			'hover_ef'=> '',
		), $atts ) );

		$output = '';
		$img ='';
		$buttons_member='';
		$hover='';
		$image_attributes = wp_get_attachment_image_src( $member_img, $member_img_size);
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
		$button_attributes =  vc_param_group_parse_atts( $buttons );
		if( $image_attributes ) {
			$img_alt = get_post_meta($member_img, '_wp_attachment_image_alt', true);
			$img ='<div class="contact-img-wrapper"><img alt="' . esc_attr($img_alt) . '" src="' . esc_url($image_attributes[0]) . '" width="' . esc_attr($image_attributes[1]) . '" height="' . esc_attr($image_attributes[2]) . '" /></div>';
		}
		if($button_attributes){
			$buttons_member .='<div class="contact-btns">';
			foreach ( $button_attributes as $data ) {
				$buttons_member.='<a href="'.esc_url($data['url']).'" target="_blank" rel="nofollow" title="'.esc_attr($data['label']).'"><i class="fa fa-'.esc_attr($data['icon']).'"></i></a>';
			}
			$buttons_member .='</div>';
		}
		if($hover_ef){
			$hover='hover';
		}		

		$output .= '<div class="brideliness-member-contact ' .$hover.' '.$css_class.' '.$el_class.'">';
		$output .= $img;
		$output .= '<h3>'.$member_name.'</h3>';
		$output .= '<span>'.$member_occupation.'</span>';
		$output .= '<div class="short-biography">'.$member_biography.'</div>';
		$output .= $buttons_member;
		$output .= '</div>';

		return $output;
	}
}


endif;