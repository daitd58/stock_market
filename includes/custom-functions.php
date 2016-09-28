// Siteorigin include widget folder
function stock_market_widgets( $folders ) {
$folders[] = get_template_directory() . '/includes/widgets/';

return $folders;
}

add_filter( 'siteorigin_widgets_widget_folders', 'stock_market_widgets' );

// add group widget
function stock_market_add_widget_tabs( $tabs ) {
$tabs[] = array(
'title'  => __( Stock Market Widgets', 'stock_market' ),
'filter' => array(
'groups' => array( 'stock_market' )
)
);

return $tabs;
}