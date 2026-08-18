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
class Pricing_Plan extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_pricing_plan';
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
        return esc_html__( 'Pricing Plan', 'educamb' );
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
            'pricing_plan',
            [
                'label' => esc_html__( 'Pricing Plan', 'educamb' ),
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
					'one' => esc_html__( 'Choose Style One', 'educamb' ),
					'two' => esc_html__( 'Choose Style Two', 'educamb' ),
				),
			 ]
		);
		$this->add_control(
			'bg_image',
			[
				'label' => __( 'Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'sub_title',
			[
				'label'       => __( 'Sub Title', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
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
						['block_title' => esc_html__('Innovative Study', 'educamb')],
						['block_title' => esc_html__('Skilled & Caring Staff', 'educamb')],
						['block_title' => esc_html__('Good Environment', 'educamb')],
					],
				'fields' => 
				[
					[
						'name' => 'block_img',
						'label' => __( 'Slide Image', 'educamb' ),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'block_condition',
						'label' => esc_html__('Term & Conditon', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'block_price',
						'label' => esc_html__('Price', 'educamb'),
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
						'name' => 'features_list',
						'label' => esc_html__('Feature List', 'educamb'),
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
	
    <!--Start fees area-->
    <section class="<?php if($settings['style_two'] == 'two') echo 'fees-area pdtop110 bg-white'; else echo 'fees-area'; ?>">
        <?php if($settings['style_two'] == 'one') : ?>
        <div class="fees-area-shape" <?php if($settings['bg_image']['id']){ ?> style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);"<?php } ?>>
        </div>
        <?php endif; ?>
        <div class="container">
            <?php if($settings['sub_title'] || $settings['title']) { ?>
            <div class="sec-title-style2 text-center">
                <?php if($settings['sub_title']) { ?>
                <div class="sub-title">
                    <h5><?php echo wp_kses($settings['sub_title'], true);?></h5>
                </div>
                <?php } ?>
                <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
            </div>
            <?php } ?>
            <div class="row">
				<?php foreach($settings['features'] as $key => $item): ?>
                <!--Start Single Fees Box-->
                <div class="col-xl-4 col-lg-4">
                    <div class="single-fees-box">
                        <div class="vertical-line-text">
                            <?php echo wp_kses($item['block_condition'], true);?>
                        </div>
                        <div class="single-fees-box__inner">
                            <?php if($item['block_img']['id']) { ?>
                            <div class="img-box">
                                <img src="<?php echo esc_url(wp_get_attachment_url($item['block_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                            </div>
                            <?php } ?>
                            <div class="price-box">
                                <h2><?php echo wp_kses($item['block_price'], true);?></h2>
                                <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                            </div>
							<?php $features_list = $item['features_list'];
                                if(!empty($features_list)){
                                $features_list = explode("\n", ($features_list)); 
                            ?>
                            <ul>
                            	<?php foreach($features_list as $features): ?>
                                <li><span class="icon-check-mark"></span><?php echo wp_kses($features, true); ?></li>
                            	<?php endforeach; ?>
                            </ul>
                            <?php } ?>
                            <?php if($item['block_btn_title']) { ?>
                            <div class="btns-box">
                                <a class="btn-one" href="<?php echo esc_url($item['block_btn_link']['url']); ?>">
                                    <span class="txt"><?php echo wp_kses($item['block_btn_title'], true);?></span>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!--End Single Fees Box-->
				<?php endforeach; ?>
            </div>
        </div>
    </section>
    <!--End fees area-->      
             
        <?php
    }
}
