<?php
/**
 * Available filters for extending Merlin WP.
 *
 * @package   Merlin WP
 * @version   @@pkg.version
 * @link      https://merlinwp.com/
 * @author    Rich Tabor, from ThemeBeans.com & the team at ProteusThemes.com
 * @copyright Copyright (c) 2018, Merlin WP of Inventionn LLC
 * @license   Licensed GPLv3 for Open Source Use
 */


/**
 * Add your widget area to unset the default widgets from.
 * If your theme's first widget area is "sidebar-1", you don't need this.
 *
 * @see https://stackoverflow.com/questions/11757461/how-to-populate-widgets-on-sidebar-on-theme-activation
 *
 * @param  array $widget_areas Arguments for the sidebars_widgets widget areas.
 *
 * @return array of arguments to update the sidebars_widgets option.
 */
function educamb_unset_default_widgets_args( $widget_areas ) {

	$widget_areas = array(
		'default-sidebar' => array(),
	);

	return $widget_areas;
}

add_filter( 'merlin_unset_default_widgets_args', 'educamb_unset_default_widgets_args' );

/**
 * Custom content for the generated child theme's functions.php file.
 *
 * @param string $output Generated content.
 * @param string $slug   Parent theme slug.
 */
function educamb_child_functions_php( $output, $slug ) {

	$slug_no_hyphens = strtolower( preg_replace( '#[^a-zA-Z]#', '', $slug ) );

	$output = "
		<?php
		/**
		 * Theme functions and definitions.
		 */
		function {$slug_no_hyphens}_child_enqueue_styles() {

		    if ( SCRIPT_DEBUG ) {
		        wp_enqueue_style( '{$slug}-style' , get_template_directory_uri() . '/style.css' );
		    } else {
		        wp_enqueue_style( '{$slug}-minified-style' , get_template_directory_uri() . '/style.css' );
		    }

		    wp_enqueue_style( '{$slug}-child-style',
		        get_stylesheet_directory_uri() . '/style.css',
		        array( '{$slug}-style' ),
		        wp_get_theme()->get('Version')
		    );
		}

		add_action(  'wp_enqueue_scripts', '{$slug_no_hyphens}_child_enqueue_styles' );\n
	";

	// Let's remove the tabs so that it displays nicely.
	$output = trim( preg_replace( '/\t+/', '', $output ) );

	// Filterable return.
	return $output;
}

add_filter( 'merlin_generate_child_functions_php', 'educamb_child_functions_php', 10, 2 );

/**
 * Define the demo import files (local files).
 * You have to use the same filter as in above example,
 * but with a slightly different array keys: local_*.
 * The values have to be absolute paths (not URLs) to your import files.
 * To use local import files, that reside in your theme folder,
 * please use the below code.
 * Note: make sure your import files are readable!
 */
function educamb_local_import_files() {
	return array(
		array(
			'import_file_name'         => esc_html__('Main Demo', 'educamb'),
			'local_import_widget_file' => trailingslashit( get_template_directory() ) . 'demo-import/content/widgets.json',
			//'import_rev_slider_file_url'      => trailingslashit( get_template_directory_uri() ) . 'demo-import/content/home.zip',
			'local_import_redux'       => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'demo-import/content/redux_options.json',
					'option_name' => 'educamb_options',
				),
			),
			'local_import_file'        => trailingslashit( get_template_directory() ) . 'demo-import/content/content.xml',
			'import_preview_image_url' => get_template_directory_uri() . '/screenshot.png',
			'import_notice'            => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'educamb' ),
			'preview_url'              => 'https://fastwpdemo.com/newwp/educamb/',
		),
	);
}

add_filter( 'merlin_import_files', 'educamb_local_import_files' );

/**
 * Execute custom code after the whole import has finished.
 */
function educamb_after_import_setup() {
	// Assign menus to their locations.
	$left_menu = get_term_by( 'name', 'University Page Left Menu', 'nav_menu' );
	$right_menu = get_term_by( 'name', 'University Page Right Menu', 'nav_menu' );
	$main_menu1 = get_term_by( 'name', 'Kindergarten Main Menu', 'nav_menu' );
	$main_menu2 = get_term_by( 'name', 'Academy Main Menu', 'nav_menu' );
	$main_menu3 = get_term_by( 'name', 'Instructor Main Menu', 'nav_menu' );
	$main_menu4 = get_term_by( 'name', 'Marketplace Main Menu', 'nav_menu' );
	$main_menu5 = get_term_by( 'name', 'Single Course Main Menu', 'nav_menu' );
	$main_menu6 = get_term_by( 'name', 'Cooking Course Main Menu', 'nav_menu' );
	$main_menu7 = get_term_by( 'name', 'Quiz Learning Main Menu', 'nav_menu' );
	$main_menu8 = get_term_by( 'name', 'College Main Menu', 'nav_menu' );
	$main_menu9 = get_term_by( 'name', 'High School Main Menu', 'nav_menu' );
	$footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
	$top_header_menu = get_term_by( 'name', 'Header Quick Links', 'nav_menu' );

	set_theme_mod(
		'nav_menu_locations', array(
			'left_menu' => $left_menu->term_id,
			'right_menu' => $right_menu->term_id,
			'main_menu1' => $main_menu1->term_id,
			'main_menu2' => $main_menu2->term_id,
			'main_menu3' => $main_menu3->term_id,
			'main_menu4' => $main_menu4->term_id,
			'main_menu5' => $main_menu5->term_id,
			'main_menu6' => $main_menu6->term_id,
			'main_menu7' => $main_menu7->term_id,
			'main_menu8' => $main_menu8->term_id,
			'main_menu9' => $main_menu9->term_id,
			'footer_menu' => $footer_menu->term_id,
			'top_header_menu' => $top_header_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'University' );
	$blog_page_id  = get_page_by_title( 'Blog Large View' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );
    
    $logo = get_page_by_title( 'logo', OBJECT, 'attachment' );

    if( $logo ) {
    	set_theme_mod( 'custom_logo', $logo->ID );
    }

   /*
    if( class_exists('RevSliderSliderImport') ) {
		foreach(array('home', 'home-1') as $slider) {
			$file = get_template_directory() . '/demo-import/content/'.$slider.'.zip';
			if( file_exists($file) ) {
				$importer = new RevSliderSliderImport();
				$response = $importer->import_slider( true, $file );
			}
		}
    }
	*/

	/*$header = get_page_by_title( 'header', OBJECT, 'elementor_library' );
	if( $header ) {
		$meta = get_post_meta($header->ID, '_elementor_data', true);
		if( $meta && $main_menu) {
			$meta = json_decode($meta, true);
			if(isset($meta[0]['elements'][0]['elements'][1]['elements'][1]['elements'])) {

				$meta[0]['elements'][0]['elements'][1]['elements'][1]['elements'][0]['settings']['wp']['nav_menu'] = $main_menu->term_id;
				update_post_meta( $header->ID, '_elementor_data', $meta );
			}
		}
	}*/
}

add_action( 'merlin_after_all_import', 'educamb_after_import_setup' );