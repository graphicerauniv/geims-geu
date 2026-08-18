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
class Ready_To_Make extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_ready_to_make';
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
        return esc_html__( 'Ready To Make', 'educamb' );
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
            'ready_to_make',
            [
                'label' => esc_html__( 'Ready To Make', 'educamb' ),
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
	
    <!--Start Working Process Area-->
    <section class="<?php if($settings['style_two'] == 'two') echo 'working-process-area'; else echo 'working-process-area working-process-area--style2'; ?>">
        <?php if($settings['bg_image']['id']){ ?>
        <div class="working-process-area__bg"
            style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);">
        </div>
        <?php } ?>
        <div class="auto-container">
            <div class="<?php if($settings['style_two'] == 'two') echo 'working-process-area__inner'; else echo 'working-process-area__inner working-process-area__inner--style2'; ?>">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="working-process-title">
                            <div class="sec-title">
                                <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                                <?php if($settings['text']) { ?>
                                <div class="sub-title">
                                    <p><?php echo wp_kses($settings['text'], true);?></p>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8">
                        <div class="working-process-content clearfix">
                            <div class="theme_carousel working-process-carousel owl-theme owl-carousel owl-nav-style-one owl-dot-style1"
                                data-options='{
                                            "loop": false, 
                                            "margin": 0, 
                                            "autoheight":true, 
                                            "lazyload":true, 
                                            "nav": true, 
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
								
                                <?php foreach($settings['features'] as $key => $item): ?>
                                <!--Start Single Working Process Box-->
                                <div class="single-working-process-box">
                                    <div class="top">
                                        <div class="icon">
                                            <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                                            <div class="round-box"></div>
                                        </div>
                                        <div class="counting"></div>
                                    </div>
                                    <div class="text">
                                        <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                        <p><?php echo wp_kses($item['block_text'], true);?></p>
                                    </div>
                                </div>
                                <!--End Single Working Process Box-->
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--End Working Process Area-->       
             
        <?php
    }
}
