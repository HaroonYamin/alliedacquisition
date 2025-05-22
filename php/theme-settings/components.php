<?php
function heading_2($title, $class = '') {
    echo '<h2 class="font-avenir text-green text-5xl font-medium mb-9 max-w-xl leading-2 capitalize ' . $class . '">' . $title . '</h2>';
}
add_shortcode('heading_2', 'heading_2');

function get_svg($icon_name, $class = '') {
    $filepath = THEME_DIR . "/assets/icons/{$icon_name}.svg";
    
    if (!file_exists($filepath)) {
        return '';
    }

    // Retrieve SVG content with basic XSS prevention
    $svg_content = file_get_contents($filepath);
    $svg_content = preg_replace('/<script[\s\S]*?>[\s\S]*?<\/script>/i', '', $svg_content);
    
    // Add class if provided
    if (!empty($class)) {
        $svg_content = str_replace('<svg', "<svg class='{$class}'", $svg_content);
    }
    
    return $svg_content;
}