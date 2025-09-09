<?php
    $black_logo = get_theme_mod( 'header_black_logo' ) ?: '';
?>

<header class="w-full py-7">
    <div class="container mx-auto px-5">
        <div class="flex flex-row items-center justify-between">
            <div>
                <a href="<?php echo esc_url( home_url() ); ?>">
                    <img src="<?= esc_url( $black_logo ); ?>" alt="Allied Acquisition (Black Logo)" class="custom-black-logo">
                </a>
            </div>

            <div class="lg:block hidden">
                <div class="flex flex-row items-center justify-between gap-4 black-header" id="header">
                    <?php wp_nav_menu( ['theme_location' => 'main-menu'] ); ?>
    
                    <?php if ( get_theme_mod( 'header_button_visibility', true ) ) : ?>
                        <div class="">
                            <a href="<?php echo esc_url( get_theme_mod( 'header_button_url', '#' ) ); ?>" 
                                class="color-light-green border border-light-green py-3 px-5 text-black rounded-full hover:bg-light-green transition-colors inline-block">
                                <?php echo esc_html( get_theme_mod( 'header_button_text', 'Contact Us' ) ); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if ( get_theme_mod( 'header_button_visibility_2', true ) ) : ?>
                        <div class="">
                            <a href="<?php echo esc_url( get_theme_mod( 'header_button_url_2', '#' ) ); ?>" 
                                class="bg-light-green border border-light-green py-3 px-8 text-black rounded-full hover:bg-lime-500 hover:border-lime-500 transition-colors sm:inline-block block text-center w-full sm:w-fit ">
                                <?php echo esc_html( get_theme_mod( 'header_button_text_2', 'Contact Us' ) ); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="lg:hidden block">
                <?php get_template_part( 'template-parts/header/mobile-menu' ); ?>
            </div>
        </div>
    </div>
</header>