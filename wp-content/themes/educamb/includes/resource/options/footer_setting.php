<?php

return array(
	'title'      => esc_html__( 'Footer Setting', 'educamb' ),
	'id'         => 'footer_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'footer_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Footer Source Type', 'educamb' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'educamb' ),
				'e' => esc_html__( 'Elementor', 'educamb' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'footer_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'educamb' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'footer_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'footer_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Settings', 'educamb' ),
			'required' => array( 'footer_source_type', '=', 'd' ),
		),
		array(
		    'id'       => 'footer_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Footer Styles', 'educamb' ),
		    'subtitle' => esc_html__( 'Choose Footer Styles', 'educamb' ),
		    'options'  => array(

			    'footer_v1'  => array(
				    'alt' => esc_html__( 'Footer Style University', 'educamb' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v1.png',
			    ),
				'footer_v2'  => array(
				    'alt' => esc_html__( 'Footer Style Kindergarten', 'educamb' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v2.png',
			    ),
				'footer_v3'  => array(
				    'alt' => esc_html__( 'Footer Style Academy', 'educamb' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v3.png',
			    ),
				'footer_v4'  => array(
				    'alt' => esc_html__( 'Footer Style Instructor', 'educamb' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v4.png',
			    ),
				'footer_v5'  => array(
				    'alt' => esc_html__( 'Footer Style Marketplace', 'educamb' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v5.png',
			    ),
				'footer_v6'  => array(
				    'alt' => esc_html__( 'Footer Style Single Course', 'educamb' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v6.png',
			    ),
				'footer_v7'  => array(
				    'alt' => esc_html__( 'Footer Style Cooking Course', 'educamb' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v7.png',
			    ),
				'footer_v8'  => array(
				    'alt' => esc_html__( 'Footer Style Quiz Learning', 'educamb' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v8.png',
			    ),
				'footer_v9'  => array(
				    'alt' => esc_html__( 'Footer Style College', 'educamb' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v9.png',
			    ),
				'footer_v10'  => array(
				    'alt' => esc_html__( 'Footer Style High School', 'educamb' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v10.png',
			    ),
			),
			'required' => array( 'footer_source_type', '=', 'd' ),
			'default' => 'footer_v1',
	    ),
		
		
		/***********************************************************************
								Footer Version 1 Start
		************************************************************************/
		array(
			'id'       => 'footer_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style University Settings', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		
		//Footer V1 Copy Rights
		array(
			'id'      => 'footer_v1_copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		
		// Footer V1 Logo
		array(
			'id'       => 'footer_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Logo', 'educamb' ),
			'subtitle' => esc_html__( 'Insert footer logo image', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		
		//Footer V1 Menu 
		array(
			'id'      => 'footer_v1_menu',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu HTML', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		/***********************************************************************
								Footer Version 2 Start
		************************************************************************/
		array(
			'id'       => 'footer_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Kindergarten Settings', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		
		//Footer V2 Copy Rights
		array(
			'id'      => 'footer_v2_copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		
		//Footer V2 Menu 
		array(
			'id'      => 'footer_v2_menu',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu HTML', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		/***********************************************************************
								Footer Version 3 Start
		************************************************************************/
		array(
			'id'       => 'footer_v3_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Academy Settings', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		
		//Footer V3 Newsletter Form
		array(
			'id'      => 'footer_v3_newsletter_title',
			'type'    => 'text',
			'title'   => __( 'Newsletter Title', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		array(
			'id'      => 'newsletter_form_url',
			'type'    => 'text',
			'title'   => __( 'Newsletter Url', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		
		//Footer V3 Copy Rights
		array(
			'id'      => 'footer_v3_copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		
		// Footer V3 Social Media
		array(
            'id'    => 'footer_social_share_v3',
            'type'  => 'social_media',
            'title' => esc_html__( 'Social Media', 'educamb' ),
            'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
        ),
		
		//Footer V3 Menu 
		array(
			'id'      => 'footer_v3_menu',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu HTML', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		/***********************************************************************
								Footer Version 4 Start
		************************************************************************/
		array(
			'id'       => 'footer_v4_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Instructor Settings', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		
		//Footer V4 Copy Rights
		array(
			'id'      => 'footer_v4_copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		
		//Footer V4 Menu 
		array(
			'id'      => 'footer_v4_menu',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu HTML', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		/***********************************************************************
								Footer Version 5 Start
		************************************************************************/
		array(
			'id'       => 'footer_v5_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Marketplace Settings', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v5' ),
		),
		
		//Footer V5 Copy Rights
		array(
			'id'      => 'footer_v5_copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v5' ),
		),
		
		//Footer V5 Menu 
		array(
			'id'      => 'footer_v5_menu',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu HTML', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v5' ),
		),
		/***********************************************************************
								Footer Version 6 Start
		************************************************************************/
		array(
			'id'       => 'footer_v6_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Single Course Settings', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),

		// Footer V6 Logo
		array(
			'id'       => 'footer_logo6',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Logo', 'educamb' ),
			'subtitle' => esc_html__( 'Insert footer logo image', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		
		//Footer Phone Number Info 
		array(
			'id'      => 'footer_v6_phone_title',
			'type'    => 'text',
			'title'   => __( 'Phone Title', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		array(
			'id'      => 'footer_v6_phone_text',
			'type'    => 'text',
			'title'   => __( 'Phone Description', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		array(
			'id'      => 'footer_v6_phone_no',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		
		//Footer Email Address Info 
		array(
			'id'      => 'footer_v6_email_title',
			'type'    => 'text',
			'title'   => __( 'Email Title', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		array(
			'id'      => 'footer_v6_email_text',
			'type'    => 'text',
			'title'   => __( 'Email Description', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		array(
			'id'      => 'footer_v6_email',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		
		//Footer FAQ's Info 
		array(
			'id'      => 'footer_v6_faq_title',
			'type'    => 'text',
			'title'   => __( 'Faq Title', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		array(
			'id'      => 'footer_v6_faq_text',
			'type'    => 'text',
			'title'   => __( 'Faq Description', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		array(
			'id'      => 'footer_v6_faq_text2',
			'type'    => 'text',
			'title'   => __( 'Faq Description', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		
		//Footer V6 Copy Rights
		array(
			'id'      => 'footer_v6_copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		
		//Footer V6 Menu 
		array(
			'id'      => 'footer_v6_menu',
			'type'    => 'textarea',
			'title'   => __( 'Bottom Footer Menu HTML', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		/***********************************************************************
								Footer Version 7 Start
		************************************************************************/
		array(
			'id'       => 'footer_v7_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Cooking Course Settings', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v7' ),
		),
		
		//Footer V7 Copy Rights
		array(
			'id'      => 'footer_v7_copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v7' ),
		),
		
		// Footer V7 Logo
		array(
			'id'       => 'footer_logo7',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Logo', 'educamb' ),
			'subtitle' => esc_html__( 'Insert footer logo image', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v7' ),
		),
		
		//Footer V7 Menu 
		array(
			'id'      => 'footer_v7_menu',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu HTML', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v7' ),
		),
		/***********************************************************************
								Footer Version 8 Start
		************************************************************************/
		array(
			'id'       => 'footer_v8_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Quiz Learning Settings', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v8' ),
		),
		
		//Footer V8 Copy Rights
		array(
			'id'      => 'footer_v8_copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v8' ),
		),
		
		//Footer V8 Menu 
		array(
			'id'      => 'footer_v8_menu',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu HTML', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v8' ),
		),
		/***********************************************************************
								Footer Version 9 Start
		************************************************************************/
		array(
			'id'       => 'footer_v9_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style College Settings', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v9' ),
		),
		
		// Footer V9 Logo
		array(
			'id'       => 'footer_logo9',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Logo', 'educamb' ),
			'subtitle' => esc_html__( 'Insert footer logo image', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v9' ),
		),
		
		//Footer V9 Content
		array(
			'id'      => 'footer_v9_content',
			'type'    => 'textarea',
			'title'   => __( 'Top Text', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v9' ),
		),
		
		// Footer V9 Social Media
		array(
            'id'    => 'footer_social_share_v9',
            'type'  => 'social_media',
            'title' => esc_html__( 'Social Media', 'educamb' ),
            'required' => array( 'footer_style_settings', '=', 'footer_v9' ),
        ),
		
		//Footer V9 Copy Rights
		array(
			'id'      => 'footer_v9_copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v9' ),
		),
		
		//Footer V9 Menu 
		array(
			'id'      => 'footer_v9_menu',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu HTML', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v9' ),
		),
		/***********************************************************************
								Footer Version 10 Start
		************************************************************************/
		array(
			'id'       => 'footer_v10_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style High School Settings', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v10' ),
		),
		
		//Footer V10 Copy Rights
		array(
			'id'      => 'footer_v10_copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v10' ),
		),
		
		//Footer V10 Menu 
		array(
			'id'      => 'footer_v10_menu',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu HTML', 'educamb' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v10' ),
		),
		
		
		array(
			'id'       => 'footer_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'footer_source_type', '=', 'd' ],
		),
	),
);
