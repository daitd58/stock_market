<?php
/*
Widget Name: Chart Widget
Description: A powerful yet simple button widget for your sidebars or Page Builder pages.
Author: SiteOrigin
Author URI: https://siteorigin.com
*/

if( !class_exists( 'SiteOrigin_Widget' ) )
    return;
class Chart_Widget extends SiteOrigin_Widget {
    function __construct() {
        //Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.

        //Call the parent constructor with the required arguments.
        parent::__construct(
        // The unique id for your widget.
            'chart-widget',

            // The name of the widget for display purposes.
            __('Chart Widget', 'stock_market'),

            // The $widget_options array, which is passed through to WP_Widget.
            // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
            array(
                'description' => __('Show the chart template', 'stock_market'),
                'help'        => '',
                'groups '       => array('stock_market')
            ),

            //The $control_options array, which is passed through to WP_Widget
            array(
            ),

            //The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
            array(
                'title' => array(
                    'type' => 'text',
                    'label' => __('Chart title', 'stock_market'),
                    'default' => '',
                ),
                'id' => array(
                    'type' => 'text',
                    'label' => __('Google sheet ID', 'stock_market'),
                    'default' => '',
                    'description' => __('Please type your google sheet id. Example: https://docs.google.com/spreadsheets/d/1vwN8zyxq8d4R2vHdSLjeE1wCKd3DcLLhTEKsABoXV64/edit#gid=0 your id is 1vwN8zyxq8d4R2vHdSLjeE1wCKd3DcLLhTEKsABoXV64', 'stock_market')
                ),
                'range' => array(
                    'type' => 'text',
                    'label' => __('Sheet tile', 'stock_market'),
                    'default' => '',
                ),
                'type_chart' => array(
                    'type' => 'select',
                    'label' => __('Please select the chart type', 'stock_market'),
                    'default' => 'line',
                    'options' => array(
                        'line' => __('Line', 'stock_market'),
                        'pie' => __('Pie', 'stock_market')
                    )
                )
            ),

            //The $base_folder path string.
            plugin_dir_path(__FILE__)
        );
    }

    function enqueue_frontend_scripts( $instance ) {
        wp_enqueue_script( 'google-api', STOCK_MARKET_URI . 'includes/widgets/chart-widget/js/api.js', array('jquery'), '', true );
        wp_enqueue_script( 'chart-js', STOCK_MARKET_URI . 'includes/widgets/chart-widget/js/chart.min.js', array('jquery'), '', true );
        wp_enqueue_script( 'google-sheet', STOCK_MARKET_URI . 'includes/widgets/chart-widget/js/google-sheet.js', array('jquery'), '', true );
    }

    function get_template_name($instance) {
        return $instance['type_chart'];
    }

    function get_template_dir($instance) {
        return 'chart-templates';
    }

    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('chart-widget', __FILE__, 'Chart_Widget');