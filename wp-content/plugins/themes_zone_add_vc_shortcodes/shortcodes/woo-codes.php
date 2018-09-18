<?php

if ( class_exists( 'WPBakeryShortCode' ) ) :

add_action( 'vc_before_init', 'woo_codes' );

function woo_codes() {
   vc_map( array(
      "name" => esc_html__( 'Woocommerce Shortcode', 'themeszone-add-vc-shortcodes' ),
      "base" => "woo_codes",
      "category" => esc_html__( 'Brideliness', 'themeszone-add-vc-shortcodes'),
	  'icon' => plugin_dir_url(__FILE__) . 'images/vc-icon.png',
      "params" => array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Woocommerce Shortcode', 'themeszone-add-vc-shortcodes' ),
			'param_name' => 'codeswoo',
			'value' => array(
                esc_html__( 'Recent Products', 'themeszone-add-vc-shortcodes' ) => 'recent_products',
                esc_html__( 'Featured Products', 'themeszone-add-vc-shortcodes' ) => 'featured_products',
                esc_html__( 'Sale Products', 'themeszone-add-vc-shortcodes' ) => 'sale_products',
				esc_html__( 'Products by category', 'themeszone-add-vc-shortcodes' ) => 'product_category',
                esc_html__( 'Best Selling Products', 'themeszone-add-vc-shortcodes' ) => 'best_selling_products',
                esc_html__( 'Top Rated Products', 'themeszone-add-vc-shortcodes' ) => 'top_rated_products',
                esc_html__( 'Product Categories', 'themeszone-add-vc-shortcodes' ) => 'product_categories',
			),
			'description' => esc_html__( 'Select Woocommerce Shortcode', 'themeszone-add-vc-shortcodes' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Element Title', 'themeszone-add-vc-shortcodes' ),
			'param_name' => 'el_title',
			'description' => esc_html__( 'Enter Element Title', 'themeszone-add-vc-shortcodes' ),
		),
		array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Categorie Slug', 'themeszone-add-vc-shortcodes' ),
            'param_name' => 'cat_slug',
            'description' => esc_html__( 'Comma separated list of category slugs which products you want to output', 'themeszone-add-vc-shortcodes' ),
            'dependency' => array(
              'element' => 'codeswoo',
              'value' => array( 'product_category' ),
            ),
        ),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Number of Products/Categories to show', 'themeszone-add-vc-shortcodes' ),
			'param_name' => 'items_number',
			'description' => esc_html__( 'Set the number of items to show', 'themeszone-add-vc-shortcodes' ),
			'value'=>'5',
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Order Parameter', 'themeszone-add-vc-shortcodes' ),
			'param_name' => 'order_param',
			'value' => array(
                esc_html__( 'Ascending', 'themeszone-add-vc-shortcodes' ) => 'ASC',
                esc_html__( 'Descending', 'themeszone-add-vc-shortcodes' ) => 'Descending',
			),
			'std' => 'Descending',
			'description' => esc_html__( 'Set the number of items to show', 'themeszone-add-vc-shortcodes' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Order Parameter by', 'themeszone-add-vc-shortcodes' ),
			'param_name' => 'order_param_by',
			'value' => array(
				esc_html__( 'Date', 'themeszone-add-vc-shortcodes') => 'date',
				esc_html__( 'Title', 'themeszone-add-vc-shortcodes') => 'title',
				esc_html__( 'Name', 'themeszone-add-vc-shortcodes') => 'name',
				esc_html__( 'ID', 'themeszone-add-vc-shortcodes') => 'id',
				esc_html__( 'Random', 'themeszone-add-vc-shortcodes') => 'rand',
			),
			'description' => esc_html__( 'Set the number of items to show', 'themeszone-add-vc-shortcodes' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Columns quantity', 'themeszone-add-vc-shortcodes' ),
			'param_name' => 'columns_number',
			'value' => array(
                esc_html__( '2 Cols', 'themeszone-add-vc-shortcodes' ) => '2',
                esc_html__( '3 Cols', 'themeszone-add-vc-shortcodes' ) => '3',
                esc_html__( '4 Cols', 'themeszone-add-vc-shortcodes' ) => '4',
                esc_html__( '5 Cols', 'themeszone-add-vc-shortcodes' ) => '5',
                esc_html__( '6 Cols', 'themeszone-add-vc-shortcodes' ) => '6',
			),
			'std' => '4',
			'description' => esc_html__( 'Set Columns quantity', 'themeszone-add-vc-shortcodes' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Use Owl Carousel', 'themeszone-add-vc-shortcodes' ),
			'param_name' => 'use_slider',
			'value' => array( esc_html__( 'Yes', 'themeszone-add-vc-shortcodes' ) => 'true' ),
			'std' => 'true',
			'edit_field_class' => 'vc_col-sm-6 vc_column',
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Use AutoPlay Carousel', 'themeszone-add-vc-shortcodes' ),
			'param_name' => 'autoplay',
			'edit_field_class' => 'vc_col-sm-6 vc_column',
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Use Owl Carousel Navigation', 'themeszone-add-vc-shortcodes' ),
			'param_name' => 'use_navi_slider',
			'value' => array( esc_html__( 'Yes', 'themeszone-add-vc-shortcodes' ) => 'true' ),
			'std' => '',
			'description' => esc_html__( 'Display Top Navigation', 'themeszone-add-vc-shortcodes' ),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Use Owl Carousel Pagination', 'themeszone-add-vc-shortcodes' ),
			'param_name' => 'use_pagi_slider',
			'value' => array( esc_html__( 'Yes', 'themeszone-add-vc-shortcodes' ) => 'true' ),
			'std' => '',
			'description' => esc_html__( 'Display Carousel Pagination', 'themeszone-add-vc-shortcodes' ),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Use Owl Carousel Pagination "Next", "Prev"', 'themeszone-add-vc-shortcodes' ),
			'param_name' => 'use_pagi_next_prev_slider',
			'value' => array( esc_html__( 'Yes', 'themeszone-add-vc-shortcodes' ) => 'true' ),
			'std' => '',
			'description' => esc_html__( 'Display Carousel Pagination "Next", "Prev"', 'themeszone-add-vc-shortcodes' ),
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
   ) );
}

class WPBakeryShortCode_woo_codes extends WPBakeryShortCode {

 protected function content( $atts, $content = null ) {
   
   extract( shortcode_atts(array(
			'el_title' => '',
			'codeswoo' => 'recent_products',
			'items_number' => '5',
			'autoplay' => 'false',
			'use_slider' => 'true',
			'use_navi_slider' => 'false',
			'use_pagi_slider' => 'false',
			'use_pagi_next_prev_slider' => 'false',
			'columns_number' => '4',
			'order_param' => 'Descending',
			'el_class' => '',
			'css' => '',
		), $atts ) );

		$output = '';
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
		
		$container_class = 'brideliness-woo-shortcode ' . $el_class . $css_class;
		if ( $columns_number=='2' && (brideliness_show_layout()!='layout-one-col') ) {
			$qty_sm = $qty_xs = 1;
			$qty_md = 2;
		} elseif ( $columns_number=='2' && (brideliness_show_layout()=='layout-one-col') ) {
			$qty_sm = $qty_xs = 1;
			$qty_md = 2;
		} elseif ( $columns_number!='2' && (brideliness_show_layout()!='layout-one-col') ) {
			$qty_md = 3;
			$qty_sm = 2;
			$qty_xs = 2;
		} elseif ( $columns_number!='2' && (brideliness_show_layout()=='layout-one-col') ) {
			$qty_md = $columns_number;
			$qty_sm = 2;
			$qty_xs = 2;
		}

		$container_id = uniqid();
		if ( $use_slider=='true') { 
			$container_class = $container_class.' with-slider';
			$container_id = uniqid('owl',false);
		}
		$container_class = ( ! empty( $container_class ) ) ? ' class="' . $container_class . '"' : '';
		$output = "<div {$container_class} id='{$container_id}'>";
		$output .="<div class='title-wrapper'>";
		if ( $el_title!=='') { 
		$output .="<h3><span>{$el_title}</span></h3>";
		}
		if ($use_navi_slider=='true' && $use_slider=='true' ) {
			$output .= "<div class='slider-navi'><span class='prev'><i class='fa fa-angle-left'></i></span><span class='next'><i class='fa fa-angle-right'></i></span></div>";
		}
		$output .="</div>";

    $on_sale_var = 'false';
    $best_selling_var = 'false';
    $top_rated_var = 'false';
    $visibility_var = 'visible';
    switch ($codeswoo) {
      case 'recent_products':
        $order_param_by = 'id';
      break;
      case 'featured_products':
        $visibility_var = 'featured';
      break;
      case 'sale_products':
        $on_sale_var = 'true';
      break;
      case 'best_selling_products':
        $best_selling_var = 'true';
      break;
      case 'top_rated_products':
        $top_rated_var = 'true';
      break;
    }
	$shortcode = '';
		
		if($codeswoo=='product_categories'){
			$shortcode .= '[product_categories limit="'.esc_attr($items_number).'" ]';
		}
		else{
			$shortcode .= '[products limit="'.esc_attr($items_number).'" columns="'.esc_attr($columns_number).'" orderby="'.esc_attr($order_param).'" order="'.esc_attr($order_param).'"';
			$shortcode .= ' visibility="'.esc_attr($visibility_var).'" on_sale="'.esc_attr($on_sale_var).'" best_selling="'.esc_attr($best_selling_var).'" top_rated="'.esc_attr($top_rated_var).'"';
			$shortcode .= ']';
		}
		
		$output .= do_shortcode($shortcode);
		
		$output .="</div>";
		
			if ( $use_slider=='true') {
				$output.='
				<script type="text/javascript">
					(function($) {
						$(document).ready(function() {
							var owl = $("#'.$container_id.' ul.products");
 
							owl.owlCarousel({
							items : '.$columns_number.',        		  // items above 1000px browser width
							itemsDesktop : [1199,'.$qty_md.'], 			  // items between 1000px and 901px
							itemsDesktopSmall : [979,'.$qty_sm.'],  	  // betweem 900px and 601px
							itemsTablet: [768,'.$qty_xs.'], 		  	  // items between 600 and 0
							itemsMobile : [479,1], 						  // 1 item on Mobile dwvices
							pagination: '.$use_pagi_slider.',
							navigation : '.$use_pagi_next_prev_slider.',
							autoPlay   : '.$autoplay.',

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
			}
		
		return $output;
	}
}

endif;