<?php
    $heading = get_field('heading');
    $button = get_field('button');
    $cards = get_field('cards');
?>

<section class="md:py-section py-12 bg-gray-100">
    <div class="container mx-auto px-5">
        <div class="flex justify-between items-center flex-wrap">
            <div class="xl:w-1/6 lg:w-2/6 w-full xl:translate-x-24">
                <?php
                    if( $heading ) {
                        heading_2( $heading );
                    }

                    if( $button ) {
                        echo '<div class="hidden lg:inline-block">';
                            echo button_1($button['url'], $button['target'], $button['title']);
                        echo '</div>';
                    }
                ?>
            </div>
            <div class="xl:w-3/6 lg:w-4/6 w-full grid sm:grid-cols-2 gap-6">
                <?php if( $cards ) :
                    foreach( $cards as $i=> $card ) :
                        if( !empty( $card ) ) :
                            $title = $card['title'];
                            $paragraph = $card['paragraph']; ?>

                            <div class="px-4 py-8 shadow-card rounded-xl h-min <?= $i === 1 ? 'mt-auto' : ''; ?>">
                                <?php
                                    if( $title ) {
                                        echo '<h4 class="font-medium text-2xl mb-4 text-green">' . $title . '</h4>';
                                    }

                                    if( $paragraph ) {
                                        echo '<p class="text-lg text-neutral-600">' . $paragraph . '</p>';
                                    }
                                ?>
                            </div>

                        <?php endif;
                    endforeach;
                endif; ?>
            </div>

            <?php if( $button ) {
                echo '<div class="lg:hidden mt-12 mx-auto">';
                    echo button_1($button['url'], $button['target'], $button['title']);
                echo '</div>';
            } ?>
        </div>
    </div>
</section>