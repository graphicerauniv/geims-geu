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
class Our_Video extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_our_video';
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
        return esc_html__( 'Our Video', 'educamb' );
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
    protected function _register_controls() {
        $this->start_controls_section(
            'our_video',
            [
                'label' => esc_html__( 'Our Video', 'educamb' ),
            ]
        );
		$this->add_control(
			'style_two',
			[
				'label'   => esc_html__( 'Choose Different Style', 'educamb' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
					'one' => esc_html__( 'Choose Style One', 'educamb' ),
					'two' => esc_html__( 'Choose Style Two ', 'educamb' ),
				),
			]
		);
		$this->add_control(
			'video_link',
				[
				  'label' => __( 'Video Url', 'educamb' ),
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
			'video_image',
			[
				'label' => __( 'Video Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
		
        
        
        <!-- video-section -->
        <section class="video-section  <?php if($settings['style_two'] == 'two') echo 'sec-pad pb-215 mr-0'; else echo ''; ?>">
            <div class="auto-container">
                 <?php if($settings['video_image']['id']){ ?>
                <div class="video-inner" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['video_image']['id'])); ?>);">
                   <?php if($settings['video_link']['url']){ ?>
                    <div class="video-btn">
                        <a href="<?php echo esc_url($settings['video_link']['url']); ?>" class="lightbox-image" data-caption=""><i class="fas fa-play"></i></a>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        </section>
        <!-- video-section end -->
      
                 
        <?php
    }
}
