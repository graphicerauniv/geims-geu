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
class Video_Section_V6 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_video_section_v6';
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
        return esc_html__( 'Video Section V6', 'educamb' );
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
            'video_section_v6',
            [
                'label' => esc_html__( 'Video Section V6', 'educamb' ),
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
					'two' => esc_html__( 'Choose Style Two', 'educamb' ),
				),
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
			'curve_title',
			[
				'label'       => __( 'Curve Title', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'educamb' ),
			]
		);
		$this->add_control(
			'curve_title2',
			[
				'label'       => __( 'Curve Title 2', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'educamb' ),
			]
		);
		$this->add_control(
			'logo_image',
			[
				'label' => __( 'Logo Image', 'educamb' ),
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
		$this->add_control(
           'features', 
		   [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Item 1', 'educamb')],
						['block_title' => esc_html__('Item 2', 'educamb')]
					],
				'fields' => 
				[
					[
						'name' => 'icons',
						'label' => esc_html__('Enter The icons', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::SELECT2,
						'options'  => get_fontawesome_icons(),
					],
					[
						'name' => 'block_title',
						'label' => esc_html__('Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
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
	
    <!--Start Video Gallery Style2 Area-->
    <section class="<?php if($settings['style_two'] == 'two') echo 'video-gallery-style2-area video-gallery-style2-area--style3'; else echo 'video-gallery-style2-area'; ?>">
        <div class="video-gallery-style2-area__bg" <?php if($settings['bg_image']['id']){ ?>
            style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);"<?php } ?>>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="video-gallery-style2-content">
                        <div class="logo-box">
                            <?php if($settings['curve_title']){ ?><div class="curved-circle"><?php echo wp_kses($settings['curve_title'], true);?></div><?php } ?>
                            <?php if($settings['curve_title2']){ ?><div class="curved-circle-2"><?php echo wp_kses($settings['curve_title2'], true);?></div><?php } ?>
                            <?php if($settings['logo_image']['id']){ ?>
                            <div class="inner-logo">
                                <img src="<?php echo esc_url(wp_get_attachment_url($settings['logo_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                            </div>
                            <?php } ?>
                        </div>
                        <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                        <?php if($settings['video_link']['url']) { ?>
                        <div class="video-holder-box">
                            <a class="video-popup wow zoomIn" data-wow-delay="300ms" data-wow-duration="1500ms"
                                title="Video Gallery" href="<?php echo esc_url($settings['video_link']['url']); ?>">
                                <span class="icon-play-button"></span>
                            </a>
                        </div>
                        <?php } ?>
                        <div class="video-gallery-style2-box">
                            <ul>
                                <?php foreach($settings['features'] as $key => $item): ?>
                                <li class="video-gallery-style2-single-box">
                                    <div class="top">
                                        <div class="icon">
                                            <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                                        </div>
                                        <div class="text">
                                            <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                            <p><?php echo wp_kses($item['block_text'], true);?></p>
                                        </div>
                                    </div>
                                    <div class="button-box">
                                        <a class="btn-one <?php if($settings['style_two'] == 'two') echo 'btn-one-style7'; else echo ''; ?>" href="<?php echo esc_url($item['block_btn_link']['url']); ?>"><span class="txt"><?php echo wp_kses($item['block_btn_title'], true);?></span></a>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Video Gallery Style2 Area--> 
                 
        <?php
    }
}
