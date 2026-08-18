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
class Contact_Form_V6 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_contact_form_v6';
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
        return esc_html__( 'Contact Form V6', 'educamb' );
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
            'contact_form_v6',
            [
                'label' => esc_html__( 'Contact Form V6', 'educamb' ),
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
			'image2',
			[
				'label' => __( 'Image Two', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'form_sub_title',
			[
				'label'       => __( 'Form Sub Title', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Form Sub Title', 'educamb' ),
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
	
    <!--Start Main Contact Form Style6 Area-->
    <section class="main-contact-form-style6-area">
        <div class="container">
            <div class="row">

                <div class="col-xl-6 order-2">
                    <div class="main-contact-form-style6-img-box">
                        <?php if($settings['image']['id']){ ?>
                        <div class="inner">
                            <img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                        </div>
                        <?php } ?>
                        <?php if($settings['image2']['id']){ ?>
                        <div class="outer-box">
                            <img src="<?php echo esc_url(wp_get_attachment_url($settings['image2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-xl-6 order-1">
                    <div class="contact-form">
                        <div class="sec-title-style7">
                            <?php if($settings['form_sub_title']){ ?>
                            <div class="sub-title">
                                <p><?php echo wp_kses($settings['form_sub_title'], true);?></p>
                                <div class="zigzag left gray-bg"></div>
                            </div>
                            <?php } ?>
                            <?php if($settings['form_title']){ ?><h2><?php echo wp_kses($settings['form_title'], true);?></h2><?php } ?>
                            <?php if($settings['form_text']){ ?><p><?php echo wp_kses($settings['form_text'], true);?></p><?php } ?>
                        </div>
                        <div class="default-form2">
							<?php echo do_shortcode($settings['contact_form_url'], true);?>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>
    <!--End Main Contact Form Style6 Area-->
        
                     
        <?php
    }
}
