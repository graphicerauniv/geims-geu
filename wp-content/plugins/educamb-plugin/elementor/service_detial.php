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
class Service_Detial extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_service_detial';
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
        return esc_html__( 'Service Detail', 'educamb' );
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
            'service_detial',
            [
                'label' => esc_html__( 'Service Detail', 'educamb' ),
            ]
        );
		$this->add_control(
			'sidebar_slug',
			[
				'label'   => esc_html__( 'Choose Sidebar', 'educamb' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'Choose Sidebar',
				'options'  => educamb_get_sidebars(),
			]
		);
		$this->add_control(
			'feature_img',
			[
				'label' => __( 'Feature Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
				'label'       => __( 'Features List', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your features list', 'educamb' ),
			]
		);
		$this->add_control(
			'service_img',
			[
				'label' => __( 'Service Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'service_title',
			[
				'label'       => __( 'Service Title', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Service Title', 'educamb' ),
			]
		);
		$this->add_control(
			'service_text',
			[
				'label'       => __( 'Service Text', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Service Text', 'educamb' ),
			]
		);
		$this->add_control(
			'features_list_1',
			[
				'label'       => __( 'Features List 1', 'educamb' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your features list 1', 'educamb' ),
			]
		);
		$this->add_control(
              'faqs', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['block_title' => esc_html__('How To Create A Mobile App In Expo And Firebase ?', 'educamb')],
                			['block_title' => esc_html__('Smashing Podcast Episode With Ben How Optimize ?', 'educamb')],
							['block_title' => esc_html__('Learning Resources Challenging Online Workshops ?', 'educamb')],
							['block_title' => esc_html__('Micro-Typography: How To Space And Kern ?', 'educamb')]
            			],
            		'fields' => 
						[
							[
                    			'name' => 'block_title',
                    			'label' => esc_html__('Title', 'educamb'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'educamb')
                			],
							[
                    			'name' => 'block_text',
                    			'label' => esc_html__('Text', 'educamb'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'educamb')
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
		
        <!-- service-details -->
        <section class="service-details">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="content-side <?php if ( is_active_sidebar( $settings['sidebar_slug'] ) ) echo 'col-lg-8 col-md-12 col-sm-12 '; else echo 'col-xl-12 col-lg-12'; ?>">
                        <div class="service-details-content">
                            <?php if($settings['feature_img']['id']){ ?>
                            <figure class="image-box"><img src="<?php echo esc_url(wp_get_attachment_url($settings['feature_img']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>"></figure>
                            <?php } ?>
                            <div class="inner">
                                <?php if($settings['title']){ ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                                <?php if($settings['text']){ ?><p><?php echo wp_kses($settings['text'], true);?></p><?php } ?>
                                 
								 <?php $features_list = $settings['features_list'];
                                    if(!empty($features_list)){
                                    $features_list = explode("\n", ($features_list)); 
                                ?>
                                <ul class="list-item clearfix">
                                    <?php foreach($features_list as $features): ?>
                                    <li><?php echo wp_kses($features, true); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php } ?> 
                               
                            </div>
                            <div class="two-column">
                                <div class="row clearfix align-items-center">
                                     <?php if($settings['service_img']['id']){ ?>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="image-box"><img src="<?php echo esc_url(wp_get_attachment_url($settings['service_img']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>"></figure>
                                    </div>
                                    <?php } ?>
                                    <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                                        <div class="text">
                                            <?php if($settings['service_title']){ ?>
                                            <h3><?php echo wp_kses($settings['service_title'], true);?></h3>
                                           <?php } ?>
                                            <?php if($settings['service_text']){ ?>
                                            <p><?php echo wp_kses($settings['service_text'], true);?></p>
                                            <?php } ?>
											<?php $features_list_1 = $settings['features_list_1'];
												if(!empty($features_list_1)){
												$features_list_1 = explode("\n", ($features_list_1)); 
											?>
											<ul class="list-item clearfix">
												<?php foreach($features_list_1 as $features): ?>
												<li><?php echo wp_kses($features, true); ?></li>
												<?php endforeach; ?>
											</ul>
											<?php } ?> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-inner">
                                <ul class="accordion-box">
                                    <?php $count = 1; foreach($settings['faqs'] as $key => $item): ?>
                                    <li class="accordion block <?php if($count == 2) echo 'active-block'; ?>">
                                        <div class="acc-btn <?php if($count == 2) echo 'active'; ?>">
                                            <div class="icon-outer"><i class="far fa-plus"></i></div>
                                            <h6><?php echo wp_kses($item['block_title'], true);?></h6>
                                        </div>
                                        <div class="acc-content <?php if($count == 2) echo 'current'; ?>">
                                            <p><?php echo wp_kses($item['block_text'], true);?></p>
                                        </div>
                                    </li>
                                    <?php $count++; endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                     <?php if ( is_active_sidebar( $settings['sidebar_slug'] ) ) : ?>
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="service-sidebar default-sidebar">
                            <?php dynamic_sidebar( $settings['sidebar_slug'] ); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <!-- service-details end -->
      
        <?php
    }
}
