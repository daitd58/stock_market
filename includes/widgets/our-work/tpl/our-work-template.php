<?php $heading = isset($instance['heading']) ? $instance['heading'] : 'Our Work'; ?>
<div class="stock-market-our-work">
    <h3 class="heading">
        <?php echo $heading ?>
    </h3>
    <div class="content">
        <?php
        $number = 0;
        $recent_posts = wp_get_recent_posts();
        foreach ($recent_posts as $recent) {
            if ($number == 6) break;
            if (has_post_thumbnail($recent['ID'])):
                $number ++;
                ?>
                <a href="<?php echo get_permalink($recent['ID']) ?>">
                    <?php
                    echo get_the_post_thumbnail($recent['ID'], 'thumbnail');

                    ?>
                </a>
            <?php endif;
        }
        wp_reset_query();
        ?>
    </div>
</div>
