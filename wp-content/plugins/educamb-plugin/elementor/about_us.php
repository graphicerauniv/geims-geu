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
class About_Us extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_about_us';
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
        return esc_html__( 'About Us', 'educamb' );
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
            'about_us',
            [
                'label' => esc_html__( 'About Us', 'educamb' ),
            ]
        );
		$this->add_control(
			'about_image',
			[
				'label' => __( 'About Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'about_image_1',
			[
				'label' => __( 'About Image 1', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
		  'feature', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Item1', 'educamb')],
						['block_title' => esc_html__('Item2', 'educamb')],
						['block_title' => esc_html__('Item3', 'educamb')],
						['block_title' => esc_html__('Item4', 'educamb')],
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
						'type' => Controls_Manager::TEXTAREA,
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
							'three' => esc_html__( 'Choose Style Three', 'educamb' ),
						),
					],
				],
				'title_field' => '{{block_title}}',
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
    ?>
		
    <!--Start About Style2 Area-->
    <section class="about-style2-area">
        <div class="container">
            <div class="row text-right-rtl">

                <div class="col-xl-6">
                    <?php if($settings['about_image']['id'] || $settings['about_image_1']['id']){ ?>
                    <div class="about-style2__image">
                        <?php if($settings['about_image']['id']){ ?>
                        <div class="inner">
                            <div class="inner__img">
                                <img src="<?php echo esc_url(wp_get_attachment_url($settings['about_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                            </div>
                        </div>
                        <?php } ?>
                        <?php if($settings['about_image_1']['id']){ ?>
                        <div class="overlay-round-img-box float-bob-y">
                            <div class="inner_img">
                                <img src="<?php echo esc_url(wp_get_attachment_url($settings['about_image_1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>

                <div class="col-xl-6">
                    <div class="about-style2__content">
                        <div class="sec-title-style2">
                            <?php if($settings['sub_title']) { ?>
                            <div class="sub-title">
                                <h5><?php echo wp_kses($settings['sub_title'], true);?></h5>
                            </div>
                            <?php } ?>
							<?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                        </div>
                        <div class="inner-content">
                            <?php if($settings['text']) { ?>
                            <div class="text">
                                <p><?php echo wp_kses($settings['text'], true);?></p>
                            </div>
                            <?php } ?>
                            <ul>
                                <?php foreach($settings['feature'] as $key => $item): ?>
                                <li class="<?php if($item['style_two'] == 'three') echo 'style3'; elseif($item['style_two'] == 'two') echo 'style2'; else echo ''; ?>">
                                    <div class="icon">
                                        <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                                    </div>
                                    <?php if($item['block_title']) {?><h3><?php echo wp_kses($item['block_title'], true);?></h3><?php } ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
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
    </section>
    <!--End About Style2 Area-->        
        
        <?php
    }
}
