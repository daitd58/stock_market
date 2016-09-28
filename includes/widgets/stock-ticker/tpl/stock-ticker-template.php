<?php $heading = isset($instance['heading']) ? $instance['heading'] : 'Our Work'; ?>
<?php $quantity = isset($instance['quantity']) ? $instance['quantity'] : '5'; ?>
<div class="stock-market-our-work">
    <div class="heading">
        <?php echo $heading ?>
    </div>
    <div class="content">
        <?php
        $args = array('numberposts' => $quantity);
        $recent_posts = wp_get_recent_posts($args);
        foreach ($recent_posts as $recent) {
            ?>
            <div class="post-title">
                <a href="<?php echo get_permalink($recent['ID']) ?>">
                    <?php echo $recent['post_title'] ?>
                </a>
            </div>
            <?php
        }
        wp_reset_query();
        ?>
    </div>
</div>
