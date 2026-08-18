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
class Who_We_Are_V3 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_who_we_are_v3';
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
        return esc_html__( 'Who We Are V3', 'educamb' );
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
            'who_we_are_v3',
            [
                'label' => esc_html__( 'Who We Are V3', 'educamb' ),
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
					'one' => esc_html__( 'Choose Style One', 'educamb' ),
					'two' => esc_html__( 'Choose Style Two', 'educamb' ),
				),
			 ]
		);
		$this->add_control(
			'about_image',
			[
				'label' => __( 'Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'icons',
			[
				'label' => esc_html__('Enter The icons', 'educamb'),
				'label_block' => true,
				'type' => Controls_Manager::SELECT2,
				'options'  => get_fontawesome_icons(),
			]
		);
		$this->add_control(
			'exp_title',
			[
				'label'       => __( 'Experience Title', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'educamb' ),
			]
		);
		$this->add_control(
			'exp_text',
			[
				'label'       => __( 'Experience Text', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'educamb' ),
			]
		);
		$this->add_control(
			'subtitle',
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
			'text',
			[
				'label'       => __( 'Text', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
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
						['block_title' => esc_html__('Formal Course', 'educamb')],
						['block_title' => esc_html__('Casual Course', 'educamb')],
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
				],
				'title_field' => '{{block_title}}',
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
	
    <!--Start Who we Area Style6 Area-->
    <section class="who-we-are-style6-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="who-we-are-style6-img-box">
                        <?php if($settings['about_image']['id']){ ?>
                        <div class="inner">
                            <img src="<?php echo esc_url(wp_get_attachment_url($settings['about_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                        </div>
                        <?php } ?>
                        <div class="experienced-box">
                            <?php if($settings['icons']){ ?>
                            <div class="icon">
                                <span class="<?php echo wp_kses(str_replace( "icon ",  "", $settings['icons']), true);?>"></span>
                            </div>
                            <?php } ?>
                            <?php if($settings['exp_title']) { ?><h2><?php echo wp_kses($settings['exp_title'], true);?></h2><?php } ?>
                            <?php if($settings['exp_text']) { ?><p><?php echo wp_kses($settings['exp_text'], true);?></p><?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="<?php if($settings['style_two'] == 'two') echo 'bwho-we-are-style6-content-box who-we-are-style6-content-box--style2'; else echo 'who-we-are-style6-content-box'; ?>">
                        <div class="sec-title-style6">
                            <?php if($settings['subtitle']) { ?>
                            <div class="sub-title">
                                <p><?php echo wp_kses($settings['subtitle'], true);?></p>
                            </div>
                            <?php } ?>
                            <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                        </div>
                        <?php if($settings['text']) { ?>
                        <div class="top-text">
                            <p><?php echo wp_kses($settings['text'], true);?></p>
                        </div>
                        <?php } ?>
                        <div class="progress-levels">
                            <?php  foreach($settings['funfact'] as $key => $item): ?>
                            <!--Start Progress Box-->
                            <div class="progress-box wow">
                                <div class="top">
                                    <div class="text"><?php echo wp_kses($item['block_title'], true);?></div>
                                </div>
                                <div class="inner count-box">
                                    <div class="bar">
                                        <div class="bar-innner">
                                            <div class="bar-fill" data-percent="<?php echo esc_attr($item['counter_stop']);?>">
                                                <div class="skill-percent">
                                                    <span class="count-text" data-speed="3000"
                                                        data-stop="<?php echo esc_attr($item['counter_stop']);?>"><?php echo esc_attr($item['counter_start']);?></span>
                                                    <span class="percent"><?php echo esc_attr($item['alphabet_letter']);?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Progress Box-->
                            <?php endforeach; ?>
                        </div>
						<?php if($settings['btn_title']){ ?>
                        <div class="btns-box">
                            <a class="<?php if($settings['style_two'] == 'two') echo 'btn-one btn-one-style7'; else echo 'btn-one btn-one--style6'; ?>" href="<?php echo esc_url($settings['btn_link']['url']); ?>">
                                <span class="txt">
                                    <?php echo wp_kses($settings['btn_title'], true); ?>
                                </span>
                            </a>
                        </div>
						<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Who we Area Style6 Area-->
        
        <?php
    }
}
