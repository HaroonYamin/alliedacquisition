<?php
    $label = get_field('content')['label'];
    $heading = get_field('content')['heading'];
    $paragraph = get_field('content')['paragraph'];
    $bg_image = get_field('more')['bg_image'];
    $button = get_field('more')['button'];
    $shortcode = get_field('more')['shortcode'];
?>

<section style="background: url(<?=  $bg_image; ?>) center center/ cover no-repeat;" class="h-780">
    <div class="container mx-auto h-full px-5">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 h-full items-center">
            <div class="block">
                <?php 
                    if( $label ) {
                        echo '<h5 class="mb-5 text-xl text-light-green">' . $label . '</h5>';
                    }
                    if( $heading ) {
                        echo '<h1 class="font-avenir mb-5 text-6xl font-bold text-white leading-2 max-w-xl">' . $heading . '</h1>';
                    }
                    if( $paragraph ) {
                        echo '<p class="text-white text-xl max-w-sm">' . $paragraph . '</p>';
                    }
                    if( $button ) {
                        echo '<a href="' . $button['url'] . '" class="mt-7 bg-light-green border border-light-green py-3 px-8 text-white rounded-full hover:bg-lime-500 hover:border-lime-500 transition-colors inline-block" target="' . $button['target'] . '">' . $button['title'] . '</a>';
                    }
                ?> 
            </div>
            <?php if(  $shortcode ) : ?>
                <div>
                    <?= do_shortcode( $shortcode ); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>