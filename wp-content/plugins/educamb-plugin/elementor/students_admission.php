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
class Students_Admission extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_students_admission';
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
        return esc_html__( 'Students Admission', 'educamb' );
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
            'students_admission',
            [
                'label' => esc_html__( 'Students Admission', 'educamb' ),
            ]
        );
		$this->add_control(
		    'info', 
		    [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Oportunities', 'educamb')],
						['block_title' => esc_html__('Scholarship', 'educamb')]
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
						'name' => 'block_title',
						'label' => esc_html__('Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'block_text',
						'label' => esc_html__('Description', 'educamb'),
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
						'label' => __( 'Button Url', 'educamb' ),
						 'type' => Controls_Manager::URL,
						 'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
					[
						'name' => 'block_btn_title2',
						'label' => esc_html__('Button Title 2', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'block_btn_link2',
						'label' => __( 'Button Url 2', 'educamb' ),
						 'type' => Controls_Manager::URL,
						 'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
					[
						'name' => 'block_btn_title3',
						'label' => esc_html__('Button Title 3', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'block_btn_link3',
						'label' => __( 'Button Url 3', 'educamb' ),
						 'type' => Controls_Manager::URL,
						 'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
					[
						'name' => 'block_btn_title4',
						'label' => esc_html__('Button Title 4', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'block_btn_link4',
						'label' => __( 'Button Url 4', 'educamb' ),
						 'type' => Controls_Manager::URL,
						 'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
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
					[
						'name' => 'style_two',
						'label'   => esc_html__( 'Choose Different Style', 'educamb' ),
						'label_block' => true,
						'type'    => Controls_Manager::SELECT,
						'default' => 'one',
						'options' => array(
							'one' => esc_html__( 'Choose Style Left Image', 'educamb' ),
							'two' => esc_html__( 'Choose Style Right Image', 'educamb' ),
						),
					],
				],
				'title_field' => '{{block_title}}',
			 ]
        );
		$this->add_control(
			'bg_color_style',
			 [
				'label'   => esc_html__( 'Choose Different BG Color Style', 'educamb' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'bg_one',
				'options' => array(
					'bg_one' => esc_html__( 'Choose Style One', 'educamb' ),
					'bg_two' => esc_html__( 'Choose Style Two', 'educamb' ),
				),
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
	
    <!-- Start Admissions Style1 Area -->
    <section class="admission-style1-area <?php if($settings['bg_color_style'] == 'bg_two') echo 'gray-bg'; else echo ''; ?>">
        <div class="auto-container">
            <?php foreach($settings['info'] as $key => $item): ?>
            <?php if($item['style_two'] == 'two') :?>
            <div class="row">
                <div class="col-xl-6 order-22">
                    <div class="admission-style1-content-box admission-style1-content-box--style2">
                        <div class="admission-style1-content-box__inner">
                            <div class="sec-title">
                                <h2><?php echo wp_kses($item['block_title'], true);?></h2>
                            </div>
                            <div class="text">
                                <p><?php echo wp_kses($item['block_text'], true);?></p>
                            </div>
                            <ul class="start-admission-box">
                                <?php if($item['block_btn_title']) { ?>
                                <li>
                                    <div class="icon">
                                        <span class="icon-diagonal-arrow"></span>
                                    </div>
                                    <h3><a href="<?php echo esc_url($item['block_btn_link']['url']); ?>"><?php echo wp_kses($item['block_btn_title'], true);?></a></h3>
                                </li>
                                <?php } ?>
                                <?php if($item['block_btn_title2']) { ?>
                                <li>
                                    <div class="icon">
                                        <span class="icon-diagonal-arrow"></span>
                                    </div>
                                    <h3><a href="<?php echo esc_url($item['block_btn_link2']['url']); ?>"><?php echo wp_kses($item['block_btn_title2'], true);?></a></h3>
                                </li>
                                <?php } ?>
                                <?php if($item['block_btn_title3']) { ?>
                                <li>
                                    <div class="icon">
                                        <span class="icon-diagonal-arrow"></span>
                                    </div>
                                    <h3><a href="<?php echo esc_url($item['block_btn_link3']['url']); ?>"><?php echo wp_kses($item['block_btn_title3'], true);?></a></h3>
                                </li>
                                <?php } ?>
                                <?php if($item['block_btn_title4']) { ?>
                                <li>
                                    <div class="icon">
                                        <span class="icon-diagonal-arrow"></span>
                                    </div>
                                    <h3><a href="<?php echo esc_url($item['block_btn_link4']['url']); ?>"><?php echo wp_kses($item['block_btn_title4'], true);?></a></h3>
                                </li>
                                <?php } ?>
                            </ul>

                            <div class="bottom-box">
                                <?php if($item['block_box_title'] || $item['block_box_title2']) { ?>
                                <div class="icon">
                                    <span class="icon-download"></span>
                                </div>
                                <div class="inner-title">
                                    <h3><?php echo wp_kses($item['block_box_title'], true);?></h3>
                                    <p><a href="<?php echo esc_url($item['block_download_link']['url']); ?>"><?php echo wp_kses($item['block_box_title2'], true);?></a></p>
                                </div>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                </div>
                <?php if($item['image']['id']) { ?>
                <div class="col-xl-6 order-11">
                    <div class="admission-style1-img-box">
                        <div class="admission-style1-img-box__bg"
                            style="background-image: url(<?php echo esc_url(wp_get_attachment_url($item['image']['id'])); ?>);">
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
			<?php else : ?>
            <div class="row">
                <?php if($item['image']['id']) { ?>
                <div class="col-xl-6">
                    <div class="admission-style1-img-box">
                        <div class="admission-style1-img-box__bg"
                            style="background-image: url(<?php echo esc_url(wp_get_attachment_url($item['image']['id'])); ?>);"></div>
                    </div>
                </div>
                <?php } ?>
                <div class="col-xl-6">
                    <div class="admission-style1-content-box">
                        <div class="admission-style1-content-box__inner">
                            <?php if($item['block_title']) { ?>
                            <div class="sec-title">
                                <h2><?php echo wp_kses($item['block_title'], true);?></h2>
                            </div>
                            <?php } ?>
                            <div class="text">
                                <p><?php echo wp_kses($item['block_text'], true);?></p>
                            </div>
                            
                            <ul class="start-admission-box">
                                <?php if($item['block_btn_title']) { ?>
                                <li>
                                    <div class="icon">
                                        <span class="icon-diagonal-arrow"></span>
                                    </div>
                                    <h3><a href="<?php echo esc_url($item['block_btn_link']['url']); ?>"><?php echo wp_kses($item['block_btn_title'], true);?></a></h3>
                                </li>
                                <?php } ?>
                                <?php if($item['block_btn_title2']) { ?>
                                <li>
                                    <div class="icon">
                                        <span class="icon-diagonal-arrow"></span>
                                    </div>
                                    <h3><a href="<?php echo esc_url($item['block_btn_link3']['url']); ?>"><?php echo wp_kses($item['block_btn_title2'], true);?></a></h3>
                                </li>
                                <?php } ?>
                                <?php if($item['block_btn_title3']) { ?>
                                <li>
                                    <div class="icon">
                                        <span class="icon-diagonal-arrow"></span>
                                    </div>
                                    <h3><a href="<?php echo esc_url($item['block_btn_link3']['url']); ?>"><?php echo wp_kses($item['block_btn_title3'], true);?></a></h3>
                                </li>
                                <?php } ?>
                                <?php if($item['block_btn_title4']) { ?>
                                <li>
                                    <div class="icon">
                                        <span class="icon-diagonal-arrow"></span>
                                    </div>
                                    <h3><a href="<?php echo esc_url($item['block_btn_link4']['url']); ?>"><?php echo wp_kses($item['block_btn_title4'], true);?></a></h3>
                                </li>
                                <?php } ?>
                            </ul>

                            <div class="bottom-box">
                                <?php if($item['block_box_title'] || $item['block_box_title2']) { ?>
                                <div class="icon">
                                    <span class="icon-download"></span>
                                </div>
                                <div class="inner-title">
                                    <h3><?php echo wp_kses($item['block_box_title'], true);?></h3>
                                    <p><a href="<?php echo esc_url($item['block_download_link']['url']); ?>"><?php echo wp_kses($item['block_box_title2'], true);?></a></p>
                                </div>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
			<?php endif; endforeach; ?>
        </div>
    </section>
    <!-- End Admissions Style1 Area -->
    
    
    <!--Start Intro Style1 Area-->
                     
        <?php
    }
}
