<?php
function header_customization( $wp_customize ) {

    $wp_customize->add_section( 'header_button_section', array(
        'title'    => __( 'Site Header', 'zbcouture' ),
        'priority' => 30,
    ) );

    // Black Header Logo
    $wp_customize->add_setting( 'header_black_logo', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_black_logo', array(
        'label'    => __( 'Black Header Logo', 'zbcouture' ),
        'section'  => 'header_button_section',
        'settings' => 'header_black_logo',
    ) ) );

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

    // Button Text 2
    $wp_customize->add_setting( 'header_button_text_2', array(
        'default'   => 'Contact Us',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'header_button_text_2', array(
        'label'    => __( 'Button Text', 'zbcouture' ),
        'section'  => 'header_button_section',
        'type'     => 'text',
    ) );

    // Button URL 2
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

    // Header Banner Content
    $wp_customize->add_setting( 'header_banner_content', array(
        'default'           => 'Get My Cash Offer',
        'sanitize_callback' => 'sanitize_text_field', // or wp_kses_post if you want HTML
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'header_banner_content', array(
        'label'   => __( 'Banner Content', 'zbcouture' ),
        'section' => 'header_button_section',
        'type'    => 'textarea',
    ) );

    // Header Banner URL
    $wp_customize->add_setting( 'header_banner_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'header_banner_url', array(
        'label'   => __( 'Button URL', 'zbcouture' ),
        'section' => 'header_button_section',
        'type'    => 'url',
    ) );

    // Show/Hide Toggle
    $wp_customize->add_setting( 'header_banner_visibility', array(
        'default'           => true,
        'sanitize_callback' => function( $checked ) {
            return ( ( isset( $checked ) && true == $checked ) ? true : false );
        },
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'header_banner_visibility', array(
        'label'   => __( 'Show Header Button', 'zbcouture' ),
        'section' => 'header_button_section',
        'type'    => 'checkbox',
    ) );
}
add_action( 'customize_register', 'header_customization' );

function footer_customization( $wp_customize ) {
    // Add Footer Section
    $wp_customize->add_section( 'footer_options', array(
        'title' => 'Site Footer',
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