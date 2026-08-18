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
class Call_To_Action_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_call_to_action_v2';
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
        return esc_html__( 'Call To Action V2', 'educamb' );
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
            'call_to_action_v2',
            [
                'label' => esc_html__( 'Call To Action V2', 'educamb' ),
            ]
        );
		$this->add_control(
			'bg_image',
			[
				'label' => esc_html__('BG Image One', 'educamb'),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'pattern_image',
			[
				'label' => esc_html__('Pattern Image', 'educamb'),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'pattern_image2',
			[
				'label' => esc_html__('Pattern Image', 'educamb'),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'sub_title',
			[
				'label'       => __( 'Sub Title', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub Title', 'educamb' ),
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
				'placeholder' => __( 'Enter your Button Title', 'educamb' ),
				'default'     => __( 'Read More', 'educamb' ),
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
    
    <!--Start Enroll Area-->
    <section class="enroll-area">
        <div class="enroll-area__inner">
            <?php if($settings['bg_image']['id']){ ?>
            <div class="enroll-area__bg"
                style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);">
            </div>
            <?php } ?>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 text-center">
                        <div class="enroll-content-box__outer">
                            <div class="enroll-content-box__outer-shape" <?php if($settings['pattern_image']['id']){ ?>
                                style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['pattern_image']['id'])); ?>);"<?php } ?>>
                            </div>
                            <div class="enroll-content-box wow fadeInUp" data-wow-delay="100ms"
                                data-wow-duration="1500ms">
                                <div class="enroll-content-box__inner-shape" <?php if($settings['pattern_image2']['id']){ ?>
                                    style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['pattern_image2']['id'])); ?>);"<?php } ?>>
                                </div>
                                <?php if($settings['sub_title'] || $settings['title']) { ?>
                                <div class="sec-title-style2">
                                    <?php if($settings['sub_title']) { ?>
                                    <div class="sub-title">
                                        <h5><?php echo wp_kses($settings['sub_title'], true);?></h5>
                                    </div>
                                    <?php } ?>
                                    <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                                </div>
                                <?php } ?>
                                <div class="inner-content">
                                    <?php if($settings['text']) { ?>
                                    <div class="text">
                                        <p><?php echo wp_kses($settings['text'], true);?></p>
                                    </div>
                                    <?php } ?>
                                    <?php if($settings['btn_title']) { ?>
                                    <div class="btns-box">
                                        <a class="btn-one" href="<?php echo esc_url($settings['btn_link']['url']);?>">
                                            <span class="txt"><?php echo wp_kses($settings['btn_title'], true);?></span>
                                        </a>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Enroll Area-->
             
        <?php
    }
}
