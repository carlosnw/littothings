<?php  

/* Brideliness functions and definitions.
 
	Contents:
			1.  Set up the content width value based on the theme's design
			2.  Set up php DIR variable
			3.  Adding additional image sizes
			4.  Brideliness setup
			5.  Enqueue scripts and styles for the front-end
			6.  Brideliness Init Sidebars
			7.  Include widgets
			8.  Theme Option
			9.  Required functions
*/

/* 1. Set up the content width value based on the theme's design. (start)*/

	if (!isset( $content_width )) $content_width = 1200;

/* 1. Set up the content width value based on the theme's design. (end)*/

/* 2. Set up php DIR variable (start)*/

	if (!defined(__DIR__)) define ('__DIR__', dirname(__FILE__));

/* 2. Set up php DIR variable (end)*/

/* 3. Adding additional image sizes (start)*/

	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'brideliness-related-thumb', 540, 380, true );
		add_image_size( 'brideliness-navi-thumb', 210, 170, true);
		add_image_size( 'brideliness-recent-post', 360, 180, true);	
		add_image_size( 'brideliness-recent-post-widget', 200, 170, true);
		add_image_size( 'brideliness-portfolio-thumb', 700, 930, true);
		add_image_size( 'brideliness-single-product-thumb', 85, 130, true);
		add_image_size( 'brideliness-lookbook', 555, 705, true);
		add_image_size( 'brideliness-lookbook-thumb', 325, 420, false);
	}

/* 3. Adding additional image sizes (end) */

/* 4. Brideliness setup (start)*/

	if ( ! function_exists( 'brideliness_setup' ) ) :
		function brideliness_setup() {
			// Translation availability
			load_theme_textdomain( 'brideliness', get_template_directory() . '/languages' );

			// Add RSS feed links to <head> for posts and comments.
			add_theme_support( 'automatic-feed-links' );

			add_theme_support( "title-tag" );
			
			add_theme_support( "custom-header");

			// Enable support for Post Thumbnails.
			add_theme_support( 'post-thumbnails' );

			set_post_thumbnail_size( 820, 420, true);

			// Nav menus.
			register_nav_menus( array(
				'header-top-nav'   => esc_html__( 'Top Menu', 'brideliness' ),
				'primary-nav'      => esc_html__( 'Primary Menu (Under Logo)', 'brideliness' ),
			) );

			// Switch default core markup for search form, comment form, and comments to output valid HTML5.
			add_theme_support( 'html5', array(
				'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
			) );

			// Enable support for Post Formats.
			add_theme_support( 'post-formats', array(
				'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
			) );
	
			// This theme allows users to set a custom background.
			add_theme_support( 'custom-background', array(
				'default-color' => 'FFFFFF',
			) );

			// Enable woocommerce support
			add_theme_support( 'woocommerce' );
	
			// Enable layouts support
			$brideliness_default_layouts = array(
				array('value' => 'one-col', 'label' => esc_html__('1 Column (no sidebars)', 'brideliness'), 'icon' => get_template_directory_uri().'/theme-options/images/one-col.png'),
				array('value' => 'two-col-left', 'label' => esc_html__('2 Columns, sidebar on left', 'brideliness'), 'icon' => get_template_directory_uri().'/theme-options/images/two-col-left.png'),
				array('value' => 'two-col-right', 'label' => esc_html__('2 Columns, sidebar on right', 'brideliness'), 'icon' => get_template_directory_uri().'/theme-options/images/two-col-right.png'),
			);
			add_theme_support( 'brideliness-layouts', apply_filters('brideliness_default_layouts', $brideliness_default_layouts) ); 

		}
	endif;

	add_action( 'after_setup_theme', 'brideliness_setup' );

	/* Setting Google Fonts for your site */
	if ( ! class_exists( 'bridelinessFonts' ) ) {
		class bridelinessFonts {
			static function get_default_fonts() {
				$brideliness_default_fonts = array('EB Garamond', 'Lato', 'Great Vibes', 'Libre Baskerville');
				return $brideliness_default_fonts;
			}
		}
	}

/* 4. Brideliness setup (end) */

