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
class Our_Feature_V7 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_our_feature_v7';
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
        return esc_html__( 'Our Feature V7', 'educamb' );
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
            'our_feature_v7',
            [
                'label' => esc_html__( 'Our Feature V7', 'educamb' ),
            ]
        );
		$this->add_control(
           'features', 
		   [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Admission & Records', 'educamb')],
						['block_title' => esc_html__('Register for Classes', 'educamb')],
						['block_title' => esc_html__('Board Agendas', 'educamb')],
						['block_title' => esc_html__('Career Interviews', 'educamb')]
					],
				'fields' => 
				[
					[
						'name' => 'icons_path',
						'label' => esc_html__('Icon Path / Raw Html', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
					],
					[
						'name' => 'block_title',
						'label' => esc_html__('Title', 'educamb'),
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
	
    <!--Start Essentials Content Area-->
    <section class="essentials-content-area">
        <div class="container">
            <ul class="row">
				<?php foreach($settings['features'] as $key => $item): ?>
                <!--Start Single Essentials Item-->
                <li class="col-xl-3 col-lg-3 col-md-6 single-essentials-colum text-center">
                    <div class="single-essentials-item">
                        <div class="static-content">
                            <?php if($item['icons_path']){ ?>
                            <div class="icon">
                                <?php echo wp_kses($item['icons_path'], true);?>
                            </div>
                            <?php } ?>
                            <h3><a href="<?php echo esc_url($item['block_btn_link']['url']); ?>"><?php echo wp_kses($item['block_title'], true);?></a></h3>
                            <?php if($item['block_btn_link']['url']) { ?>
                            <div class="btn-box">
                                <a href="<?php echo esc_url($item['block_btn_link']['url']); ?>">
                                    <span class="icon-right-arrow-1"></span>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </li>
                <!--End Single Essentials Item-->
				<?php endforeach; ?>
            </ul>
        </div>
    </section>
    <!--End Essentials Content Area-->      
             
        <?php
    }
}
