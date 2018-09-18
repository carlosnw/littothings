<?php 
function custom_post_type_lookbook() {
	// Set UI labels for Custom Post Type
	$labels = array(
		'name'=> _x( 'Lookbook', 'Post Type General Name', 'themeszone-add-vc-shortcodes' ),
		'singular_name' => _x( 'Lookbook', 'Post Type Singular Name', 'themeszone-add-vc-shortcodes' ),
		'menu_name'=> esc_html__( 'Lookbook', 'themeszone-add-vc-shortcodes' ),
		'parent_item_colon'=> esc_html__( 'Parent Lookbook', 'themeszone-add-vc-shortcodes' ),
		'all_items'=> esc_html__( 'Lookbook', 'themeszone-add-vc-shortcodes' ),
		'view_item'=> esc_html__( 'View Lookbook Post', 'themeszone-add-vc-shortcodes' ),
		'add_new_item'=> esc_html__( 'Add New Lookbook Post', 'themeszone-add-vc-shortcodes' ),
		'add_new'=> esc_html__( 'Add New', 'themeszone-add-vc-shortcodes' ),
		'edit_item'=> esc_html__( 'Edit Lookbook Post', 'themeszone-add-vc-shortcodes' ),
		'update_item'=> esc_html__( 'Update Lookbook Post', 'themeszone-add-vc-shortcodes' ),
		'search_items'=> esc_html__( 'Search Lookbook Post', 'themeszone-add-vc-shortcodes' ),
		'not_found'=> esc_html__( 'Not Found', 'themeszone-add-vc-shortcodes' ),
		'not_found_in_trash'=> esc_html__( 'Not found in Trash', 'themeszone-add-vc-shortcodes' ),
	);
	// Set other options for Custom Post Type
	$args = array(
		'label'=> esc_html__( 'lookbook', 'themeszone-add-vc-shortcodes' ),
		'description'=> '',
		'labels'=> $labels,
		'supports'=> array( 'title', 'editor', 'thumbnail', 'author'),
		'taxonomies'=> array( 'category', 'post_tag' ),
		'hierarchical'=> false,
		'public'=> true,
		'show_ui'=> true,
		'show_in_menu'=> true,
		'show_in_nav_menus'=> true,
		'show_in_admin_bar'=> true,
		'menu_position'=> 5,
		'can_export'=> true,
		'has_archive'=> true,
		'exclude_from_search'=> false,
		'publicly_queryable'=> true,
		'menu_icon'=> 'dashicons-tickets-alt',
		'capability_type'=> 'page',
	);
	// Registering your Custom Post Type
		register_post_type( 'lookbook', $args );
}
add_action( 'init', 'custom_post_type_lookbook', 0 );