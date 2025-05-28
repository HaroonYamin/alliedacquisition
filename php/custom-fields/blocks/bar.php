<?php $bullets = get_field('bullets');
if(  $bullets ): ?>

    <section class="bg-cream py-8">
        <div class="container mx-auto px-5">
            <div class="flex flex-row flex-wrap justify-center gap-y-8">
                <?php
                    foreach( $bullets as $bullet ) :
                        if( $bullet ):
                            echo '<p class="font-avenir text-green text-xl font-bold mx-8 text-center">' . $bullet['point'] . '</p>';
                        endif;
                    endforeach;
                ?>
            </div> 
        </div>
    </section>

<?php endif; ?>