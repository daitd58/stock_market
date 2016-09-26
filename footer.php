<?php
/**
* The template for displaying the footer
*
* @package stock_market
*/
?>

<?php get_sidebar('footer'); ?>

<!-- ========== Footer Nav and Copyright ========== -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                                
                <?php if ( has_nav_menu( 'footer' ) ) :  ?>
                <!-- Navigation -->
                <?php
                wp_nav_menu( array(
                    'theme_location'    => 'footer',
                    'depth'             => 1,
                    'container'         => '',
                    'menu_class'        => 'nav-foot'
                    )
                );
                ?>
                <!-- /Navigation -->
                <?php else: ?>
                <?php stock_market_wp_example_nav_footer(); ?>
                <?php endif; ?>
                
            </div>
            <div class="col-md-4">
                <!-- Copyright and Credits -->
                <?php $stock_market_wp_footer_copyright_message = stock_market_wp_get_option('stock_market_wp_footer_copyright_message'); ?>
                <?php $stock_market_wp_footer_credit_message = stock_market_wp_get_option('stock_market_wp_footer_credit_message'); ?>
                <div class="copyright"><?php echo wp_kses_post($stock_market_wp_footer_copyright_message); ?><br /><span class="credit"><?php echo wp_kses_post($stock_market_wp_footer_credit_message); ?></span></div>
                <!-- /Copyright and Credits -->
            </div>
        </div>
    </div>
</div>
<!-- ========== /Footer Nav and Copyright ========== -->

<?php get_template_part('parts/footer', 'back-to-top'); ?>
<?php wp_footer(); ?>

</body>
</html>