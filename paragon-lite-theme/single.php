<?php
/**
 * Single post template.
 *
 * @package Paragon_Lite
 */

get_header();
?>
<div class="wrap main-layout <?php echo is_active_sidebar('sidebar-1') ? 'has-sidebar' : ''; ?>">
    <main class="content-area">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
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
                    <?php the_content(); ?>
                    <?php wp_link_pages(); ?>
                </div>

                <footer class="entry-footer">
                    <?php the_category(', '); ?>
                </footer>
            </article>

            <?php the_post_navigation(); ?>

            <?php
            if (comments_open() || get_comments_number()) {
                comments_template();
            }
            ?>
        <?php endwhile; ?>
    </main>

    <?php get_sidebar(); ?>
</div>
<?php
get_footer();
