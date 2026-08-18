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
class History_Section extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_history_section';
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
        return esc_html__( 'History Section', 'educamb' );
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
            'history_section',
            [
                'label' => esc_html__( 'History Section', 'educamb' ),
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
					'one' => esc_html__( 'Choose Style With BG Title', 'educamb' ),
					'two' => esc_html__( 'Choose Style Without BG Title', 'educamb' ),
				),
			 ]
		);
		$this->add_control(
			'bg_title',
			[
				'label'       => __( 'BG Title', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'educamb' ),
			]
		);
		$this->add_control(
			'bg_title2',
			[
				'label'       => __( 'BG Title', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'educamb' ),
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
						'name' => 'block_year',
						'label' => esc_html__('Year', 'educamb'),
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
	
    <?php if($settings['style_two'] == 'two') : ?>
    
    <!--Start History Area-->
    <section class="history-area history-area--style2">
        <div class="auto-container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="theme_carousel history-carousel owl-theme owl-carousel" data-options='{
                            "loop": false, 
                            "margin": 30, 
                            "autoheight":true, 
                            "lazyload":true, 
                            "nav": false, 
                            "dots": false, 
                            "autoplay": true, 
                            "autoplayTimeout": 5000, 
                            "smartSpeed": 500, 
                            "navText": ["<span class=\"left icon-right-arrow-1\"></span>",
                            "<span class=\"right icon-right-arrow-1\"></span>"], 
                            "responsive":{ 
                            "0" :{ "items": "1" }, 
                            "600" :{ "items" : "1" }, 
                            "768" :{ "items" : "1" }, 
                            "1200":{ "items" : "2" }, 
                            "1700":{ "items" : "3" }
                            }
                        }'>
						
                        <?php foreach($settings['features'] as $key => $item): ?>
                        <!--Start Single History Box-->
                        <div class="single-history-box">
                            <div class="img-holder">
                                <img src="<?php echo esc_url(wp_get_attachment_url($item['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb');?>">
                            </div>
                            <div class="text-holder">
                                <h2><?php echo wp_kses($item['block_year'], true);?></h2>
                                <div class="icon">
                                    <div class="round-shape"></div>
                                    <span class="flaticon-feather"></span>
                                </div>
                                <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                <p><?php echo wp_kses($item['block_text'], true);?></p>
                            </div>
                        </div>
                        <!--End Single History Box-->
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End History Area-->
    
    <?php else: ?>
    
    <!--Start History Area-->
    <section class="history-area">
        <?php if($settings['bg_title'] || $settings['bg_title2']) { ?>
        <div class="top-big-title-box">
            <?php if($settings['bg_title']) { ?><div class="left"><?php echo wp_kses($settings['bg_title'], true);?></div><?php } ?>
            <?php if($settings['bg_title2']) { ?><span class="flaticon-star"></span>
            <div class="right"><?php echo wp_kses($settings['bg_title2'], true);?></div><?php } ?>
        </div>
        <?php } ?>
        <div class="auto-container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="theme_carousel history-carousel owl-theme owl-carousel  owl-nav-style-one"
                        data-options='{
                            "loop": false, 
                            "margin": 30, 
                            "autoheight":true, 
                            "lazyload":true, 
                            "nav": true, 
                            "dots": false, 
                            "autoplay": true, 
                            "autoplayTimeout": 5000, 
                            "smartSpeed": 500, 
                            "navText": ["<span class=\"left icon-right-arrow-1\"></span>",
                            "<span class=\"right icon-right-arrow-1\"></span>"], 
                            "responsive":{ 
                            "0" :{ "items": "1" }, 
                            "600" :{ "items" : "1" }, 
                            "768" :{ "items" : "1" }, 
                            "1200":{ "items" : "2" }, 
                            "1700":{ "items" : "3" }
                            }
                        }'>
						<?php foreach($settings['features'] as $key => $item): ?>
                        <!--Start Single History Box-->
                        <div class="single-history-box">
                            <div class="img-holder">
                                <img src="<?php echo esc_url(wp_get_attachment_url($item['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb');?>">
                            </div>
                            <div class="text-holder">
                                <h2><?php echo wp_kses($item['block_year'], true);?></h2>
                                <div class="icon">
                                    <div class="round-shape"></div>
                                    <span class="flaticon-feather"></span>
                                </div>
                                <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                <p><?php echo wp_kses($item['block_text'], true);?></p>
                            </div>
                        </div>
                        <!--End Single History Box-->
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End History Area-->
                 
    <?php endif;
    }
}
