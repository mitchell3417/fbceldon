<?php

  //Enqueue Needed JS and CSS files
  add_action('wp_enqueue_scripts', 'load_global_scripts');
  function load_global_scripts(){

    /****** CSS Files *******/
    wp_enqueue_style('main', get_stylesheet_uri() );

    /****** JS Files *******/
    wp_enqueue_script('jquery');
    // Load scripts
    wp_enqueue_script( 'theme-plugins', get_template_directory_uri() . '/js/plugins-min.js', array(), '20171017', true );
    wp_enqueue_script( 'theme-main', get_template_directory_uri() . '/js/main-min.js', array('jquery'), '20171102c', true );

    //Navigation JS
    wp_enqueue_script( 'nav-script', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20160816', true );

    // Needed for mobile menu via twentysixteen
    wp_localize_script( 'nav-script', 'screenReaderText', array(
        'expand'   => __( 'expand child menu', 'wilett-mayberry' ),
        'collapse' => __( 'collapse child menu', 'wilett-mayberry' ),
  ) );
}
