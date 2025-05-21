<header id="header">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <?= the_custom_logo(); ?>
            </div>
            <div>
                <?php wp_nav_menu( ['theme_location' => 'main-menu'] ); ?>

                <?php if ( get_theme_mod( 'header_button_visibility', true ) ) : ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'header_button_url', '#' ) ); ?>" class="header-button">
                        <?php echo esc_html( get_theme_mod( 'header_button_text', 'Contact Us' ) ); ?>
                    </a>
                <?php endif; ?>

            </div>
        </div>
    </div>
</header>