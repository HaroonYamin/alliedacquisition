<?php $black_header = get_field( 'black_header', get_the_ID() ) ?? false;
if( $black_header ) : ?>
    <button class="relative block py-4 px-2.5 mobile-menu bg-black/5 rounded-sm">
        <span class="block rounded-lg bg-light-green w-7 h-1 menu first"></span>
        <span class="block rounded-lg bg-light-green w-7 h-1 menu middle"></span>
        <span class="block rounded-lg bg-light-green w-7 h-1 menu last"></span>
    </button>
<?php else: ?>
    <button class="relative block p-2.5 mobile-menu">
        <span class="block rounded-lg bg-white w-7 h-1 menu first"></span>
        <span class="block rounded-lg bg-white w-7 h-1 menu middle"></span>
        <span class="block rounded-lg bg-white w-7 h-1 menu last"></span>
    </button>
<?php endif; ?>

<section class="fixed top-0 left-0" id="toggle-menu">
    <div class="bg-green w-screen h-screen">
        <div class="container mx-auto px-4">
            <div class="relative top-7 w-full">
                <div class="container mx-auto px-1">
                    <div class="flex flex-row items-center justify-between">
                        <div>
                            <?= the_custom_logo(); ?>
                        </div>

                        <?php

                        ?>
                        <button class="relative block p-2.5 mobile-menu">
                            <span class="block rounded-lg bg-white w-7 h-1 menu first"></span>
                            <span class="block rounded-lg bg-white w-7 h-1 menu middle"></span>
                            <span class="block rounded-lg bg-white w-7 h-1 menu last"></span>
                        </button>
                    </div>
                </div>
            <div>

            <div class="border-t-1 border-white mt-4 mb-6 w-full opacity-20"></div>

            <div id="mobile">
                <?php wp_nav_menu( ['theme_location' => 'main-menu'] ); ?>

                <?php if ( get_theme_mod( 'header_button_visibility', true ) ) : ?>
                    <div class="text-center mt-6">
                        <a href="<?php echo esc_url( get_theme_mod( 'header_button_url', '#' ) ); ?>" class="color-light-green border border-light-green py-3 px-5 text-white rounded-full hover:bg-light-green transition-colors inline-block">
                            <?php echo esc_html( get_theme_mod( 'header_button_text', 'Contact Us' ) ); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>