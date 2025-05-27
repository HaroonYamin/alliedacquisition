<?php
    $content = get_field('content');
    $heading = $content['heading'];
    $image = $content['image'];
    $bullets = $content['bullets'];

    $buttons = get_field('buttons');
    $link = $buttons['link'];
    $link_2 = $buttons['link_2'];
?>

<section class="md:py-section py-12 bg-gray-50">
    <div class="container mx-auto px-5">
        <div class="grid lg:grid-cols-2 grid-cols-1 gap-x-5 gap-y-12 items-center">
            <div class="max-w-xl order-2 lg:order-1">
                <?php heading_2( $heading ); ?>

                <?php if( $bullets ) :
                    foreach( $bullets as $bullet ) :
                        if( $bullet ) : ?>
                            <div class="flex flex-row gap-x-4 mb-4">
                                <div class="min-w-3 w-3 h-3 bg-light-green rounded-full translate-y-2"></div>
                                <p class="font-avenir md:text-xl text-lg text-green font-medium"><?= $bullet['points']; ?></p>
                            </div>
                        <?php endif;
                    endforeach;
                endif; ?>

                <?php if( $link || $link_2 ) : ?>
                    <div class="flex flex-row flex-wrap gap-3 mt-10">
                        <?php
                            if( $link ) {
                                echo button_1($link['url'], $link['target'], $link['title']);
                            }

                            if( $link_2 ) {
                                echo button_2($link_2['url'], $link_2['target'], $link_2['title']);
                            }
                        ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="order-1 lg:order-2">
                <?= get_image( $image, '', 'rounded-3xl max-w-lg lg:float-right mx-auto' ); ?>
            </div>
        </div>
    </div>
</section>