<?php

// Programs Custom Post Type
function register_sermons_post_type() {
  $labels = array(
    'name'               => 'Sermons',
    'singular_name'      => 'Sermon',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New Sermon',
    'edit_item'          => 'Edit Sermon',
    'new_item'           => 'New Sermon',
    'view_item'          => 'View Sermon',
    'search_items'       => 'Search Sermons',
    'not_found'          => 'No Sermons found',
    'not_found_in_trash' => 'No Sermons found in trash',
    'parent_item_colon'  => '',
    'menu_name'          => 'Sermons'
  );

  $args = array(
    'labels'             => $labels,
    'taxonomies'         => array('series', 'speaker'),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => true,
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => true,
    'menu_position'      => 7,
    'menu_icon'          => 'dashicons-book',
    'supports'           => array( 'title', 'page-attributes', 'custom-fields' ),
    'rewrite'            => array( 'slug' => 'sermons/library' ),
  );

  register_post_type( 'sermons', $args );
  flush_rewrite_rules();
}
add_action( 'init', 'register_sermons_post_type' );

//POSTS PER PAGE FOR SERMONS
function wpd_testimonials_query( $query ){
    if( ! is_admin()
        && $query->is_post_type_archive( 'sermons' )
        && $query->is_main_query() ){
            $query->set( 'posts_per_page', 12 );
    }
}
add_action( 'pre_get_posts', 'wpd_testimonials_query' );
