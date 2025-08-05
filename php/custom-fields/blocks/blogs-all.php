<?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $blogs = get_posts($args);
?>

<section class="md:my-section my-12">
    <div class="container mx-auto px-5">
        <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-x-5 gap-y-12">
            <?php if( !empty($blogs) ) :
                foreach( $blogs as $blog ): 
                    if( $blog ): ?>
                        <article>
                            <a href="<?= get_the_permalink( $blog); ?>" class="opacity-animation flex flex-col h-full">
                                <div class="bg-green overflow-hidden rounded-3xl grid">
                                    <?= get_image( get_the_post_thumbnail_url( $blog ), 'medium', 'rounded-sm h-75 w-full object-cover' ); ?>
                                </div>

                                <h3 class="text-2xl font-semibold mt-4 card-title grow"><?= get_the_title( $blog ); ?></h3>
                                <p class="text-gray-600 mt-2 truncate-3"><?= get_the_excerpt( $blog ); ?></p>
                            </a>
                        </article>
                    <?php endif;
                endforeach;
            endif; ?>
        </div>
    </div>
</section>