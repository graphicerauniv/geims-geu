<?php
	return array(
		'title'      => 'educamb Event Setting',
		'id'         => 'educamb_meta_event',
		'icon'       => 'el el-cogs',
		'position'   => 'normal',
		'priority'   => 'core',
		'post_types' => array( 'tribe_events' ),
		'sections'   => array(
			array(
				'fields' => array(
					array(
						'id'    => 'event_price',
						'type'  => 'text',
						'title' => esc_html__('Enter Event Price', 'educamb'),
					),
				),
			),
		),
	);


?>