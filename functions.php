<?php
// Include the constant variables.
include( get_template_directory() . '/func/constants.php');

// Include the form php
load_library('form');

//Load enqueue scripts.
load_library('enqueue-scripts');

//Load custom post types.
load_library('cpt');

//Load metabox.io
load_library('metaboxes');

//Load general functions
load_library('general');

//Load CPTs
load_library('post-types');

//Load video thumbnails
load_library('get-video-thumbnail');
