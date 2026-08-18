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
class Why_Choose_Us extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_why_choose_us';
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
        return esc_html__( 'Why Choose Us', 'educamb' );
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
            'why_choose_us',
            [
                'label' => esc_html__( 'Why Choose Us', 'educamb' ),
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
			'bg_text',
			[
				'label'       => __( 'BG Title', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your BG Title', 'educamb' ),
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub title', 'educamb' ),
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
				'placeholder' => __( 'Enter your title', 'educamb' ),
			]
		);
		$this->add_control(
		  'choose', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Item1', 'educamb')],
						['block_title' => esc_html__('Item2', 'educamb')],
						['block_title' => esc_html__('Item3', 'educamb')],
					],
				'fields' => 
				[
					[
						'name' => 'block_sub_title',
						'label' => esc_html__('Sub Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'block_title',
						'label' => esc_html__('Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
					],
					[
						'name' => 'block_text',
						'label' => esc_html__('Text', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
					],
					[
						'name' => 'block_btn_title',
						'label' => esc_html__('Button Title', 'educamb'),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
					],
					[
						'name' => 'block_btn_link',
						'label' => __( 'External Url', 'eminent' ),
						 'type' => Controls_Manager::URL,
						 'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
				'title_field' => '{{block_title}}',
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
	
    <!--Start Highlights Area-->
    <section class="highlights-area highlights-area--style2">
        <?php if($settings['show_pattern_images']) { ?>
        <div class="highlights-area-shape1 paroller">
            <img class="float-bob-y" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/instructor/shape/highlights-area-shape-1.png" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
        </div>
        <div class="highlights-area-shape2 paroller-2">
            <img class="float-bob-y" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/instructor/shape/highlights-area-shape-2.png" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
        </div>
        <div class="highlights-area-shape3 wow slideInRight" data-wow-duration="4000ms">
            <img class="float-bob-x" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/instructor/shape/highlights-area-shape-3.png" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
        </div>
        <?php } ?>
        <?php if($settings['bg_text']) { ?><div class="big-title-box paroller-2"><?php echo wp_kses($settings['bg_text'], true);?></div><?php } ?>
        <div class="container">
            <?php if($settings['subtitle'] || $settings['title']) { ?>
            <div class="sec-title-style4 center text-center">
                <?php if($settings['subtitle']) { ?>
                <div class="sub-title">
                    <div class="decor"></div>
                    <h5><?php echo wp_kses($settings['subtitle'], true);?></h5>
                </div>
                <?php } ?>
                <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2> <?php } ?>
            </div>
            <?php } ?>
            <div class="row">
				<?php  foreach($settings['choose'] as $key => $item): ?>
                <!--Start Single Highlights Box-->
                <div class="col-xl-6">
                    <div class="single-highlights-box wow slideInLeft" data-wow-delay="100ms"
                        data-wow-duration="1000ms">
                        <div class="single-highlights-box__inner">
                            <div class="text-box">
                                <h5><?php echo wp_kses($item['block_sub_title'], true);?></h5>
                                <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                <p><?php echo wp_kses($item['block_text'], true);?></p>
                            </div>
                            <div class="overlay-text">
                                <p><?php echo wp_kses($item['block_text'], true);?></p>
                                <div class="btn-box">
                                    <a href="<?php echo esc_url($item['block_btn_link']['url']); ?>">
                                        <span class="icon-right-arrow-1"></span><?php echo wp_kses($item['block_btn_title'], true);?>
                                    </a>
                                </div>
                            </div>
                            <div class="counting-box"></div>
                        </div>
                    </div>
                </div>
                <!--End Single Highlights Box-->
                <?php endforeach; ?>

            </div>
        </div>
    </section>
    <!--End Highlights Area-->
        
                         
        <?php
    }
}
