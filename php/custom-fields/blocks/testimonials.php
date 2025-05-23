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
            <div class="col-span-1"></div>
            <div class="col-span-7">
                <div class="swiper testimonial-swiper">
                    <div class="swiper-wrapper">
                        
                        <?php if( $testimonials ) :
                            foreach( $testimonials as $single ) :
                                if( $single ) :
                                    $content = $single['content']; ?>

                                    <div class="swiper-slide">
                                        <div class=" py-8 px-7">
                                            <?= get_image( $single['image'], 'medium', 'w-24 h-24 rounded-full mx-auto' ); ?>
    
                                            <p class="mt-13 text-center text-gray-600"><?= $content['feedback']; ?></p>
                                        </div>
                                    </div>

                                <?php endif;
                            endforeach;
                        endif; ?>

                
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>