<?php
/**
 * Footer template.
 *
 * @package Paragon_Lite
 */
?>
<footer class="site-footer" role="contentinfo">
    <div class="wrap">
        <nav aria-label="<?php esc_attr_e('Footer Menu', 'paragon-lite'); ?>">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer',
                'menu_id'        => 'footer-menu',
                'fallback_cb'    => false,
            ));
            ?>
        </nav>
        <div class="site-info">
            <?php
            printf(
                esc_html__('© %1$s %2$s. Powered by WordPress.', 'paragon-lite'),
                esc_html(wp_date('Y')),
                esc_html(get_bloginfo('name'))
            );
            ?>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
