<?php
return array(
	'title'      => 'Educamb Instructors Setting',
	'id'         => 'educamb_meta_instructors',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'instructors' ),
	'sections'   => array(
		array(
			'id'     => 'educamb_instructors_meta_setting',
			'fields' => array(
				array(
					'id'    => 'designation',
					'type'  => 'text',
					'title' => esc_html__( 'Designation', 'educamb' ),
				),
				array(
					'id'    => 'instructors_email',
					'type'  => 'text',
					'title' => esc_html__( 'Email Address', 'educamb' ),
				),
				array(
					'id'    => 'instructors_phone',
					'type'  => 'text',
					'title' => esc_html__( 'Phone Number', 'educamb' ),
				),
				array(
					'id'    => 'instructors_link',
					'type'  => 'text',
					'title' => esc_html__( 'Read More Link', 'educamb' ),
				),
				array(
					'id'    => 'bg_image',
					'type'  => 'media',
					'title' => esc_html__( 'Signature Image', 'educamb' ),
				),
				array(
					'id'    => 'social_profile',
					'type'  => 'social_media',
					'title' => esc_html__( 'Social Profiles', 'educamb' ),
				),
			),
		),
	),
);