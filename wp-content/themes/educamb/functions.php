<?php

require_once get_template_directory() . '/includes/loader.php';

add_action( 'after_setup_theme', 'educamb_setup_theme' );
add_action( 'after_setup_theme', 'educamb_load_default_hooks' );


function educamb_setup_theme() {

	load_theme_textdomain( 'educamb', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-lightbox' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'post', 'page-attributes' );
    add_theme_support( 'post-formats', array('video', 'quote') );
    
	// Set the default content width.
	$GLOBALS['content_width'] = 525;
	
	/*---------- Register image sizes ----------*/
	
	//Register image sizes
	add_image_size( 'educamb_370x240', 370, 240, true ); //educamb_370x240 Latest News V1 & V6
	add_image_size( 'educamb_70x70', 70, 70, true ); //educamb_70x70 Our Testimonials & V8 & V10
	add_image_size( 'educamb_100x100', 100, 100, true ); //educamb_100x100 Our Testimonials V7
	add_image_size( 'educamb_550x320', 550, 320, true ); //educamb_550x320 Our Research
	add_image_size( 'educamb_370x370', 370, 370, true ); //educamb_370x370 Our Gallery
	add_image_size( 'educamb_130x130', 130, 130, true ); //educamb_130x130 Our Testimonials V2
	add_image_size( 'educamb_140x140', 140, 140, true ); //educamb_140x140 Our Instructor Widget
	add_image_size( 'educamb_240x370', 240, 370, true ); //educamb_240x370 Our Instructors
	add_image_size( 'educamb_120x120', 120, 120, true ); //educamb_120x120 Our Instructors V2
	add_image_size( 'educamb_370x500', 370, 500, true ); //educamb_370x500 Our Instructors V6
	add_image_size( 'educamb_340x260', 340, 260, true ); //educamb_340x260 Latest News V2
	add_image_size( 'educamb_370x270', 370, 270, true ); //educamb_370x270 Latest News V4
	add_image_size( 'educamb_270x340', 270, 340, true ); //educamb_270x340 Latest News V5
	add_image_size( 'educamb_370x340', 370, 340, true ); //educamb_370x340 Our Gallery V2 & V3
	add_image_size( 'educamb_370x270', 370, 270, true ); //educamb_370x270 Our Gallery V2 & V3
	add_image_size( 'educamb_570x500', 570, 500, true ); //educamb_570x500 Our Gallery V6
	add_image_size( 'educamb_340x300', 340, 300, true ); //educamb_340x300 Our Events V3
	add_image_size( 'educamb_300x275', 300, 275, true ); //educamb_300x275 Latest News V7
	add_image_size( 'educamb_370x250', 370, 250, true ); //educamb_370x250 Our Services
	add_image_size( 'educamb_310x395', 310, 395, true ); //educamb_310x395 Our Services V2
	add_image_size( 'educamb_270x260', 270, 260, true ); //educamb_270x260 Courses V2
	add_image_size( 'educamb_270x270', 270, 270, true ); //educamb_270x270 Education Instructors
	add_image_size( 'educamb_330x270', 330, 270, true ); //educamb_330x270 Best Seller Courses
	add_image_size( 'educamb_340x270', 340, 270, true ); //educamb_340x270 Courses V5
	add_image_size( 'educamb_270x220', 270, 220, true ); //educamb_270x220 Courses V6
	add_image_size( 'educamb_370x220', 370, 220, true ); //educamb_370x220 Courses V7
	add_image_size( 'educamb_270x200', 270, 200, true ); //educamb_270x200 College Programs
	
	/*---------- Register image sizes ends ----------*/
	
	
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'left_menu' => esc_html__( 'University Page Left Menu', 'educamb' ),
		'right_menu' => esc_html__( 'University Page Right Menu', 'educamb' ),
		'main_menu1' => esc_html__( 'Kindergarten Page Menu', 'educamb' ),
		'main_menu2' => esc_html__( 'Academy Page Menu', 'educamb' ),
		'main_menu3' => esc_html__( 'Instructor Page Menu', 'educamb' ),
		'main_menu4' => esc_html__( 'Marketplace Page Menu', 'educamb' ),
		'main_menu5' => esc_html__( 'Single Course Page Menu', 'educamb' ),
		'main_menu6' => esc_html__( 'Cooking Course Page Menu', 'educamb' ),
		'main_menu7' => esc_html__( 'Quiz Learning Page Menu', 'educamb' ),
		'main_menu8' => esc_html__( 'College Page Menu', 'educamb' ),
		'main_menu9' => esc_html__( 'High School Page Menu', 'educamb' ),
		'footer_menu' => esc_html__( 'Footer Menu', 'educamb' ),
		'top_header_menu' => esc_html__( 'Header Quick Links', 'educamb' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'      => 250,
		'height'     => 250,
		'flex-width' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style();
	add_action( 'admin_init', 'educamb_admin_init', 2000000 );
}

/**
 * [educamb_admin_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */


function educamb_admin_init() {
	remove_action( 'admin_notices', array( 'ReduxFramework', '_admin_notices' ), 99 );
}

/*---------- Sidebar settings ----------*/

/**
 * [educamb_widgets_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
function educamb_widgets_init() {

	global $wp_registered_sidebars;

	$theme_options = get_theme_mod( 'educamb' . '_options-mods' );

	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'educamb' ),
		'id'            => 'default-sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'educamb' ),
		'before_widget' => '<div id="%1$s" class="widget sidebar-search-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="sidebar-title"><div class="dot-box"></div><h3>',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar(array(
		'name' => esc_html__('Footer Widget', 'educamb'),
		'id' => 'footer-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'educamb'),
		'before_widget'=>'<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12"><div id="%1$s" class="footer-widget single-footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="title"><div class="dotted"></div><h3>',
		'after_title' => '</h3></div>'
	));
	if ( class_exists( '\Elementor\Plugin' )){
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Two', 'educamb'),
		'id' => 'footer-sidebar2',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'educamb'),
		'before_widget'=>'<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12"><div id="%1$s" class="footer-widget single-footer-widget-style2 %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="title"><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Three', 'educamb'),
		'id' => 'footer-sidebar3',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'educamb'),
		'before_widget'=>'<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12"><div id="%1$s" class="footer-widget single-footer-widget-style3 %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="title"><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Four', 'educamb'),
		'id' => 'footer-sidebar4',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'educamb'),
		'before_widget'=>'<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12"><div id="%1$s" class="footer-widget single-footer-widget-style4 %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="title"><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Five', 'educamb'),
		'id' => 'footer-sidebar5',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'educamb'),
		'before_widget'=>'<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12"><div id="%1$s" class="footer-widget single-footer-widget-style5 %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="title"><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Seven', 'educamb'),
		'id' => 'footer-sidebar7',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'educamb'),
		'before_widget'=>'<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12"><div id="%1$s" class="footer-widget single-footer-widget-style7 %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="title"><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Eight', 'educamb'),
		'id' => 'footer-sidebar8',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'educamb'),
		'before_widget'=>'<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12"><div id="%1$s" class="footer-widget single-footer-widget-style8 %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="title"><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Nine', 'educamb'),
		'id' => 'footer-sidebar9',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'educamb'),
		'before_widget'=>'<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12"><div id="%1$s" class="footer-widget single-footer-widget-style9 %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="title"><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Ten', 'educamb'),
		'id' => 'footer-sidebar10',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'educamb'),
		'before_widget'=>'<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12"><div id="%1$s" class="footer-widget single-footer-widget-style10 %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="title"><div class="dotted"></div><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Services Widget', 'educamb'),
		'id' => 'service-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Services Area.', 'educamb'),
		'before_widget'=>'<div id="%1$s" class="service-widget sidebar-widget %2$s">',
		'after_widget'=>'</div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
	  'name' => esc_html__( 'Blog Listing', 'educamb' ),
	  'id' => 'blog-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'educamb' ),
	  'before_widget'=>'<div id="%1$s" class="widget sidebar-search-box %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="sidebar-title"><div class="dot-box"></div><h3>',
	  'after_title' => '</h3></div>'
	));
	}
	if ( ! is_object( educamb_WSH() ) ) {
		return;
	}

	$sidebars = educamb_set( $theme_options, 'custom_sidebar_name' );

	foreach ( array_filter( (array) $sidebars ) as $sidebar ) {

		if ( educamb_set( $sidebar, 'topcopy' ) ) {
			continue;
		}

		$name = $sidebar;
		if ( ! $name ) {
			continue;
		}
		$slug = str_replace( ' ', '_', $name );

		register_sidebar( array(
			'name'          => $name,
			'id'            => sanitize_title( $slug ),
			'before_widget' => '<div id="%1$s" class="%2$s widget single-sidebar-box">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="sidebar-title"><div class="dot-box"></div><h3>',
			'after_title'   => '</h3></div>',
		) );
	}

	update_option( 'wp_registered_sidebars', $wp_registered_sidebars );
}

add_action( 'widgets_init', 'educamb_widgets_init' );

/*---------- Sidebar settings ends ----------*/

/*---------- Gutenberg settings ----------*/

function educamb_gutenberg_editor_palette_styles() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'strong yellow', 'educamb' ),
            'slug' => 'strong-yellow',
            'color' => '#f7bd00',
        ),
        array(
            'name' => esc_html__( 'strong white', 'educamb' ),
            'slug' => 'strong-white',
            'color' => '#fff',
        ),
		array(
            'name' => esc_html__( 'light black', 'educamb' ),
            'slug' => 'light-black',
            'color' => '#242424',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'educamb' ),
            'slug' => 'very-light-gray',
            'color' => '#797979',
        ),
        array(
            'name' => esc_html__( 'very dark black', 'educamb' ),
            'slug' => 'very-dark-black',
            'color' => '#000000',
        ),
    ) );
	
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => esc_html__( 'Small', 'educamb' ),
			'size' => 10,
			'slug' => 'small'
		),
		array(
			'name' => esc_html__( 'Normal', 'educamb' ),
			'size' => 15,
			'slug' => 'normal'
		),
		array(
			'name' => esc_html__( 'Large', 'educamb' ),
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => esc_html__( 'Huge', 'educamb' ),
			'size' => 36,
			'slug' => 'huge'
		)
	) );
	
}
add_action( 'after_setup_theme', 'educamb_gutenberg_editor_palette_styles' );

