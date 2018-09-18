<?php /* ------------- Woocommerce modifications ------------ */

	/* Contents:
		1.  Style & Scripts
		2.  Product columns filter
		3.  Products per page filter
	    4.  Change sorting default text
		5.  Store Banner
		6.  Woocommerce Main content wrapper
		7.  Shop Breadcrumbs
		8.  Modifying Pagination args
	    9.  Changing 'add to cart' buttons text
        10. Modifying Product Loop layout
	    11. Change the Sale badge text
		12. Modifying Single Product layout
		13. Related Products
        14. Modifying cart layout
		15. Modifying checkout layout
		16. Cross-sells output
	    17. Catalog Mode
		18. Add Size Guide
		19. Add Category Description
		20. Woocommerce standard gallery
	 */
 
 if ( class_exists('Woocommerce') ) {

/*  1. Style (start) */

	// Deactivating Woocommerce styles(start)
		if ( version_compare( WOOCOMMERCE_VERSION, "2.1" ) >= 0 ) {
			add_filter( 'woocommerce_enqueue_styles', '__return_false' );
		} else {
			define( 'WOOCOMMERCE_USE_CSS', false );
		}
	// Deactivating Woocommerce styles(end)
	
/*  1. Style (end)*/ 

/* 2. Product columns filter (start)*/
 
	if ( ! function_exists( 'brideliness_loop_shop_columns' ) ) {
		function brideliness_loop_shop_columns(){
			$qty = (brideliness_get_option('store_columns') != '') ? brideliness_get_option('store_columns') : '3';
			if ( 'layout-one-col' == brideliness_show_layout() ) { $qty = 4; }
			return $qty;
		}
	}
	add_filter('loop_shop_columns', 'brideliness_loop_shop_columns');

/* 2. Product columns filter (end)*/

/* 3. Products per page filter (start) */ 
    function brideliness_woocommerce_catalog_page_ordering() {
        $product_quntifier = 4;
        $pagers = array(1, 2, 3);
		if(brideliness_get_option('store_per_page')){
			$product_quntifier = brideliness_get_option('store_per_page');
		}
        $current = $product_quntifier;
        if (isset($_COOKIE['pager'])) $current = $_COOKIE['pager'];
        if (isset($_GET['pager'])) $current = $_GET['pager'];

        for( $i = 0; $i < count($pagers); $i++ ){
            $pagers[$i] = $pagers[$i] * $product_quntifier;
        }
        ?>
        <div class="paginator-product">
            <span class="shop-label"><?php esc_html_e('Show', 'brideliness') ?></span>
            <ul class="pagination-per-page">
            <?php foreach($pagers as $pager) : ?>
                <li><?php if ($current != $pager) : ?>
                    <a href="?pager=<?php echo esc_attr($pager); ?>">
                    <?php endif; ?>
                        <?php printf(esc_html__("%s", 'brideliness'), $pager); ?>
                    <?php if ($current != $pager) : ?>
                    </a>
                    <?php endif; ?>
					<span class="delimiter">/</span>
                </li>
            <?php endforeach; ?>
                <li>
                    <?php if ($current != 'all') : ?>
                    <a href="?pager=all">
                    <?php endif ?>
                        <?php printf(esc_html__("All", 'brideliness')); ?>
                    <?php if ($current != 'all') : ?>
                    </a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
        <?php
    }
	if(brideliness_get_option('per_page_filter')=='on'){
	   add_action( 'woocommerce_before_shop_loop', 'brideliness_woocommerce_catalog_page_ordering', 25 );
	}

    add_filter( 'loop_shop_per_page', 'brideliness_shop_per_page', 25 );

    function brideliness_shop_per_page(){

        if (isset($_GET['pager'])) {
            setcookie('pager', $_GET['pager'], time()+3600);
            return ($_GET['pager'] == 'all' ? 9999 : $_GET['pager'] );
        }

        if (isset($_COOKIE['pager'])) return ( $_COOKIE['pager'] == 'all' ? 9999 : $_COOKIE['pager'] );

		return brideliness_get_option('store_per_page');
    }

/* 3. Products per page filter (end) */

/* 4. Change sorting default text (start)*/

    function bridelinesstheme_sort_change( $translated_text, $text, $domain ) {
        if ( is_woocommerce() ) {
            switch ( $translated_text ) {
                case 'Default sorting' :
                    $translated_text = esc_html__( 'Date Added', 'brideliness' );
                    break;
            }
        }
        return $translated_text;
    }
    add_filter( 'gettext', 'bridelinesstheme_sort_change', 20, 3 );

/* 4. Change sorting default text (end)*/

/* 5. Store Banner (start) */

	function brideliness_store_banner() {
	
	if (( is_shop() || is_product_category() ||  is_product_tag() || (is_product() && (brideliness_get_option('product_single_type')!=='single_type_3' && !isset($_GET['product_type'])) ) ) || (isset($_GET['product_type']) && $_GET['product_type']!=='product3')) {
			$custom_bg = brideliness_get_option('banner_bg');
			$custom_height_banner =(brideliness_get_option('store_banner_height') != '')? brideliness_get_option('store_banner_height') : '';
			$url_banner = (brideliness_get_option('store_banner_url') != '') ? brideliness_get_option('store_banner_url') : '#';
            $title = (brideliness_get_option('store_banner_title') != '') ? brideliness_get_option('store_banner_title') : '';
             $description = (brideliness_get_option('store_banner_description') != '') ? brideliness_get_option('store_banner_description') : '';
            $banner_text_position =(brideliness_get_option('banner_text_position'))? brideliness_get_option('banner_text_position') : 'center';
            $button_text = (brideliness_get_option('banner_button_text') != '') ? brideliness_get_option('banner_button_text') : '';
            $background_button = (brideliness_get_option('banner_button_bg') != '') ? brideliness_get_option('banner_button_bg') : '';
            $banner_text_color = (brideliness_get_option('banner_button_text_color'))? brideliness_get_option('banner_button_text_color') : '';

			if ( $custom_bg || $custom_height_banner!=='') {
                $style ='';
				if ( $custom_bg['image'] ) {
						$style .= 'background-image:url('. esc_url($custom_bg['image']) .');
											  background-repeat:'. esc_attr($custom_bg['repeat']) .';
											  background-position:'. esc_attr($custom_bg['position']) .';
											  background-attachment:'. esc_attr($custom_bg['attachment']) .';';

					} elseif($custom_bg['color']) {
						$style .= ' background-color:'. esc_attr($custom_bg['color']) .';';}
					else{
					    $style .='';
					}
					if($custom_height_banner) {
                         $style .='height:'.esc_attr($custom_height_banner);
					}
				} ?>
					
                <div class="store-banner"  style="<?php echo esc_attr($style); ?>">
					<div class="overlay"></div>
					<div class="container"  style=" text-align:<?php echo esc_attr($banner_text_position);?>;">
					    <div class="row">
					        <div class="col-sm-12 col-md-12 col-xs-12">
                                <div class=" store-banner-inner">
                                    <?php if($title!=='' || $description!=='') :?>
                                        <div class="banner-text " >
                                        <p class="banner-description"><?php echo esc_attr($description);?></p>
										<h3 class="banner-title"><?php echo esc_attr($title);?></h3>
                                        <?php if($button_text!==''): ?>
                                        <a href="<?php echo esc_url($url_banner);?>" class="banner-button" title="<?php esc_html_e('Click to view all special products', 'brideliness');?>" rel="bookmark" style="background:<?php echo esc_attr($background_button);?>; border:1px solid <?php echo esc_attr($background_button);?>; color:<?php echo($banner_text_color); ?>;"><?php echo esc_attr($button_text);?></a>
                                        <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="vertical-helper"></div>
                    </div>
				</div>
                    
            <?php }
	}

/* 5. Store Banner (end) */

/* 6. Woocommerce Main content wrapper (start)*/
	
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
	
		function brideliness_theme_wrapper_start() {

		// Get number of columns for store page
		$qty = (brideliness_get_option('store_columns') != '') ? brideliness_get_option('store_columns') : '3';
		if ( 'layout-one-col' == brideliness_show_layout() ) { $qty = 4; } ?>

		<div class="container">
			<div class="row">
		
		<?php
		if ( brideliness_show_layout()=='layout-one-col' ) { $content_class = "col-xs-12 col-md-12 col-sm-12"; } 
		elseif ( brideliness_show_layout()=='layout-two-col-left' ) { $content_class = "site-content col-xs-12 col-md-9 col-sm-8 col-md-push-3 col-sm-push-4"; }
		else { $content_class = "col-xs-12 col-md-9 col-sm-9"; } ?>

				<div id="content" class="site-content woocommerce columns-<?php echo esc_attr($qty);?> <?php echo esc_attr($content_class);?>" role="main">
			
			<?php }
			
				function brideliness_theme_wrapper_end() { ?>

				</div><!-- #content -->
			<?php get_sidebar(); ?>
			</div>
		</div> <?php
	}
	
	add_action('woocommerce_before_main_content', 'brideliness_theme_wrapper_start', 10);
	add_action('woocommerce_after_main_content', 'brideliness_theme_wrapper_end', 10);
	
	add_filter( 'woocommerce_show_page_title', 'brideliness_title_for_shop' );
	function brideliness_title_for_shop(){return false;}
	
/* 6. Woocommerce Main content wrapper (end)*/

/* 7. Shop Breadcrumbs (start)*/
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
	
	if ( (brideliness_get_option('store_breadcrumbs')) === 'on' ) {
			function brideliness_shop_breadcrumbs_wrap_begin(){ ?>
			
				<div class="container breadcrumb"> 
            	 	<div class="row">
            	 			<div class="col-md-12 col-sm-12 col-sx-12">
			<?php 
			}
			add_action('woocommerce_before_main_content', 'brideliness_shop_breadcrumbs_wrap_begin', 2);
			function brideliness_shop_breadcrumbs_wrap_end(){ ?>
				</div></div></div>
			<?php }
			add_action('woocommerce_before_main_content', 'brideliness_shop_breadcrumbs_wrap_end', 5);
			add_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 3 );
	}
	
	// Change the breadcrumb delimeter from '/' to '>'
	add_filter( 'woocommerce_breadcrumb_defaults', 'brideliness_change_breadcrumb_delimiter' );
	function brideliness_change_breadcrumb_delimiter( $defaults ) {
		$defaults['delimiter'] = '<span class="delimeter"> &gt;</span> ';
		return $defaults;
	}
	
