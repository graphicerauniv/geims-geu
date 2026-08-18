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
class Video_Section_V8 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_video_section_v8';
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
        return esc_html__( 'Video Section V8', 'educamb' );
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
            'video_section_v8',
            [
                'label' => esc_html__( 'Video Section V8', 'educamb' ),
            ]
        );
		$this->add_control(
			'bg_image',
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
	
    <!--Start Marketplace Video Gallery Area-->
    <section class="marketplace-video-gallery-area">
        <?php if($settings['bg_image']['id']){ ?><div class="thm-pattern-style5" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/pattern/thm-pattern-2.png);">
        </div><?php } ?>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="marketplace-video-gallery-content">
                        <?php if($settings['bg_image']['id']){ ?>
                        <div class="marketplace-video-gallery-content-bg"
                            style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);">
                        </div>
                        <?php } ?>
                        <?php if($settings['video_link']['url']) { ?>
                        <div class="video-btn">
                            <a href="<?php echo esc_url($settings['video_link']['url']); ?>" class="lightbox-image"
                                data-caption="">
                                <i class="flaticon-play-button"></i>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Marketplace Video Gallery Area-->
                 
        <?php
    }
}
