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
class Our_Partners_V3 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_our_partners_v3';
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
        return esc_html__( 'Our Partners V3', 'educamb' );
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
            'our_partners_v3',
            [
                'label' => esc_html__( 'Our Partners V3', 'educamb' ),
            ]
        );
		$this->add_control(
			'show_pattern_images',
			[
				'label'       => __( 'Enable/Disable Pattern Images', 'educamb' ),
						'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'educamb' ),
				'label_off' => __( 'Hide', 'educamb' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'sub_title',
			[
				'label'       => __( 'Sub Title', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'educamb' ),
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
           'client', 
	       [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						
					],
				'fields' => 
				[
					[
						'name' => 'client_image',
						'label' => esc_html__('Client Image', 'educamb'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'client_link',
						'label' => __( 'External Link', 'educamb' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
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
    ?>
	
    <!--Start Partner Style3 Area-->
    <section class="partner-style3-area">
        <?php if($settings['show_pattern_images']) { ?>
        <div class="partner-style3-area-shape1 wow slideInLeft" data-wow-duration="4000ms">
            <img class="paroller" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/instructor/shape/partner-style3-area-shape-1.png" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
        </div>
        <div class="partner-style3-area-shape2">
            <img class="rotate-me" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/instructor/shape/partner-style3-area-shape-2.png" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
        </div>
        <div class="partner-style3-area-shape3 wow slideInRight" data-wow-duration="4000ms">
            <img class="float-bob-y" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/instructor/shape/partner-style3-area-shape-3.png" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
        </div>
        <?php } ?>
        <div class="container">
            <div class="sec-title-style4 center text-center">
                <?php if($settings['sub_title']){ ?>
                <div class="sub-title">
                    <div class="decor"></div>
                    <h5><?php echo wp_kses($settings['sub_title'], true);?></h5>
                </div>
                <?php } ?>
                <?php if($settings['title']){ ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
            </div>

            <div class="row">
                <?php foreach($settings['client'] as $key => $item): ?>
                <!--Start Single Partner Logo Box-->
                <div class="col-xl-2 col-lg-4 col-md-4">
                    <div class="single-partner-logo-box-style2">
                        <a href="<?php echo esc_url($item['client_link']['url']);?>"><img src="<?php echo esc_url(wp_get_attachment_url($item['client_image']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>"></a>
                    </div>
                </div>
                <!--End Single Partner Logo Box-->
                <?php endforeach;?>
            </div>
			<?php if($settings['btn_title']) { ?>
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="btns-box">
                        <a class="btn-one btn-one--style4" href="<?php echo esc_url($settings['btn_link']['url']);?>">
                            <span class="txt">
                                <i class="icon-right-arrow-1"></i>
                                <?php echo wp_kses($settings['btn_title'], true);?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
			<?php } ?>
        </div>
    </section>
    <!--End Partner Style3 Area-->
             
        <?php
    }
}
