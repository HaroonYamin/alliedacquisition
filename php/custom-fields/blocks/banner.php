<?php
    $heading = get_field('heading');
    $paragraph = get_field('paragraph');
    $link = get_field('button');
    $bg_image = get_field('bg_image');
?>

<section style="background: url(<?=  $bg_image; ?>) center center/ cover no-repeat;" class="lg:h-[505px] pb-21 pt-38 lg:py-0">
    <div class="container mx-auto h-full px-5 pt-[78px]">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-8 gap-y-14 h-full items-center">
            <div class="block">
                <?php 
                    if( $heading ) {
                        echo '<h1 class="font-avenir mb-5 md:text-6xl text-4xl font-bold text-white leading-2 max-w-xl">' . $heading . '</h1>';
                    }
                    if( $paragraph ) {
                        echo '<p class="text-white md:text-xl text-lg max-w-sm">' . $paragraph . '</p>';
                    }
                    if( $link ) {
                        echo '<div class="mt-5">';
                            echo button_1($link['url'], $link['target'], $link['title']);
                        echo '</div>';
                    }
                ?> 
            </div>
        </div>
    </div>
</section>