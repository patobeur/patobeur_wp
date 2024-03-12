<div class="content-page">
    <?php
    the_content();

    wp_link_pages(array(
        'before' => '<div class="page-links patates">' . esc_html__('Pages:', 'your-text-domain') . '</div>',
        'after'  => '</div>',
    ));
    ?>
</div>