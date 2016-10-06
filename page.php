<?php
/**
 * The template for displaying pages
 *
 * @package stock_market
 */
?>
<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

    <?php get_template_part('parts/banner'); ?>

    <!-- ========== Page Content ========== -->
    <div class="section page-content bg-white">
        <div class="container">

            <div id="page-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

                <!-- Post Title -->
                <?php $title = get_the_title(); ?>
                <?php if ($title == '') { ?>
                    <h3 class="page-title"><?php echo _e('Post ID: ', 'stock_market');
                        echo get_the_ID(); ?></h3>
                <?php } else { ?>
                    <h3 class="page-title"><?php the_title() ?></h3>
                <?php } ?>
                <!-- /Post Title -->

                <div class="page-content">
                    <?php
                    $stock_market_wp_post_featured_image = stock_market_wp_get_option('stock_market_wp_post_featured_image');
                    if ($stock_market_wp_post_featured_image == 'Y') {
                        ?>

                        <?php if (has_post_thumbnail()) { ?>
                            <!-- Post Image -->
                            <div class="page-thumbnail">
                                <div
                                    class="page-image"><?php the_post_thumbnail('full', array('alt' => get_the_title())); ?></div>
                            </div>
                            <!-- /Post Image -->
                        <?php } ?>

                    <?php } ?>
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                </div>

            </div>
            <div class="clearfix"></div>
            <?php if (comments_open()) : ?>
                <?php comments_template(); ?>
            <?php endif; ?>
        </div>

    </div>

    <!-- ========== /Page Content ========== -->

<?php endwhile; ?>

<?php get_footer(); ?>