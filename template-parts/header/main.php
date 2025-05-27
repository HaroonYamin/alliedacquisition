<header class="absolute top-7 w-full" id="header">
    <div class="container mx-auto px-5">
        <div class="flex flex-row items-center justify-between">
            <div>
                <?= the_custom_logo(); ?>
            </div>

            <div class="lg:block hidden">
                <div class="flex flex-row items-center justify-between gap-4">
                    <?php wp_nav_menu( ['theme_location' => 'main-menu'] ); ?>
    
                    <?php if ( get_theme_mod( 'header_button_visibility', true ) ) : ?>
                        <div class="">
                            <a href="<?php echo esc_url( get_theme_mod( 'header_button_url', '#' ) ); ?>" class="color-light-green border border-light-green py-3 px-5 text-white rounded-full hover:bg-light-green transition-colors inline-block">
                                <?php echo esc_html( get_theme_mod( 'header_button_text', 'Contact Us' ) ); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="lg:hidden block">
                <?php get_template_part( 'template-parts/header/mobile' ); ?>
            </div>
        </div>
    </div>
</header>