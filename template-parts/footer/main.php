<?php
    $image = get_theme_mod( 'footer_image' );
    $heading = get_theme_mod( 'menu_heading_1' );
    $heading_2 = get_theme_mod( 'menu_heading_2' );
    $facebook = get_theme_mod( 'facebook_url' );
    $instagram = get_theme_mod( 'instagram_url' );
    $youtube = get_theme_mod( 'youtube_url' );
    $tiktok = get_theme_mod( 'tiktok_url' );
    $copyright = get_theme_mod( 'copyright_text' );
?>

<footer id="footer" class="bg-gray-100 pt-section-md pb-16">
    <div class="container mx-auto px-5">
        <div class="grid grid-cols-12 gap-x-24">
            <div class="col-span-4">
                <?= get_image( $image, 'medium', 'max-w-48' ); ?>
            </div>
            <div class="col-span-2">
                <?php
                    if( $heading ) {
                        echo '<h3 class="mb-6 font-semibold">' . $heading . '</h3>';
                    }

                    wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); 
                ?>
            </div>
            <div class="col-span-2">
                <?php 
                    if( $heading_2 ) {
                        echo '<h3 class="mb-6 font-semibold">' . $heading_2 . '</h3>';
                    }

                    wp_nav_menu( array( 'theme_location' => 'footer-menu-2' ) ); 
                ?>
            </div>
            <div class="col-span-3">

            </div>
        </div>
    </div>
</footer>