<?php
/**
 * 404 template.
 *
 * @package Paragon_Lite
 */

get_header();
?>
<div class="wrap main-layout">
    <main id="primary-content" class="content-area" tabindex="-1">
        <section class="entry">
            <h1 class="entry-title"><?php esc_html_e('Page not found', 'paragon-lite'); ?></h1>
            <p><?php esc_html_e('The page you are looking for does not exist or may have moved.', 'paragon-lite'); ?></p>
            <?php get_search_form(); ?>
        </section>
    </main>
</div>
<?php
get_footer();
