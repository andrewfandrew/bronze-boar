<?php
/*
Plugin Name: Myraces Custom post type
Description: A custom post type for Torill's races
Author: Andrew Farquharson
Author URI: http://andrewfarquharsonproject.org.uk
*/

add_action( 'init', 'myraces_cpt' ); // note that the machine name which is the one to use in the templates is //'myraces_cpt'

function myraces_cpt() {

register_post_type( 'myraces', array(
  'labels' => array(
    'name' => 'My races',
    'singular_name' => 'My race',
   ),
  'description' => 'Torills races, past present and future.',
  'public' => true,
  'has_archive' => true,
  'menu_position' => 20,
  'supports' => array( 'title','custom_fields', 'comments', 'revisions', 'thumbnail',),
  'publicly_queryable' => true,
  'show_ui' => true,
  'rewrite' => array('slug' => 'my-races'),
  
));
}

///////////////////////////////// AF: this snippet allows the custom post type to be included with the default post type ////////////////////////////

/* // Show posts of 'post', 'page' and 'sketches' post types on home page
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

function add_my_post_types_to_query( $query ) {
	if ( is_home() && $query->is_main_query() )
		$query->set( 'post_type', array( 'post', 'page', 'sketches' ) );
	return $query;
}
*/


//////////////////////////////// AF: The following snippet was found online and is worth trying ///////////////////////////////////////////////////

// It should add the custom post type to the feed
// Add a Custom Post Type to a feed

function add_cpt_to_feed( $qv ) {
  if ( isset($qv['feed']) && !isset($qv['post_type']) )
    $qv['post_type'] = array('post', 'myraces');
  return $qv;
}

add_filter( 'request', 'add_cpt_to_feed' );



/////////////////////////////// AF: The following code adds custom taxonomy items to the 'sketches' post type //////////////////////////////////////
/**
// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_sketch_taxonomies', 0 );

// AF: create two taxonomies, 'using custom post types' and 'organising site content' for the post type "sketches"
function create_sketch_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Using Custom Post types', 'taxonomy general name' ),
		'singular_name'     => _x( 'Using Custom Post type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Using CPTs' ),
		'all_items'         => __( 'All Using CPTs' ),
		'parent_item'       => null,
		'parent_item_colon' => null,
		'edit_item'         => __( 'Edit Using CPTs' ),
		'update_item'       => __( 'Update Using CPTs' ),
		'add_new_item'      => __( 'Add New Using CPTs' ),
		'new_item_name'     => __( 'New Using CPTs Name' ),
		'menu_name'         => __( 'Using CPTs' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'using-custom-post-types' ),
	);

	register_taxonomy( 'using_custom_post_types', array( 'sketches' ), $args );

	// Add new taxonomy, NOT hierarchical (like tags)
	$labels = array(
		'name'                       => _x( 'Organising site content', 'taxonomy general name' ),
		'singular_name'              => _x( 'Organising site content', 'taxonomy singular name' ),
		'search_items'               => __( 'Search Organising site content' ),
		'all_items'                  => __( 'All Organising site content' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit OSC' ),
		'update_item'                => __( 'Update OSC' ),
		'add_new_item'               => __( 'Add New OSC' ),
		'new_item_name'              => __( 'New OSC' ),
		'separate_items_with_commas' => __( 'Separate OSCs with commas' ),
		'add_or_remove_items'        => __( 'Add or remove OSCs' ),
		'not_found'                  => __( 'No OSCs found.' ),
		'menu_name'                  => __( 'Organise site content' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'organise-site-content' ),
	);

	register_taxonomy( 'organise_site_content', 'sketches', $args );
}
*/


//////////////////////// AF: the following code adds full permissions to the custom post type 'myraces' to the editor and admin roles ////////////////////////////
# Give Administrators and Editors All myraces Capabilities
function add_myraces_caps_to_admin() {
  $caps = array(
    'read',
    'read_myraces',
    'read_private_myraces',
    'edit_myraces',
    'edit_private_myraces',
    'edit_published_myraces',
    'edit_others_myraces',
    'publish_myraces',
    'delete_myraces',
    'delete_private_myraces',
    'delete_published_myraces',
    'delete_others_myraces',
  );
  $roles = array(
    get_role( 'administrator' ),
    get_role( 'editor' ),
  );
  foreach ($roles as $role) {
    foreach ($caps as $cap) {
      $role->add_cap( $cap );
    }
  }
}
add_action( 'after_setup_theme', 'add_myraces_caps_to_admin' );

