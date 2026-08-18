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
class Google_Map_V3 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_google_map_v3';
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
        return esc_html__( 'Google Map V3', 'educamb' );
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
            'google_map_v3',
            [
                'label' => esc_html__( 'Google Map V3', 'educamb' ),
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
			'google_map_code',
			[
				'label'       => __( 'Google Map Iframe Code', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Google Map Iframe Code', 'educamb' ),
			]
		);
		$this->add_control(
			'map_title',
			[
				'label'       => __( 'Map Title', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Map Title', 'educamb' ),
			]
		);
		$this->add_control(
			'map_text',
			[
				'label'       => __( 'Map Text', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'educamb' ),
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
	
    <!--Start Contact Info style9 Area-->
    <section class="contact-info-style9-area">
        <div class="container">
            <div class="row">

                <div class="col-xl-4">
                    <div class="contact-info-style9-content">
                        <div class="sec-title">
                            <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                            <?php if($settings['text']) { ?>
                            <div class="sub-title">
                                <p><?php echo wp_kses($settings['text'], true);?></p>
                            </div>
                            <?php } ?>
                        </div>
                        <ul>
                            <?php foreach($settings['info'] as $key => $item): ?>
                            <li>
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
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="contact-page-map-outer">
                        <!--Map Canvas-->
                        <div class="map-canvas">
							<?php echo do_shortcode($settings['google_map_code']);?>
                        </div>
                        <div class="overlay-content">
                            <?php if($settings['map_title']) { ?><h3><?php echo wp_kses($settings['map_title'], true);?></h3><?php } ?>
                            <?php if($settings['map_text']) { ?><p><?php echo wp_kses($settings['map_text'], true);?></p><?php } ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Contact Info style9 Area-->       
                     
        <?php
    }
}
