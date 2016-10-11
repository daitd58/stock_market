<?php
/*
Widget Name: Chart Widget
Description: A powerful yet simple button widget for your sidebars or Page Builder pages.
Author: SiteOrigin
Author URI: https://siteorigin.com
*/

if (!class_exists('SiteOrigin_Widget'))
    return;

class Chart_Widget extends SiteOrigin_Widget
{
    function __construct()
    {
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
                'help' => '',
                'panels_groups' => array('stock-market')
            ),

            //The $control_options array, which is passed through to WP_Widget
            array(),

            //The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
            array(
                'first_chart' => array(
                    'type' => 'section',
                    'label' => __('First Chart', 'stock_market'),
                    'hide' => true,
                    'fields' => array(
                        'title' => array(
                            'type' => 'text',
                            'label' => __('Chart title', 'stock_market'),
                            'default' => '',
                        )
                    )
                ),
                'second_chart' => array(
                    'type' => 'section',
                    'label' => __('Second Chart', 'stock_market'),
                    'hide' => true,
                    'fields' => array(
                        'title' => array(
                            'type' => 'text',
                            'label' => __('Chart title', 'stock_market'),
                            'default' => '',
                        )
                    )
                )
            ),

            //The $base_folder path string.
            plugin_dir_path(__FILE__)
        );
    }

    function enqueue_frontend_scripts($instance)
    {
        wp_enqueue_script('highstock-js', STOCK_MARKET_URI . 'includes/widgets/chart-widget/js/highstock.js', array('jquery'), '', true);
        wp_enqueue_script('moment-js', STOCK_MARKET_URI . 'includes/widgets/chart-widget/js/moment.min.js', array('jquery'), '', true);
        wp_enqueue_script('chart', STOCK_MARKET_URI . 'includes/widgets/chart-widget/js/chart.js', array('jquery'), '', true);
    }

    function get_template_name($instance)
    {
        return 'line';
    }

    function get_template_dir($instance)
    {
        return 'chart-templates';
    }

    function get_style_name($instance)
    {
        return '';
    }
}

siteorigin_widget_register('chart-widget', __FILE__, 'Chart_Widget');