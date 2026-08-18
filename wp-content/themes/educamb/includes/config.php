<?php
/**
 * Theme config file.
 *
 * @package EDUCAMB
 * @author  ThemeKalia
 * @version 1.0
 * changed
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

$config = array();

$config['default']['educamb_main_header'][] 	= array( 'educamb_main_header_area', 99 );

$config['default']['educamb_main_footer'][] 	= array( 'educamb_main_footer_area', 99 );

$config['default']['educamb_sidebar'][] 	    = array( 'educamb_sidebar', 99 );

$config['default']['educamb_banner'][] 	    = array( 'educamb_banner', 99 );


return $config;
