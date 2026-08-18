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
class Living_On_Campus extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_living_on_campus';
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
        return esc_html__( 'Living On Campus', 'educamb' );
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
            'living_on_campus',
            [
                'label' => esc_html__( 'Living On Campus', 'educamb' ),
            ]
        );
		$this->add_control(
			'bg_image',
			[
				'label' => __( 'BG Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
           'features', 
		   [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Item 1', 'educamb')],
						['block_title' => esc_html__('Item 2', 'educamb')],
					],
				'fields' => 
				[
					[
						'name' => 'block_no',
						'label' => esc_html__('Number', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
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
	
    <!--Start Living On Campus Area-->
    <section class="living-on-campus-area">
        <div class="container">
            <div class="row">
				
                <div class="col-xl-6">
	                <?php if($settings['bg_image']['id']){ ?>
                    <div class="living-on-campus-img-box">
                        <div class="inner">
                            <img src="<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <div class="col-xl-6">
                    <div class="living-on-campus-content-box">
                        <?php if($settings['title']) { ?>
                        <div class="sec-title">
                            <h2><?php echo wp_kses($settings['title'], true);?></h2>
                        </div>
                        <?php } ?>
                        <?php if($settings['text']) { ?>
                        <div class="text">
                            <?php echo wp_kses($settings['text'], true);?>
                        </div>
                        <?php } ?>
                        <ul>
                            <?php foreach($settings['features'] as $key => $item): ?>
                            <li>
                                <div class="icon">
                                    <span class="icon-star"></span>
                                </div>
                                <div class="inner-text">
                                    <h2><?php echo wp_kses($item['block_no'], true);?></h2>
                                    <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                    <p><?php echo wp_kses($item['block_text'], true);?></p>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Living On Campus Area-->
                 
        <?php
    }
}
