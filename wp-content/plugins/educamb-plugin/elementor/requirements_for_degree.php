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
class Requirements_For_Degree extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_requirements_for_degree';
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
        return esc_html__( 'Requirements For Degree', 'educamb' );
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
            'requirements_for_degree',
            [
                'label' => esc_html__( 'Requirements For Degree', 'educamb' ),
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
			'features_list',
			[
				'label'       => __( 'Feature List', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your List', 'educamb' ),
			]
		);
		$this->add_control(
			'features_list2',
			[
				'label'       => __( 'Feature List', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your List', 'educamb' ),
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
    ?>
	
    <!--Start Requirements For Degree-->
    <section id="requirements" class="requirements-for-degree <?php if($settings['bg_color_style'] == 'bg_two') echo 'requirements-for-degree--style2'; else echo ''; ?>">
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
                <div class="col-xl-12">
                    <div class="requirements-for-degree__content">
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
                        <?php $features_list = $settings['features_list2'];
							if(!empty($features_list)){
							$features_list = explode("\n", ($features_list)); 
						?>
						<ul>
							<?php foreach($features_list as $features): ?>
							   <li><?php echo wp_kses($features, true); ?></li>
							<?php endforeach; ?>
						</ul>
						<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Requirements For Degree-->        
        
        <?php
    }
}
