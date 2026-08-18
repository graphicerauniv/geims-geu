<?php

return array(
	'id'     => 'educamb_banner_settings',
	'title'  => esc_html__( "Educamb Banner Settings", "konia" ),
	'fields' => array(
		array(
			'id'      => 'banner_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Banner Source Type', 'educamb' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'educamb' ),
				'e' => esc_html__( 'Elementor', 'educamb' ),
			),
			'default' => '',
		),
		array(
			'id'       => 'banner_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'viral-buzz' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
			],
			'required' => [ 'banner_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'banner_page_banner',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Banner', 'educamb' ),
			'default'  => false,
			'required' => [ 'banner_source_type', '=', 'd' ],
		),
		array(
			'id'       => 'page_banner_style',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Banner Style', 'educamb' ),
			'desc'     => esc_html__( 'Select Banner Style', 'educamb' ),
			'required' => array( 'banner_page_banner', '=', true ),
			'options'  => array(
				'banner_v1' => array(
					'alt' => 'Banner Style University',
					'img' => get_template_directory_uri() . '/assets/images/redux/banner/banner1.png',
				),
				'banner_v2' => array(
					'alt' => 'Banner Style Kindergarten',
					'img' => get_template_directory_uri() . '/assets/images/redux/banner/banner2.png',
				),
				'banner_v3' => array(
					'alt' => 'Banner Style Academy',
					'img' => get_template_directory_uri() . '/assets/images/redux/banner/banner3.png',
				),
				'banner_v4' => array(
					'alt' => 'Banner Style Instructor',
					'img' => get_template_directory_uri() . '/assets/images/redux/banner/banner4.png',
				),
				'banner_v5' => array(
					'alt' => 'Banner Style Marketplace',
					'img' => get_template_directory_uri() . '/assets/images/redux/banner/banner5.png',
				),
				'banner_v6' => array(
					'alt' => 'Banner Style Single Course',
					'img' => get_template_directory_uri() . '/assets/images/redux/banner/banner6.png',
				),
				'banner_v7' => array(
					'alt' => 'Banner Style Cooking Course',
					'img' => get_template_directory_uri() . '/assets/images/redux/banner/banner7.png',
				),
				'banner_v8' => array(
					'alt' => 'Banner Style College',
					'img' => get_template_directory_uri() . '/assets/images/redux/banner/banner8.png',
				),
				'banner_v9' => array(
					'alt' => 'Banner Style High School',
					'img' => get_template_directory_uri() . '/assets/images/redux/banner/banner9.png',
				),
				'banner_v10' => array(
					'alt' => 'Banner Style Kindergarten Contact Us Page',
					'img' => get_template_directory_uri() . '/assets/images/redux/banner/banner10.png',
				),				
			),
			'default'  => 'banner_v1',
		),
		array(
			'id'       => 'banner_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'educamb' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'educamb' ),
			'required' => array( 'banner_page_banner', '=', true ),
		),
		array(
			'id'       => 'banner_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'educamb' ),
			'desc'     => esc_html__( 'Insert background image for banner', 'educamb' ),
			'default'  => array(
				'url' => EDUCAMB_URI . 'assets/images/breadcrumb/breadcrumb-1.jpg',
			),
			'required' => array( 'banner_page_banner', '=', true ),
		),
	),
);