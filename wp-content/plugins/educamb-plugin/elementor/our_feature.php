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
class Our_Feature extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_our_feature';
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
        return esc_html__( 'Our Feature', 'educamb' );
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
            'our_feature',
            [
                'label' => esc_html__( 'Our Feature', 'educamb' ),
            ]
        );
		$this->add_control(
		  'campus', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Item1', 'educamb')],
						['block_title' => esc_html__('Item2', 'educamb')]
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
						  'name' => 'btn_link',
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
		  'features', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title2' => esc_html__('Item1', 'educamb')],
						['block_title2' => esc_html__('Item2', 'educamb')],
						['block_title2' => esc_html__('Item3', 'educamb')],
						['block_title2' => esc_html__('Item4', 'educamb')]
					],
				'fields' => 
				[
					[
						'name' => 'icons_path',
						'label' => esc_html__('Icon Path', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
					],
					[
						'name' => 'block_title2',
						'label' => esc_html__('Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
					],
					[
						  'name' => 'btn_link2',
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
				'title_field' => '{{block_title2}}',
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
	
    <!--Start Essentials Area-->
    <section class="essentials-area">
        <div class="auto-container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="features-style1-content">
                        <ul>
                            <?php foreach($settings['campus'] as $key => $item): ?>
                            <li>
                                <div class="single-features-style1">
                                    <div class="text-box">
                                        <h2><a href="<?php echo esc_url($item['btn_link']['url']); ?>"><?php echo wp_kses($item['block_title'], true);?></a></h2>
                                        <p><?php echo wp_kses($item['block_text'], true);?></p>
                                    </div>
                                    <div class="img-box">
                                        <img src="<?php echo esc_url(wp_get_attachment_url($item['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb');?>">
                                        <div class="overlay-content">
                                            <a href="<?php echo esc_url($item['btn_link']['url']); ?>">
                                                <span class="icon-top"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="essentials-content-box">
                        <ul>
                        	<?php foreach($settings['features'] as $key => $item): ?>
                            <li>
                                <div class="single-essentials-box">
                                    <?php if($item['icons']) {?>
                                    <div class="icon">
                                        <?php echo wp_kses($item['icons_path'], true);?>
                                    </div>
                                    <?php } ?>
                                    <?php if($item['block_title2']) {?><h3><a href="<?php echo esc_url($item['btn_link2']['url']); ?>"><?php echo wp_kses($item['block_title2'], true);?></a></h3><?php } ?>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Essentials Area-->       
             
    <?php
    }
}