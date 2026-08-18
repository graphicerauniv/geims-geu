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
class Funfacts extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_funfacts';
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
        return esc_html__( 'Funfacts', 'educamb' );
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
            'funfacts',
            [
                'label' => esc_html__( 'Funfacts', 'educamb' ),
            ]
        );
		$this->add_control(
			'bg_color',
			[
				'label'       => __( 'BG Color Code', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your BG Color Code', 'educamb' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'educamb' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Title', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'educamb' ),
			]
		);
		$this->add_control(
		  'funfact', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('History Of High Achievers', 'educamb')],
						['block_title' => esc_html__('Total Acres Of The Land', 'educamb')],
						['block_title' => esc_html__('Kilometres Of Bookshelves', 'educamb')],
						['block_title' => esc_html__('Awards & Achivements', 'educamb')],
					],
				'fields' => 
				[
					[
						'name' => 'icons_path',
						'label' => esc_html__('Icon Path', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'educamb')
					],
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
	
    <!--Start Fact Counter Area-->
    <section class="fact-counter-area" <?php if($settings['bg_color']){ ?>style="background-color: <?php echo wp_kses($settings['bg_color'], true);?>;"<?php } ?>>
        
        <div class="container">
            <?php if($settings['title'] || $settings['text']) {?>
            <div class="sec-title text-center">
                <?php if($settings['title']) {?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                <?php if($settings['text']) {?>
                <div class="sub-title">
                    <p><?php echo wp_kses($settings['text'], true);?></p>
                </div>
                <?php } ?>
            </div>
			<?php } ?>
            <div class="row">
                <div class="col-xl-12">
                    <ul class="fact-counter-box">
                        <!--Start Single Fact Counter-->
                        <?php 
							  $count = 0;  
							  foreach($settings['funfact'] as $key => $item): 
						?>
						<?php if(($count%2) == 0 && $count != 0):?>                       
                    </ul>

                    <ul class="fact-counter-box bottom">
                        <?php endif; ?>
                        <!--Start Single Fact Counter-->
                        <li class="<?php if($item['style_two'] == 'four') echo 'single-fact-counter single-fact-counter--style2 pdt50 pdb0'; elseif($item['style_two'] == 'three') echo 'single-fact-counter pdt50 pdb0'; elseif($item['style_two'] == 'two') echo 'single-fact-counter single-fact-counter--style2'; else echo 'single-fact-counter'; ?>">
                            <div class="title-holder">
                                <div class="count-outer count-box">
                                    <span class="count-text" data-speed="3000" data-stop="<?php echo esc_attr($item['counter_stop']);?>"><?php echo esc_attr($item['counter_start']);?></span>
                                </div>
                                <?php if($item['block_title']) {?><h3><?php echo wp_kses($item['block_title'], true);?></h3><?php } ?>
                            </div>
                            <div class="icon-holder">
                                <?php echo wp_kses($item['icons_path'], true);?>
                            </div>
                        </li>
                        <!--End Single Fact Counter-->
                        <?php $count++; endforeach; ?>
                    </ul>

                </div>
            </div>
        </div>
    </section>
    <!--End Fact Counter Area-->
      
    <?php
    }
}
