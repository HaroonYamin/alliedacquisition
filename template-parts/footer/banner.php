<?php
    $text = get_theme_mod('footer_banner_content');
    $button_text = get_theme_mod('footer_banner_text');
    $button_url = get_theme_mod('Footer_banner_url');

    if( !$text || !$button_text ) {
        return;
    }
?>

<section class="mt-section-md">
    <div class="container mx-auto px-5">
        <div class="w-5/6 mx-auto p-12 bg-neutral-700 rounded-3xl -mb-banner relative z-1">
            <div class="flex flex-row items-center justify-between">
                <?php
                    if( $text ) {
                        echo '<p class="text-white font-avenir text-4xl font-bold">' . $text . '</p>';
                    }

                    if( $button_url ) {
                        echo '<a href="' . esc_url($button_url) . '" target="_blank" class="bg-light-green border border-light-green py-3 px-14 text-black rounded-full hover:bg-lime-500 hover:border-lime-500 hover:text-white transition-colors inline-block">' . esc_html($button_text) . '</a>';
                    }
                ?>
            </div>
        </div>
    </div>
</section>