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
class Popular_Categories extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_popular_categories';
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
        return esc_html__( 'Popular Categories', 'educamb' );
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
            'popular_categories',
            [
                'label' => esc_html__( 'Popular Categories', 'educamb' ),
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
			'btn_title',
			[
				'label'       => __( 'Button Title', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'educamb' ),
			]
		);
		$this->add_control(
			'btn_link',
			[
				  'label' => __( 'Button Url', 'educamb' ),
				  'type' => Controls_Manager::URL,
				  'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				  'show_external' => true,
				  'default' => [
				    'url' => '',
				    'is_external' => true,
				    'nofollow' => true,
				  ],
			 ]
		);
		$this->add_control(
		  'features', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						
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
	
    <!--Start Marketplace Categories Area-->
    <section class="marketplace-categories-area">
        <div class="container">
            <div class="marketplace-categories__top-title">
                <div class="sec-title-style5 text-left">
                    <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                    <?php if($settings['sub_title']) { ?>
                    <div class="sub-title">
                        <div class="line left"></div>
                        <p><?php echo wp_kses($settings['sub_title'], true);?></p>
                    </div>
                    <?php } ?>
                </div>
                <?php if($settings['btn_title']){ ?>
                <div class="btns-box">
                    <a class="btn-one" href="<?php echo esc_url($settings['btn_link']['url']); ?>">
                        <span class="txt"><?php echo wp_kses($settings['btn_title'], true); ?></span>
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="auto-container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="marketplace-categories-content">
                        <ul>
                            <?php 
								  $count = 0;  
								  foreach($settings['features'] as $key => $item): 
							?>
							<?php if(($count%5) == 0 && $count != 0):?>
                        </ul>
						<ul>
                        	<?php endif; ?>
                            <li class="wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1500ms">
                                <div class="single-categories-box">
                                    <div class="text">
                                        <h3><a href="<?php echo esc_url($item['btn_link']['url']); ?>"><?php echo wp_kses($item['block_title'], true);?></a></h3>
                                        <p><?php echo wp_kses($item['block_text'], true);?></p>
                                    </div>
                                    <div class="icon">
                                        <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                                    </div>
                                </div>
                            </li>
                            <?php $count++; endforeach; ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--End Marketplace Categories Area-->      
             
        <?php
    }
}
