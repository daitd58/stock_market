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

            // The $widget_options array, which is passed through to WP_Widget.
            // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
            array(
                'description' => __('Contact Informations.', 'stock-market'),
                'panels_groups' => array('stock-market')
            ),

            //The $control_options array, which is passed through to WP_Widget
            array(),

            //The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
            array(
                'heading' => array(
                    'type' => 'text',
                    'label' => __('Heading:', 'stock-market'),
                    'default' => __('Contact Info', 'stock-market'),
                ),
                'contact_infor' => array(
                    'type' => 'section',
                    'label' => __('Normal informations to contact.', 'stock-market'),
                    'hide' => true,
                    'fields' => array(
                        'phone' => array(
                            'type' => 'text',
                            'label' => __('Phone number', 'stock-market')
                        ),
                        'email' => array(
                            'type' => 'text',
                            'label' => __('Email', 'stock-market')
                        ),
                        'working-time' => array(
                            'type' => 'text',
                            'label' => __('Working time in a week', 'stock-market')
                        ),
                    )
                ),

                'social_info' => array(
                    'type' => 'section',
                    'label' => __('Social link', 'stock-market'),
                    'hide' => true,
                    'fields' => array(
                        'facebook' => array(
                            'type' => 'text',
                            'label' => __('Facebook address', 'stock-market')
                        ),
                        'twitter' => array(
                            'type' => 'text',
                            'label' => __('Twitter address', 'stock-market')
                        ),
                        'google-plus' => array(
                            'type' => 'text',
                            'label' => __('Google-plus address', 'stock-market')
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
        return 'contact-info-template';
    }

    function get_style_name($instance)
    {
        return false;
    }
}

siteorigin_widget_register('stock-market-contact-info', __FILE__, 'Stock_Market_Contact_Info');