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
class About_Us_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_about_us_v2';
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
        return esc_html__( 'About Us V2', 'educamb' );
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
            'about_us_v2',
            [
                'label' => esc_html__( 'About Us V2', 'educamb' ),
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
				'placeholder' => __( 'Enter your Text', 'educamb' ),
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
			'exp_sub_title',
			[
				'label'       => __( 'Experience Sub Title', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'educamb' ),
			]
		);
		$this->add_control(
			'exp_title',
			[
				'label'       => __( 'Experience Title', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'educamb' ),
			]
		);
		$this->add_control(
			'sig_image',
			[
				'label' => __( 'Signature Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
	
    <!--Start About Style4 Area-->
    <section class="about-style4-area">
        <div class="container">
            <div class="row text-right-rtl">
				<?php if($settings['about_image']['id']){ ?>
                <div class="col-xl-6">
                    <div class="about-style4__image">
                        <div class="shape1">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/instructor/shape/about-v4-shape1.png" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>" />
                        </div>
                        <div class="shape2"></div>
                        <div class="inner">
                            <img src="<?php echo esc_url(wp_get_attachment_url($settings['about_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                        </div>
                    </div>
                </div>
				<?php } ?>
                <div class="col-xl-6">
                    <div class="about-style4__content">
                        <?php if($settings['subtitle']|| $settings['title']) { ?>
                        <div class="sec-title-style4">
                            <?php if($settings['subtitle']) { ?>
                            <div class="sub-title">
                                <div class="decor"></div>
                                <h5><?php echo wp_kses($settings['subtitle'], true);?></h5>
                            </div>
                            <?php } ?>
                            <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                        </div>
                        <?php } ?>
                        <div class="inner-content">
                            <?php if($settings['text']) { ?>
                            <div class="text">
                                <p><?php echo wp_kses($settings['text'], true);?></p>
                            </div>
                            <?php } ?>
                            <div class="bottom-text">
                                <?php if($settings['icons']) { ?>
                                <div class="icon">
                                    <div class="icon-bg"
                                        style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/instructor/shape/about-v4-shape4.png);">
                                    </div>
                                    <div class="top-arrow">
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/instructor/shape/about-v4-shape3.png" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                                    </div>
                                    <span class="<?php echo wp_kses(str_replace( "icon ",  "", $settings['icons']), true);?>"></span>
                                </div>
                                <?php } ?>
                                <div class="experience-box">
                                    <h2><?php echo wp_kses($settings['exp_sub_title'], true);?></h2>
                                    <h4><?php echo wp_kses($settings['exp_title'], true);?></h4>
                                </div>
                            </div>
                            <?php if($settings['sig_image']['id']) { ?>
                            <div class="signature">
                                <img src="<?php echo esc_url(wp_get_attachment_url($settings['sig_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                            </div>
							<?php } ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End About Style4 Area-->
        
        <?php
    }
}
