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
class Teaching_And_Learning extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_teaching_and_learning';
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
        return esc_html__( 'Teaching And Learning', 'educamb' );
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
            'teaching_and_learning',
            [
                'label' => esc_html__( 'Teaching And Learning', 'educamb' ),
            ]
        );
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
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
			'feature_title',
			[
				'label'       => __( 'Feature List Title', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
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
			'show_author_box',
			[
				'label'       => __( 'Enable/Disable Author Box', 'educamb' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'educamb' ),
				'label_off' => __( 'Hide', 'educamb' ),
				'return_value' => 'yes',
				'default' => 'no',
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
			'img_title',
			[
				'label'       => __( 'Image Title', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Image Title', 'educamb' ),
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
			'author_name',
			[
				'label'       => __( 'Author Name', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Author Name', 'educamb' ),
			]
		);
		$this->add_control(
			'author_designation',
			[
				'label'       => __( 'Designation', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Designation', 'educamb' ),
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
	
    <!--Start Teaching Area-->
    <section class="teaching-area">
        <div class="auto-container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="teaching-content">
                        <?php if($settings['title'] || $settings['text']) {?>
                        <div class="sec-title">
                            <?php if($settings['title']) {?><h2><?php echo wp_kses($settings['title'], true);?> </h2><?php } ?>
                            <?php if($settings['text']) {?>
                            <div class="sub-title">
                                <p><?php echo wp_kses($settings['text'], true);?></p>
                            </div>
							<?php } ?>
                        </div>
						<?php } ?>
                        <?php if($settings['feature_title']) {?>
                        <div class="inner-title">
                            <div class="border-line"></div>
                            <h3><?php echo wp_kses($settings['feature_title'], true);?></h3>
                        </div>
						<?php } ?>
						<?php $features_list = $settings['features_list'];
                            if(!empty($features_list)){
                            $features_list = explode("\n", ($features_list)); 
                        ?>
                        <ul>
                            <?php foreach($features_list as $features): ?>
                               <li><div class="dot-box"></div><?php echo wp_kses($features, true); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php } ?>
                        <?php if($settings['btn_title']) {?>
                        <div class="btns-box">
                            <a class="btn-one" href="<?php echo esc_url($settings['btn_link']['url']); ?>">
                                <span class="txt"><?php echo wp_kses($settings['btn_title'], true); ?></span>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
				<?php if($settings['show_author_box']) {?>
                <div class="col-xl-6">
                    <div class="teaching-img-box">
                        <?php if($settings['bg_image']['id']){ ?>
                        <div class="teaching-img-box__bg"
                            style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);"></div><?php } ?>
                        <div class="teaching-img-box__content-bg"></div>
                        <div class="teaching-img-box__content" data-aos="fade-left">
                            <div class="border-line"></div>
                            <h3><?php echo wp_kses($settings['img_title'], true);?></h3>
                            <div class="authorized-person">
                                <?php if($settings['sig_image']['id']){ ?>
                                <div class="signature">
                                    <img src="<?php echo esc_url(wp_get_attachment_url($settings['sig_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                                </div>
                                <?php } ?>
                                <h4><?php echo wp_kses($settings['author_name'], true);?></h4>
                                <p><?php echo wp_kses($settings['author_designation'], true);?></p>
                            </div>
                        </div>
                    </div>
                </div>
				<?php } ?>
            </div>
        </div>
    </section>
    <!--End Teaching Area-->

        
        <?php
    }
}
