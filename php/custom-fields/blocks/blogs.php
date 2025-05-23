<?php
    $heading = get_field('heading');
    $blogs = get_field('blogs');
    $buttons = get_field('buttons');
    $link = $buttons['link'];
    $link_2 = $buttons['link_2'];
?>

<section class="my-section">
    <div class="container mx-auto px-5">
        <?php 
            if( $heading ) :
                heading_2( $heading, 'text-center mx-auto' );
            endif;
        ?>

        <div class="grid grid-cols-4 gap-5">
            <?php foreach( $blogs as $blog ): 
                if( $blog ): ?>
                    <article>
                        <a href="<?= get_the_permalink( $blog); ?>">
                            <?= get_image( get_the_post_thumbnail_url( $blog ), 'medium', 'rounded-sm h-75 w-full object-cover' ); ?>

                            <h3 class="text-2xl font-semibold mt-4"><?= get_the_title( $blog ); ?></h3>
                            <p class="text-gray-600 mt-2"><?= get_the_excerpt( $blog ); ?></p>
                        </a>
                    </article>
                <?php endif;
            endforeach; ?>
        </div>

        <?php if( $link || $link_2 ) : ?>
            <div class="flex flex-row justify-center gap-3 mt-12">
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
</section>