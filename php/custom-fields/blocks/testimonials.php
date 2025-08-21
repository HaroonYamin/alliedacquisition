<?php
    $heading = get_field('heading');
    $enable = get_field('enable');
    $testimonials = get_field( 'testimonials', 'option' );
?>

<section class="md:py-24 py-12 bg-gray-50">
    <?php
    if( $testimonials ) {
        $last_key = array_key_last( $testimonials );
        echo '<span class="hidden testimonial-last-key" data-last-key="' . $last_key . '"></span>';
    }
    ?>
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
                    <div class="swiper testimonial-swiper">  
                        <div class="swiper-wrapper">
                            
                            <?php if( $testimonials ) :
                                foreach( $testimonials as $key => $single ) :
                                    if( $single ) :
                                        $content = $single['content'];
                                        $block = $content['block'];
                                        if( !$block ) { continue; } ?>
    
                                        <div class="swiper-slide">
                                            <div class="my-7 shadow-card-2 rounded-3xl">
                                                <div class="py-8 px-7 flex flex-col h-full">
                                                    <?= get_image( $single['image'], 'medium', 'w-24 h-24 rounded-full mx-auto' ); ?>
    
                                                    <div class="flex-grow mt-13">
                                                        <div class="text-center text-gray-600 truncate-4 testimonial-editor">
                                                            <?= $content['feedback']; ?>
                                                        </div>
    
                                                        <button class="text-light-green hover:text-green cursor-pointer transition-colors text-sm font-semibold mt-2 block size-fit mx-auto" id="<?= 'tesimonial-' . $key; ?>">Read More</button>
                                                    </div>
    
                                                    <div class="h-22 mt-1 flex flex-col justify-end">
                                                        <h4 class="text-gray-600 font-semibold block size-fit mx-auto"><?= $content['name']; ?></h4>
                                                        <p class="text-gray-600 text-center mt-2 text-sm"><?= $content['description']; ?></p>
                                                    </div>
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

    <?php if( $testimonials ) :
        foreach( $testimonials as $key => $single ) :
            if( $single ) :
                $content = $single['content'];
                $block = $content['block'];
                if( !$block ) { continue; } ?>
                <div class="relative z-30 tesimonial-popup <?= 'tesimonial-popup-' . $key; ?>">
                    <div class="fixed top-0 left-0 z-30 w-screen h-screen flex items-center justify-center">
                        <div class="fixed top-0 left-0 w-screen h-screen bg-black/80 <?= 'testimonial-popup-close-' . $key; ?>"></div>
                        <div class="sm:max-w-3xl max-w-[380px] w-full px-5 relative z-30">
                            <div class="bg-white sm:px-8 sm:pb-8 px-4 pb-4 rounded-xl relative">
                                <button class="absolute top-5 right-5 z-40 opacity-75 hover:opacity-100 cursor-pointer <?= 'testimonial-popup-close-' . $key; ?>"><?= get_svg('icon-cross', 'w-8 h-8'); ?></button>
    
                                <div class="-translate-y-1/4">
                                    <?= get_image( $single['image'], 'full', 'w-32 h-32 rounded-full mx-auto' ); ?>
                                </div>
    
                                <div class="text-center sm:text-xl text-gray-600 testimonial-editor max-h-[450px] overflow-y-auto pr-2.5">
                                    <?= $content['feedback']; ?>
                                </div>
    
                                <div class="flex sm:flex-row flex-col items-center gap-y-3 justify-between sm:mt-24 mt-12">
                                    <div class="">
                                        <h4 class="text-gray-600 font-semibold block size-fit sm:text-left text-center sm:mx-0 mx-auto"><?= $content['name']; ?></h4>
                                        <p class="text-gray-600 mt-2 text-sm sm:text-left text-center sm:mx-0 mx-auto"><?= $content['description']; ?></p>
                                    </div>
                                    <div>
                                        <?php
                                            if( $content['company_image'] ) {
                                                echo '<img src="' . $content['company_image'] . '" alt="' . $content['name'] . '" class="h-20 w-40 object-contain">';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif;
        endforeach;
    endif; ?>
</section>