/* 5. Enqueue scripts and styles for the front-end. (start)*/

	function brideliness_scripts() {
	//----Base CSS Styles-----------
		wp_enqueue_style( 'brideliness-basic', get_stylesheet_uri() );
		wp_enqueue_style( 'brideliness-font-brideliness', get_template_directory_uri() . '/css/brideliness.css' );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	//----Base JS libraries
		wp_enqueue_script( 'hoverIntent', array('jquery') );
		wp_enqueue_script( 'imagesloaded', array('jquery') );
		wp_enqueue_script( 'easings', get_template_directory_uri() . '/js/jquery.easing.1.3.min.js', array('jquery'), '1.3', true );
		wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '3.1.1', true);
		wp_enqueue_script( 'countdown', get_template_directory_uri() . '/js/jquery.countdown.min.js', array('jquery'), '1.0.1.', true );
		wp_enqueue_script( 'post-share', get_template_directory_uri() . '/js/post-share.js', array('jquery'), '1.0.1.', true );
		wp_enqueue_script( 'select2', get_template_directory_uri() . '/js/select2.min.js', array('jquery'), '3.5.2', true);
		wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '1.3.3', true);
		wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/js/magnific-popup.js', array('jquery'), '1.1.0', true);
		wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array('jquery'), '2.1.0', true );
		wp_enqueue_script( 'brideliness-basic-js', get_template_directory_uri() . '/js/helper.js', array('jquery'), '1.0', true );
		

		
		//Add Lanquage Settings for shop tooltips on hover
		wp_add_inline_script('brideliness-basic-js',
		'jQuery(document).ready(function($) { msg_quick ="'.esc_html__('Quickview', 'brideliness').'"; 
		 msg_compare ="'.esc_html__('Compare', 'brideliness').'";
		 msg_added = "'.esc_html__('Added to Compare List', 'brideliness').'";
		 msg_wish = "'.esc_html__('Add to Wish List', 'brideliness').'";
		 msg_wish_details = "'.esc_html__('Added to Wish List', 'brideliness').'";
		 msg_wish_view = "'.esc_html__('View Wish List', 'brideliness').'";});',
		'before');
		
		
	//----Load Bootsrap-------------
		wp_enqueue_style( 'brideliness-bootstrap-layout', get_template_directory_uri() . '/css/bootstrap.css' );

	//----Comments script-----------
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	
	add_action( 'wp_enqueue_scripts', 'brideliness_scripts' );
	
/* 5. Enqueue scripts and styles for the front-end. (end)*/

