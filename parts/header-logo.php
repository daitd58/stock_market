<?php
/**
 * The template part for displaying the logo
 *
 * @package stock_market
 */
?>
<?php global $stock_market_wp_defaults; ?>
<?php
$stock_market_wp_show_logo_image = stock_market_wp_get_option('stock_market_wp_show_logo_image'); 
$stock_market_wp_logo_text = stock_market_wp_get_option('stock_market_wp_logo_text'); 

$custom_logo_id = get_theme_mod( 'custom_logo' );
$custom_logo_image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
$stock_market_wp_logo_image = $custom_logo_image[0];
?>
<?php if($stock_market_wp_show_logo_image == 'Y' && $stock_market_wp_logo_image != '') { ?>
<a class="navbar-brand image-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($stock_market_wp_logo_image) ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>

<?php }  else { ?>
<a class="navbar-brand text-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html($stock_market_wp_logo_text) ?></a><?php } ?>

