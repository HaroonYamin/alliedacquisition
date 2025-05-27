<?php
    $heading = get_field('heading');
    $bg_image = get_field('bg_image');
    $button = get_field('button');
    $shortcode = get_field('shortcode');
?>

<section style="background: url(<?=  $bg_image; ?>) center center/ cover no-repeat;" class="md:h-780 py-12">
    <div class="container mx-auto h-full px-5">
        <div class="grid md:grid-cols-2 grid-cols-1 gap-x-8 gap-y-12 h-full items-center">
            <div class="block">
                <div class="max-w-md">
                    <?php
                        if( $heading ) {
                            echo '<h1 class="font-avenir mb-5 md:text-6xl text-4xl font-bold text-white leading-2 max-w-xl">' . $heading . '</h1>';
                        }
                        if( $button ) {
                            echo button_1($button['url'], $button['target'], $button['title']);
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