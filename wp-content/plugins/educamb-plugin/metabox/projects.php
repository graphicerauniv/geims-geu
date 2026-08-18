<?php
return array(
	'title'      => 'Educamb Project Setting',
	'id'         => 'educamb_meta_projects',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'project' ),
	'sections'   => array(
		array(
			'id'     => 'educamb_projects_meta_setting',
			'fields' => array(
				array(
					'id'       => 'project_icon',
					'type'     => 'select',
					'title'    => esc_html__( 'Project Icons', 'educamb' ),
					'options'  => get_fontawesome_icons(),
				),
				array(
					'id'    => 'project_url',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Read More Link', 'educamb' ),
				),
				array(
					'id'    => 'project_dimension',
					'type'  => 'select',
					'title' => esc_html__( 'Choose the Extra height', 'educamb' ),
					'options'  => array(
						'normal_height_1' => esc_html__( 'Normal Height', 'educamb' ),
						'mixmum_height_1' => esc_html__( 'Extra Height', 'educamb' ),
						'normal_height_2' => esc_html__( 'Extra Height And Width', 'educamb' ),
					),
					'default'  => 'normal_height_1',
				),
			),
		),
	),
);