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
class Banner_V1 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_banner_v1';
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
        return esc_html__( 'Banner V1', 'educamb' );
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
            'banner_v1',
            [
                'label' => esc_html__( 'Banner V1', 'educamb' ),
            ]
        );
		$this->add_control(
            'slides', 
			[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['title' => esc_html__('Slide One', 'educamb')],
						['title' => esc_html__('Slide Two', 'educamb')],
						['title' => esc_html__('Slide Three', 'educamb')]
					],
				'fields' => 
				[
					[
						'name' => 'bg_image',
						'label' => esc_html__('Slide BG Image', 'educamb'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'title',
						'label' => esc_html__('Title', 'educamb'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'text',
						'label' => esc_html__('Title', 'educamb'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'btn_title',
						'label' => esc_html__('Button Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'btn_link',
						'label' => __( 'Button Link', 'educamb' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
					[
						'name' => 'btn_title2',
						'label' => esc_html__('Button Title 1', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'btn_link2',
						'label' => __( 'Button Link 1', 'educamb' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
					[
						'name' => 'video_text',
						'label' => esc_html__('Video Text', 'educamb'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'video_url',
						'label' => __( 'Video Url', 'educamb' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
					[
						'name' => 'style_two',
						'label'   => esc_html__( 'Choose Different Style', 'educamb' ),
						'label_block' => true,
						'type'    => Controls_Manager::SELECT,
						'default' => 'one',
						'options' => array(
							'one' => esc_html__( 'Choose Style Text Align Left', 'educamb' ),
							'two' => esc_html__( 'Choose Style Text Align Center', 'educamb' ),
						),
					],
				],
				'title_field' => '{{title}}',
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
	
    <!-- Start Main Slider -->
    <section class="main-slider style1 nav-style2">
        <div class="slider-box">
            <!-- Banner Carousel -->
            <div class="banner-carousel owl-theme owl-carousel">
                
				<?php foreach($settings['slides'] as $key => $item): ?>
                <!-- Slide -->
                <div class="slide">
                    <?php if($item['bg_image']['id']){ ?><div class="image-layer" style="background-image:url(<?php echo esc_url(wp_get_attachment_url($item['bg_image']['id'])); ?>)"></div><?php } ?>
                    <div class="auto-container">
                        <div class="<?php if($item['style_two'] == 'two') echo 'content middle text-center'; else echo 'content'; ?>">
                            <?php if($item['title']) { ?>
                            <div class="big-title">
                                <h2><?php echo wp_kses($item['title'], true); ?></h2>
                            </div>
                            <?php } ?>
							<?php if($item['text']) { ?>
                            <div class="text">
                                <p><?php echo wp_kses($item['text'], true); ?></p>
                            </div>
                            <?php } ?>
                            <?php if($item['btn_title'] || $item['btn_title2']){ ?>
                            <div class="btns-box">
                                <?php if($item['btn_title']) { ?>
                                <a class="btn-one" href="<?php echo esc_url($item['btn_link']['url']); ?>">
                                    <span class="txt">
                                        <?php echo wp_kses($item['btn_title'], true); ?>
                                    </span>
                                </a>
                                <?php } ?>
                                <?php if($item['btn_title2']) { ?>
                                <a class="btn-one style2" href="<?php echo esc_url($item['btn_link2']['url']); ?>">
                                    <span class="txt">
                                        <?php echo wp_kses($item['btn_title2'], true); ?>
                                    </span>
                                </a>
                                <?php } ?>
                            </div>
                            <?php } ?>
                            <?php if($item['video_text'] || $item['video_url']['url']){ ?>
                            <div class="video-gallery-btns-box">
                                <a class="video-popup" title="Video Gallery"
                                    href="<?php echo esc_url($item['video_url']['url']); ?>">
                                    <span class="icon-play"></span>
                                </a>
                                <p>
                                    <a class="video-popup" title="Video Gallery"
                                        href="<?php echo esc_url($item['video_url']['url']); ?>">
                                        <?php echo wp_kses($item['video_text'], true); ?>
                                    </a>
                                </p>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
				<?php endforeach; ?>
                
            </div>
        </div>
    </section>
    <!-- End Main Slider -->
        
        <?php
    }
}
