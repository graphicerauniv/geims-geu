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
class Statement_Of_Educamb extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_statement_of_educamb';
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
        return esc_html__( 'Statement Of Educamb', 'educamb' );
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
            'statement_of_educamb',
            [
                'label' => esc_html__( 'Statement Of Educamb', 'educamb' ),
            ]
        );
		$this->add_control(
			'color_text',
			[
				'label'       => __( 'Bold Title', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Bold Title', 'educamb' ),
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
			'text2',
			[
				'label'       => __( 'Text 2', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'educamb' ),
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
		  'features', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Item 1', 'educamb')],
						['block_title' => esc_html__('Item 2', 'educamb')]
					],
				'fields' => 
				[
					[
						'name' => 'block_title',
						'label' => esc_html__('Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'block_text',
						'label' => esc_html__('Text', 'educamb'),
						'type' => Controls_Manager::TEXTAREA,
					],
				],
				'title_field' => '{{block_title}}',
			 ]
        );
		$this->add_control(
			'logo_title',
			[
				'label'       => __( 'Logo Title', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your logo Title', 'educamb' ),
			]
		);
		$this->add_control(
			'logo_image',
			[
				'label' => __( 'Logo Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'about_image',
			[
				'label' => __( 'About Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'certificate_title',
			[
				'label'       => __( 'Certificate Title', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Certificate Title', 'educamb' ),
			]
		);
		$this->add_control(
			'text3',
			[
				'label'       => __( 'Text 3', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'educamb' ),
			]
		);
		$this->add_control(
           'client', 
	       [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						
					],
				'fields' => 
				[
					[
						'name' => 'client_image',
						'label' => esc_html__('Certificate Image', 'educamb'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
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
    ?>
	
    <!--Start About Style8 Area-->
    <section class="about-style8-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="about-style8-content-one">
                        <div class="top">
                            <?php if($settings['color_text']) { ?><div class="left"><?php echo wp_kses($settings['color_text'], true);?></div><?php } ?>
                            <?php if($settings['text']) { ?>
                            <div class="right">
                                <p><?php echo wp_kses($settings['text'], true);?></p>
                            </div>
                            <?php } ?>
                        </div>
                        <?php if($settings['text2']) { ?>
                        <div class="text">
                            <p><?php echo wp_kses($settings['text2'], true);?></p>
                        </div>
                        <?php } ?>
                        <?php if($settings['btn_title']){ ?>
                        <div class="btns-box">
                            <a class="btn-one" href="<?php echo esc_url($settings['btn_link']['url']); ?>">
                                <span class="txt"><?php echo wp_kses($settings['btn_title'], true); ?></span>
                            </a>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="about-style8-content-two">
                        <div class="statements-content-box">
                            <?php if($settings['title']) { ?>
                            <div class="sec-title">
                                <h2><?php echo wp_kses($settings['title'], true);?></h2>
                            </div>
                            <?php } ?>
                            <div class="statements-content-box__inner">
                                <div class="item">
                                    <?php foreach($settings['features'] as $key => $item): ?>
                                    <div class="single-statements-item">
                                        <div class="icon"></div>
                                        <div class="text">
                                            <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                            <p><?php echo wp_kses($item['block_text'], true);?></p>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-6">
                    <div class="about-style8-img-box">
                        <div class="logo-box">
                            <?php if($settings['logo_title']){ ?><div class="curved-circle-5"><?php echo wp_kses($settings['logo_title'], true);?></div><?php } ?>
                            <?php if($settings['logo_image']['id']){ ?>
                            <div class="inner-logo">
                                <img src="<?php echo esc_url(wp_get_attachment_url($settings['logo_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                            </div>
                            <?php } ?>
                        </div>
                        <?php if($settings['about_image']['id']){ ?>
                        <div class="about-style8-img-box__inner">
                            <img src="<?php echo esc_url(wp_get_attachment_url($settings['about_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                        </div>
                        <?php } ?>
                    </div>
                    <div class="about-style8-accreditations-box">
                        <div class="inner-title">
                            <?php if($settings['certificate_title']){ ?><h3><?php echo wp_kses($settings['certificate_title'], true);?></h3><?php } ?>
                            <?php if($settings['text3']){ ?><p><?php echo wp_kses($settings['text3'], true);?></p><?php } ?>
                        </div>
                        <ul>
                            <?php foreach($settings['client'] as $key => $item): ?>
                            <li>
                                <div class="single-accreditations-logo">
                                    <img src="<?php echo esc_url(wp_get_attachment_url($item['client_image']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                                </div>
                            </li>
                            <?php endforeach;?>
                        </ul>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End About Style8 Area-->       
        
        <?php
    }
}
