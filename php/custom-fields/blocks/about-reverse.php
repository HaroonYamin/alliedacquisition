<?php
    $label_image = get_field('label_image');
    $heading = get_field('heading');
    $image = get_field('image');
    $editor = get_field('editor');

    $buttons = get_field('buttons');
    $link = $buttons['link'];
    $link_2 = $buttons['link_2'];
?>

<section class="md:py-section py-12">
    <div class="container mx-auto px-5">
        <div class="grid lg:grid-cols-2 grid-cols-1 gap-x-5 gap-y-12 items-center">
            <div>
                <?= get_image( $image, '', 'rounded-3xl max-w-lg w-full lg:mx-0 mx-auto' ); ?>
            </div>
            <div class="max-w-xl">
                <?php 
                    if( $label_image ) {
                        echo get_image( $label_image, '', 'max-w-14 mb-5' );
                    }
                    if( $heading ) {
                        heading_2( $heading );
                    }

                    if( $editor ) {
                        echo '<div class="lg:text-xl text-lg text-neutral-800 about-editor">' . $editor . '</div>';
                    }
                ?>

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
        </div>
    </div>
</section>