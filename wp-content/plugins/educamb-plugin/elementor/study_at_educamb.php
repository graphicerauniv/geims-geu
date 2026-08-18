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
class Study_At_Educamb extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_study_at_educamb';
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
        return esc_html__( 'Study At Educamb', 'educamb' );
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
            'study_at_educamb',
            [
                'label' => esc_html__( 'Study At Educamb', 'educamb' ),
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
			'title',
			[
				'label'       => __( 'Title', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
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
		  'features', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						
					],
				'fields' => 
				[
					[
						'name' => 'client_image',
						'label' => esc_html__('Image', 'educamb'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'icons',
						'label' => esc_html__('Enter The icons', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::SELECT2,
						'options'  => get_fontawesome_icons(),
					],
					[
						'name' => 'block_btn_title',
						'label' => esc_html__('Button Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'block_btn_link',
						'label' => __( 'Button Link', 'educamb' ),
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
        $allowed_tags = wp_kses_allowed_html('post');
    ?>
	
    <!--Start High School Study Educamb Area-->
    <section class="high-school-study-educamb-area">
        <div class="high-school-study-educamb-area-bg" <?php if($settings['bg_image']['id']){ ?>
            style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);"<?php } ?>></div>
        <div class="container">
            <div class="sec-title text-center">
                <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                <?php if($settings['text']) { ?>
                <div class="sub-title">
                    <p><?php echo wp_kses($settings['text'], true);?></p>
                </div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="theme_carousel owl-theme owl-carousel owl-dot-style1" data-options='{
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
                                "768" :{ "items" : "2" }, 
                                "1200":{ "items" : "4" }, 
                                "1800":{ "items" : "4" }
                            }
                        }'>
                        
						<?php foreach($settings['features'] as $key => $item): ?>
                        <!--Start Single High School Study Educamb Box-->
                        <div class="single-high-school-study-educamb-box">
                            <div class="img-box">
                                <div class="inner">
                                    <?php if($item['client_image']['id']) { ?><img src="<?php echo esc_url(wp_get_attachment_url($item['client_image']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>"><?php } ?>
                                    <div class="overlay-icon">
                                        <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                                    </div>
                                    <?php if($item['block_btn_link']['url']) { ?>
                                    <div class="btn-box">
                                        <a href="<?php echo esc_url($item['block_btn_link']['url']); ?>">
                                            <span class="icon-right-arrow-1"></span>
                                        </a>
                                    </div>
                                    <?php } ?>
                                </div>
                                <?php if($item['block_btn_title']) { ?>
                                <div class="title-box">
                                    <h3><a href="<?php echo esc_url($item['block_btn_link']['url']); ?>"><?php echo wp_kses($item['block_btn_title'], true);?></a></h3>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!--End Single High School Study Educamb Box-->
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End High School Study Educamb Area-->   
             
        <?php
    }
}
