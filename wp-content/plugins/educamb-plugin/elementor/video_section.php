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
class Video_Section extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_video_section';
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
        return esc_html__( 'Video Section', 'educamb' );
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
            'video_section',
            [
                'label' => esc_html__( 'Video Section', 'educamb' ),
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
				'label_block' => true,
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
		  'videos', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['video_link' => esc_html__('Item1', 'educamb')],
						['video_link' => esc_html__('Item2', 'educamb')],
					],
				'fields' => 
				[
					[
						'name' => 'video_image',
						'label' => __( 'Video Image', 'educamb' ),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'video_link',
						'label' => __( 'Video Url', 'educamb' ),
						'type' => Controls_Manager::URL,
						'label_block' => true,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => [
						'url' => '',
							'is_external' => true,
							'nofollow' => true,
						],
					],
				],
				'title_field' => '{{video_link}}',
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
	
    <!--Start Video Gallery Style3 Area-->
    <section class="video-gallery-style3-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="video-gallery-style3__content">
                        <div class="row">

                            <div class="col-xl-6">
                                <div class="video-gallery-style3-title-box">
                                    <?php if($settings['sub_title'] || $settings['title']) { ?>
                                    <div class="sec-title-style2">
                                        <div class="sub-title">
                                            <h5><?php echo wp_kses($settings['sub_title'], true);?></h5>
                                        </div>
                                        <h2><?php echo wp_kses($settings['title'], true);?></h2>
                                    </div>
                                    <?php } ?>
                                    <div class="inner-content">
                                        <?php if($settings['text']) { ?>
                                        <div class="text">
                                            <p><?php echo wp_kses($settings['text'], true);?></p>
                                        </div>
                                        <?php } ?>
                                        <div class="bottom-box">
                                            <?php if($settings['btn_title']){ ?>
                                            <div class="btn-box">
                                                <a href="<?php echo esc_url($settings['btn_link']['url']); ?>"><?php echo wp_kses($settings['btn_title'], true); ?></a>
                                            </div>
                                            <?php } ?>
                                            <div class="style2-custom-nav">
                                                <button class="owl-nav-prev">
                                                    <span class="icon-right-arrow-1"></span>
                                                </button>
                                                <button class="owl-nav-next">
                                                    <span class="icon-right-arrow-1"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="video-gallery-style3__content-right">
                                    <div class="theme_carousel video-gallery-style2-carousel owl-theme owl-carousel thm-owl__carousel--custom-nav rtl-carousel"
                                        data-owl-nav-prev=".owl-nav-prev" data-owl-nav-next=".owl-nav-next"
                                        data-options='{
                                            "loop": true, 
                                            "margin": 30, 
                                            "autoheight":true, 
                                            "lazyload":true, 
                                            "nav": false, 
                                            "dots": false, 
                                            "autoplay": true, 
                                            "autoplayTimeout": 5000, 
                                            "smartSpeed": 500, 
                                            "navText": ["<span class=\"left icon-next\"></span>",
                                            "<span class=\"right icon-next\"></span>"], 
                                            "responsive":{ 
                                            "0" :{ "items": "1" }, 
                                            "600" :{ "items" : "1" }, 
                                            "768" :{ "items" : "1" }, 
                                            "992":{ "items" : "1" }, 
                                            "1200":{ "items" : "1" }
                                        }
                                    }'>
										<?php foreach($settings['videos'] as $key => $item): ?>
                                        <!--Start Single Video Gallery Box Style3-->
                                        <div class="single-video-gallery-box-style3">
                                            <div class="single-video-gallery-box-img-bg"
                                                style="background-image: url(<?php echo esc_url(wp_get_attachment_url($item['video_image']['id'])); ?>);">
                                            </div>
                                            <div class="icon wow zoomIn animated" data-wow-delay="300ms"
                                                data-wow-duration="1500ms">
                                                <div class="inner">
                                                    <a class="video-popup" title="Video Gallery"
                                                        href="<?php echo esc_url($item['video_link']['url']); ?>">
                                                        <span class="icon-play-button-2"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End Single Video Gallery Box Style3-->
										<?php endforeach; ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Video Gallery Style3 Area-->      
                 
        <?php
    }
}
