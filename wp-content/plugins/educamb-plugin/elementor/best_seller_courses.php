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
class Best_Seller_Courses extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'educamb_best_seller_courses';
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
		return esc_html__( 'Best Seller Courses', 'educamb' );
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
			'best_seller_courses',
			[
				'label' => esc_html__( 'Best Seller Courses', 'educamb' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'educamb' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Description', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Description', 'educamb' ),
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
			'btn_title',
			[
				'label'       => __( 'Button Title', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'educamb' ),
				'default'     => __( 'All Courses', 'educamb' ),
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
		
        <!--Start Marketplace Best Sellers Area-->
        <section class="marketplace-best-sellers-area">
            <div class="container">
                <?php if($settings['title'] || $settings['text']) { ?>
                <div class="sec-title-style5 text-center">
                    <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                    
					<?php if($settings['text']) { ?>
                    <div class="sub-title">
                        <div class="line left"></div>
                        <p><?php echo wp_kses($settings['text'], true);?></p>
                        <div class="line right"></div>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <?php 
						global $authordata;
						global $post; while ( $query->have_posts() ) : $query->the_post(); 
						$term_list = wp_get_post_terms(get_the_id(), 'course-category', array("fields" => "names"));
						$course_duration = get_tutor_course_duration_context();
					?>
                    <!--Start Single Instructors Style1-->
                    <div class="col-xl-4 col-lg-4">
                        <div class="single-best-sellers-item">
                            <div class="single-best-sellers-item__inner">
                                <div class="img-holder">
                                    <?php if(has_post_thumbnail()){ ?>
                                    <div class="inner">
                                        <?php the_post_thumbnail( 'educamb_330x270' );?>
                                    </div>
                                    <?php } ?>
                                    
                                    <div class="category-box">
                                        <h5><?php echo implode( ', ', (array)$term_list );?></h5>
                                    </div>
                                    
                                    <div class="overlay-content">
                                        <div class="left">
                                            <div class="review-box">
                                                <?php do_action('tutor_course/loop/rating'); ?>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <div class="rate-box">
                                                <h4><?php tutor_course_price(); ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-holder">
                                    <div class="level-box">
                                        <span class="icon-signal-status"></span>
                                        <p><?php echo implode( ', ', (array)$term_list );?></p>
                                    </div>
                                    <h3>
                                        <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a>
                                    </h3>
                                    
                                    <div class="meta-info">
                                        <ul>
                                        	<?php if( $course_duration ){?>
                                            <li>
                                                <span class="icon-time"></span>
                                                <?php echo wp_kses( $course_duration, true ); ?>
                                            </li>
                                            <?php } ?>
                                            <li>
                                                <span class="icon-read"></span>
                                                <?php echo get_tutor_course_level();?>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Single Instructors Style1-->
                    <?php endwhile; ?>
                </div>
				
				<?php if($settings['btn_title']){ ?>
                <div class="marketplace-best-sellers__btns-box">
                    <a class="btn-one" href="<?php echo esc_url($settings['btn_link']['url']); ?>">
                        <span class="txt"><?php echo wp_kses($settings['btn_title'], true); ?></span>
                    </a>
                </div>
				<?php } ?>
            </div>
        </section>
        <!--End Marketplace Best Sellers Area-->
                
        <?php }
		wp_reset_postdata();
	}

}
