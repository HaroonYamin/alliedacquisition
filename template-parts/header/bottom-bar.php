<?php 
$banner_visibility = get_theme_mod( 'header_banner_visibility', true );
$banner_content    = get_theme_mod( 'header_banner_content', 'Get My Cash Offer' );
$banner_url        = get_theme_mod( 'header_banner_url', '#' );

if ( $banner_visibility && ! empty( $banner_content ) ) : ?>
    <section class="fixed left-0 bottom-0 z-20 w-full shadow-banner" id="fixed-banner">
        <a href="<?php echo esc_url( $banner_url ); ?>" class="bg-light-green hover:bg-neutral-700 block py-1 hover:py-2 transition-all">
            <div class="container mx-auto px-5">
                <p class="text-white text-lg font-semibold text-center">
                    <?php echo esc_html( $banner_content ); ?>
                </p>
            </div>
        </a>
    </section>
<?php endif; ?>
