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
class Google_Map extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_google_map';
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
        return esc_html__( 'Google Map', 'educamb' );
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
            'google_map',
            [
                'label' => esc_html__( 'Google Map', 'educamb' ),
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
			'address',
			[
				'label'       => __( 'Address', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Address', 'educamb' ),
			]
		);
		$this->add_control(
			'video_text',
			[
				'label'       => __( 'Video Text', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Video Text', 'educamb' ),
			]
		);
		$this->add_control(
			'video_url',
			[
				  'label' => __( 'External Url', 'educamb' ),
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
			'icons',
			[
				'label' => esc_html__('Enter The icons', 'educamb'),
				'label_block' => true,
				'type' => Controls_Manager::SELECT2,
				'options'  => get_fontawesome_icons(),
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
	
    <!--Start Contact Info Area-->
    <section class="contact-info-area">
        <div class="container">
            <div class="row">

                <div class="col-xl-6">
                    <div class="contact-info-content">
                        <?php if($settings['title']){ ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                        <?php if($settings['text']){ ?><p><?php echo wp_kses($settings['text'], true);?></p><?php } ?>
                        <?php if($settings['address']){ ?><h3><?php echo wp_kses($settings['address'], true);?></h3><?php } ?>
                        <div class="video-gallery-btns-box">
                            <?php if($settings['video_url']['url']){ ?>
                            <a class="video-popup" title="Video Gallery"
                                href="<?php echo esc_url($settings['video_url']['url']); ?>">
                                <span class="icon-play"></span>
                            </a>
                            <?php } ?>
							<?php if($settings['video_text']){ ?>
                            <p>
                                <a class="video-popup" title="Video Gallery"
                                    href="<?php echo esc_url($settings['video_url']['url']); ?>">
                                    <?php echo wp_kses($settings['video_text'], true);?>
                                </a>
                            </p>
                            <?php } ?>
                        </div>
                        <?php if($settings['icons']){ ?>
                        <div class="icon-outer">
                            <span class="<?php echo wp_kses(str_replace( "icon ",  "", $settings['icons']), true);?>"></span>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="contact-page-map-outer">
                        <!--Map Canvas-->
                        <div class="map-canvas">
	                        <?php echo do_shortcode($settings['google_map_code']);?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Contact Info Area-->        
                     
        <?php
    }
}
