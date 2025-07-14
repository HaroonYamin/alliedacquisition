<?php
    $testimonials = get_field( 'testimonials', 'option' );
?>

<section class="md:py-section py-12 overflow-hidden">
    <div class="container mx-auto px-5">
        <div class="grid xl:grid-cols-4 lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-x-6 gap-y-12">
            <?php if( $testimonials ) :
                foreach( $testimonials as $single ) :
                    if( $single ) :
                        $content = $single['content']; ?>

                        <div class="shadow-card-2 rounded-3xl">
                            <div class="py-8 px-7 flex flex-col h-full">
                                <?= get_image( $single['image'], 'medium', 'w-24 h-24 rounded-full mx-auto' ); ?>

                                <div class="flex-grow mt-13">
                                    <p class="text-center text-gray-600"><?= $content['feedback']; ?></p>
                                    <!-- <a href="#" class="text-light-green hover:text-green transition-colors text-sm font-semibold mt-2 block size-fit mx-auto">Read More</a> -->
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
</section>