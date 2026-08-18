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
class Integral_Education extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_integral_education';
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
        return esc_html__( 'Integral Education', 'educamb' );
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
            'integral_education',
            [
                'label' => esc_html__( 'Integral Education', 'educamb' ),
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
				'placeholder' => __( 'Enter Title', 'educamb' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Text', 'educamb' ),
			]
		);
		$this->add_control(
			'box_title',
			[
				'label'       => __( 'Bottom Box Title', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Title', 'educamb' ),
			]
		);
		$this->add_control(
			'box_no',
			[
				'label'       => __( 'Phone Number', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Phone Number', 'educamb' ),
			]
		);
		$this->add_control(
			'box_email',
			[
				'label'       => __( 'Email Address', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Email', 'educamb' ),
			]
		);
		$this->add_control(
		    'info', 
		    [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Oportunities', 'educamb')],
						['block_title' => esc_html__('Scholarship', 'educamb')]
					],
				'fields' => 
				[
					[
						'name' => 'image',
						'label' => esc_html__('Image', 'educamb'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'block_title',
						'label' => esc_html__('Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'block_link',
						'label' => __( 'Block Url', 'educamb' ),
						 'type' => Controls_Manager::URL,
						 'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
					[
						'name' => 'block_text',
						'label' => esc_html__('Description', 'educamb'),
						'type' => Controls_Manager::TEXTAREA,
					],
					[
						'name' => 'style_two',
						'label'   => esc_html__( 'Choose Different Style', 'educamb' ),
						'label_block' => true,
						'type'    => Controls_Manager::SELECT,
						'default' => 'one',
						'options' => array(
							'one' => esc_html__( 'Choose Style Left Image', 'educamb' ),
							'two' => esc_html__( 'Choose Style Right Image', 'educamb' ),
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
	
    <!--Start Intro Style1 Area-->
    <section class="intro-style1-area">
        <div class="container">
            <div class="row">

                <div class="col-xl-6">
                    <div class="intro-style1-content">
                        <?php if($settings['title']){ ?>
                        <div class="sec-title">
                            <h2><?php echo wp_kses($settings['title'], true);?></h2>
                        </div>
                        <?php } ?>
                        <?php if($settings['text']){ ?>
                        <div class="text">
                            <p><?php echo wp_kses($settings['text'], true);?></p>
                        </div>
                        <?php } ?>
                        <?php if($settings['box_title'] || $settings['box_no'] || $settings['box_email']){ ?>
                        <div class="bottom-box">
                            <div class="icon">
                                <span class="icon-customer-care"></span>
                            </div>
                            <div class="inner-text">
                                <h3><?php echo wp_kses($settings['box_title'], true);?></h3>
                                <p>
                                    <a href="tel:<?php echo esc_attr($settings['box_no']);?>"><?php echo wp_kses($settings['box_no'], true);?></a> -
                                    <a href="mailto:<?php echo esc_attr($settings['box_email']);?>"><?php echo wp_kses($settings['box_email'], true);?></a>
                                </p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="intro-style1-img-box">
                        <div class="row">
                            <?php foreach($settings['info'] as $key => $item): ?>                            
                            <!--Start Intro Style1 Single Box-->
                            <div class="col-xl-6">
                                <div class="<?php if($item['style_two'] == 'two') echo 'intro-style1-single-box intro-style1-single-box--style2'; else echo 'intro-style1-single-box'; ?>">
                                    <?php if($item['image']['id']) { ?>
                                    <div class="img-holder">
                                        <img src="<?php echo esc_url(wp_get_attachment_url($item['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb');?>">
                                    </div>
                                    <?php } ?>
                                    <div class="text-holder">
                                        <div class="icon">
                                            <span class="icon-right-arrow-1"></span>
                                        </div>
                                        <div class="text">
                                            <h3><a href="<?php echo esc_url($item['block_link']['url']); ?>"><?php echo wp_kses($item['block_title'], true);?></a></h3>
                                            <p><?php echo wp_kses($item['block_text'], true);?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Intro Style1 Single Box-->
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Intro Style1 Area-->
                     
        <?php
    }
}
