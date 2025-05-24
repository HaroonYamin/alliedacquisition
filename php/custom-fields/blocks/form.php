<?php
    $heading = get_field('heading');
    $bg_image = get_field('bg_image');
    $button = get_field('button');
    $shortcode = get_field('shortcode');
?>

<section style="background: url(<?=  $bg_image; ?>) center center/ cover no-repeat;" class="h-780">
    <div class="container mx-auto h-full px-5">
        <div class="grid grid-cols-2 gap-8 h-full items-center">
            <div class="block">
                <div class="max-w-md">
                    <?php
                        if( $heading ) {
                            echo '<h1 class="font-avenir mb-5 text-6xl font-bold text-white leading-2 max-w-xl">' . $heading . '</h1>';
                        }
                        if( $button ) {
                            echo '<a href="' . $button['url'] . '" class="mt-7 bg-light-green border border-light-green py-3 px-8 text-white rounded-full hover:bg-lime-500 hover:border-lime-500 transition-colors inline-block" target="' . $button['target'] . '">' . $button['title'] . '</a>';
                        }
                    ?>  
                </div>
            </div>
            <?php if(  $shortcode ) : ?>
                <div>
                    <?= do_shortcode( $shortcode ); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>