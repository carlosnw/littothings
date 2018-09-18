<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'brideliness-theme';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 */

function optionsframework_options() {

	if(brideliness_get_option('site_custom_colors')=='on'){
		$api_key= brideliness_get_option('google_fonts_api_key')!=='' ? brideliness_get_option('google_fonts_api_key') : 'AIzaSyAvG2XMie5O726h92axGfRF9UfSNPhj1vg';
		$font_list = array();
		$items='';
		$sort= "alpha";
		$google_api_url = 'https://www.googleapis.com/webfonts/v1/webfonts?key=' . $api_key . '&sort=' . $sort;
		$response = wp_remote_retrieve_body( wp_remote_get($google_api_url, array('sslverify' => false )));
		if( !is_wp_error( $response ) && $api_key!=='') {
			$data = json_decode($response, true);
			$items = array_key_exists('items', $data) ? $data['items'] : '';
			if (is_array($items) || is_object($items)) {
				foreach ($items as $item) {
					$font_option = str_replace(' ', '_', $item['family']);
					$font_name = $item['family'];
					@$font_list[$font_option] = $font_name;
				}
				unset($item);
			}
		}
	}
	// Adding Google fonts


	// On/Off array
	$on_off_array = array(
		'on' => esc_html__( 'On', 'brideliness' ),
		'off' => esc_html__( 'Off', 'brideliness' ),
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment' => 'scroll'
	);

	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

	$wp_editor_settings = array(
		'wpautop' => false,
		'textarea_rows' => 3,
		'tinymce' => array( 'plugins' => 'wordpress,wplink' )
	);

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/theme-options/images/';

	// Layout options
	$layout_options = array(
		'one-col' => $imagepath . 'one-col.png',
		'two-col-left' => $imagepath . 'two-col-left.png',
		'two-col-right' => $imagepath . 'two-col-right.png'
	);
if(brideliness_get_option('site_custom_colors')=='on'){
	// Typography Options
	$typography_options = array(
		'faces' => $font_list,
		'styles' => array( '100'=> '100', '100italic'=> '100italic', '300'=> '300', '300italic'=> '300italic', '400'=> '400', '400italic'=> '400italic', '500'=> '500', '500italic'=> '500italic', '700'=> '700', '700italic'=> '700italic', '900'=> '900', '900italic'=> '900italic', 'normal' => 'Normal', 'bold' => 'Bold', 'lighter' => 'Light' ),
		'color' => true
	);
}

	// Color Schemes

	$options = array();

	/* Global Site Settings */
	$options[] = array(
		'name' => esc_html__( 'Site Options', 'brideliness' ),
		'type' => 'heading',
		'icon' => 'site'
	);

	$options[] = array(
		'name' => esc_html__( 'Site Layout', 'brideliness' ),
		'type' => 'info'
	);
	
	$options[] = array(
		'name' => esc_html__( 'Select layout for site', 'brideliness' ),
		'id' => 'site_layout',
		'std' => 'wide',
		'type' => 'radio',
		'options' => array(
			'wide'  => esc_html__('Wide', 'brideliness'),
			'boxed' => esc_html__('Boxed', 'brideliness'),
		)
	);

	$options[] = array(
		'name' => esc_html__( 'Extra Features', 'brideliness' ),
		'type' => 'info'
	);

	$options[] = array(
		'name' => esc_html__( 'Enable Page Title?', 'brideliness' ),
		'desc' => esc_html__( "Switch to Off if you don't want to use Page Title", 'brideliness' ),
		'id' => 'page_title',
		'std' => true,
		'class' => 'has_hidden_child',
		'type' => 'checkbox'
	);
	
	$default_background_page_title = get_template_directory_uri().'/img/shop-banner.jpg';
	$options[] = array(
			'name' => esc_html__( 'Background for page title', 'brideliness' ),
			'desc' => esc_html__( 'Add custom background color or image for page title', 'brideliness' ),
			'id' => 'page_title_bg',
			'std' => array(
				'color' => '',
				'image' => $default_background_page_title,
				'repeat' => 'repeat',
				'position' => 'top center',
				'attachment' => 'fixed'
			),
			'type' => 'background'
	);
	
	$options[] = array(
		'name' => esc_html__( 'Enable Breadcrumbs for site?', 'brideliness' ),
		'desc' => esc_html__( "Switch to Off if you don't want to use breadcrumbs", 'brideliness' ),
		'id' => 'site_breadcrumbs',
		'std' => 'on',
		'type' => 'radio',
		'options' => $on_off_array
	);

	$options[] = array(
		'name' => esc_html__( "Enable Post like system for site?", 'brideliness' ),
		'desc' => esc_html__( 'Anabling post like functionality on your site + Extra Widgets (Popular Posts, User Likes)', 'brideliness' ),
		'id' => 'site_post_likes',
		'std' => 'on',
		'type' => 'radio',
		'options' => $on_off_array
	);
 
	$options[] = array(
		'name' => esc_html__( "Enable Scroll to Top button for site?", 'brideliness' ),
		'desc' => esc_html__( 'If On appears in bottom center of site', 'brideliness' ),
		'id' => 'totop_button',
		'std' => 'on',
		'type' => 'radio',
		'options' => $on_off_array
	);
	
	$options[] = array(
		'name' => esc_html__( 'Enable single image page share buttons output?', 'brideliness' ),
		'desc' => esc_html__( "Switch to Off if you don't want to use share buttons on single image page", 'brideliness' ),
		'id' => 'image_share_buttons',
		'std' => 'on',
		'type' => 'radio',
		'options' => $on_off_array
	);
	
	$options[] = array(
		'name' => esc_html__( "Enable Brideliness Specials Sidebar #1 ?", 'brideliness' ),
		'desc' => esc_html__( 'Brideliness Specials Sidebar #1', 'brideliness' ),
		'id' => 'brideliness-specials-sidebar1',
		'std' => true,
		'type' => 'checkbox'
	);
	$options[] = array(
		'name' => esc_html__( "Enable Brideliness Specials Sidebar #2 ?", 'brideliness' ),
		'desc' => esc_html__( 'Brideliness Specials Sidebar #2', 'brideliness' ),
		'id' => 'brideliness-specials-sidebar2',
		'std' => true,
		'type' => 'checkbox'
	);
	$options[] = array(
		'name' => esc_html__( "Enable Brideliness Specials Sidebar #3 ?", 'brideliness' ),
		'desc' => esc_html__( 'Brideliness Specials Sidebar #3', 'brideliness' ),
		'id' => 'brideliness-specials-sidebar3',
		'std' => true,
		'type' => 'checkbox'
	);
	
	$options[] = array(
		'name' => esc_html__( '404 Page', 'brideliness' ),
		'type' => 'info'
	);
	$default_background_404_page = get_template_directory_uri().'/img/bg-404.png';
	$options[] = array(
		'name' => esc_html__( 'Background for 404 Page', 'brideliness' ),
		'desc' => esc_html__( 'Add custom background image for Page 404', 'brideliness' ),
		'id' => 'page_404_bg',
		'std' => $default_background_404_page,
		'type' => 'upload'
	);
	
	/* Header Options */
	$options[] = array(
		'name' => esc_html__( 'Header Options', 'brideliness' ),
		'type' => 'heading',
		'icon' => 'header'
	);
	
	$options[] = array(
		'name' => esc_html__( 'Background for header', 'brideliness' ),
		'desc' => esc_html__( 'Add custom background color or image for header section.', 'brideliness' ),
		'id' => 'header_bg',
		'std' => $background_defaults,
		'type' => 'background'
	);
	
	$options[] = array(
		'name' => esc_html__( 'Top Panel Options', 'brideliness' ),
		'type' => 'info'
	);

	$options[] = array(
		'name' => esc_html__( "Enable header's top panel?", 'brideliness' ),
		'desc' => esc_html__( "Switch to Off if you don't want to use header top panel", 'brideliness' ),
		'id' => 'header_top_panel',
		'std' => 'on',
		'type' => 'radio',
		'options' => $on_off_array
	);

	$options[] = array(
		'name' => esc_html__( 'Custom background color for top panel', 'brideliness' ),
		'desc' => esc_html__( 'Check to specify custom background color for top panel', 'brideliness' ),
		'id' => 'top_panel_bg',
		'std' => true,
		'class' => 'has_hidden_child',
		'type' => 'checkbox'
	);

	$options[] = array(
		'name' => esc_html__( 'Background color for header top panel', 'brideliness' ),
		'id' => 'top_panel_bg_color',
		'std' => '#EFECE8',
		'class' => 'hidden',
		'type' => 'color'
	);
	
	$options[] = array(
		'name' => esc_html__( "Enable header's top panel border bottom ?", 'brideliness' ),
		'desc' => esc_html__( "Switch to Off if you don't want to use header top panel border bottom", 'brideliness' ),
		'id' => 'header_top_panel_border',
		'std' => 'on',
		'type' => 'radio',
		'options' => $on_off_array
	);

	$options[] = array(
		'name' => esc_html__( 'Enter phone number', 'brideliness' ),
		'desc' => esc_html__( 'Info appears at center of headers top panel', 'brideliness' ),
		'id' => 'top_panel_info_phone',
		'std' => '(564) 123 4567',
		'type' => 'textarea'
	);
	
	$options[] = array(
		'name' => esc_html__( 'Enter mail', 'brideliness' ),
		'desc' => esc_html__( 'Info appears at center of headers top panel', 'brideliness' ),
		'id' => 'top_panel_info_mail',
		'std' => 'MAIL@EXAMPLE.COM',
		'type' => 'textarea'
	);
	
	$options[] = array(
		'name' => esc_html__( 'Enter info contents', 'brideliness' ),
		'desc' => esc_html__( 'Info appears at center of headers top panel', 'brideliness' ),
		'id' => 'top_panel_info',
		'std' => '',
		'type' => 'textarea'
	);
	
	$options[] = array(
		'name' => esc_html__( 'Navigation Options', 'brideliness' ),
		'type' => 'info'
	);

	$options[] = array(
		'name' => esc_html__( "Enable Sticky Menu", 'brideliness' ),
		'desc' => esc_html__( "Switch to Off if you don't want to use Sticky Menu", 'brideliness' ),
		'id' => 'sticky_menu',
		'std' => 'off',
		'type' => 'radio',
		'options' => $on_off_array
	);
	
	$options[] = array(
		'name' => esc_html__( 'Menu Background', 'brideliness' ),
		'desc' => esc_html__( 'Select Menu Background', 'brideliness' ),
		'id' => 'menu_background',
		'std' => '',
		'type' => 'color'
	);
	
	$options[] = array(
		'name' => esc_html__( "Enable header's bottom Box Shadow", 'brideliness' ),
		'desc' => esc_html__( "Switch to Off if you don't want to use header's bottom box-shadow", 'brideliness' ),
		'id' => 'header_box_shadow',
		'std' => 'on',
		'type' => 'radio',
		'options' => $on_off_array
	);
	
	$options[] = array(
		'name' => esc_html__( 'Select Header for site', 'brideliness' ),
		'id' => 'site_header',
		'std' => 'standart',
		'type' => 'radio',
		'options' => array(
			'fixed'  => esc_html__('Fixed Header on Front Page', 'brideliness'),
			'standart'  => esc_html__('Standart Header', 'brideliness'),
		)
	);
	
	$options[] = array(
		'name' => esc_html__( 'Upload image for logo', 'brideliness' ),
		'id' => 'site_logo',
		'std' => '',
		'type' => 'upload'
	);
	
	$options[] = array(
		'name' => esc_html__( 'Select position for logo Fixed Header', 'brideliness' ),
		'id' => 'site_logo_position_fixed',
		'std' => 'left',
		'type' => 'radio',
		'options' => array(
			'left'  => esc_html__('Left', 'brideliness'),
			'center' => esc_html__('Center', 'brideliness'),
			'right' => esc_html__('Right', 'brideliness'),
		)
	);
	
	$options[] = array(
		'name' => esc_html__( 'Select position for logo Standart Header', 'brideliness' ),
		'id' => 'site_logo_position_standart',
		'std' => 'center',
		'type' => 'radio',
		'options' => array(
			'left'  => esc_html__('Left', 'brideliness'),
			'center' => esc_html__('Center', 'brideliness'),
			'right' => esc_html__('Right', 'brideliness'),
		)
	);
	
	$options[] = array(
		'name' => esc_html__( 'Color for top item menu on other page(Fixed Header)', 'brideliness' ),
		'id' => 'main_menu_color_item',
		'std' => '#000000',
		'type' => 'color'
	);
	
	$options[] = array(
		'name' => esc_html__( 'Color for top item menu on other page on hover(Fixed Header)', 'brideliness' ),
		'id' => 'main_menu_color_item_hover',
		'std' => '#9c968f',
		'type' => 'color'
	);
	
	$options[] = array(
		'name' => esc_html__( 'Add Border Top for Menu(Standart Header)', 'brideliness' ),
		'desc' => esc_html__( 'Check to Add Border Top for Menu', 'brideliness' ),
		'id' => 'navi_border_top',
		'std' => true,
		'type' => 'checkbox'
	);
	
	$options[] = array(
		'name' => esc_html__( 'Add Border Left for Menu Item(Standart Header)', 'brideliness' ),
		'desc' => esc_html__( 'Check to Add Border Top for Menu', 'brideliness' ),
		'id' => 'navi_item_border_right',
		'std' => true,
		'type' => 'checkbox'
	);
	
	/* Footer Options */
	$options[] = array(
		'name' => esc_html__( 'Footer Options', 'brideliness' ),
		'type' => 'heading',
		'icon' => 'footer'
	);

	$options[] = array(
		'name' => esc_html__( 'Background for footer', 'brideliness' ),
		'desc' => esc_html__( 'Add custom background color or image for footer section.', 'brideliness' ),
		'id' => 'footer_bg',
		'std' => $background_defaults,
		'type' => 'background'
	);

	$options[] = array(
		'name' => esc_html__( 'Background for bottom footer', 'brideliness' ),
		'desc' => esc_html__( 'Add custom background color or image for footer bottom section.', 'brideliness' ),
		'id' => 'footer_bottom_bg',
		'std' => $background_defaults,
		'type' => 'background'
	);

	$options[] = array(
		'name' => esc_html__( 'Enter sites copyright', 'brideliness' ),
		'desc' => esc_html__( 'Enter copyright (appears at the bottom of site)', 'brideliness' ),
		'id' => 'site_copyright',
		'std' => '',
		'type' => 'textarea'
	);

	/* Layout Options */
	$options[] = array(
		'name' => esc_html__( 'Layout Options', 'brideliness' ),
		'type' => 'heading',
		'icon' => 'layout'
	);

	$options[] = array(
		'name' => esc_html__('Set Front page layout', 'brideliness'),
		'desc' => esc_html__('Specify the location of sidebars about the content on the front page', 'brideliness'),
		'id' => "front_layout",
		'std' => "one-col",
		'type' => "images",
		'options' => $layout_options
	);

	$options[] = array(
		'name' => esc_html__('Set global layout for Pages', 'brideliness'),
		'desc' => esc_html__('Specify the location of sidebars about the content on the Pages of your site', 'brideliness'),
		'id' => "page_layout",
		'std' => "two-col-right",
		'type' => "images",
		'options' => $layout_options
	);

	$options[] = array(
		'name' => esc_html__('Set Blog page layout', 'brideliness'),
		'desc' => esc_html__('Specify the location of sidebars about the content on the Blog page', 'brideliness'),
		'id' => "blog_layout",
		'std' => "two-col-right",
		'type' => "images",
		'options' => $layout_options
	);

	$options[] = array(
		'name' => esc_html__('Set Single post view layout', 'brideliness'),
		'desc' => esc_html__('Specify the location of sidebars about the content on the single posts', 'brideliness'),
		'id' => "single_layout",
		'std' => "two-col-right",
		'type' => "images",
		'options' => $layout_options
	);

	$options[] = array(
		'name' => esc_html__('Set Products page (Shop page) layout', 'brideliness'),
		'desc' => esc_html__('Specify the location of sidebars about the content on the products page', 'brideliness'),
		'id' => "shop_layout",
		'std' => "two-col-left",
		'type' => "images",
		'options' => $layout_options
	);

	$options[] = array(
		'name' => esc_html__('Set Single Product pages layout', 'brideliness'),
		'desc' => esc_html__('Specify the location of sidebars about the content on the single product pages', 'brideliness'),
		'id' => "product_layout",
		'std' => "one-col",
		'type' => "images",
		'options' => $layout_options
	);


	/* Blog Options */
	$options[] = array(
		'name' => esc_html__( 'Blog Options', 'brideliness' ),
		'type' => 'heading',
		'icon' => 'wordpress'
	);

	$options[] = array(
		'name' => esc_html__( 'Enter text for Read More button', 'brideliness' ),
		'id' => 'blog_read_more_text',
		'std' => 'Continue Reading',
		'type' => 'textarea'
	);

	$options[] = array(
		'name' => esc_html__( 'Enable blog share buttons output?', 'brideliness' ),
		'desc' => esc_html__( "Switch to Off if you don't want to use share buttons", 'brideliness' ),
		'id' => 'blog_share_buttons',
		'std' => 'off',
		'type' => 'radio',
		'options' => $on_off_array
	);
	
	$options[] = array(
		'name' => esc_html__( 'Select pagination view for blog page', 'brideliness' ),
		'id' => 'blog_pagination',
		'std' => 'infinite',
		'type' => 'radio',
		'options' => array(
			'infinite'  => esc_html__('Infinite blog', 'brideliness'),
			'numeric' => esc_html__('Numeric pagination', 'brideliness')
		)
	);

	$options[] = array(
		'name' => esc_html__( 'Blog Layout Options', 'brideliness' ),
		'type' => 'info'
	);

	$options[] = array(
		'name' => esc_html__( 'Select layout for blog', 'brideliness' ),
		'id' => 'blog_frontend_layout',
		'std' => 'list',
		'type' => 'radio',
		'class' => 'hidden-radio-control',
		'options' => array(
			'list'  => esc_html__('List', 'brideliness'),
			'grid'  => esc_html__('Grid', 'brideliness'),
		)
	);

	$options[] = array(
		'name' => esc_html__( 'Select number of columns for Blog GRID layout or ISOTOPE layout', 'brideliness' ),
		'id' => 'blog_grid_columns',
		'std' => 'cols-2',
		'type' => 'radio',
		'class' => 'hidden',
		'options' => array(
			'cols-2'  => esc_html__('2 Columns', 'brideliness'),
			'cols-3'  => esc_html__('3 Columns', 'brideliness'),
			'cols-4' => esc_html__('4 Columns', 'brideliness')
		)
	);

	$options[] = array(
		'name' => esc_html__( 'Post Type Gallery Options', 'brideliness' ),
		'type' => 'info'
	);
	
	$options[] = array(
		'name' => esc_html__( 'Carousel for Gallery posts on blog page', 'brideliness' ),
		'desc' => esc_html__( 'Switch to "Off" if you don’t want to show carousel for gallery posts', 'brideliness' ),
		'id' => 'show_gallery_carousel',
		'std' => 'on',
		'type' => 'radio',
		'options' => $on_off_array
	);
	
	$options[] = array(
		'name' => esc_html__( 'Single Post Options', 'brideliness' ),
		'type' => 'info'
	);

	$options[] = array(
		'name' => esc_html__( 'Enable single post Prev/Next navigation output?', 'brideliness' ),
		'desc' => esc_html__( "Switch to Off if you don't want to use single post navigation", 'brideliness' ),
		'id' => 'post_pagination',
		'std' => 'on',
		'type' => 'radio',
		'options' => $on_off_array
	);

	$options[] = array(
		'name' => esc_html__( 'Enable single post share buttons output?', 'brideliness' ),
		'desc' => esc_html__( "Switch to Off if you don't want to use share buttons", 'brideliness' ),
		'id' => 'single_post_share_buttons',
		'std' => 'off',
		'type' => 'radio',
		'options' => $on_off_array
	);
	
	$options[] = array(
		'name' => esc_html__( 'Enable single post Related Posts output?', 'brideliness' ),
		'desc' => esc_html__( "Switch to Off if you don't want to show related posts", 'brideliness' ),
		'id' => 'post_show_related',
		'std' => 'on',
		'type' => 'radio',
		'options' => $on_off_array
	);

	$options[] = array(
		'name' => esc_html__( 'Select pagination type for comments', 'brideliness' ),
		'id' => 'comments_pagination',
		'std' => 'numeric',
		'type' => 'radio',
		'options' => array(
			'newold'  => esc_html__('Newer/Older pagination', 'brideliness'),
			'numeric'  => esc_html__('Numeric pagination', 'brideliness'),
		)
	);

	/* Store Options */
	$options[] = array(
		'name' => esc_html__( 'Store Options', 'brideliness' ),
		'type' => 'heading',
		'icon' => 'basket'
	);

	$options[] = array(
		'name' => esc_html__( 'Enable Catalog Mode?', 'brideliness' ),
		'desc' => esc_html__( 'Switch to ON if you want to switch your shop into a catalog mode (no prices, no add to cart)', 'brideliness' ),
		'id' => 'catalog_mode',
		'std' => 'off',
		'type' => 'radio',
		'options' => array(
			'on'  => esc_html__('On', 'brideliness'),
			'off'  => esc_html__('Off', 'brideliness'),
			'price'  => esc_html__('Catalog Mode With Price', 'brideliness'),
		)
	);
	
	$options[] = array(
		'name' => esc_html__( 'Sale badge text', 'brideliness' ),
		'desc' => esc_html__( 'Enter your sale badge text', 'brideliness' ),
		'id' => 'sale_text',
		'std'=>'Top Pick',
		'class' => 'mini',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => esc_html__( 'Show number of products in the cart widget?', 'brideliness' ),
		'desc' => esc_html__( 'Switch to ON if you want to show a a number of products currently in the cart widget', 'brideliness' ),
		'id' => 'cart_count',
		'std' => 'on',
		'type' => 'radio',
		'options' => $on_off_array
	);

	$options[] = array(
		'name' => esc_html__( 'Show store Breadcrumbs?', 'brideliness' ),
		'desc' => esc_html__( "Switch to Off if you don't want to use breadcrumbs on store page", 'brideliness' ),
		'id' => 'store_breadcrumbs',
		'std' => 'on',
		'type' => 'radio',
		'options' => $on_off_array
	);

	$options[] = array(
		'name' => esc_html__( 'Add special sidebar for filters on Store page?', 'brideliness' ),
		'desc' => esc_html__( "Switch to Off if you don't want to use special sidebar on products page", 'brideliness' ),
		'id' => 'filters_sidebar',
		'std' => 'on',
		'type' => 'radio',
		'options' => $on_off_array
	);

	$options[] = array(
		'name' => esc_html__( 'Store Layout Options', 'brideliness' ),
		'type' => 'info'
	);

	$options[] = array(
		'name' => esc_html__( 'Enter number of products to show on Store page', 'brideliness' ),
		'id' => 'store_per_page',
		'std' => '8',
		'class' => 'mini',
		'type' => 'text'
	);

	$options[] = array(
		'name' => esc_html__( 'Select product quantity per row on Store page', 'brideliness' ),
		'id' => 'store_columns',
		'std' => '3',
		'type' => 'radio',
		'options' => array(
			'3'  => esc_html__('3 Products', 'brideliness'),
			'4'  => esc_html__('4 Products', 'brideliness'),
		)
	);

	$options[] = array(
		'name' => esc_html__( 'Show Per Page Filter?', 'brideliness' ),
		'desc' => esc_html__( "Switch to Off if you don't want Per Page Filter", 'brideliness' ),
		'id' => 'per_page_filter',
		'std' => 'on',
		'type' => 'radio',
		'options' => $on_off_array
	);

	$options[] = array(
		'name' => esc_html__( 'Show List/Grid products switcher?', 'brideliness' ),
		'desc' => esc_html__( "Switch to Off if you don't want to use switcher on products page", 'brideliness' ),
		'id' => 'list_grid_switcher',
		'std' => 'on',
		'type' => 'radio',
		'options' => $on_off_array
	);

	$options[] = array(
		'name' => esc_html__( 'Set default view for products (list or grid)', 'brideliness' ),
		'id' => 'default_list_type',
		'std' => 'grid-view',
		'type' => 'radio',
		'options' => array(
			'grid-view'  => esc_html__('Grid', 'brideliness'),
			'list-view'  => esc_html__('List', 'brideliness'),
		)
	);

	$options[] = array(
		'name' => esc_html__( 'Single Product Options', 'brideliness' ),
		'type' => 'info'
	);

	$options[] = array(
		'name' => esc_html__( 'Choose single product page type', 'brideliness' ),
		'id' => 'product_single_type',
		'std' => 'single_type_1',
		'type' => 'select',
		'options' => array(
			'single_type_1'  => esc_html__('Single Product Page Type 1', 'brideliness'),
			'single_type_2'  => esc_html__('Single Product Page Type 2', 'brideliness'),
			'single_type_3'  => esc_html__('Single Product Page Type 3', 'brideliness'),
			//'single_type_4'  => esc_html__('Single Product Page Type 4', 'brideliness'),
		)
	);
	
	$options[] = array(
		'name' => esc_html__( 'Show Single Product pagination (prev/next product)?', 'brideliness' ),
		'desc' => esc_html__( "Switch to Off if you don't want to use single pagination on product page", 'brideliness' ),
		'id' => 'product_pagination',
		'std' => 'on',
		'type' => 'radio',
		'options' => $on_off_array
	);

	$options[] = array(
		'name' => esc_html__( 'Enable Guide Size on Single Product?', 'brideliness' ),
		'desc' => esc_html__( "Switch to Off if you don't want to use Guide Size on Single Product", 'brideliness' ),
		'id' => 'guide_size',
		'std' => true,
		'class' => 'has_hidden_child',
		'type' => 'checkbox'
	);
	
	$default_guide_size_image = get_template_directory_uri().'/img/size-guide.png';
	$options[] = array(
			'name' => esc_html__( 'Image for Guide Size', 'brideliness' ),
			'desc' => esc_html__( 'Add custom background color or image for page title', 'brideliness' ),
			'id' => 'guide_size_image',
			'std' => $default_guide_size_image,
			'type' => 'upload'
	);
	
	$options[] = array(
		'name' => esc_html__( 'Show single product share buttons?', 'brideliness' ),
		'desc' => esc_html__( "Switch to Off if you don't want to use single product share buttons", 'brideliness' ),
		'id' => 'use_pt_shares_for_product',
		'std' => 'on',
		'type' => 'radio',
		'options' => $on_off_array
	);

	$options[] = array(
		'name' => esc_html__( 'Use custom images output on Single product page?', 'brideliness' ),
		'desc' => esc_html__( 'Turning on custom image carousel on single product page', 'brideliness' ),
		'id' => 'use_pt_images_slider',
		'std' => 'on',
		'type' => 'radio',
		'class' => 'has_hidden_childs_radio',
		'options' => $on_off_array
	);

	$options[] = array(
		'name' => esc_html__( 'Choose slider type for images on Single product page', 'brideliness' ),
		'id' => 'product_slider_type',
		'std' => 'vertical-thumbs',
		'type' => 'select',
		'class' => 'hidden',
		'options' => array(
			'simple-slider'  => esc_html__('Slider', 'brideliness'),
			'slider-with-popup'  => esc_html__('Slider with pop-up gallery', 'brideliness'),
			'slider-with-thumbs'  => esc_html__('Slider with thumbnails', 'brideliness'),
			'vertical-thumbs'  => esc_html__('Vertical thumbnails', 'brideliness'),
		)
	);

	$options[] = array(
		'name' => esc_html__( 'Select transition effect for Product Images Carousel', 'brideliness' ),
		'id' => 'product_slider_effect',
		'std' => 'backSlide',
		'type' => 'select',
		'class' => 'hidden',
		'options' => array(
			'fade'  => esc_html__('Fade', 'brideliness'),
			'backSlide'  => esc_html__('Back Slide', 'brideliness'),
			'goDown'  => esc_html__('Go Down', 'brideliness'),
			'fadeUp'  => esc_html__('Fade Up', 'brideliness'),
		)
	);

	$options[] = array(
		'name' => esc_html__( 'Show single product up-sells?', 'brideliness' ),
		'id' => 'show_upsells',
		'std' => 'on',
		'type' => 'radio',
		'class' => 'has_hidden_childs_radio',
		'options' => $on_off_array
	);

	$options[] = array(
		'name' => esc_html__( 'Select how many Up-Sell Products to show on Single product page', 'brideliness' ),
		'id' => 'upsells_qty',
		'std' => '4',
		'type' => 'select',
		'class' => 'hidden',
		'options' => array(
			'2'  => esc_html__('2 products', 'brideliness'),
			'3'  => esc_html__('3 products', 'brideliness'),
			'4'  => esc_html__('4 products', 'brideliness'),
			'5'  => esc_html__('5 products', 'brideliness'),
		)
	);

	$options[] = array(
		'name' => esc_html__( 'Show single product related products?', 'brideliness' ),
		'id' => 'show_related_products',
		'std' => 'on',
		'type' => 'radio',
		'class' => 'has_hidden_childs_radio',
		'options' => $on_off_array
	);

	$options[] = array(
		'name' => esc_html__( 'Select how many Related Products to show on Single product page', 'brideliness' ),
		'id' => 'related_products_qty',
		'std' => '4',
		'type' => 'select',
		'class' => 'hidden',
		'options' => array(
			'3'  => esc_html__('3 products', 'brideliness'),
			'4'  => esc_html__('4 products', 'brideliness'),
		)
	);

	$options[] = array(
		'name' => esc_html__( 'Banner Options', 'brideliness' ),
		'type' => 'info'
	);

	$options[] = array(
		'name' => esc_html__( 'Store Banner view switcher', 'brideliness' ),
		'id' => 'store_banner',
		'std' => 'on',
		'type' => 'radio',
		'options' => $on_off_array
	);

	$options[] = array(
			'name' => esc_html__( 'Enter height banner', 'brideliness' ),
			'id' => 'store_banner_height',
			'std' => '210px',
			'type' => 'text'
	);
	
	$default_banner_bg = get_template_directory_uri().'/img/shop-banner.jpg';
	$options[] = array(
			'name' => esc_html__( 'Background for banner', 'brideliness' ),
			'desc' => esc_html__( 'Add custom background color or image for banner shop section.', 'brideliness' ),
			'id' => 'banner_bg',
			'std' => array(
				'color' => '',
				'image' => $default_banner_bg,
				'repeat' => 'repeat',
				'position' => 'top center',
				'attachment' => 'fixed'
			),
			'type' => 'background'
	);

	$options[] = array(
			'name' => esc_html__( 'Enter a title for banner', 'brideliness' ),
			'id' => 'store_banner_title',
			'std' => 'OUR SHOP',
			'type' => 'text'
	);

	$options[] = array(
			'name' => esc_html__( 'Enter a description for banner', 'brideliness' ),
			'id' => 'store_banner_description',
			'std' => 'make your choice',
			'type' => 'text'
	);

	$options[] = array(
			'name' => esc_html__( 'Enter store banner url for button', 'brideliness' ),
			'id' => 'store_banner_url',
			'std' => '',
			'type' => 'text'
	);

	$options[] = array(
			'name' => esc_html__( 'Enter a store banner button text', 'brideliness' ),
			'id' => 'banner_button_text',
			'std' => '',
			'type' => 'text'
	);

	$options[] = array(
			'name' => esc_html__( 'Banner Button Text Color', 'brideliness' ),
			'id' => 'banner_button_text_color',
			'std' => '',
			'type' => 'color'
	);

	$options[] = array(
			'name' => esc_html__( 'Button Background', 'brideliness' ),
			'id' => 'banner_button_bg',
			'std' => '',
			'type' => 'color'
	);

	$options[] = array(
			'name' => esc_html__( 'Select text position for banner', 'brideliness' ),
			'id' => 'banner_text_position',
			'std' => 'center',
			'type' => 'select',
			'options' => array(
					'center'  => esc_html__('center', 'brideliness'),
					'left'  => esc_html__('left', 'brideliness'),
					'right'  => esc_html__('right', 'brideliness'),
			)
	);
	/* Color Shemes */
	$options[] = array(
		'name' => esc_html__( 'Typography and Colors', 'brideliness' ),
		'type' => 'heading',
		'icon' => 'eyedropper'
	);

	$options[] = array(
		'name' => esc_html__( 'Enable custom colors and fonts?', 'brideliness' ),
		'id' => 'site_custom_colors',
		'std' => 'off',
		'type' => 'radio',
		'class' => 'has_hidden_childs_radio',
		'options' => $on_off_array
	);

	$options[] = array(
		'name' => esc_html__( 'Fonts Options', 'brideliness' ),
		'type' => 'info',
		'class' => 'hidden'
	);
	$options[] = array(
		'name' => esc_html__( 'Google Fonts Api Key', 'brideliness' ),
		'desc' => esc_html__( 'Add Your Google Fonts Api Key', 'brideliness' ),
		'id' => 'google_fonts_api_key',
		'std' => '',
		'type' => 'text',
		'class' => 'hidden',
	);
if(brideliness_get_option('site_custom_colors')=='on'){
	$options[] = array(
		'name' => esc_html__( 'Primary text typography options', 'brideliness' ),
		'desc' => esc_html__( 'Specify color for all text content', 'brideliness' ),
		'id' => "primary_text_typography",
		'std' => array(
			'size' => '14px',
			'face' => 'Lato',
			'style' => 'normal',
			'color' => '#7e7974'
		),
		'type' => 'typography',
		'class' => 'hidden',
		'options' => $typography_options
	);
}
	$options[] = array(
		'name' => esc_html__( 'Secondary text color', 'brideliness' ),
		'desc' => esc_html__( 'Specify secondary color for all meta content(categories, tags, excerpts, avtor biography)', 'brideliness' ),
		'id' => 'secondary_text_color',
		'std' => '#86817d',
		'class' => 'hidden',
		'type' => 'color'
	);
if(brideliness_get_option('site_custom_colors')=='on'){
	$options[] = array(
		'name' => esc_html__( 'Content headings typography options', 'brideliness' ),
		'desc' => esc_html__( 'Specify color for all headings in the content area(page/post/product titles)', 'brideliness' ),
		'id' => "content_headings_typography",
		'std' => array(
			'size' => '28px',
			'face' => 'EB_Garamond',
			'style' => 'normal',
			'color' => '#000000'
		),
		'type' => 'typography',
		'class' => 'hidden',
		'options' => $typography_options
	);

	$options[] = array(
		'name' => esc_html__( 'Sidebar headings typography options', 'brideliness' ),
		'desc' => esc_html__( 'Specify color for all headings in the sidebar area(widget titles)', 'brideliness' ),
		'id' => "sidebar_headings_typography",
		'std' => array(
			'size' => '16px',
			'face' => 'EB_Garamond',
			'style' => 'normal',
			'color' => '#151515'
		),
		'type' => 'typography',
		'class' => 'hidden',
		'options' => $typography_options
	);

	$options[] = array(
		'name' => esc_html__( 'Footer headings typography options', 'brideliness' ),
		'desc' => esc_html__( 'Specify color for all headings in the footer widgets(footer widget titles)', 'brideliness' ),
		'id' => "footer_headings_typography",
		'std' => array(
			'size' => '14px',
			'face' => 'Libre_Baskerville',
			'style' => 'normal',
			'color' => '#f9f9f8'
		),
		'type' => 'typography',
		'class' => 'hidden',
		'options' => $typography_options
	);
}
	$options[] = array(
		'name' => esc_html__( 'Footer text color', 'brideliness' ),
		'desc' => esc_html__( 'Specify color for text in the footer area', 'brideliness' ),
		'id' => 'footer_text_color',
		'std' => '#ebe9e6',
		'class' => 'hidden',
		'type' => 'color'
	);

	$options[] = array(
		'name' => esc_html__( 'Links and Buttons Options', 'brideliness' ),
		'type' => 'info',
		'class' => 'hidden'
	);

	$options[] = array(
		'name' => esc_html__( 'Link color', 'brideliness' ),
		'desc' => esc_html__( 'Specify color for all text links', 'brideliness' ),
		'id' => 'link_color',
		'std' => '#8b8987',
		'class' => 'hidden',
		'type' => 'color'
	);

	$options[] = array(
		'name' => esc_html__( 'Link color on hover', 'brideliness' ),
		'desc' => esc_html__( 'Specify color for all hovered text links', 'brideliness' ),
		'id' => 'link_color_hover',
		'std' => '#000000',
		'class' => 'hidden',
		'type' => 'color'
	);
if(brideliness_get_option('site_custom_colors')=='on'){
	$options[] = array(
		'name' => esc_html__( 'Primary button typography options', 'brideliness' ),
		'desc' => esc_html__( 'Specify fonts for buttons(product "add to cart", form buttons, etc.)', 'brideliness' ),
		'id' => "button_typography",
		'std' => array(
			'size' => '12px',
			'face' => 'Lato',
			'style' => 'normal',
			'color' => '#ffffff'
		),
		'type' => 'typography',
		'class' => 'hidden',
		'options' => $typography_options
	);
}
	$options[] = array(
		'name' => esc_html__( 'Primary button background color', 'brideliness' ),
		'desc' => esc_html__( 'Specify background color for buttons.', 'brideliness' ),
		'id' => 'button_background_color',
		'std' => '#000000',
		'class' => 'hidden',
		'type' => 'color'
	);
	
	$options[] = array(
		'name' => esc_html__( 'Primary button background color on hover', 'brideliness' ),
		'desc' => esc_html__( 'Specify background color for buttons on hover.', 'brideliness' ),
		'id' => 'button_background_hover_color',
		'std' => '#e7e6e5',
		'class' => 'hidden',
		'type' => 'color'
	);

	$options[] = array(
		'name' => esc_html__( 'Primary button text color on hover', 'brideliness' ),
		'desc' => esc_html__( 'Specify text color for hovered buttons', 'brideliness' ),
		'id' => 'button_text_hovered_color',
		'std' => '#585858',
		'class' => 'hidden',
		'type' => 'color'
	);

	$options[] = array(
		'name' => esc_html__( 'Icons and other Elements', 'brideliness' ),
		'type' => 'info',
		'class' => 'hidden'
	);

	$options[] = array(
		'name' => esc_html__( 'Main Theme color', 'brideliness' ),
		'desc' => esc_html__( 'Specify color for decorative elements(icons, buttons, switchers, etc.)', 'brideliness' ),
		'id' => 'main_decor_color',
		'std' => '#000000',
		'class' => 'hidden',
		'type' => 'color'
	);

	$options[] = array(
		'name' => esc_html__( 'Theme Border color', 'brideliness' ),
		'desc' => esc_html__( 'Specify color for borders of the theme elements', 'brideliness' ),
		'id' => 'main_border_color',
		'std' => '#e7e7e7',
		'class' => 'hidden',
		'type' => 'color'
	);
	/* Color Shemes */
	$options[] = array(
		'name' => esc_html__( 'Gallery Page', 'brideliness' ),
		'type' => 'heading',
		'icon' => 'templates'
	);
	
	$options[] = array(
		'name' => esc_html__( 'Choose hover effect for gallery item', 'brideliness' ),
		'id' => 'gallery_hover',
		'std' => 'hover1',
		'type' => 'select',
		'options' => array(
			'hover-1'  => esc_html__('Hover effect 1', 'brideliness'),
			'hover-2'  => esc_html__('Hover effect 2', 'brideliness'),
			'without'  => esc_html__('Without hover effect', 'brideliness'),
		)
	);
	return $options;
}
