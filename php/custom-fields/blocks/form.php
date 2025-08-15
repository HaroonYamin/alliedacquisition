<?php
    $bg_image = get_field('bg_image');
    $heading = get_field('heading');
    $paragraph = get_field('paragraph');

    $icon_text = get_field('icon_text');
    $icon = $icon_text['icon'];
    $title = $icon_text['title'];
    $bold_title = $icon_text['bold_title'];

    $note_text = get_field('note_text');
    $button = get_field('button');
    $shortcode = get_field('shortcode');
?>

<section style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25)), url(<?=  $bg_image; ?>) center center/ cover no-repeat;" class="md:h-780 py-12">
    <div class="container mx-auto h-full px-5">
        <div class="grid md:grid-cols-2 grid-cols-1 gap-x-8 gap-y-12 h-full items-center">
            <div class="block">
                <div class="max-w-lg">
                    <?php
                        if( $heading ) {
                            echo '<h1 class="font-avenir mb-5 md:text-6xl text-4xl font-bold text-white leading-2 max-w-xl">' . $heading . '</h1>';
                        }

                        if( $paragraph ) {
                            echo '<p class="text-white lg:text-lg/normal text-lg/tight mt-3">' . $paragraph . '</p>';
                        }

                        if( !empty( $icon_text ) ) {
                            echo '<div class="flex items-center sm:gap-x-6 gap-x-4 mt-7">';
                                if( $icon ) {
                                    echo '<img src="' . $icon . '" alt="' . $title . '" class="sm:max-w-[70px] max-w-[50px] h-auto">';
                                }

                                echo '<div>';
                                    if( $title ) {
                                        echo '<p class="text-white sm:text-lg text-sm font-semibold">' . $title . '</p>';
                                    }
                                    if( $bold_title ) {
                                        echo '<p class="text-light-green sm:text-lg text-sm font-semibold">' . $bold_title . '</p>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        }

                        if(  $note_text ) {
                            echo '<p class="text-white lg:text-lg/normal text-lg/tight mt-7 font-semibold">' . $note_text . '</p>';
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