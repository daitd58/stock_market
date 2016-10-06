<?php
/**
 * Created by PhpStorm.
 * User: Hien
 * Date: 9/28/2016
 * Time: 4:10 PM
 */

// Siteorigin include widget folder
function stock_market_widgets( $folders ) {
    $folders[] = get_template_directory() . '/includes/widgets/';
    return $folders;
}

add_filter( 'siteorigin_widgets_widget_folders', 'stock_market_widgets' );

// add group widget
function stock_market_add_widget_tabs( $tabs ) {
    $tabs[] = array(
        'title'  => __( 'Stock Market Widgets', 'stock_market' ),
        'filter' => array(
            'groups' => array( 'stock-market')
            )
        );
    return $tabs;
}

add_filter('siteorigin_panels_widget_dialog_tabs', 'stock_market_add_widget_tabs', 20);