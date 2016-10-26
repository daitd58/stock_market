<?php

$facebook = $instance ['social_info']['facebook'];
$youtube = $instance ['social_info']['youtube'];
$gg_plus = $instance ['social_info']['google-plus'];
$twitter = $instance ['social_info']['twitter'];
$tumblr = $instance ['social_info']['tumblr'];
$rss = $instance ['social_info']['rss'];
$pinterest = $instance ['social_info']['pinterest'];
$linked_in = $instance ['social_info']['linked-in'];
?>

<div class="stock-market-footer-info">
    <div class="stock-market-logo">
        <?php if( get_theme_mod('stock_market_wp_footer_logo') && get_theme_mod('stock_market_wp_footer_logo') != '' ) ?>
            <a class="navbar-brand image-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_theme_mod('stock_market_wp_footer_logo') ) ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
    </div>
    <div class="clearfix"></div>
    <div class="social-info">
        <?php if($facebook): ?>
        <div class="social facebook">
            <a class="link-facebook" href="<?php echo $facebook ?>">
                <i class="fa fa-facebook"></i>
            </a>
        </div>
        <?php endif; ?>
        
        <?php if($youtube): ?>
        <div class="social youtube">
            <a class="link-youtube" href="<?php echo $youtube ?>">
                <i class="fa fa-youtube"></i>
            </a>
        </div>
        <?php endif; ?>

        <?php if($gg_plus): ?>
        <div class="social google-plus">
            <a class="link-google-plus" href="<?php echo $gg_plus ?>">
                <i class="fa fa-google-plus"></i>
            </a>
        </div>
        <?php endif; ?>

        <?php if($pinterest): ?>
            <div class="social pinterest">
                <a class="link-pinterest" href="<?php echo $pinterest ?>">
                    <i class="fa fa-pinterest"></i>
                </a>
            </div>
        <?php endif; ?>

        <?php if($linked_in): ?>
            <div class="social linked-in">
                <a class="link-linked-in" href="<?php echo $linked_in ?>">
                    <i class="fa fa-linkedin"></i>
                </a>
            </div>
        <?php endif; ?>

        <?php if($rss): ?>
            <div class="social rss">
                <a class="link-rss" href="<?php echo $rss ?>">
                    <i class="fa fa-rss"></i>
                </a>
            </div>
        <?php endif; ?>

        <?php if($twitter): ?>
            <div class="social twitter">
                <a class="link-twitter" href="<?php echo $twitter ?>">
                    <i class="fa fa-twitter"></i>
                </a>
            </div>
        <?php endif; ?>

        <?php if($tumblr): ?>
            <div class="social tumblr">
                <a class="link-tumblr" href="<?php echo $tumblr ?>">
                    <i class="fa fa-tumblr"></i>
                </a>
            </div>
        <?php endif; ?>
        
    </div>
</div>