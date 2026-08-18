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
class Contact_Form_V7 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_contact_form_v7';
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
        return esc_html__( 'Contact Form V7', 'educamb' );
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
            'contact_form_v7',
            [
                'label' => esc_html__( 'Contact Form V7', 'educamb' ),
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
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'educamb' ),
			]
		);
		$this->add_control(
		    'info', 
		    [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Call Us', 'educamb')],
						['block_title' => esc_html__('Email Us', 'educamb')]
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
						'label' => esc_html__('Description', 'educamb'),
						'type' => Controls_Manager::TEXTAREA,
					],
					[
						'name' => 'block_contact',
						'label' => esc_html__('Contact Info', 'educamb'),
						'type' => Controls_Manager::TEXTAREA,
					],
				],
				'title_field' => '{{block_title}}',
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
			'working_title',
			[
				'label'       => __( 'Working Title', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Title', 'educamb' ),
			]
		);
		$this->add_control(
			'working_hours',
			[
				'label'       => __( 'Working Hours', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Working Hours', 'educamb' ),
			]
		);
		$this->add_control(
			'form_title',
			[
				'label'       => __( 'Form Title', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Form Sub Title', 'educamb' ),
			]
		);
		$this->add_control(
			'form_text',
			[
				'label'       => __( 'Form Text', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Form Text', 'educamb' ),
			]
		);
		$this->add_control(
			'contact_form_url',
			[
				'label'       => __( 'Contact Form 7 Url', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Contact Form 7 Url', 'educamb' ),
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
	
    <!--Start Main Contact Form Style8 Area-->
    <section class="main-contact-form-style8-area">
        <div class="container">
            <div class="row">

                <div class="col-xl-6">
                    <div class="contact-info-box-style8">
                        <div class="sec-title">
                            <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                            <?php if($settings['text']) { ?>
                            <div class="sub-title">
                                <p><?php echo wp_kses($settings['text'], true);?></p>
                            </div>
                            <?php } ?>
                        </div>

                        <div class="conatct-info">
                            <div class="row">
                                <?php foreach($settings['info'] as $key => $item): ?>
                                <div class="col-xl-6">
                                    <div class="quick-contact-info-single-box">
                                        <div class="icon">
                                            <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                                        </div>
                                        <div class="text">
                                            <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                            <p><?php echo wp_kses($item['block_text'], true);?></p>
                                            <?php echo wp_kses($item['block_contact'], true);?>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div
                                        class="quick-contact-info-single-box quick-contact-info-single-box--style2">
                                        <?php if($settings['iconss']) { ?>
                                        <div class="icon">
                                            <span class="<?php echo wp_kses(str_replace( "icon ",  "", $settings['iconss']), true);?>"></span>
                                        </div>
                                        <?php } ?>
                                        <div class="text">
                                            <?php if($settings['working_title']) { ?><h3><?php echo wp_kses($settings['working_title'], true);?></h3><?php } ?>
                                            <?php if($settings['working_hours']) { ?><p><?php echo wp_kses($settings['working_hours'], true);?></p><?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="contact-form">
                        <div class="sec-title">
                            <?php if($settings['form_title']){ ?><h2><?php echo wp_kses($settings['form_title'], true);?></h2><?php } ?>
                            <?php if($settings['form_text']){ ?>
                            <div class="sub-title">
                                <p><?php echo wp_kses($settings['form_text'], true);?></p>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="default-form2">
							<?php echo do_shortcode($settings['contact_form_url'], true);?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Main Contact Form Style8 Area-->
        
                     
        <?php
    }
}
