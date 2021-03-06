<?php
/**
 * The widget area for footer.
 *
 * @package stock_market
 */
?>

<?php $stock_market_hide_footer_widgets = stock_market_wp_get_option('stock_market_hide_footer_widgets'); ?>

<?php 
if($stock_market_hide_footer_widgets == 'N') { 

if ( is_active_sidebar( 'footer_1' ) || is_active_sidebar( 'footer_2' )) { ?>
<!-- ========== Footer Widgets ========== -->
<div class="footer-widgets bg-footer">
    <div class="container">
        <div class="row">
            <?php 
            $i=0;
            if(is_active_sidebar( 'footer_1' )) $i++;
            if(is_active_sidebar( 'footer_2' )) $i++;
            $class = stock_market_wp_get_col_class($i);
            ?>
            <?php if ( is_active_sidebar( 'footer_1' ) ) : ?>
            <!-- Footer Col 1 -->
            <div class="<?php echo $class ?> footer-widget footer-widget-col-1 wow">
                <?php dynamic_sidebar( 'footer_1' ); ?>
            </div>
            <!-- /Footer Col 1 -->
            <?php endif; ?>
            
            <?php if ( is_active_sidebar( 'footer_2' ) ) : ?>
            <!-- Footer Col 2 -->
            <div class="<?php echo $class ?> footer-widget footer-widget-col-2 wow">
                <?php dynamic_sidebar( 'footer_2' ); ?>
            </div>
            <!-- /Footer Col 2 -->
            <?php endif; ?>
            
        </div>
    </div>
</div>
<!-- ========== /Footer Widgets ========== -->
<?php }  
    else { 
        stock_market_wp_example_sidebar_footer(); 
    } 
}
?>

