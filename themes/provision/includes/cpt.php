<?php

/**
 * Functions for custom post types
 *
 * @link https://developer.wordpress.org/themes/basics/post-types/
 *
 * @package Redica
 * @since 1.0.0
 */

/**
 * Register a custom post type called "Reviews".
 *
 * @see get_post_type_labels() for label keys.
 */
function theme_register_cpt_reviews() {
    $labels = array(
        'name' => _x('Reviews', 'Post type general name', 'provision_td'),
        'singular_name' => _x('Review', 'Post type singular name', 'provision_td'),
        'menu_name' => _x('Reviews', 'Admin Menu text', 'provision_td'),
        'name_admin_bar' => _x('Review', 'Add New on Toolbar', 'provision_td'),
        'add_new' => __('Add New', 'provision_td'),
        'add_new_item' => __('Add New Review', 'provision_td'),
        'new_item' => __('New Review', 'provision_td'),
        'edit_item' => __('Edit Review', 'provision_td'),
        'view_item' => __('View Review', 'provision_td'),
        'all_items' => __('All Reviews', 'provision_td'),
        'search_items' => __('Search Reviews', 'provision_td'),
        'parent_item_colon' => __('Parent Reviews:', 'provision_td'),
        'not_found' => __('No reviews found.', 'provision_td'),
        'not_found_in_trash' => __('No reviews found in Trash.', 'provision_td'),
        'featured_image' => _x('Company Image', 'Overrides the “Featured Image�? phrase.', 'provision_td'),
        'set_featured_image' => _x('Set company image', 'Overrides the “Set featured image�? phrase.', 'provision_td'),
        'remove_featured_image' => _x('Remove review image', 'Overrides the “Remove featured image�? phrase.', 'provision_td'),
        'use_featured_image' => _x('Use as review image', 'Overrides the “Use as featured image�? phrase.', 'provision_td'),
        'archives' => _x('Review archives', 'The post type archive label used in nav menus.', 'provision_td'),
        'insert_into_item' => _x('Insert into review', 'Overrides the “Insert into post�? phrase.', 'provision_td'),
        'uploaded_to_this_item' => _x('Uploaded to this review', 'Overrides the “Uploaded to this post�? phrase.', 'provision_td'),
        'filter_items_list' => _x('Filter reviews list', 'Screen reader text for the filter links.', 'provision_td'),
        'items_list_navigation' => _x('Reviews list navigation', 'Screen reader text for the pagination.', 'provision_td'),
        'items_list' => _x('Reviews list', 'Screen reader text for the items list.', 'provision_td'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'reviews',
            'with_front' => 1,
        ),
        'has_archive' => false,
        'hierarchical' => true,
        'menu_position' => null,
        'menu_icon' => 'dashicons-smiley',
        'map_meta_cap' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
    );

    register_post_type('reviews', $args);
}

add_action('init', 'theme_register_cpt_reviews');

/**
 * Register a custom post type called "Team".
 *
 * @see get_post_type_labels() for label keys.
 */
function theme_register_cpt_team() {
    $labels = array(
        'name' => _x('Team Members', 'Post type general name', 'provision_td'),
        'singular_name' => _x('Team Member', 'Post type singular name', 'provision_td'),
        'menu_name' => _x('Team Members', 'Admin Menu text', 'provision_td'),
        'name_admin_bar' => _x('Team Members', 'Add New on Toolbar', 'provision_td'),
        'add_new' => __('Add New', 'provision_td'),
        'add_new_item' => __('Add New Team Member', 'provision_td'),
        'new_item' => __('New Team Member', 'provision_td'),
        'edit_item' => __('Edit Team Member', 'provision_td'),
        'view_item' => __('View Team Member', 'provision_td'),
        'all_items' => __('All Team Members', 'provision_td'),
        'search_items' => __('Search Team Members', 'provision_td'),
        'parent_item_colon' => __('Parent Team Member:', 'provision_td'),
        'not_found' => __('No team member found.', 'provision_td'),
        'not_found_in_trash' => __('No team member found in Trash.', 'provision_td'),
        'featured_image' => _x('Team Member Image', 'Overrides the “Featured Image�? phrase.', 'provision_td'),
        'set_featured_image' => _x('Set team member image', 'Overrides the “Set featured image�? phrase.', 'provision_td'),
        'remove_featured_image' => _x('Remove team member image', 'Overrides the “Remove featured image�? phrase.', 'provision_td'),
        'use_featured_image' => _x('Use as team member image', 'Overrides the “Use as featured image�? phrase.', 'provision_td'),
        'archives' => _x('Team Member archives', 'The post type archive label used in nav menus.', 'provision_td'),
        'insert_into_item' => _x('Insert into team member', 'Overrides the “Insert into post�? phrase.', 'provision_td'),
        'uploaded_to_this_item' => _x('Uploaded to this team member', 'Overrides the “Uploaded to this post�? phrase.', 'provision_td'),
        'filter_items_list' => _x('Filter team members list', 'Screen reader text for the filter links.', 'provision_td'),
        'items_list_navigation' => _x('Team members list navigation', 'Screen reader text for the pagination.', 'provision_td'),
        'items_list' => _x('Team members list', 'Screen reader text for the items list.', 'provision_td'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'team',
            'with_front' => 1,
        ),
        'has_archive' => false,
        'hierarchical' => true,
        'menu_position' => null,
        'menu_icon' => 'dashicons-admin-users',
        'map_meta_cap' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
    );

    register_post_type('team', $args);
}

