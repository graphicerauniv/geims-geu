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
class Our_Feature_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_our_feature_v2';
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
        return esc_html__( 'Our Feature V2', 'educamb' );
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
            'our_feature_v2',
            [
                'label' => esc_html__( 'Our Feature V2', 'educamb' ),
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
					'one' => esc_html__( 'Choose Style With Bottom Box', 'educamb' ),
					'two' => esc_html__( 'Choose Style Without Bottom Box', 'educamb' ),
				),
			 ]
		);
		$this->add_control(
		  'features', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Innovative Study', 'educamb')],
						['block_title' => esc_html__('Skilled & Caring Staff', 'educamb')],
						['block_title' => esc_html__('Good Environment', 'educamb')],
						['block_title' => esc_html__('Nationally Accredited', 'educamb')],
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
		$this->add_control(
			'show_bottom_box',
			[
				'label'       => __( 'Enable/Disable Bottom Box', 'educamb' ),
						'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'educamb' ),
				'label_off' => __( 'Hide', 'educamb' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'bottom_title',
			[
				'label'       => __( 'Bottom Box Title', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'educamb' ),
			]
		);
		$this->add_control(
			'btn_title',
			[
				'label'       => __( 'Button Title', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'educamb' ),
			]
		);
		$this->add_control(
			'btn_link',
			[
				  'label' => __( 'Button Url', 'educamb' ),
				  'type' => Controls_Manager::URL,
				  'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				  'show_external' => true,
				  'default' => [
				    'url' => '',
				    'is_external' => true,
				    'nofollow' => true,
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
	
    <!--Start Features Style1 Area-->
    <section class="<?php if($settings['style_two'] == 'two') echo 'features-style1-area features-style1-area--style2'; else echo 'features-style1-area'; ?>">
        <?php if($settings['style_two'] == 'two') : ?>
        <div class="features-style1-area-shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/thm-shape-1.png);">
        </div>
        <?php endif; ?>
        <div class="auto-container">
            <ul class="row features-style1__content-box">
				<?php foreach($settings['features'] as $key => $item): ?>
                <!--Start Single Features Box Style1-->
                <li class="col-xl-3 col-lg-6 col-md-6 single-features-box-style1 <?php if($item['style_two'] == 'four') echo 'style4'; elseif($item['style_two'] == 'three') echo 'style3'; elseif($item['style_two'] == 'two') echo 'style2'; else echo ''; ?>">
                    <div class="single-features-box-style1__inner">
                        <div class="top">
                            <div class="icon-holder">
                                <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                            </div>
                            <div class="counting-box"></div>
                        </div>
                        <div class="text-holder">
                            <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                            <p><?php echo wp_kses($item['block_text'], true);?></p>
                            <div class="button-box">
                                <div class="inner">
                                    <div class="left">
                                        <a href="<?php echo esc_url($item['block_btn_link']['url']); ?>">
                                            <span class="icon-right-arrow-1"></span>
                                        </a>
                                    </div>
                                    <?php if($item['block_btn_title']) { ?>
                                    <div class="right">
                                        <a href="<?php echo esc_url($item['block_btn_link']['url']); ?>"><?php echo wp_kses($item['block_btn_title'], true);?></a>
                                    </div>
                                    <?php } ?>
                                </div>
                                <?php if($item['block_btn_title']) { ?>
                                <div class="overlay-btn">
                                    <a href="<?php echo esc_url($item['block_btn_link']['url']); ?>"><span class="icon-right-arrow-1"></span> <?php echo wp_kses($item['block_btn_title'], true);?></a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </li>
                <!--End Single Features Box Style1-->
				<?php endforeach; ?>
            </ul>
			<?php if($settings['show_bottom_box']) { ?>
            <div class="row">
                <div class="features-style1__bottom-text">
                    <div class="inner">
                        <?php if($settings['bottom_title']) { ?>
                        <div class="left">
                            <h3>
                                <span class="icon-teddy-bear"></span> <?php echo wp_kses( $settings['bottom_title'], true );?>
                            </h3>
                        </div>
                        <?php } ?>
						<?php if($settings['btn_title']) { ?>
                        <div class="right">
                            <a href="<?php echo esc_url($settings['btn_link']['url']); ?>"><?php echo wp_kses( $settings['btn_title'], true );?></a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
			<?php } ?>
        </div>
    </section>
    <!--End Features Style1 Area-->       
             
        <?php
    }
}
