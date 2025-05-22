<?php
function heading_2($title, $class = '') {
    echo '<h2 class="font-primary text-green text-2xl font-medium mb-9 ' . $class . '">' . $title . '</h2>';
}
add_shortcode('heading_2', 'heading_2');