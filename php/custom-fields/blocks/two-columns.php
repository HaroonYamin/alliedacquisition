<?php
    $content = get_field('content');
    $heading = $content['heading'];
    $image = $content['image'];
    $bullets = $content['bullets'];

    $buttons = get_field('buttons');
    $link = $buttons['link'];
    $link_2 = $buttons['link_2'];
?>

<section class="py-section bg-gray-50">
    <div class="container mx-auto px-5">
        <div class="grid grid-cols-2 gap-5 items-center">
            <div class="max-w-xl">
                <?php heading_2( $heading ); ?>

                <?php if( $bullets ) :
                    foreach( $bullets as $bullet ) :
                        if( $bullet ) : ?>
                            <div class="flex flex-row gap-x-4 mb-4">
                                <div class="min-w-3 w-3 h-3 bg-light-green rounded-full translate-y-2"></div>
                                <p class="font-avenir text-xl text-green font-medium"><?= $bullet['points']; ?></p>
                            </div>
                        <?php endif;
                    endforeach;
                endif; ?>

                <?php if( $link || $link_2 ) : ?>
                    <div class="flex flex-row gap-3 mt-10">
                        <?php
                            if( $link ) {
                                echo '<a href="' . esc_url($link['url']) . '" target="' . esc_attr($link['target']) . '" class="bg-light-green border border-light-green py-3 px-14 text-white rounded-full hover:bg-lime-500 hover:border-lime-500 transition-colors inline-block">' . esc_html($link['title']) . '</a>';
                            }

                            if( $link_2 ) {
                                echo '<a href="' . esc_url($link_2['url']) . '" target="' . esc_attr($link_2['target']) . '" class="color-light-green border border-light-green py-3 px-8 text-green rounded-full hover:bg-light-green hover:text-white transition-colors inline-block">' . esc_html($link_2['title']) . '</a>';
                            }
                        ?>
                    </div>
                <?php endif; ?>
            </div>
            <div>
                <?= get_image( $image, '', 'rounded-3xl max-w-lg float-right' ); ?>
            </div>
        </div>
    </div>
</section>