<?php
/**
 * The template for displaying the sidebar
 *
 * @package stock_market
 */
?>
<?php //$stock_market_wp_enable_demo = stock_market_wp_get_option('stock_market_wp_enable_demo'); ?>

<?php if ( is_active_sidebar( 'sidebar' ) ) { ?>

<div class="sidebar-widgets" >
    <?php dynamic_sidebar( 'sidebar' ); ?>
</div>

<?php } 
//else if($stock_market_wp_enable_demo == 'Y') { stock_market_wp_example_sidebar(); } 
else  { stock_market_wp_example_sidebar(); } 
?> 
