<?php
function header_customization( $wp_customize ) {

    $wp_customize->add_section( 'header_button_section', array(
        'title'    => __( 'Header Button', 'zbcouture' ),
        'priority' => 30,
    ) );

    // Button Text
    $wp_customize->add_setting( 'header_button_text', array(
        'default'   => 'Contact Us',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'header_button_text', array(
        'label'    => __( 'Button Text', 'zbcouture' ),
        'section'  => 'header_button_section',
        'type'     => 'text',
    ) );

    // Button URL
    $wp_customize->add_setting( 'header_button_url', array(
        'default'   => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'header_button_url', array(
        'label'    => __( 'Button URL', 'zbcouture' ),
        'section'  => 'header_button_section',
        'type'     => 'url',
    ) );

    // Optional: Show/Hide Toggle
    $wp_customize->add_setting( 'header_button_visibility', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ) );

    $wp_customize->add_control( 'header_button_visibility', array(
        'label'    => __( 'Show Header Button', 'zbcouture' ),
        'section'  => 'header_button_section',
        'type'     => 'checkbox',
    ) );

     // Button Text
    $wp_customize->add_setting( 'header_button_text_2', array(
        'default'   => 'Contact Us',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'header_button_text_2', array(
        'label'    => __( 'Button Text', 'zbcouture' ),
        'section'  => 'header_button_section',
        'type'     => 'text',
    ) );

    // Button URL
    $wp_customize->add_setting( 'header_button_url_2', array(
        'default'   => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'header_button_url_2', array(
        'label'    => __( 'Button URL', 'zbcouture' ),
        'section'  => 'header_button_section',
        'type'     => 'url',
    ) );

    // Optional: Show/Hide Toggle
    $wp_customize->add_setting( 'header_button_visibility_2', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ) );

    $wp_customize->add_control( 'header_button_visibility_2', array(
        'label'    => __( 'Show Header Button', 'zbcouture' ),
        'section'  => 'header_button_section',
        'type'     => 'checkbox',
    ) );
}
add_action( 'customize_register', 'header_customization' );

function footer_customization( $wp_customize ) {
    // Add Footer Section
    $wp_customize->add_section( 'footer_options', array(
        'title' => 'Footer Options',
        'priority' => 120,
    ) );

    // Footer Image
    $wp_customize->add_setting( 'footer_image' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_image', array(
        'label' => 'Footer Image',
        'section' => 'footer_options',
    ) ) );

    // Menu Heading 1
    $wp_customize->add_setting( 'menu_heading_1' );
    $wp_customize->add_control( 'menu_heading_1', array(
        'label' => 'Menu Heading 1',
        'section' => 'footer_options',
        'type' => 'text',
    ) );

    // Menu Heading 2
    $wp_customize->add_setting( 'menu_heading_2' );
    $wp_customize->add_control( 'menu_heading_2', array(
        'label' => 'Menu Heading 2',
        'section' => 'footer_options',
        'type' => 'text',
    ) );

    // Facebook URL
    $wp_customize->add_setting( 'facebook_url' );
    $wp_customize->add_control( 'facebook_url', array(
        'label' => 'Facebook URL',
        'section' => 'footer_options',
        'type' => 'url',
    ) );

    // Instagram URL
    $wp_customize->add_setting( 'instagram_url' );
    $wp_customize->add_control( 'instagram_url', array(
        'label' => 'Instagram URL',
        'section' => 'footer_options',
        'type' => 'url',
    ) );

    // YouTube URL
    $wp_customize->add_setting( 'youtube_url' );
    $wp_customize->add_control( 'youtube_url', array(
        'label' => 'YouTube URL',
        'section' => 'footer_options',
        'type' => 'url',
    ) );

    // TikTok URL
    $wp_customize->add_setting( 'tiktok_url' );
    $wp_customize->add_control( 'tiktok_url', array(
        'label' => 'TikTok URL',
        'section' => 'footer_options',
        'type' => 'url',
    ) );

    // Copyright Text
    $wp_customize->add_setting( 'copyright_text' );
    $wp_customize->add_control( 'copyright_text', array(
        'label' => 'Copyright Text',
        'section' => 'footer_options',
        'type' => 'textarea',
    ) );

    // Footer Banner
    $wp_customize->add_setting( 'footer_banner_content' );
    $wp_customize->add_control( 'footer_banner_content', array(
        'label' => 'Footer Banner Content',
        'section' => 'footer_options',
        'type' => 'text',
    ) );

    // Button Text
    $wp_customize->add_setting( 'footer_banner_text');
    $wp_customize->add_control( 'footer_banner_text', array(
        'label'    => __( 'Button Text', 'zbcouture' ),
        'section'  => 'footer_options',
        'type'     => 'text',
    ) );

    // Button URL
    $wp_customize->add_setting( 'Footer_banner_url' );
    $wp_customize->add_control( 'Footer_banner_url', array(
        'label'    => __( 'Button URL', 'zbcouture' ),
        'section'  => 'footer_options',
        'type'     => 'url',
    ) );
}
add_action( 'customize_register', 'footer_customization' );