/* 7. Shop Breadcrumbs (end)*/

/* 8. Modifying Pagination args (start)*/

    function brideliness_new_pagination_args($args) {
        $args['prev_text'] =esc_html__('Previous', 'brideliness');
        $args['next_text'] =esc_html__('Next', 'brideliness');
        return $args;
    }
    add_filter('woocommerce_pagination_args','brideliness_new_pagination_args');

/* 8. Modifying Pagination args (end)*/

/* 9. Changing 'add to cart' buttons text (start)*/

		function brideliness_woocommerce_product_loop_add_to_cart_text() {
			global $product;
			$product_type = $product->get_type();
			switch ( $product_type ) {
				case 'external':
					return $product->get_button_text();
				break;
				case 'grouped':
					return  esc_html__('Add to Bag', 'brideliness');
				break;
				case 'simple':
					return  esc_html__('Add to Bag', 'brideliness');
				break;
				case 'variable':
					return esc_html__('Add to Bag', 'brideliness');
				break;
				default:
					return esc_html__('Add to Bag', 'brideliness');
			}
		}

	add_filter( 'woocommerce_product_add_to_cart_text' , 'brideliness_woocommerce_product_loop_add_to_cart_text' );

/* 9. Changing 'add to cart' buttons text (end)*/

/* 10. Modifying Product Loop layout (start)*/

