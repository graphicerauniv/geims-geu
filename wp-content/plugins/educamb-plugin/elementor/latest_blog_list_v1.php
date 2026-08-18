<?php

namespace EDUCAMBPLUGIN\Element;

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Latest_Blog_List_V1 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'educamb_latest_blog_list_v1';
	}

	/**
	 * Get widget title.
	 * Retrieve button widget title.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Latest Blog List V1', 'educamb' );
	}

	/**
	 * Get widget icon.
	 * Retrieve button widget icon.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-library-open';
	}

	/**
	 * Get widget categories.
	 * Retrieve the list of categories the button widget belongs to.
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since  2.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'educamb' ];
	}
	
	/**
	 * Register button widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'latest_blog_list_v1',
			[
				'label' => esc_html__( 'Latest Blog List V1', 'educamb' ),
			]
		);
		$this->add_control(
			'sidebar_slug',
			[
				'label'   => esc_html__( 'Choose Sidebar', 'educamb' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'Choose Sidebar',
				'options'  => educamb_get_sidebars(),
			]
		);
		$this->add_control(
			'style_two',
			 [
				'label'   => esc_html__( 'Choose Different Style', 'educamb' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
					'one' => esc_html__( 'Choose Style List View', 'educamb' ),
					'two' => esc_html__( 'Choose Style List View Kindergarten', 'educamb' ),
					'three' => esc_html__( 'Choose Style List View Photography', 'educamb' ),
					'four' => esc_html__( 'Choose Style List View Cooking', 'educamb' ),
					'five' => esc_html__( 'Choose Style MarketPlace View', 'educamb' ),
				),
			 ]
		);
		$this->add_control(
			'show_pattern_image',
			[
				'label'    => __( 'Enable/Disable Pattern Image Marketplace', 'educamb' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'educamb' ),
				'label_off' => __( 'Hide', 'educamb' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'educamb' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'educamb' ),
			]
		);
		$this->add_control(
			'btn_title',
			[
				'label'       => __( 'Button Title', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'educamb' ),
			]
		);
		$this->add_control(
			'btn_link',
			[
				  'label' => __( 'Button Url', 'educamb' ),
				  'type' => Controls_Manager::URL,
				  'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				  'show_external' => true,
				  'default' => [
				    'url' => '',
				    'is_external' => true,
				    'nofollow' => true,
				  ],
			 ]
		);
		$this->add_control(
			'text_limit',
			[
				'label'   => esc_html__( 'Text Limit', 'educamb' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 12,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_number',
			[
				'label'   => esc_html__( 'Number of post', 'educamb' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 4,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_orderby',
			[
				'label'   => esc_html__( 'Order By', 'educamb' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'       => esc_html__( 'Date', 'educamb' ),
					'title'      => esc_html__( 'Title', 'educamb' ),
					'menu_order' => esc_html__( 'Menu Order', 'educamb' ),
					'rand'       => esc_html__( 'Random', 'educamb' ),
				),
			]
		);
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'educamb' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESC' => esc_html__( 'DESC', 'educamb' ),
					'ASC'  => esc_html__( 'ASC', 'educamb' ),
				),
			]
		);
		$this->add_control(
            'query_category', 
			[
			  'type' => Controls_Manager::SELECT,
			  'label' => esc_html__('Category', 'educamb'),
			  'label_block' => true,
			  'options' => get_blog_categories()
			]
		);
		$this->add_control(
			'show_pagination',
			[
				'label'       => __( 'Enable/Disable Pagination Style', 'educamb' ),
						'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'educamb' ),
				'label_off' => __( 'Hide', 'educamb' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);		
		$this->end_controls_section();
	}

	/**
	 * Render button widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
		
        $paged = get_query_var('paged');
		$paged = educamb_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;

		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-educamb' );
		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => educamb_set( $settings, 'query_number' ),
			'orderby'        => educamb_set( $settings, 'query_orderby' ),
			'order'          => educamb_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( educamb_set( $settings, 'query_category' ) ) $args['category_name'] = educamb_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ 
	?>
	
    <!--Start Blog Page Two -->
    <section class="<?php if($settings['style_two'] == 'five') echo 'blog-page-two bg-colors'; elseif($settings['style_two'] == 'four') echo 'blog-page-two cooking-blog-page-three'; elseif($settings['style_two'] == 'three') echo 'blog-page-two photography-blog-page-two'; elseif($settings['style_two'] == 'two') echo 'blog-page-two kindergarten-blog-page-two'; else echo 'blog-page-two'; ?>">
    	<?php if($settings['show_pattern_image']) { ?><div class="thm-pattern-style5" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/pattern/thm-pattern-2.png);"></div><?php } ?>
        <div class="container">
            <div class="row">

                <div class="<?php if ( is_active_sidebar( $settings['sidebar_slug'] ) ) echo 'col-xl-9 '; else echo 'col-xl-12 col-lg-12'; ?>">
                    <div class="blog-page-two__content">
                        <div class="row">
                            <div class="col-xl-12">
								<?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                <!--Start Single Blog Style2-->
                                <div class="single-blog-style2">
                                    <div class="single-blog-style2__img-holder">
                                        <div class="inner">
                                            <?php the_post_thumbnail('educamb_300x275'); ?>
                                        </div>
                                    </div>
                                    <div class="single-blog-style2__text-holder">
                                        <div class="top">
                                            <div class="category-box">
                                                <div class="dot-box"></div>
                                                <p><?php the_category(' '); ?></p>
                                            </div>
                                            <div class="share-btn">
                                                <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><span class="icon-share-1"></span><?php esc_html_e('Share', 'educamb'); ?></a>
                                            </div>
                                        </div>
                                        <h3 class="blog-title">
                                            <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a>
                                        </h3>
                                        <div class="text">
                                            <?php echo wp_kses(wp_trim_words(get_the_content(), $settings['text_limit']), true); ?>
                                        </div>
                                        <div class="bottom-box">
                                            <div class="btn-box">
                                                <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>">
                                                    <span class="icon-right-arrow-1"></span><?php esc_html_e('Read More', 'educamb'); ?>
                                                </a>
                                            </div>
                                            <div class="meta-info">
                                                <ul>
                                                    <li>
                                                        <span class="icon-user"></span>
                                                        <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><?php the_author(); ?></a>
                                                    </li>
                                                    <li>
                                                        <span class="icon-calendar"></span>
                                                        <a href="<?php echo get_month_link(get_the_date('Y'), get_the_date('m')); ?>"><?php echo get_the_date( ); ?></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Single Blog Style2-->
                                <?php endwhile; ?>
                            </div>
                        </div>
						
						<?php if($settings['show_pagination']) { ?>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="styled-pagination clearfix">
									<?php educamb_the_pagination2(array('total'=>$query->max_num_pages, 'next_text' => '<span class="icon-right-arrow-1 right"></span>', 'prev_text' => '<span class="icon-right-arrow-1 left"></span>')); ?>
                                </div>
                            </div>
                        </div>
						<?php } ?>
                        
                    </div>
                </div>
				
				<?php if ( is_active_sidebar( $settings['sidebar_slug'] ) ) : ?>
                <!--Start Thm Sidebar Box-->
                <div class="col-xl-3 col-lg-5">
                    <div class="thm-sidebar-box">
						<?php dynamic_sidebar( $settings['sidebar_slug'] ); ?>
                    </div>
                </div>
                <!--End Thm Sidebar Box-->
				<?php endif; ?>
                
            </div>
        </div>
    </section>
    <!--End Blog Page Two -->

                
        <?php }
		wp_reset_postdata();
	}

}
