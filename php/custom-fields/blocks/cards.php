<?php
    $heading = get_field('heading');
    $cards = get_field('cards');
    $buttons = get_field('buttons');
?>

<section class="my-section">
    <div class="container mx-auto px-5">
        <?php heading_2( $heading, 'text-center mx-auto' ); ?>

        <?php if( $cards ) : ?>
            <div class="grid grid-cols-3 gap-5">
                <?php foreach( $cards as $card ) :
                    if( $card ) : ?>

                        <div class="border border-gray-200 p-5 rounded-xl">
                            
                        </div>

                    <?php endif;
                endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>