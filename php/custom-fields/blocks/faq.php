<?php
    $heading = get_field('heading') ?: get_field('heading', 'option');
    $repeater = get_field('repeater', 'option');
?>

<section class="my-section-lg">
    <div class="container mx-auto px-6">
        <?php if( $heading ) {
            heading_2( $heading, 'text-center mx-auto' );
        }

        echo '<div class="max-w-3xl mx-auto">';
            foreach( $repeater as $index => $item ): 
                if( $item && isset($item['question']) && isset($item['answer']) ): 
                    $question = $item['question'];
                    $answer = $item['answer'];
                    $unique_id = 'faq-' . $index; ?>

                    <div class="bg-white border-b border-gray-200">
                        <button class="accordion-trigger w-full py-4 text-left flex justify-between items-center hover:bg-gray-50 text-xl cursor-pointer" 
                                data-target="<?php echo $unique_id; ?>">
                            <span class="text-gray-800 font-medium"><?php echo esc_html($question); ?></span>
                            <div class="accordion-icon w-8 h-8 bg-light-green rounded-full flex items-center justify-center relative">
                                <div class="w-4 h-cross bg-white absolute"></div><div class="w-4 h-cross bg-white absolute rotate-90"></div>
                            </div>
                        </button>
                        <div id="<?php echo $unique_id; ?>" class="accordion-content px-6">
                            <p class="text-gray-600 mb-4"><?php echo wp_kses_post($answer); ?></p>
                        </div>
                    </div>

                <?php endif;
            endforeach;
        echo '</div>'; ?>
    </div>
</section>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            const accordionTriggers = document.querySelectorAll('.accordion-trigger');
            
            accordionTriggers.forEach(trigger => {
                trigger.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const content = document.getElementById(targetId);
                    const icon = this.querySelector('.accordion-icon');
                    
                    // Close all other accordions
                    accordionTriggers.forEach(otherTrigger => {
                        if (otherTrigger !== this) {
                            const otherTargetId = otherTrigger.getAttribute('data-target');
                            const otherContent = document.getElementById(otherTargetId);
                            const otherIcon = otherTrigger.querySelector('.accordion-icon');
                            
                            otherContent.classList.remove('active');
                            otherIcon.classList.remove('rotated');
                        }
                    });
                    
                    // Toggle current accordion
                    content.classList.toggle('active');
                    icon.classList.toggle('rotated');
                });
            });
        });
    </script>