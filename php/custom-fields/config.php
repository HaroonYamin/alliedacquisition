<?php
/*
 * Custom Fields Blocks Registration
 */
function register_acf_block($name, $title, $description, $template, $keywords) {
    acf_register_block(array(
        'name' => 'acf/' . $name,
        'title' => __($title),
        'description' => __($description),
        'render_template' => THEME_DIR . '/php/custom-fields/blocks/' . $template . '.php',
        'category' => 'formatting',
        'icon' => 'testimonial',
        'keywords' => array($name, $keywords, 'section'),
    ));
}

function blocks_from_json() {
    if (function_exists('acf_register_block')) {
        $json_file = __DIR__ . '/register.json';

        // Load and decode JSON
        if (file_exists($json_file)) {
            $blocks = json_decode(file_get_contents($json_file), true);

            // Register each block from the JSON file
            foreach ($blocks as $block) {
                register_acf_block(
                    $block['name'],
                    $block['title'],
                    $block['description'],
                    $block['template'],
                    $block['keywords'],
                );
            }
        }
    }
}
add_action('acf/init', 'blocks_from_json');

if( function_exists('acf_add_options_page') ) {

    // Parent Option Page
    acf_add_options_page(array(
        'page_title'    => 'Theme Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'hy_theme_settings',
        'capability'    => 'manage_options',
        'icon_url'      => 'dashicons-admin-generic',
        'position'      => 20,
        'redirect'      => true,
    ));

    // Child: Testimonials
    acf_add_options_sub_page(array(
        'page_title'    => 'Testimonials',
        'menu_title'    => 'Testimonials',
        'menu_slug'     => 'testimonials-options',
        'parent_slug'   => 'hy_theme_settings',
        'capability'    => 'manage_options',
    ));

    // Child: Frequently Asked Questions
    acf_add_options_sub_page(array(
        'page_title'    => 'Frequently Asked Questions',
        'menu_title'    => 'Frequently Asked Questions',
        'menu_slug'     => 'faq-options',
        'parent_slug'   => 'hy_theme_settings',
        'capability'    => 'manage_options',
    ));

     // Child: Lead Magnet
    acf_add_options_sub_page(array(
        'page_title'    => 'Lead Magnet',
        'menu_title'    => 'Lead Magnet',
        'menu_slug'     => 'lead-magnet-options',
        'parent_slug'   => 'hy_theme_settings',
        'capability'    => 'manage_options',
    ));
}