/* List/grid view switcher (start)*/

	function brideliness_view_switcher() { ?>
		<div class="col-md-1">
            <?php if ( (brideliness_get_option('list_grid_switcher')) === 'on' )  :?>
                <div id="button-group-switcher" class="pt-view-switcher">
                    <span class="pt-grid <?php if(brideliness_get_option('default_list_type')=='grid-view' && !isset($_GET['s_type'])){echo 'active';}?>" data-layout-mode-value="fitRows" title="<?php esc_html_e('Grid View', 'brideliness') ?>"><i class="fa fa-th"></i>
                    </span>
                    <span class="pt-list <?php if(brideliness_get_option('default_list_type')=='list-view' || isset($_GET['s_type'])){echo 'active';}?>" data-layout-mode-value="vertical" title= "<?php esc_html_e('List View', 'brideliness')?>"><i class="fa fa-bars"></i>
                    </span>
                </div>
            <?php endif; ?>
		</div>
	<?php }

	add_action( 'woocommerce_before_shop_loop', 'brideliness_view_switcher', 20 );

/* List/grid view switcher (end)*/
	
/* Products per page filter wrapper  (start)*/

	function brideliness_result_output_product_wrap_start(){ ?>
		<div class="col-md-2">
			<div class="result-output-product-wrap">
			
	<?php }
		add_action( 'woocommerce_before_shop_loop', 'brideliness_result_output_product_wrap_start', 24 );
	
	
		function brideliness_result_output_product_wrap_end(){ ?>
			</div>
		</div>
	<?php }
	
	add_action( 'woocommerce_before_shop_loop', 'brideliness_result_output_product_wrap_end', 26 );

/* Products per page filter wrapper  (end)*/

