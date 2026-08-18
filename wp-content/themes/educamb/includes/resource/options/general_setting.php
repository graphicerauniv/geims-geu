<?php
$styles = [];
foreach(range(1, 28) as $val) {
    $styles[$val] = sprintf(esc_html__('Style %s', 'educamb'), $val);
}

return  array(
    'title'      => esc_html__( 'General Setting', 'educamb' ),
    'id'         => 'general_setting',
    'desc'       => '',
    'icon'       => 'el el-wrench',
    'fields'     => array(
        array(
            'id' => 'theme_preloader',
            'type' => 'switch',
            'title' => esc_html__('Enable Preloader', 'educamb'),
            'default' => false,
        ),
		array(
			'id'      => 'preloader_text',
			'type'    => 'textarea',
			'title'   => __( 'Preloader Text', 'educamb' ),
			'desc'    => esc_html__( 'Enter the Preloader Text', 'educamb' ),
			'default' => 'Educamb',
		),
    ),
);
