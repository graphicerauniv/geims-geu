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
class Academy_Instructors_Details extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_academy_instructors_details';
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
        return esc_html__( 'Academy Instructors Details', 'educamb' );
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
            'academy_instructors_details',
            [
                'label' => esc_html__( 'Academy Instructors Details', 'educamb' ),
            ]
        );
		$this->add_control(
			'author_img',
			[
				'label' => __( 'Author Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'instructor_name',
			[
				'label'       => __( 'Name', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Name', 'educamb' ),
			]
		);
		$this->add_control(
			'instructor_designation',
			[
				'label'       => __( 'Designation', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Designation', 'educamb' ),
			]
		);
		$this->add_control(
			'team_rating',
			 [
				'label'   => esc_html__( 'Choose Select Rating', 'educamb' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => '4',
				'options' => array(
					'1' => esc_html__( 'Choose One Star', 'educamb' ),
					'2' => esc_html__( 'Choose Two Star', 'educamb' ),
					'3' => esc_html__( 'Choose Three Star', 'educamb' ),
					'4' => esc_html__( 'Choose Four Star', 'educamb' ),
					'5' => esc_html__( 'Choose Five Star', 'educamb' ),
				),
			 ]
		);
		$this->add_control(
			'social_info', 
			[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['item#1' => esc_html__('social info', 'educamb')],
						['item#2' => esc_html__('social info', 'educamb')],
						['item#3' => esc_html__('social info', 'educamb')],
						['item#4' => esc_html__('social info', 'educamb')],
					],
				'fields' => 
				[
					[
						'name' => 'social_icons',
						'label' => esc_html__('Enter The icons', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::SELECT2,
						'options'  => get_fontawesome_icons(),
					],	
					[
						'name' => 'social_link',
						'label' => __( 'Social Link', 'educamb' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
			 ]
        );
		$this->add_control(
			'info_title',
			[
				'label'       => __( 'Title', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'educamb' ),
			]
		);
		$this->add_control(
			'description',
			[
				'label'       => __( 'Text', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'educamb' ),
			]
		);
		$this->add_control(
			'info', 
			[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_text1' => esc_html__('Main Address', 'educamb')],
						['block_text1' => esc_html__('Phone Us', 'educamb')],
						['block_text1' => esc_html__('Email Address', 'educamb')],						
					],
				'fields' => 
				[
					[
						'name' => 'block_text1',
						'label' => esc_html__('Description', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'block_text2',
						'label' => esc_html__('Description', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'educamb')
					],
				],
				'title_field' => '{{block_text1}}',
			 ]
        );
		$this->add_control(
			'show_courses_box',
			[
				'label'       => __( 'Enable/Disable Courses Box', 'educamb' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'educamb' ),
				'label_off' => __( 'Hide', 'educamb' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'course_title',
			[
				'label'       => __( 'Courses Title', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'educamb' ),
				'condition' => [
					'show_courses_box' => 'yes',
				],
			]
		);
		$this->add_control(
			'text_limit',
			[
				'label'   => esc_html__( 'Text Limit', 'educamb' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
				'condition' => [
					'show_courses_box' => 'yes',
				],
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
				'condition' => [
					'show_courses_box' => 'yes',
				],
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
				'condition' => [
					'show_courses_box' => 'yes',
				],
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
				'condition' => [
					'show_courses_box' => 'yes',
				],
			]
		);
		$this->add_control(
            'query_category', 
			[
			  'type' => Controls_Manager::SELECT,
			  'label' => esc_html__('Category', 'educamb'),
			  'label_block' => true,
			  'options' => get_course_categories(),
			  'condition' => [
					'show_courses_box' => 'yes',
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
		
        <!--Start Instructor Details Area-->
        <section class="instructor-details-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="instructor-details-img-box">
                            <div class="instructor-details-img-box__inner">
                                <div class="instructor-details-social-links">
                                    <ul>
                                        <?php foreach($settings['social_info'] as $key => $item): ?>
                                        <li>
                                            <a href="<?php echo esc_url($item['social_link']['url']); ?>"><i class="fab <?php echo wp_kses(str_replace( "fa ",  "",  $item['social_icons']), true); ?>"></i></a>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <?php if($settings['author_img']['id']){ ?>
                                <div class="img-holder">
                                    <div class="inner">
                                        <img src="<?php echo esc_url(wp_get_attachment_url($settings['author_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="inner-holder">
                                    <?php if($settings['instructor_name']) { ?><h3><?php echo wp_kses($settings['instructor_name'], true);?></h3><?php } ?>
                                    <?php if($settings['instructor_designation']) { ?><p><?php echo wp_kses($settings['instructor_designation'], true);?></p><?php } ?>
                                </div>
                                <div class="instructor-details-review-box">
                                    <div class="left">
                                        <div class="review-box">
                                            <ul>
												<?php $rating =  wp_kses($settings['team_rating'], true );
                                                    if(!empty($rating)){
                                                    for ($x = 1; $x <= 5; $x++) {
                                                        if($x <= $rating) echo '<li><i class="fa fa-star"></i></li>'; else echo '<li><i class="fa fa-star-o"></i></li>';
                                                    }
                                                } ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="btn-one btn-one--style4">
                                            <span class="txt">
                                                <i class="icon-right-arrow-1"></i>
                                                <?php esc_html_e('Reviews', 'educamb'); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="instructor-details-content-box">
                            <?php if($settings['info_title']) { ?><h2><?php echo wp_kses($settings['info_title'], true);?></h2><?php } ?>
                            <?php if($settings['description']) { ?><p><?php echo wp_kses($settings['description'], true);?></p><?php } ?>
                            <ul>
                                <?php foreach($settings['info'] as $key => $item): ?>
                                <li><span><?php echo wp_kses($item['block_text1'], true);?></span> <?php echo wp_kses($item['block_text2'], true);?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
						<?php if($settings['show_courses_box']) { ?>
                        <div class="courses-teaching-content">
                            <?php if($settings['course_title']) { ?>
                            <div class="inner-title">
                                <h2><?php echo wp_kses($settings['course_title'], true);?></h2>
                            </div>
                            <?php } ?>
                            <div class="theme_carousel courses-teaching-carousel owl-theme owl-carousel owl-nav-style-one"
                                data-options='{
                                "loop": true, 
                                "margin": 30, 
                                "autoheight":true, 
                                "lazyload":true, 
                                "nav": true, 
                                "dots": true, 
                                "autoplay": true, 
                                "autoplayTimeout": 5000, 
                                "smartSpeed": 500, 
                                "navText": ["<span class=\"left icon-right-arrow-1\"></span>",
                                "<span class=\"right icon-right-arrow-1\"></span>"], 
                                "responsive":{ 
                                "0" :{ "items": "1" }, 
                                "600" :{ "items" : "1" }, 
                                "768" :{ "items" : "2" }, 
                                "992":{ "items" : "2" }, 
                                "1200":{ "items" : "2" }
                            }
                            }'>
								<?php 
									global $authordata;
									global $post; while ( $query->have_posts() ) : $query->the_post(); 
									$term_list = wp_get_post_terms(get_the_id(), 'course-category', array("fields" => "names"));
									$course_duration = get_tutor_course_duration_context();
								?>
                                <!--Start Single Online Courses Style2 -->
                                <div class="single-online-courses-style2">
                                    <div class="img-holder">
                                        <div class="inner">
                                            <?php the_post_thumbnail( 'educamb_270x260' );?>
                                        </div>
                                        <div class="overlay-content">
                                            <div class="overlay-content-bg"></div>
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
                                        <div class="img-holder__overlay">
                                            <div class="top">
                                                <div class="category-box">
                                                    <span class="icon-filter"></span>
                                                    <p><?php echo implode( ', ', (array)$term_list );?></p>
                                                </div>
                                                <div class="text">
                                                    <p><?php echo wp_kses( wp_trim_words( get_the_content(), $settings[ 'text_limit' ] ), true );?></p>
                                                </div>
                                                <div class="single-online-courses-style2__instructors-info">
                                                    <div class="img-box">
                                                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 45 ); ?>
                                                    </div>
                                                    <div class="text-box">
                                                        <h5><?php echo get_the_author(); ?></h5>
                                                        <span><?php esc_html_e('Instructor', 'educamb'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btns-box">
                                                <a class="btn-one btn-one--style4" href="<?php echo esc_url( the_permalink( get_the_id() ) );?>">
                                                    <span class="txt">
                                                        <i class="icon-right-arrow-1"></i>
                                                        <?php esc_html_e('Enroll Now', 'educamb'); ?>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-holder">
                                        <div class="category-box">
                                            <span class="icon-filter"></span>
                                            <p><?php echo implode( ', ', (array)$term_list );?></p>
                                        </div>
                                        <h3>
                                            <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a>
                                        </h3>
                                        <div class="meta-info">
                                            <ul>
                                                <?php if( $course_duration ){?>
                                                <li><span class="icon-time"></span><?php echo wp_kses( $course_duration, true ); ?></li>
                                                <?php };?>
                                                <li><span class="icon-read"></span><?php echo get_tutor_course_level();?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--End Single Online Courses Style2 -->
								<?php endwhile; ?>
                            </div>
                        </div>
						<?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!--End Instructor Details Area-->
                
        <?php }
		wp_reset_postdata();
	}

}