/* Catalog ordering wrapper  (start)*/

	function brideliness_woocommerce_catalog_ordering_wrap_start(){ ?>
		<div class="col-md-4 ordering">
			<span class="shop-sort-by"><?php esc_html_e('Sort by','brideliness')?></span>
	<?php }
	add_action( 'woocommerce_before_shop_loop', 'brideliness_woocommerce_catalog_ordering_wrap_start', 29 );
	
	
	function brideliness_woocommerce_catalog_ordering_wrap_end(){ ?>
		</div>
	<?php }
	
	add_action( 'woocommerce_before_shop_loop', 'brideliness_woocommerce_catalog_ordering_wrap_end', 31 );

 /* Catalog ordering wrapper  (end)*/

/*  Add to wishlist button (start)*/

		function brideliness_new_wishlist() { 
			if ( ( class_exists( 'YITH_WCWL_Shortcode' ) ) && ( get_option('yith_wcwl_enabled') == true ) ) {
				$atts = array(
			            'per_page' => 10,
			             'pagination' => 'no', 
			    );
			echo YITH_WCWL_Shortcode::add_to_wishlist($atts);
			}
		}
	add_action( 'woocommerce_after_shop_loop_item', 'brideliness_new_wishlist', 11);
	
/*  Add to wishlist button (end)*/

/* Buttons Wrapper (start)*/

		function brideliness_buttons_wrapper_start(){ ?>
			<div class="buttons-wrapper">
	<?php }
		add_action( 'woocommerce_after_shop_loop_item', 'brideliness_buttons_wrapper_start', 1);
		
		function brideliness_buttons_wrapper_end(){ ?>
			<span class="product-tooltip"></span>
			</div>
	<?php }
		add_action( 'woocommerce_after_shop_loop_item', 'brideliness_buttons_wrapper_end', 20);

 /* Buttons Wrapper (end)*/

/* Add product wrapper (start)*/
	function brideliness_product_wrap_start(){ ?>
		<div class="product-wrapper">
	<?php }

	function brideliness_product_wrap_end(){ ?>
		</div>
	<?php }

	
	
/* Add product wrapper (end)*/

/* Add product image wrapper (start)*/
	function brideliness_product_image_wrap_start(){ ?>
		<div class="product-img-wrapper">
	<?php }

	function brideliness_product_image_wrap_end(){ ?>
		</div>
	<?php 
	
	}
	
	function brideliness_product_image_background(){ ?>
		<div class="background-img-product"></div>
	<?php }
	
	
	add_action( 'woocommerce_before_shop_loop_item', 'brideliness_product_wrap_start', 1 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 2 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'brideliness_product_image_background', 3 );
	add_action( 'woocommerce_before_shop_loop_item', 'brideliness_product_image_wrap_start', 3 );
	
	if( ( class_exists('YITH_Woocompare_Frontend') ) && ( get_option('yith_woocompare_compare_button_in_products_list') == 'yes' ) ) {
		add_action( 'woocommerce_before_shop_loop_item_title', array( $yith_woocompare->obj, 'add_compare_link'), 12 );
	}
	add_action ( 'woocommerce_before_shop_loop_item_title', 'brideliness_new_wishlist', 13);
	
	add_action( 'woocommerce_before_shop_loop_item_title', 'brideliness_product_image_wrap_end', 15 );
	add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 1 );
	add_action( 'woocommerce_after_shop_loop_item', 'brideliness_product_wrap_end', 30 );
	
/* Add product wrapper (end)*/

/* Product permalink for product loop (start)*/
	function brideliness_add_wrap_title_start(){ ?>
		<a class="product-title" href="<?php the_permalink(); ?>" title="<?php esc_html_e('Click to learn more about','brideliness');?> <?php the_title(); ?>">
		<?php
	}

	function brideliness_add_wrap_title_end(){ ?>
		</a>
	<?php }

	add_action( 'woocommerce_shop_loop_item_title', 'brideliness_add_wrap_title_start', 9 );
	add_action( 'woocommerce_shop_loop_item_title', 'brideliness_add_wrap_title_end', 11 );

	remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
	remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);


	
/* Product permalink for product loop (end)*/


/* Product star rating (start)*/
	remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
	add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 11);
/* Product star rating (end)*/

/* Add product excerpt (start)*/
	function brideliness_product_excerpt(){
		global $post;
		 if ( $post->post_excerpt ) : ?>
			<div class="entry-content">
				<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?>
			</div>
		<?php endif;
	}
	add_action('woocommerce_shop_loop_item_title', 'brideliness_product_excerpt', 15);
/* Add product excerpt (end)*/
	
// Add Product Description Wrapper 
	function brideliness_add_wrap_desc_start(){ ?>
		<div class="product-description-wrapper">
		<?php
	}
	add_action( 'woocommerce_shop_loop_item_title', 'brideliness_add_wrap_desc_start', 2);
	
	function brideliness_add_wrap_desc_end(){ ?>
		</div>
	<?php }
	add_action( 'woocommerce_after_shop_loop_item', 'brideliness_add_wrap_desc_end', 21);
	
