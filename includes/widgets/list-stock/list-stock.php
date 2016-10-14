<?php

/**
 * Widget Name: Stock Market: List Stock
 * Description: List Stock
 * Author: thaibm
 * Author URI:
 * Widget URI:
 * Video URI:
 **/
class List_Stock_Widget extends SiteOrigin_Widget {

	function __construct() {
		//Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.

		//Call the parent constructor with the required arguments.
		parent::__construct(
		// The unique id for your widget.
			'list-stock-widget',

			// The name of the widget for display purposes.
			__( 'Stock Market: List Stock', 'stock-market' ),

			// The $widget_options array, which is passed through to WP_Widget.
			// It has a couple of extras like the optional help URL, which should link to your sites help or support page.
			array(
				'description'   => __( 'List Stock Widget.', 'stock-market' ),
				'panels_groups' => array( 'stock-market' )
			),

			//The $control_options array, which is passed through to WP_Widget
			array(),

			//The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
			array(
				'list-stock' => array(
					'type'       => 'repeater',
					'label'      => __( 'Bảng chứng khoán.', 'stock-market' ),
					'item_name'  => __( 'Mã chứng khoán', 'investment-detail-widgets' ),
					'item_label' => array(
						'selector'     => "[id*='ma-chung-khoan']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields'     => array(
						'file' => array(
							'type' => 'media',
							'label' => __( 'Choose a PDF file', 'stock-market' ),
							'choose' => __( 'Choose PDF file', 'stock-market' ),
							'update' => __( 'Set file', 'stock-market' ),
							'library' => 'file',
							'fallback' => true
						),
						'stt' => array(
							'type'  => 'number',
							'label' => __( 'STT:', 'stock-market' )
						),
						'ma-chung-khoan' => array(
							'type'  => 'text',
							'label' => __( 'Mã chứng khoán:', 'stock-market' )
						),
						'gia-mua-binh-quan' => array(
							'type'  => 'text',
							'label' => __( 'Giá mua bình quân:', 'stock-market' ),
							'description' => __('Chín nghìn VND nhập: 9,000')
						),
						'gia-thi-truong' => array(
							'type'  => 'text',
							'label' => __( 'Giá thị trường:', 'stock-market' ),
							'description' => __('Chín nghìn VND nhập: 9,000')
						),
						'lai-lo' => array(
							'type' => 'section',
							'label' => __( 'Lãi/lỗ (%):', 'stock-market' ),
							'fields'=> array(
								'type' => array(
									'type' => 'radio',
									'label' => __( 'Chọn lãi hoặc lỗ', 'stock-market' ),
									'default' => 'lai',
									'options' => array(
										'lai' => __( 'Lãi', 'stock-market' ),
										'lo' => __( 'Lỗ', 'stock-market' )
									)
								),
								'value' => array(
									'type'  => 'number',
									'label' => __( 'Giá trị Lãi/lỗ (%):', 'stock-market' ),
									'description' => __('9 phần trăm nhập: 9')
								)
							)
						),
						'ti-trong' => array(
							'type'  => 'text',
							'label' => __( 'Tỉ trọng:', 'stock-market' ),
							'description' => __('Nhập tỉ lệ dưới dạng a/b. Ví dụ: 3/4.')
						),
					)
				),
			),

			//The $base_folder path string.
			plugin_dir_path( __FILE__ )
		);
	}

	function enqueue_frontend_scripts($instance)
	{
		wp_enqueue_script('liststock-js', STOCK_MARKET_URI . 'includes/widgets/list-stock/js/list-stock.js', array('jquery'), '', true);
	}

	function get_template_name( $instance ) {
		return 'list-stock-template';
	}

}

siteorigin_widget_register( 'list-stock-widget', __FILE__, 'List_Stock_Widget' );
