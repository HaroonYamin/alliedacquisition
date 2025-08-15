<?php
    $heading = get_field('heading');
    $image = get_field('image');
    $accordion = get_field('accordion');
?>

<section class="md:py-24 py-12">
    <div class="container mx-auto px-5">
        <div class="grid lg:grid-cols-2 grid-cols-1 gap-x-5 gap-y-12 items-center">
            <div class="max-w-xl order-2 lg:order-1">
                <?php 
                    if( $heading ) {
                        heading_2( $heading );
                    }

                    if( $accordion ) :
                        foreach( $accordion as $i =>$single ) :
                            if( $single ) :
                                $title = $single['title'];
                                $paragraph = $single['paragraph']; ?>

                                <div class="flex gap-4 mb-3 hy-accordion-item <?= $i === 0 ? 'active' : ''; ?>">
                                    <div>
                                        <div class="hy-accordion-bar h-full w-1 rounded-sm"></div>
                                    </div>

                                    <div class="py-2">
                                        <?php if( $title ) : ?>
                                            <h4 class="font-medium lg:text-2xl text-xl text-green"><?= $title; ?></h4>
                                        <?php endif; ?>

                                        <?php if( $paragraph ) : ?>
                                            <div class="hy-accordion-content">
                                                <p class="text-lg text-neutral-600 mt-2"><?= $paragraph; ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif;
                        endforeach;
                    endif; ?>
            </div>
            <div class="order-1 lg:order-2">
                <?= get_image( $image, '', 'rounded-3xl max-w-lg w-full lg:float-right mx-auto' ); ?>
            </div>
        </div>
    </div>
</section>