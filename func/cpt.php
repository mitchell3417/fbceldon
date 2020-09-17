<?php

//Load Products
// load_cpts('product');

//Load Products
// load_cpts('video');

//Load CPTs
function load_cpts($type){
    include LIBRARY_DIR . 'cpt/' . $type . '.php';
}