/* 10. Modifying Product Loop layout (end)*/

/* 11. Change the Sale badge text  (start)*/
    function brideliness_replace_sale_text( $html ) {
		$sale_bage_text=  brideliness_get_option('sale_text')? brideliness_get_option('sale_text'):'Top Pick';
        return str_replace( esc_html__( 'Sale!', 'brideliness' ),  $sale_bage_text, $html );
    }
    add_filter( 'woocommerce_sale_flash', 'brideliness_replace_sale_text' );

/* 11. Change the Sale badge text  (end)*/

/* 12. Modifying Single Product layout (start)*/

	// Images wrapper (start)
	if (!function_exists('brideliness_images_wrapper_start')) {
		function brideliness_images_wrapper_start(){ ?>
			<div class="images-wrapper <?php echo esc_attr(brideliness_get_option('product_slider_type'));?>">
		<?php }
	}
	if (!function_exists('brideliness_images_wrapper_end')) {
		function brideliness_images_wrapper_end(){ ?>
			</div>
		<?php }
	}
	add_action('woocommerce_before_single_product_summary', 'brideliness_images_wrapper_start', 5);
	add_action('woocommerce_before_single_product_summary', 'brideliness_images_wrapper_end', 25);
	// Images wrapper (end) 
	
	// Social buttons (start) 
	if (brideliness_get_option('use_pt_shares_for_product')=='on') {
		
		function share_single_title(){ ?>
			<span class="share-title"><?php esc_html_e('Share this look with your friends ...','brideliness'); ?></span>
			
		<?php }
		add_action('woocommerce_single_product_summary', 'share_single_title', 49);
		add_action('woocommerce_single_product_summary', 'brideliness_share_buttons_output', 50);
	}
	// Social buttons (end) 
	
	// Add product type class (start)

	
	if(brideliness_get_option('product_single_type') && !isset($_GET['product_type'])){
		add_filter('body_class','brideliness_product_type');
		function brideliness_product_type($classes){
			$classes[] = brideliness_get_option('product_single_type');
			return $classes; 
		}
	}
	elseif(brideliness_get_option('product_single_type') && isset($_GET['product_type'])){
		add_filter('body_class','brideliness_product_type_livedemo');
		function brideliness_product_type_livedemo($classes){
		switch ($_GET['product_type']) {
			case 'product2':
				$classes[] = 'single_type_2';
				break;
			case 'product3':
				$classes[] = 'single_type_3';
				break;
			case 'product4':
				$classes[] = 'single_type_4';
				break;
		}
		return $classes;
		}
	}

	if(get_option('woocommerce_shop_page_display')=='subcategories'){
		add_filter('body_class','brideliness_woo_shop_page_display');
		function brideliness_woo_shop_page_display($classes){
			$classes[] = 'woo-'.get_option('woocommerce_shop_page_display');
			return $classes; 
		}
	}

	
		//Product Type1 (start)
	if(brideliness_get_option('product_single_type')=='single_type_1' && !isset($_GET['product_type'])){
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10  );
		add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 20  );
			// Compare button delete
	if( ( class_exists('YITH_Woocompare_Frontend') ) && ( get_option('yith_woocompare_compare_button_in_product_page') == 'yes' ) ) {
		remove_action( 'woocommerce_single_product_summary', array( $yith_woocompare->obj, 'add_compare_link'), 35 );
	}	
	
	if (brideliness_get_option('guide_size') && brideliness_get_option('guide_size_image')!==''){
		add_action('woocommerce_single_product_summary', 'brideliness_size_guide', 25);
	}
	add_action('woocommerce_single_product_summary', 'special_wrap_start', 1);
	add_action('woocommerce_single_product_summary', 'special_wrap_end', 26);
		
	function special_wrap_start(){ ?>
		<div class="special_wrap">	
	<?php }
		function special_wrap_end(){ ?>
		</div>	
	<?php }
	}
	//Product Type1 (end)

	//Product Type2 (start)
	if(brideliness_get_option('product_single_type')=='single_type_2' || (isset($_GET['product_type']) && $_GET['product_type']=='product2')){

	if (brideliness_get_option('guide_size') && brideliness_get_option('guide_size_image')!=='' ){
		add_action('woocommerce_single_product_summary', 'brideliness_size_guide', 10);
	}
	add_action('woocommerce_single_product_summary', 'special_wrap_start', 1);
	add_action('woocommerce_single_product_summary', 'special_wrap_end', 11);
		
	function special_wrap_start(){ ?>
		<div class="special_wrap">	
	<?php }
		function special_wrap_end(){ ?>
		</div>	
	<?php }
	
	// Compare button 
	if( ( class_exists('YITH_Woocompare_Frontend') ) && ( get_option('yith_woocompare_compare_button_in_product_page') == 'yes' ) ) {
		remove_action( 'woocommerce_single_product_summary', array( $yith_woocompare->obj, 'add_compare_link'), 35 );
		add_action( 'woocommerce_after_add_to_cart_button', array( $yith_woocompare->obj, 'add_compare_link'), 32  );
	}
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 35 );
	
	}
	//Product Type2 (end)
	
	//Product Type3 (start)

	if(brideliness_get_option('product_single_type')=='single_type_3' || (isset($_GET['product_type']) && $_GET['product_type']=='product3')){
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
	add_action('woocommerce_single_product_summary', 'brideliness_wrapper_price_start', 6);
	add_action('woocommerce_single_product_summary', 'brideliness_wrapper_price_end', 15);
	
	function brideliness_wrapper_price_start(){ ?>
		<div class="wrapper-price">
	<?php }
	
	function brideliness_wrapper_price_end(){ ?>
		</div>
	<?php }
	
	// Compare button 
	if( ( class_exists('YITH_Woocompare_Frontend') ) && ( get_option('yith_woocompare_compare_button_in_product_page') == 'yes' ) ) {
		remove_action( 'woocommerce_single_product_summary', array( $yith_woocompare->obj, 'add_compare_link'), 35 );
		add_action( 'woocommerce_after_add_to_cart_button', array( $yith_woocompare->obj, 'add_compare_link'), 32  );
	}
	function brideliness_comments_url(){ ?>
	<div class="reviews-wrapper">
		<h2 class="title-reviews"><span><?php esc_html_e('Others People Think', 'brideliness'); ?></span></h2>
		<?php comments_template(esc_url(plugins_url()).'/woocommerce/single-product-reviews.php'); ?>
	</div>
	<?php }

	add_action( 'woocommerce_after_single_product_summary', 'brideliness_comments_url', 10 );
	
	add_filter( 'woocommerce_product_tabs', 'brideliness_remove_product_tabs', 98 );
	function brideliness_remove_product_tabs( $tabs ) {
		// Remove the reviews tab
		unset( $tabs['reviews'] );
		return $tabs;
	}
		remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
		add_action('woocommerce_single_product_summary' ,'woocommerce_output_product_data_tabs', 30);
	}

	//Product Type3 (end)
	
	//Product Type4 (start)
	//Product Type4 (end)
	
	// Wishlist and Compare button output (start)

	function brideliness_woocommerce_yith_button_wrap_start(){ ?>

		<div class="wrapper-yith-button">

	<?php }
	add_action( 'woocommerce_after_add_to_cart_button', 'brideliness_woocommerce_yith_button_wrap_start', 30  );

	function brideliness_woocommerce_yith_button_wrap_end(){ ?>
		</div>
	
	<?php }

	add_action( 'woocommerce_after_add_to_cart_button', 'brideliness_woocommerce_yith_button_wrap_end', 33  );
	
	// Wishlist button 
	if ( ( class_exists( 'YITH_WCWL_Shortcode' ) ) && ( get_option('yith_wcwl_enabled') == true ) && ( get_option('yith_wcwl_button_position') == 'shortcode' ) ) {
		function brideliness_output_wishlist_button() {
			echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
		}
		add_action( 'woocommerce_after_add_to_cart_button', 'brideliness_output_wishlist_button', 31  );
	}

	
