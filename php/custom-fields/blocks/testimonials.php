<?php
    $heading = get_field('heading');
    $enable = get_field('enable');
    $testimonials = get_field( 'testimonials', 'option' );
?>

<section class="py-section-md bg-gray-50">
    <div class="container mx-auto px-5">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-4">
                <?php
                    if( $heading ) {
                        echo '<div class="max-w-sm">';
                            heading_2( $heading );
                        echo '</div>';
                    }
                ?>
            </div>
            <div class="col-span-7">
                
            </div>
        </div>
    </div>
</section>