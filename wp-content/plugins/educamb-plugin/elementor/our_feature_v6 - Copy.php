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
           'features', 
		   [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('You can study anytime anywhere', 'educamb')],
						['block_title' => esc_html__('Our Courses are more affordable', 'educamb')],
						['block_title' => esc_html__('All the details will be safely stored', 'educamb')],
						['block_title' => esc_html__('Learn without the need of traveling', 'educamb')],
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
	
    <!--Start cooking Working Process Area-->
    <section class="cooking-working-process-area">
        <div class="auto-container">
            <div class="sec-title-style7 text-center">
                <div class="sub-title">
                    <p>How It’s Work</p>
                    <div class="zigzag gray-bg"></div>
                </div>
                <h2>Make You Expert at Cooking</h2>
            </div>
            <div class="row">
                <?php $i= 1; foreach($settings['features'] as $key => $item): ?>
                <!--Start Sinlge Cooking Working Process -->
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="sinlge-cooking-working-process">
                        <div class="cooking-working-process-shape-top">
                            <img src="assets/images/cooking-course/shape/cooking-working-process-shape-top.png"
                                alt="">
                        </div>
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
                <!--Start Sinlge Cooking Working Process -->
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="sinlge-cooking-working-process margin-top40">
                        <div class="cooking-working-process-shape-bottom">
                            <img src="assets/images/cooking-course/shape/cooking-working-process-shape-bottom.png"
                                alt="">
                        </div>
                        <div class="counting-box">02</div>
                        <div class="text-box">
                            <span class="flaticon-credit-cards"></span>
                            <h3>Make Payment</h3>
                            <p>Choice is untrammelled and when nothing prevents best.</p>
                        </div>
                    </div>
                </div>
                <!--End Sinlge Cooking Working Process -->
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="cooking-working-process-bottom-content">
                        <div class="container">
                            <div class="cooking-working-process-bottom-content__inner">
                                <div class="left">
                                    <h2><span>Under $8?..</span> Unleashing the best cook in you!..</h2>
                                </div>
                                <div class="btns-box">
                                    <a class="btn-one" href="about-2.html">
                                        <span class="txt">Start to Cook</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--End cooking Working Process Area-->
    
    
    
    <!--Start Academy Why Choose Area-->
    <section class="academy-why-choose-area">
        <div class="auto-container">
            <div class="row">
				<?php foreach($settings['features'] as $key => $item): ?>
                <!--Start Single Academy Why Choose Box-->
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="single-academy-why-choose-box">
                        <div class="icon">
                            <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                        </div>
                        <div class="text">
                            <h3><?php echo wp_kses($item['block_sub_title'], true);?></h3>
                            <p><?php echo wp_kses($item['block_title'], true);?></p>
                        </div>
                    </div>
                </div>
                <!--End Single Academy Why Choose Box-->
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!--End Academy Why Choose Area-->       
             
        <?php
    }
}
