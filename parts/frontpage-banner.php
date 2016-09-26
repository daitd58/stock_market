<?php
/**
* The template part for displaying the banner for the front page (static)
*
* @package stock_market
*/
?>

<!-- ========== Front Page - Image Banner ========== -->
<?php global $stock_market_wp_defaults; ?>
<?php 
$stock_market_wp_frontpage_banner = stock_market_wp_get_option('stock_market_wp_frontpage_banner'); 
$stock_market_wp_frontpage_banner_image = stock_market_wp_get_option('stock_market_wp_frontpage_banner_image');

$stock_market_wp_frontpage_banner_heading = stock_market_wp_get_option('stock_market_wp_frontpage_banner_heading');
$stock_market_wp_frontpage_banner_text = stock_market_wp_get_option('stock_market_wp_frontpage_banner_text');

$header_image = get_header_image(); 

if($stock_market_wp_frontpage_banner_image != '' || $header_image != '') { 
    #header image uploaded, no frontpage banner uploaded
    if($stock_market_wp_frontpage_banner_image == $stock_market_wp_defaults['stock_market_wp_frontpage_banner_image'] && $header_image != '') 
        $frontpage_banner = $header_image;
    else #header image uploaded, frontpage banner uploaded then removed
    if($stock_market_wp_frontpage_banner_image == '' && $header_image != '') 
        $frontpage_banner = $header_image;
    #no header image uploaded, no frontpage banner uploaded
    else if($header_image == '' && $stock_market_wp_frontpage_banner_image == $stock_market_wp_defaults['stock_market_wp_frontpage_banner_image'])
        $frontpage_banner = $stock_market_wp_frontpage_banner_image;
    #frontpage banner uploaded
    else if ($stock_market_wp_frontpage_banner_image != '')
        $frontpage_banner = $stock_market_wp_frontpage_banner_image;
    
    
?>

<div class="image-banner frontpage-banner frontpage-banner-parallax-bg <?php if($stock_market_wp_frontpage_banner == 'Full Screen Image') { ?>full-screen<?php } ?>" data-parallax="scroll" data-image-src="<?php echo esc_url($frontpage_banner) ?>">
    <div class="container">
        <?php if( display_header_text() ) { ?>
        <div class="inner">
            <h1 class="block-title wow zoomIn"><?php echo esc_html($stock_market_wp_frontpage_banner_heading) ?></h1>
            <div class="text-center hidden-xs wow zoomIn description"><?php echo wp_kses_post($stock_market_wp_frontpage_banner_text) ?></div>
        </div><div class="helper"></div>
        <?php } else { ?>
        
        <?php } ?>
    </div>
</div>
<?php } ?>
<!-- ========== /Front Page - Image Banner ========== -->

