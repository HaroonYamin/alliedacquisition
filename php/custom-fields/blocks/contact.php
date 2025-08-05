<?php
    $heading = get_field('heading');
    $paragraph = get_field('paragraph');
    $email = get_field('email_address');
    $telephone = get_field('telephone');
    $link = get_field('link');

    $form = get_field('form');
    $title = $form['title'];
    $form_text = $form['paragraph'];
    $shortcode = $form['shortcode'];
    $editor = $form['editor'];
?>

<section class="md:my-24 my-12">
    <div class="max-w-[1200px] mx-auto px-5">
        <div class="grid gap-x-6 gap-y-12 md:grid-cols-2 items-center">
            <div>
                <?php
                    if( $heading ) {
                        heading_2( $heading );
                    }

                    if( $paragraph ) {
                        echo '<p class="text-gray-600 mb-8 -mt-6 text-lg max-w-lg">' . $paragraph . '</p>';
                    }

                    if( $email ) {
                        echo '<div class="mb-4 flex items-center gap-x-2.5">';
                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--color-light-green)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone-icon lucide-phone"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"/></svg>';
                            echo '<a href="mailto:' . $email . '" class="text-gray-600 hover:text-light-green transition-colors">' . $email . '</a>';
                        echo '</div>';
                    }

                    if( $telephone ) {
                        echo '<div class="mb-4 flex items-center gap-x-2.5">';
                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--color-light-green)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail-icon lucide-mail"><path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"/><rect x="2" y="4" width="20" height="16" rx="2"/></svg>';
                            echo '<a href="tel:' . $telephone . '" class="text-gray-600 hover:text-light-green transition-colors">' . $telephone . '</a>';
                        echo '</div>';
                    }

                    if( $link ) {
                        echo '<div class="mt-8 flex items-center gap-x-2.5">';
                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--color-light-green)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-cog-icon lucide-user-cog"><path d="M10 15H6a4 4 0 0 0-4 4v2"/><path d="m14.305 16.53.923-.382"/><path d="m15.228 13.852-.923-.383"/><path d="m16.852 12.228-.383-.923"/><path d="m16.852 17.772-.383.924"/><path d="m19.148 12.228.383-.923"/><path d="m19.53 18.696-.382-.924"/><path d="m20.772 13.852.924-.383"/><path d="m20.772 16.148.924.383"/><circle cx="18" cy="15" r="3"/><circle cx="9" cy="7" r="4"/></svg>';
                            echo '<a href="' . $link['url'] . '" class="underline hover:text-light-green transition-colors">' . $link['title'] . '</a>';
                        echo '</div>';
                    }
                ?>
            </div>
            <div>
                <div class="">
                    <div class="rounded p-6 shadow">
                        <?php
                            if( $title ) {
                                echo heading_3( $title );
                            }

                            if( $form_text ) {
                                echo '<p class="text-gray-600 -mt-5 mb-6">' . $form_text . '</p>';
                            }
                            if( $shortcode ) {
                                echo do_shortcode( $shortcode );
                            }
                            if( $editor ) {
                                echo '<div class="hy-form-editor text-gray-600">';
                                    echo $editor;
                                echo '<div>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .hy-contact-wrapper {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
    }
    .hy-contact-row p {
        width: 100%;
    }
    .hy-contact-row.half,
    .hy-contact-row.full {
        width: 100%;
    }
    .hy-contact-row input:not([type="submit"]),
    .hy-contact-row textarea {
        border: 2px solid var(--color-gray-200);
        border-radius: 6px;
        padding: 1rem;
        width: 100%;
    }
    .hy-contact-row input[type="submit"] {
        background-color: var(--color-light-green);
        color: var(--color-white);
        border: none;
        border-radius: 50px;
        padding: 1rem 3rem;
        cursor: pointer;
        transition: all 0.2s ease;
        width: 100%;
    }
    .hy-contact-row input[type="submit"]:hover {
        background-color: var(--color-green);
    }
    .hy-form-editor p {
        text-align: center;
    }
    .hy-form-editor a {
        color: var(--color-green);
        text-decoration: underline;
    }
    .hy-form-editor a:hover {
        color: #000;
    }

    @media screen and (min-width: 990px) {
        .hy-contact-row.half {
            width: calc(50% - 8px);
        }
    }
</style>