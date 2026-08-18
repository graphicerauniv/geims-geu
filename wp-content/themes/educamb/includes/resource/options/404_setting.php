<?php

return array(
	'title'      => esc_html__( '404 Page Settings', 'educamb' ),
	'id'         => '404_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => '404_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( '404 Source Type', 'educamb' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'educamb' ),
				'e' => esc_html__( 'Elementor', 'educamb' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => '404_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'educamb' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
			],
			'required' => [ '404_source_type', '=', 'e' ],
		),
		array(
			'id'       => '404_default_st',
			'type'     => 'section',
			'title'    => esc_html__( '404 Default', 'educamb' ),
			'indent'   => true,
			'required' => [ '404_source_type', '=', 'd' ],
		),
		array(
			'id'      => '404_page_banner',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Banner', 'educamb' ),
			'desc'    => esc_html__( 'Enable to show banner on blog', 'educamb' ),
			'default' => true,
		),
		array(
			'id'       => '404_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'educamb' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'educamb' ),
			'required' => array( '404_page_banner', '=', true ),
		),
		array(
			'id'       => '404_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'educamb' ),
			'desc'     => esc_html__( 'Insert background image for banner', 'educamb' ),
			'default'  => '',
			'required' => array( '404_page_banner', '=', true ),
		),
		array(
			'id'    => '404_page_title',
			'type'  => 'text',
			'title' => esc_html__( '404 Page Heading', 'educamb' ),
			'desc'  => esc_html__( 'Enter 404 section Page Heading that you want to show', 'educamb' ),
		),
		array(
			'id'    => '404_page_text1',
			'type'  => 'textarea',
			'title' => esc_html__( '404 Page Description', 'educamb' ),
			'desc'  => esc_html__( 'Enter 404 page description that you want to show.', 'educamb' ),
		),
		array(
			'id'    => 'back_home_btn',
			'type'  => 'switch',
			'title' => esc_html__( 'Show Button', 'educamb' ),
			'desc'  => esc_html__( 'Enable to show back to home button.', 'educamb' ),
			'default'  => true,
		),
		array(
			'id'       => 'back_home_btn_label',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Label', 'educamb' ),
			'desc'     => esc_html__( 'Enter back to home button label that you want to show.', 'educamb' ),
			'default'  => esc_html__( 'Back To Home', 'educamb' ),
			'required' => array( 'back_home_btn', '=', true ),
		),
		array(
			'id'     => '404_post_settings_end',
			'type'   => 'section',
			'indent' => false,
		),
	),
);