<?php
/**
 * Plugin Name: St Rose History
 * Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
 * Description: A brief description of the plugin.
 * Version: 1.0
 * Author: Kerron Gordon
 * Author URI: http://URI_Of_The_Plugin_Author
 * Text Domain: Optional. Plugin's text domain for localization. Example: mytextdomain
 * Domain Path: Optional. Plugin's relative directory path to .mo files. Example: /locale/
 * Network: Optional. Whether the plugin can only be activated network wide. Example: true
 * License: GPL2
 */

// Register Custom Post Type
function history_post_type() {

	$labels = array(
		'name'                => _x( 'Historys', 'Post Type General Name', 'strose' ),
		'singular_name'       => _x( 'History', 'Post Type Singular Name', 'strose' ),
		'menu_name'           => __( 'History', 'strose' ),
		'name_admin_bar'      => __( 'History', 'strose' ),
		'parent_item_colon'   => __( 'Parent Item:', 'strose' ),
		'all_items'           => __( 'All Items', 'strose' ),
		'add_new_item'        => __( 'Add New Item', 'strose' ),
		'add_new'             => __( 'Add New', 'strose' ),
		'new_item'            => __( 'New Item', 'strose' ),
		'edit_item'           => __( 'Edit Item', 'strose' ),
		'update_item'         => __( 'Update Item', 'strose' ),
		'view_item'           => __( 'View Item', 'strose' ),
		'search_items'        => __( 'Search Item', 'strose' ),
		'not_found'           => __( 'Not found', 'strose' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'strose' ),
	);
	$args = array(
		'label'               => __( 'history', 'strose' ),
		'description'         => __( 'History of strose', 'strose' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'author', 'thumbnail', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-groups',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'query_var'           => 'history',
		'capability_type'     => 'page',
	);
	register_post_type( 'history', $args );

}

// Hook into the 'init' action
add_action( 'init', 'history_post_type', 0 );




function strose_history( $archive_template ) {
     global $post;

     if ( is_post_type_archive ( 'history' ) ) {
          $archive_template = dirname( __FILE__ ) . '/archive-history.php';
     }
     return $archive_template;
}

add_filter( 'archive_template', 'strose_history' ) ;

