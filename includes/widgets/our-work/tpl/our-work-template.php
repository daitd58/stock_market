<?php $heading = isset($instance['heading']) ? $instance['heading'] : 'Our Work'; ?>
<div class="stock-market-our-work">
    <div class="heading">
        <?php echo $heading ?>
    </div>
    <div class="content">
        <?php
        $args = array('numberposts' => '6');
        $recent_posts = wp_get_recent_posts($args);
        foreach ($recent_posts as $recent) {
            ?>
            <div class="col-md-4">
                <a href="<?php echo get_permalink($recent['ID']) ?>">
                    <?php
                    if (has_post_thumbnail($recent['ID'])):
                        echo get_the_post_thumbnail($recent['ID'], 'thumbnail');
                    else : echo "";
                    endif;
                    ?>
                </a>
            </div>
            <?php
        }
        wp_reset_query();
        ?>
    </div>
</div>
