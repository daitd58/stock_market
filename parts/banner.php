<?php
/**
 * The template part for displaying the top banner across all pages
 *
 * @package stock_market
 */
?>
<?php global $stock_market_wp_defaults; ?>

<?php $custom_header = get_header_image(); ?>

<?php  

if ( is_front_page() ) {  
    get_template_part('parts/frontpage', 'banner');
} 

else if (is_home()) {
    $stock_market_wp_blog_feed_banner = stock_market_wp_get_option('stock_market_wp_blog_feed_banner'); 
    if($stock_market_wp_blog_feed_banner == 'None'){
        get_template_part('parts/banner', 'none');
    } else if($stock_market_wp_blog_feed_banner == 'Custom Header' && get_header_image() != ''){
        get_template_part('parts/banner', 'custom-header');
    } else {
        get_template_part('parts/banner', 'none');
    } 
} 

else if(is_page()){ 
    $stock_market_wp_page_banner = stock_market_wp_get_option('stock_market_wp_page_banner'); 
    if($stock_market_wp_page_banner == 'None'){
        get_template_part('parts/banner', 'none');
    } else if($stock_market_wp_page_banner == 'Custom Header' && get_header_image() != ''){ 
        get_template_part('parts/banner', 'custom-header');
    } else if($stock_market_wp_page_banner == 'Featured Image'){
        get_template_part('parts/banner', 'featured-image');
    } else {
        get_template_part('parts/banner', 'none');
    } 
} 

else if(is_single()){
    $stock_market_wp_post_banner = stock_market_wp_get_option('stock_market_wp_post_banner'); 
    if($stock_market_wp_post_banner == 'None'){
        get_template_part('parts/banner', 'none');
    } else if($stock_market_wp_post_banner == 'Custom Header' && get_header_image() != ''){
        get_template_part('parts/banner', 'custom-header');
    } else if($stock_market_wp_post_banner == 'Featured Image'){
        get_template_part('parts/banner', 'featured-image');
    } else {
        get_template_part('parts/banner', 'none');
    }
} 

else {
    $stock_market_wp_blog_feed_banner = stock_market_wp_get_option('stock_market_wp_blog_feed_banner'); 
    if($stock_market_wp_blog_feed_banner == 'None'){
        get_template_part('parts/banner', 'none');
    } else if($stock_market_wp_blog_feed_banner == 'Custom Header' && get_header_image() != ''){
        get_template_part('parts/banner', 'custom-header');
    } else {
        get_template_part('parts/banner', 'none');
    } 
} 

?>