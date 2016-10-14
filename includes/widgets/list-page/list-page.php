<?php

/*
Widget Name: List Page
Description: A widget to list sub pages of current page
Author: Hien Doan
*/


class List_Page extends SiteOrigin_Widget
{

    function __construct()
    {
        //Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.

        //Call the parent constructor with the required arguments.
        parent::__construct(
        // The unique id for your widget.
            'list-page',

            // The name of the widget for display purposes.
            __('List Page', 'stock-market'),

            // The $widget_options array, which is passed through to WP_Widget.
            // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
            array(
                'description' => __('List Page: Liệt kê các sub page của trang hiện tại', 'stock-market'),
                'panels_groups' => array('stock-market')
            ),

            //The $control_options array, which is passed through to WP_Widget
            array(),

            //The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
            array(),

            //The $base_folder path string.
            plugin_dir_path(__FILE__)
        );
    }

    function get_template_name($instance)
    {
        return 'list-page-template';
    }

    function get_style_name($instance)
    {
        return false;
    }
}

siteorigin_widget_register('list-page', __FILE__, 'List_Page');