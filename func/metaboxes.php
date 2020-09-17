<?php
function fbceldon_get_meta_box( $meta_boxes ) {
	$prefix = 'fbc_';

    /***************************************
    THEME OPTIONS METABOXES metabox.io plugin
    ***************************************/
    $meta_boxes[] = array(
        'id'             => 'general',
        'title'          => 'General',
        'settings_pages' => 'fbc-options',
        'fields'         => array(
            array(
                'name' => 'Header Logo',
                'id'   => $prefix . 'header_logo',
                'type' => 'image_advanced',
                'desc' => 'The logo in the upper left corner of the page. Maximum height is 80 pixels.',
                'max_file_uploads' => '1',

            ),
            array(
				'id'   => $prefix . 'default_banner_img',
				'type' => 'image_advanced',
				'name' => 'Page Banner Image',
				'desc' => 'This will appear on the banner of every page that does not have an image selected.',
				'max_file_uploads' => '1',
			),
        ),
    );

    /***************************************
    PAGE METABOXES metabox.io plugin
    ***************************************/
	$meta_boxes[] = array(
		'id' => 'page_options',
		'title' => esc_html__( 'Page Options', 'fbceldon' ),
		'post_types' => array( 'page' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'page_banner_img',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Page Banner Image', 'fbceldon' ),
				'desc' => esc_html__( 'Upload the image that will appear in the background of the header.', 'fbceldon' ),
				'max_file_uploads' => '1',
			),
		),
	);



	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'fbceldon_get_meta_box' );


/***************************************
ADD THEME OPTIONS PAGE TO ADMIN AREA metabox.io plugin
***************************************/
add_filter( 'mb_settings_pages', 'fbc_options_page' );
function fbc_options_page( $settings_pages ) {
    $settings_pages[] = array(
        'id'            => 'fbc-options',
        'option_name'   => 'fbc_options',
        'menu_title'    => 'FBC Options',
        'position'      => 25,
        'submenu_title' => 'General',
    );

    return $settings_pages;
}
