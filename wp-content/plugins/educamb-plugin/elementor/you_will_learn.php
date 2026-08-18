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
class You_Will_Learn extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_you_will_learn';
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
        return esc_html__( 'You Will Learn', 'educamb' );
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
            'you_will_learn',
            [
                'label' => esc_html__( 'You Will Learn', 'educamb' ),
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
			'sub_title',
			[
				'label'       => __( 'Sub Title', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub Title', 'educamb' ),
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
			'about_image2',
			[
				'label' => __( 'About Image Two', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'rotate_title',
			[
				'label'       => __( 'Icon Title', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Icon Title', 'educamb' ),
			]
		);
		$this->add_control(
			'icon_image',
			[
				'label' => __( 'Icon Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your List Title', 'educamb' ),
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
    ?>
	
    <!--Start About Style6 Area-->
    <section class="about-style6-area">
        <div class="container">
            <div class="row">

                <div class="col-xl-8 col-lg-7">
                    <div class="about-style6-img-box">
                        <div class="row">
                            <?php if($settings['about_image']['id']){ ?>
                            <div class="col-xl-6 col-lg-6">
                                <div class="single-img-box">
                                    <img src="<?php echo esc_url(wp_get_attachment_url($settings['about_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                                </div>
                            </div>
                            <?php } ?>
                            <div class="col-xl-6 col-lg-6">
                                <div class="single-img-box-outer">
                                    <div class="sec-title-style6">
                                        <?php if($settings['sub_title']) { ?>
                                        <div class="sub-title">
                                             <p><?php echo wp_kses($settings['sub_title'], true);?></p>
                                        </div>
                                        <?php } ?>
                                        <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                                    </div>
                                    <?php if($settings['about_image2']['id']){ ?>
                                    <div class="single-img-box">
                                        <img src="<?php echo esc_url(wp_get_attachment_url($settings['about_image2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-5">
                    <div class="about-style6-text-box">
                        <div class="round-box-content">
                            <?php if($settings['rotate_title']) { ?><div class="curved-circle"><?php echo wp_kses($settings['rotate_title'], true);?></div><?php } ?>
                            <?php if($settings['icon_image']['id']){ ?>
                            <div class="inner-icon">
                                <img src="<?php echo esc_url(wp_get_attachment_url($settings['icon_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                            </div>
                            <?php } ?>
                        </div>
                        <?php if($settings['text']) { ?>
                        <div class="top-text">
                            <p><?php echo wp_kses($settings['text'], true);?></p>
                        </div>
                        <?php } ?>
                        <?php if($settings['list_title']) { ?>
                        <div class="inner-title">
                            <h3><?php echo wp_kses($settings['list_title'], true);?></h3>
                        </div>
                        <?php } ?>
                        <?php $features_list = $settings['features_list'];
							if(!empty($features_list)){
							$features_list = explode("\n", ($features_list)); 
						?>
						<ul>
							<?php foreach($features_list as $features): ?>
							<li>
                                <div class="icon">
                                    <span class="flaticon-draw-check-mark"></span>
                                </div>
                                <p><?php echo wp_kses($features, true); ?></p>
                            </li>
							<?php endforeach; ?>
						</ul>
						<?php } ?>
                        <?php if($settings['btn_title']){ ?>
                        <div class="btn-box">
                            <a href="<?php echo esc_url($settings['btn_link']['url']); ?>">
                                <span class="icon-right-arrow-1"></span><?php echo wp_kses($settings['btn_title'], true); ?>
                            </a>
                        </div>
						<?php } ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End About Style6 Area-->        
        
        <?php
    }
}
