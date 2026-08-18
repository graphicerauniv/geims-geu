<?php
return array(
	'title'      => 'Educamb Setting',
	'id'         => 'educamb_meta',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'page', 'post', 'tribe_events', 'instructors', 'project', 'product', 'service', 'courses' ),
	'sections'   => array(
		require_once EDUCAMBPLUGIN_PLUGIN_PATH . '/metabox/header.php',
		require_once EDUCAMBPLUGIN_PLUGIN_PATH . '/metabox/banner.php',
		require_once EDUCAMBPLUGIN_PLUGIN_PATH . '/metabox/sidebar.php',
		require_once EDUCAMBPLUGIN_PLUGIN_PATH . '/metabox/footer.php',
	),
);