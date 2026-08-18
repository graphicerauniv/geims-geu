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
class Banner_V3 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_banner_v3';
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
        return esc_html__( 'Banner V3', 'educamb' );
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
            'banner_v3',
            [
                'label' => esc_html__( 'Banner V3', 'educamb' ),
            ]
        );
		$this->add_control(
			'social_title',
			[
				'label'       => __( 'Social Title', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Social Title', 'educamb' ),
			]
		);
		$this->add_control(
			'slide_text',
			[
				'label'       => __( 'Description', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Description', 'educamb' ),
			]
		);
		$this->add_control(
		  'social_info', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['item#1' => esc_html__('social info', 'educamb')],
						['item#2' => esc_html__('social info', 'educamb')],
						['item#3' => esc_html__('social info', 'educamb')]
					],
				'fields' => 
				[
					[
						'name' => 'social_icons',
						'label' => esc_html__('Enter The icons', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::SELECT2,
						'options'  => get_fontawesome_icons(),
					],	
					[
						'name' => 'social_link',
						'label' => __( 'Social Link', 'educamb' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
			 ]
        );
		$this->add_control(
            'slides', 
			[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['title' => esc_html__('Slide One', 'educamb')],
						['title' => esc_html__('Slide Two', 'educamb')],
						['title' => esc_html__('Slide Three', 'educamb')]
					],
				'fields' => 
				[
					[
						'name' => 'bg_image',
						'label' => esc_html__('Slide BG Image', 'educamb'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'title',
						'label' => esc_html__('Title', 'educamb'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'features_list',
						'label' => esc_html__('Feature List', 'educamb'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'btn_title',
						'label' => esc_html__('Button Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'btn_link',
						'label' => __( 'Button Link', 'educamb' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
				'title_field' => '{{title}}',
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
	
    <!-- Start Main Slider -->
    <section class="main-slider main-slider-style3">
        <div class="main-slider-style3__outer-content">
            
            <div class="border-vertical-line"></div>
            <div class="slider-social-link-box">
                <?php if($settings['social_title']) { ?>
                <div class="inner-title">
                    <h6><?php echo wp_kses($settings['social_title'], true); ?></h6>
                </div>
                <?php } ?>
                <ul class="clearfix">
                    <?php foreach($settings['social_info'] as $key => $item): ?>
                    <li><a href="<?php echo esc_url($item['social_link']['url']); ?>"><i class="fab <?php echo wp_kses(str_replace( "fa ",  "",  $item['social_icons']), true); ?>"></i></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="slider-box">
            <?php if($settings['slide_text']) { ?>
            <div class="main-slider-style3__bottom-content">
                <p><i class="icon-megaphone"></i> <?php echo wp_kses($settings['slide_text'], true); ?></p>
            </div>
            <?php }?>
            <!-- Banner Carousel -->
            <div class="banner-carousel owl-theme owl-carousel">

				<?php foreach($settings['slides'] as $key => $item): ?>
                <!-- Slide -->
                <div class="slide">
                    <?php if($item['bg_image']['id']){ ?><div class="image-layer" style="background-image:url(<?php echo esc_url(wp_get_attachment_url($item['bg_image']['id'])); ?>)"><?php } ?>
                    </div>
                    <div class="auto-container">
                        <div class="content">
                            <?php if($item['title']) { ?>
                            <div class="big-title">
                                <h2><?php echo wp_kses($item['title'], true); ?></h2>
                            </div>
                            <?php } ?>
                            <div class="text">
								<?php $features_list = $item['features_list'];
                                    if(!empty($features_list)){
                                    $features_list = explode("\n", ($features_list)); 
                                ?>
                                <ul>
                                <?php foreach($features_list as $features): ?>
                                    <li><?php echo wp_kses($features, true); ?></li>
                                <?php endforeach; ?>
                                </ul>
                                <?php } ?>
                            </div>
                            <?php if($item['btn_title']) { ?>
                            <div class="btns-box">
                                <a class="btn-one" href="<?php echo esc_url($item['btn_link']['url']); ?>">
                                    <span class="txt">
                                        <i class="icon-right-arrow-1"></i>
                                        <?php echo wp_kses($item['btn_title'], true); ?>
                                    </span>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
				<?php endforeach; ?>

            </div>
        </div>
    </section>
    <!-- End Main Slider -->
        
        <?php
    }
}
