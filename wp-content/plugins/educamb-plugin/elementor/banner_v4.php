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
class Banner_V4 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_banner_v4';
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
        return esc_html__( 'Banner V4', 'educamb' );
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
            'banner_v4',
            [
                'label' => esc_html__( 'Banner V4', 'educamb' ),
            ]
        );
		$this->add_control(
			'bg_title',
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
			'show_pattern',
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
			'sub_title',
			[
				'label'       => __( 'Sub Title', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'educamb' ),
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
			'total_learner',
			[
				'label'       => __( 'No. Of Learner', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your No. Of Learner', 'educamb' ),
			]
		);
		$this->add_control(
			'title_learner',
			[
				'label'       => __( 'Learner Title', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Learner Title', 'educamb' ),
			]
		);
		$this->add_control(
			'show_std_box',
			[
				'label'       => __( 'Enable/Disable Student Box', 'educamb' ),
						'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'educamb' ),
				'label_off' => __( 'Hide', 'educamb' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'total_std',
			[
				'label'       => __( 'No. Of Student', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your No. Of Student', 'educamb' ),
			]
		);
		$this->add_control(
			'title_std',
			[
				'label'       => __( 'Student Title', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Student Title', 'educamb' ),
			]
		);
		$this->add_control(
			'icon_img',
			[
				'label' => __( 'Icon Image One', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'icon_img2',
			[
				'label' => __( 'Icon Image Two', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'icon_img3',
			[
				'label' => __( 'Icon Image Three', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'icon_url',
			[
				  'label' => __( 'Icon Url', 'educamb' ),
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
			'box_title',
			[
				'label'       => __( 'Box Title', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Box Title', 'educamb' ),
			]
		);
		$this->add_control(
			'bg_image',
			[
				'label' => __( 'Image One', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'bg_image2',
			[
				'label' => __( 'Image Two', 'educamb' ),
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
	
    <!-- Start Main Slider -->
    <section class="main-slider main-slider--style4">
        <div class="slider-box">
            <!-- Banner Carousel -->
            <div class="banner-carousel owl-theme owl-carousel">

                <!-- Slide -->
                <div class="slide">
                    <div class="background-color-layer"></div>
                    <?php if($settings['bg_title']) { ?><div class="big-title-bottom float-bob-x"><?php echo wp_kses($settings['bg_title'], true);?></div><?php } ?>
                    <?php if($settings['show_pattern']) { ?>
                    <div class="parallax-scene parallax-scene-1">
                        <div data-depth="0.20" class="parallax-layer">
                            <div class="slider-style4-shape1">
                                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/instructor/shape/instructor-shape-1.png" alt="<?php esc_attr_e('Awesome Image', 'educamb');?>">
                            </div>
                        </div>
                    </div>
                    <div class="slider-style4-shape2 wow slideInLeft" data-wow-delay="1500ms"
                        data-wow-duration="5500ms">
                        <img class="rotate-me-2" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/instructor/shape/instructor-shape-2.png" alt="<?php esc_attr_e('Awesome Image', 'educamb');?>">
                    </div>
                    <div class="slider-style4-shape3 wow slideInLeft" data-wow-delay="1500ms"
                        data-wow-duration="4500ms">
                        <img class="float-bob" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/instructor/shape/instructor-shape-3.png" alt="<?php esc_attr_e('Awesome Image', 'educamb');?>">
                    </div>
                    <div class="slider-style4-shape4 wow slideInDown" data-wow-delay="500ms"
                        data-wow-duration="4500ms">
                        <img class="rotate-me-2" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/instructor/shape/instructor-shape-2.png" alt="<?php esc_attr_e('Awesome Image', 'educamb');?>">
                    </div>
                    <div class="slider-style4-shape5 wow zoomIn" data-wow-delay="100ms" data-wow-duration="3500ms">
                        <img class="zoominout" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/instructor/shape/instructor-shape-2.png" alt="<?php esc_attr_e('Awesome Image', 'educamb');?>">
                    </div>
                    <div class="slider-style4-shape6">
                        <img class="zoominout-2 " src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/instructor/shape/instructor-shape-2.png" alt="<?php esc_attr_e('Awesome Image', 'educamb');?>">
                    </div>
                    <div class="slider-style4-shape7">
                        <img class="zoominout-2" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/instructor/shape/instructor-shape-2.png" alt="<?php esc_attr_e('Awesome Image', 'educamb');?>">
                    </div>
                    <div class="slider-style4-shape8 wow slideInRight" data-wow-delay="500ms"
                        data-wow-duration="4500ms">
                        <img class="float-bob-y" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/instructor/shape/instructor-shape-4.png" alt="<?php esc_attr_e('Awesome Image', 'educamb');?>">
                    </div>
					<?php } ?>
                    <div class="auto-container">
                        <div class="content">
                            <?php if($settings['sub_title']) { ?>
                            <div class="sub-title1">
                                <h5><?php echo wp_kses($settings['sub_title'], true);?></h5>
                            </div>
                            <?php } ?>
                            <?php if($settings['title']) { ?>
                            <div class="big-title">
                                <h2><?php echo wp_kses($settings['title'], true);?></h2>
                            </div>
                            <?php } ?>
                            <?php if($settings['text']) { ?>
                            <div class="text">
                                <p><?php echo wp_kses($settings['text'], true);?></p>
                            </div>
                            <?php } ?>
                            <?php if($settings['btn_title']) { ?>
                            <div class="btns-box">
                                <a class="btn-one btn-one--style5" href="<?php echo esc_url($settings['btn_link']['url']); ?>">
                                    <span class="txt">
                                        <i class="icon-right-arrow-1"></i>
                                        <?php echo wp_kses($settings['btn_title'], true);?>
                                    </span>
                                </a>
                            </div>
                            <?php } ?>
                            <?php if($settings['total_learner'] || $settings['title_learner']) { ?>
                            <div class="active-leaners">
                                <div class="inner">
                                    <div class="icon">
                                        <span class="flaticon-student"></span>
                                    </div>
                                    <div class="inner-text">
                                        <h3><?php echo wp_kses($settings['total_learner'], true);?></h3>
                                        <h5><?php echo wp_kses($settings['title_learner'], true);?></h5>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if($settings['show_std_box']) { ?>
                            <div class="total-students">
                                <?php if($settings['title_std'] || $settings['total_std']) { ?>
                                <div class="icon">
                                    <span class="flaticon-add-group"></span>
                                </div>
                                <h4><?php echo wp_kses($settings['title_std'], true);?></h4>
                                <h3><?php echo wp_kses($settings['total_std'], true);?></h3>
                                <?php } ?>
                                <ul>
                                    <?php if($settings['icon_img']['id']){ ?>
                                    <li>
                                        <div class="img-box">
                                            <img src="<?php echo esc_url(wp_get_attachment_url($settings['icon_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                                        </div>
                                    </li>
                                    <?php } ?>
                            		<?php if($settings['icon_img2']['id']){ ?>
                                    <li>
                                        <div class="img-box">
                                            <img src="<?php echo esc_url(wp_get_attachment_url($settings['icon_img2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                                        </div>
                                    </li>
                                    <?php } ?>
                            		<?php if($settings['icon_img3']['id']){ ?>
                                    <li>
                                        <div class="img-box">
                                            <img src="<?php echo esc_url(wp_get_attachment_url($settings['icon_img3']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                                        </div>
                                    </li>
                                    <?php } ?>
                            		<?php if($settings['icon_url']['url']){ ?>
                                    <li>
                                        <div class="icon-box">
                                            <a href="<?php echo esc_url($settings['icon_url']['url']); ?>">
                                                <span class="flaticon-plus-sign"></span>
                                            </a>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <?php } ?>
                            <?php if($settings['box_title']) { ?>
                            <div class="certification-box">
                                <div class="icon">
                                    <span class="flaticon-contract"></span>
                                </div>
                                <h3><?php echo wp_kses($settings['box_title'], true);?></h3>
                            </div>
                            <?php } ?>
                            <div class="big-title-top">career</div>
                            <?php if($settings['bg_image']['id']){ ?>
                            <div class="main-img-box">
                                <img src="<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                            </div>
                            <?php } ?>
                            <?php if($settings['bg_image2']['id']){ ?>
                            <div class="main-img-box-bg"
                                style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image2']['id'])); ?>);">
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Main Slider -->
    
    <?php
    }
}
