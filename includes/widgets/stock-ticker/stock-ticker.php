<?php

/*
Widget Name: Stock Market: Stock Ticker
Description: A widget to list out all stock ticker
Author: Hien Doan
*/


class Stock_Market_Stock_Ticker extends SiteOrigin_Widget
{

    function __construct()
    {
        //Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.

        //Call the parent constructor with the required arguments.
        parent::__construct(
        // The unique id for your widget.
            'stock-market-stock-ticker',

            // The name of the widget for display purposes.
            __('Stock Market: Stock Ticker', 'stock-market'),

            // The $widget_options array, which is passed through to WP_Widget.
            // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
            array(
                'description' => __('Footer: Các bài đăng gần nhất', 'stock-market'),
                'panels_groups' => array('stock-market')
            ),

            //The $control_options array, which is passed through to WP_Widget
            array(),

            //The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
            array(
                'heading' => array(
                    'type' => 'text',
                    'label' => __('Tiêu đề:', 'stock-market'),
                    'default' => __('Bài đăng mới nhất', 'stock-market'),
                ),
                'quantity' => array(
                    'type' => 'number',
                    'label' => __('Số lượng bài đăng', 'stock-market'),
                )
            ),
            //The $base_folder path string.
            plugin_dir_path(__FILE__)
        );
    }

    function get_template_name($instance)
    {
        return 'stock-ticker-template';
    }

    function get_style_name($instance)
    {
        return false;
    }
}

siteorigin_widget_register('stock-market-stock-ticker', __FILE__, 'Stock_Market_Stock_Ticker');