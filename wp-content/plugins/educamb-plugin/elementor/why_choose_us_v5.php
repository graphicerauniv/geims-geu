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
class Why_Choose_Us_V5 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_why_choose_us_v5';
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
        return esc_html__( 'Why Choose Us V5', 'educamb' );
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
            'why_choose_us_v5',
            [
                'label' => esc_html__( 'Why Choose Us V5', 'educamb' ),
            ]
        );
		$this->add_control(
			'sub_title',
			[
				'label'       => __( 'Sub Title', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your sub title', 'educamb' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'educamb' ),
			]
		);
		$this->add_control(
		  'features', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Item1', 'educamb')],
						['block_title' => esc_html__('Item2', 'educamb')],
						['block_title' => esc_html__('Item3', 'educamb')],
						['block_title' => esc_html__('Item4', 'educamb')],
						['block_title' => esc_html__('Item5', 'educamb')],
						['block_title' => esc_html__('Item6', 'educamb')],
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
	
    <!--Start Choose Style4 area -->
    <section class="choose-style4-area">
        <div class="container">
            <div class="sec-title-style4 center text-center">
                <?php if($settings['sub_title']) { ?>
                <div class="sub-title">
                    <div class="decor"></div>
                    <h5><?php echo wp_kses($settings['sub_title'], true);?></h5>
                </div>
                <?php } ?>
                <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
            </div>
            <div class="row">
                <?php foreach($settings['features'] as $key => $item): ?>
                <!--Start Single Choose Style4-->
                <div class="col-xl-4">
                    <div class="<?php if($item['style_two'] == 'three') echo 'choose-style4__single bg2'; elseif($item['style_two'] == 'two') echo 'choose-style4__single style2'; else echo 'choose-style4__single bg1'; ?>">
                        <?php if($item['icons']) { ?>
                        <div class="icon">
                            <div class="icon-bg"
                                style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/instructor/shape/instructor-shape-5.png);">
                            </div>
                            <div class="round-shape">
                                <img class="zoom-fade" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/instructor/shape/instructor-shape-6.png" alt="<?php esc_attr_e('Awesome Image', 'educamb');?>">
                            </div>
                            <div class="inner">
                                <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                            </div>
                        </div>
						<?php } ?>
                        <div class="content-box text-center">
                            <h3><a href="<?php echo esc_url($item['block_btn_link']['url']); ?>"><?php echo wp_kses($item['block_title'], true);?></a></h3>
                            <p><?php echo wp_kses($item['block_text'], true);?></p>
                        </div>
                    </div>
                </div>
                <!--End Single Choose Style4-->
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!--End Choose Style4 area -->
        
                         
        <?php
    }
}
