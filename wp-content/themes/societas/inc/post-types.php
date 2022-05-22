<?php
// Register Custom Post Type: Services
function societas_services_post_type() {

	$labels = array(
		'name'                  => _x( 'Service', 'Post Type General Name', 'societas' ),
		'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'societas' ),
		'menu_name'             => __( 'Services', 'societas' ),
		'name_admin_bar'        => __( 'Service', 'societas' ),
		'archives'              => __( 'Service Archives', 'societas' ),
		'attributes'            => __( 'Service Attributes', 'societas' ),
		'parent_item_colon'     => __( 'Parent Item:', 'societas' ),
		'all_items'             => __( 'All Services', 'societas' ),
		'add_new_item'          => __( 'Add New Service', 'societas' ),
		'add_new'               => __( 'Add New', 'societas' ),
		'new_item'              => __( 'New Service', 'societas' ),
		'edit_item'             => __( 'Edit Service', 'societas' ),
		'update_item'           => __( 'Update Service', 'societas' ),
		'view_item'             => __( 'View ItServicem', 'societas' ),
		'view_items'            => __( 'View Services', 'societas' ),
		'search_items'          => __( 'Search Service', 'societas' ),
		'not_found'             => __( 'Not found', 'societas' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'societas' ),
		'featured_image'        => __( 'Featured Image', 'societas' ),
		'set_featured_image'    => __( 'Set featured image', 'societas' ),
		'remove_featured_image' => __( 'Remove featured image', 'societas' ),
		'use_featured_image'    => __( 'Use as featured image', 'societas' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Service', 'societas' ),
		'items_list'            => __( 'Services list', 'societas' ),
		'items_list_navigation' => __( 'Services list navigation', 'societas' ),
		'filter_items_list'     => __( 'Filter services list', 'societas' ),
	);
	$args   = array(
		'label'               => __( 'Service', 'societas' ),
		'description'         => __( 'Services post type | Created with Societas Block Theme', 'societas' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt'  ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-align-pull-left',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest'        => true,
		'rest_base'           => 'services',
	);
	register_post_type( 'services', $args );

}

add_action( 'init', 'societas_services_post_type', 0 );

// Register Custom Post Type: Team
function societas_team_post_type() {

	$labels = array(
		'name'                  => _x( 'Team', 'Post Type General Name', 'societas' ),
		'singular_name'         => _x( 'Team', 'Post Type Singular Name', 'societas' ),
		'menu_name'             => __( 'Team', 'societas' ),
		'name_admin_bar'        => __( 'Team', 'societas' ),
		'archives'              => __( 'Team Archives', 'societas' ),
		'attributes'            => __( 'Team Attributes', 'societas' ),
		'parent_item_colon'     => __( 'Parent Item:', 'societas' ),
		'all_items'             => __( 'All Team', 'societas' ),
		'add_new_item'          => __( 'Add New Team', 'societas' ),
		'add_new'               => __( 'Add New', 'societas' ),
		'new_item'              => __( 'New Team', 'societas' ),
		'edit_item'             => __( 'Edit Team', 'societas' ),
		'update_item'           => __( 'Update Team', 'societas' ),
		'view_item'             => __( 'View ItTeamm', 'societas' ),
		'view_items'            => __( 'View Team', 'societas' ),
		'search_items'          => __( 'Search Team', 'societas' ),
		'not_found'             => __( 'Not found', 'societas' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'societas' ),
		'featured_image'        => __( 'Featured Image', 'societas' ),
		'set_featured_image'    => __( 'Set featured image', 'societas' ),
		'remove_featured_image' => __( 'Remove featured image', 'societas' ),
		'use_featured_image'    => __( 'Use as featured image', 'societas' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Team', 'societas' ),
		'items_list'            => __( 'Team list', 'societas' ),
		'items_list_navigation' => __( 'Team list navigation', 'societas' ),
		'filter_items_list'     => __( 'Filter team list', 'societas' ),
	);
	$args   = array(
		'label'               => __( 'Team', 'societas' ),
		'description'         => __( 'Team post type | Created with Societas Block Theme', 'societas' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 6,
		'menu_icon'           => 'dashicons-buddicons-buddypress-logo',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest'        => true,
		'rest_base'           => 'team',
	);
	register_post_type( 'team', $args );

}

add_action( 'init', 'societas_team_post_type', 0 );