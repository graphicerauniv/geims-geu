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
class Courses_V7 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'educamb_courses_v7';
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
		return esc_html__( 'courses_v7', 'educamb' );
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
			'courses_v7',
			[
				'label' => esc_html__( 'Courses V7', 'educamb' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Sub Title', 'educamb' ),
				'label_block' => true,
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
			'number',
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
			'cat_exclude',
			[
				'label'       => esc_html__( 'Exclude', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Exclude categories, etc. by ID with comma separated.', 'educamb' ),
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
			'show_bottom_area',
			[
				'label'       => __( 'Enable/Disable Bottom Description', 'educamb' ),
						'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'educamb' ),
				'label_off' => __( 'Hide', 'educamb' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);	
		$this->add_control(
			'bottom_description',
			[
				'label'       => __( 'Bottom Description', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Bottom Description', 'educamb' ),
				'condition' => [
				  	'show_bottom_area' => 'yes',
				],
			]
		);
		$this->add_control(
			'btn_title2',
			[
				'label'       => __( 'Button Title', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'educamb' ),
				'condition' => [
				  	'show_bottom_area' => 'yes',
				],
			]
		);
		$this->add_control(
			'btn_link2',
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
				  'condition' => [
				  	'show_bottom_area' => 'yes',
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
			'posts_per_page' => educamb_set( $settings, 'number' ),
			'orderby'        => educamb_set( $settings, 'query_orderby' ),
			'order'          => educamb_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		$terms_array = explode(",",educamb_set( $settings, 'cat_exclude' ));
		if(educamb_set( $settings, 'cat_exclude' )) $args['tax_query'] = array(array('taxonomy' => 'course-category','field' => 'id','terms' => $terms_array,'operator' => 'NOT IN',));
		$allowed_tags = wp_kses_allowed_html('post');
		$query = new \WP_Query( $args );
		$t = '';
		$data_filtration = '';
		$data_posts = '';
		if ( $query->have_posts() ) 
		{
		ob_start();
		?>
  
		<?php 
            $count = 0; 
            $fliteration = array();
            while( $query->have_posts() ): $query->the_post();
            global  $post;
            $meta = ''; //printr($meta);
            $meta1 = ''; //_WSH()->get_meta();
            $post_terms = get_the_terms( get_the_id(), 'course-category');// printr($post_terms); exit();
            foreach( (array)$post_terms as $pos_term ) $fliteration[$pos_term->term_id] = $pos_term;
            $temp_category = get_the_term_list(get_the_id(), 'course-category', '', ', ');
            
            $post_terms = wp_get_post_terms( get_the_id(), 'course-category'); 
            $term_slug = '';
            if( $post_terms ) foreach( $post_terms as $p_term ) $term_slug .= $p_term->slug.' ';
        	
			$term_list = wp_get_post_terms(get_the_id(), 'course-category', array("fields" => "names"));
			$course_duration = get_tutor_course_duration_context();
			$post_thumbnail_id = get_post_thumbnail_id($post->ID);
			$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
			$course_duration = get_tutor_course_duration_context();
			
            ?>
           
            <!--Start Single popular quizzes Box-->
            <div class="col-xl-4 col-lg-4 col-md-12 filter-item <?php echo esc_attr($term_slug); ?>">
                <div class="single-popular-quizzes-box">
                    <?php if(has_post_thumbnail()){ ?>
                    <div class="img-holder">
                        <?php the_post_thumbnail( 'educamb_370x220' );?>
                        <div class="rate-box">
                            <h3><?php tutor_course_price(); ?></h3>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="title-holder">
                        <p><?php echo implode( ', ', (array)$term_list );?></p>
                        <h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
                        <div class="meta-info">
                            <ul>
                                <?php if( $course_duration ){?>
                                <li>
                                    <span class="flaticon-list-interface-symbol"></span>
                                    <?php echo wp_kses( $course_duration, true ); ?>
                                </li>
                                <?php } ?>
                                <li>
                                    <span class="flaticon-person-info"></span>
                                    <?php echo get_tutor_course_level();?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Single popular quizzes Box-->
                       
			<?php endwhile;?>

            <?php wp_reset_postdata();
            $data_posts = ob_get_contents();
            ob_end_clean();
            
            ob_start();?>
            
            <?php $terms = get_terms(array('course-category')); ?>
			
            <!--Start Popular Quizzes Area-->
            <section class="popular-quizzes-area">
                <div class="container">
                    <?php if($settings['title'] || $settings['text']) { ?>
                    <div class="sec-title-style8 text-center">
                        <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                        <?php if($settings['text']) { ?><p><?php echo wp_kses($settings['text'], true);?></p><?php } ?>
                    </div>
                    <?php } ?>
                    <div class="popular-quizzes__menu-box">
                        <div class="project-menu-box">
                            <ul class="project-filter clearfix post-filter has-dynamic-filters-counter">
                                <li data-filter=".filter-item" class="active">
                                    <span class="filter-text"><?php esc_attr_e('All Classes', 'educamb');?></span>
                                </li>
                                <?php foreach( $fliteration as $t ): ?>
                                <li data-filter=".<?php echo esc_attr(educamb_set( $t, 'slug' )); ?>"><span class="filter-text"><?php echo educamb_set( $t, 'name'); ?></span></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                        
                        <?php if($settings['btn_title']){ ?>
                        <div class="btn-box">
                            <a href="<?php echo esc_url($settings['btn_link']['url']); ?>">
                                <span class="icon-right-arrow-1"></span><?php echo wp_kses($settings['btn_title'], true); ?>
                            </a>
                        </div>
                        <?php } ?>
                        
                    </div>
    
                    <div class="row filter-layout masonary-layout">
                        <?php echo wp_kses($data_posts, true); ?>
                    </div>
    				
                    <?php if($settings['show_bottom_area']){ ?>
                    <div class="popular-quizzes-bottom-title">
                        <h2><?php echo wp_kses($settings['bottom_description'], true); ?></h2>
                        <?php if($settings['btn_title2']){ ?>
                        <div class="btns-box">
                            <a class="btn-one" href="<?php echo esc_url($settings['btn_link2']['url']); ?>">
                                <span class="txt"><?php echo wp_kses($settings['btn_title2'], true); ?></span>
                            </a>
                        </div>
                        <?php } ?>
                        <div class="popular-quizzes-area-shape-1 float-bob-x">
                            <img class="paroller" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/quiz-learning/shape/popular-quizzes-area-shape-1.png" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                        </div>
                    </div>
    				<?php } ?>
                </div>
            </section>
            <!--End Popular Quizzes Area-->
                        
       <?php }
	}

}