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
class Enterprise_Plan_V3 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_enterprise_plan_v3';
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
        return esc_html__( 'Enterprise Plan V3', 'educamb' );
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
            'enterprise_plan_v3',
            [
                'label' => esc_html__( 'Enterprise Plan V3', 'educamb' ),
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
		);$this->add_control(
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
	
    <!--Start Enterprise Plan Style3 Area-->
    <section class="enterprise-plan-style3-area">
        <?php if($settings['image']['id']){ ?>
        <div class="enterprise-plan-style3-area-bg"
            style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>);">
        </div>
        <?php } ?>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="enterprise-plan__content enterprise-plan__content--style3">
                        <div class="enterprise-plan__content__inner enterprise-plan__content__inner--style3">
                            <div class="sec-title-style5 text-left">
                                <?php if($settings['sub_title']){ ?><h2><?php echo wp_kses($settings['sub_title'], true);?></h2><?php } ?>
                                <?php if($settings['title']){ ?>
                                <div class="sub-title">
                                    <div class="line left"></div>
                                    <p><?php echo wp_kses($settings['title'], true);?></p>
                                </div>
                                <?php } ?>
                            </div>
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
                                        <?php echo wp_kses($settings['btn_title'], true); ?>
                                    </span>
                                </a>
                            </div>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Enterprise Plan Style3 Area-->    
        
        <?php
    }
}
