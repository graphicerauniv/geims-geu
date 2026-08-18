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
class Enterprise_Plan extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_enterprise_plan';
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
        return esc_html__( 'Enterprise Plan', 'educamb' );
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
            'enterprise_plan',
            [
                'label' => esc_html__( 'Enterprise Plan', 'educamb' ),
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
			'features_list',
			[
				'label'       => __( 'Feature List', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Feature List', 'educamb' ),
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
			'box_title',
			[
				'label'       => __( 'Box Text', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'educamb' ),
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
	
    <!--Start Enterprise Plan Area-->
    <section class="enterprise-plan-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="enterprise-plan__content">
                        <?php if($settings['image']['id']){ ?>
                        <div class="enterprise-plan__content-bg"
                            style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>);">
                        </div>
                        <?php } ?>
                        <div class="enterprise-plan__content__inner">
                            <?php if($settings['sub_title'] || $settings['title']) { ?>
                            <div class="sec-title-style3">
                                <?php if($settings['sub_title']) { ?>
                                <div class="sub-title">
                                    <h5><?php echo wp_kses($settings['sub_title'], true);?></h5>
                                </div>
                                <?php } ?>
                                <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                            </div>
                            <?php } ?>
							<?php $features_list = $settings['features_list'];
								if(!empty($features_list)){
								$features_list = explode("\n", ($features_list)); 
							?>
							<ul>
								<?php foreach($features_list as $features): ?>
								<li><?php echo wp_kses($features, true); ?></li>
								<?php endforeach; ?>
							</ul>
							<?php } ?>
                            <?php if($settings['btn_title']){ ?>
                            <div class="btns-box">
                                <a class="btn-one btn-one--style4" href="<?php echo esc_url($settings['btn_link']['url']); ?>">
                                    <span class="txt">
                                        <i class="icon-right-arrow-1"></i>
                                        <?php echo wp_kses($settings['btn_title'], true); ?>
                                    </span>
                                </a>
                            </div>
							<?php } ?>
                            <?php if($settings['box_title']){ ?>
                            <div class="total-enrollment-content-box">
                                <div class="icon-outer float-bob-y">
                                    <span class="icon-arrows"></span>
                                </div>
                                <h4><?php echo wp_kses($settings['box_title'], true); ?></h4>
                            </div>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Enterprise Plan Area-->       
        
        <?php
    }
}
