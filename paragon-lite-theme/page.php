<?php
/**
 * Page template.
 *
 * @package Paragon_Lite
 */

get_header();
?>
<div class="wrap main-layout <?php echo is_active_sidebar('sidebar-1') ? 'has-sidebar' : ''; ?>">
    <main id="primary-content" class="content-area" tabindex="-1">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                </header>

                <div class="page-content">
                    <?php the_content(); ?>
                    <?php wp_link_pages(); ?>
                </div>
            </article>

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
