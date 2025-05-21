<header class="fixed top-7 w-full" id="header">
    <div class="container mx-auto">
        <div class="flex flex-row items-center justify-between">
            <div>
                <?= the_custom_logo(); ?>
            </div>

            <div class="flex flex-row items-center justify-between gap-4">
                <?php wp_nav_menu( ['theme_location' => 'main-menu'] ); ?>

                <?php if ( get_theme_mod( 'header_button_visibility', true ) ) : ?>
                    <div class="">
                        <a href="<?php echo esc_url( get_theme_mod( 'header_button_url', '#' ) ); ?>" class="color-primary border border-primary py-3 px-5 text-white rounded-full hover:bg-primary transition-colors inline-block">
                            <?php echo esc_html( get_theme_mod( 'header_button_text', 'Contact Us' ) ); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>