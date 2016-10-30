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

            </div>
            <!--  Post Related  -->
            <div class="entry-related">
                <h2 class="title">Bài viết liên quan</h2>
                <?php
                $related = get_posts(array('category__in' => wp_get_post_categories(get_the_ID()), 'numberposts' => 5, 'post__not_in' => array(get_the_ID())));
                if ($related) foreach ($related as $post) {
                    setup_postdata($post); ?>
                    <ul>
                        <li>
                            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
                                <i class="fa fa-hand-o-right"></i>
                                <?php the_title(); ?>
                            </a>
                        </li>
                    </ul>
                <?php } else { ?>
                    <li><p><i>Không tìm thấy bài viết nào!</i></p></li>
                <?php
                }
                wp_reset_postdata(); ?>
            </div>
            <!--  /Post Related  -->

        </div>
        <!-- ========== /Page Content ========== -->

    </div>

<?php endwhile; ?>

<?php get_footer(); ?>