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
class Our_Feature_V11 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_our_feature_v11';
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
        return esc_html__( 'Our Feature V11', 'educamb' );
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
            'our_feature_v11',
            [
                'label' => esc_html__( 'Our Feature V11', 'educamb' ),
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
		  'features', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Guiter Class', 'educamb')],
						['block_title' => esc_html__('Dance Class', 'educamb')],
						['block_title' => esc_html__('Singing Class', 'educamb')],
						['block_title' => esc_html__('Painting Class', 'educamb')],
						['block_title' => esc_html__('Guiter Class', 'educamb')],
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
						'name' => 'block_btn_link',
						'label' => __( 'Button Link', 'educamb' ),
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
							'one' => esc_html__( 'Choose Style One', 'educamb' ),
							'two' => esc_html__( 'Choose Style Two ', 'educamb' ),
							'three' => esc_html__( 'Choose Style Three ', 'educamb' ),
							'four' => esc_html__( 'Choose Style Four ', 'educamb' ),
						),
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
	
    <!--Start Kindergarten Activities Area-->
    <section class="kindergarten-activities-area">
        <div class="container">
            <div class="sec-title-style2">
                <?php if($settings['sub_title']) { ?>
                <div class="sub-title">
                    <h5><?php echo wp_kses($settings['sub_title'], true);?></h5>
                </div>
                <?php } ?>
                <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="kindergarten-activities-content">
                        <div class="theme_carousel kindergarten-activities-carousel owl-theme owl-carousel owl-nav-style-one"
                            data-options='{
                            "loop": false, 
                            "margin": 30, 
                            "autoheight":true, 
                            "lazyload":true, 
                            "nav": false, 
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

                            <?php foreach($settings['features'] as $key => $item): ?>
                            <!--Start Single Kindergarten Activities Box -->
                            <div class="single-kindergarten-activities-box <?php if($item['style_two'] == 'four') echo 'single-kindergarten-activities-box--style4'; elseif($item['style_two'] == 'three') echo 'single-kindergarten-activities-box--style3'; elseif($item['style_two'] == 'two') echo 'single-kindergarten-activities-box--style2'; else echo ''; ?>">
                                <div class="icon">
                                    <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                                </div>
                                <div class="text">
                                    <h3><a href="<?php echo esc_url($item['block_btn_link']['url']); ?>"><?php echo wp_kses($item['block_title'], true);?></a></h3>
                                    <p><?php echo wp_kses($item['block_text'], true);?></p>
                                </div>
                            </div>
                            <!--End Single Kindergarten Activities Box -->
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--End Kindergarten Activities Area-->       
             
        <?php
    }
}
