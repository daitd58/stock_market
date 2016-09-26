<?php
/**
 * The template for displaying the search form
 *
 * @package stock_market
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
    <input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'stock_market' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'placeholder', 'stock_market' ) ?>"  />
    <button class="btn btn-primary-custom" name="submit" type="submit"><i class="glyphicon glyphicon-arrow-right"></i></button>
</form>