<?php
/**
 * Archive template.
 *
 * @package Paragon_Lite
 */

get_header();
?>
<div class="wrap main-layout <?php echo is_active_sidebar('sidebar-1') ? 'has-sidebar' : ''; ?>">
    <main class="content-area">
        <header class="entry">
            <?php the_archive_title('<h1 class="entry-title">', '</h1>'); ?>
            <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
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
                <h2><?php esc_html_e('No posts found', 'paragon-lite'); ?></h2>
            </section>
        <?php endif; ?>
    </main>

    <?php get_sidebar(); ?>
</div>
<?php
get_footer();
