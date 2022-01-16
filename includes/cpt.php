<?php

	class theoriemakkie_custom_post_type {
		
		function __construct() {
            add_action('init', array(&$this, 'create_coursedate_cpt'));
            add_action('init', array(&$this, 'coursedate_taxonomy_location'), 0);
            add_action('init', array(&$this, 'coursedate_taxonomy_week'), 0);

        }
        // coursedate Post type
        function create_coursedate_cpt() {
            $labels = array(
                'name' => __('Course Date', 'theoriemakkie'),
                'singular_name' => __('Course Date', 'theoriemakkie'),
                'add_new' => __('Add coursedate', 'theoriemakkie'),
                'add_new_item' => __('Add coursedate', 'theoriemakkie'),
                'edit_item' => __('Edit coursedate', 'theoriemakkie'),
                'new_item' => __('New coursedate', 'theoriemakkie'),
                'all_items' => __('All coursedate', 'theoriemakkie'),
                'view_item' => __('View coursedate', 'theoriemakkie'),
                'search_items' => __('Search coursedate', 'theoriemakkie'),
                'not_found' => __('No coursedate found', 'theoriemakkie'),
                'not_found_in_trash' => __('No portfolio found in the trash', 'theoriemakkie'),
                'parent_item_colon' => '',
                'supports' => array('post-formats'),
                'menu_name' => __('Course Dates', 'theoriemakkie')
            );
            $args = array(
                'labels' => $labels,
                'public' => true,
                'menu_position' => 5,
                'menu_icon' => 'dashicons-megaphone',
                'taxonomies' => array('coursedate_cat'),
                'supports' => array('title', 'editor', 'thumbnail', 'excerpt','elementor'),
                'has_archive' => true,
            );
            register_post_type('coursedate', $args);
        }

        function coursedate_taxonomy_location() {
            $labels = array(
                'name' => __('Location', 'theoriemakkie'),
                'singular_name' => __('Location', 'theoriemakkie'),
                'search_items' => __('Search Locations', 'theoriemakkie'),
                'all_items' => __('Locations', 'theoriemakkie'),
                'parent_item' => __('Parent Location', 'theoriemakkie'),
                'parent_item_colon' => __('Parent Location:', 'theoriemakkie'),
                'edit_item' => __('Edit Location', 'theoriemakkie'),
                'update_item' => __('Update Location', 'theoriemakkie'),
                'add_new_item' => __('Add Location', 'theoriemakkie'),
                'new_item_name' => __('New Location', 'theoriemakkie'),
                'menu_name' => __('Locations', 'theoriemakkie'),
            );
            $args = array(
                'labels' => $labels,
                'hierarchical' => true,
                'show_ui' => true,
                'show_admin_column' => true,
                'rewrite' => array('slug' => 'locations'),
            );
            register_taxonomy('locations', 'coursedate', $args);
        }

        function coursedate_taxonomy_week() {
            $labels = array(
                'name' => __('Week', 'theoriemakkie'),
                'singular_name' => __('Week', 'theoriemakkie'),
                'search_items' => __('Search Weeks', 'theoriemakkie'),
                'all_items' => __('Weeks', 'theoriemakkie'),
                'parent_item' => __('Parent Week', 'theoriemakkie'),
                'parent_item_colon' => __('Parent Week:', 'theoriemakkie'),
                'edit_item' => __('Edit Week', 'theoriemakkie'),
                'update_item' => __('Update Week', 'theoriemakkie'),
                'add_new_item' => __('Add Week', 'theoriemakkie'),
                'new_item_name' => __('New Week', 'theoriemakkie'),
                'menu_name' => __('Weeks', 'theoriemakkie'),
            );
            $args = array(
                'labels' => $labels,
                'hierarchical' => true,
                'show_ui' => true,
                'show_admin_column' => true,
                'rewrite' => array('slug' => 'weeks'),
            );
            register_taxonomy('week', 'coursedate', $args);
        }

	}  

    new theoriemakkie_custom_post_type();

