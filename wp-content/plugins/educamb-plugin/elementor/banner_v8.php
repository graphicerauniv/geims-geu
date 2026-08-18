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
class Banner_V8 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_banner_v8';
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
        return esc_html__( 'Banner V8', 'educamb' );
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
            'banner_v8',
            [
                'label' => esc_html__( 'Banner V8', 'educamb' ),
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
			'bg_image2',
			[
				'label' => __( 'BG Image Two', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'bg_image3',
			[
				'label' => __( 'BG Image Three', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'bg_image4',
			[
				'label' => __( 'BG Image Four', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'bg_image5',
			[
				'label' => __( 'BG Image Five', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
						'name' => 'sub_title',
						'label' => esc_html__('Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'title',
						'label' => esc_html__('Title', 'educamb'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'text',
						'label' => esc_html__('Text', 'educamb'),
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
    <section class="main-slider main-slider--style8">
        <div class="slider-box">
            <div class="main-slider-style8-outer-content">
                <?php if($settings['bg_image']['id'] || $settings['bg_image2']['id']) {?>
                <div class="top-img-box">
                    <div class="parallax-scene parallax-scene-1">
                        <div data-depth="0.20" class="parallax-layer">
                            <ul>
                                <li class="wow slideInDown" data-wow-delay="100ms" data-wow-duration="3500ms">
                                    <div class="left-img-box">
                                        <img src="<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                                    </div>
                                </li>
                                <li class="wow slideInRight" data-wow-delay="100ms" data-wow-duration="3500ms">
                                    <div class="right-img-box">
                                        <img src="<?php echo esc_url(wp_get_attachment_url($settings['bg_image2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php } ?>
				<?php if($settings['bg_image3']['id']) {?>
                <div class="bottom-img-box">
                    <img src="<?php echo esc_url(wp_get_attachment_url($settings['bg_image3']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                </div>
                <?php } ?>
            </div>
            <?php if($settings['bg_image4']['id']) {?>
            <div class="main-slider--style8-shape-1 wow slideInRight" data-wow-delay="100ms"
                data-wow-duration="3500ms">
                <img class="float-bob-x" src="<?php echo esc_url(wp_get_attachment_url($settings['bg_image4']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
            </div>
            <?php } ?>
			<?php if($settings['bg_image5']['id']) {?>
            <div class="main-slider--style8-shape-2 rotate-me-2">
                <img class="zoom-fade" src="<?php echo esc_url(wp_get_attachment_url($settings['bg_image5']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
            </div>
            <?php } ?>
            <!-- Banner Carousel -->
            <div class="banner-carousel owl-theme owl-carousel">
				<?php foreach($settings['slides'] as $key => $item): ?>
                <!-- Slide -->
                <div class="slide">
                    <div class="auto-container">
                        <div class="content">
                            <?php if($item['sub_title']) { ?>
                            <div class="sub-title">
                                <h3><?php echo wp_kses($item['sub_title'], true); ?></h3>
                            </div>
                            <?php } ?>
                            <?php if($item['title']) { ?>
                            <div class="big-title">
                                <h2>
                                    <?php echo wp_kses($item['title'], true); ?>
                                </h2>
                            </div>
                            <?php } ?>
                            <?php if($item['text']) { ?>
                            <div class="text">
                                <p><?php echo wp_kses($item['text'], true); ?></p>
                            </div>
                            <?php } ?>
                            <?php if($item['btn_title']) { ?>
                            <div class="btns-box">
                                <a class="btn-one" href="<?php echo esc_url($item['btn_link']['url']); ?>">
                                    <span class="txt">
                                        <?php echo wp_kses($item['btn_title'], true); ?>
                                    </span>
                                </a>
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
