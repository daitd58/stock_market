<?php

/*
Widget Name: Stock Market: Contact Info
Description: A widget to fill informations that can contact to your company
Author: Hien Doan
*/


class Stock_Market_Contact_Info extends SiteOrigin_Widget
{

    function __construct()
    {
        //Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.

        //Call the parent constructor with the required arguments.
        parent::__construct(
        // The unique id for your widget.
            'stock-market-contact-info',

            // The name of the widget for display purposes.
            __('Stock Market: Contact Info', 'stock-market'),

            // The 'widget_options array, which is passed through to WP_Widget.
            // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
            array(
                'description' => __('Footer: Thông tin liên hệ với công ty.', 'stock-market'),
                'panels_groups' => array('stock-market')
            ),

            //The 'control_options array, which is passed through to WP_Widget
            array(),

            //The 'form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
            array(
                'heading' => array(
                    'type' => 'text',
                    'label' => __('Tiêu đề:', 'stock-market'),
                    'default' => __('Thông tin liên hệ', 'stock-market'),
                ),
                'contact_info' => array(
                    'type' => 'section',
                    'label' => __('Thông tin liên hệ thông thường.', 'stock-market'),
                    'hide' => true,
                    'fields' => array(
                        'phone' => array(
                            'type' => 'text',
                            'label' => __('Số điện thoại', 'stock-market')
                        ),
                        'email' => array(
                            'type' => 'text',
                            'label' => __('Email', 'stock-market')
                        ),
                    )
                ),

                
            ),

            //The 'base_folder path string.
            plugin_dir_path(__FILE__)
        );
    }

    function get_template_name($instance)
    {
        return 'contact-info-template';
    }

    function get_style_name($instance)
    {
        return false;
    }

    function get_template_variables($instance, $args)
    {
        return array(
            'heading' => !empty ($instance ['heading']) ? $instance ['heading'] : "Thông tin liên",
            'contact_phone' => !empty ($instance ['contact_info']['phone']) ? $instance ['contact_info']['phone'] : "0944.323.118 [Mr. Khương] - 0906217163 [Mr. Đức]",
            'contact_email' => !empty ($instance ['contact_info']['email']) ? $instance ['contact_info']['email'] : "contact@phoenixstock.com",
            'facebook' => !empty ($instance ['social_info']['facebook']) ? $instance ['social_info']['facebook'] : "https://www.facebook.com/",
            'youtube' => !empty ($instance ['social_info']['youtube']) ? $instance ['social_info']['youtube'] : "https://youtube.com/",
            'gg_plus' => !empty ($instance ['social_info']['gg_plus']) ? $instance ['social_info']['gg_plus'] : "https://plus.google.com",
        );
    }
}

siteorigin_widget_register('stock-market-contact-info', __FILE__, 'Stock_Market_Contact_Info');