// Wishlist and Compare button output (end)

	// Adding single product pagination (start)
	if ( brideliness_get_option('product_pagination') === 'on' ) {
		if ( ! function_exists( 'brideliness_single_product_pagi' ) ) {
			function brideliness_single_product_pagi(){ 
				if(is_product()) :
				global $post;
	?>
				<nav class="navigation single-product-navi">
					<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'brideliness' ); ?></h2>
						<div class="nav-links">
						<?php  $prevProduct = get_previous_post();
							if($prevProduct) :
						?>
							<div class="previous-product" title="<?php esc_html_e( 'Previous Product', 'brideliness' );?>">
								<?php previous_post_link('%link', '<div class="previous"><i class="fa fa-caret-left" aria-hidden="true"></i></div>'); ?>
								<?php   echo wp_kses_post($prevThumbnail = get_the_post_thumbnail( $prevProduct->ID, 'shop_thumbnail' )); ?>
							</div>
						<?php endif; ?>
						<?php  $nextProduct = get_next_post();
							if($nextProduct) :
						?>
							<div class="next-product" title="<?php esc_html_e( 'Next Product', 'brideliness' );?>">
								<?php next_post_link('%link', '<div class="next"><i class="fa fa-caret-right" aria-hidden="true"></i></div>'); ?>
								<?php echo wp_kses_post($nextThumbnail = get_the_post_thumbnail( $nextProduct->ID, 'shop_thumbnail' )); ?>
							</div>
						<?php endif; ?>	
						</div>
				</nav>
				<?php
				endif;
			}
		}
		add_action( 'woocommerce_before_single_product_summary', 'brideliness_single_product_pagi', 1 );
	}
