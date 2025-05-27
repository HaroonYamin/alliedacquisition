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

<footer id="footer" class="bg-gray-100 pt-44 pb-16">
    <div class="container mx-auto px-5">
        <div class="grid grid-cols-12 xl:gap-x-24 gap-y-12">
            <div class="lg:col-span-4 col-span-12">
                <?= get_image( $image, 'medium', 'max-w-48' ); ?>
            </div>

            <div class="xl:col-span-2 lg:col-span-4 sm:col-span-6 col-span-12">
                <?php
                    if( $heading ) {
                        echo '<h3 class="mb-6 font-semibold">' . $heading . '</h3>';
                    }

                    wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); 
                ?>
            </div>

            <div class="xl:col-span-2 lg:col-span-4 sm:col-span-6 col-span-12">
                <?php 
                    if( $heading_2 ) {
                        echo '<h3 class="mb-6 font-semibold">' . $heading_2 . '</h3>';
                    }

                    wp_nav_menu( array( 'theme_location' => 'footer-menu-2' ) ); 
                ?>
            </div>

            <div class="lg:col-span-4 col-span-12">
                <div class="flex flex-row flex-wrap gap-8">
                    <?php
                        if( $facebook ) {
                            echo '<a href="' . esc_url( $facebook ) . '" class="grid">' . get_svg( 'facebook', 'custom-fill-green' ) . '</a>';
                        }

                        if( $instagram ) {
                            echo '<a href="' . esc_url( $instagram ) . '" class="grid">' . get_svg( 'instagram', 'custom-fill-green' ) . '</a>';
                        }

                        if( $youtube ) {
                            echo '<a href="' . esc_url( $youtube ) . '" class="grid">' . get_svg( 'youtube', 'custom-fill-green' ) . '</a>';
                        }

                        if( $tiktok ) {
                            echo '<a href="' . esc_url( $tiktok ) . '" class="grid">' . get_svg( 'tiktok', 'custom-fill-green' ) . '</a>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>