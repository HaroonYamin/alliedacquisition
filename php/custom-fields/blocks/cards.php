<?php
    $heading = get_field('heading');
    $cards = get_field('cards');
    $buttons = get_field('buttons');
    $link = $buttons['link'];
    $link_2 = $buttons['link_2'];
?>

<section class="my-section">
    <div class="container mx-auto px-5">
        <?php heading_2( $heading, 'text-center mx-auto' ); ?>

        <?php if( $cards ) : ?>
            <div class="grid grid-cols-3 gap-5">
                <?php foreach( $cards as $card ) :
                    if( $card ) : ?>
                        <div class="border border-gray-200 py-4 px-6 rounded-xl">
                            <?= get_image( $card['icon'], 'medium', 'h-12 w-12 mb-4' ); ?>

                            <?php heading_4( $card['title'] ); ?>

                            <p class="max-w-sm text-xl text-gray-600"><?= $card['paragraph']; ?></p>
                        </div>
                    <?php endif;
                endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if( $link || $link_2 ) : ?>
            <div class="flex flex-row justify-center gap-3 mt-10">
                <?php
                    if( $link ) {
                        echo '<a href="' . esc_url($link['url']) . '" target="' . esc_attr($link['target']) . '" class="bg-light-green border border-light-green py-3 px-8 text-white rounded-full hover:bg-lime-500 hover:border-lime-500 transition-colors inline-block">' . esc_html($link['title']) . '</a>';
                    }

                    if( $link_2 ) {
                        echo '<a href="' . esc_url($link_2['url']) . '" target="' . esc_attr($link_2['target']) . '" class="color-light-green border border-light-green py-3 px-5 text-green rounded-full hover:bg-light-green hover:text-white transition-colors inline-block">' . esc_html($link_2['title']) . '</a>';
                    }
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>