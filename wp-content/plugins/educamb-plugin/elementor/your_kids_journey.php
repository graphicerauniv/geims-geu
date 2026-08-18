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
class Your_Kids_Journey extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_your_kids_journey';
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
        return esc_html__( 'Your Kids Journey', 'educamb' );
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
            'your_kids_journey',
            [
                'label' => esc_html__( 'Your Kids Journey', 'educamb' ),
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
			'image',
			[
				'label' => __( 'Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
						['block_title' => esc_html__('Item 3', 'educamb')]
					],
				'fields' => 
				[
					[
						'name' => 'block_sub_title',
						'label' => esc_html__('Sub Title', 'educamb'),
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
						'name' => 'block_heading',
						'label' => esc_html__('Bold Title', 'educamb'),
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
						'name' => 'features_list',
						'label' => esc_html__('Feature List', 'educamb'),
						'type' => Controls_Manager::TEXTAREA,
					],
					[
						'name' => 'block_box_title',
						'label' => esc_html__('Box Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'block_box_title2',
						'label' => esc_html__('Box Title 2', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'block_download_link',
						'label' => __( 'Download Url', 'educamb' ),
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
	
    <!--Start kindergarten Admission Area-->
    <section class="kindergarten-admission-area">
        <div class="kindergarten-admission-area-shape"
            style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/thm-shape-1.png);">
        </div>
        <div class="container">
            <div class="sec-title-style2 text-center">
                <?php if($settings['sub_title']) { ?>
                <div class="sub-title">
                    <h5><?php echo wp_kses($settings['sub_title'], true);?></h5>
                </div>
                <?php } ?>
                <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
            </div>
            <div class="row">
                <?php if($settings['image']['id']){ ?>
                <div class="col-xl-6">
                    <div class="kindergarten-admission-img-box">
                        <div class="inner">
                            <img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="col-xl-6">
                    <div class="kindergarten-admission-content">

                        <div class="theme_carousel kindergarten-admission-carousel owl-theme owl-carousel"
                            data-options='{
                                "loop": false, 
                                "margin": 0, 
                                "autoheight":true, 
                                "lazyload":true, 
                                "nav": false, 
                                "dots": true, 
                                "autoplay": true, 
                                "autoplayTimeout": 5000, 
                                "smartSpeed": 500, 
                                "navText": ["<span class=\"left icon-right-arrow-1\"></span>",
                                "<span class=\"right icon-right-arrow-1\"></span>"], 
                                "responsive":{ 
                                "0" :{ "items": "1" }, 
                                "600" :{ "items" : "1" }, 
                                "768" :{ "items" : "1" }, 
                                "992":{ "items" : "1" }, 
                                "1200":{ "items" : "1" }
                            }
                            }'>
							
                            <?php foreach($settings['features'] as $key => $item): ?>
                            <!--Start Kindergarten Admission Content Single Box-->
                            <div class="kindergarten-admission-content__single-box">
                                <div class="sec-title-style2">
                                    <div class="sub-title">
                                        <h5><?php echo wp_kses($item['block_sub_title'], true);?></h5>
                                    </div>
                                    <h2><?php echo wp_kses($item['block_title'], true);?></h2>
                                </div>
                                <h3><?php echo wp_kses($item['block_heading'], true);?></h3>
                                <div class="text">
                                    <p><?php echo wp_kses($item['block_text'], true);?></p>
                                </div>
                                <?php $features_list = $item['features_list'];
									if(!empty($features_list)){
									$features_list = explode("\n", ($features_list)); 
								?>
								<ul>
									<?php foreach($features_list as $features): ?>
                                    <li>
                                       <span class="icon-diagonal-arrow"></span> <?php echo wp_kses($features, true); ?>
                                    </li>
									<?php endforeach; ?>
								</ul>
								<?php } ?>
                                <div class="bottom-box">
                                    <?php if($item['block_box_title'] || $item['block_box_title2']) { ?>
                                    <div class="icon">
                                        <span class="icon-download"></span>
                                    </div>
                                    <div class="inner-text">
                                        <h4><?php echo wp_kses($item['block_box_title'], true);?></h4>
                                        <a href="<?php echo esc_url($item['block_download_link']['url']); ?>"><?php echo wp_kses($item['block_box_title2'], true);?></a>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <!--End Kindergarten Admission Content Single Box-->
                            <?php endforeach; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End kindergarten Admission Area-->       
             
        <?php
    }
}
