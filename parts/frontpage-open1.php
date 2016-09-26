<?php
/**
 * The template part for displaying an open content section for the frontpage (static)
 *
 * @package stock_market
 */
?>
<?php 
global $stock_market_wp_curr_bg, $stock_market_wp_prev_bg; 

$stock_market_wp_frontpage_open1 = stock_market_wp_get_option('stock_market_wp_frontpage_open1'); 

if($stock_market_wp_frontpage_open1 == 'Y') { 
if($stock_market_wp_prev_bg == 'bg-white') $stock_market_wp_curr_bg = 'bg-grey-light-2'; else $stock_market_wp_curr_bg = 'bg-white';  
$stock_market_wp_prev_bg = $stock_market_wp_curr_bg;

$stock_market_wp_frontpage_open1_heading = stock_market_wp_get_option('stock_market_wp_frontpage_open1_heading'); 

$open_content_page = get_post(stock_market_wp_get_option('stock_market_wp_frontpage_open1_content')); 
$stock_market_wp_frontpage_open1_content = $open_content_page->post_content;

$stock_market_wp_frontpage_open1_section_id = stock_market_wp_get_option('stock_market_wp_frontpage_open1_section_id'); 
?>
<!-- ========== Featured Section ========== -->
<div class="section frontpage-open1 <?php echo esc_attr($stock_market_wp_curr_bg) ?>" id="<?php echo esc_attr($stock_market_wp_frontpage_open1_section_id) ?>">
    <div class="container">
        <h2 class="block-title wow zoomIn"><?php echo esc_html($stock_market_wp_frontpage_open1_heading) ?></h2>
        <div class="wow fadeIn"><?php echo do_shortcode($stock_market_wp_frontpage_open1_content); ?></div>
    </div>
</div>
<!-- ========== /Featured Section ========== -->
<?php } ?>