/* 6. Brideliness Init Sidebars. (start)*/
	
	function brideliness_widgets_init() {
	// Default Sidebars
		register_sidebar( array(
			'name' => esc_html__( 'Blog Sidebar', 'brideliness' ),
			'id' => 'sidebar-blog',
			'description' => esc_html__( 'Appears on single blog posts and on Blog Page', 'brideliness' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title"><span>',
			'after_title' => '</span></h3>',
		) );
		register_sidebar( array(
			'name' => esc_html__( 'Pages Sidebar', 'brideliness' ),
			'id' => 'sidebar-pages',
			'description' => esc_html__( 'Appears on Pages', 'brideliness' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title"><span>',
			'after_title' => '</span></h3>',
		) );
		register_sidebar( array(
			'name' => esc_html__( 'Header Top Panel Sidebar', 'brideliness' ),
			'id' => 'top-sidebar',
			'description' => esc_html__( 'Located at the top of site', 'brideliness' ),
			'before_widget' => '<div id="%1$s" class="%2$s left-aligned">',
			'after_widget' => '</div>',
			'before_title' => '<!--',
			'after_title' => '-->',
		) );
		register_sidebar( array(
			'name' => esc_html__( 'Aside Logo Left sidebar(Standart Header)', 'brideliness' ),
			'id' => 'aside-logo-left-sidebar',
			'description' => esc_html__( 'Located to the left from header', 'brideliness' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '',
			'after_title' => '',
		) );
		register_sidebar( array(
			'name' => esc_html__( 'Aside Logo Right sidebar(Standart Header)', 'brideliness' ),
			'id' => 'aside-logo-right-sidebar',
			'description' => esc_html__( 'Located to the right from header', 'brideliness' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '',
			'after_title' => '',
		) );
		register_sidebar( array(
				'name' => esc_html__( 'Aside Logo Sidebar(Fixed Header)' , 'brideliness' ),
				'id' => 'fixed-header',
				'description' => esc_html__( 'Located to the right of the Header', 'brideliness' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '',
				'after_title' => '',
		) );
		register_sidebar( array(
			'name' => esc_html__( 'Menu Sidebar(Standart Header)', 'brideliness' ),
			'id' => 'menu-sidebar',
			'description' => esc_html__( 'Located to the right after menu', 'brideliness' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '',
			'after_title' => '',
		) );
		register_sidebar( array(
			'name' => esc_html__( 'Front Page Sidebar', 'brideliness' ),
			'id' => 'sidebar-front',
			'description' => esc_html__( 'Appears on Front Page', 'brideliness' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title"><span>',
			'after_title' => '</span></h3>',
		) );
		register_sidebar( array(
			'name' => esc_html__( 'Shop Page Sidebar', 'brideliness' ),
			'id' => 'sidebar-shop',
			'description' => esc_html__( 'Appears on Products page', 'brideliness' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title"><span>',
			'after_title' => '</span></h3>',
		) );
		register_sidebar( array(
			'name' => esc_html__( 'Shop Page Special Filters Sidebar', 'brideliness' ),
		    'id' => 'filters-sidebar',
		    'description' => esc_html__( 'Located at the top of the products page', 'brideliness' ),
		    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		    'after_widget' => '</aside>',
		    'before_title' => '<h3 class="dropdown-filters-title">',
		    'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => esc_html__( 'Shop Bottom Sidebar #1', 'brideliness' ),
		    'id' => 'footer-content-bottom-shop1',
		    'description' => esc_html__( 'Located at the bottom content shop', 'brideliness' ),
		    'before_widget' => '<div id="%1$s" class="widget %2$s">',
		    'after_widget' => '</div>',
		    'before_title' => '<h3 class="shop-bottom-sidebar">',
		    'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => esc_html__( 'Shop Bottom Sidebar #2', 'brideliness' ),
		    'id' => 'footer-content-bottom-shop2',
		    'description' => esc_html__( 'Located at the bottom content shop', 'brideliness' ),
		    'before_widget' => '<div id="%1$s" class="widget %2$s">',
		    'after_widget' => '</div>',
		    'before_title' => '<h3 class="shop-bottom-sidebar">',
		    'after_title' => '</h3>',
		    ) );
		register_sidebar( array(
			'name' => esc_html__( 'Single Product Sidebar', 'brideliness' ),
			'id' => 'sidebar-product',
			'description' => esc_html__( 'Appears on Single Products page', 'brideliness' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title"><span>',
			'after_title' => '</span></h3>',
		) );
		// Footer Sidebars
		register_sidebar( array(
			'name' => esc_html__( 'Footer Sidebar Col#1', 'brideliness' ),
			'id' => 'footer-sidebar-1',
			'description' => esc_html__( 'Located in the footer of the site', 'brideliness' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => esc_html__( 'Footer Sidebar Col#2', 'brideliness' ),
			'id' => 'footer-sidebar-2',
			'description' => esc_html__( 'Located in the footer of the site', 'brideliness' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => esc_html__( 'Footer Sidebar Col#3', 'brideliness' ),
			'id' => 'footer-sidebar-3',
			'description' => esc_html__( 'Located in the footer of the site', 'brideliness' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => esc_html__( 'Footer Sidebar Col#4', 'brideliness' ),
			'id' => 'footer-sidebar-4',
			'description' => esc_html__( 'Located in the footer of the site', 'brideliness' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => esc_html__( 'Footer Bottom Sidebar', 'brideliness' ),
			'id' => 'footer-bottom',
			'description' => esc_html__( 'Located in the footer of the site', 'brideliness' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	if(brideliness_get_option('brideliness-specials-sidebar1')){
		register_sidebar( array(
			'name' => esc_html__( 'Brideliness Specials Sidebar #1', 'brideliness' ),
			'id' => 'brideliness-specials-sidebar1',
			'description' => esc_html__( 'This sidebar can be placed in any part of your home page where Visual Composer plugin is used', 'brideliness' ),
			'before_widget' => '<div id="%1$s" class="widget specials %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title"><span>',
			'after_title' => '</span></h3>',
			) );	
	}
	if(brideliness_get_option('brideliness-specials-sidebar2')){
		register_sidebar( array(
			'name' => esc_html__( 'Brideliness Specials Sidebar #2', 'brideliness' ),
			'id' => 'brideliness-specials-sidebar2',
			'description' => esc_html__( 'This sidebar can be placed in any part of your home page where Visual Composer plugin is used', 'brideliness' ),
			'before_widget' => '<div id="%1$s" class="widget specials %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title"><span>',
			'after_title' => '</span></h3>',
			) );	
	}
	if(brideliness_get_option('brideliness-specials-sidebar3')){
		register_sidebar( array(
			'name' => esc_html__( 'Brideliness Specials Sidebar #3', 'brideliness' ),
			'id' => 'specials-front-page',
			'description' => esc_html__( 'This sidebar can be placed in any part of your home page where Visual Composer plugin is used', 'brideliness' ),
			'before_widget' => '<div id="%1$s" class="widget specials-front-page %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title"><span>',
			'after_title' => '</span></h3>',
		) );
	}		
	}
	
	add_action( 'widgets_init', 'brideliness_widgets_init' );
	
/* 6. Brideliness Init Sidebars. (end)*/
 
/* 7. Include widgets. (start)*/
	
	if ( class_exists('Woocommerce') ) {
		require_once(trailingslashit( get_template_directory() ).'/widgets/brideliness-widget-cart.php');
	}
	require_once(trailingslashit( get_template_directory() ).'/widgets/brideliness-widget-contacts.php');
	require_once(trailingslashit( get_template_directory() ).'/widgets/brideliness-widget-socials.php');
	require_once(trailingslashit( get_template_directory() ).'/widgets/brideliness-widget-recent-posts.php');
	require_once(trailingslashit( get_template_directory() ).'/widgets/brideliness-widget-collapsing-categories.php');
	require_once(trailingslashit( get_template_directory() ).'/widgets/pay-icons/brideliness-widget-pay-icons.php');
	require_once(trailingslashit( get_template_directory() ).'/widgets/brideliness-widget-search.php');
	
/* 7. Include widgets. (end)*/

/* 8. Theme Option (start)*/

/* Loads the Options Panel */
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/theme-options/' );
	require_once ( get_template_directory() . '/theme-options/options-framework.php' );

	// Loads options.php from child or parent theme
	$optionsfile = locate_template( 'options.php' );
	load_template( $optionsfile );
	
	function brideliness_prefix_options_menu_filter( $menu ) {
		$menu['mode'] = 'menu';
		$menu['page_title'] = esc_html__( 'Brideliness Theme Options', 'brideliness');
		$menu['menu_title'] = esc_html__( 'Brideliness Theme Options', 'brideliness');
		$menu['menu_slug'] = 'brideliness-theme-options';
		return $menu;
	}
	add_filter( 'optionsframework_menu', 'brideliness_prefix_options_menu_filter' );

/* 8. Theme Option (end)*/

/* 9. Required functions (start)*/

	require_once(trailingslashit( get_template_directory() ).'/inc/brideliness-self-install.php');
	require_once(trailingslashit( get_template_directory() ).'/inc/brideliness-infinite-blog.php');
	require_once(trailingslashit( get_template_directory() ).'/inc/brideliness-theme-layouts.php');
	require_once(trailingslashit( get_template_directory() ).'/inc/brideliness-google-fonts.php');
	if ( class_exists('Woocommerce') ) {
		require_once(trailingslashit( get_template_directory() ).'/inc/brideliness-woo-modification.php');
	}
	require_once(trailingslashit( get_template_directory() ).'/inc/brideliness-functions.php');
	require_once(trailingslashit( get_template_directory() ).'/inc/brideliness-share-buttons.php');
	require_once(trailingslashit( get_template_directory() ).'/inc/brideliness-post-like.php');
	
/* 9. Required functions (end)*/
