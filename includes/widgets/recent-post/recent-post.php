<?php

/**
 * Widget Name: Stock Market: Recent Post Widget
 * Description: Recent Post Widget
 * Author: thaibm
 * Author URI:
 * Widget URI:
 * Video URI:
 **/
class Recent_Post_Widget extends SiteOrigin_Widget {

	function __construct() {
		//Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.

		//Call the parent constructor with the required arguments.
		parent::__construct(
		// The unique id for your widget.
			'recent-post-widget',

			// The name of the widget for display purposes.
			__( 'Stock Market: Recent Post', 'stock-market' ),

			// The $widget_options array, which is passed through to WP_Widget.
			// It has a couple of extras like the optional help URL, which should link to your sites help or support page.
			array(
				'description'   => __( 'Recent Post Widget.', 'stock-market' ),
				'panels_groups' => array( 'stock-market' )
			),

			//The $control_options array, which is passed through to WP_Widget
			array(),

			//The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
			array(
				'quantity' => array(
					'type' => 'number',
					'label' => __( 'Quantity of Post.', 'stock-market' ),
					'default' => 5,
					'description' => __('Default is 5 post.')
				)
			),

			//The $base_folder path string.
			plugin_dir_path( __FILE__ )
		);
	}

	function get_template_name( $instance ) {
		return 'recent-post-template';
	}

}

siteorigin_widget_register( 'recent-post-widget', __FILE__, 'Recent_Post_Widget' );
