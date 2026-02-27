<?php
/**
 * Comments template.
 *
 * @package Paragon_Lite
 */

if (post_password_required()) {
    return;
}
?>
<section id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            printf(
                esc_html(_nx('One comment', '%1$s comments', get_comments_number(), 'comments title', 'paragon-lite')),
                esc_html(number_format_i18n(get_comments_number()))
            );
            ?>
        </h2>

        <ol class="comment-list">
            <?php wp_list_comments(array('style' => 'ol', 'short_ping' => true)); ?>
        </ol>

        <?php the_comments_navigation(); ?>
    <?php endif; ?>

    <?php
    if (! comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
        ?>
        <p><?php esc_html_e('Comments are closed.', 'paragon-lite'); ?></p>
    <?php endif; ?>

    <?php comment_form(); ?>
</section>
