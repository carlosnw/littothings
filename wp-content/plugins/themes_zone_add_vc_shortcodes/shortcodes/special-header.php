<?php

if ( class_exists( 'WPBakeryShortCode' ) ) :

add_action( 'vc_before_init', 'special_header' );

function special_header() {
	 vc_map( array(
			"name" => esc_html__( 'Brideliness Heading', 'themeszone-add-vc-shortcodes' ),
			"base" => "header_specials",
			"description" => __( 'Heading with Google fonts', 'themeszone-add-vc-shortcodes' ),
			'category' => esc_html__( 'Brideliness', 'themeszone-add-vc-shortcodes'),
			'icon' => plugin_dir_url(__FILE__) . 'images/vc-icon.png',
			"params" => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Heading Text', 'themeszone-add-vc-shortcodes' ),
					'param_name' => 'el_title',
					'value' => 'Heading Text',
					'description' => esc_html__( 'Enter Heading Text', 'themeszone-add-vc-shortcodes' ),
				),
				array(
					'type' => 'font_container',
					'param_name' => 'font_container',
					'value' => 'tag:h2|text_align:center',
					'settings' => array(
						'fields' => array(
							'tag' => 'h2', // default value h2
							'text_align'=> 'center',
							'font_size',
							'line_height',
							'color',
							'tag_description' => __( 'Select element tag.', 'themeszone-add-vc-shortcodes' ),
							'text_align_description' => __( 'Select text alignment.', 'themeszone-add-vc-shortcodes' ),
							'font_size_description' => __( 'Enter font size.', 'themeszone-add-vc-shortcodes' ),
							'line_height_description' => __( 'Enter line height.', 'themeszone-add-vc-shortcodes' ),
							'color_description' => __( 'Select heading color.', 'themeszone-add-vc-shortcodes' ),
						),
					),
				),
				array(
					'type' => 'checkbox',
					'heading' => __( 'Use theme default font family?', 'themeszone-add-vc-shortcodes' ),
					'param_name' => 'use_theme_fonts',
					'value' => array( __( 'Yes', 'themeszone-add-vc-shortcodes' ) => 'yes' ),
					'description' => __( 'Use font family from the theme.', 'themeszone-add-vc-shortcodes' ),
				),
				array(
					'type' => 'google_fonts',
					'param_name' => 'google_fonts',
					'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
					'settings' => array(
						'fields' => array(
							'font_family_description' => __( 'Select font family.', 'themeszone-add-vc-shortcodes' ),
							'font_style_description' => __( 'Select font styling.', 'themeszone-add-vc-shortcodes' ),
						),
					),
					'dependency' => array(
						'element' => 'use_theme_fonts',
						'value_not_equal_to' => 'yes',
					),
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Extra class name', 'themeszone-add-vc-shortcodes' ),
					'param_name' => 'el_class',
					'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'themeszone-add-vc-shortcodes' ),
				),
				array(
					'type' => 'css_editor',
					'heading' => __( 'CSS box', 'themeszone-add-vc-shortcodess' ),
					'param_name' => 'css',
					'group' => __( 'Design Options', 'themeszone-add-vc-shortcodes' ),
				),
			)
		)
	);
}

class WPBakeryShortCode_Header_Specials extends WPBakeryShortCode {
	
	 function content( $atts, $content = null ) {	
	
		$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
		extract( $atts );

		$html_output='';
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
		
		$font_container_obj = new Vc_Font_Container();
		$google_fonts_obj = new Vc_Google_Fonts();
		$font_container_field_settings = isset( $font_container['settings'], $font_container['settings']['fields'] ) ? $font_container['settings']['fields'] : array();
		$google_fonts_field_settings = isset( $google_fonts['settings'], $google_fonts['settings']['fields'] ) ? $google_fonts['settings']['fields'] : array();
		$font_container_data = $font_container_obj->_vc_font_container_parse_attributes( $font_container_field_settings, $font_container );
		$google_fonts_data = strlen( $google_fonts ) > 0 ? $google_fonts_obj->_vc_google_fonts_parse_attributes( $google_fonts_field_settings, $google_fonts ) : '';
			
		$styles = array();
		if ( ! empty( $font_container_data ) && isset( $font_container_data['values'] ) ) {
			foreach ( $font_container_data['values'] as $key => $value ) {
				if ( 'tag' !== $key && strlen( $value ) ) {
					if ( preg_match( '/description/', $key ) ) {
						continue;
					}
					if ( 'font_size' === $key || 'line_height' === $key ) {
						$value = preg_replace( '/\s+/', '', $value );
					}
					if ( 'font_size' === $key ) {
						$pattern = '/^(\d*(?:\.\d+)?)\s*(px|\%|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax)?$/';
						// allowed metrics: http://www.w3schools.com/cssref/css_units.asp
						$regexr = preg_match( $pattern, $value, $matches );
						$value = isset( $matches[1] ) ? (float) $matches[1] : (float) $value;
						$unit = isset( $matches[2] ) ? $matches[2] : 'px';
						$value = $value . $unit;
					}
					if ( strlen( $value ) > 0 ) {
						$styles[] = str_replace( '_', '-', $key ) . ': ' . $value;
					}
				}
			}
		}
		
		if ( ( ! isset( $atts['use_theme_fonts'] ) || 'yes' !== $atts['use_theme_fonts'] ) && ! empty( $google_fonts_data ) && isset( $google_fonts_data['values'], $google_fonts_data['values']['font_family'], $google_fonts_data['values']['font_style'] ) ) {
			$google_fonts_family = explode( ':', $google_fonts_data['values']['font_family'] );
			$styles[] = 'font-family:' . $google_fonts_family[0];
			$google_fonts_styles = explode( ':', $google_fonts_data['values']['font_style'] );
			$styles[] = 'font-weight:' . $google_fonts_styles[1];
			$styles[] = 'font-style:' . $google_fonts_styles[2];
		}
		$settings = get_option( 'wpb_js_google_fonts_subsets' );
		if ( is_array( $settings ) && ! empty( $settings ) ) {
			$subsets = '&subset=' . implode( ',', $settings );
		} else {
			$subsets = '';
		}
		if ( ! empty( $google_fonts_data ) && isset( $google_fonts_data['values']['font_family'] ) ) {
			wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $google_fonts_data['values']['font_family'] ), '//fonts.googleapis.com/css?family=' . $google_fonts_data['values']['font_family'] . $subsets );
		}
		
		if ( ! empty( $styles ) ) {
			$style = 'style="' . esc_attr( implode( ';', $styles ) ) . '"';
		} else {
			$style = '';
		}
		
		$html_output.='<div class="br-wrap-title '.$css_class.'">';
		$html_output.='<'.$font_container_data['values']['tag'] . ' ' . $style . ' class="br-title '.$el_class.'"><span>'.$el_title.'</span></'.$font_container_data['values']['tag'].'>';
		$html_output.='</div>';
		return $html_output;
	}
	
}


endif;