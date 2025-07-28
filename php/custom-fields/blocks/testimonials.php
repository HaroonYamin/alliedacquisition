<?php
    $heading = get_field('heading');
    $enable = get_field('enable');
    $testimonials = get_field( 'testimonials', 'option' );
?>

<section class="md:py-section py-12 bg-gray-50 overflow-hidden">
    <div class="container mx-auto px-5">
        <div class="grid items-center grid-cols-12 gap-x-4">
            <div class="lg:col-span-4 md:col-span-5 col-span-12">
                <?php
                    if( $heading ) {
                        echo '<div class="max-w-sm mx-auto lg:mx-0">';
                            heading_2( $heading, 'text-center lg:text-left' );
                        echo '</div>';
                    }
                ?>
                <div class="hidden md:flex flex-row gap-5">
                    <button class="testimonials-left size-14 rounded-full bg-white flex items-center justify-center cursor-pointer hover:bg-light-green transition-colors"><?= get_svg( 'icon-left' ); ?></button>
                    <button class="testimonials-right size-14 rounded-full bg-white flex items-center justify-center cursor-pointer hover:bg-light-green transition-colors"><?= get_svg( 'icon-right' ); ?></button>
                </div>
            </div>
            <div class="lg:col-span-1 hidden lg:block"></div>
            <div class="md:col-span-7 col-span-12">
                <div class="md:ml-15 sm:px-4 sm:overflow-hidden ">
                    <div class="swiper testimonial-swiper" style="overflow: visible !important;">  
                        <div class="swiper-wrapper">
                            
                            <?php if( $testimonials ) :
                                foreach( $testimonials as $single ) :
                                    if( $single ) :
                                        $content = $single['content'];
                                        $block = $content['block'];
                                        if( !$block ) { continue; } ?>
    
                                        <div class="swiper-slide my-7 shadow-card-2 rounded-3xl">
                                            <div class="py-8 px-7 flex flex-col h-full">
                                                <?= get_image( $single['image'], 'medium', 'w-24 h-24 rounded-full mx-auto' ); ?>

                                                <div class="flex-grow mt-13">
                                                    <p class="text-center text-gray-600 truncate-4">
                                                        <?= $content['feedback']; ?>
                                                    </p>

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

                <div class="md:hidden flex flex-row justify-center gap-5 mt-7">
                    <button class="testimonials-left size-14 rounded-full bg-white flex items-center justify-center cursor-pointer hover:bg-light-green transition-colors"><?= get_svg( 'icon-left' ); ?></button>
                    <button class="testimonials-right size-14 rounded-full bg-white flex items-center justify-center cursor-pointer hover:bg-light-green transition-colors"><?= get_svg( 'icon-right' ); ?></button>
                </div>
            </div>
        </div>
    </div>
</section>