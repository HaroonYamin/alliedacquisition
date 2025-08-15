<?php
    $text = get_theme_mod('footer_banner_content');
    $button_text = get_theme_mod('footer_banner_text');
    $button_url = get_theme_mod('Footer_banner_url');

    if( !$text || !$button_text ) {
        return;
    }
?>

<section class="md:mt-section-md mt-12">
    <div class="container mx-auto px-5">
        <div class="lg:w-5/6 mx-auto sm:p-12 p-7 bg-neutral-700 rounded-3xl -mb-banner relative z-1">
            <div class="flex flex-row flex-wrap gap-x-4 gap-y-8 items-center md:justify-between justify-center">
                <?php
                    if( $text ) {
                        echo '<p class="text-white font-avenir lg:text-4xl text-3xl font-bold">' . $text . '</p>';
                    }

                    if( $button_url ) { 
                        echo '<a href="' . esc_url($button_url) . '" target="_blank" class="bg-light-green border border-light-green py-3 sm:px-14 px-5 sm:w-fit w-full text-white rounded-full hover:bg-lime-500 hover:border-lime-500 transition-colors inline-block text-center">' . esc_html($button_text) . '</a>';
                    }
                ?>
            </div>
        </div>
    </div>
</section>