<?php
// FILE: your-theme/template-parts/lead-magnet-popup.php

// 1. Fetch ACF option fields
$is_enabled   = get_field('hy_lead_enable_this_feature', 'option');
$enabled_pages = get_field('enable_in_the_pages', 'option');
$settings     = get_field('hy_lead_top_spacing', 'option');
$group        = get_field('hy_lead_image_group', 'option');

// 2. Initial validation: Exit early if disabled or not on a target page
if (!$is_enabled) {
    return;
}

$current_page_id = get_queried_object_id();
if (!is_array($enabled_pages) || !in_array($current_page_id, $enabled_pages)) {
    return;
}

// 3. Prepare variables with defaults
$scroll_trigger = $settings['top'] ?? 0;
$timer_trigger  = $settings['timer'] ?? 0;
$image          = $group['image'] ?? null;
$content        = $group['content'] ?? [];
$heading        = $content['heading'] ?? '';
$sub_heading    = $content['sub_heading'] ?? '';
$paragraph      = $content['paragraph'] ?? '';
$shortcode      = $content['shortcode'] ?? '';

?>

<section
    id="lead-magnet-popup"
    class="lead-magnet"
    data-scroll-trigger="<?= esc_attr($scroll_trigger); ?>"
    data-timer-trigger="<?= esc_attr($timer_trigger); ?>"
    aria-modal="true"
    role="dialog"
    aria-hidden="true"
>
    <div class="lead-magnet__overlay"></div>
    <div class="lead-magnet__dialog">
        <button class="lead-magnet__close" aria-label="Close popup">
            <?= get_svg('icon-cross', 'w-8 h-8'); ?>
        </button>

        <div class="lead-magnet__grid">
            <?php if ($image) : ?>
                <div class="lead-magnet__image-wrapper">
                    <?= get_image($image, '', 'rounded-2xl w-full sm:h-auto h-[200px] object-cover'); ?>
                </div>
            <?php endif; ?>

            <div class="lead-magnet__content">
                <div class="mb-5 sm:mb-7">
                    <?php
                    if ($heading) echo '<h2 class="font-avenir text-green md:text-2xl text-2xl font-medium mb-4 md:max-w-xl max-w-sm leading-2 capitalize">' . esc_html($heading) . '</h2>';
                    if ($sub_heading) echo '<h5 class="font-inter text-black text-xl font-medium mb-1">' . esc_html($sub_heading) . '</h5>';
                    if ($paragraph) echo '<div class="font-inter hy-lead-styles">' . wp_kses_post($paragraph) . '</div>';
                    ?>
                </div>

                <?php if ($shortcode) : ?>
                    <div class="lead-magnet__form">
                        <?= do_shortcode($shortcode); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<style>
    .lead-magnet {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 999;
        display: flex;
        align-items: center;
        justify-content: center;
        /* Start hidden */
        visibility: hidden;
        opacity: 0;
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    .lead-magnet.is-active {
        visibility: visible;
        opacity: 1;
    }

    .lead-magnet__overlay {
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
    }

    .lead-magnet__dialog {
        position: relative;
        background-color: white;
        border-radius: 0.75rem; /* 12px */
        width: 100%;
        max-width: 380px; /* Mobile max-width */
        padding: 1rem; /* p-4 */
        transform: scale(0.95);
        opacity: 0;
        transition: transform 0.3s ease, opacity 0.3s ease;
    }
    
    .lead-magnet.is-active .lead-magnet__dialog {
        transform: scale(1);
        opacity: 1;
    }

    @media (min-width: 640px) { /* Tailwind 'sm' breakpoint */
        .lead-magnet__dialog {
            max-width: 56rem; /* sm:max-w-4xl */
            padding: 2rem; /* sm:p-8 */
        }
    }

    .lead-magnet__close {
        position: absolute;
        top: 0.5rem; /* top-2 */
        right: 0.5rem; /* right-2 */
        cursor: pointer;
        opacity: 0.5;
        transition: opacity 0.2s ease;
    }
    
    .lead-magnet__close:hover {
        opacity: 1;
    }

    .lead-magnet__grid {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 1.75rem; /* gap-y-7, space-x-7 */
    }

    .lead-magnet__image-wrapper,
    .lead-magnet__content {
        width: 100%;
    }

    @media (min-width: 640px) { /* sm breakpoint */
        .lead-magnet__image-wrapper,
        .lead-magnet__content {
            width: calc(50% - 0.875rem); /* sm:w-[calc(50%-14px)] */
        }
    }
</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const popup = document.getElementById("lead-magnet-popup");
    if (!popup) return; // Exit if the popup element doesn't exist

    // const overlay = popup.querySelector(".lead-magnet__overlay");
    const closeButtons = popup.querySelectorAll(".lead-magnet__close");
    
    // Settings from data attributes
    const scrollTrigger = parseInt(popup.dataset.scrollTrigger, 10);
    const timerTrigger = parseInt(popup.dataset.timerTrigger, 10);
    
    const storageKey = "leadMagnetClosedTimestamp";
    const oneDayInMs = 24 * 60 * 60 * 1000;
    let isShown = false;

    // --- Core Functions ---
    const showPopup = () => {
        if (isShown) return; // Don't show if already visible
        isShown = true;
        popup.classList.add("is-active");
        popup.setAttribute('aria-hidden', 'false');

        // Once shown, remove the listeners that triggered it
        window.removeEventListener("scroll", handleScroll);
        if (timerId) clearTimeout(timerId);
    };

    const hidePopup = () => {
        popup.classList.remove("is-active");
        popup.setAttribute('aria-hidden', 'true');
        // Set timestamp in localStorage to prevent showing for 24h
        localStorage.setItem(storageKey, Date.now().toString());
        console.log("✅ Popup hidden. Suppressed for 24 hours.");
    };

    // --- Suppression Check ---
    const lastClosedTime = localStorage.getItem(storageKey);
    if (lastClosedTime && (Date.now() - parseInt(lastClosedTime, 10) < oneDayInMs)) {
        console.log("🚫 Popup suppressed: it was closed within the last 24 hours.");
        return; // Stop all execution if suppressed
    }

    // --- Trigger Setup ---
    // 1. Scroll Trigger
    const handleScroll = () => {
        const scrollPercent = (window.scrollY + window.innerHeight) / document.body.scrollHeight * 100;
        if (scrollPercent >= scrollTrigger) {
            showPopup();
        }
    };
    window.addEventListener("scroll", handleScroll, { passive: true });

    // 2. Timer Trigger
    let timerId = null;
    if (timerTrigger > 0) {
        timerId = setTimeout(showPopup, timerTrigger * 1000);
    }

    // --- Event Listeners for Closing ---
    // overlay.addEventListener("click", hidePopup);
    closeButtons.forEach(button => button.addEventListener("click", hidePopup));
});
</script>