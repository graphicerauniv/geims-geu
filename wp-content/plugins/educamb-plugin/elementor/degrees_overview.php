<?php

namespace EDUCAMBPLUGIN\Element;

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
class Degrees_Overview extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'educamb_degrees_overview';
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
		return esc_html__( 'Degrees Overview', 'educamb' );
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
			'degrees_overview',
			[
				'label' => esc_html__( 'Degrees Overview', 'educamb' ),
			]
		);
		$this->add_control(
			'bg_image',
			[
				'label' => __( 'Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'shape_image',
			[
				'label' => __( 'Pattern Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
						['block_title' => esc_html__('Item1', 'educamb')],
						['block_title' => esc_html__('Item2', 'educamb')],
					],
				'fields' => 
				[
					[
						'name' => 'block_title',
						'label' => esc_html__('Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'block_text',
						'label' => esc_html__('Description', 'educamb'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'heritaste')
					],
				],
				'title_field' => '{{block_title}}',
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
				'placeholder' => __( 'Enter Form Title', 'educamb' ),
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
		$this->add_control(
			'bg_color_style',
			 [
				'label'   => esc_html__( 'Choose Different BG Color Style', 'educamb' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'bg_one',
				'options' => array(
					'bg_one' => esc_html__( 'Choose Style One', 'educamb' ),
					'bg_two' => esc_html__( 'Choose Style Two', 'educamb' ),
				),
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
	
    <!--Start Program Details Area-->
    <section id="overview" class="program-details-area <?php if($settings['bg_color_style'] == 'bg_two') echo 'program-details-area--style2'; else echo ''; ?>">
        <div class="program-details-area__bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">

                    <div class="program-details-tab-content">
                        <?php if($settings['bg_image']['id']){ ?>
                        <div class="program-details-tab-content__img-box"
                            style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);">
                        </div>
                        <?php } ?>
                        <div class="program-details-tab-content__inner">
                            <?php if($settings['shape_image']['id']){ ?>
                            <div class="program-details-tab-content__inner__shape"
                                style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['shape_image']['id'])); ?>);">
                            </div>
                            <?php } ?>
                            <div class="program-details-tab-content__text">
                                <?php if($settings['title']) { ?>
                                <div class="sec-title">
                                    <h2><?php echo wp_kses($settings['title'], true);?></h2>
                                </div>
                                <?php } ?>
                                <?php if($settings['text']) { ?><p><?php echo wp_kses($settings['text'], true);?></p><?php } ?>
                                <ul>
                                    <?php foreach($settings['info'] as $key => $item): ?>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-star"></span>
                                        </div>
                                        <div class="inner-text">
                                            <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                            <p><?php echo wp_kses($item['block_text'], true);?></p>
                                        </div>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <div class="program-details-form-box">
                                <?php if($settings['form_title']) { ?>
                                <div class="sec-title">
                                    <h2><?php echo wp_kses($settings['form_title'], true);?></h2>
                                </div>
                                <?php } ?>
                                <?php echo do_shortcode($settings['contact_form_url'], true);?>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!--End Program Details Area-->
      
         
        <?php 
	}

}