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
class Achivements_Section_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_achivements_section_v2';
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
        return esc_html__( 'Achivements Section V2', 'educamb' );
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
            'achivements_section_v2',
            [
                'label' => esc_html__( 'Achivements Section V2', 'educamb' ),
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
		  'features', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Item 1', 'educamb')],
						['block_title' => esc_html__('Item 2', 'educamb')],
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
						'name' => 'block_title2',
						'label' => esc_html__('Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'block_date',
						'label' => esc_html__('Date', 'educamb'),
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
	
    <!--Start Cooking Achivements Area-->
    <section class="cooking-achivements-area">
        <div class="container">
            <div class="row">

                <div class="col-xl-4">
                    <div class="cooking-achivements-title">
                        <div class="sec-title-style7">
                            <?php if($settings['sub_title']) { ?>
                            <div class="sub-title">
                                <p><?php echo wp_kses($settings['sub_title'], true);?></p>
                                <div class="zigzag left bg-white"></div>
                            </div>
                            <?php } ?>
                            <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="cooking-achivements-content">
                        <ul class="cooking-achivements-items">
                        	<?php foreach($settings['features'] as $key => $item): ?>
                            <li class="cooking-achivements-single-item">
                                <div class="icon">
                                    <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                                </div>
                                <div class="text">
                                    <h5><?php echo wp_kses($item['block_title'], true);?></h5>
                                    <h3>
                                        <a href="<?php echo esc_url($item['block_btn_link']['url']); ?>"><?php echo wp_kses($item['block_title2'], true);?></a>
                                    </h3>
                                    <p><?php echo wp_kses($item['block_date'], true);?></p>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Cooking Achivements Area-->     
             
        <?php
    }
}
