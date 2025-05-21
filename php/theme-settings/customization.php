<?php
function mytheme_customize_register( $wp_customize ) {

    $wp_customize->add_section( 'header_button_section', array(
        'title'    => __( 'Header Button', 'yourtheme' ),
        'priority' => 30,
    ) );

    // Button Text
    $wp_customize->add_setting( 'header_button_text', array(
        'default'   => 'Contact Us',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'header_button_text', array(
        'label'    => __( 'Button Text', 'yourtheme' ),
        'section'  => 'header_button_section',
        'type'     => 'text',
    ) );

    // Button URL
    $wp_customize->add_setting( 'header_button_url', array(
        'default'   => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'header_button_url', array(
        'label'    => __( 'Button URL', 'yourtheme' ),
        'section'  => 'header_button_section',
        'type'     => 'url',
    ) );

    // Optional: Show/Hide Toggle
    $wp_customize->add_setting( 'header_button_visibility', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ) );

    $wp_customize->add_control( 'header_button_visibility', array(
        'label'    => __( 'Show Header Button', 'yourtheme' ),
        'section'  => 'header_button_section',
        'type'     => 'checkbox',
    ) );
}
add_action( 'customize_register', 'mytheme_customize_register' );
