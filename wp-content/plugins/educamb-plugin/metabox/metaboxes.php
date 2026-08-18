<?php
if ( ! function_exists( "educamb_add_metaboxes" ) ) {
	function educamb_add_metaboxes( $metaboxes ) {
		$directories_array = array(
			'page.php',
			'projects.php',
			'service.php',
			'instructors.php',
			'testimonials.php',
			'dimension.php',
			'events.php',
		);
		foreach ( $directories_array as $dir ) {
			$metaboxes[] = require_once( EDUCAMBPLUGIN_PLUGIN_PATH . '/metabox/' . $dir );
		}

		return $metaboxes;
	}

	add_action( "redux/metaboxes/educamb_options/boxes", "educamb_add_metaboxes" );
}

