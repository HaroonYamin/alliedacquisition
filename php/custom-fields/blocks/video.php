<?php
    $heading   = get_field('heading');
    $editor    = get_field('editor');
    $video     = get_field('video');
    $file      = $video['file'] ?? '';
    $url       = $video['url'] ?? '';
    $editor_2  = get_field('editor_2');

    $video_container = 'w-full max-w-4xl mx-auto md:h-[500px] h-[50vw]';
    $editor_container = 'w-full max-w-3xl mx-auto';
?>

<section class="md:my-24 my-12">
    <div class="container mx-auto px-5">
        <?php 
            if ( $heading ) {
                heading_2( $heading, 'text-center mx-auto' );
            }

            if ( $editor ) {
                echo '<div id="hy-single-content" class="mt-12 ' . $editor_container . '">';
                    echo $editor;
                echo '</div>';
            }

            if ( $file || $url ) : ?>
                <div class="video-wrapper my-12">
                    <?php if ( $file ) : ?>
                        <video controls class="<?= esc_attr( $video_container ); ?>">
                            <source src="<?= esc_url( $file ); ?>" type="video/mp4">
                            <source src="<?= esc_url( $file ); ?>" type="video/ogg">
                            <source src="<?= esc_url( $file ); ?>" type="video/webm">
                            Your browser does not support the video tag.
                        </video>
                    <?php elseif ( $url ) : ?>
                        <?php
                            if ( strpos( $url, 'youtube.com' ) !== false || strpos( $url, 'youtu.be' ) !== false ) {
                                preg_match( '/(?:youtu\.be\/|v=|embed\/)([^&?]+)/', $url, $matches );
                                $youtube_id = $matches[1] ?? '';
                                if ( $youtube_id ) :
                        ?>
                            <iframe class="<?= esc_attr( $video_container ); ?>"
                                src="https://www.youtube.com/embed/<?= esc_attr( $youtube_id ); ?>"
                                frameborder="0" allowfullscreen title="YouTube video player">
                            </iframe>
                        <?php
                                endif;
                            } elseif ( strpos( $url, 'vimeo.com' ) !== false ) {
                                preg_match( '/vimeo\.com\/(\d+)/', $url, $matches );
                                $vimeo_id = $matches[1] ?? '';
                                if ( $vimeo_id ) :
                        ?>
                            <iframe src="https://player.vimeo.com/video/<?= esc_attr( $vimeo_id ); ?>"
                                class="<?= esc_attr( $video_container ); ?>" frameborder="0" allowfullscreen title="Vimeo video player">
                            </iframe>
                        <?php
                                endif;
                            }
                        ?>
                    <?php endif; ?>
                </div>
        <?php 
            endif;

            if ( $editor_2 ) {
                echo '<div id="hy-single-content" class="' . $editor_container . '">';
                    echo $editor_2;
                echo '</div>';
            }
        ?>
    </div>
</section>
