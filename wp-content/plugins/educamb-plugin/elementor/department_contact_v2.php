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
class Department_Contact_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_department_contact_v2';
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
        return esc_html__( 'Department Contact V2', 'educamb' );
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
            'department_contact_v2',
            [
                'label' => esc_html__( 'Department Contact V2', 'educamb' ),
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
		    'slides', 
		    [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Admission', 'educamb')],
						['block_title' => esc_html__('Examination', 'educamb')],
						['block_title' => esc_html__('Finance Off', 'educamb')],
						['block_title' => esc_html__('Media', 'educamb')],
						['block_title' => esc_html__('Library', 'educamb')],
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
						'name' => 'block_title_link',
						'label' => __( 'External Url', 'educamb' ),
						  'type' => Controls_Manager::URL,
						  'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						  'show_external' => true,
						  'default' => [
							'url' => '',
							'is_external' => true,
							'nofollow' => true,
						  ],
					],
					[
						'name' => 'block_phone',
						'label' => esc_html__('Phone Number', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'block_email',
						'label' => esc_html__('Email Address', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
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
	
    <!--Start Department Style1 Area-->
    <section class="department-style1-area" style="background-color: #f1f4fb;">
        <div class="container">
            <?php if($settings['title'] || $settings['text']){ ?>
            <div class="sec-title text-center">
                <?php if($settings['title']){ ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
				<?php if($settings['text']){ ?>
                <div class="sub-title">
                    <p><?php echo wp_kses($settings['text'], true);?></p>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="department-style1-inner">
                        <div class="theme_carousel department-carousel owl-theme owl-carousel owl-dot-style1"
                            data-options='{
                                "loop": false, 
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
                                "600" :{ "items" : "2" }, 
                                "768" :{ "items" : "3" }, 
                                "992":{ "items" : "4" }, 
                                "1200":{ "items" : "5" }
                            }
                            }'>
							
                            <?php foreach($settings['slides'] as $key => $item): ?>
                            <!--Start Department Style1 Single-->
                            <div class="department-style1-single">
                                <div class="top-content">
                                    <div class="icon">
                                        <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                                    </div>
                                    <h3><a href="<?php echo esc_url($item['block_title_link']['url']); ?>"><?php echo wp_kses($item['block_title'], true);?></a></h3>
                                </div>
                                <div class="bottom-content">
                                    <div class="phone">
                                        <a href="tel:<?php echo esc_attr($item['block_phone']); ?>"><?php echo wp_kses($item['block_phone'], true);?></a>
                                    </div>
                                    <?php echo wp_kses($item['block_email'], true); ?>
                                </div>
                            </div>
                            <!--End Department Style1 Single-->
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Department Style1 Area-->       
             
        <?php
    }
}
