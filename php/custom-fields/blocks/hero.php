<?php
    $label = get_field('content')['label'];
    $heading = get_field('content')['heading'];
    $paragraph = get_field('content')['paragraph'];
    $badges = get_field('badges');
    $bg_image = get_field('more')['bg_image'];
    $button = get_field('more')['button'];
    $shortcode = get_field('more')['shortcode'];
?>

<section style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25)), url(<?=  $bg_image; ?>) center center/ cover no-repeat;" class="lg:h-780 pb-21 pt-18 lg:py-0" id="scroll-to-form">
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
                    if( $badges ) {
                        echo '<div class="mt-5 flex flex-row flex-wrap gap-y-3 gap-x-5">';
                        foreach(  $badges as $badge ) {
                            $text = $badge['text'];
                            if( $text ) {
                                echo '<div class="flex gap-x-3 items-center">';
                                    echo '<svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="#afd645" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>';
                                    echo '<p class="text-white/80 md:text-xl text-lg">' . $text . '</p>';
                                echo '</div>';
                            }
                        }
                        echo '</div>';
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