// Adding single product pagination (end)
	
/*12. Modifying Single Product layout (end)*/

/* 13. Related Products (start)*/

	remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

	if (brideliness_get_option('show_related_products')=='on') {
		add_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 30);
	}
	
	function brideliness_output_related_products($args) {
		$related_qty = brideliness_get_option('related_products_qty');
		$args['posts_per_page'] = $related_qty; // related products
		//$args['columns'] = $related_qty; // arranged in columns
		return $args;
	}

	add_filter( 'woocommerce_output_related_products_args', 'brideliness_output_related_products' );

    function brideliness_related_product_single_text_strings( $translated_text, $text, $domain ) {
        switch ( $translated_text ) {
			case 'Add a review' :
                $translated_text = wp_kses(__('<span>Add a review</span>', 'brideliness'), $allowed_html=array('span' => array('class'=>array())) );
                break;
			case 'Be the first to review &ldquo;%s&rdquo;' :
                $translated_text = wp_kses(__('<span>Be the first to review &ldquo;%s&rdquo;</span>', 'brideliness'), $allowed_html=array('span' => array('class'=>array())) );
                break;
        }
        return $translated_text;
    }
    add_filter( 'gettext', 'brideliness_related_product_single_text_strings', 20, 3 );
/* 13. Related Products (end)*/

/* 14. Modifying cart layout (start)*/
	
	// Add button clear-cart (start)
	add_action('init', 'brideliness_woocommerce_clear_cart_url');
	function brideliness_woocommerce_clear_cart_url() {
		global $woocommerce;
		if( isset($_REQUEST['clear-cart']) ) {
			$woocommerce->cart->empty_cart();
		}
	}
	// Add button clear-cart (end)
	
/* 14. Modifying cart layout (end)*/

/* 15. Modifying checkout layout (start)*/

 function brideliness_order_wrapp_start(){
          echo '<div class="checkout-order-wrapp">';
 }
add_action( 'woocommerce_checkout_after_customer_details', 'brideliness_order_wrapp_start', 1 );


  function brideliness_order_wrapp_end(){
          echo '</div>';
   }
add_action( 'woocommerce_checkout_after_order_review', 'brideliness_order_wrapp_end', 1 );

if ( ! function_exists( 'brideliness_default_address_fields' ) ) {
		function brideliness_default_address_fields( $fields ) {
		    $fields = array(
				'first_name' => array(
					'label'    => esc_html__( 'Name', 'brideliness' ),
					'required' => true,
					'class'    => array( 'form-row-first' ),
				),
				'last_name' => array(
					'label'    => esc_html__( 'Last Name', 'brideliness' ),
					'required' => true,
					'class'    => array( 'form-row-last' ),
					'clear'    => true
				),
				'company' => array(
					'label' => esc_html__( 'Company', 'brideliness' ),
					'class' => array( 'form-row-wide' ),
				),
				'country' => array(
					'type'     => 'country',
					'label'    => esc_html__( 'Country', 'brideliness' ),
					'required' => true,
					'class'    => array( 'form-row-first', 'address-field', 'update_totals_on_change' ),
				),
				'address_1' => array(
					'label'       => esc_html__( 'Address', 'brideliness' ),
					'placeholder' => esc_html_x( 'Street address', 'placeholder', 'brideliness' ),
					'required'    => true,
					'class'       => array( 'form-row-first', 'address-field' )
				),
				'address_2' => array(
					'label'       => esc_html__( 'Additional address info', 'brideliness' ),
					'placeholder' => esc_html_x( 'Apartment, suite, unit etc. (optional)', 'placeholder', 'brideliness' ),
					'class'       => array( 'form-row-last', 'address-field' ),
					'required'    => false,
					'clear'    	  => true
				),
				'city' => array(
					'label'       => esc_html__( 'Town / City', 'brideliness' ),
					'placeholder' => esc_html__( 'Town / City', 'brideliness' ),
					'required'    => true,
					'class'       => array( 'form-row-last', 'address-field' )
				),
				'state' => array(
					'type'        => 'state',
					'label'       => esc_html__( 'State / County', 'brideliness' ),
					'placeholder' => esc_html__( 'State / County', 'brideliness' ),
					'required'    => true,
					'class'       => array( 'form-row-first', 'address-field' ),
					'validate'    => array( 'state' )
				),
				'postcode' => array(
					'label'       => esc_html__( 'Postcode / Zip', 'brideliness' ),
					'placeholder' => esc_html__( 'Postcode / Zip', 'brideliness' ),
					'required'    => true,
					'class'       => array( 'form-row-last', 'address-field' ),
					'clear'       => true,
					'validate'    => array( 'postcode' )
				)
			);
			return $fields;
		}
	}
	add_filter( 'woocommerce_default_address_fields' , 'brideliness_default_address_fields' );

      function   brideliness_add_header_shipping(){

          echo '<h3 class="checkout-shipping-header">'.esc_html__('Shipping address', 'brideliness').'</h3>';
      }


    add_action('woocommerce_checkout_shipping', 'brideliness_add_header_shipping', 1);

         function   brideliness_payments_header(){

          echo '<h3 class="checkout-payments-header">'.esc_html__('Payment Methods', 'brideliness').'</h3>';
      }
	add_action( 'woocommerce_review_order_before_payment', 'brideliness_payments_header', 1 );
	
