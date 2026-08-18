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
class Styles_Of_Photography_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_styles_of_photography_v2';
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
        return esc_html__( 'Styles Of Photography V2', 'educamb' );
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
            'styles_of_photography_v2',
            [
                'label' => esc_html__( 'Styles Of Photography V2', 'educamb' ),
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
				'placeholder' => __( 'Enter your title', 'educamb' ),
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub title', 'educamb' ),
			]
		);
		$this->add_control(
		  'slides', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
				[
					
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
    ?>
	
    <!--Start Choose Style1 Area-->
    <section class="choose-style1-area">
        <div class="container">
            <div class="sec-title">
                <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2> <?php } ?>
                <?php if($settings['subtitle']) { ?>
                <div class="sub-title">
                    <p><?php echo wp_kses($settings['subtitle'], true);?></p>
                </div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="choose-style1-content">
                        <div class="theme_carousel choose-style1-carousel owl-theme owl-carousel owl-nav-style-one"
                            data-options='{
                                "loop": true, 
                                "margin": 30, 
                                "autoheight":true, 
                                "lazyload":true, 
                                "nav": true, 
                                "dots": false, 
                                "autoplay": true, 
                                "autoplayTimeout": 5000, 
                                "smartSpeed": 500, 
                                "navText": ["<span class=\"left icon-right-arrow-1\"></span>",
                                "<span class=\"right icon-right-arrow-1\"></span>"], 
                                "responsive":{ 
                                "0" :{ "items": "1" }, 
                                "600" :{ "items" : "1" }, 
                                "768" :{ "items" : "2" }, 
                                "992":{ "items" : "3" }, 
                                "1200":{ "items" : "4" }
                            }
                            }'>
							
                            <?php  foreach($settings['slides'] as $key => $item): ?>
                            <!--Start Single Choose Style1-->
                            <div class="single-choose-style1">
                                <div class="single-choose-style1__inner">
                                    <div class="icon">
                                        <span class="icon-tick">
                                            <span class="path1"></span><span class="path2"></span><span
                                                class="path3"></span><span class="path4"></span><span
                                                class="path5"></span>
                                        </span>
                                    </div>
                                    <div class="inner-title">
                                        <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                    </div>
                                    <div class="text">
                                        <p><?php echo wp_kses($item['block_text'], true);?></p>
                                    </div>
                                    <?php if($item['block_btn_title']) { ?>
                                    <div class="btns-box">
                                        <a class="btn-one btn-one--style2" href="<?php echo esc_url($item['block_btn_link']['url']); ?>">
                                            <span class="txt"><?php echo wp_kses($item['block_btn_title'], true);?></span>
                                        </a>
                                    </div>
                                    <?php } ?>
                                    <div class="single-choose-style1__overlay"
                                        style="background-image: url(<?php echo esc_url(wp_get_attachment_url($item['image']['id'])); ?>);">
                                        <div class="btns-box">
                                            <a class="btn-one" href="<?php echo esc_url($item['block_btn_link']['url']); ?>">
                                                <span class="txt"><?php echo wp_kses($item['block_btn_title'], true);?></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Single Choose Style1-->
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Choose Style1 Area-->  
        
        <?php
    }
}
