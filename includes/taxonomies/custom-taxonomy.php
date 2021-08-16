<?php
/**
 * Adds a cumstom taxonomy.
 *
 * @package PluginPackage
 */

/**
 * Registers the `custom_taxonomy` taxonomy,
 * for use with 'post'.
 */
function custom_taxonomy_init() {
	register_taxonomy(
		'custom-taxonomy',
		array( 'post' ),
		array(
			'hierarchical'      => false,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_ui'           => true,
			'show_admin_column' => false,
			'query_var'         => true,
			'rewrite'           => true,
			'capabilities'      => array(
				'manage_terms'  => 'edit_posts',
				'edit_terms'    => 'edit_posts',
				'delete_terms'  => 'edit_posts',
				'assign_terms'  => 'edit_posts',
			),
			'labels'            => array(
				'name'                       => __( 'Custom taxonomies', 'sample-plugin' ),
				'singular_name'              => _x( 'Custom taxonomy', 'taxonomy general name', 'sample-plugin' ),
				'search_items'               => __( 'Search Custom taxonomies', 'sample-plugin' ),
				'popular_items'              => __( 'Popular Custom taxonomies', 'sample-plugin' ),
				'all_items'                  => __( 'All Custom taxonomies', 'sample-plugin' ),
				'parent_item'                => __( 'Parent Custom taxonomy', 'sample-plugin' ),
				'parent_item_colon'          => __( 'Parent Custom taxonomy:', 'sample-plugin' ),
				'edit_item'                  => __( 'Edit Custom taxonomy', 'sample-plugin' ),
				'update_item'                => __( 'Update Custom taxonomy', 'sample-plugin' ),
				'view_item'                  => __( 'View Custom taxonomy', 'sample-plugin' ),
				'add_new_item'               => __( 'Add New Custom taxonomy', 'sample-plugin' ),
				'new_item_name'              => __( 'New Custom taxonomy', 'sample-plugin' ),
				'separate_items_with_commas' => __( 'Separate custom taxonomies with commas', 'sample-plugin' ),
				'add_or_remove_items'        => __( 'Add or remove custom taxonomies', 'sample-plugin' ),
				'choose_from_most_used'      => __( 'Choose from the most used custom taxonomies', 'sample-plugin' ),
				'not_found'                  => __( 'No custom taxonomies found.', 'sample-plugin' ),
				'no_terms'                   => __( 'No custom taxonomies', 'sample-plugin' ),
				'menu_name'                  => __( 'Custom taxonomies', 'sample-plugin' ),
				'items_list_navigation'      => __( 'Custom taxonomies list navigation', 'sample-plugin' ),
				'items_list'                 => __( 'Custom taxonomies list', 'sample-plugin' ),
				'most_used'                  => _x( 'Most Used', 'custom-taxonomy', 'sample-plugin' ),
				'back_to_items'              => __( '&larr; Back to Custom taxonomies', 'sample-plugin' ),
			),
			'show_in_rest'      => true,
			'rest_base'         => 'custom-taxonomy',
			'rest_controller_class' => 'WP_REST_Terms_Controller',
		)
	);
}
add_action( 'init', 'custom_taxonomy_init' );

/**
 * Sets the post updated messages for the `custom_taxonomy` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `custom_taxonomy` taxonomy.
 */
function custom_taxonomy_updated_messages( $messages ) {

	$messages['custom-taxonomy'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Custom taxonomy added.', 'sample-plugin' ),
		2 => __( 'Custom taxonomy deleted.', 'sample-plugin' ),
		3 => __( 'Custom taxonomy updated.', 'sample-plugin' ),
		4 => __( 'Custom taxonomy not added.', 'sample-plugin' ),
		5 => __( 'Custom taxonomy not updated.', 'sample-plugin' ),
		6 => __( 'Custom taxonomies deleted.', 'sample-plugin' ),
	);

	return $messages;
}
add_filter( 'term_updated_messages', 'custom_taxonomy_updated_messages' );
