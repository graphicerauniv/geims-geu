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
class About_Us_V3 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_about_us_v3';
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
        return esc_html__( 'About Us V3', 'educamb' );
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
            'about_us_v3',
            [
                'label' => esc_html__( 'About Us V3', 'educamb' ),
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
			'list_title',
			[
				'label'       => __( 'List Title', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'educamb' ),
			]
		);
		$this->add_control(
			'features_list',
			[
				'label'       => __( 'Feature List', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Feature List', 'educamb' ),
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
	
    <!--Start Intro Style2 Area-->
    <section class="intro-style2-area">
        <div class="container">
            <div class="row">
                <?php if($settings['about_image']['id']){ ?>
                <div class="col-xl-6">
                    <div class="intro-style2-img-box">
                        <div class="intro-style2-img-box__top-border"></div>
                        <div class="intro-style2-img-box__bottom-border"></div>
                        <div class="intro-style2-img-box__inner">
                            <div class="intro-style2-img-box__inner-shape float-bob-y"
                                style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/book.png);"></div>
                            <img src="<?php echo esc_url(wp_get_attachment_url($settings['about_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="col-xl-6">
                    <div class="intro-style2-text-box">
                        <?php if($settings['subtitle']|| $settings['title']) { ?>
                        <div class="sec-title-style2">
                            <?php if($settings['subtitle']) { ?>
                            <div class="sub-title">
                                <h5><?php echo wp_kses($settings['subtitle'], true);?></h5>
                            </div>
                            <?php } ?>
                            <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                        </div>
                        <?php } ?>
                        <div class="intro-style2-text-box__inner">
                            <?php if($settings['text']) { ?>
                            <div class="top-text">
                                <p><?php echo wp_kses($settings['text'], true);?></p>
                            </div>
                            <?php } ?>
                            <?php if($settings['list_title']) { ?><h3><?php echo wp_kses($settings['list_title'], true);?></h3><?php } ?>
                            <?php $features_list = $settings['features_list'];
								if(!empty($features_list)){
								$features_list = explode("\n", ($features_list)); 
							?>
							<ul>
								<?php foreach($features_list as $features): ?>
								   <li>
                                        <div class="icon">
                                            <span class="icon-double-tick"></span>
                                        </div>
                                        <div class="text">
                                            <p><?php echo wp_kses($features, true); ?></p>
                                        </div>
                                    </li>
								<?php endforeach; ?>
   							</ul>
							<?php } ?>
							<?php if($settings['btn_title']){ ?>
                            <div class="btns-box">
                                <a class="btn-one btn-one--style3" href="<?php echo esc_url($settings['btn_link']['url']); ?>">
                                    <span class="txt"><?php echo wp_kses($settings['btn_title'], true); ?></span>
                                </a>
                            </div>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Intro Style2 Area-->
        
        <?php
    }
}
