<?php
return array(
	'title'      => 'Educamb Service Setting',
	'id'         => 'educamb_meta_service',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'service' ),
	'sections'   => array(
		array(
			'id'     => 'educamb_service_meta_setting',
			'fields' => array(
				array(
					'id'       => 'service_icon',
					'type'     => 'select',
					'title'    => esc_html__( 'Service Icons', 'educamb' ),
					'options'  => get_fontawesome_icons(),
				),
				array(
					'id'    => 'service_url',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Read More Link', 'educamb' ),
				),
			),
		),
	),
);