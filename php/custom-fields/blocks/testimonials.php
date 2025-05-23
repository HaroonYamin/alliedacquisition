<?php
    $heading = get_field('heading');
    $enable = get_field('enable');
    $testimonials = get_field( 'testimonials', 'option' );
?>

<section class="py-section bg-gray-50">
    <div class="container mx-auto px-5">
        <div class="grid items-center grid-cols-12 gap-4">
            <div class="col-span-4">
                <?php
                    if( $heading ) {
                        echo '<div class="max-w-sm">';
                            heading_2( $heading );
                        echo '</div>';
                    }
                ?>
                <div class="flex flex-row gap-5">
                    <button class="testimonials-left size-14 rounded-full bg-white flex items-center justify-center cursor-pointer hover:bg-light-green transition-colors"><?= get_svg( 'icon-left' ); ?></button>
                    <button class="testimonials-right size-14 rounded-full bg-white flex items-center justify-center cursor-pointer hover:bg-light-green transition-colors"><?= get_svg( 'icon-right' ); ?></button>
                </div>
            </div>
            <div class="col-span-1"></div>
            <div class="col-span-7">
                <div class="ml-15 px-4 overflow-hidden">
                    <div class="swiper testimonial-swiper" style="overflow: visible !important;">
                        <div class="swiper-wrapper">
                            
                            <?php if( $testimonials ) :
                                foreach( $testimonials as $single ) :
                                    if( $single ) :
                                        $content = $single['content']; ?>
    
                                        <div class="swiper-slide my-7 shadow-card-2 rounded-3xl">
                                            <div class="py-8 px-7 flex flex-col h-full">
                                                <?= get_image( $single['image'], 'medium', 'w-24 h-24 rounded-full mx-auto' ); ?>

                                                <div class="flex-grow mt-13">
                                                    <p class="text-center text-gray-600"><?= $content['feedback']; ?></p>
                                                    <a href="#" class="text-light-green hover:text-green transition-colors text-sm font-semibold mt-2 block size-fit mx-auto">Read More</a>
                                                </div>

                                                <div class="h-22 mt-1 flex flex-col justify-end">
                                                    <h4 class="text-gray-600 font-semibold block size-fit mx-auto"><?= $content['name']; ?></h4>
                                                    <p class="text-gray-600 text-center mt-2 text-sm"><?= $content['description']; ?></p>
                                                </div>
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
    </div>
</section>