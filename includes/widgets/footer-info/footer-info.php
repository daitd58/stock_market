<?php

/*
Widget Name: Stock Market: Footer Info
Description: A widget to fill information about you stock company
Author: Hien Doan
*/


class Stock_Market_Footer_Info extends SiteOrigin_Widget
{

    function __construct()
    {
        //Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.

        //Call the parent constructor with the required arguments.
        parent::__construct(
        // The unique id for your widget.
            'stock-market-footer-info',

            // The name of the widget for display purposes.
            __('Stock Market: Footer Info', 'stock-market'),

            // The $widget_options array, which is passed through to WP_Widget.
            // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
            array(
                'description' => __('Footer: Mô tả ngắn', 'stock-market'),
                'panels_groups' => array('stock-market')
            ),

            //The $control_options array, which is passed through to WP_Widget
            array(),

            //The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
            array(
                'content' => array(
                    'type' => 'text',
                    'label' => __('Nội dung:', 'stock-market'),
                    'default' => __('Đây là đoạn mô tả hiển ngắn hiển thị ở footer.', 'stock-market'),
                ),
                'social_info' => array(
                    'type' => 'section',
                    'label' => __('Địa chỉ mạng xã hội', 'stock-market'),
                    'hide' => true,
                    'fields' => array(
                        'facebook' => array(
                            'type' => 'text',
                            'label' => __('Địa chỉ Facebook', 'stock-market')
                        ),
                        'youtube' => array(
                            'type' => 'text',
                            'label' => __('Địa chỉ Youtube', 'stock-market')
                        ),
                        'google-plus' => array(
                            'type' => 'text',
                            'label' => __('Địa chỉ Google Plus', 'stock-market')
                        ),
                        'twitter' => array(
                            'type' => 'text',
                            'label' => __('Địa chỉ Twitter', 'stock-market')
                        ),
                        'linked-in' => array(
                            'type' => 'text',
                            'label' => __('Địa chỉ Linked In', 'stock-market')
                        ),
                        'pinterest' => array(
                            'type' => 'text',
                            'label' => __('Địa chỉ Pinterest', 'stock-market')
                        ),
                        'tumblr' => array(
                            'type' => 'text',
                            'label' => __('Địa chỉ Tumblr', 'stock-market')
                        ),
                        'rss' => array(
                            'type' => 'text',
                            'label' => __('Địa chỉ RSS', 'stock-market')
                        ),
                    )
                )
            ),

            //The $base_folder path string.
            plugin_dir_path(__FILE__)
        );
    }

    function get_template_name($instance)
    {
        return 'footer-info-template';
    }

    function get_style_name($instance)
    {
        return false;
    }
}

siteorigin_widget_register('stock-market-footer-info', __FILE__, 'Stock_Market_Footer_Info');