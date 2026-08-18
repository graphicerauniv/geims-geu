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
class Our_Programs_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_our_programs_v2';
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
        return esc_html__( 'Our Programs V2', 'educamb' );
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
            'our_programs_v2',
            [
                'label' => esc_html__( 'Our Programs V2', 'educamb' ),
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
			'show_counter_box',
			[
				'label'       => __( 'Enable/Disable Counter Box', 'educamb' ),
						'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'educamb' ),
				'label_off' => __( 'Hide', 'educamb' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'counter_title',
			[
				'label'       => __( 'Counter Title', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Counter Title', 'educamb' ),
			]
		);
		$this->add_control(
			'counter_start',
			[
				'label'       => __( 'Counter Start', 'educamb' ),
				'type'        => Controls_Manager::NUMBER,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Counter Start', 'educamb' ),
			]
		);
		$this->add_control(
			'counter_stop',
			[
				'label'       => __( 'Counter Stop', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Counter Stop', 'educamb' ),
			]
		);
		$this->add_control(
			'alphabet_letter',
			[
				'label'       => __( 'Alphabet Letter', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Alphabet Letter', 'educamb' ),
			]
		);
		$this->add_control(
			'fg_color',
			[
				'label'       => __( 'FG Color Code', 'educamb' ),
				'type'        => Controls_Manager::COLOR,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Alphabet Letter', 'educamb' ),
			]
		);
		$this->add_control(
			'bg_color',
			[
				'label'       => __( 'BG Color Code', 'educamb' ),
				'type'        => Controls_Manager::COLOR,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Alphabet Letter', 'educamb' ),
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
				'placeholder' => __( 'Enter your Feature List', 'educamb' ),
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
	
    <!--Start Kindergarten Programs Area-->
    <section class="kindergarten-programs-area">
        <div class="container">
            <div class="row">

                <div class="col-xl-6">
                    <div class="kindergarten-programs-img-box">
                        <?php if($settings['about_image']['id']){ ?>
                        <div class="top-img-box">
                            <div class="inner">
                                <img src="<?php echo esc_url(wp_get_attachment_url($settings['about_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                            </div>
                        </div>
                        <?php } ?>
                        <?php if($settings['about_image_1']['id']){ ?>
                        <div class="big-img-box">
                            <div class="inner">
                                <img src="<?php echo esc_url(wp_get_attachment_url($settings['about_image_1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                            </div>
                        </div>
                        <?php } ?>
                        <?php if($settings['show_counter_box']) { ?>
                        <div class="kindergarten-programs-progress-box">
                            <div class="progress-block">
                                <div class="inner-box">
                                    <div class="graph-outer">
                                        <input type="text" class="dial" data-fgColor="<?php echo esc_attr($settings['fg_color']);?>"
                                            data-bgColor="<?php echo esc_attr($settings['bg_color']);?>" data-width="160" data-height="160"
                                            data-linecap="normal" value="<?php echo esc_attr($settings['counter_stop']);?>">
                                        <div class="inner-text count-box">
                                            <div class="percent">
                                                <span class="count-text" data-stop="<?php echo esc_attr($settings['counter_stop']);?>" data-speed="2000"></span><?php echo esc_attr($settings['alphabet_letter']);?>
                                            </div>
                                            <h3><?php echo wp_kses($settings['counter_title'], true);?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>                    
                </div>

                <div class="col-xl-6">
                    <div class="kindergarten-programs-text-box">
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
                            <div class="top-text">
                                <p><?php echo wp_kses($settings['text'], true);?></p>
                            </div>
                            <?php } ?>
                            <?php $features_list = $settings['features_list'];
								if(!empty($features_list)){
								$features_list = explode("\n", ($features_list)); 
							?>
							<ul>
								<?php foreach($features_list as $features): ?>
								   <li>
                                        <div class="icon">
                                            <span class="icon-turtle"></span>
                                        </div>
                                        <div class="text">
                                            <p><?php echo wp_kses($features, true); ?></p>
                                        </div>
                                    </li>
								<?php endforeach; ?>
   							</ul>
							<?php } ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Kindergarten Programs Area-->        
        
        <?php
    }
}
