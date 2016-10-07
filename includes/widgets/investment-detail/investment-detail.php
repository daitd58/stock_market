<?php

/**
 * Widget Name: Stock Market: Investment Detail
 * Description: Investment Detail
 * Author: thaibm
 * Author URI:
 * Widget URI:
 * Video URI:
 **/
class Investment_Detail_Widget extends SiteOrigin_Widget {

	function __construct() {
		//Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.

		//Call the parent constructor with the required arguments.
		parent::__construct(
		// The unique id for your widget.
			'investment-detail-widget',

			// The name of the widget for display purposes.
			__( 'Stock Market: Investment Detail', 'stock-market' ),

			// The $widget_options array, which is passed through to WP_Widget.
			// It has a couple of extras like the optional help URL, which should link to your sites help or support page.
			array(
				'description'   => __( 'Investment Detail Widget.', 'stock-market' ),
				'panels_groups' => array( 'stock-market' )
			),

			//The $control_options array, which is passed through to WP_Widget
			array(),

			//The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
			array(
				'investment' => array(
					'type'       => 'repeater',
					'label'      => __( 'Investment detail.', 'stock-market' ),
					'item_name'  => __( 'Investment detail', 'investment-detail-widgets' ),
					'item_label' => array(
						'selector'     => "[id*='title']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields'     => array(
						'title'     => array(
							'type'  => 'text',
							'label' => __( 'A title of a investment detail.', 'stock-market' )
						),
						'description' => array(
							'type'  => 'text',
							'label' => __( 'Description.', 'stock-market' )
						),
						'featured_image' => array(
							'type' => 'media',
							'label' => __( 'Choose a media thing', 'stock-market' ),
							'choose' => __( 'Choose image', 'stock-market' ),
							'update' => __( 'Set image', 'stock-market' ),
							'library' => 'image',
							'fallback' => true
						),
						'file' => array(
							'type' => 'media',
							'label' => __( 'Choose a PDF file', 'stock-market' ),
							'choose' => __( 'Choose PDF file', 'stock-market' ),
							'update' => __( 'Set file', 'stock-market' ),
							'library' => 'file',
							'fallback' => true
						),
					)
				)

			),

			//The $base_folder path string.
			plugin_dir_path( __FILE__ )
		);
	}

	function get_template_name( $instance ) {
		return 'investment-detail-template';
	}

}

siteorigin_widget_register( 'investment-detail-widget', __FILE__, 'Investment_Detail_Widget' );
