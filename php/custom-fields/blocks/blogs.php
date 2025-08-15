<?php
    $heading = get_field('heading');
    $blogs = get_field('blogs');
    $buttons = get_field('buttons');
    $link = $buttons['link'];
    $link_2 = $buttons['link_2'];
?>

<section class="md:my-24 mt-12 mb-24">
    <div class="container mx-auto px-5">
        <?php 
            if( $heading ) :
                heading_2( $heading, 'text-center mx-auto' );
            endif;
        ?>

        <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-x-5 gap-y-12">
            <?php if( !empty($blogs) ) :
                foreach( $blogs as $blog ): 
                    if( $blog ): ?>
                        <article>
                            <a href="<?= get_the_permalink( $blog); ?>" class="opacity-animation">
                                <div class="bg-green overflow-hidden rounded-3xl grid">
                                    <?= get_image( get_the_post_thumbnail_url( $blog ), 'medium', 'rounded-sm h-75 w-full object-cover' ); ?>
                                </div>

                                <h3 class="text-2xl font-semibold mt-4 card-title"><?= get_the_title( $blog ); ?></h3>
                                <p class="text-gray-600 mt-2 truncate-3"><?= get_the_excerpt( $blog ); ?></p>
                            </a>
                        </article>
                    <?php endif;
                endforeach;
            endif; ?>
        </div>

        <?php if( $link || $link_2 ) : ?>
            <div class="flex sm:flex-row flex-col justify-center flex-wrap gap-3 mt-12">
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