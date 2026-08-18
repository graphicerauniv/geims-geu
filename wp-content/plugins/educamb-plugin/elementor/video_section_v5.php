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
class Video_Section_V5 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_video_section_v5';
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
        return esc_html__( 'Video Section V5', 'educamb' );
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
            'video_section_v5',
            [
                'label' => esc_html__( 'Video Section V5', 'educamb' ),
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
						['block_title' => esc_html__('Item4', 'educamb')],
					],
				'fields' => 
				[
					[
						'name' => 'image',
						'label' => __( 'Image', 'educamb' ),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'block_title',
						'label' => esc_html__('Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
					],
					[
						'name' => 'block_btn_link',
						'label' => __( 'External Url', 'eminent' ),
						 'type' => Controls_Manager::URL,
						 'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
					[
						'name' => 'video_link',
						'label' => __( 'Video Url', 'eminent' ),
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
	
    <!--Start Video Gallery Style1 Area-->
    <section class="video-gallery-style1-area">
        <div class="video-gallery-style1-area__bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="theme_carousel video-gallery-carousel owl-theme owl-carousel owl-dot-style1"
                        data-options='{
                                "loop": true, 
                                "margin": 30, 
                                "autoheight":true, 
                                "lazyload":true, 
                                "nav": false, 
                                "dots": true, 
                                "autoplay": true, 
                                "autoplayTimeout": 5000, 
                                "smartSpeed": 500, 
                                "navText": ["<span class=\"left icon-right-arrow-1\"></span>",
                                "<span class=\"right icon-right-arrow-1\"></span>"], 
                                "responsive":{ 
                                "0" :{ "items": "1" }, 
                                "600" :{ "items" : "1" }, 
                                "768" :{ "items" : "1" }, 
                                "992":{ "items" : "2" }, 
                                "1200":{ "items" : "2" }
                            }
                        }'>
						
                        <?php  foreach($settings['slides'] as $key => $item): ?>
                        <!--Start Single Video Gallery Style1-->
                        <div class="single-video-gallery-style1">
                            <div class="top">
                                <?php if($item['block_title']) { ?>
                                <div class="inner-title">
                                    <div class="dot-box"></div>
                                    <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                </div>
                                <?php } ?>
								<?php if($item['block_btn_link']['url']) { ?>
                                <div class="share-button">
                                    <a href="<?php echo esc_url($item['block_btn_link']['url']); ?>">
                                        <span class="icon-share-1"></span>
                                        <p>Share</p>
                                    </a>
                                </div>
                                <?php } ?>
                            </div>
                            <?php if($item['image']['id']) { ?>
                            <div class="img-box">
                                <img src="<?php echo esc_url(wp_get_attachment_url($item['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                            </div>
                            <?php } ?>
                            <div class="bottom">
                                <?php if($item['video_link']['url']) { ?>
                                <div class="play-btn">
                                    <a class="video-popup" title="Video Gallery"
                                        href="<?php echo esc_url($item['video_link']['url']); ?>">
                                        <span class="icon-play"></span>
                                    </a>
                                </div>
                                <?php } ?>
                                <?php if($item['block_btn_link']['url']) { ?>
                                <div class="reload-btn">
                                    <a href="<?php echo esc_url($item['block_btn_link']['url']); ?>">
                                        <span class="icon-rotating-arrow-symbol"></span>
                                    </a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!--End Single Video Gallery Style1-->
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Video Gallery Style1 Area--> 
                 
        <?php
    }
}
