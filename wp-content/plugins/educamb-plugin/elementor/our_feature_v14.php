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
class Our_Feature_V14 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_our_feature_v14';
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
        return esc_html__( 'Our Feature V14', 'educamb' );
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
            'our_feature_v14',
            [
                'label' => esc_html__( 'Our Feature V14', 'educamb' ),
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
					],
				'fields' => 
				[
					[
						'name' => 'image',
						'label' => esc_html__('Image', 'educamb'),
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
						'name' => 'block_text',
						'label' => esc_html__('Text', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
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
	
     <!--Start Marketplace Statements Area-->
    <section class="marketplace-statements-area">
        <div class="thm-pattern-style5" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/pattern/thm-pattern-2.png);">
        </div>
        <div class="container">
            <ul class="row">
                <?php $count = 1; foreach($settings['features'] as $key => $item): ?>
                <!--Start Marketplace Statements Single Item -->
                <li class="col-xl-4 marketplace-statements-single-item">
                    <div class="marketplace-statements-single-item__inner">
                        <div class="counting-box"><?php $count = sprintf('%02d', $count); echo $count; ?></div>
                        <div class="icon" data-aos="zoom-in-down">
                            <img src="<?php echo esc_url(wp_get_attachment_url($item['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb');?>">
                        </div>
                        <div class="text">
                            <h3><a href="<?php echo esc_url($item['block_btn_link']['url']); ?>"><?php echo wp_kses($item['block_title'], true);?></a></h3>
                            <p><?php echo wp_kses($item['block_text'], true);?></p>
                        </div>
                    </div>
                </li>
                <!--End Marketplace Statements Single Item -->
                <?php $count++; endforeach; ?>
            </ul>
        </div>
    </section>
    <!--End Marketplace Statements Area-->     
             
        <?php
    }
}
