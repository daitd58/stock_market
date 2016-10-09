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


                <!-- Copyright and Credits -->
                <?php $stock_market_wp_footer_copyright_message = stock_market_wp_get_option('stock_market_wp_footer_copyright_message'); ?>
                <?php $stock_market_wp_footer_credit_message = stock_market_wp_get_option('stock_market_wp_footer_credit_message'); ?>
                <div class="copyright"><?php echo wp_kses_post($stock_market_wp_footer_copyright_message); ?><br /><span class="credit"><?php echo wp_kses_post($stock_market_wp_footer_credit_message); ?></span></div>
                <!-- /Copyright and Credits -->
    </div>
</div>
<!-- ========== /Footer Nav and Copyright ========== -->

<?php get_template_part('parts/footer', 'back-to-top'); ?>
<?php wp_footer(); ?>

</body>
</html>