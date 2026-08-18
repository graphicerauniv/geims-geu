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
class Need_Help extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_need_help';
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
        return esc_html__( 'Need Help', 'educamb' );
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
            'need_help',
            [
                'label' => esc_html__( 'Need Help', 'educamb' ),
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
			'image2',
			[
				'label' => __( 'Image 2', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'image3',
			[
				'label' => __( 'Image 3', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
		  'feature', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Item1', 'educamb')],
						['block_title' => esc_html__('Item2', 'educamb')],
					],
				'fields' => 
				[
					[
						'name' => 'image4',
						'label' => __( 'Image', 'educamb' ),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
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
						'type' => Controls_Manager::TEXTAREA,
					],
					[
						'name' => 'block_btn_title',
						'label' => esc_html__('Button Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'block_btn_link',
						'label' => __( 'Button Url', 'eminent' ),
						 'type' => Controls_Manager::URL,
						 'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
					[
						'name' => 'style_two',
						'label'   => esc_html__( 'Choose Different Style', 'educamb' ),
						'label_block' => true,
						'type'    => Controls_Manager::SELECT,
						'default' => 'one',
						'options' => array(
							'one' => esc_html__( 'Choose Style One', 'educamb' ),
							'two' => esc_html__( 'Choose Style Two', 'educamb' ),
						),
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
    ?>
	
    <!--Start academy Slogan Area-->
    <section class="academy-slogan-area">
        <div class="academy-slogan-middle-content">
            <?php if($settings['image']['id']){ ?>
            <div class="academy-slogan-middle-content__bg"
                style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>);">
            </div>
            <?php } ?>
            <?php if($settings['image2']['id']){ ?>
            <div class="banner-logo-box">
                <a href="index-3.html">
                    <img src="<?php echo esc_url(wp_get_attachment_url($settings['image2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                </a>
            </div>
            <?php } ?>
            <?php if($settings['image3']['id']){ ?>
            <div class="phone-box paroller">
                <img class="float-bob-y" src="<?php echo esc_url(wp_get_attachment_url($settings['image3']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
            </div>
            <?php } ?>
        </div>
        <div class="auto-container">
            <div class="row">
                <?php foreach($settings['feature'] as $key => $item): ?>
                <div class="col-xl-6">
                    <div class="<?php if($item['style_two'] == 'two') echo 'academy-slogan-content-one academy-slogan-content-one--style2'; else echo 'academy-slogan-content-one'; ?>">
                        <?php if($item['image4']['id']){ ?>
                        <div class="academy-slogan-content-one__bg"
                            style="background-image: url(<?php echo esc_url(wp_get_attachment_url($item['image4']['id'])); ?>);">
                        </div>
                        <?php } ?>
                        <div class="academy-slogan-content-one__inner text-center">
                            <div class="sec-title-style3">
                                <div class="sub-title">
                                    <h5><?php echo wp_kses($item['block_sub_title'], true);?></h5>
                                </div>
                                <h2><?php echo wp_kses($item['block_title'], true);?></h2>
                            </div>
                            <div class="btns-box">
                                <?php if($item['block_btn_title']){ ?>
                                <a class="btn-one btn-one--style4" href="<?php echo esc_url($item['block_btn_link']['url']); ?>">
                                    <span class="txt">
                                        <i class="icon-right-arrow-1"></i>
                                        <?php echo wp_kses($item['block_btn_title'], true);?>
                                    </span>
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
				<?php endforeach; ?>
            </div>
        </div>
    </section>
    <!--End academy Slogan Area-->       
        
        <?php
    }
}
