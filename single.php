<?php 
    get_header();

    $id = get_queried_object_id();
    $title = get_post_field( 'post_title', $id );
    $date = get_the_date( 'F j, Y' );
    $author_id = get_post_field( 'post_author', $id );
    $author = get_the_author_meta( 'display_name', $author_id );
?>

<main id="<?php echo get_post_field( 'post_name', get_post() ); ?>">
    <div class="bg-neutral-700 h-[106px] w-full"></div>

    <section class="md:my-24 my-12">
        <div class="container mx-auto px-5">
            <div class="grid grid-cols-12 gap-x-8 gap-y-12 items-center">
                <div class="col-span-1 xl:block hidden lg:order-1"></div>
                <div class="xl:col-span-5 lg:col-span-6 col-span-12 order-2">
                    <?php
                        if( $title ) {
                            echo heading_2( $title );
                        }

                        echo '<div class="flex flex-wrap items-center gap-x-10 gap-y-4">';
                            if( $date ) {
                                echo '<div class="flex items-center gap-x-2.5 text-gray-600">';
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--color-light-green)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-days-icon lucide-calendar-days"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/><path d="M8 14h.01"/><path d="M12 14h.01"/><path d="M16 14h.01"/><path d="M8 18h.01"/><path d="M12 18h.01"/><path d="M16 18h.01"/></svg>';
                                    echo $date;
                                echo '</div>';
                            }
                            if( $author ) {
                                echo '<div class="flex items-center gap-x-2.5 text-gray-600">';
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--color-light-green)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-signature-icon lucide-signature"><path d="m21 17-2.156-1.868A.5.5 0 0 0 18 15.5v.5a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1c0-2.545-3.991-3.97-8.5-4a1 1 0 0 0 0 5c4.153 0 4.745-11.295 5.708-13.5a2.5 2.5 0 1 1 3.31 3.284"/><path d="M3 21h18"/></svg>';
                                    echo $author;
                                echo '</div>';
                            }
                        echo '</div>';
                    ?>
                </div>
                <div class="lg:col-span-6 col-span-12 lg:order-3 order-1">
                    <?php 
                        if( get_post_thumbnail_id( $id ) ) :
                            echo get_image( get_post_thumbnail_id( $id ), 'full', 'w-full rounded-xl' );
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container mx-auto px-5">
            <div class="grid grid-cols-3 gap-x-12 gap-y-16">
                <div id="hy-single-content" class="lg:col-span-2 col-span-3">
                    <?= the_content(); ?>
                </div>

                <div class="lg:col-span-1 col-span-3">
                    <div class="sticky top-12">
                        <?= heading_3( 'Related Blogs' ); ?>
                        <div class="flex flex-col gap-y-5">
                            <?php
                                $more= array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 3,
                                    'post_status' => 'publish',
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                    'post__not_in'   => array( $id )
                                );
                                $related_blogs = new WP_Query( $more );
    
                                if( $related_blogs ) :
                                    foreach(  $related_blogs->posts as $single ) :
                                        $title = get_post_field( 'post_title', $single->ID );
                                        $excerpt = get_post_field( 'post_excerpt', $single->ID );
                                        $date = get_the_date( 'F j, Y', $single->ID );
                                        $author_id = get_post_field( 'post_author', $single->ID );
                                        $author = get_the_author_meta( 'display_name', $author_id );
                                        $thumbnail_id = get_post_thumbnail_id( $single->ID );
                                        $thumbnail = get_image( $thumbnail_id, 'full', 'w-full h-[125px] rounded-lg' ); ?>
    
                                        <article class="opacity-animation">
                                            <a href="<?= get_the_permalink( $single ); ?>" class="flex flex-row gap-x-3 gap-y-6 items-center">
                                                <div class="w-1/3">
                                                    <div class="bg-green overflow-hidden rounded-3xl grid">
                                                        <?php
                                                            if( $thumbnail_id ) {
                                                                echo $thumbnail;
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="w-2/3">
                                                    <?php
                                                        if( $title ) {
                                                            echo '<h3 class="font-inter text-green text-xl font-medium mb-1 card-title">' . $title . '</h3>';
                                                        }
    
                                                        if( $excerpt ) {
                                                            echo '<p class="text-gray-600 truncate-2">' . $excerpt . '</p>';
                                                        }
                                                    ?>
                                                </div>
                                            </a>
                                        </article>
                                    <?php endforeach;
                                endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>