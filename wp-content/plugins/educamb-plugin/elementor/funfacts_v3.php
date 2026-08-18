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
class Funfacts_V3 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_funfacts_v3';
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
        return esc_html__( 'Funfacts V3', 'educamb' );
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
            'funfacts_v3',
            [
                'label' => esc_html__( 'Funfacts V3', 'educamb' ),
            ]
        );
		$this->add_control(
			'bg_text',
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
			'show_pattern_images',
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
		  'funfact', 
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
						'name' => 'counter_start',
						'label' => esc_html__('Count Start Value', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'counter_stop',
						'label' => esc_html__('Count Stop Value', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'alphabet_letter',
						'label' => esc_html__('Alphabet Letter', 'educamb'),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
					],
					[
						'name' => 'block_title',
						'label' => esc_html__('Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
					],
					[
						'name' => 'icons',
						'label' => esc_html__('Enter The icons', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::SELECT2,
						'options'  => get_fontawesome_icons(),
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
	
    <!--Start Fact Counter Style4 Area-->
    <section class="fact-counter-style4-area">
        <?php if($settings['bg_text']) { ?><div class="big-title-box paroller-2"><?php echo wp_kses($settings['bg_text'], true);?></div><?php } ?>
        <?php if($settings['show_pattern_images']) { ?>
        <div class="fact-counter-style4-area-shape1">
            <img class="float-bob" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/instructor/shape/fact-counter-style4-area-shape-1.png" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
        </div>
        <div class="fact-counter-style4-area-shape2">
            <img class="float-bob-y" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/instructor/shape/fact-counter-style4-area-shape-2.png"
                alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
        </div>
        <?php } ?>
        <div class="container">
            <ul class="row fact-counter_box-style2">
                <?php  foreach($settings['funfact'] as $key => $item): ?>
                <!--Start Single Fact Counter-->
                <li class="col-xl-3 col-lg-6 col-md-6 text-center single-fact-counter-style4 wow slideInUp"
                    data-wow-delay="00ms" data-wow-duration="1500ms">
                    <?php if($item['icons']) { ?>
                    <div class="icon">
                        <div class="icon-bg"
                            style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/instructor/shape/instructor-shape-5.png);">
                        </div>
                        <div class="round-shape">
                            <img class="zoom-fade" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/instructor/shape/instructor-shape-6.png"
                                alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                        </div>
                        <div class="inner">
                            <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="outer-box">
                        <div class="count-outer count-box">
                            <span class="count-text" data-speed="3000" data-stop="<?php echo esc_attr($item['counter_stop']);?>"><?php echo esc_attr($item['counter_start']);?></span><?php echo esc_attr($item['alphabet_letter']);?>
                        </div>
                        <div class="title">
                            <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                        </div>
                    </div>
                </li>
                <!--End Single Fact Counter-->
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
    <!--End Fact Counter Style4 Area-->
                 
        <?php
    }
}
