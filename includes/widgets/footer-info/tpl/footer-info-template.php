<div class="stock-market-footer-info">
    <div class="stock-market-logo">
        <?php if( get_theme_mod('stock_market_wp_footer_logo') && get_theme_mod('stock_market_wp_footer_logo') != '' ) ?>
            <a class="navbar-brand image-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_theme_mod('stock_market_wp_footer_logo') ) ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
    </div>
    <div class="clearfix"></div>
    <div class="social-info">
        <div class="social facebook">
            <a class="link-facebook" href="<?php echo $facebook ?>">
                <i class="fa fa-facebook"></i>
            </a>
        </div>

        <div class="social youtube">
            <a class="link-youtube" href="<?php echo $youtube ?>">
                <i class="fa fa-youtube"></i>
            </a>
        </div>
        <div class="social google-plus">
            <a class="link-google-plus" href="<?php echo $gg_plus ?>">
                <i class="fa fa-google-plus"></i>
            </a>
        </div>
    </div>
</div>