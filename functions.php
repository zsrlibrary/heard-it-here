<?php

// post types
// add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );
// add_post_type_support( 'post', 'post-formats' );

// custom menus
add_action( 'init', 'register_my_menu' );
function register_my_menu() {
	register_nav_menu( 'main-navigation', __( 'Main Navigation' ) );
}

//read more [...]
function new_excerpt_more( $more ) {
	//return ' ...';
	return ' <a class="readmore" href="'. get_permalink($post->ID) . '">' . '... Read More' . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// excerpt length
function custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// featured image/thumbnail support
add_theme_support( 'post-thumbnails' );

// sidebars
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'sidebar-1',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h2>',
'after_title' => '</h2>',
));
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'sidebar-2',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h2>',
'after_title' => '</h2>',
));

// how wide does the theme go?
// if (!isset($content_width)) $content_width = 700;


// remove inline css for gallery shortcode
// add_filter( 'use_default_gallery_style', '__return_false' );

// custom taxonomy: semesters
// function semesters_init() {
// 	// create a new taxonomy
// 	register_taxonomy(
// 		'semesters',
// 		'post',
// 		array(
// 			'label' => __( 'Semester' ),
// 			'rewrite' => array( 'slug' => 'semester' ),
// 			// 'capabilities' => array(
// 			// 	'assign_terms' => 'edit_guides',
// 			// 	'edit_terms' => 'publish_guides'
// 			// )
// 		)
// 	);
// }
// add_action( 'init', 'semesters_init' );


// custom taxonomies
add_action( 'init', 'create_semester_taxonomy' );
function create_semester_taxonomy() {
	$labels = array(
		'name' => _x( 'Semesters', 'taxonomy general name' ),
		'singular_name' => _x( 'Semester', 'taxonomy singular name' ),
		'search_items' => __( 'Search Semesters' ),
		'all_items' => __( 'All Semesters' ),
		// 'parent_item' => __( 'Parent Semester' ),
		// 'parent_item_colon' => __( 'Parent Semester:' ),
		'edit_item' => __( 'Edit Semester' ),
		'update_item' => __( 'Update Semester' ),
		'add_new_item' => __( 'Add New Semester' ),
		'new_item_name' => __( 'New Semester Name' ),
		'menu_name' => __( 'Semesters' ),
	);
	register_taxonomy( 'semester', 'post', array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'semester' ),
	) );
}