<?php

/*-------Brideliness Custom product images output----------*/

	/* Variables */
	global $product;
	$product_type='';
	if(isset($_GET['product_type'])){
		$product_type=$_GET['product_type'];
	}
	
	if(brideliness_get_option('product_slider_type') != '' && $product_type!=='product2'){
		$slider_type = brideliness_get_option('product_slider_type');
	}
	else{
		$slider_type = 'slider-with-thumbs';
	}

	$transition_type = (brideliness_get_option('product_slider_effect') != '') ? brideliness_get_option('product_slider_effect') : 'fade';
	$owl_transition_attr = ' data-owl-transition="'.$transition_type.'"';
	$attachment_ids = $product->get_gallery_image_ids();

	/* Extra data attribute for owl carousel & magnific popup */
	$extra_owl_attr = null;
	$extra_popup_attr = null;
	$extra_thumbs_owl_attr = null;
	switch ($slider_type) {
		case 'simple-slider':
			$extra_owl_attr = '" data-owl="container" data-owl-slides="1" data-owl-type="simple"'.$owl_transition_attr;
		break;
		case 'slider-with-popup':
			$extra_owl_attr = '" data-owl="container" data-owl-slides="1" data-owl-type="simple"'.$owl_transition_attr;
			$extra_popup_attr = ' data-magnific="container"';
		break;
		case 'slider-with-thumbs':
			$extra_owl_attr = ' slider-with-thumbs" data-owl="container" data-owl-slides="1" data-owl-type="with-thumbs"'.$owl_transition_attr;
			$extra_popup_attr = ' data-magnific="container"';
			$extra_thumbs_owl_attr = ' data-owl-thumbs="container"';
		break;
		case 'vertical-thumbs':
			$extra_owl_attr = ' vertical-thumbs" data-owl="container" data-owl-slides="1" data-owl-type="with-thumbs"'.$owl_transition_attr;
			$extra_popup_attr = ' data-magnific="container"';
			$extra_thumbs_owl_attr = ' data-owl-thumbs="container"';
		break;
	}

	/* Get product featured image */
	function brideliness_get_main_img($size, $main_slider, $slider_type){
		global $post, $woocommerce, $product;
		$main_image = '';
		if ( has_post_thumbnail() ) {

			$image = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', $size ) );
			$image_title 		= esc_attr( get_the_title( get_post_thumbnail_id() ) );
			$image_link  		= wp_get_attachment_url( get_post_thumbnail_id() );

			if ($main_slider) {
				$main_image = apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image" data-effect="mfp-move-from-top" title="%s" >%s</a>', $image_link, $image_title, $image ), $post->ID );
			} else {
				$main_image = apply_filters( 'woocommerce_single_product_image_html', sprintf( '%s', $image ), $post->ID );
			}

		} else {
			$main_image = apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="Placeholder" />', woocommerce_placeholder_img_src() ), $post->ID );
		}
		return $main_image;
	}

	/* Get attachments */
	function brideliness_get_attachment_imgs($size, $main_slider, $slider_type){
		global $post, $woocommerce, $product;
		$attachment_ids = $product->get_gallery_image_ids();
		$gallery_imgs = '';
		if ($attachment_ids) {
			foreach ( $attachment_ids as $attachment_id ) {
				$image_link = wp_get_attachment_url( $attachment_id );
				$image = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', $size ), false, array() );
				$image_title = esc_attr( get_the_title( $attachment_id ) );

				if ($main_slider) {
					$gallery_imgs .= apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image" data-effect="mfp-move-from-top" title="%s" >%s</a>', $image_link, $image_title, $image ), $attachment_id );
				} else {
					$gallery_imgs .= apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '%s', $image ), $attachment_id );
				}
			}
		}
		return $gallery_imgs;
	}
	$html_output = '';

	/* Output html(main slider) */
	$html_output .= '<div class="main-slider'.$extra_owl_attr.''.$extra_popup_attr.'>';
	$html_output .= brideliness_get_main_img('shop_single', true, $slider_type);
	$html_output .= brideliness_get_attachment_imgs('shop_single', true, $slider_type);
	$html_output .= '</div>';

	if($slider_type == 'vertical-thumbs'|| $slider_type == 'slider-with-thumbs'){
		$html_output .="<div class='slider-navi ".$slider_type."'><span class='prev'><i class='icon-left'></i></span><span class='next'><i class='icon-right'></i></span></div>";
	}
	
	/* Output html(thumbs slider) */
	if (($slider_type == 'slider-with-thumbs' || $slider_type == 'vertical-thumbs') && $attachment_ids ) {
		$html_output .= '<div class="thumb-slider '.$slider_type.'"'.$extra_thumbs_owl_attr.'>';
		$html_output .= brideliness_get_main_img('brideliness-single-product-thumb', false, $slider_type);
		$html_output .= brideliness_get_attachment_imgs('brideliness-single-product-thumb', false, $slider_type);
		$html_output .= '</div>';
	}

	echo $html_output;
