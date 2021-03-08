<?php

/**
 * Plugin Name:       Manually Custom Page Type
 * Plugin URI:        https://sakibmd.xyz/
 * Description:       My first manually custom post type
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Sakib Mohammed
 * Author URI:        https://sakibmd.xyz/
 * License:           GPL v2 or later
 * License URI:
 * Text Domain:       our_first_cpt
 * Domain Path:       /languages
 */

// Register Custom Post Type Book
function create_book_cpt()
{

    $labels = array(
        'name' => _x('Books', 'Post Type General Name', 'our_first_cpt'),
        'singular_name' => _x('Book', 'Post Type Singular Name', 'our_first_cpt'),
        'menu_name' => _x('Books', 'Admin Menu text', 'our_first_cpt'),
        'name_admin_bar' => _x('Book', 'Add New on Toolbar', 'our_first_cpt'),
        'archives' => __('Book Archives', 'our_first_cpt'),
        'attributes' => __('Book Attributes', 'our_first_cpt'),
        'parent_item_colon' => __('Parent Book:', 'our_first_cpt'),
        'all_items' => __('All Books', 'our_first_cpt'),
        'add_new_item' => __('Add New Book', 'our_first_cpt'),
        'add_new' => __('Add New', 'our_first_cpt'),
        'new_item' => __('New Book', 'our_first_cpt'),
        'edit_item' => __('Edit Book', 'our_first_cpt'),
        'update_item' => __('Update Book', 'our_first_cpt'),
        'view_item' => __('View Book', 'our_first_cpt'),
        'view_items' => __('View Books', 'our_first_cpt'),
        'search_items' => __('Search Book', 'our_first_cpt'),
        'not_found' => __('Not found', 'our_first_cpt'),
        'not_found_in_trash' => __('Not found in Trash', 'our_first_cpt'),
        'featured_image' => __('Featured Image', 'our_first_cpt'),
        'set_featured_image' => __('Set featured image', 'our_first_cpt'),
        'remove_featured_image' => __('Remove featured image', 'our_first_cpt'),
        'use_featured_image' => __('Use as featured image', 'our_first_cpt'),
        'insert_into_item' => __('Insert into Book', 'our_first_cpt'),
        'uploaded_to_this_item' => __('Uploaded to this Book', 'our_first_cpt'),
        'items_list' => __('Books list', 'our_first_cpt'),
        'items_list_navigation' => __('Books list navigation', 'our_first_cpt'),
        'filter_items_list' => __('Filter Books list', 'our_first_cpt'),
    );
    $args = array(
        'label' => __('Book', 'our_first_cpt'),
        'description' => __('', 'our_first_cpt'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-admin-page',
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes'),
        'taxonomies' => array(),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => "books",
        'hierarchical' => true,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => array(
            'with_front' => false,
        )
    );
    register_post_type('book', $args);

}
add_action('init', 'create_book_cpt', 0);
