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
class Staff_Section extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_staff_section';
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
        return esc_html__( 'Staff Section', 'educamb' );
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
            'staff_section',
            [
                'label' => esc_html__( 'Staff Section', 'educamb' ),
            ]
        );
		$this->add_control(
		    'slides', 
		    [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Office Staff', 'educamb')],
						['block_title' => esc_html__('Teaching Staff', 'educamb')],
						['block_title' => esc_html__('Security Guard', 'educamb')],
						['block_title' => esc_html__('Accommodation', 'educamb')],
					],
				'fields' => 
				[
					[
						'name' => 'block_title',
						'label' => esc_html__('Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'block_title_link',
						'label' => __( 'External Url', 'educamb' ),
						  'type' => Controls_Manager::URL,
						  'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						  'show_external' => true,
						  'default' => [
							'url' => '',
							'is_external' => true,
							'nofollow' => true,
						  ],
					],
				],
				'title_field' => '{{block_title}}',
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
	
    <!--Start Staff Area-->
    <section class="staff-area">
        <div class="container">
            <div class="row">
                <?php foreach($settings['slides'] as $key => $item): ?>
                <!--Start Single Staff Box-->
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="single-staff-box">
                        <div class="btns-box">
                            <a class="btn-one" href="<?php echo esc_url($item['block_title_link']['url']); ?>">
                                <span class="txt">
                                    <?php echo wp_kses($item['block_title'], true);?>
                                </span>
                                <i class="icon-right-arrow-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!--End Single Staff Box-->
                <?php endforeach; ?>
            </div>
			<?php if($settings['text']){ ?>
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="bottom-text">
                        <p><?php echo wp_kses($settings['text'], true);?> </p>
                    </div>
                </div>
            </div>
			<?php } ?>
        </div>
    </section>
    <!--End Staff Area-->       
             
        <?php
    }
}
