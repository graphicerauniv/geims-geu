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
class Banner_V6 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_banner_v6';
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
        return esc_html__( 'Banner V6', 'educamb' );
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
            'banner_v6',
            [
                'label' => esc_html__( 'Banner V6', 'educamb' ),
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
			'sub_title',
			[
				'label'       => __( 'Sub Title', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub Title', 'educamb' ),
			]
		);
		$this->add_control(
            'slides', 
			[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Item1', 'educamb')],
						['block_title' => esc_html__('Item2', 'educamb')],
						['block_title' => esc_html__('Item3', 'educamb')],
						['block_title' => esc_html__('Item4', 'educamb')]
					],
				'fields' => 
				[
					[
						'name' => 'icons',
						'label' => esc_html__('Select Icon', 'metlife'),
						'label_block' => true,
						'type' => Controls_Manager::SELECT2,
						'options' => get_fontawesome_icons(),
					],
					[
						'name' => 'block_title',
						'label' => esc_html__('Title', 'educamb'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'educamb')
					],
				],
				'title_field' => '{{block_title}}',
			 ]
        );
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'educamb' ),
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
		$this->add_control(
			'video_text',
			[
				'label'       => __( 'Video Title', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'educamb' ),
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
    <section class="main-slider main-slider--style6">
        <div class="slider-box">
			<?php if($settings['bg_image']['id']) { ?>
            <div class="main-img-box">
                <img src="<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
            </div>
            <?php } ?>
            <div class="background-color-layer"></div>
            <div class="auto-container">
                <div class="content">
                    <?php if($settings['sub_title']) { ?>
                    <div class="sub-title1">
                        <h3><?php echo wp_kses($settings['sub_title'], true);?></h3>
                    </div>
                    <?php } ?>
                    <div class="meta-box">
                        <ul>
                            <?php foreach($settings['slides'] as $key => $item): ?>
                            <?php if($item['block_title']) { ?>
                            <li>
                                <span class="<?php echo esc_attr(str_replace( "icon ",  "", $item['icons']));?>"></span>
                                <h5><?php echo wp_kses($item['block_title'], true); ?></h5>
                            </li>
                            <?php } ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php if($settings['title']) { ?>
                    <div class="big-title-6">
                        <h2><?php echo wp_kses($settings['title'], true);?></h2>
                    </div>
                    <?php } ?>
                    <?php if($settings['btn_title']) { ?>
                    <div class="btns-box-6">
                        <a class="btn-one btn-one--style6" href="<?php echo esc_url($settings['btn_link']['url']); ?>">
                            <span class="txt">
                                <?php echo wp_kses($settings['btn_title'], true);?>
                            </span>
                        </a>
                    </div>
                    <?php } ?>
                    <?php if($settings['video_text'] || $settings['video_link']['url']) { ?>
                    <div class="video-box">
                        <div class="curved-circle-3"><?php echo wp_kses($settings['video_text'], true);?></div>
                        <a class="video-popup wow zoomIn" data-wow-delay="300ms" data-wow-duration="1500ms"
                            title="Video Gallery" href="<?php echo esc_url($settings['video_link']['url']); ?>">
                            <span class="icon-play-button"></span>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </section>
    <!-- End Main Slider -->        
        
        <?php
    }
}
