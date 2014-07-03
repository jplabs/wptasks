<?php

/*-----------------------------------------------------------------------------------*/
/* Start WooThemes Functions - Please refrain from editing this section */
/*-----------------------------------------------------------------------------------*/

// Set path to WooFramework and theme specific functions
$functions_path = get_template_directory() . '/functions/';
$includes_path = get_template_directory() . '/includes/';

// Don't load alt stylesheet from WooFramework
if ( ! function_exists( 'woo_output_alt_stylesheet' ) ) {
	function woo_output_alt_stylesheet () {}
}

// Define the theme-specific key to be sent to PressTrends.
define( 'WOO_PRESSTRENDS_THEMEKEY', 'tnla49pj66y028vef95h2oqhkir0tf3jr' );

// WooFramework
require_once ( $functions_path . 'admin-init.php' );	// Framework Init

if ( get_option( 'woo_woo_tumblog_switch' ) == 'true' ) {
	//Enable Tumblog Functionality and theme is upgraded
	update_option( 'woo_needs_tumblog_upgrade', 'false' );
	update_option( 'tumblog_woo_tumblog_upgraded', 'true' );
	update_option( 'tumblog_woo_tumblog_upgraded_posts_done', 'true' );
	require_once ( $functions_path . 'admin-tumblog-quickpress.php' );  // Tumblog Dashboard Functionality
}

/*-----------------------------------------------------------------------------------*/
/* Load the theme-specific files, with support for overriding via a child theme.
/*-----------------------------------------------------------------------------------*/

$includes = array(
				'includes/theme-options.php', 				// Options panel settings and custom settings
				'includes/theme-functions.php', 			// Custom theme functions
				'includes/theme-actions.php', 				// Theme actions & user defined hooks
				'includes/theme-comments.php', 				// Custom comments/pingback loop
				'includes/theme-js.php', 					// Load JavaScript via wp_enqueue_script
				'includes/theme-plugin-integrations.php',	// Plugin integrations
				'includes/sidebar-init.php', 				// Initialize widgetized areas
				'includes/theme-widgets.php',				// Theme widgets
				'includes/theme-advanced.php',				// Advanced Theme Functions
				'includes/theme-shortcodes.php',	 		// Custom theme shortcodes
				'includes/woo-layout/woo-layout.php',		// Layout Manager
				'includes/woo-meta/woo-meta.php',			// Meta Manager
				'includes/woo-hooks/woo-hooks.php'			// Hook Manager
				);

// Allow child themes/plugins to add widgets to be loaded.
$includes = apply_filters( 'woo_includes', $includes );

foreach ( $includes as $i ) {
	locate_template( $i, true );
}

/*-----------------------------------------------------------------------------------*/
/* You can add custom functions below */
/*-----------------------------------------------------------------------------------*/
function wptasks_posttypes() {
		
		$labels = array(
			'name' => 'Hotels',
			'singular_name' => 'hotel',
			'add_new' => 'Add new',
			'add_new_item' => 'Add new hotel',
			'edit_item' => 'Edit hotel',
			'new_item' => 'New hotel',
			'view_item' => 'View hotel',
			'search_items' => 'Search hotel',
			'not_found' =>  'No hotels found',
			'not_found_in_trash' => 'No hotels found in trash',
			'parent_item_colon' => ''
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'hotels' ),
			'capability_type' => 'post',
			'hierarchical' => false,			
			'menu_position' => null,
			'has_archive' => true,			
			'supports' => array( 'title','editor','thumbnail' )
		);

		register_post_type( 'hotels', $args );

}

function wptasks_taxonomies() {

	// Hotels Custom Taxonomies
	$labels = array(
		'name' => 'Locations',
		'singular_name' => 'location',
		'search_items' =>  'search location',
		'all_items' => 'all locations',
		'parent_item' => 'parent location',
		'parent_item_colon' => 'parent location',
		'edit_item' => 'edit location',
		'update_item' => 'update location',
		'add_new_item' => 'add new location',
		'new_item_name' => 'new location',
		'menu_name' => 'Locations'
	);

	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'hotel-location' )
	);

	register_taxonomy( 'hotel-location', array( 'hotels' ), $args );

	$labels = array(
		'name' => 'Sizes',
		'singular_name' => 'size',
		'search_items' =>  'search size',
		'all_items' => 'all sizes',
		'parent_item' => 'parent size',
		'parent_item_colon' => 'parent size',
		'edit_item' => 'edit size',
		'update_item' => 'update size',
		'add_new_item' => 'add new size',
		'new_item_name' => 'new size',
		'menu_name' => 'Sizes'
	);

	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'hotel-size' )
	);

	register_taxonomy( 'hotel-size', array( 'hotels' ), $args );
	
	$labels = array(
		'name' => 'Price',
		'singular_name' => 'price',
		'search_items' =>  'search price',
		'all_items' => 'all prices',
		'parent_item' => 'parent price',
		'parent_item_colon' => 'parent price',
		'edit_item' => 'edit price',
		'update_item' => 'update price',
		'add_new_item' => 'add new price',
		'new_item_name' => 'new price',
		'menu_name' => 'Prices'
	);

	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'hotel-price' )
	);

	register_taxonomy( 'hotel-price', array( 'hotels' ), $args );

}

add_action( 'init', 'wptasks_posttypes' );
add_action( 'init', 'wptasks_taxonomies' );

/*-----------------------------------------------------------------------------------*/
/* Don't add any code below here or the sky will fall down */
/*-----------------------------------------------------------------------------------*/
?>