<?php $heading = isset($instance['heading']) ? $instance['heading'] : 'Mã cổ phiếu'; ?>
<div class="stock-market-stock-ticker">
    <h3 class="heading">
        <?php echo $heading ?>
    </h3>
    <div class="content">
        <?php
        $categories = get_categories();
        foreach ($categories as $category) {
            $news_query = new WP_Query( array(
                'cat'                 => $category->term_id,
                'posts_per_page'      => 1,
                'no_found_rows'       => true,
                'ignore_sticky_posts' => true,
                'orderby' => 'date',
                'order' => 'DESC'
            ));
            while ( $news_query->have_posts() ) : $news_query->the_post()?>
            <div class="latest-post post-title">
                <a href="<?php the_permalink() ?>"><i class="fa fa-paper-plane"></i><?php echo $category->name ?></a>
            </div>
            <?php endwhile ?>
            <?php
        }
        wp_reset_query();
        ?>
    </div>
</div>
