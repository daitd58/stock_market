<?php $heading = isset($instance['heading']) ? $instance['heading'] : 'Our Work'; ?>
<div class="stock-market-our-work">
    <h3 class="heading">
        <?php echo $heading ?>
    </h3>
    <div class="content">
        <?php
        $args = array('numberposts' => '6');
        $recent_posts = wp_get_recent_posts($args);
        foreach ($recent_posts as $recent) {
            ?>
                <a href="<?php echo get_permalink($recent['ID']) ?>">
                    <?php
                    if (has_post_thumbnail($recent['ID'])):
                        echo get_the_post_thumbnail($recent['ID'], 'thumbnail');
                    else : echo "";
                    endif;
                    ?>
                </a>
            <?php
        }
        wp_reset_query();
        ?>
    </div>
</div>
