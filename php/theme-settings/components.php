<?php
// Get Heading h2
function heading_2($title, $class = '') {
    echo '<h2 class="font-avenir text-green text-5xl font-medium mb-9 max-w-xl leading-2 capitalize ' . $class . '">' . $title . '</h2>';
}
add_shortcode('heading_2', 'heading_2');

// Get SVG Icon
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

// Get Image
function get_image($image, $size = 'medium', $args = []) {
    $args = wp_parse_args($args, [
        'alt' => '',
        'class' => 'w-full h-full object-cover transition-opacity duration-300 opacity-0',
        'wrapper' => 'relative overflow-hidden',
        'skeleton' => 'absolute inset-0 bg-gray-200 animate-pulse'
    ]);
    
    // Get image data
    if (is_numeric($image)) {
        $src = wp_get_attachment_image_src($image, $size);
        $url = $src[0] ?? '';
        $alt = $args['alt'] ?: get_post_meta($image, '_wp_attachment_image_alt', true);
        $srcset = wp_get_attachment_image_srcset($image, $size);
    } else {
        $url = $image;
        $alt = $args['alt'];
        $srcset = '';
    }
    
    if (!$url) return '';
    
    $id = 'img-' . uniqid();
    
    return sprintf(
        '<div class="%s" id="wrap-%s">
            <div class="%s" id="skel-%s"></div>
            <img id="%s" src="%s" %s alt="%s" class="%s" loading="lazy" decoding="async" 
                 onload="this.classList.add(\'opacity-100\');document.getElementById(\'skel-%s\').remove()">
        </div>',
        esc_attr($args['wrapper']),
        $id,
        esc_attr($args['skeleton']),
        $id,
        $id,
        esc_url($url),
        $srcset ? 'srcset="' . esc_attr($srcset) . '"' : '',
        esc_attr($alt),
        esc_attr($args['class']),
        $id
    );
}
