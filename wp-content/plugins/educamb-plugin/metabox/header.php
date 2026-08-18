<?php

return array(
	'id'     => 'educamb_header_settings',
	'title'  => esc_html__( "Educamb Header Settings", "konia" ),
	'fields' => array(
		array(
			'id'      => 'header_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Header Source Type', 'educamb' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'educamb' ),
				'e' => esc_html__( 'Elementor', 'educamb' ),
			),
			'default'=> '',
		),
		array(
			'id'       => 'header_new_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'educamb-plugin' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page' => -1,
				'orderby'  => 'title',
				'order'     => 'DESC'
			],
			'required' => [ 'header_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'header_style_settings',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Choose Header Styles', 'educamb' ),
			'options'  => array(
				'header_v1' => array(
					'alt' => 'Header Style University',
					'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v1.png',
				),
				'header_v2' => array(
					'alt' => 'Header Style Kindergarten',
					'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v2.png',
				),
				'header_v3' => array(
					'alt' => 'Header Style Academy',
					'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v3.png',
				),
				'header_v4' => array(
					'alt' => 'Header Style Instructor',
					'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v4.png',
				),
				'header_v5' => array(
					'alt' => 'Header Style Marketplace',
					'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v5.png',
				),
				'header_v6' => array(
					'alt' => 'Header Style Single Course',
					'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v6.png',
				),
				'header_v7' => array(
					'alt' => 'Header Style Cooking Course',
					'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v7.png',
				),
				'header_v8' => array(
					'alt' => 'Header Style Quiz Learning',
					'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v8.png',
				),
				'header_v9' => array(
					'alt' => 'Header Style College',
					'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v9.png',
				),
				'header_v10' => array(
					'alt' => 'Header Style High School',
					'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v10.png',
				),
			),
			'required' => array( array( 'header_source_type', 'equals', 'd' ) ),
		),
	),
);