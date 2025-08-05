<?php 
    get_header();

    $id = get_queried_object_id();
?>

<main id="<?php echo get_post_field( 'post_name', get_post() ); ?>">
    <div class="bg-neutral-700 h-[106px] w-full"></div>

    <section class="md:my-24 mt-12 mb-24">
        <div class="container mx-auto px-5">
            <div class="grid grid-cols-12 gap-x-8 gap-y-12 items-center">
                <div class="col-span-1 xl:block hidden lg:order-1"></div>
                <div class="xl:col-span-5 lg:col-span-6 col-span-12 order-2">
                    <?php
                        if( get_post_field( 'post_title', $id ) ) {
                            echo heading_2( get_post_field( 'post_title', $id ) );
                        }
                        if( get_post_field( 'post_excerpt', $id ) ) {
                            echo '<div class="mt-6 text-xl max-w-[550px]">' . get_post_field( 'post_excerpt', $id ) . '</div>';
                        }
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

</main>

<?php get_footer(); ?>