/*---------- Gutenberg settings ends ----------*/

/*---------- Enqueue Styles and Scripts ----------*/

function educamb_enqueue_scripts() {
	$options = educamb_WSH()->option();
	$header_meta = get_post_meta( get_the_ID(), 'header_style_settings');
	$header_option = $options->get( 'header_style_settings' );
	$header = ( $header_meta ) ? $header_meta['0'] : $header_option;
	
    //styles
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css' );
	wp_enqueue_style( 'aos', get_template_directory_uri() . '/assets/css/aos.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
	wp_enqueue_style( 'custom-animate', get_template_directory_uri() . '/assets/css/custom-animate.css' );
	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/assets/css/fancybox.min.css' );
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/css/flaticon.css' );
	wp_enqueue_style( 'educamb-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );
	wp_enqueue_style( 'icomoon', get_template_directory_uri() . '/assets/css/icomoon.css' );
	wp_enqueue_style( 'imp', get_template_directory_uri() . '/assets/css/imp.css' );
	wp_enqueue_style( 'jquery.bootstrap-touchspin', get_template_directory_uri() . '/assets/css/jquery.bootstrap-touchspin.css' );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css' );
	wp_enqueue_style( 'nice-select', get_template_directory_uri() . '/assets/css/nice-select.css' );
	wp_enqueue_style( 'owl', get_template_directory_uri() . '/assets/css/owl.css' );
	wp_enqueue_style( 'educamb-rtl', get_template_directory_uri() . '/assets/css/rtl.css' );
	wp_enqueue_style( 'scrollbar', get_template_directory_uri() . '/assets/css/scrollbar.css' );
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/css/swiper.min.css' );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css' );
	wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/assets/css/jquery-ui.css' );
	wp_enqueue_style( 'vegas', get_template_directory_uri() . '/assets/css/vegas.min.css' );
	wp_enqueue_style( 'header-section', get_template_directory_uri() . '/assets/css/module-css/header-section.css' );
	wp_enqueue_style( 'banner-section', get_template_directory_uri() . '/assets/css/module-css/banner-section.css' );
	wp_enqueue_style( 'about-section', get_template_directory_uri() . '/assets/css/module-css/about-section.css' );
	wp_enqueue_style( 'blog-section', get_template_directory_uri() . '/assets/css/module-css/blog-section.css' );
	wp_enqueue_style( 'fact-counter-section', get_template_directory_uri() . '/assets/css/module-css/fact-counter-section.css' );
	wp_enqueue_style( 'faq-section', get_template_directory_uri() . '/assets/css/module-css/faq-section.css' );
	wp_enqueue_style( 'contact-page', get_template_directory_uri() . '/assets/css/module-css/contact-page.css' );
	wp_enqueue_style( 'breadcrumb-section', get_template_directory_uri() . '/assets/css/module-css/breadcrumb-section.css' );
	wp_enqueue_style( 'team-section', get_template_directory_uri() . '/assets/css/module-css/team-section.css' );
	wp_enqueue_style( 'partner-section', get_template_directory_uri() . '/assets/css/module-css/partner-section.css' );
	wp_enqueue_style( 'testimonial-section', get_template_directory_uri() . '/assets/css/module-css/testimonial-section.css' );
	wp_enqueue_style( 'services-section', get_template_directory_uri() . '/assets/css/module-css/services-section.css' );
	wp_enqueue_style( 'footer-section', get_template_directory_uri() . '/assets/css/module-css/footer-section.css' );
	wp_enqueue_style( 'educamb-main', get_stylesheet_uri() );
	wp_enqueue_style( 'educamb-main-style', get_template_directory_uri() . '/assets/css/style.css' );
	if( function_exists('is_woocommerce') ){
	wp_enqueue_style( 'educamb-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css' );
	}
	wp_enqueue_style( 'theme-color', get_template_directory_uri() . '/assets/css/color/theme-color.css' );
	if( $header == 'header_v2'){
	wp_enqueue_style( 'color-1', get_template_directory_uri() . '/assets/css/color-1.css' );
	}
	elseif( $header == 'header_v3'){
	wp_enqueue_style( 'color-2', get_template_directory_uri() . '/assets/css/color-2.css' );
	}
	elseif( $header == 'header_v4'){
	wp_enqueue_style( 'color-3', get_template_directory_uri() . '/assets/css/color-3.css' );
	}
	elseif( $header == 'header_v5'){
	wp_enqueue_style( 'color-4', get_template_directory_uri() . '/assets/css/color-4.css' );
	}
	elseif( $header == 'header_v6'){
	wp_enqueue_style( 'color-5', get_template_directory_uri() . '/assets/css/color-5.css' );
	}
	elseif( $header == 'header_v7'){
	wp_enqueue_style( 'color-6', get_template_directory_uri() . '/assets/css/color-6.css' );
	}
	elseif( $header == 'header_v8'){
	wp_enqueue_style( 'color-7', get_template_directory_uri() . '/assets/css/color-7.css' );
	}
	elseif( $header == 'header_v9'){
	wp_enqueue_style( 'color-8', get_template_directory_uri() . '/assets/css/color-8.css' );
	}
	elseif( $header == 'header_v10'){
	wp_enqueue_style( 'color-9', get_template_directory_uri() . '/assets/css/color-9.css' );
	}
	wp_enqueue_style( 'educamb-custom', get_template_directory_uri() . '/assets/css/custom.css' );
	wp_enqueue_style( 'educamb-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );	
	
    //scripts
	wp_enqueue_script( 'jquery-ui-core');
	wp_enqueue_script( 'aos', get_template_directory_uri().'/assets/js/aos.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'appear', get_template_directory_uri().'/assets/js/appear.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri().'/assets/js/bootstrap.bundle.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri().'/assets/js/isotope.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-bootstrap-touchspin', get_template_directory_uri().'/assets/js/jquery.bootstrap-touchspin.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-countTo', get_template_directory_uri().'/assets/js/jquery.countTo.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-easing', get_template_directory_uri().'/assets/js/jquery.easing.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-event-move', get_template_directory_uri().'/assets/js/jquery.event.move.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-fancybox', get_template_directory_uri().'/assets/js/jquery.fancybox.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-magnific-popup', get_template_directory_uri().'/assets/js/jquery.magnific-popup.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-nice-select', get_template_directory_uri().'/assets/js/jquery.nice-select.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-paroller', get_template_directory_uri().'/assets/js/jquery.paroller.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-sidebar-content', get_template_directory_uri().'/assets/js/jquery-sidebar-content.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'knob', get_template_directory_uri().'/assets/js/knob.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'owl', get_template_directory_uri().'/assets/js/owl.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'pagenav', get_template_directory_uri().'/assets/js/pagenav.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'scrollbar', get_template_directory_uri().'/assets/js/scrollbar.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'swiper', get_template_directory_uri().'/assets/js/swiper.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'tilt-jquery', get_template_directory_uri().'/assets/js/tilt.jquery.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'TweenMax', get_template_directory_uri().'/assets/js/TweenMax.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'wow', get_template_directory_uri().'/assets/js/wow.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-1color-switcher', get_template_directory_uri().'/assets/js/jquery-1color-switcher.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'parallax', get_template_directory_uri().'/assets/js/parallax.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'skrollr', get_template_directory_uri().'/assets/js/skrollr.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-ui', get_template_directory_uri().'/assets/js/jquery-ui.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'slick', get_template_directory_uri().'/assets/js/slick.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-circleType', get_template_directory_uri().'/assets/js/jquery.circleType.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'vegas', get_template_directory_uri().'/assets/js/vegas.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-lettering', get_template_directory_uri().'/assets/js/jquery.lettering.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-countdown', get_template_directory_uri().'/assets/js/jquery.countdown.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'educamb-main-custom', get_template_directory_uri().'/assets/js/custom.js', array(), false, true );
	if( is_singular() ) wp_enqueue_script('comment-reply');
}
add_action( 'wp_enqueue_scripts', 'educamb_enqueue_scripts' );

/*---------- Enqueue styles and scripts ends ----------*/

/*---------- Google fonts ----------*/

function educamb_fonts_url() {
	
	$fonts_url = '';
	
		$font_families['DM+Sans']       	  = 'DM Sans:wght@0,400,500,700&display=swap';									
		$font_families['Frank+Ruhl+Libre']    = 'Frank Ruhl Libre:wght@0,300,400,500,700,900&display=swap';
		$font_families['Averia+Serif+Libre']  = 'Averia Serif Libre:wght@0,300,400,700&display=swap';
		$font_families['Inter']  			  = 'Inter:wght@0,400,500,600,700,800,900&display=swap';
		
		$font_families = apply_filters( 'EDUCAMB/includes/classes/header_enqueue/font_families', $font_families );

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$protocol  = is_ssl() ? 'https' : 'http';
		$fonts_url = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css' );

		return esc_url_raw($fonts_url);

}

function educamb_theme_styles() {
    wp_enqueue_style( 'educamb-theme-fonts', educamb_fonts_url(), array(), null );
}

add_action( 'wp_enqueue_scripts', 'educamb_theme_styles' );
add_action( 'admin_enqueue_scripts', 'educamb_theme_styles' );

/*---------- Google fonts ends ----------*/

/*---------- More functions ----------*/

// 1) educamb_set function

/**
 * [educamb_set description]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
if ( ! function_exists( 'educamb_set' ) ) {
	function educamb_set( $var, $key, $def = '' ) {

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

// 2) educamb_add_editor_styles function

function educamb_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'educamb_add_editor_styles' );

// 3) Add specific CSS class by filter body class.

$options = educamb_WSH()->option(); 
if( educamb_set($options, 'boxed_wrapper') ){

add_filter( 'body_class', function( $classes ) {
    $classes[] = 'boxed_wrapper';
    return $classes;
} );
}

add_filter('doing_it_wrong_trigger_error', function () {return false;}, 10, 0);