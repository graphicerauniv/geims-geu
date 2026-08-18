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
class Courses_V1 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_courses_v1';
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
        return esc_html__( 'Courses V1', 'educamb' );
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
            'courses_v1',
            [
                'label' => esc_html__( 'Courses V1', 'educamb' ),
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
						['block_title' => esc_html__('Short Time Courses', 'educamb')],
						['block_title' => esc_html__('Certification Courses', 'educamb')],
						['block_title' => esc_html__('Hybrid Courses', 'educamb')]
					],
				'fields' => 
				[
					[
						'name' => 'feature_image',
						'label' => __( 'Feature BG Image', 'educamb' ),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'icons',
						'label' => esc_html__('Enter The icons', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::SELECT2,
						'options'  => get_fontawesome_icons(),
					],
					[
						'name' => 'block_subtitle',
						'label' => esc_html__('Sub Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'educamb')
					],
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
	
    <!--Start Online Courses Style1 Area-->
    <section class="online-courses-style1-area">
        <div class="container">
            <?php if($settings['sub_title'] || $settings['title']) { ?>
            <div class="sec-title-style3 text-center">
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
                <!--Start Single Online Courses Style1-->
                <div class="col-xl-4">
                    <div class="single-online-courses-style1">
                        <div class="img-holder">
                            <?php if($item['icons']){ ?>
                            <div class="icon" data-aos="fade-up">
                                <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                            </div>
                            <?php } ?>
							<?php if($item['feature_image']['id']){ ?>
                            <div class="inner">
                                <img src="<?php echo esc_url(wp_get_attachment_url($item['feature_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>" />
                            </div>
                            <?php } ?>
                            <div class="overlay-content">
                                <div class="top-text">
                                    <h6><?php echo wp_kses($item['block_subtitle'], true);?></h6>
                                    <h3><a href="<?php echo esc_url($item['btn_link']['url']);?>"><?php echo wp_kses($item['block_title'], true);?></a></h3>
                                </div>
                                <div class="bottom-text">
                                    <p><?php echo wp_kses($item['block_text'], true);?></p>
                                    
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
                    </div>
                </div>
                <!--End Single Online Courses Style1-->
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!--End Online Courses Style1 Area-->
        
    <?php
    }
}
