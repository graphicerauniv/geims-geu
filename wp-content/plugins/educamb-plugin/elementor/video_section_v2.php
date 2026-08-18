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
class Video_Section_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_video_section_v2';
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
        return esc_html__( 'Video Section V2', 'educamb' );
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
            'video_section_v2',
            [
                'label' => esc_html__( 'Video Section V2', 'educamb' ),
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
			'video_image',
			[
				'label' => __( 'BG Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'video_link',
			[
				  'label' => __( 'Viedo Url', 'educamb' ),
				  'type' => Controls_Manager::URL,
				  'label_block' => true,
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
	
    <!--Start Instructor Video gallery-->
    <section class="instructor-video-gallery">
        <?php if($settings['show_pattern_images']) { ?>
        <div class="instructor-video-gallery-outer-shape wow slideInLeft" data-wow-delay="100ms"
            data-wow-duration="3500ms">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/instructor/shape/instructor-video-gallery-outer-shape.png" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
        </div>
        <?php } ?>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="instructor-video-gallery__content">
                        <?php if($settings['show_pattern_images']) { ?>
                        <div class="instructor-video-gallery__content-shape1 wow slideInLeft" data-wow-delay="100ms"
                            data-wow-duration="3500ms">
                            <img class="float-bob-y"
                                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/instructor/shape/instructor-video-gallery-shape-1.png" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                        </div>
                        <div class="instructor-video-gallery__content-shape2">
                            <img class="paroller"
                                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/instructor/shape/instructor-video-gallery-shape-2.png" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                        </div>
                        <div class="instructor-video-gallery__content-shape3">
                            <img class="rotate-me"
                                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/instructor/shape/instructor-video-gallery-shape-3.png" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                        </div>
                        <div class="instructor-video-gallery__content-shape4 wow slideInRight"
                            data-wow-delay="100ms" data-wow-duration="4500ms">
                            <img class="paroller"
                                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/instructor/shape/instructor-video-gallery-shape-4.png" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                        </div>
                        <?php } ?>
                        <?php if($settings['video_image']['id']) { ?>
                        <div class="instructor-video-gallery__img"
                            style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['video_image']['id'])); ?>);">
                        </div>
                        <?php } ?>
						<?php if($settings['video_link']['url']) { ?>
                        <div class="btn-box" data-aos="zoom-in-down">
                            <a class="video-popup" title="Video Gallery"
                                href="<?php echo esc_url($settings['video_link']['url']); ?>">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/instructor/shape/play-btn.png" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                            </a>
                        </div>
						<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Instructor Video gallery-->      
                 
        <?php
    }
}
