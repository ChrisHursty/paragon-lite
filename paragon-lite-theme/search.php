<?php
/**
 * Search results template.
 *
 * @package Paragon_Lite
 */

get_header();
?>
<div class="wrap main-layout <?php echo is_active_sidebar('sidebar-1') ? 'has-sidebar' : ''; ?>">
    <main class="content-area">
        <header class="entry">
            <h1 class="entry-title">
                <?php
                printf(
                    esc_html__('Search results for: %s', 'paragon-lite'),
                    '<span>' . esc_html(get_search_query()) . '</span>'
                );
                ?>
            </h1>
        </header>

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
                    <?php the_title(sprintf('<h2 class="entry-title"><a href="%s">', esc_url(get_permalink())), '</a></h2>'); ?>
                    <div class="entry-content"><?php the_excerpt(); ?></div>
                </article>
            <?php endwhile; ?>

            <div class="pagination"><?php the_posts_pagination(); ?></div>
        <?php else : ?>
            <section class="no-results">
                <h2><?php esc_html_e('No results found', 'paragon-lite'); ?></h2>
                <p><?php esc_html_e('Please try another search.', 'paragon-lite'); ?></p>
                <?php get_search_form(); ?>
            </section>
        <?php endif; ?>
    </main>

    <?php get_sidebar(); ?>
</div>
<?php
get_footer();
