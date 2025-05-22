<?php $bullets = get_field('bullets');
if(  $bullets ): ?>

    <section class="bg-cream py-8">
        <div class="container mx-auto">
            <div class="flex flex-row col-gap-8 justify-center">
                <?php
                    foreach( $bullets as $bullet ) :
                        if( $bullet ):
                            echo '<p class="text-green text-xl font-bold">' . $bullet['point'] . '</p>';
                        endif;
                    endforeach;
                ?>
            </div>
        </div>
    </section>

<?php endif; ?>