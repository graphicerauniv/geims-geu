<?php
return array(
	'title'      => 'Educamb Testimonials Setting',
	'id'         => 'educamb_meta_testimonials',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'testimonials' ),
	'sections'   => array(
		array(
			'id'     => 'educamb_testimonials_meta_setting',
			'fields' => array(
				array(
					'id'    => 'author_name',
					'type'  => 'text',
					'title' => esc_html__( 'Author Name', 'educamb' ),
				),
				array(
					'id'    => 'author_designation',
					'type'  => 'text',
					'title' => esc_html__( 'Author Designation', 'educamb' ),
				),
				array(
					'id'    => 'testimonial_rating',
					'type'  => 'select',
					'title' => esc_html__( 'Choose the Client Rating', 'educamb' ),
					'options'  => array(
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
					),
				),				
				array(
					'id'    => 'testimonial_date',
					'type'  => 'text',
					'title' => esc_html__( 'Date', 'educamb' ),
				),
				array(
					'id'    => 'author_image',
					'type'  => 'media',
					'title' => esc_html__( 'Author Image', 'educamb' ),
				),
				array(
					'id'    => 'testi_social_profile',
					'type'  => 'social_media',
					'title' => esc_html__( 'Social Profiles', 'educamb' ),
				),
			),
		),
	),
);