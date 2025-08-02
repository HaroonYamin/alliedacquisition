<?php
    $testimonials = get_field( 'testimonials', 'option' );
?>

<section class="md:py-section py-12">
    <?php
    if( $testimonials ) {
        $last_key = array_key_last( $testimonials );
        echo '<span class="hidden testimonial-last-key" data-last-key="' . $last_key . '"></span>';
    }
    ?>
    <div class="container mx-auto px-5">
        <div class="grid xl:grid-cols-4 lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-x-6 gap-y-12">
            <?php if( $testimonials ) :
                foreach( $testimonials as $key => $single ) :
                    if( $single ) :
                        $content = $single['content']; ?>

                        <div class="shadow-card-2 rounded-3xl">
                            <div class="py-8 px-7 flex flex-col h-full">
                                <?= get_image( $single['image'], 'medium', 'w-24 h-24 rounded-full mx-auto' ); ?>

                                <div class="flex-grow mt-13">
                                    <div class="text-center text-gray-600 truncate-4">
                                        <?= $content['feedback']; ?>
                                    </div>

                                    <button class="text-light-green hover:text-green cursor-pointer transition-colors text-sm font-semibold mt-2 block size-fit mx-auto testimonial-editor" id="<?= 'tesimonial-' . $key; ?>">Read More</button>
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
    <?php if( $testimonials ) :
        foreach( $testimonials as $key => $single ) :
            if( $single ) :
                $content = $single['content'];
                $block = $content['block'];
                if( !$block ) { continue; } ?>
                <div class="fixed top-0 left-0 z-30 w-screen h-screen hidden" id="<?= 'tesimonial-popup-' . $key; ?>">
                    <div class="fixed top-0 left-0 w-screen h-screen bg-black/80" onclick="closeTestimonial();"></div>
                    <div class="sm:max-w-3xl max-w-[380px] w-full px-5 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-30">
                        <div class="bg-white sm:px-8 sm:pb-8 px-4 pb-4 rounded-xl relative">
                            <button class="absolute top-5 right-5 z-40 opacity-75 hover:opacity-100 cursor-pointer" id="<?= 'testimonial-popup-close-' . $key; ?>"><?= get_svg('icon-cross', 'w-8 h-8'); ?></button>

                            <div class="-translate-y-1/2">
                                <?= get_image( $single['image'], 'full', 'w-32 h-32 rounded-full mx-auto' ); ?>
                            </div>

                            <p class="text-center sm:text-xl text-gray-600">
                                <?= $content['feedback']; ?>
                            </p>

                            <div class="flex sm:flex-row flex-col items-center gap-y-3 justify-between sm:mt-24 mt-12">
                                <div class="">
                                    <h4 class="text-gray-600 font-semibold block size-fit sm:text-left text-center sm:mx-0 mx-auto"><?= $content['name']; ?></h4>
                                    <div class="text-gray-600 mt-2 text-sm sm:text-left text-center sm:mx-0 mx-auto testimonial-editor"><?= $content['description']; ?></div>
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
            <?php endif;
        endforeach;
    endif; ?>
</section>