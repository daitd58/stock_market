<?php $heading = isset($instance['heading']) ? $instance['heading'] : 'Mã cổ phiếu'; ?>
<div class="stock-market-stock-ticker">
    <h3 class="heading">
        <?php echo $heading ?>
    </h3>
    <div class="content">
        <?php
        $categories = get_categories(array(
            'orderby' => 'date',
            'order' => 'ASC',
            'parent' => 0,
        ));
        foreach ($categories as $category) {
            $category_link = sprintf('<a href="%1$s" alt="%2$s"><i class="fa fa-send"></i>%3$s</a>',
                esc_url(get_category_link($category->term_id)),
                esc_attr(sprintf(__('View all posts in %s', 'textdomain'), $category->name)),
                esc_html($category->name)
            );
            ?>
            <div class="post-title">
                <?php echo $category_link ?>
            </div>
            <?php
        }
        wp_reset_query();
        ?>
    </div>
</div>