add_action('init', 'theme_register_cpt_team');

add_filter('enter_title_here', 'my_title_place_holder', 20, 2);

function my_title_place_holder($title, $post) {

    if ($post->post_type == 'team') {
        $my_title = "Add name here";
        return $my_title;
    }

    return $title;
}

/**
 * Register a custom post type called "Plans".
 *
 * @see get_post_type_labels() for label keys.
 */
function theme_register_cpt_plans() {
    $labels = array(
        'name' => _x('Plans', 'Post type general name', 'provision_td'),
        'singular_name' => _x('Plan', 'Post type singular name', 'provision_td'),
        'menu_name' => _x('Plans', 'Admin Menu text', 'provision_td'),
        'name_admin_bar' => _x('Plans', 'Add New on Toolbar', 'provision_td'),
        'add_new' => __('Add New', 'provision_td'),
        'add_new_item' => __('Add New Plan', 'provision_td'),
        'new_item' => __('New Plan', 'provision_td'),
        'edit_item' => __('Edit Plan', 'provision_td'),
        'view_item' => __('View Plan', 'provision_td'),
        'all_items' => __('All Plans', 'provision_td'),
        'search_items' => __('Search Plan', 'provision_td'),
        'parent_item_colon' => __('Parent Plan:', 'provision_td'),
        'not_found' => __('No Plan found.', 'provision_td'),
        'not_found_in_trash' => __('No Plan found in Trash.', 'provision_td'),
        'featured_image' => _x('Plan Image', 'Overrides the “Featured Image�? phrase.', 'provision_td'),
        'set_featured_image' => _x('Set Plan image', 'Overrides the “Set featured image�? phrase.', 'provision_td'),
        'remove_featured_image' => _x('Remove Plan image', 'Overrides the “Remove featured image�? phrase.', 'provision_td'),
        'use_featured_image' => _x('Use as Plan image', 'Overrides the “Use as featured image�? phrase.', 'provision_td'),
        'archives' => _x('Plan archives', 'The post type archive label used in nav menus.', 'provision_td'),
        'insert_into_item' => _x('Insert into Plan', 'Overrides the “Insert into post�? phrase.', 'provision_td'),
        'uploaded_to_this_item' => _x('Uploaded to this Plans', 'Overrides the “Uploaded to this post�? phrase.', 'provision_td'),
        'filter_items_list' => _x('Filter Plans list', 'Screen reader text for the filter links.', 'provision_td'),
        'items_list_navigation' => _x('Plans list navigation', 'Screen reader text for the pagination.', 'provision_td'),
        'items_list' => _x('Plans list', 'Screen reader text for the items list.', 'provision_td'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'plan',
            'with_front' => 1,
        ),
        'has_archive' => false,
        'hierarchical' => true,
        'menu_position' => null,
        'map_meta_cap' => true,
        'supports' => array('title', 'thumbnail','page-attributes'),
    );

    register_post_type('plans', $args);
}

add_action('init', 'theme_register_cpt_plans');

/**
 * Register a custom post type called "Utilities".
 *
 * @see get_post_type_labels() for label keys.
 */
