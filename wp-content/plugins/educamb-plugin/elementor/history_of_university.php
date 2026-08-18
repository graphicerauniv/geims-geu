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
class History_Of_University extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_history_of_university';
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
        return esc_html__( 'History Of University', 'educamb' );
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
            'history_of_university',
            [
                'label' => esc_html__( 'History Of University', 'educamb' ),
            ]
        );
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
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
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'educamb' ),
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
			'title2',
			[
				'label'       => __( 'Title 2', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'educamb' ),
			]
		);
		$this->add_control(
			'text2',
			[
				'label'       => __( 'Text 2', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'educamb' ),
			]
		);
		$this->add_control(
           'video', 
		   [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						
					],
				'fields' => 
				[
					
					[
						'name' => 'block_title',
						'label' => esc_html__('Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
					],
					[
						 'name' => 'video_link',
						 'label' => __( 'Viedo Url', 'educamb' ),
						  'type' => Controls_Manager::URL,
						  'label_block' => true,
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
    
    <!--Start  University History Area-->
    <section class="university-history-area">
        <div class="container">
            <div class="sec-title text-center">
                <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                <?php if($settings['text']) { ?>
                <div class="sub-title">
                    <p><?php echo wp_kses($settings['text'], true);?></p>
                </div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="university-history-img-box">
                        <div class="inner">
                            <?php if($settings['image']['id']){ ?><img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>"><?php } ?>
                            <div class="university-history-img-box__content">
                                <?php if($settings['title2']) { ?><h3><?php echo wp_kses($settings['title2'], true);?></h3><?php } ?>
                                <?php if($settings['text2']) { ?><p><?php echo wp_kses($settings['text2'], true);?></p><?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="university-history-content">
                        <div class="single-vertical-carousel">

                            <!--Start Single Item-->
                            <div class="single-item">
                                <ul>
                                    <?php 
										  $count = 0;  
										  foreach($settings['video'] as $key => $item): 
									?>
									<?php if(($count%6) == 0 && $count != 0):?>                                    
                                </ul>
                            </div>
                            <!--End Single Item-->
                            <!--Start Single Item-->
                            <div class="single-item">
                                <ul>
                                    <?php endif; ?>
                                    <li>
                                        <?php if($item['video_link']['url']) { ?><a class="video-popup" title="Video Gallery"
                                            href="<?php echo esc_url($item['video_link']['url']); ?>">
                                            <span class="icon-play"></span><?php } ?>
                                            <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                        </a>
                                    </li>
                                    <?php $count++; endforeach; ?>
                                </ul>
                            </div>
                            <!--End Single Item-->
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End  University History Area-->      
             
        <?php
    }
}
