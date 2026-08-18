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
class Funfacts_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_funfacts_v2';
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
        return esc_html__( 'Funfacts V2', 'educamb' );
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
            'funfacts_v2',
            [
                'label' => esc_html__( 'Funfacts V2', 'educamb' ),
            ]
        );
		$this->add_control(
			'pattern_image',
			[
				'label' => __( 'Pattern Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
				'placeholder' => __( 'Enter your Sub Title', 'educamb' ),
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
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'counter_stop',
						'label' => esc_html__('Count Stop Value', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'educamb')
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
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'icons',
						'label' => esc_html__('Enter The icons', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::SELECT2,
						'options'  => get_fontawesome_icons(),
					],
					[
						'name' => 'style_two',
						'label'   => esc_html__( 'Choose Different Style', 'educamb' ),
						'label_block' => true,
						'type'    => Controls_Manager::SELECT,
						'default' => 'one',
						'options' => array(
							'one' => esc_html__( 'Choose Style One', 'educamb' ),
							'two' => esc_html__( 'Choose Style Two', 'educamb' ),
							'three' => esc_html__( 'Choose Style Three', 'educamb' ),
							'four' => esc_html__( 'Choose Style Four', 'educamb' ),
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
	
    <!--Start Fact Counter Style2 Area-->
    <section class="fact-counter-style2-area">
        <div class="fact-counter-area-shape" <?php if($settings['pattern_image']['id']){ ?> style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['pattern_image']['id'])); ?>);" <?php } ?>>
        </div>
        <div class="container">
            <?php if($settings['sub_title'] || $settings['title']) {?>
            <div class="sec-title-style2 text-center">
                <?php if($settings['sub_title']) {?>
                <div class="sub-title">
                    <h5><?php echo wp_kses($settings['sub_title'], true);?></h5>
                </div>
                <?php } ?>
				<?php if($settings['title']) {?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
            </div>
            <?php } ?>
            <ul class="row fact-counter_box-style2">
                <?php  foreach($settings['funfact'] as $key => $item): ?>
                <!--Start Single Fact Counter-->
                <li class="col-xl-3 col-lg-6 col-md-6 text-center single-fact-counter-style2 <?php if($item['style_two'] == 'four') echo 'style4'; elseif($item['style_two'] == 'three') echo 'style3'; elseif($item['style_two'] == 'two') echo 'style2'; else echo ''; ?> wow slideInUp"
                    data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="icon">
                        <div class="inner">
                            <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                        </div>
                    </div>
                    <div class="outer-box">
                        <div class="title">
                            <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                        </div>
                        <div class="count-outer count-box">
                            <span class="count-text" data-speed="3000" data-stop="<?php echo esc_attr($item['counter_stop']);?>"><?php echo esc_attr($item['counter_start']);?></span><?php echo esc_attr($item['alphabet_letter']);?>
                        </div>
                    </div>
                </li>
                <!--End Single Fact Counter-->
                <?php endforeach; ?>

            </ul>
        </div>
    </section>
    <!--End Fact Counter Style2 Area-->
                 
        <?php
    }
}