function theme_register_cpt_utilities() {
    $labels = array(
        'name' => _x('Utilities', 'Post type general name', 'provision_td'),
        'singular_name' => _x('Utility', 'Post type singular name', 'provision_td'),
        'menu_name' => _x('Utilities', 'Admin Menu text', 'provision_td'),
        'name_admin_bar' => _x('Utilities', 'Add New on Toolbar', 'provision_td'),
        'add_new' => __('Add New', 'provision_td'),
        'add_new_item' => __('Add New Utility', 'provision_td'),
        'new_item' => __('New Utility', 'provision_td'),
        'edit_item' => __('Edit Utility', 'provision_td'),
        'view_item' => __('View Utility', 'provision_td'),
        'all_items' => __('All Utilities', 'provision_td'),
        'search_items' => __('Search Utility', 'provision_td'),
        'parent_item_colon' => __('Parent Utility:', 'provision_td'),
        'not_found' => __('No Plan found.', 'provision_td'),
        'not_found_in_trash' => __('No Utility found in Trash.', 'provision_td'),
        'featured_image' => _x('Utility Image', 'Overrides the “Featured Image�? phrase.', 'provision_td'),
        'set_featured_image' => _x('Set Utility image', 'Overrides the “Set featured image�? phrase.', 'provision_td'),
        'remove_featured_image' => _x('Remove Utility image', 'Overrides the “Remove featured image�? phrase.', 'provision_td'),
        'use_featured_image' => _x('Use as Utility image', 'Overrides the “Use as featured image�? phrase.', 'provision_td'),
        'archives' => _x('Utility archives', 'The post type archive label used in nav menus.', 'provision_td'),
        'insert_into_item' => _x('Insert into Utility', 'Overrides the “Insert into post�? phrase.', 'provision_td'),
        'uploaded_to_this_item' => _x('Uploaded to this Utilities', 'Overrides the “Uploaded to this post�? phrase.', 'provision_td'),
        'filter_items_list' => _x('Filter Utilities list', 'Screen reader text for the filter links.', 'provision_td'),
        'items_list_navigation' => _x('Utilities list navigation', 'Screen reader text for the pagination.', 'provision_td'),
        'items_list' => _x('Utilities list', 'Screen reader text for the items list.', 'provision_td'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'utility',
            'with_front' => 1,
        ),
        'has_archive' => false,
        'hierarchical' => true,
        'menu_position' => null,
        'map_meta_cap' => true,
        'supports' => array('title', 'thumbnail'),
    );

    register_post_type('utilities', $args);
}

add_action('init', 'theme_register_cpt_utilities');

function add_custom_taxonomy_type_cpt_utilities() {
    $labels = array(
        'name' => _x('Types', 'taxonomy general name'),
        'singular_name' => _x('Type', 'taxonomy singular name'),
        'search_items' => __('Search Types'),
        'popular_items' => __('Popular Types'),
        'all_items' => __('All Types'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Edit Type'),
        'update_item' => __('Update Type'),
        'add_new_item' => __('Add New Type'),
        'new_item_name' => __('New Type'),
        'separate_items_with_commas' => __('Separate Type with commas'),
        'add_or_remove_items' => __('Add or remove Type'),
        'choose_from_most_used' => __('Choose from the most used Type'),
        'menu_name' => __('Types'),
    );

// Now register the non-hierarchical taxonomy like tag

    register_taxonomy('type', 'utilities', array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array('slug' => 'type'),
    ));
}

add_action('init', 'add_custom_taxonomy_type_cpt_utilities', 0);


/**
 * Register a custom post type called "Partners".
 *
 * @see get_post_type_labels() for label keys.
 */
