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
class Our_Programs extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_our_programs';
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
        return esc_html__( 'Our Programs', 'educamb' );
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
            'our_programs',
            [
                'label' => esc_html__( 'Our Programs', 'educamb' ),
            ]
        );
		$this->add_control(
			'bg_image',
			[
				'label' => __( 'BG Pattern Image', 'educamb' ),
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
		  'feature', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Play Group', 'educamb')],
						['block_title' => esc_html__('Junior-KG', 'educamb')],
						['block_title' => esc_html__('Senior-KG', 'educamb')]
					],
				'fields' => 
				[
					[
						'name' => 'feature_image',
						'label' => __( 'Feature Image', 'educamb' ),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'block_title',
						'label' => esc_html__('Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'kid_age',
						'label' => esc_html__('Kids Age', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'block_text',
						'label' => esc_html__('Description', 'educamb'),
						'type' => Controls_Manager::TEXTAREA,
					],
					[
						'name' => 'btn_title',
						'label' => esc_html__('Button Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'btn_link',
						'label' => __( 'External Url', 'educamb' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
				'title_field' => '{{block_title}}',
			 ]
        );
		$this->add_control(
			'style_two',
			[
				'label'   => esc_html__( 'Choose Different Style', 'educamb' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
					'one' => esc_html__( 'Choose Style One', 'educamb' ),
					'two' => esc_html__( 'Choose Style Two', 'educamb' ),
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
    ?>
	
    <!--Start Kindergarten Progran Sec-->
    <section class="kindergarten-program-sec <?php if($settings['style_two'] == 'two') echo 'bg-gray'; else echo ''; ?>">
    	<?php if($settings['style_two'] == 'two'){ ?>
    	<div class="kindergarten-program-sec-shape" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);"></div>
        <?php } ?>
        <div class="container">
            <?php if($settings['sub_title'] || $settings['title']) { ?>
            <div class="sec-title-style2 text-center">
                <?php if($settings['sub_title']) { ?>
                <div class="sub-title">
                    <h5><?php echo wp_kses($settings['sub_title'], true);?></h5>
                </div>
                <?php } ?>
                <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
            </div>
            <?php } ?>
            <div class="row">
                <?php foreach($settings['feature'] as $key => $item): ?>
                <!-- Start Kindergarten Program Single Box-->
                <div class="col-xl-4 col-lg-4 text-center">
                    <div class="kindergarten-program__single-box wow fadeInLeft" data-wow-delay="100ms" data-wow-duration="1500ms">
                        <div class="decor"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/decor.png" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>"></div>
                        <div class="kindergarten-program__single-box__inner">
                            <div class="static-content">
                                <div class="img-box">
                                    <img src="<?php echo esc_url(wp_get_attachment_url($item['feature_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                                </div>
                                <div class="title-box">
                                    <h2><?php echo wp_kses($item['block_title'], true);?></h2>
                                    <p><?php echo wp_kses($item['kid_age'], true);?></p>
                                </div>
                            </div>
                            <div class="overlay-content">
                                <div class="title-box">
                                    <h2><?php echo wp_kses($item['block_title'], true);?></h2>
                                    <p><?php echo wp_kses($item['kid_age'], true);?></p>
                                </div>
                                <div class="text">
                                    <p><?php echo wp_kses($item['block_text'], true);?></p>
                                </div>
                            </div>
                            <?php if($item['btn_link']['url'] || $item['btn_title']){ ?>
                            <div class="btn-box">
                                <a href="<?php echo esc_url($item['btn_link']['url']);?>">
                                    <span class="icon-right-arrow-1"></span><?php echo wp_kses($item['btn_title'], true);?>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- End Kindergarten Program Single Box-->
				<?php endforeach; ?>
            </div>
        </div>
    </section>
    <!--End Kindergarten Progran Sec-->       
        
    <?php
    }
}
