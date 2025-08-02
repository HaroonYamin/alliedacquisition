<?php
    $heading = get_field('heading');
    $card_shadow = get_field('card_shadow');
    $cards = get_field('cards');
    $buttons = get_field('buttons');
    $link = $buttons['link'];
    $link_2 = $buttons['link_2'];

    $shadow = $card_shadow ? 'shadow-card border-gray-400' : 'border-gray-200 ';
?>

<section class="md:mt-section md:mb-section-md my-12" id="<?= $card_shadow ? 'card-section-2' : 'card-section-1'; ?>">
    <div class="container mx-auto px-5">
        <?php heading_2( $heading, 'text-center mx-auto' ); ?>

        <?php if( $cards ) : ?>
            <div class="grid lg:grid-cols-3 grid-cols-1 gap-5">
                <?php foreach( $cards as $card ) :
                    if( $card ) : ?>
                        <div class="border py-4 px-6 rounded-xl <?= $shadow; ?>">
                            <?= get_image( $card['icon'], 'medium', 'h-12 w-12 mb-4' ); ?>

                            <?php heading_4( $card['title'] ); ?>

                            <p class="max-w-sm lg:text-xl text-lg text-gray-600"><?= $card['paragraph']; ?></p>
                        </div>
                    <?php endif;
                endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if( $link || $link_2 ) : ?>
            <div class="flex flex-row flex-wrap justify-center gap-3 mt-10">
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
</section>