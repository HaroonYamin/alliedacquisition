<?php
// Lead Magnet
function hy_lead_magnet() {
    ob_start();
    get_template_part('template-parts/shortcodes/lead-magnet');
    return ob_get_clean();
}
add_shortcode('hy_lead_magnet', 'hy_lead_magnet');