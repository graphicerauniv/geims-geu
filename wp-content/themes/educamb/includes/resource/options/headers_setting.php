<?php
return array(
	'title'      => esc_html__( 'Header Setting', 'educamb' ),
	'id'         => 'headers_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'header_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Header Source Type', 'educamb' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'educamb' ),
				'e' => esc_html__( 'Elementor', 'educamb' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'header_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'educamb' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'header_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'header_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Settings', 'educamb' ),
			'required' => array( 'header_source_type', '=', 'd' ),
		),

		//Header Settings
		array(
		    'id'       => 'header_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Header Styles', 'educamb' ),
		    'subtitle' => esc_html__( 'Choose Header Styles', 'educamb' ),
		    'options'  => array(

			    'header_v1'  => array(
				    'alt' => esc_html__( 'Header Style University', 'educamb' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v1.png',
			    ),
			    'header_v2'  => array(
				    'alt' => esc_html__( 'Header Style Kindergarten', 'educamb' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v2.png',
			    ),
				'header_v3'  => array(
				    'alt' => esc_html__( 'Header Style Academy', 'educamb' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v3.png',
			    ),
				'header_v4'  => array(
				    'alt' => esc_html__( 'Header Style Instructor', 'educamb' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v4.png',
			    ),
			    'header_v5'  => array(
				    'alt' => esc_html__( 'Header Style Marketplace', 'educamb' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v5.png',
			    ),
			    'header_v6'  => array(
				    'alt' => esc_html__( 'Header Style Single Course', 'educamb' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v6.png',
			    ),
			    'header_v7'  => array(
				    'alt' => esc_html__( 'Header Style Cooking Course', 'educamb' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v7.png',
			    ),
			    'header_v8'  => array(
				    'alt' => esc_html__( 'Header Style Quiz Learning', 'educamb' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v8.png',
			    ),
			    'header_v9'  => array(
				    'alt' => esc_html__( 'Header Style College', 'educamb' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v9.png',
			    ),
			    'header_v10'  => array(
				    'alt' => esc_html__( 'Header Style High School', 'educamb' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v10.png',
			    ),
			),
			'required' => array( 'header_source_type', '=', 'd' ),
			'default' => 'header_v1',
	    ),

		/***********************************************************************
								Header Version 1 Start
		************************************************************************/
		array(
			'id'       => 'header_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style University Settings', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
		),
		
		//Header Top Info
		array(
            'id' => 'show_topbar_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Topbar', 'educamb'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
            'id' => 'info_text_v1_show',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Info Title', 'educamb'),
            'default' => true,
            'required' => array( 'show_topbar_v1', '=', true ),
        ),
		array(
			'id'      => 'info_text_v1',
			'type'    => 'text',
			'title'   => __( 'Info Title', 'educamb' ),
			'required' => array( 'info_text_v1_show', '=', true ),
		),
		array(
            'id' => 'select_box_v1_show',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Info Title', 'educamb'),
            'default' => true,
            'required' => array( 'show_topbar_v1', '=', true ),
        ),
		array(
			'id'      => 'select_box_v1',
			'type'    => 'textarea',
			'title'   => __( 'Select Box HTML', 'educamb' ),
			'required' => array( 'select_box_v1_show', '=', true ),
		),
		array(
			'id'      => 'subscribe_v1',
			'type'    => 'text',
			'title'   => __( 'Subscribe Title', 'educamb' ),
			'required' => array( 'show_topbar_v1', '=', true ),
		),
		array(
			'id'      => 'subscribe_link_v1',
			'type'    => 'text',
			'title'   => __( 'Subscribe Link', 'educamb' ),
			'required' => array( 'show_topbar_v1', '=', true ),
		),
		array(
			'id'      => 'social_title_v1',
			'type'    => 'text',
			'title'   => __( 'Social Title', 'educamb' ),
			'required' => array( 'show_topbar_v1', '=', true ),
		),
		array(
            'id'    => 'header_social_share_v1',
            'type'  => 'social_media',
            'title' => esc_html__( 'Social Media', 'educamb' ),
            'required' => array( 'show_topbar_v1', '=', true ),
        ),
		array(
			'id'      => 'quick_links_title_v1',
			'type'    => 'text',
			'title'   => __( 'Quick Menu Title', 'educamb' ),
			'required' => array( 'show_topbar_v1', '=', true ),
		),
		array(
			'id'      => 'quick_links_v1',
			'type'    => 'textarea',
			'title'   => __( 'Quick Menu HTML', 'educamb' ),
			'required' => array( 'show_topbar_v1', '=', true ),
		),
		
		//Lower Header Info
		
		//Search Form Switcher
		array(
            'id' => 'show_seach_form_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Form', 'educamb'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
			'id'      => 'login_text_v1',
			'type'    => 'text',
			'title'   => __( 'Login Title', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
		),
		array(
			'id'      => 'login_link_v1',
			'type'    => 'text',
			'title'   => __( 'Login Link', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
		),
		array(
			'id'      => 'apply_text_v1',
			'type'    => 'text',
			'title'   => __( 'Apply Title', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
		),
		array(
			'id'      => 'apply_link_v1',
			'type'    => 'text',
			'title'   => __( 'Apply Link', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
		),
		
		//Mobile Info
		array(
            'id' => 'show_msocial_share_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Social Icons', 'educamb'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
            'id'    => 'mheader_social_share_v1',
            'type'  => 'social_media',
            'title' => esc_html__( 'Mobile View Social Media', 'educamb' ),
            'required' => array( 'show_msocial_share_v1', '=', true ),
        ),
		/***********************************************************************
								Header Version 2 Start
		************************************************************************/
		array(
			'id'       => 'header_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Kindergarten Settings', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		
		//Header Top Info
		array(
            'id' => 'show_topbar_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Topbar', 'educamb'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),		
		//Pattern Images switcher
		array(
            'id' => 'show_pattern_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Topbar Pattern', 'educamb'),
            'default' => true,
            'required' => array( 'show_topbar_v2', '=', true ),
        ),		
		array(
			'id'      => 'top_bar_title_v2',
			'type'    => 'text',
			'title'   => __( 'Title', 'educamb' ),
			'required' => array( 'show_topbar_v2', '=', true ),
		),
		array(
			'id'      => 'top_address_v2',
			'type'    => 'textarea',
			'title'   => __( 'Address', 'educamb' ),
			'required' => array( 'show_topbar_v2', '=', true ),
		),
		array(
			'id'      => 'top_working_hours_v2',
			'type'    => 'text',
			'title'   => __( 'Working Hours', 'educamb' ),
			'required' => array( 'show_topbar_v2', '=', true ),
		),
		array(
			'id'      => 'top_menu_v2',
			'type'    => 'textarea',
			'title'   => __( 'Topbar Menu', 'educamb' ),
			'required' => array( 'show_topbar_v2', '=', true ),
		),
		array(
            'id'    => 'header_social_share_v2',
            'type'  => 'social_media',
            'title' => esc_html__( 'Social Media', 'educamb' ),
            'required' => array( 'show_topbar_v2', '=', true ),
        ),
		
		//Lower Header Info
		
		//Search Form Switcher
		array(
            'id' => 'show_seach_form_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Form', 'educamb'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
			'id'      => 'btn_title_v2',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		array(
			'id'      => 'btn_link_v2',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		array(
			'id'      => 'phone_title_v2',
			'type'    => 'text',
			'title'   => __( 'Phone Title', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		array(
			'id'      => 'phone_no_v2',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		
		//Mobile Info
		array(
            'id' => 'show_msocial_share_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Social Icons', 'educamb'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
            'id'    => 'mheader_social_share_v2',
            'type'  => 'social_media',
            'title' => esc_html__( 'Mobile View Social Media', 'educamb' ),
            'required' => array( 'show_msocial_share_v2', '=', true ),
        ),
        /***********************************************************************
								Header Version 3 Start
		************************************************************************/
		array(
			'id'       => 'header_v3_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Academy Settings', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
		),
		
		//Sidebar Info
		array(
            'id' => 'show_sidebar_info',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Sidebar Content Info', 'educamb'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),		
		array(
			'id'      => 'sidebar_title_v3',
			'type'    => 'text',
			'title'   => __( 'Sidebar Title', 'educamb' ),
			'required' => array( 'show_sidebar_info', '=', true ),
		),
		array(
			'id'      => 'sidebar_text_v3',
			'type'    => 'textarea',
			'title'   => __( 'Sidebar Content', 'educamb' ),
			'required' => array( 'show_sidebar_info', '=', true ),
		),
		array(
			'id'      => 'sidebar_form_title_v3',
			'type'    => 'text',
			'title'   => __( 'Sidebar Contact Title', 'educamb' ),
			'required' => array( 'show_sidebar_info', '=', true ),
		),
		array(
			'id'      => 'sidebar_form_code_v3',
			'type'    => 'textarea',
			'title'   => __( 'Sidebar Contact Form Url', 'educamb' ),
			'required' => array( 'show_sidebar_info', '=', true ),
		),
		array(
			'id'      => 'sidebar_info_title_v3',
			'type'    => 'text',
			'title'   => __( 'Sidebar Info Title', 'educamb' ),
			'required' => array( 'show_sidebar_info', '=', true ),
		),
		array(
			'id'      => 'sidebar_address_v3',
			'type'    => 'textarea',
			'title'   => __( 'Sidebar Address', 'educamb' ),
			'required' => array( 'show_sidebar_info', '=', true ),
		),
		array(
			'id'      => 'sidebar_Phone_no_v3',
			'type'    => 'text',
			'title'   => __( 'Sidebar Phone Number', 'educamb' ),
			'required' => array( 'show_sidebar_info', '=', true ),
		),
		array(
			'id'      => 'sidebar_email_v3',
			'type'    => 'text',
			'title'   => __( 'Sidebar Email', 'educamb' ),
			'required' => array( 'show_sidebar_info', '=', true ),
		),
		array(
            'id'    => 'sheader_social_share_v3',
            'type'  => 'social_media',
            'title' => esc_html__( 'Social Media', 'educamb' ),
            'required' => array( 'show_sidebar_info', '=', true ),
        ),
		
		//Lower Header Info
		
		//Search Form Switcher
		array(
            'id' => 'show_seach_form_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Form', 'educamb'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		array(
			'id'      => 'btn_title_v3',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
		),
		array(
			'id'      => 'btn_link_v3',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
		),
		array(
			'id'      => 'btn_title2_v3',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
		),
		array(
			'id'      => 'btn_link2_v3',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
		),
		
		//Mobile Info
		array(
            'id' => 'show_msocial_share_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Social Icons', 'educamb'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		array(
            'id'    => 'mheader_social_share_v3',
            'type'  => 'social_media',
            'title' => esc_html__( 'Mobile View Social Media', 'educamb' ),
            'required' => array( 'show_msocial_share_v3', '=', true ),
        ),
		/***********************************************************************
								Header Version 4 Start
		************************************************************************/
		array(
			'id'       => 'header_v4_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Instructor Settings', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v4' ),
		),
		
		//Author Icon Image
		array(
			'id'       => 'author_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Author Icon Image', 'educamb' ),
			'subtitle' => esc_html__( 'Insert author icon image', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v4' ),
		),
		array(
			'id'      => 'author_img_link_v4',
			'type'    => 'text',
			'title'   => __( 'Author Image Link', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v4' ),
		),
		
		//Mobile Info
		array(
            'id' => 'show_msocial_share_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Social Icons', 'educamb'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v4' ),
        ),
		array(
            'id'    => 'mheader_social_share_v4',
            'type'  => 'social_media',
            'title' => esc_html__( 'Mobile View Social Media', 'educamb' ),
            'required' => array( 'show_msocial_share_v4', '=', true ),
        ),
		/***********************************************************************
								Header Version 5 Start
		************************************************************************/
		array(
			'id'       => 'header_v5_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Marketplace Settings', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v5' ),
		),
		
		//Author Icon Image
		array(
			'id'       => 'author_logo5',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Author Icon Image', 'educamb' ),
			'subtitle' => esc_html__( 'Insert author icon image', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v5' ),
		),
		array(
			'id'      => 'author_img_link_v5',
			'type'    => 'text',
			'title'   => __( 'Author Image Link', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v5' ),
		),
		array(
			'id'      => 'btn_title_v5',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v5' ),
		),
		array(
			'id'      => 'btn_link_v5',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v5' ),
		),
		
		//Mobile Info
		array(
            'id' => 'show_msocial_share_v5',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Social Icons', 'educamb'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v5' ),
        ),
		array(
            'id'    => 'mheader_social_share_v5',
            'type'  => 'social_media',
            'title' => esc_html__( 'Mobile View Social Media', 'educamb' ),
            'required' => array( 'show_msocial_share_v5', '=', true ),
        ),
		/***********************************************************************
								Header Version 6 Start
		************************************************************************/
		array(
			'id'       => 'header_v6_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Single Course Settings', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v6' ),
		),
		
		//Social Media
		array(
            'id'    => 'header_v6_social_share',
            'type'  => 'social_media',
            'title' => esc_html__( 'Social Media', 'educamb' ),
            'required' => array( 'header_style_settings', '=', 'header_v6' ),
        ),
		
		array(
			'id'      => 'icon_user_link_v6',
			'type'    => 'text',
			'title'   => __( 'User Icon Link', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v6' ),
		),
		
		//Search Form Switcher
		array(
            'id' => 'show_seach_form_v6',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Form', 'educamb'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v6' ),
        ),
		array(
			'id'      => 'btn_title_v6',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v6' ),
		),
		array(
			'id'      => 'btn_link_v6',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v6' ),
		),
		
		//Mobile Info
		array(
            'id' => 'show_msocial_share_v6',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Social Icons', 'educamb'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v6' ),
        ),
		array(
            'id'    => 'mheader_social_share_v6',
            'type'  => 'social_media',
            'title' => esc_html__( 'Mobile View Social Media', 'educamb' ),
            'required' => array( 'show_msocial_share_v6', '=', true ),
        ),
		/***********************************************************************
								Header Version 7 Start
		************************************************************************/
		array(
			'id'       => 'header_v7_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Cooking Course Settings', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v7' ),
		),
		
		//Header Top Info
		array(
            'id' => 'show_topbar_v7',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Topbar', 'educamb'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v7' ),
        ),
		//Search Form Switcher
		array(
            'id' => 'show_seach_form_v7',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Form', 'educamb'),
            'default' => true,
            'required' => array( 'show_topbar_v7', '=', true ),
        ),		
		array(
			'id'      => 'top_header_text_v7',
			'type'    => 'textarea',
			'title'   => __( 'Topbar Text', 'educamb' ),
			'required' => array( 'show_topbar_v7', '=', true ),
		),
		array(
			'id'      => 'count_down_value_v7',
			'type'    => 'text',
			'title'   => __( 'Counter Value', 'educamb' ),
			'required' => array( 'show_topbar_v7', '=', true ),
		),
		array(
			'id'      => 'social_title_v7',
			'type'    => 'text',
			'title'   => __( 'Social Title', 'educamb' ),
			'required' => array( 'show_topbar_v7', '=', true ),
		),
		array(
            'id'    => 'header_v7_social_share',
            'type'  => 'social_media',
            'title' => esc_html__( 'Social Media', 'educamb' ),
            'required' => array( 'show_topbar_v7', '=', true ),
        ),
		
		//Lower Header Info
		array(
			'id'      => 'icon_user_link_v7',
			'type'    => 'text',
			'title'   => __( 'User Icon Link', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v7' ),
		),
		array(
			'id'      => 'btn_title_v7',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v7' ),
		),
		array(
			'id'      => 'btn_link_v7',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v7' ),
		),
		
		//Mobile Info
		array(
            'id' => 'show_msocial_share_v7',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Social Icons', 'educamb'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v7' ),
        ),
		array(
            'id'    => 'mheader_social_share_v7',
            'type'  => 'social_media',
            'title' => esc_html__( 'Mobile View Social Media', 'educamb' ),
            'required' => array( 'show_msocial_share_v7', '=', true ),
        ),
		/***********************************************************************
								Header Version 8 Start
		************************************************************************/
		array(
			'id'       => 'header_v8_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Quiz Learning Settings', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v8' ),
		),
		
		//Header Top Info
		array(
            'id' => 'show_topbar_v8',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Topbar', 'educamb'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v8' ),
        ),		
		array(
			'id'      => 'topbar_menu_v8',
			'type'    => 'textarea',
			'title'   => __( 'Topbar Menu', 'educamb' ),
			'required' => array( 'show_topbar_v8', '=', true ),
		),
		array(
			'id'      => 'social_title_v8',
			'type'    => 'text',
			'title'   => __( 'Social Title', 'educamb' ),
			'required' => array( 'show_topbar_v8', '=', true ),
		),
		array(
            'id'    => 'header_v8_social_share',
            'type'  => 'social_media',
            'title' => esc_html__( 'Social Media', 'educamb' ),
            'required' => array( 'show_topbar_v8', '=', true ),
        ),
		
		//Lower Header Info
		array(
			'id'      => 'icon_user_link_v8',
			'type'    => 'text',
			'title'   => __( 'User Icon Link', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v8' ),
		),
		array(
			'id'      => 'btn_title_v8',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v8' ),
		),
		array(
			'id'      => 'btn_link_v8',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v8' ),
		),
		//Search Form Switcher
		array(
            'id' => 'show_seach_form_v8',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Form', 'educamb'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v8' ),
        ),
		
		//Mobile Info
		array(
            'id' => 'show_msocial_share_v8',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Social Icons', 'educamb'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v8' ),
        ),
		array(
            'id'    => 'mheader_social_share_v8',
            'type'  => 'social_media',
            'title' => esc_html__( 'Mobile View Social Media', 'educamb' ),
            'required' => array( 'show_msocial_share_v8', '=', true ),
        ),
		/***********************************************************************
								Header Version 9 Start
		************************************************************************/
		array(
			'id'       => 'header_v9_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style College Settings', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v9' ),
		),
		
		//Header Top Info
		array(
            'id' => 'show_topbar_v9',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Topbar', 'educamb'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v9' ),
        ),	
		array(
			'id'      => 'social_title_v9',
			'type'    => 'text',
			'title'   => __( 'Social Title', 'educamb' ),
			'required' => array( 'show_topbar_v9', '=', true ),
		),
		array(
            'id'    => 'header_v9_social_share',
            'type'  => 'social_media',
            'title' => esc_html__( 'Social Media', 'educamb' ),
            'required' => array( 'show_topbar_v9', '=', true ),
        ),	
		array(
			'id'      => 'topbar_menu_v9',
			'type'    => 'textarea',
			'title'   => __( 'Topbar Menu', 'educamb' ),
			'required' => array( 'show_topbar_v9', '=', true ),
		),
		
		//Lower Header Info
		array(
			'id'      => 'icon_user_link_v9',
			'type'    => 'text',
			'title'   => __( 'User Icon Link', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v9' ),
		),
		//Search Form Switcher
		array(
            'id' => 'show_seach_form_v9',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Form', 'educamb'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v9' ),
        ),
		
		//Contact Info
		array(
			'id'      => 'address_v9',
			'type'    => 'textarea',
			'title'   => __( 'Address', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v9' ),
		),
		array(
			'id'      => 'phone_no_v9',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v9' ),
		),
		array(
			'id'      => 'email_address_v9',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v9' ),
		),
		
		//Button Info
		array(
			'id'      => 'btn_title_v9',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v9' ),
		),
		array(
			'id'      => 'btn_link_v9',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v9' ),
		),
		
		//Mobile Info
		array(
            'id' => 'show_msocial_share_v9',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Social Icons', 'educamb'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v9' ),
        ),
		array(
            'id'    => 'mheader_social_share_v9',
            'type'  => 'social_media',
            'title' => esc_html__( 'Mobile View Social Media', 'educamb' ),
            'required' => array( 'show_msocial_share_v9', '=', true ),
        ),
		/***********************************************************************
								Header Version 10 Start
		************************************************************************/
		array(
			'id'       => 'header_v10_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style High School Settings', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v10' ),
		),
		
		//Header Top Info
		array(
            'id' => 'show_topbar_v10',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Topbar', 'educamb'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v10' ),
        ),	
		array(
			'id'      => 'address_v10',
			'type'    => 'textarea',
			'title'   => __( 'Address', 'educamb' ),
			'required' => array( 'show_topbar_v10', '=', true ),
		),
		//Search Form Switcher
		array(
            'id' => 'show_seach_form_v10',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Form', 'educamb'),
            'default' => true,
            'required' => array( 'show_topbar_v10', '=', true ),
        ),
		
		//Lower Header Info
		
		//Button Info
		array(
			'id'      => 'btn_title_v10',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v10' ),
		),
		array(
			'id'      => 'btn_link_v10',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'educamb' ),
			'required' => array( 'header_style_settings', '=', 'header_v10' ),
		),
		
		//Mobile Info
		array(
            'id' => 'show_msocial_share_v10',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Social Icons', 'educamb'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v10' ),
        ),
		array(
            'id'    => 'mheader_social_share_v10',
            'type'  => 'social_media',
            'title' => esc_html__( 'Mobile View Social Media', 'educamb' ),
            'required' => array( 'show_msocial_share_v10', '=', true ),
        ),
		
		
		array(
			'id'       => 'header_style_section_end',
			'type'     => 'section',
			'indent'      => false,
			'required' => [ 'header_source_type', '=', 'd' ],
		),
	),
);
