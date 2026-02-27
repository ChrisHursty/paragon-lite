<?php
/**
 * Main fallback template.
 *
 * @package Paragon_Lite
 */

get_header();
?>
<div class="wrap main-layout <?php echo is_active_sidebar('sidebar-1') ? 'has-sidebar' : ''; ?>">
    <main id="primary-content" class="content-area" tabindex="-1">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
                    <header class="entry-header">
                        <?php if (has_post_thumbnail()) : ?>
                            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                                <?php the_post_thumbnail('large'); ?>
                            </a>
                        <?php endif; ?>
                        <?php the_title(sprintf('<h2 class="entry-title"><a href="%s">', esc_url(get_permalink())), '</a></h2>'); ?>
                        <div class="entry-meta">
                            <?php
                            printf(
                                esc_html__('Posted on %1$s by %2$s', 'paragon-lite'),
                                esc_html(get_the_date()),
                                esc_html(get_the_author())
                            );
                            ?>
                        </div>
                    </header>

                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
            <?php endwhile; ?>

            <div class="pagination">
                <?php the_posts_pagination(); ?>
            </div>
        <?php else : ?>
            <section class="no-results">
                <h2><?php esc_html_e('Nothing found', 'paragon-lite'); ?></h2>
                <p><?php esc_html_e('It looks like nothing matched your search. Try searching for something else.', 'paragon-lite'); ?></p>
                <?php get_search_form(); ?>
            </section>
        <?php endif; ?>
    </main>

    <?php get_sidebar(); ?>
</div>
<?php
get_footer();
