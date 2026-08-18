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
class Quiz_About_Us extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_quiz_about_us';
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
        return esc_html__( 'Quiz About Us', 'educamb' );
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
            'quiz_about_us',
            [
                'label' => esc_html__( 'Quiz About Us', 'educamb' ),
            ]
        );
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'educamb' ),
				'label_block' => true,
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
			'text2',
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
			'name',
			[
				'label'       => __( 'Author Name', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Name', 'educamb' ),
			]
		);
		$this->add_control(
			'designation',
			[
				'label'       => __( 'Designation', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Designation', 'educamb' ),
			]
		);
		$this->add_control(
			'sig_image',
			[
				'label' => __( 'Signature Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'pattern_image',
			[
				'label' => __( 'Pattern Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'image1',
			[
				'label' => __( 'About Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'curve_title',
			[
				'label'       => __( 'Title', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'educamb' ),
			]
		);
		$this->add_control(
			'image2',
			[
				'label' => __( 'About Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'image3',
			[
				'label' => __( 'About Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'image4',
			[
				'label' => __( 'About Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'image5',
			[
				'label' => __( 'About Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'image6',
			[
				'label' => __( 'About Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
	
    <!--Start Quiz Learning Intro Area-->
    <section class="quiz-learning-intro-area">
        <div class="quiz-learning-intro-area-gray-bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="quiz-learning-intro-title-box">
                        <div class="sec-title-style8">
                            <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                            <?php if($settings['text']) { ?><p><?php echo wp_kses($settings['text'], true);?></p><?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="quiz-learning-intro-content-box">
                        <?php if($settings['text2']) { ?><p><?php echo wp_kses($settings['text2'], true);?></p><?php } ?>
                        <div class="bottom">
                            <div class="name">
                                <?php if($settings['name']) { ?><h3><?php echo wp_kses($settings['name'], true);?></h3><?php } ?>
                                <?php if($settings['designation']) { ?><p><?php echo wp_kses($settings['designation'], true);?></p><?php } ?>
                            </div>
                            <?php if($settings['sig_image']['id']){ ?>
                            <div class="signature">
                                <img src="<?php echo esc_url(wp_get_attachment_url($settings['sig_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="quiz-learning-intro-img-box">
                        <?php if($settings['pattern_image']['id']){ ?>
                        <div class="quiz-learning-intro-img-box-shape">
                            <img class="float-bob-y" src="<?php echo esc_url(wp_get_attachment_url($settings['pattern_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                        </div>
                        <?php } ?>
                        <ul>
                            <?php if($settings['image1']['id']){ ?>
                            <li>
                                <div class="quiz-learning-intro-img-colum-one">
                                    <div class="single-img-box">
                                        <img src="<?php echo esc_url(wp_get_attachment_url($settings['image1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                                    </div>
                                </div>
                            </li>
                            <?php } ?>
                            <li>
                                <div class="quiz-learning-intro-img-colum-two">
                                    <?php if($settings['image2']['id'] || $settings['curve_title']){ ?>
                                    <div class="round-box-content">
                                        <?php if($settings['curve_title']) { ?><div class="curved-circle"><?php echo wp_kses($settings['curve_title'], true);?></div><?php } ?>
                                        <div class="logo-box">
                                            <img src="<?php echo esc_url(wp_get_attachment_url($settings['image2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <?php if($settings['image3']['id']){ ?>
                                    <div class="single-img-box">
                                        <img src="<?php echo esc_url(wp_get_attachment_url($settings['image3']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                                    </div>
                                    <?php } ?>
                                </div>
                            </li>
                            <li>
                                <?php if($settings['image4']['id']){ ?>
                                <div class="quiz-learning-intro-img-colum-three">
                                    <div class="single-img-box">
                                        <img src="<?php echo esc_url(wp_get_attachment_url($settings['image4']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                                    </div>
                                    <div class="icon-box">
                                        <span class="flaticon-idea"></span>
                                    </div>
                                </div>
                                <?php } ?>
                            </li>
                            <li>
                                <div class="quiz-learning-intro-img-colum-four">
                                    <?php if($settings['image5']['id']){ ?>
                                    <div class="single-img-box">
                                        <img src="<?php echo esc_url(wp_get_attachment_url($settings['image5']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                                    </div>
                                    <?php } ?>
                                    <?php if($settings['image6']['id']){ ?>
                                    <div class="single-img-box style2">
                                        <img src="<?php echo esc_url(wp_get_attachment_url($settings['image6']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                                    </div>
                                    <?php } ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--End Quiz Learning Intro Area-->        
        
        <?php
    }
}
