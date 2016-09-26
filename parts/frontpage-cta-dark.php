<?php
/**
 * The template part for displaying the dark CTA section on the front page (static)
 *
 * @package stock_market
 */
?>
<?php 
global $stock_market_wp_curr_bg, $stock_market_wp_prev_bg; 

$stock_market_wp_frontpage_cta_dark = stock_market_wp_get_option('stock_market_wp_frontpage_cta_dark'); 

if($stock_market_wp_frontpage_cta_dark == 'Y') { 
$stock_market_wp_curr_bg = 'bg-primary'; $stock_market_wp_prev_bg = $stock_market_wp_curr_bg;
$cta_page = get_post(stock_market_wp_get_option('stock_market_wp_frontpage_cta_dark_content')); 
$stock_market_wp_frontpage_cta_dark_content = $cta_page->post_content;

$stock_market_wp_frontpage_cta_dark_parallax = stock_market_wp_get_option('stock_market_wp_frontpage_cta_dark_parallax'); 
$stock_market_wp_frontpage_cta_dark_bg_image = stock_market_wp_get_option('stock_market_wp_frontpage_cta_dark_bg_image'); 

$stock_market_wp_frontpage_cta_dark_section_id = stock_market_wp_get_option('stock_market_wp_frontpage_cta_dark_section_id'); 

$class = ''; $style = ''; $parallax_str = '';
if($stock_market_wp_frontpage_cta_dark_bg_image == '') $class = esc_attr($stock_market_wp_curr_bg);
else if($stock_market_wp_frontpage_cta_dark_parallax != 'Y' && $stock_market_wp_frontpage_cta_dark_bg_image != '') $style = 'style="background-image:url(' . esc_url($stock_market_wp_frontpage_cta_dark_bg_image) . '); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat:no-repeat; z-index:0; background-position: center center;"';
else if($stock_market_wp_frontpage_cta_dark_parallax == 'Y' && $stock_market_wp_frontpage_cta_dark_bg_image != '') { $class = 'parallax-bg'; $parallax_str = 'data-parallax="scroll" data-image-src="' . esc_url($stock_market_wp_frontpage_cta_dark_bg_image) . '"'; }

?>
<!-- ========== Call to Action ========== -->
<div class="shadow"></div>
<div class="section frontpage-cta <?php echo $class ?>" <?php echo $parallax_str; ?> id="<?php echo esc_attr($stock_market_wp_frontpage_cta_dark_section_id); ?>" <?php echo $style ?>>
    <div class="container wow zoomIn description">
        <div class="description"><?php echo do_shortcode($stock_market_wp_frontpage_cta_dark_content); ?></div>
    </div>
</div>
<!-- ========== /Call to Action ========== -->
<?php } ?>
