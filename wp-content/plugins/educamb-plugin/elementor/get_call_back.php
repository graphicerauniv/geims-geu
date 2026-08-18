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
class Get_Call_Back extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_get_call_back';
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
        return esc_html__( 'Get Call Back', 'educamb' );
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
            'get_call_back',
            [
                'label' => esc_html__( 'Get Call Back', 'educamb' ),
            ]
        );
		$this->add_control(
			'pattern_image',
			[
				'label' => __( 'Pattern Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'pattern_image2',
			[
				'label' => __( 'Pattern Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
			'contact_form_url',
			[
				'label'       => __( 'Contact Form Url', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Contact Form Url', 'educamb' ),
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
    ?>
	
    <!--Start Call Back Area-->
    <section class="call-back-area">
        <div class="call-back-area__bg" <?php if($settings['pattern_image']['id']){ ?>
            style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['pattern_image']['id'])); ?>);"<?php } ?>></div>
        <div class="call-back-area-shape" <?php if($settings['pattern_image2']['id']){ ?> style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['pattern_image2']['id'])); ?>);"<?php } ?>>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="call-back-form wow fadeInLeft" data-wow-delay="100ms" data-wow-duration="1500ms">
                        <div class="call-back-form-box1"></div>
                        <div class="call-back-form-box2"></div>
                        <?php if($settings['title']) { ?>
                        <div class="sec-title-style2">
                            <h2><?php echo wp_kses($settings['title'], true);?></h2>
                        </div>
                        <?php } ?>
                        <div class="default-form1">
							<?php echo do_shortcode($settings['contact_form_url']);?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Call Back Area-->
                     
        <?php
    }
}


