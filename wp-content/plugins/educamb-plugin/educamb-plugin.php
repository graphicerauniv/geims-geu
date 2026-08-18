<?php
/**
 * Plugin Name: Educamb Plugin
 * Plugin URI: http://themeforest.net/user/template-path/
 * Description: Supported plugin for Educamb WordPress theme
 * Author: Template Path
 * Version: 1.0
 * Author URI: https://themeforest.net/user/template-path/
 *
 * @package educamb-plugin
 */

defined( 'EDUCAMBPLUGIN_PLUGIN_PATH' ) || define( 'EDUCAMBPLUGIN_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'EDUCAMB_PLUGIN_URI', plugins_url( 'educamb-plugin' ) . '/' );
require_once plugin_dir_path( __FILE__ ) . 'file_crop.php';
function educamb_bunch_widget_init2()
{
	//footer Widget One
	if( class_exists( 'Educamb_About_Company' ) )register_widget( 'Educamb_About_Company' );
	if( class_exists( 'Educamb_Get_In_Touch' ) )register_widget( 'Educamb_Get_In_Touch' );
		
	//footer Widget Two
	if( class_exists( 'Educamb_About_Company_V2' ) )register_widget( 'Educamb_About_Company_V2' );
	if( class_exists( 'Educamb_Subscribe_Us' ) )register_widget( 'Educamb_Subscribe_Us' );
	
	//footer Widget Three
	if( class_exists( 'Educamb_Google_Play' ) )register_widget( 'Educamb_Google_Play' );
	
	//footer Widget Four
	if( class_exists( 'Educamb_About_Company_v3' ) )register_widget( 'Educamb_About_Company_v3' );
	
	//footer Widget Five
	if( class_exists( 'Educamb_New_Offer' ) )register_widget( 'Educamb_New_Offer' );
	if( class_exists( 'Educamb_Popular_Posts' ) )register_widget( 'Educamb_Popular_Posts' );
	
	//footer Widget Seven
	if( class_exists( 'Educamb_Get_In_Touch_V2' ) )register_widget( 'Educamb_Get_In_Touch_V2' );
	if( class_exists( 'Educamb_Our_Gallery' ) )register_widget( 'Educamb_Our_Gallery' );
	
	//footer Widget Eight
	if( class_exists( 'Educamb_About_Company_v4' ) )register_widget( 'Educamb_About_Company_v4' );
	if( class_exists( 'Educamb_Newsletter_Form' ) )register_widget( 'Educamb_Newsletter_Form' );
	
	//footer Widget Nine
	if( class_exists( 'Educamb_About_Company_V5' ) )register_widget( 'Educamb_About_Company_V5' );
	if( class_exists( 'Educamb_Popular_Posts_V2' ) )register_widget( 'Educamb_Popular_Posts_V2' );
	
	//footer Widget Ten
	if( class_exists( 'Educamb_About_Company_V6' ) )register_widget( 'Educamb_About_Company_V6' );
	if( class_exists( 'Educamb_Consult_With_Us' ) )register_widget( 'Educamb_Consult_With_Us' );
	
	//Blog Sidebar Widget
	if( class_exists( 'Educamb_Recent_Posts' ) )register_widget( 'Educamb_Recent_Posts' );
	if( class_exists( 'Educamb_Our_Team' ) )register_widget( 'Educamb_Our_Team' );
	if( class_exists( 'Educamb_Subscribe_Us_V2' ) )register_widget( 'Educamb_Subscribe_Us_V2' );
	
}
add_action( 'widgets_init', 'educamb_bunch_widget_init2' );	

class EDUCAMBPLUGIN_Plugin_Core {

	/**
	 * The instance variable.
	 *
	 * @var [type]
	 */
	public static $instance;

	/**
	 * The main constructor
	 */
	function __construct() {
		self::includes();
		$this->init();

	}

	/**
	 * Load the instance.
	 *
	 * @return [type] [description]
	 */
	public static function instance() {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public static function includes() {
		require_once EDUCAMBPLUGIN_PLUGIN_PATH . '/inc/helpers/functions.php';
		require_once EDUCAMBPLUGIN_PLUGIN_PATH . '/elementor/elementor.php';
		require_once EDUCAMBPLUGIN_PLUGIN_PATH . '/inc/abstracts/class-post-type-abstract.php';
		require_once EDUCAMBPLUGIN_PLUGIN_PATH . '/inc/abstracts/class-taxonomy-abstract.php';
		require_once EDUCAMBPLUGIN_PLUGIN_PATH . '/inc/helpers/widgets.php';
		require_once EDUCAMBPLUGIN_PLUGIN_PATH . '/inc/post_types/project.php';
		require_once EDUCAMBPLUGIN_PLUGIN_PATH . '/inc/post_types/instructors.php';
		require_once EDUCAMBPLUGIN_PLUGIN_PATH . '/inc/post_types/testimonials.php';
		require_once EDUCAMBPLUGIN_PLUGIN_PATH . '/inc/post_types/services.php';
		require_once EDUCAMBPLUGIN_PLUGIN_PATH . '/inc/post_types/faqs.php';
		require_once EDUCAMBPLUGIN_PLUGIN_PATH . '/inc/taxonomies.php';
		if ( ! class_exists( 'Redux' ) ) {
			require_once EDUCAMBPLUGIN_PLUGIN_PATH . 'redux-framework/redux-framework.php';
			require_once EDUCAMBPLUGIN_PLUGIN_PATH . '/metabox/metaboxes.php';
		}

	}

	function init() {
		EDUCAMBPLUGIN\Inc\Post_Types\Project::init();
		EDUCAMBPLUGIN\Inc\Post_Types\Instructors::init();
		EDUCAMBPLUGIN\Inc\Post_Types\Testimonials::init();
		EDUCAMBPLUGIN\Inc\Post_Types\Services::init();
		EDUCAMBPLUGIN\Inc\Post_Types\Faqs::init();
		add_action( 'init', array( '\EDUCAMBPLUGIN\Inc\Taxonomies', 'init' ) );
	}
}

/**
 * [educamb_get_sidebars description]
 *
 * @param  boolean $multi [description].
 *
 * @return [type]         [description]
 */
function educambs_get_sidebars( $multi = false ) {
	global $wp_registered_sidebars;

	$sidebars = ! ( $wp_registered_sidebars ) ? get_option( 'wp_registered_sidebars' ) : $wp_registered_sidebars;

	if ( $multi ) {
		$data[] = array( 'value' => '', 'label' => 'No Sidebar' );
	} else {
		$data = array( '' => esc_html__( 'No Sidebar', 'hlc' ) );
	}

	foreach ( ( array ) $sidebars as $sidebar ) {

		if ( $multi ) {

			$data[] = array( 'value' => educamb_set( $sidebar, 'id' ), 'label' => educamb_set( $sidebar, 'name' ) );
		} else {

			$data[ educamb_set( $sidebar, 'id' ) ] = educamb_set( $sidebar, 'name' );
		}
	}

	return $data;
}

/**
 * [educamb_social_profiler description]
 *
 * @param  [type] $obj [description]
 *
 * @return [type]      [description]
 */
function educamb_social_profiler() {
	return array(
		'adn'                 => 'fa-adn',
		'android'             => 'fa-android',
		'apple'               => 'fa-apple',
		'behance'             => 'fa-behance',
		'behance_square'      => 'fa-behance-square',
		'bitbucket'           => 'fa-bitbucket',
		'bitcoin'             => 'fa-btc',
		'css3'                => 'fa-css3',
		'delicious'           => 'fa-delicious',
		'deviantart'          => 'fa-deviantart',
		'dribbble'            => 'fa-dribbble',
		'dropbox'             => 'fa-dropbox',
		'drupal'              => 'fa-drupal',
		'empire'              => 'fa-empire',
		'facebook'            => 'fa-facebook',
		'four_square'         => 'fa-foursquare',
		'git_square'          => 'fa-git-square',
		'github'              => 'fa-github',
		'github_alt'          => 'fa-github',
		'github_square'       => 'fa-github-square',
		'git_tip'             => 'fa-gittip',
		'google'              => 'fa-google',
		'google_plus'         => 'fa-google-plus',
		'google_plus_square'  => 'fa-google-plus-square',
		'hacker_news'         => 'fa-hacker-news',
		'html5'               => 'fa-html5',
		'instagram'           => 'fa-instagram',
		'joomla'              => 'fa-joomla',
		'js_fiddle'           => 'fa-jsfiddle',
		'linkedIn'            => 'fa-linkedin',
		'linkedIn_square'     => 'fa-linkedin-square',
		'linux'               => 'fa-linux',
		'MaxCDN'              => 'fa-maxcdn',
		'OpenID'              => 'fa-openid',
		'page_lines'          => 'fa-pagelines',
		'pied_piper'          => 'fa-pied-piper',
		'pinterest'           => 'fa-pinterest',
		'pinterest_square'    => 'fa-pinterest-square',
		'QQ'                  => 'fa-qq',
		'rebel'               => 'fa-rebel',
		'reddit'              => 'fa-reddit',
		'reddit_square'       => 'fa-reddit-square',
		'ren-ren'             => 'fa-renren',
		'share_alt'           => 'fa-share-alt',
		'share_square'        => 'fa-share-alt-square',
		'skype'               => 'fa-skype',
		'slack'               => 'fa-slack',
		'sound_cloud'         => 'fa-soundcloud',
		'spotify'             => 'fa-spotify',
		'stack_exchange'      => 'fa-stack-exchange',
		'stack_overflow'      => 'fa-stack-overflow',
		'steam'               => 'fa-steam',
		'steam_square'        => 'fa-steam-square',
		'stumble_upon'        => 'fa-stumbleupon',
		'stumble_upon_circle' => 'fa-stumbleupon-circle',
		'tencent_weibo'       => 'fa-tencent-weibo',
		'trello'              => 'fa-trello',
		'tumblr'              => 'fa-tumblr',
		'tumblr_square'       => 'fa-tumblr-square',
		'twitter'             => 'fa-twitter',
		'twitter_square'      => 'fa-twitter-square',
		'vimeo_square'        => 'fa-vimeo-square',
		'vine'                => 'fa-vine',
		'vK'                  => 'fa-vk',
		'weibo'               => 'fa-weibo',
		'weixin'              => 'fa-weixin',
		'windows'             => 'fa-windows',
		'wordPress'           => 'fa-wordpress',
		'xing'                => 'fa-xing',
		'xing_square'         => 'fa-xing-square',
		'yahoo'               => 'fa-yahoo',
		'yelp'                => 'fa-yelp',
		'youTube'             => 'fa-youtube',
		'youTube_play'        => 'fa-youtube-play',
		'youTube_square'      => 'fa-youtube-square',
	);
}

function EDUCAMBPLUGIN_P() {

	if ( ! isset( $GLOBALS['EDUCAMBPLUGIN_Plugin_p'] ) ) {
		$GLOBALS['EDUCAMBPLUGIN_Plugin'] = EDUCAMBPLUGIN_Plugin_Core::instance();
	}

	return $GLOBALS['EDUCAMBPLUGIN_Plugin'];
}

EDUCAMBPLUGIN_P();
if ( ! function_exists( 'educamb_set' ) ) {

	function educamb_set( $var, $key, $def = '' ) {
		/*if (!$var)
		return false;*/

		if ( is_object( $var ) && isset( $var->$key ) ) {
			return $var->$key;
		} elseif ( is_array( $var ) && isset( $var[ $key ] ) ) {
			return $var[ $key ];
		} elseif ( $def ) {
			return $def;
		} else {
			return false;
		}
	}

}

function educamb_fontawesome_icons() {


	$pattern = '/\.(fa-(?:\w+(?:-)?)+):before\s*{\s*content/';

	$subject = wp_remote_get( get_template_directory_uri() . '/assets/css/font-awesome.min.css' );

	preg_match_all( $pattern, educamb_set( $subject, 'body' ), $matches, PREG_SET_ORDER );
	$icons = array();
	foreach ( $matches as $match ) {
		$new_val            = ucwords( str_replace( 'fa-', '', $match[1] ) );
		$icons[ $match[1] ] = ucwords( str_replace( '-', ' ', $new_val ) );
	}

	return $icons;


}


function educamb_encrypt( $param ) {
	return base64_encode( $param );
}


function educamb_decrypt( $param ) {
	return base64_decode( $param );
}

function educamb_taxonomy_regster($name, $post_type, $args) {
	// Register the taxonomy now so that the import works!
	register_taxonomy(
		$data['taxonomy'],
		apply_filters( 'woocommerce_taxonomy_objects_' . $data['taxonomy'], array( 'product' ) ),
		apply_filters( 'woocommerce_taxonomy_args_' . $data['taxonomy'], array(
			'hierarchical' => true,
			'show_ui'      => false,
			'query_var'    => true,
			'rewrite'      => false,
		) )
	);
}


add_filter('templatepath_elemnetor/modules/list', function($modules){
	$list = array('gallery', 'instagram', 'instructors', 'dynamic-pots', 'responsive-header', 'progress-bar', 'form', 'nav-menu', 'misc', 'audio', 'flickr', 'tabs-slider', 'testimonial');

	$modules = array_merge($modules, $list);

	return array_filter($modules);
});
