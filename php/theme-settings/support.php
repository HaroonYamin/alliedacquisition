<?php
/**
 * WordPress Support Functions
 * 
 * Enables the following WordPress features
 * with proper configuration
 *
 * @package Allied Acquisition
 * @version 1.0.0
 */

/*
 * WordPress Active Support
 */
function wordpress_active() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'custom-logo' );
	register_nav_menus(
		array(
			'main-menu' => esc_html__( 'Main Menu', 'main' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'footer' ),
			'footer-menu-2' => esc_html__( 'Footer Menu 2', 'footer' ),
        )
	);
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}
add_action( 'after_setup_theme', 'wordpress_active' );

/*
 * Allow SVG upload
 */
function svg_upload( $mime_types ) {
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}
add_filter( 'upload_mimes', 'svg_upload' );


/*
 * Add custom column to Media Library for PDFs
 */
add_filter('attachment_fields_to_edit', 'show_pdf_server_path_in_modal', 10, 2);
function show_pdf_server_path_in_modal($form_fields, $post) {
    // Only run for PDFs
    if (get_post_mime_type($post) === 'application/pdf') {
        $absolute_path = get_attached_file($post->ID);

        $form_fields['cf7_file_path'] = array(
            'label' => 'CF7 Mail Attachment Path',
            'input' => 'html',
            'html'  => '<code style="font-size:11px;display:block;word-break:break-all;">' . esc_html($absolute_path) . '</code><small>Copy this for Contact Form 7 attachments.</small>',
        );
    }

    return $form_fields;
}
