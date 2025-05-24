<?php
    $image = get_theme_mod( 'footer_image' );
    $heading = get_theme_mod( 'menu_heading_1' );
    $heading_2 = get_theme_mod( 'menu_heading_2' );
    $facebook = get_theme_mod( 'facebook_url' );
    $instagram = get_theme_mod( 'instagram_url' );
    $youtube = get_theme_mod( 'youtube_url' );
    $tiktok = get_theme_mod( 'tiktok_url' );
?>

<footer id="footer" class="bg-gray-100">
    <div class="container mx-auto px-5">
        <div class="grid grid-cols-12 gap-x-24">
            <div class="col-span-4">
                <?= get_image( $image ); ?>
            </div>
            <div class="col-span-2">
                <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
            </div>
            <div class="col-span-2">
                <?php wp_nav_menu( array( 'theme_location' => 'footer-menu-2' ) ); ?>
            </div>
            <div class="col-span-3">

            </div>
        </div>
    </div>
</footer>