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
class Subscribe_Us_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_subscribe_us_v2';
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
        return esc_html__( 'Subscribe Us V2', 'educamb' );
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
            'subscribe_us_v2',
            [
                'label' => esc_html__( 'Subscribe Us V2', 'educamb' ),
            ]
        );
		$this->add_control(
		  'slide', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Item One', 'educamb')],
						['block_title' => esc_html__('Item Two', 'educamb')]
					],
				'fields' => 
				[
					[
						'name' => 'block_sub_title',
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
						'label' => esc_html__('Text', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'newsletter_form_url',
						'label' => esc_html__('Newsletter Form Url', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'block_btn_title',
						'label' => esc_html__('Button Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'block_btn_link',
						'label' => __( 'Button Link', 'educamb' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
					[
						'name' => 'block_btn_title2',
						'label' => esc_html__('Button Title Two', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'block_btn_link2',
						'label' => __( 'Button Link Two', 'educamb' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
					[
						'name' => 'style_two',
						'label'   => esc_html__( 'Choose Different Style', 'educamb' ),
						'label_block' => true,
						'type'    => Controls_Manager::SELECT,
						'default' => 'one',
						'options' => array(
							'one' => esc_html__( 'Choose Style Newsletter Form', 'educamb' ),
							'two' => esc_html__( 'Choose Style With Buttons ', 'educamb' ),
						),
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
	
    <!--Start Newsletter & Download App Area-->
    <section class="newsletter-download-app-area">
        <div class="container">
            <div class="row">
                <?php foreach($settings['slide'] as $key => $item): ?>
                <div class="col-xl-6">
                    <div class="<?php if($item['style_two'] == 'two') echo 'download-app-content-box'; else echo 'newsletter-content-box'; ?>">
                        <div class="sec-title-style7">
                            <?php if($item['block_sub_title']) { ?>
                            <div class="sub-title">
                                <p><?php echo wp_kses($item['block_sub_title'], true);?></p>
                                <div class="zigzag left bg-white"></div>
                            </div>
                            <?php } ?>
                            <h2><?php echo wp_kses($item['block_title'], true);?></h2>
                            <p><?php echo wp_kses($item['block_text'], true);?></p>
                        </div>
                        
                        <?php if($item['style_two'] == 'two') : ?>                        
                        <div class="btn-box">
                            <?php if($item['block_btn_title']) { ?>
                            <a class="btn-one google-play" href="<?php echo esc_url($item['block_btn_link']['url']); ?>">
                                <span class="txt">
                                    <i class="flaticon-play-store"></i>
                                    <?php echo wp_kses($item['block_btn_title'], true);?>
                                </span>
                            </a>
                            <?php } ?>
                            <?php if($item['block_btn_title2']) { ?>
                            <a class="btn-one app-store" href="<?php echo esc_url($item['block_btn_link2']['url']); ?>">
                                <span class="txt">
                                    <i class="flaticon-apple"></i>
                                    <?php echo wp_kses($item['block_btn_title2'], true);?>
                                </span>
                            </a>
                            <?php } ?>
                        </div>
                        
                        <?php else : ?>
                        
                        <div class="newsletter-form-box">
                            <div class="newsletter-form">
                                <?php echo do_shortcode($item['newsletter_form_url']);?>
                            </div>
                        </div>
                        
						<?php endif; ?>
                        
                        
                    </div>
                </div>
				<?php endforeach; ?>
            </div>
        </div>
    </section>
    <!--End Newsletter & Download App Area-->
                     
        <?php
    }
}


