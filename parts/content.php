<?php
/**
 * The template part for displaying the post entry in the blog feed
 *
 * @package stock_market
 */
?>
<?php
$stock_market_wp_enable_demo = stock_market_wp_get_option('stock_market_wp_enable_demo');
$stock_market_wp_blog_feed_animations = stock_market_wp_get_option('stock_market_wp_blog_feed_animations');
$stock_market_wp_animations = stock_market_wp_get_option('stock_market_wp_animations');

#show meta?
$stock_market_wp_blog_feed_meta = stock_market_wp_get_option('stock_market_wp_blog_feed_meta');
if ($stock_market_wp_blog_feed_meta == 'Y') {
    $stock_market_wp_blog_feed_meta_author = stock_market_wp_get_option('stock_market_wp_blog_feed_meta_author');
    $stock_market_wp_blog_feed_meta_category = stock_market_wp_get_option('stock_market_wp_blog_feed_meta_category');
    $stock_market_wp_blog_feed_meta_date = stock_market_wp_get_option('stock_market_wp_blog_feed_meta_date');
}
#display type
$stock_market_wp_blog_feed_display = stock_market_wp_get_option('stock_market_wp_blog_feed_display');
#show buttons?
$stock_market_wp_blog_feed_buttons = stock_market_wp_get_option('stock_market_wp_blog_feed_buttons');
?>


<!-- Post -->
<div id="post-<?php the_ID(); ?>" <?php post_class('entry clearfix ' . $post_class); ?> class="post">

    <div class="entry-thumbnail">
        <div class="entry-image entry-image-left">
            <?php if (has_post_thumbnail()) { ?>
                <a class="post-thumbnail post-thumbnail-small"
                   href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail', array('alt' => get_the_title(), 'class' => 'img-responsive')); ?></a>
            <?php } else { ?>
            <a class="post-thumbnail post-thumbnail-small" href="<?php the_permalink(); ?>"><img
                    src="<?php stock_market_wp_random_thumbnail(); ?>" class="img-responsive"/></a><?php } ?>
        </div>

    </div>
    <div class="entry-content">

        <?php #if no title is defined for the post...
        if (get_the_title() == '') { ?>

            <?php $id = get_the_ID(); ?>
            <?php if ($stock_market_wp_blog_feed_display != 'Small Image Left, Excerpt Right') { ?>
                <!-- Post Title -->
                <h2 class="entry-title block-title block-title-left"><a href="<?php the_permalink(); ?>"
                                                                        rel="bookmark"><?php _e('Post ID: ', 'stock_market');
                        echo $id; ?></a></h2>
            <?php } else { ?>
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"
                                           rel="bookmark"><?php _e('Post ID: ', 'stock_market');
                        echo $id; ?></a></h2>
            <?php } ?>
            <!-- /Post Title -->

        <?php } else { ?>

            <?php if ($stock_market_wp_blog_feed_display != 'Small Image Left, Excerpt Right') { ?>
                <!-- Post Title -->
                <h2 class="entry-title block-title block-title-left"><a
                        href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php } else { ?>
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <!-- /Post Title -->
            <?php } ?>

        <?php } ?>


        <!-- Small Image Left, Excerpt Right -->

        <div class="entry-content-right">
            <?php the_excerpt(); ?>
            <?php wp_link_pages(); ?>
        </div>
        <!-- /Small Image Left, Excerpt Right -->


        <div class="entry-meta">
            <b><?php _e('Ngày đăng: ', 'stock_market'); ?></b>
            <?php echo get_the_date("d/m/Y"); ?> |
            <b><?php _e('Thể loại: ', 'stock_market'); ?></b>
            <?php echo get_the_category_list(', '); ?> |
            <b><?php _e('Đăng bởi: ', 'stock_market') ?></b>
            <a class="author" href="<?php the_author_link() ?>"><?php the_author() ?></a>

        </div>
        <!-- /Post Meta -->


        <!-- Post Buttons -->
        <div class="entry-buttons entry-buttons-right">
            <a href="<?php the_permalink(); ?>"
               class="btn btn-primary-custom"><?php _e('XEM THÊM', 'stock_market'); ?></a>
        </div>
        <!-- /Post Buttons -->


    </div>
</div>


<!-- /Post -->
