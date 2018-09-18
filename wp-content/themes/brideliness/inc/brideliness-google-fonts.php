<?php
/**
 *  Get Google Fonts
 */

function brideliness_google_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = apply_filters('furnisher_fonts_default_subset', 'latin,latin-ext');
	$font_var  = '100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic';

	/* Get default fonts used in theme */
	if (class_exists('bridelinessFonts')) {
		$brideliness_default_fonts = bridelinessFonts::get_default_fonts();
		
		if(brideliness_get_option('site_custom_colors')=='on' && brideliness_get_option('google_fonts_api_key')!==''){
			$primary_text_typography_ = brideliness_get_option('primary_text_typography')? brideliness_get_option('primary_text_typography'): '';
			$content_headings_typography_ = brideliness_get_option('content_headings_typography')? brideliness_get_option('content_headings_typography'): '';
			$sidebar_headings_typography_ = brideliness_get_option('sidebar_headings_typography')? brideliness_get_option('sidebar_headings_typography'): '';
			$footer_headings_typography_ = brideliness_get_option('footer_headings_typography')? brideliness_get_option('footer_headings_typography'): '';
			$button_typography_ = brideliness_get_option('button_typography')? brideliness_get_option('button_typography'): '';
			
			$brideliness_default_fonts[] = $primary_text_typography_['face'];
			$brideliness_default_fonts[] = $content_headings_typography_['face'];
			$brideliness_default_fonts[] = $sidebar_headings_typography_['face'];
			$brideliness_default_fonts[] = $footer_headings_typography_['face'];
			$brideliness_default_fonts[] = $button_typography_['face'];
		}
	}
	
	if ( is_array($brideliness_default_fonts) || is_object($brideliness_default_fonts) ) {
		foreach ( $brideliness_default_fonts as $single_font ) {
			/*  Translators: If there are characters in your language that are not
			 *  supported by font, translate this to 'off'. Do not translate
			 *  into your own language.
			 */
			if ( 'off' !== esc_html_x( 'on', $single_font . ' font: on or off', 'brideliness' ) ) {
				$fonts[] = $single_font . ':' . $font_var;
			}
		}
		unset($single_font);
	} else {
		if ( 'off' !== esc_html_x( 'on', 'Open Sans font: on or off', 'brideliness' ) ) {
			$fonts[] = 'Lato:' . $font_var;
		}
	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = esc_html_x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'brideliness' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}
 
	return esc_url_raw( $fonts_url );
}

/**
 *  Add used fonts to frontend
 */
function brideliness_add_fonts_styles() {
	wp_enqueue_style( 'google-fonts', brideliness_google_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'brideliness_add_fonts_styles' );
