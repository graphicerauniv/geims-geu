<?php
return array(
	'title'      => esc_html__( 'Logo Setting', 'educamb' ),
	'id'         => 'logo_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'       => 'image_favicon',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Favicon', 'educamb' ),
			'subtitle' => esc_html__( 'Insert site favicon image', 'educamb' ),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/images/favicon.png' ),
		),
		
		//Home One Logo
		array(
            'id' => 'home_one_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable University Home Logo', 'educamb'),
            'default' => true,
        ),
		array(
			'id'       => 'home_logo_one',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'University Home Logo Image', 'educamb' ),
			'subtitle' => esc_html__( 'Insert Site University Home Logo Image', 'educamb' ),
			'required' => array( 'home_one_logo_show', '=', true ),
		),
		array(
			'id'       => 'home_logo_dimension_one',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'University Home Logo Dimentions', 'educamb' ),
			'subtitle' => esc_html__( 'Select University Home Logo Dimentions', 'educamb' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'home_one_logo_show', '=', true ),
		),
		
		//Home One Sticky Logo
		array(
            'id' => 'home_one_sticky_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable University Home Sticky Logo', 'educamb'),
            'default' => true,
        ),
		array(
			'id'       => 'home_sticky_logo_one',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'University Home Sticky Logo Image', 'educamb' ),
			'subtitle' => esc_html__( 'Insert Site University Home Sticky Logo Image', 'educamb' ),
			'required' => array( 'home_one_sticky_logo_show', '=', true ),
		),
		array(
			'id'       => 'home_sticky_logo_dimension_one',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'University Home Sticky Logo Dimentions', 'educamb' ),
			'subtitle' => esc_html__( 'Select University Home Sticky Logo Dimentions', 'educamb' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'home_one_sticky_logo_show', '=', true ),
		),
		
		//Mobile Logo Settings
		array(
            'id' => 'mobile_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable Mobile Logo', 'educamb'),
            'default' => true,
        ),
		array(
			'id'       => 'mobile_logo_one',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Mobile Logo Image', 'educamb' ),
			'subtitle' => esc_html__( 'Insert Site Mobile Logo Image', 'educamb' ),
			'required' => array( 'mobile_logo_show', '=', true ),
		),
		array(
			'id'       => 'mobile_logo_dimension_one',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Mobile Logo Dimentions', 'educamb' ),
			'subtitle' => esc_html__( 'Select Mobile Logo Dimentions', 'educamb' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'mobile_logo_show', '=', true ),
		),
		
		//Home Two Logo
		array(
            'id' => 'home_two_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable Kindergarten Home Logo', 'educamb'),
            'default' => true,
        ),
		array(
			'id'       => 'header_two_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Kindergarten Home Logo Image', 'educamb' ),
			'subtitle' => esc_html__( 'Insert Site Kindergarten Home Logo Image', 'educamb' ),
			'required' => array( 'home_two_logo_show', '=', true ),
		),
		array(
			'id'       => 'header_two_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Kindergarten Home Logo Dimentions', 'educamb' ),
			'subtitle' => esc_html__( 'Select Kindergarten Home Logo Dimentions', 'educamb' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'home_two_logo_show', '=', true ),
		),
		
		//Sidebar Logo Settings
		array(
            'id' => 'sidebar_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable Sidebar Logo', 'educamb'),
            'default' => true,
        ),
		array(
			'id'       => 'sidebar_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Sidebar Logo Image', 'educamb' ),
			'subtitle' => esc_html__( 'Insert Site Sidebar Logo Image', 'educamb' ),
			'required' => array( 'sidebar_logo_show', '=', true ),
		),
		array(
			'id'       => 'sidebar_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Sidebar Logo Dimentions', 'educamb' ),
			'subtitle' => esc_html__( 'Select Sidebar Logo Dimentions', 'educamb' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'sidebar_logo_show', '=', true ),
		),
		
		//Home Three Logo
		array(
            'id' => 'home_three_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable Academy Home Logo', 'educamb'),
            'default' => true,
        ),
		array(
			'id'       => 'home_three_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Academy Home Logo Image', 'educamb' ),
			'subtitle' => esc_html__( 'Insert Site Academy Home Logo Image', 'educamb' ),
			'required' => array( 'home_three_logo_show', '=', true ),
		),
		array(
			'id'       => 'home_three_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Academy Home Logo Dimentions', 'educamb' ),
			'subtitle' => esc_html__( 'Select Academy Home Logo Dimentions', 'educamb' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'home_three_logo_show', '=', true ),
		),
		
		//Home Three Sticky Logo
		array(
            'id' => 'home_sticky_logo_three_show',
            'type' => 'switch',
            'title' => esc_html__('Enable Academy Home Sticky Logo', 'educamb'),
            'default' => true,
        ),
		array(
			'id'       => 'home_sticky_logo_three',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Academy Home Sticky Logo Image', 'educamb' ),
			'subtitle' => esc_html__( 'Insert Site Academy Home Sticky Logo Image', 'educamb' ),
			'required' => array( 'home_sticky_logo_three_show', '=', true ),
		),
		array(
			'id'       => 'home_sticky_logo_dimension_three',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Academy Home Sticky Logo Dimentions', 'educamb' ),
			'subtitle' => esc_html__( 'Select Academy Home Sticky Logo Dimentions', 'educamb' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'home_sticky_logo_three_show', '=', true ),
		),
		
		//Home Four Logo
		array(
            'id' => 'home_four_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable Instructor Home Logo', 'educamb'),
            'default' => true,
        ),
		array(
			'id'       => 'home_four_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Instructor Home Logo Image', 'educamb' ),
			'subtitle' => esc_html__( 'Insert Site Instructor Home Logo Image', 'educamb' ),
			'required' => array( 'home_four_logo_show', '=', true ),
		),
		array(
			'id'       => 'home_four_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Instructor Home Logo Dimentions', 'educamb' ),
			'subtitle' => esc_html__( 'Select Instructor Home Logo Dimentions', 'educamb' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'home_four_logo_show', '=', true ),
		),
		
		//Home Five Logo
		array(
            'id' => 'home_five_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable Marketplace Home Logo', 'educamb'),
            'default' => true,
        ),
		array(
			'id'       => 'home_five_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Marketplace Home Logo Image', 'educamb' ),
			'subtitle' => esc_html__( 'Insert Site Marketplace Home Logo Image', 'educamb' ),
			'required' => array( 'home_five_logo_show', '=', true ),
		),
		array(
			'id'       => 'home_five_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Marketplace Home Logo Dimentions', 'educamb' ),
			'subtitle' => esc_html__( 'Select Marketplace Home Logo Dimentions', 'educamb' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'home_five_logo_show', '=', true ),
		),
		
		//Home Six Logo
		array(
            'id' => 'home_six_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable Single Course Home Logo', 'educamb'),
            'default' => true,
        ),
		array(
			'id'       => 'home_six_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Single Course Home Logo Image', 'educamb' ),
			'subtitle' => esc_html__( 'Insert Site Single Course Home Logo Image', 'educamb' ),
			'required' => array( 'home_six_logo_show', '=', true ),
		),
		array(
			'id'       => 'home_six_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Single Course Home Logo Dimentions', 'educamb' ),
			'subtitle' => esc_html__( 'Select Single Course Home Logo Dimentions', 'educamb' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'home_six_logo_show', '=', true ),
		),
		
		//Home Seven Logo
		array(
            'id' => 'home_seven_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable Cooking Course Home Logo', 'educamb'),
            'default' => true,
        ),
		array(
			'id'       => 'home_seven_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Cooking Course Home Logo Image', 'educamb' ),
			'subtitle' => esc_html__( 'Insert Site Cooking Course Home Logo Image', 'educamb' ),
			'required' => array( 'home_seven_logo_show', '=', true ),
		),
		array(
			'id'       => 'home_seven_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Cooking Course Home Logo Dimentions', 'educamb' ),
			'subtitle' => esc_html__( 'Select Cooking Course Home Logo Dimentions', 'educamb' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'home_seven_logo_show', '=', true ),
		),
		
		//Home Eight Logo
		array(
            'id' => 'home_eight_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable Quiz Learning Home Logo', 'educamb'),
            'default' => true,
        ),
		array(
			'id'       => 'home_eight_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Quiz Learning Home Logo Image', 'educamb' ),
			'subtitle' => esc_html__( 'Insert Site Quiz Learning Home Logo Image', 'educamb' ),
			'required' => array( 'home_eight_logo_show', '=', true ),
		),
		array(
			'id'       => 'home_eight_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Quiz Learning Home Logo Dimentions', 'educamb' ),
			'subtitle' => esc_html__( 'Select Quiz Learning Home Logo Dimentions', 'educamb' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'home_eight_logo_show', '=', true ),
		),
		
		//Home Eight Logo
		array(
            'id' => 'home_eight_sticky_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable Quiz Learning Sticky Logo', 'educamb'),
            'default' => true,
        ),
		array(
			'id'       => 'home_eight_sticky_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Quiz Learning Sticky Logo Image', 'educamb' ),
			'subtitle' => esc_html__( 'Insert Site Quiz Learning Sticky Logo Image', 'educamb' ),
			'required' => array( 'home_eight_logo_show', '=', true ),
		),
		array(
			'id'       => 'home_eight_sticky_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Quiz Learning Sticky Logo Dimentions', 'educamb' ),
			'subtitle' => esc_html__( 'Select Quiz Learning Sticky Logo Dimentions', 'educamb' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'home_eight_logo_show', '=', true ),
		),
		
		//Home Nine Logo
		array(
            'id' => 'home_nine_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable College Home Logo', 'educamb'),
            'default' => true,
        ),
		array(
			'id'       => 'home_nine_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'College Home Logo Image', 'educamb' ),
			'subtitle' => esc_html__( 'Insert Site College Home Logo Image', 'educamb' ),
			'required' => array( 'home_nine_logo_show', '=', true ),
		),
		array(
			'id'       => 'home_nine_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'College Home Logo Dimentions', 'educamb' ),
			'subtitle' => esc_html__( 'Select College Home Logo Dimentions', 'educamb' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'home_nine_logo_show', '=', true ),
		),		
		//Home College Sticky Logo
		array(
            'id' => 'home_nine_sticky_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable College Home Sticky Logo', 'educamb'),
            'default' => true,
        ),
		array(
			'id'       => 'home_sticky_logo_nine',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'College Home Sticky Logo Image', 'educamb' ),
			'subtitle' => esc_html__( 'Insert Site College Home Sticky Logo Image', 'educamb' ),
			'required' => array( 'home_nine_sticky_logo_show', '=', true ),
		),
		array(
			'id'       => 'home_sticky_logo_dimension_nine',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'College Home Sticky Logo Dimentions', 'educamb' ),
			'subtitle' => esc_html__( 'Select College Home Sticky Logo Dimentions', 'educamb' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'home_nine_sticky_logo_show', '=', true ),
		),
		
		//Home Ten Logo
		array(
            'id' => 'home_ten_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable High School Home Logo', 'educamb'),
            'default' => true,
        ),
		array(
			'id'       => 'home_ten_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'High School Home Image', 'educamb' ),
			'subtitle' => esc_html__( 'Insert Site High School Home Logo Image', 'educamb' ),
			'required' => array( 'home_ten_logo_show', '=', true ),
		),
		array(
			'id'       => 'home_ten_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'High School Home Logo Dimentions', 'educamb' ),
			'subtitle' => esc_html__( 'Select High School Home Logo Dimentions', 'educamb' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'home_ten_logo_show', '=', true ),
		),
		
		
		array(
			'id'       => 'logo_settings_section_end',
			'type'     => 'section',
			'indent'      => false,
		),
	),
);