function theme_register_cpt_testimonials() {
	$cpt_singular_caps = 'Partner';
	$cpt_multiple_caps = 'Partners';
	$cpt_singular_small = 'partner';
	$cpt_multiple_small = 'partners';
	$labels = array(
		'name'                  => _x( $cpt_multiple_caps, 'Post type general name', 'provision_td' ),
		'singular_name'         => _x( $cpt_singular_caps, 'Post type singular name', 'provision_td' ),
		'menu_name'             => _x( $cpt_multiple_caps, 'Admin Menu text', 'provision_td' ),
		'name_admin_bar'        => _x( $cpt_singular_caps, 'Add New on Toolbar', 'provision_td' ),
		'add_new'               => __( 'Add New', 'provision_td' ),
		'add_new_item'          => __( 'Add New '.$cpt_singular_caps, 'provision_td' ),
		'new_item'              => __( 'New '.$cpt_singular_caps, 'provision_td' ),
		'edit_item'             => __( 'Edit '.$cpt_singular_caps, 'provision_td' ),
		'view_item'             => __( 'View '.$cpt_singular_caps, 'provision_td' ),
		'all_items'             => __( 'All '.$cpt_multiple_caps, 'provision_td' ),
		'search_items'          => __( 'Search '.$cpt_multiple_caps, 'provision_td' ),
		'parent_item_colon'     => __( 'Parent :'.$cpt_multiple_caps, 'provision_td' ),
		'not_found'             => __( 'No '.$cpt_multiple_small.' found.', 'provision_td' ),
		'not_found_in_trash'    => __( 'No '.$cpt_multiple_small.' found in Trash.', 'provision_td' ),
		'featured_image'        => _x( 'Thumbnail Image', 'Overrides the “Featured Image�? phrase.', 'provision_td' ),
		'set_featured_image'    => _x( 'Set thumbnail image', 'Overrides the “Set featured image�? phrase.', 'provision_td' ),
		'remove_featured_image' => _x( 'Remove '. $cpt_singular_small . ' image', 'Overrides the “Remove featured image�? phrase.', 'provision_td' ),
		'use_featured_image'    => _x( 'Use as '.$cpt_singular_small.' image', 'Overrides the “Use as featured image�? phrase.', 'provision_td' ),
		'archives'              => _x( $cpt_singular_caps . ' archives', 'The post type archive label used in nav menus.', 'provision_td' ),
		'insert_into_item'      => _x( 'Insert into '.$cpt_singular_small, 'Overrides the “Insert into post�? phrase.', 'provision_td' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this '.$cpt_singular_small, 'Overrides the “Uploaded to this post�? phrase.', 'provision_td' ),
		'filter_items_list'     => _x( 'Filter '.$cpt_multiple_small.' list', 'Screen reader text for the filter links.', 'provision_td' ),
		'items_list_navigation' => _x( $cpt_multiple_caps . ' list navigation', 'Screen reader text for the pagination.', 'provision_td' ),
		'items_list'            => _x( $cpt_multiple_caps . ' list', 'Screen reader text for the items list.', 'provision_td' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array(
			'slug'       => $cpt_multiple_small,
			'with_front' => 1,
		),
		'has_archive'        => false,
		'hierarchical'       => true,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-networking',
		'map_meta_cap'       => true,
		'show_in_rest' => true,
		'exclude_from_search' => true,
		'supports'           => array( 'title', 'author', 'thumbnail'),
	);

	register_post_type( $cpt_multiple_small, $args );
}

add_action( 'init', 'theme_register_cpt_testimonials' );

function theme_register_cpt_faqs() {
    $labels = array(
        'name' => _x('FAQs', 'Post type general name', 'provision_td'),
        'singular_name' => _x('FAQ', 'Post type singular name', 'provision_td'),
        'menu_name' => _x('FAQs', 'Admin Menu text', 'provision_td'),
        'name_admin_bar' => _x('FAQs', 'Add New on Toolbar', 'provision_td'),
        'add_new' => __('Add New', 'provision_td'),
        'add_new_item' => __('Add New FAQ', 'provision_td'),
        'new_item' => __('New FAQ', 'provision_td'),
        'edit_item' => __('Edit FAQ', 'provision_td'),
        'view_item' => __('View FAQ', 'provision_td'),
        'all_items' => __('All FAQs', 'provision_td'),
        'search_items' => __('Search FAQ', 'provision_td'),
        'parent_item_colon' => __('Parent FAQ:', 'provision_td'),
        'not_found' => __('No FAQ found.', 'provision_td'),
        'not_found_in_trash' => __('No FAQ found in Trash.', 'provision_td'),
        'featured_image' => _x('FAQ Image', 'Overrides the “Featured Image�? phrase.', 'provision_td'),
        'set_featured_image' => _x('Set FAQ image', 'Overrides the “Set featured image�? phrase.', 'provision_td'),
        'remove_featured_image' => _x('Remove FAQ image', 'Overrides the “Remove featured image�? phrase.', 'provision_td'),
        'use_featured_image' => _x('Use as FAQ image', 'Overrides the “Use as featured image�? phrase.', 'provision_td'),
        'archives' => _x('FAQ archives', 'The post type archive label used in nav menus.', 'provision_td'),
        'insert_into_item' => _x('Insert into FAQ', 'Overrides the “Insert into post�? phrase.', 'provision_td'),
        'uploaded_to_this_item' => _x('Uploaded to this FAQs', 'Overrides the “Uploaded to this post�? phrase.', 'provision_td'),
        'filter_items_list' => _x('Filter FAQs list', 'Screen reader text for the filter links.', 'provision_td'),
        'items_list_navigation' => _x('FAQs list navigation', 'Screen reader text for the pagination.', 'provision_td'),
        'items_list' => _x('FAQs list', 'Screen reader text for the items list.', 'provision_td'),
    );

   

    $label = array(
        'name' => _x('FAQ Categories', 'taxonomy general name'),
        'singular_name' => _x('categories', 'taxonomy singular name'),
        'search_items' => __('Search FAQ Categories'),
        'popular_items' => __('Popular FAQ Categories'),
        'all_items' => __('All FAQ Categories'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Edit FAQ Category'),
        'update_item' => __('Update FAQ Category'),
        'add_new_item' => __('Add New FAQ Category'),
        'new_item_name' => __('New FAQ Category'),
        'separate_items_with_commas' => __('Separate FAQ Category with commas'),
        'add_or_remove_items' => __('Add or remove FAQ Category'),
        'choose_from_most_used' => __('Choose from the most used FAQ Category'),
        'menu_name' => __('FAQ Category'),
    );
    register_taxonomy('categories', 'faqs', array( 
            'hierarchical'  => true, 
            'labels' => $label, 
            'show_ui' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
            'update_count_callback' => '_update_post_term_count',
          //  'singular_name' => __( 'categories', 'taxonomy general name' ), 
            'rewrite'       => true, 
            'query_var'     => true 
        ));
    
    

     $labels_tag = array(
        'name' => _x('Tags', 'taxonomy general name'),
        'singular_name' => _x('Tag', 'taxonomy singular name'),
        'search_items' => __('Search Tags'),
        'popular_items' => __('Popular Tags'),
        'all_items' => __('All Tags'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Edit Tag'),
        'update_item' => __('Update Tag'),
        'add_new_item' => __('Add New Tag'),
        'new_item_name' => __('New Tag'),
        'separate_items_with_commas' => __('Separate Tag with commas'),
        'add_or_remove_items' => __('Add or remove Tag'),
        'choose_from_most_used' => __('Choose from the most used Tag'),
        'menu_name' => __('Tags'),
    );

// Now register the non-hierarchical taxonomy like tag

    register_taxonomy('tags', 'faqs', array(
        'hierarchical' => true,
        'labels' => $labels_tag,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array('slug' => 'tags'),
    ));


    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'faqs',
            'with_front' => 1,
        ),
        'has_archive' => false,
        'hierarchical' => true,
        'menu_position' => null,
        'map_meta_cap' => true,
        'supports' => array('title','editor'),
    );

    register_post_type('faqs', $args);
    
}

add_action('init', 'theme_register_cpt_faqs');

/*
 * add metabox for utilities to list zipcode & states
 */
add_action("add_meta_boxes", "add_zipcode_utility_meta_box");
function add_zipcode_utility_meta_box() {
    add_meta_box("zipcode-utility-meta-box", "Zipcode List", "zipcode_utility_meta_box_markup", "utilities", "normal", "default", null);
}
function zipcode_utility_meta_box_markup($post){
    global $wpdb;
    $zipquery = "SELECT * FROM wp_utility_post_data WHERE post_id = '".$post->ID."' ORDER BY zipcode ASC";
    $zipcodeArr = $wpdb->get_results($zipquery, ARRAY_A);
        
    ?>
        <table style="width:100%">
            <tr>
              <th>zipcode</th>
              <th>city</th>
              <th>municipal</th>
              <th>county</th>
              <th>state</th>
              <th>brand</th>
              <th>sub_territory</th>
            </tr>
            <?php 
            foreach($zipcodeArr as $row){
                echo '<tr>';
                    echo '<td>'.$row['zipcode'].'</td>';
                    echo '<td>'.$row['city'].'</td>';
                    echo '<td>'.$row['municipal'].'</td>';
                    echo '<td>'.$row['county'].'</td>';
                    echo '<td>'.$row['state'].'</td>';
                    echo '<td>'.$row['brand'].'</td>';
                    echo '<td>'.$row['sub_territory'].'</td>';
                echo '</tr>';
            }
            ?>
            
        </table>

    <?php
    
}
