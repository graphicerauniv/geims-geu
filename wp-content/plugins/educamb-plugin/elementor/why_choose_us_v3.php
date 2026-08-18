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
class Why_Choose_Us_V3 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_why_choose_us_v3';
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
        return esc_html__( 'Why Choose Us V3', 'educamb' );
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
            'why_choose_us_v3',
            [
                'label' => esc_html__( 'Why Choose Us V3', 'educamb' ),
            ]
        );
		$this->add_control(
			'image',
			[
				'label' => __( 'Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'show_pattern',
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
		  'choose', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Item1', 'educamb')],
						['block_title' => esc_html__('Item2', 'educamb')]
					],
				'fields' => 
				[
					[
						'name' => 'image2',
						'label' => __( 'Image', 'educamb' ),
						 'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'icons',
						'label' => esc_html__('Enter The icons', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::SELECT2,
						'options'  => get_fontawesome_icons(),
					],
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
						'type' => Controls_Manager::TEXT,
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
						),
					],
				],
				'title_field' => '{{block_title}}',
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
			'text',
			[
				'label'       => __( 'Text', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your text', 'educamb' ),
			]
		);
		$this->add_control(
		  'chooses', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title2' => esc_html__('Item1', 'educamb')],
						['block_title2' => esc_html__('Item2', 'educamb')],
						['block_title2' => esc_html__('Item3', 'educamb')]
					],
				'fields' => 
				[
					
					[
						'name' => 'iconss',
						'label' => esc_html__('Enter The icons', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::SELECT2,
						'options'  => get_fontawesome_icons(),
					],
					[
						'name' => 'block_title2',
						'label' => esc_html__('Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'block_text2',
						'label' => esc_html__('Text', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
					],
				],
				'title_field' => '{{block_title2}}',
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
	
    <!--Start Quiz Learning Choose Area-->
    <section class="quiz-learning-choose-area">
        <?php if($settings['image']['id']){ ?>
        <div class="quiz-learning-choose-area-shape1 wow slideInLeft" data-wow-delay="100ms"
            data-wow-duration="2500ms">
            <img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
        </div>
        <?php } ?>
        <div class="container">
            <div class="row">

                <div class="col-xl-6">
                    <div class="quiz-learning-choose-img-box">
                        <?php if($settings['show_pattern']) { ?>
                        <div class="quiz-learning-choose-area-shape2">
                            <img class="rotate-me"
                                src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/quiz-learning/shape/quiz-learning-choose-area-shape-2.png"
                                alt="<?php esc_attr_e('Awesome Image', 'educamb');?>">
                        </div>
                        <div class="quiz-learning-choose-area-shape3">
                            <img class="float-bob-x"
                                src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/quiz-learning/shape/quiz-learning-choose-area-shape-3.png"
                                alt="<?php esc_attr_e('Awesome Image', 'educamb');?>">
                        </div>
                        <?php } ?>
                        <div class="row">
                           <?php foreach($settings['choose'] as $key => $item): ?>
						   <?php if($item['style_two'] == 'two') : ?> 
                            <!--Start Single Quiz Learning Choose Box -->
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="single-quiz-learning-choose-box style2">
                                    <div class="text-box pdb60 text-left">
                                        <div class="icon">
                                            <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                                        </div>
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="3000" data-stop="<?php echo esc_attr($item['counter_stop']);?>"><?php echo esc_attr($item['counter_start']);?></span><?php echo esc_attr($item['alphabet_letter']);?>
                                        </div>
                                        <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                    </div>
                                    <?php if($item['image2']['id']){ ?>
                                    <div class="img-box">
                                        <img src="<?php echo esc_url(wp_get_attachment_url($item['image2']['id'])); ?>"
                                            alt="<?php esc_attr_e('Awesome Image', 'educamb');?>">
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <!--End Single Quiz Learning Choose Box -->
                            <?php else : ?>
                            <!--Start Single Quiz Learning Choose Box -->
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="single-quiz-learning-choose-box">
                                    <?php if($item['image2']['id']){ ?>
                                    <div class="img-box">
                                        <img src="<?php echo esc_url(wp_get_attachment_url($item['image2']['id'])); ?>"
                                            alt="<?php esc_attr_e('Awesome Image', 'educamb');?>">
                                    </div>
                                    <?php } ?>
                                    <div class="text-box pdt60 text-right">
                                        <div class="icon">
                                            <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                                        </div>
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="3000" data-stop="<?php echo esc_attr($item['counter_stop']);?>"><?php echo esc_attr($item['counter_start']);?></span><?php echo esc_attr($item['alphabet_letter']);?>
                                        </div>
                                        <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                    </div>
                                </div>
                            </div>
                            <!--End Single Quiz Learning Choose Box -->
                            
                            <?php endif; endforeach; ?>
                            
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="quiz-learning-choose-content-box">
                        <div class="sec-title-style8">
                            <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2> <?php } ?>
                            <?php if($settings['text']) { ?><p><?php echo wp_kses($settings['text'], true);?></p> <?php } ?>
                        </div>
                        <ul class="quiz-learning-choose-content-box-items">
                            <?php $i= 1; foreach($settings['chooses'] as $key => $item): ?>
                            <li class="single-quiz-learning-choose-content-box-item">
                                <div class="icon">
                                    <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['iconss']), true);?>"></span>
                                </div>
                                <div class="text">
                                    <h2><?php $i = sprintf('%02d', $i); echo $i; ?>.</h2>
                                    <h3><?php echo wp_kses($item['block_title2'], true);?></h3>
                                    <p><?php echo wp_kses($item['block_text2'], true);?></p>
                                </div>
                            </li>
                            <?php $i++; endforeach; ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Quiz Learning Choose Area-->
        
                         
        <?php
    }
}