/* 15. Modifying checkout layout (end)*/

/* 16. Cross-sells output (start)*/

	function brideliness_add_wrapp_cross_sell(){ ?>
		<div class="row">
			<div class="col-md-4">
			
	<?php }
	
		function brideliness_add_wrapp_cross_sell_end(){ ?>
			</div>

			
	<?php }
	
	function brideliness_add_continue_shopping_button(){ 
			 $shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
                if ($shop_page_url) {
                    echo '<a class="button-go-shop" rel="bookmark" href="' . esc_url($shop_page_url) . '">' . esc_html__('Continue Shopping', 'brideliness') . '</a>';
                }
			}
	
	remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
	add_action ('woocommerce_after_cart_table', 'brideliness_add_wrapp_cross_sell', 1 );
	add_action ('woocommerce_after_cart_table', 'woocommerce_cross_sell_display', 2 );
	add_action ('woocommerce_after_cart_table', 'brideliness_add_continue_shopping_button', 3 );
	add_action ('woocommerce_after_cart_table', 'brideliness_add_wrapp_cross_sell_end', 4 );
	
/* 16. Cross-sells output (end)*/

/* 17. Catalog Mode Function (start)*/

if (brideliness_get_option('catalog_mode') == 'on') {
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
}
elseif(brideliness_get_option('catalog_mode') == 'price'){
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );	
}
/* 17. Catalog Mode Function (end)*/

/* 18.  Add Size Guide (start)*/
if (brideliness_get_option('guide_size') && brideliness_get_option('guide_size_image')!==''){
	function brideliness_size_guide(){ 
		$size_guide_image= brideliness_get_option('guide_size_image');
	?>
	<div id="wrapper-size-guide">
		<a class="size-guide" href="<?php echo esc_url($size_guide_image); ?>" data-effect="mfp-move-horizontal">
			<i class="icon-simple-ruler"></i>
			<span><?php esc_html_e('Size Guide', 'brideliness');?></span>
		</a>
	</div>
	<?php }	
}
/* 18.  Add Size Guide (end)*/

/* 19.  Add Category Description (start)*/
function brideliness_woo_cat_wrap_start(){ ?>
	<div class="woo-cat-wrap">
<?php }
add_action( 'woocommerce_before_subcategory_title', 'brideliness_woo_cat_wrap_start', 10); 

function brideliness_woo_cat_wrap_end(){ ?>
	</div>
<?php }
add_action( 'woocommerce_after_subcategory_title', 'brideliness_woo_cat_wrap_end', 10); 
	
add_action( 'woocommerce_after_subcategory_title', 'brideliness_add_cat_description', 9);
function brideliness_add_cat_description ($category) {
	$cat_id=$category->term_id;
	$prod_term=get_term($cat_id,'product_cat');
	$description=$prod_term->description;
	echo '<p class="shop-cat-desc">'.esc_attr($description).'</p>';
}
/* 19.  Add Category Description (end)*/

/* 20. Woocommerce standard gallery (start)*/
	if ( brideliness_get_option('use_pt_images_slider')!=='on' ) {
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox');
		add_theme_support( 'wc-product-gallery-slider' );
	}
/* 20. Woocommerce standard gallery (end)*/
}
 