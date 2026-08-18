<?php

return array(
	'id'     => 'educamb_footer_settings',
	'title'  => esc_html__( "Educamb footer Settings", "konia" ),
	'fields' => array(
		array(
			'id'      => 'footer_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Footer Source Type', 'educamb' ),
			'options' => array(
				'd'    => esc_html__( 'Default', 'educamb' ),
				'e'    => esc_html__( 'Elementor', 'educamb' ),
			),
			'default' => '',
		),
		array(
			'id'       => 'footer_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'viral-buzz' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
				'orderby'  => 'title',
				'order'     => 'DESC'
			],
			'required' => [ 'footer_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'footer_style_settings',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Choose Footer Styles', 'educamb' ),
			'options'  => array(
				'footer_v1' => array(
					'alt' => 'Footer Style University',
					'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v1.png',
				),
				'footer_v2' => array(
					'alt' => 'Footer Style Kindergarten',
					'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v2.png',
				),
				'footer_v3' => array(
					'alt' => 'Footer Style Academy',
					'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v3.png',
				),
				'footer_v4' => array(
					'alt' => 'Footer Style Instructor',
					'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v4.png',
				),
				'footer_v5' => array(
					'alt' => 'Footer Style Marketplace',
					'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v5.png',
				),
				'footer_v6' => array(
					'alt' => 'Footer Style Single Course',
					'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v6.png',
				),
				'footer_v7' => array(
					'alt' => 'Footer Style Cooking Course',
					'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v7.png',
				),
				'footer_v8' => array(
					'alt' => 'Footer Style Quiz Learning',
					'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v8.png',
				),
				'footer_v9' => array(
					'alt' => 'Footer Style College',
					'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v9.png',
				),
				'footer_v10' => array(
					'alt' => 'Footer Style High School',
					'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v10.png',
				),
			),
			'required' => array( array( 'footer_source_type', 'equals', 'd' ) ),
		),
	),
);