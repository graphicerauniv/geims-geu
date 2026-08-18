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
class Quizzing_Classes extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_quizzing_classes';
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
        return esc_html__( 'Quizzing Classes', 'educamb' );
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
            'quizzing_classes',
            [
                'label' => esc_html__( 'Quizzing Classes', 'educamb' ),
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
			'number',
			[
				'label'       => __( 'Box Number', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your number', 'educamb' ),
			]
		);
		$this->add_control(
			'iconss',
			[
				'label' => esc_html__('Enter The icons', 'educamb'),
				'label_block' => true,
				'type' => Controls_Manager::SELECT2,
				'options'  => get_fontawesome_icons(),
			]
		);
		$this->add_control(
			'title2',
			[
				'label'       => __( 'Box Title', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'educamb' ),
			]
		);
		$this->add_control(
			'text2',
			[
				'label'       => __( 'Box Text', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'educamb' ),
			]
		);
		$this->add_control(
			'btn_arrow_link',
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
		$this->add_control(
			'btn_title',
			[
				'label'       => __( 'Button Title', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
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
		$this->add_control(
		  'features', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Item One', 'educamb')],
						['block_title' => esc_html__('Item Two', 'educamb')]
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
	
    <!--Start Learning Categories Area-->
    <section class="learning-categories-area">
        <div class="container">
            <div class="row">

                <div class="col-xl-6">
                    <div class="learning-categories-content-box">
                        <?php if($settings['title'] || $settings['text']) { ?>
                        <div class="sec-title-style8">
                            <h2><?php echo wp_kses($settings['title'], true);?></h2>
                            <p><?php echo wp_kses($settings['text'], true);?></p>
                        </div>
						<?php } ?>
                        <!--Start Single learning categories Item -->
                        <div class="single-learning-categories-item">
                            <div class="couning-box"><?php echo wp_kses($settings['number'], true);?></div>
                            <div class="single-learning-categories-item__inner">
                                <div class="icon" data-aos="fade-up">
                                    <span class="<?php echo wp_kses(str_replace( "icon ",  "", $settings['iconss']), true);?>"></span>
                                </div>
                                <div class="text">
                                    <h3><?php echo wp_kses($settings['title2'], true);?></h3>
                                    <p><?php echo wp_kses($settings['text2'], true);?></p>
                                    <?php if($settings['btn_arrow_link']['url']){ ?><a class="readmore" href="<?php echo esc_url($settings['btn_arrow_link']['url']); ?>"><span class="icon-right-arrow-1"></span></a><?php } ?>
                                </div>
                            </div>
                        </div>
                        <!--End Single learning categories Item -->
						<?php if($settings['btn_title']){ ?>
                        <div class="learning-categories-btn-box">
                            <a href="<?php echo esc_url($settings['btn_link']['url']); ?>">
                                <span class="icon-right-arrow-1"></span><?php echo wp_kses($settings['btn_title'], true); ?>
                            </a>
                        </div>
						<?php } ?>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="learning-categories-content-box-two">
                        <?php $i= 2; foreach($settings['features'] as $key => $item): ?>
                        <!--Start Single learning categories Item -->
                        <div class="single-learning-categories-item">
                            <div class="couning-box"><?php $i = sprintf('%02d', $i); echo $i; ?></div>
                            <div class="single-learning-categories-item__inner">
                                <div class="icon" data-aos="fade-up">
                                    <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                                </div>
                                <div class="text">
                                    <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                    <p><?php echo wp_kses($item['block_text'], true);?></p>
                                    <a class="readmore" href="<?php echo esc_url($item['block_btn_link']['url']); ?>"><span class="icon-right-arrow-1"></span></a>
                                </div>

                            </div>
                        </div>
                        <!--End Single learning categories Item -->
                        <?php $i++; endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Learning Categories Area-->      
             
        <?php
    }
}
