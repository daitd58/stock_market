<?php
/*
Widget Name: Pie Chart Widget
Description: A powerful yet simple button widget for your sidebars or Page Builder pages.
Author: SiteOrigin
Author URI: https://siteorigin.com
*/

if (!class_exists('SiteOrigin_Widget'))
    return;

class Pie_Chart_Widget extends SiteOrigin_Widget
{
    function __construct()
    {
        //Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.

        //Call the parent constructor with the required arguments.
        parent::__construct(
        // The unique id for your widget.
            'pie-chart',

            // The name of the widget for display purposes.
            __('Pie Chart Widget', 'stock_market'),

            // The $widget_options array, which is passed through to WP_Widget.
            // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
            array(
                'description' => __('Pie chart widget', 'stock_market'),
                'help' => '',
                'panels_groups' => array('stock-market')
            ),

            //The $control_options array, which is passed through to WP_Widget
            array(),

            //The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
            array(
                'title' => array(
                    'type' => 'text',
                    'label' => __('Title', 'stock_market'),
                    'default' => ''
                ),
                'part' => array(
                    'type' => 'repeater',
                    'label' => __('Part', 'stock_market'),
                    'hide' => true,
                    'fields' => array(
                        'title' => array(
                            'type' => 'text',
                            'label' => __('Title', 'stock_market'),
                            'default' => '',
                        ),
                        'percent' => array(
                            'type' => 'number',
                            'label' => __('Percent', 'stock_market'),
                            'default' => ''
                        )
                    )
                ),
            ),

            //The $base_folder path string.
            plugin_dir_path(__FILE__)
        );
    }

    function enqueue_frontend_scripts($instance)
    {
        wp_enqueue_script('chart-js', STOCK_MARKET_URI . 'includes/widgets/pie-chart/js/Chart.js', array('jquery'), '', true);
        wp_enqueue_script('pie-chart', STOCK_MARKET_URI . 'includes/widgets/pie-chart/js/pie.js', array('jquery'), '', true);
        wp_localize_script('pie-chart', 'pie_data', $instance['part']);
    }

    function get_template_name($instance)
    {
        return 'pie';
    }

    function get_template_dir($instance)
    {
        return 'chart-template';
    }

    function get_style_name($instance)
    {
        return '';
    }
}

siteorigin_widget_register('pie-chart', __FILE__, 'Pie_Chart_Widget');