<?php
    $label = get_field('content')['label'];
    $heading = get_field('content')['heading'];
    $paragraph = get_field('content')['paragraph'];
    $bg_image = get_field('more')['bg_image'];
    $button = get_field('more')['button'];
    $shortcode = get_field('more')['shortcode'];
?>

<section style="background: url(<?=  $bg_image; ?>) center center/ cover no-repeat;" class="lg:h-780 pb-21 pt-38 lg:py-0">
    <div class="container mx-auto h-full px-5 pt-[78px]">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-8 gap-y-14 h-full items-center">
            <div class="block">
                <?php 
                    if( $label ) {
                        echo '<h5 class="mb-5 md:text-xl text-lg text-light-green">' . $label . '</h5>';
                    }
                    if( $heading ) {
                        echo '<h1 class="font-avenir mb-5 md:text-6xl text-4xl font-bold text-white leading-2 max-w-xl">' . $heading . '</h1>';
                    }
                    if( $paragraph ) {
                        echo '<p class="text-white md:text-xl text-lg max-w-sm">' . $paragraph . '</p>';
                    }
                    if( $button ) {
                        echo button_1($button['url'], $button['target'], $button['title'], 'mt-7');
                    }
                ?> 
            </div>
            <div>
                <?php if(  $shortcode ) : ?>
                    <div>
                        <?= do_shortcode( $shortcode ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>