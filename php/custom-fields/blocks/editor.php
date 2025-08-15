<?php
    $editor = get_field('editor');

    if( !$editor ) {
        return;
    }
?>

<section class="md:mt-24 md:mb-38 my-12">
    <div class="max-w-3xl mx-auto px-5" id="editor">
        <?= $editor; ?>
    </div>
</section>

<style>
    #editor h2 {
        font-size: 2rem;
        font-weight: 600;
        margin: 2rem 0 0.5rem 0;
    }
    #editor h3 {
        font-size: 1.25rem;
        font-weight: 600;
        margin: 2rem 0 0.5rem 0;
    }
    #editor p {
        margin: 0.6rem 0;
    }
    #editor strong {
        font-weight: 600;
    }
    #editor ul {
        list-style: disc;
        padding-left: 1.25rem;
    }
    #editor li {
        margin: 0.25rem 0;
    }
    #editor a {
        text-decoration: underline;
        color: var(--color-green);
    }
</style>