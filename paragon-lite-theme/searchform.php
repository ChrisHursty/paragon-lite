<?php
/**
 * Search form template.
 *
 * @package Paragon_Lite
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text"><?php esc_html_e('Search for:', 'paragon-lite'); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search …', 'placeholder', 'paragon-lite'); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" />
    </label>
    <input type="submit" class="search-submit" value="<?php echo esc_attr_x('Search', 'submit button', 'paragon-lite'); ?>" />
</form>
