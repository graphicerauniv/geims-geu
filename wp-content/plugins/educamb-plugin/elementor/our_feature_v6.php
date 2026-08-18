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
class Our_Feature_V6 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_our_feature_v6';
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
        return esc_html__( 'Our Feature V6', 'educamb' );
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
            'our_feature_v6',
            [
                'label' => esc_html__( 'Our Feature V6', 'educamb' ),
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
           'features', 
		   [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('You can study anytime anywhere', 'educamb')],
						['block_title' => esc_html__('Our Courses are more affordable', 'educamb')],
						['block_title' => esc_html__('All the details will be safely stored', 'educamb')],
						['block_title' => esc_html__('Learn without the need of traveling', 'educamb')]
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
						'name' => 'icons',
						'label' => esc_html__('Enter The icons', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::SELECT2,
						'options'  => get_fontawesome_icons(),
					],
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
						'name' => 'style_two',
						'label'   => esc_html__( 'Choose Different Style', 'educamb' ),
						'label_block' => true,
						'type'    => Controls_Manager::SELECT,
						'default' => 'one',
						'options' => array(
							'one' => esc_html__( 'Choose Style One', 'educamb' ),
							'two' => esc_html__( 'Choose Style Two ', 'educamb' ),
							'three' => esc_html__( 'Choose Style Three ', 'educamb' ),
						),
					],
				],
				'title_field' => '{{block_title}}',
			 ]
        );
		$this->add_control(
			'bottom_title',
			[
				'label'       => __( 'Bottom Title', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'educamb' ),
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
	
    <!--Start cooking Working Process Area-->
    <section class="cooking-working-process-area">
        <div class="auto-container">
            <div class="sec-title-style7 text-center">
                <?php if($settings['sub_title']) { ?>
                <div class="sub-title">
                    <p><?php echo wp_kses($settings['sub_title'], true);?></p>
                    <div class="zigzag gray-bg"></div>
                </div>
                <?php } ?>
                <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
            </div>
            <div class="row">
                <?php $i= 1; foreach($settings['features'] as $key => $item): ?>
                <!--Start Sinlge Cooking Working Process -->
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="sinlge-cooking-working-process <?php if($item['style_two'] == 'two') echo 'margin-top40'; else echo '' ; ?>">
                        <?php if($item['image']['id']){ ?>
                        <div class="<?php if($item['style_two'] == 'two') echo 'cooking-working-process-shape-bottom'; else echo 'cooking-working-process-shape-top' ; ?>">
                            <img src="<?php echo esc_url(wp_get_attachment_url($item['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb');?>">
                        </div>
                        <?php } ?>
                        <div class="counting-box"><?php $i = sprintf('%02d', $i); echo $i; ?></div>
                        <div class="text-box">
                            <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                            <h3><?php echo wp_kses($item['block_sub_title'], true);?></h3>
                            <p><?php echo wp_kses($item['block_title'], true);?></p>
                        </div>
                    </div>
                </div>
                <!--End Sinlge Cooking Working Process -->                
                <?php $i++; endforeach; ?>
            </div>
			<?php if($settings['bottom_title'] || $settings['btn_title']) { ?>
            <div class="row">
                <div class="col-xl-12">
                    <div class="cooking-working-process-bottom-content">
                        <div class="container">
                            <div class="cooking-working-process-bottom-content__inner">
                                <?php if($settings['bottom_title']){ ?>
                                <div class="left">
                                    <h2><?php echo wp_kses($settings['bottom_title'], true);?></h2>
                                </div>
								<?php } ?>
                                <?php if($settings['btn_title']){ ?>
                                <div class="btns-box">
                                    <a class="btn-one" href="<?php echo esc_url($settings['btn_link']['url']); ?>">
                                        <span class="txt"><?php echo wp_kses($settings['btn_title'], true); ?></span>
                                    </a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<?php } ?>
        </div>
    </section>
    <!--End cooking Working Process Area-->      
             
        <?php
    }
}
