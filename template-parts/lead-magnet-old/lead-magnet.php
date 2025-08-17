<?php
    $enable = get_field('hy_lead_enable_this_feature', 'option');
    if( !$enable && isset( $enable ) ) {
        return;
    }

    $page = get_field('enable_in_the_pages', 'option');
    if (!is_array($page)) {
        return;
    }

    $current_id = get_queried_object_id();
    if (!in_array($current_id, $page)) {
        return;
    }

    $spacing_desktop = get_field('hy_lead_top_spacing', 'option')['desktop'] ?: 0;
    $spacing_mobile = get_field('hy_lead_top_spacing', 'option')['mobile'] ?: 0;
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

<section class="absolute inset-0 z-20" id="hy-lead-magnet-section" data-spacing="<?= $spacing_desktop; ?>" data-mobile="<?= $spacing_mobile; ?>">
    <script>
        const leadSection = document.getElementById("hy-lead-magnet-section");
        const mobileSpacing = leadSection.getAttribute("data-mobile");
        const sectionSpacing = leadSection.getAttribute("data-spacing");

        if (window.innerWidth < 768) {
            leadSection.style.top = `${mobileSpacing}px`;
        } else {
            leadSection.style.top = `${sectionSpacing}px`;
        }
    </script>

    <div id="hy-lead-magnet-bg" class="fixed top-0 left-0 w-screen h-screen pointer-events-none" onclick="leadMagnet();"></div>
    
    <div class="sm:max-w-4xl max-w-[380px] w-full px-5 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-30" id="hy-lead-magnet-content">
        <button class="opacity-75 hover:opacity-100 sm:hidden relative left-[calc(100%-40px)]" onclick="leadMagnet();">
            <?= get_svg('icon-cross', 'w-8 h-8 my-svg-white'); ?>
        </button>

        <div class="bg-white sm:p-8 p-4 rounded-xl relative">
            <button class="absolute top-2 right-2 cursor-pointer opacity-50 hover:opacity-100 hidden sm:block" onclick="leadMagnet();">
                <?= get_svg('icon-cross', 'w-8 h-8'); ?>
            </button>
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

<script>
    document.addEventListener("scroll", function () {
        // Lead Magnet
        const section = document.getElementById("hy-lead-magnet-section");

        const bg = document.getElementById("hy-lead-magnet-bg");
        const rect = section.getBoundingClientRect();
        const windowHeight = window.innerHeight;
        const sectionCenter = rect.top + rect.height / 2;

        const effectRange = 1000;
        const distanceFromCenter = Math.abs(sectionCenter - windowHeight / 2);

        if (distanceFromCenter <= effectRange) {
            const opacity = 1 - distanceFromCenter / effectRange;
            bg.style.backgroundColor = `rgba(0, 0, 0, ${opacity * 0.8})`;
        } else {
            bg.style.backgroundColor = `rgba(0, 0, 0, 0)`;
        }
    });
</script>