<?php
/**
 * Registers the `post_type` post type.
 *
 * @package PluginPackage
 */

/**
 * Registers the `post_type` post type.
 */
function post_type_init() {
	register_post_type(
		'post-type',
		array(
			'labels'                => array(
				'name'                  => __( 'Post types', 'sample-plugin' ),
				'singular_name'         => __( 'Post type', 'sample-plugin' ),
				'all_items'             => __( 'All Post types', 'sample-plugin' ),
				'archives'              => __( 'Post type Archives', 'sample-plugin' ),
				'attributes'            => __( 'Post type Attributes', 'sample-plugin' ),
				'insert_into_item'      => __( 'Insert into post type', 'sample-plugin' ),
				'uploaded_to_this_item' => __( 'Uploaded to this post type', 'sample-plugin' ),
				'featured_image'        => _x( 'Featured Image', 'post-type', 'sample-plugin' ),
				'set_featured_image'    => _x( 'Set featured image', 'post-type', 'sample-plugin' ),
				'remove_featured_image' => _x( 'Remove featured image', 'post-type', 'sample-plugin' ),
				'use_featured_image'    => _x( 'Use as featured image', 'post-type', 'sample-plugin' ),
				'filter_items_list'     => __( 'Filter post types list', 'sample-plugin' ),
				'items_list_navigation' => __( 'Post types list navigation', 'sample-plugin' ),
				'items_list'            => __( 'Post types list', 'sample-plugin' ),
				'new_item'              => __( 'New Post type', 'sample-plugin' ),
				'add_new'               => __( 'Add New', 'sample-plugin' ),
				'add_new_item'          => __( 'Add New Post type', 'sample-plugin' ),
				'edit_item'             => __( 'Edit Post type', 'sample-plugin' ),
				'view_item'             => __( 'View Post type', 'sample-plugin' ),
				'view_items'            => __( 'View Post types', 'sample-plugin' ),
				'search_items'          => __( 'Search post types', 'sample-plugin' ),
				'not_found'             => __( 'No post types found', 'sample-plugin' ),
				'not_found_in_trash'    => __( 'No post types found in trash', 'sample-plugin' ),
				'parent_item_colon'     => __( 'Parent Post type:', 'sample-plugin' ),
				'menu_name'             => __( 'Post types', 'sample-plugin' ),
			),
			'public'                => true,
			'hierarchical'          => false,
			'show_ui'               => true,
			'show_in_nav_menus'     => true,
			'supports'              => array( 'title', 'editor' ),
			'has_archive'           => true,
			'rewrite'               => true,
			'query_var'             => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-admin-post',
			'show_in_rest'          => true,
			'rest_base'             => 'post-type',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		)
	);

}
add_action( 'init', 'post_type_init' );

/**
 * Sets the post updated messages for the `post_type` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `post_type` post type.
 */
function post_type_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['post-type'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Post type updated. <a target="_blank" href="%s">View post type</a>', 'sample-plugin' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'sample-plugin' ),
		3  => __( 'Custom field deleted.', 'sample-plugin' ),
		4  => __( 'Post type updated.', 'sample-plugin' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Post type restored to revision from %s', 'sample-plugin' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Post type published. <a href="%s">View post type</a>', 'sample-plugin' ), esc_url( $permalink ) ),
		7  => __( 'Post type saved.', 'sample-plugin' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Post type submitted. <a target="_blank" href="%s">Preview post type</a>', 'sample-plugin' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9  => sprintf(
			/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
			__( 'Post type scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview post type</a>', 'sample-plugin' ),
			date_i18n(
				__( 'M j, Y @ G:i', 'sample-plugin' ),
				strtotime( $post->post_date )
			),
			esc_url( $permalink )
		),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Post type draft updated. <a target="_blank" href="%s">Preview post type</a>', 'sample-plugin' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'post_type_updated_messages' );
