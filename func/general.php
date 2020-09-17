<?php
// Let WordPress manage the document title.
add_theme_support( 'title-tag' );

// Add theme support for custom logo.
function theme_prefix_setup() {
	add_theme_support( 'custom-logo', array(
    'width'       => 320,
    'height'      => 32,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
	) );
}
add_action( 'after_setup_theme', 'theme_prefix_setup' );

// Add theme support for featured images
add_theme_support( 'post-thumbnails' );

// Register custom menus.
function register_my_menus( $args = array( 'container' => 'ul' ) ) {
    register_nav_menus(
    array(
        'header-menu' => __( 'Header Menu' ),
        'footer-menu' => __( 'Footer Menu' ),
    )
    );
}
add_action( 'init', 'register_my_menus' );

// Adding Dashicons in WordPress Front-end
add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );
function load_dashicons_front_end() {
  wp_enqueue_style( 'dashicons' );
}
