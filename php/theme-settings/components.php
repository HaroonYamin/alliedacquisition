<?php
// Get Heading h2
function heading_2($title, $class = '') {
    echo '<h2 class="font-avenir text-green md:text-5xl text-3xl font-medium mb-9 md:max-w-xl max-w-sm leading-2 capitalize ' . $class . '">' . $title . '</h2>';
}

// Get Heading h3
function heading_3($title, $class = '') {
    echo '<h3 class="font-avenir text-green md:text-2xl text-2xl font-medium mb-7 md:max-w-xl max-w-sm leading-2 capitalize ' . $class . '">' . $title . '</h3>';
}

// Get Heading h4
function heading_4($title, $class = '') {
    echo '<h4 class="font-inter text-green text-xl font-medium mb-4 ' . $class . '">' . $title . '</h4>';
}

// Get Heading h5
function heading_5($title, $class = '') {
    echo '<h5 class="font-inter text-black text-xl font-medium mb-4 ' . $class . '">' . $title . '</h5>';
}

// Get Button
function button_1($url, $target = '_self', $title = '', $class = '') {
    if (empty($url) || empty($title)) {
        return ''; // Don't render an invalid button
    }

    $rel = $target === '_blank' ? ' rel="noopener noreferrer"' : '';

    return '<a href="' . esc_url($url) . '" target="' . esc_attr($target) . '"' . $rel .
        ' class="bg-light-green border border-light-green py-3 px-8 text-white rounded-full hover:bg-lime-500 hover:border-lime-500 transition-colors sm:inline-block block text-center w-full sm:w-fit ' . esc_attr($class) . '">' .
        esc_html($title) .
    '</a>';
}

// Get Button 2
function button_2($url, $target = '_self', $title = '', $class = '') {
    if (empty($url) || empty($title)) {
        return ''; // Skip rendering if essential values are missing
    }

    $rel = $target === '_blank' ? ' rel="noopener noreferrer"' : '';

    return '<a href="' . esc_url($url) . '" target="' . esc_attr($target) . '"' . $rel .
        ' class="color-light-green border border-light-green py-3 px-8 text-green rounded-full hover:bg-light-green hover:text-white transition-colors sm:inline-block block text-center w-full sm:w-fit ' . esc_attr($class) . '">' .
        esc_html($title) .
    '</a>';
}


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
function get_image($image, $size = 'medium', $wrap = '') {
    // Default classes
    $wrapper_class = 'relative overflow-hidden ' . $wrap;
    $skeleton_class = 'absolute inset-0 bg-gray-200 animate-pulse';
    $img_class = 'w-full h-full object-cover transition-opacity duration-300 opacity-0';

    // Get image data
    if (is_numeric($image)) {
        $src = wp_get_attachment_image_src($image, $size);
        $url = $src[0] ?? '';
        $alt = get_post_meta($image, '_wp_attachment_image_alt', true);
        $srcset = wp_get_attachment_image_srcset($image, $size);
    } else {
        $url = $image;
        $alt = '';
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
        esc_attr($wrapper_class),
        $id,
        esc_attr($skeleton_class),
        $id,
        $id,
        esc_url($url),
        $srcset ? 'srcset="' . esc_attr($srcset) . '"' : '',
        esc_attr($alt),
        esc_attr($img_class),
        $id
    );
}

