<?php

//Library constant
define('LIBRARY_DIR', get_stylesheet_directory() . '/func/');

//Assets url
define('ASSETS_URL', get_stylesheet_directory_uri() );

//Images url
define('IMAGES_URL', ASSETS_URL . '/images/');

//CSS url
define('CSS_URL', ASSETS_URL . '/css/');

//JS url
define('JS_URL', ASSETS_URL . '/js/');


//Create a library loader function. Loads files with just the filename from library directory.
if(!function_exists('load_library')){
    function load_library($filename){
        include(LIBRARY_DIR . $filename . '.php');
  }
}
