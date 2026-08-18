<?php

return array(
	'title'      => esc_html__( 'Single Post Settings', 'educamb' ),
	'id'         => 'single_post_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'single_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Single Post Source Type', 'educamb' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'educamb' ),
				'e' => esc_html__( 'Elementor', 'educamb' ),
			),
			'default' => 'd',
		),
		
		array(
			'id'       => 'single_default_st',
			'type'     => 'section',
			'title'    => esc_html__( 'Post Default', 'educamb' ),
			'indent'   => true,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
		array(
			'id'      => 'single_post_date',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Date', 'educamb' ),
			'desc'    => esc_html__( 'Enable to show post publish date on posts detail page', 'educamb' ),
			'default' => true,
		),
		array(
			'id'      => 'single_post_author',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author', 'educamb' ),
			'desc'    => esc_html__( 'Enable to show author on posts detail page', 'educamb' ),
			'default' => true,
		),
		array(
			'id'      => 'single_post_comments',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Comments', 'educamb' ),
			'desc'    => esc_html__( 'Enable to show number of comments on posts single page', 'educamb' ),
			'default' => true,
		),
		array(
			'id'      => 'facebook_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Facebook Post Share', 'educamb' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Facebook', 'educamb' ),
			'default' => false,
		),
		array(
			'id'      => 'twitter_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Twitter Post Share', 'educamb' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Twitter', 'educamb' ),
			'default' => false,
		),
		array(
			'id'      => 'linkedin_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Linkedin Post Share', 'educamb' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Linkedin', 'educamb' ),
			'default' => false,
		),
		array(
			'id'      => 'pinterest_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Pinterest Post Share', 'educamb' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Pinterest', 'educamb' ),
			'default' => false,
		),
		array(
			'id'      => 'reddit_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Reddit Post Share', 'educamb' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Reddit', 'educamb' ),
			'default' => false,
		),
		array(
			'id'      => 'tumblr_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Tumblr Post Share', 'educamb' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Tumblr', 'educamb' ),
			'default' => false,
		),
		array(
			'id'      => 'digg_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Digg Post Share', 'educamb' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Digg', 'educamb' ),
			'default' => false,
		),
		array(
			'id'      => 'single_post_author_box',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author Box', 'educamb' ),
			'desc'    => esc_html__( 'Enable to show author box on post detail page.', 'educamb' ),
			'default' => false,
		),
		array(
			'id'       => 'single_section_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
	),
);





