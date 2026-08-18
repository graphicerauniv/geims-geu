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
class Our_Study extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'educamb_our_study';
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
		return esc_html__( 'Our Study', 'educamb' );
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
			'our_study',
			[
				'label' => esc_html__( 'Our Study', 'educamb' ),
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
				'placeholder' => __( 'Enter your title', 'educamb' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your text', 'educamb' ),
			]
		);
		$this->add_control(
			'service_image',
			[
			  'label' => __( 'Service Image', 'educamb' ),
			  'type' => Controls_Manager::MEDIA,
			  'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
	    );
		$this->add_control(
		  'buttons', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['btn_title' => esc_html__('Under Graduate', 'educamb')],
						['btn_title' => esc_html__('Post Baccalaureate', 'educamb')],
						['btn_title' => esc_html__('Graduate', 'educamb')],

					],
				'fields' => 
				[
					[
						'name' => 'btn_title',
						'label' => esc_html__('Tab Button Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'btn_link',
						'label' => __( 'External Url', 'educamb' ),
						 'type' => Controls_Manager::URL,
						 'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
					[
						'name' => 'post',
						'label' => esc_html__('Post Text', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
				],
				'title_field' => '{{btn_title}}',
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
			'text_limit',
			[
				'label'   => esc_html__( 'Text Limit', 'educamb' ),
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
					'DESc' => esc_html__( 'DESC', 'educamb' ),
					'ASC'  => esc_html__( 'ASC', 'educamb' ),
				),
			]
		);
		$this->add_control(
            'query_category', 
			[
			 	'type' => Controls_Manager::SELECT,
			 	'label' => esc_html__('Category', 'educamb'),
			 	'options' => get_service_categories(),
			 	'label_block' => true,
			]
		);
		$this->add_control(
			'btn_title',
			[
				'label'       => __( 'Button Title', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
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
		
        $paged = educamb_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;

		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-educamb' );
		$args = array(
			'post_type'      => 'service',
			'posts_per_page' => educamb_set( $settings, 'query_number' ),
			'orderby'        => educamb_set( $settings, 'query_orderby' ),
			'order'          => educamb_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		
		if( educamb_set( $settings, 'query_category' ) ) $args['service_cat'] = educamb_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts()) { 
		
		$count = 1;
		$left_arr = array();
   		$right_arr = array();
					
		?>
        
		<?php while ( $query->have_posts() ) : $query->the_post();
				
				if($count > 2) $count = 1;
			?>
			<?php if( ($count == 1)):
				$left_arr[get_the_id()] = ' <div class="single-departments-box marginbottom text-center wow fadeInLeft"
												data-wow-duration="1s" data-wow-delay="0.1s">
												<div class="icon">
													<span class="'.(get_post_meta(get_the_id(), 'service_icon', true )).'"></span>
													<div class="round-box"></div>
												</div>
												<div class="text-holder">
													<a href="'.(get_post_meta( get_the_id(), 'service_url', true )).'">'.get_the_title(get_the_id()).'</a>
													<div class="text">
														<p>'.wp_trim_words(get_the_content(), $settings['text_limit']).'</p>
													</div>
												</div>
											</div>';
			?>
			<?php else:
					$right_arr[get_the_id()] = '<div class="single-departments-box marginbottom text-center wow fadeInRight"
													data-wow-duration="1s" data-wow-delay="0.1s">
													<div class="icon">
														<span class="'.(get_post_meta(get_the_id(), 'service_icon', true )).'"></span>
														<div class="round-box"></div>
													</div>
													<div class="text-holder">
														<a href="'.(get_post_meta( get_the_id(), 'service_url', true )).'">'.get_the_title(get_the_id()).'</a>
														<div class="text">
															<p>'.wp_trim_words(get_the_content(), $settings['text_limit']).'</p>
														</div>
													</div>
												</div>';
			?>
			<?php endif; ?>
			<?php $count++; endwhile; ?>            
            <!-- Services Section -->
            
	<!--Start Departments Area-->
    <section class="departments-area">
        <div class="container">
            <?php if($settings['title'] || $settings['text']){ ?>
            <div class="sec-title text-center">
                <?php if($settings['title']){ ?><h2><?php echo wp_kses( $settings['title'], true );?></h2><?php } ?>
                <?php if($settings['text']){ ?>
                <div class="sub-title">
                    <p><?php echo wp_kses( $settings['text'], true );?></p>
                </div>
                <?php } ?>
            </div>
    		<?php } ?>
			
			<div class="row">			
				<!-- Left Column -->
				<div class="col-xl-4 col-lg-3">
					<?php foreach($left_arr as $key => $content):?>
                        <?php echo wp_kses_post($content);?>
                    <?php endforeach;?>
                </div>
				
                <div class="col-xl-4 col-lg-6">
                    <div class="departments-img-box">
                        <?php if($settings['service_image']['id']){ ?>
                        <img src="<?php echo esc_url(wp_get_attachment_url($settings['service_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                        <?php } ?>
                        <div class="departments-img-box__content">
                            <ul>
                                <?php foreach($settings['buttons'] as $key => $item): ?>
                                <li>
                                    <h3><a href="<?php echo esc_url($item['btn_link']['url']); ?>"><?php echo wp_kses($item['btn_title'], true); ?></a></h3>
                                    <p><?php echo wp_kses($item['post'], true); ?></p>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
				
				<!-- Right Column -->
				<div class="col-xl-4 col-lg-3">
					<?php foreach($right_arr as $key => $right_content):?>
                        <?php echo wp_kses_post($right_content);?>
                    <?php endforeach;?>
                </div>
				
			</div>
			<?php if($settings['btn_title']){ ?>
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="btn-box">
                        <a href="<?php echo esc_url($settings['btn_link']['url']); ?>"><?php echo wp_kses( $settings['btn_title'], true );?></a>
                    </div>
                </div>
            </div>
			<?php } ?>
		</div>
	</section>
	<!-- End Services Section -->
        
	<?php }
    wp_reset_postdata();
	
	}
}
