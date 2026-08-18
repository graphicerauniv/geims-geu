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
class Photography_Gallery_Details extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_photography_gallery_details';
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
        return esc_html__( 'Photography Gallery Details', 'educamb' );
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
            'photography_gallery_details',
            [
                'label' => esc_html__( 'Photography Gallery Details', 'educamb' ),
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
			'info', 
			[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_text1' => esc_html__('Category:', 'educamb')],
						['block_text1' => esc_html__('Client:', 'educamb')],
						['block_text1' => esc_html__('Date:', 'educamb')],	
						['block_text1' => esc_html__('Project By:', 'educamb')],						
					],
				'fields' => 
				[
					[
						'name' => 'block_text1',
						'label' => esc_html__('Description', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'block_text2',
						'label' => esc_html__('Description', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'educamb')
					],
				],
				'title_field' => '{{block_text1}}',
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
				'placeholder' => __( 'Enter your Title', 'educamb' ),
			]
		);
		$this->add_control(
			'gallery', 
			[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['item#1' => esc_html__('Gallery Image', 'educamb')],
						['item#2' => esc_html__('Gallery Image', 'educamb')],
						['item#3' => esc_html__('Gallery Image', 'educamb')],
					],
				'fields' => 
				[
					[
						'name' => 'image1',
						'label' => __( 'Gallery Image', 'educamb' ),
						 'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
				],
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
		
        <!--Start Photography Gallery Deatils Area-->
        <section class="photography-gallery-details-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="photography-gallery-details-content">
                            <?php if($settings['image']['id']){ ?>
                            <div class="photography-gallery-details-img-box">
                                <img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                            </div>
                            <?php } ?>
                            <div class="photography-gallery-details-text-box">
                                <div class="project-info-box">
                                    <ul>
                                        <?php foreach($settings['info'] as $key => $item): ?>
                                        <li><h3><?php echo wp_kses($item['block_text1'], true);?><span><?php echo wp_kses($item['block_text2'], true);?></span></h3></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <?php if($settings['text']) { ?>
                                <div class="top-text">
                                    <p><?php echo wp_kses($settings['text'], true);?></p>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="photography-gallery-details-img-items">
                                <div class="row">
                                    <?php foreach($settings['gallery'] as $key => $item): ?>
                                    <div class="col-xl-4 col-lg-4">
                                        <div class="single-item">
                                            <img src="<?php echo esc_url(wp_get_attachment_url($item['image1']['id'])); ?>"
                                                alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php if($settings['text2']) { ?>
                            <div class="photography-gallery-details-bottom-text">
                                <p><?php echo wp_kses($settings['text2'], true);?></p>
                            </div>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Photography Gallery Deatils Area-->
                
        <?php 
	}

}
