<?php
    $map = get_field('map');

    $heading = get_field('heading');
    $editor = get_field('editor');
    $location = get_field('location');
    $location_2 = get_field('location_2');
?>

<section class="md:mt-32 mt-18 mb-24">
    <div class="container mx-auto px-5">
        <div class="grid gap-x-12 gap-y-12 md:grid-cols-2 items-center">
            <div>
                <?php
                    if(  $map ) {
                        echo '<div class="hy-contact-map">' . $map . '</div>';
                    }
                ?>
            </div>
            <div>
                <?php
                    if( $heading ) {
                        echo '<div class="max-w-[400px]">';
                            heading_2( $heading );
                        echo '</div>';
                    }
                    if(  $editor ) {
                        echo '<div class="-mt-7 text-gray-600 max-w-xl">' . $editor . '</div>';
                    }
                    if( $location ) {
                        echo '<div class="mt-10 flex items-center gap-x-2.5 text-gray-600">';
                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--color-light-green)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin-icon lucide-map-pin"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/></svg>';
                            echo $location;
                        echo '</div>';
                    }
                    if( $location_2 ) {
                        echo '<div class="mt-5 flex items-center gap-x-2.5 text-gray-600">';
                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--color-light-green)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin-icon lucide-map-pin"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/></svg>';
                            echo $location_2;
                        echo '</div>';
                    }
                ?>
            </div>
        </div>
    </div>
</section>

<style>
    .hy-contact-map iframe {
        width: 100%;
        box-shadow: 0px 0px 10px 0px #00000017;
    }
</style>