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
class Our_Feature_V8 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_our_feature_v8';
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
        return esc_html__( 'Our Feature V8', 'educamb' );
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
            'our_feature_v8',
            [
                'label' => esc_html__( 'Our Feature V8', 'educamb' ),
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
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'educamb' ),
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
				'placeholder' => __( 'Enter your Sub title', 'educamb' ),
			]
		);
		$this->add_control(
           'features', 
		   [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Item 1', 'educamb')],
						['block_title' => esc_html__('Item 2', 'educamb')],
						['block_title' => esc_html__('Item 3', 'educamb')],
						['block_title' => esc_html__('Item 4', 'educamb')]
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
						'label' => esc_html__('Text', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
					],
					[
						'name' => 'btn_link',
						'label' => __( 'External Url', 'eminent' ),
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
        $allowed_tags = wp_kses_allowed_html('post');
    ?>
	
    <!--Start Power of knowledge Area-->
    <section class="<?php if($settings['style_two'] == 'two') echo 'power-of-knowledge-area style3'; else echo 'power-of-knowledge-area'; ?>">
        <div class="power-of-knowledge-area__shape"
            style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/power-of-knowledge-area-shape.png);"></div>
        <div class="auto-container">
            <div class="container">
                <div class="sec-title text-center">
                    <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2> <?php } ?>
                    <?php if($settings['subtitle']) { ?>
                    <div class="sub-title">
                        <p><?php echo wp_kses($settings['subtitle'], true);?></p>
                    </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <?php foreach($settings['features'] as $key => $item): ?>
                    <!--Start Single Power Of Knowledge Box-->
                    <div class="col-xl-3 col-lg-6 col-md-6 text-center">
                        <div class="single-power-of-knowledge-box">
                            <div class="static-content">
                                <div class="icon-holder">
                                    <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                                </div>
                                <div class="dot-box"></div>
                                <div class="title-holder">
                                    <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                </div>
                            </div>
                            <div class="overlay-content">
                                <div class="dot-box"></div>
                                <h3><a href="<?php echo esc_url($item['btn_link']['url']); ?>"><?php echo wp_kses($item['block_title'], true);?></a></h3>
                                <div class="text">
                                    <p><?php echo wp_kses($item['block_text'], true);?></p>
                                </div>
                                <div class="btn-box">
                                    <a href="<?php echo esc_url($item['btn_link']['url']); ?>">
                                        <span class="icon-right-arrow-1"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Single Power Of Knowledge Box-->
					<?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!--End Power of knowledge Area-->      
             
        <?php
    }
}
