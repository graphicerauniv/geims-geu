<?php namespace EDUCAMBPLUGIN\Element;

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
class Cooking_Classes extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_cooking_classes';
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
        return esc_html__( 'Cooking Classes', 'educamb' );
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
            'cooking_classes',
            [
                'label' => esc_html__( 'Cooking Classes', 'educamb' ),
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
			'query_number',
			[
				'label'   => esc_html__( 'Number of post', 'educamb' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
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
			  'options' => get_course_categories()
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
			'post_type'      => 'courses',
			'posts_per_page' => educamb_set( $settings, 'query_number' ),
			'orderby'        => educamb_set( $settings, 'query_orderby' ),
			'order'          => educamb_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( educamb_set( $settings, 'query_category' ) ) $args['course-category'] = educamb_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>
		
        <!--Start Cooking Courses Classes Area-->
        <section class="cooking-courses-classes-area">
            <div class="container">
                <div class="row">
                    <?php if ( is_active_sidebar( $settings['sidebar_slug'] ) ) : ?>
                    <div class="col-xl-3 col-lg-7 order-22">
                        <div class="sidebar-content-box-style1">
							<?php dynamic_sidebar( $settings['sidebar_slug'] ); ?>
                        </div>
                    </div>
					<?php endif; ?>
                    
                    <div class="col-xl-9 order-11">
                        <div class="cooking-courses-classes-content">

                            <div class="row">
                                <?php 
									global $authordata;
									global $post; while ( $query->have_posts() ) : $query->the_post(); 
									$term_list = wp_get_post_terms(get_the_id(), 'course-category', array("fields" => "names"));
									$course_duration = get_tutor_course_duration_context();
								?>
                                <!--Start Single Cooking Classes Content style2-->
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="single-cooking-classes-content single-cooking-classes-content--style2">
                                        <div class="img-holder">
                                            <div class="inner">
                                                <?php the_post_thumbnail( 'educamb_270x220' );?>
                                            </div>
                                            <div class="overlay-content">
                                                <div class="left">
                                                    <h4><?php tutor_course_price(); ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-holder">
                                            <div class="review-box">
                                                <?php do_action('tutor_course/loop/rating'); ?>
                                            </div>
                                            <h3>
                                                <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a>
                                            </h3>
                                            <div class="meta-box">
                                                <ul>
                                                    <?php if( $course_duration ){?>
                                                    <li>
                                                        <span class="icon-play"></span>
                                                        <p><?php echo wp_kses( $course_duration, true ); ?></p>
                                                    </li>
                                                    <?php } ?>
                                                    <li>
                                                        <span class="flaticon-user"></span>
                                                        <p><?php echo get_tutor_course_level();?></p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Single Cooking Classes Content style2-->
                                <?php endwhile; ?>
                            </div>
                        </div>
                        
                        <?php if($settings['show_pagination']) { ?>
                        <div class="row">
                            <div class="col-xl-12 text-center">
                                <div class="styled-pagination pdtop0 styled-pagination--style2 clearfix">
                                    <?php educamb_the_pagination2(array('total'=>$query->max_num_pages, 'next_text' => '<span class="icon-right-arrow-1 right"></span>', 'prev_text' => '<span class="icon-right-arrow-1 left"></span>')); ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        
                    </div>

                </div>
            </div>
        </section>
        <!--End Cooking Courses Classes Area-->
                                
        <?php }
		wp_reset_postdata();
	}

}
