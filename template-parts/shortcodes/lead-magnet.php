<?php
    $enable = get_field('hy_lead_enable_this_feature', 'option');

    if( !$enable ) {
        return;
    }

    $group = get_field('hy_lead_image_group', 'option');
    $image = $group['image'];
    $content = $group['content'];
    $heading = $content['heading'];
    $sub_heading = $content['sub_heading'];
    $paragraph = $content['paragraph'];
    $shortcode = $content['shortcode'];
?>

<style>
    #hy-lead-magnet-bg {
        transition: background-color 0.3s ease;
        background-color: rgba(0, 0, 0, 0);
    }
</style>

<div class="relative">
<section class="absolute inset-0 z-20" id="hy-lead-magnet-section">
    <div id="hy-lead-magnet-bg" class="fixed top-0 left-0 w-screen h-screen pointer-events-none" onclick="leadMagnet();"></div>
    
    <div class="sm:max-w-4xl max-w-[380px] w-full px-5 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-30">
        <button class="opacity-75 hover:opacity-100 sm:hidden relative left-[calc(100%-40px)]" onclick="leadMagnet();"><?= get_svg('icon-cross', 'w-8 h-8 my-svg-white'); ?></button>

        <div class="bg-white sm:p-8 p-4 rounded-xl">
            <button class="float-right cursor-pointer opacity-50 hover:opacity-100 hidden sm:block" onclick="leadMagnet();"><?= get_svg('icon-cross', 'w-8 h-8'); ?></button>
            <div class="flex gap-y-7 flex-wrap items-center sm:space-x-7 w-full">
                <div class="sm:w-[calc(50%-14px)] w-full">
                    <?php
                        if( $image ) {
                            echo get_image( 'http://localhost/alliedacquisition/wp-content/uploads/2025/05/contractor.png', '', 'rounded-2xl w-full sm:h-auto h-[200px] object-cover' ); 
                        }
                    ?>
                </div>
                <div class="sm:w-[calc(50%-14px)] w-full">
                    <div class="sm:mb-20 mb-5">
                        <?php
                            if( $heading ) {
                                echo heading_3( $heading );
                            }
                            if( $sub_heading ) {
                                echo heading_5( $sub_heading );
                            }
                            if( $paragraph ) {
                                echo '<p class="font-inter">' . $paragraph . '</p>';
                            }
                        ?>
                    </div>

                    <div>
                        <?php
                            if( $shortcode ) {
                                echo do_shortcode( $shortcode );
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
