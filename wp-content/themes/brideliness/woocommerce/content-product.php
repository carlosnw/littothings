<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Adding extra data for isotope filtering
$attributes = $product->get_attributes();
if ($attributes) {
	foreach ( $attributes as $attribute ) {
		if ( $attribute['is_taxonomy'] ) {
			$values = wc_get_product_terms( $product->get_id(), $attribute['name'], array( 'fields' => 'slugs' ) );
			$result = implode( ' ', $values );
		} else {
			$values = array_map( 'trim', explode( '|', $attribute['value'] ) );
			$result = implode( ' ', $values );
		}
		$classes[] = strtolower($result);
	}
}

// Extra responsive classes
$responsive_class='';

if ( brideliness_get_option('store_columns')=='3' && !is_product()&& !is_cart() ) {
	if ( brideliness_show_layout()!='layout-one-col' ) {
		$responsive_class = " col-xs-12 col-md-4 col-sm-6";
	}
	else {
		$responsive_class = " col-xs-12 col-md-4 col-sm-3";
	}
} elseif ( is_cart() ) {$responsive_class = "";}
elseif ( brideliness_get_option('store_columns')=='4'  && !is_product() ) {
	if ( brideliness_show_layout()!='layout-one-col' ) {
		$responsive_class = " col-xs-12 col-md-3 col-sm-6";
	} else {
		$responsive_class = " col-xs-12 col-md-3 col-sm-4";
	}
} elseif ( brideliness_get_option('related_products_qty')=='4' && is_product() ) {
	$responsive_class = " col-xs-12 col-md-3 col-sm-6";
}elseif ( brideliness_get_option('related_products_qty')=='3' && is_product() ) {
	$responsive_class = " col-xs-12 col-md-4 col-sm-6";
}
//$classes[] = brideliness_get_option('default_list_type')? brideliness_get_option('default_list_type'):'grid-view';

if(brideliness_get_option('default_list_type')&& !isset($_GET['s_type'])){
	$classes[]=	brideliness_get_option('default_list_type');
}
elseif(isset($_GET['s_type'])){
	$classes[]='list-view';
}
else{$classes[]='grid-view';}

$classes[] = esc_attr($responsive_class);
?>

<li <?php post_class( $classes ); ?>>
	
	<?php
		/**
		 * woocommerce_before_shop_loop_item hook.
		 *
		 * @hooked woocommerce_template_loop_product_link_open - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item' ); 

		/**
		* woocommerce_before_shop_loop_item_title hook
		*
		* @hooked woocommerce_show_product_loop_sale_flash - 10
		* @hooked woocommerce_template_loop_product_thumbnail - 10
		*/
			do_action( 'woocommerce_before_shop_loop_item_title' );
	?>

	<?php
		/**
		* woocommerce_shop_loop_item_title hook
		*
		* @hooked woocommerce_template_loop_product_title - 10
		*/
		do_action( 'woocommerce_shop_loop_item_title' );

		/**
		* woocommerce_after_shop_loop_item_title hook
		*
		* @hooked woocommerce_template_loop_rating - 5
		* @hooked woocommerce_template_loop_price - 10
		*/
		do_action( 'woocommerce_after_shop_loop_item_title' );

		/*
		 * woocommerce_after_shop_loop_item hook.
		 *
		 * @hooked woocommerce_template_loop_product_link_close - 5
		 * @hooked woocommerce_template_loop_add_to_cart - 10
		 */
		do_action( 'woocommerce_after_shop_loop_item' );
	?>

</li>
