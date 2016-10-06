<?php
/**
 * The Template for displaying single posts
 *
 * @package stock_market
 */
?>
<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

    <?php get_template_part('parts/banner'); ?>

    <!-- ========== Page Content ========== -->
    <div class="section post-content bg-white">
        <div class="container">

            <div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
                <div class="post-details">

                    <!-- Post Thumbnail -->

                    <?php
                    $stock_market_wp_post_featured_image = stock_market_wp_get_option('stock_market_wp_post_featured_image');
                    if ($stock_market_wp_post_featured_image == 'Y') {
                        ?>

                        <?php if (has_post_thumbnail()) { ?>
                            <!-- Post Image -->
                            <div class="entry-thumbnail">
                                <div
                                    class="entry-image"><?php the_post_thumbnail('full', array('alt' => get_the_title())); ?></div>
                            </div>
                            <!-- /Post Image -->
                        <?php } ?>

                    <?php } ?>


                    <!-- /Post Thumnail -->
                    <div class="entry-post">
                        <!-- Post Title -->
                        <?php $title = get_the_title(); ?>
                        <?php if ($title == '') { ?>
                            <h2 class="entry-title"><?php echo _e('Post ID: ', 'stock_market');
                                echo get_the_ID(); ?></h2>
                        <?php } else { ?>
                            <h2 class="entry-title"><?php the_title(); ?></h2>
                        <?php } ?>
                        <!-- /Post Title -->

                        <?php
                        $stock_market_wp_post_meta = stock_market_wp_get_option('stock_market_wp_post_meta');
                        if ($stock_market_wp_post_meta == 'Y') {
                            $stock_market_wp_post_meta_author = stock_market_wp_get_option('stock_market_wp_post_meta_author');
                            $stock_market_wp_post_meta_category = stock_market_wp_get_option('stock_market_wp_post_meta_category');
                            $stock_market_wp_post_meta_date = stock_market_wp_get_option('stock_market_wp_post_meta_date');
                        }
                        ?>
                        <?php if ($stock_market_wp_post_meta == 'Y') { ?>
                            <!-- Post Meta -->
                            <div class="entry-meta">
                                <?php if ($stock_market_wp_post_meta_date == 'Y') {
                                    $temp[] = __('Ngày: ', 'stock_market') . get_the_date("d/m/Y");
                                } ?>
                                <?php if ($stock_market_wp_post_meta_category == 'Y') {
                                    $temp[] = __('Thể loại: ', 'stock_market') . get_the_category_list(', ');
                                } ?>
                                <?php if ($stock_market_wp_post_meta_author == 'Y') {
                                    $temp[] = __('Đăng bởi: ', 'stock_market') . get_the_author();
                                } ?>
                                <?php if ($temp) $str = implode('<span class="sep"> | </span>', $temp) ?>
                                <?php echo $str; ?>
                            </div>
                            <!-- /Post Meta -->
                        <?php } ?>

                        <?php
                        $stock_market_wp_post_tags = stock_market_wp_get_option('stock_market_wp_post_tags');
                        if ($stock_market_wp_post_tags == 'Y') {
                            ?>
                            <!-- Post Tags -->
                            <div class="entry-tags">
                                <p><?php the_tags('', ''); ?></p>
                            </div>
                            <!-- /Post Tags -->
                        <?php } ?>


                        <!-- Post Content -->
                        <div class="entry-content">
                            <?php the_content(); ?>
                            <?php wp_link_pages(); ?>
                        </div>
                        <!-- /Post Content -->

                    </div>
                </div>
                <div class="clearfix"></div>

                <?php if (comments_open()) : ?>
                    <?php comments_template(); ?>
                <?php endif; ?>

            </div>
        </div>

    </div>
    <!-- ========== /Page Content ========== -->

<?php endwhile; ?>

<?php get_footer(); ?>