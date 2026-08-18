<?php 

namespace EDUCAMBPLUGIN\Element;

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
class Involment_And_Activities extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'educamb_involment_and_activities';
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
		return esc_html__( 'Involment And Activities', 'educamb' );
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
			'involment_and_activities',
			[
				'label' => esc_html__( 'General', 'educamb' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title Here', 'educamb' ),
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
				'placeholder' => __( 'Enter your Text Here', 'educamb' ),
			]
		);
		$this->add_control(
			'style_two',
			 [
				'label'   => esc_html__( 'Choose Different Style', 'educamb' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
				'one' => esc_html__( 'Choose Style One', 'educamb' ),
				'two' => esc_html__( 'Choose Style Two', 'educamb' ),
				),
			 ]
		);
		$this->end_controls_section();
		
		//Arts Culture
		$this->start_controls_section(
            'arts_culture',
            [
                'label' => esc_html__( 'Arts Culture View', 'educamb' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
            ]
        );
		$this->add_control(
			'arts_btn_title',
			[
				'label'       => __( 'Arts Button Title', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Arts Button Title Here', 'educamb' ),
			]
		);
		$this->add_control(
		  'features_tab', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['tab_title' => esc_html__('Tourism & Culture', 'educamb')],
						['tab_title' => esc_html__('Educamb Talent Fest', 'educamb')],
						['tab_title' => esc_html__('The Cultural Fest', 'educamb')]
					],
				'fields' => 
				[
					[
						'name' => 'tab_image',
						'label' => __( 'Image', 'educamb' ),
						'type' => Controls_Manager::MEDIA,
						'label_block' => true,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'tab_title',
						'label' => esc_html__('Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'tab_text',
						'label' => esc_html__('Text', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'features_list',
						'label' => esc_html__('Feature List', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'educamb')
					],
				],
				'title_field' => '{{tab_title}}',
			 ]
        );
		$this->end_controls_section();
		
		//Sports Fitness
		$this->start_controls_section(
            'sports_fitness',
            [
                'label' => esc_html__( 'Sports Fitness View', 'educamb' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
            ]
        );
		$this->add_control(
			'sports_btn_title',
			[
				'label'       => __( 'Sports Button Title', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sports Button Title Here', 'educamb' ),
			]
		);
		$this->add_control(
		  'features_tab2', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['tab_title2' => esc_html__('Tourism & Culture', 'educamb')],
						['tab_title2' => esc_html__('Educamb Talent Fest', 'educamb')],
						['tab_title2' => esc_html__('The Cultural Fest', 'educamb')]
					],
				'fields' => 
				[
					[
						'name' => 'tab_image2',
						'label' => __( 'Image', 'educamb' ),
						'type' => Controls_Manager::MEDIA,
						'label_block' => true,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'tab_title2',
						'label' => esc_html__('Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'tab_text2',
						'label' => esc_html__('Text', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'features_list2',
						'label' => esc_html__('Feature List', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'educamb')
					],
				],
				'title_field' => '{{tab_title2}}',
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
    
    <!--Start Involment  Activities Area-->
    <section class="<?php if($settings['style_two'] == 'two') echo 'involment-activities-area'; else echo 'involment-activities-area involment-activities-area--style2'; ?>">
        <div class="container">
            <div class="sec-title text-center">
                <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
				<?php if($settings['text']) { ?>
                <div class="sub-title">
                    <p><?php echo wp_kses($settings['text'], true);?></p>
                </div>
                <?php } ?>
            </div>
			
            <div class="involment-activities-tab__button">
                <ul class="tabs-button-box clearfix">
                    <li data-tab="#arts-culture" class="tab-btn-item active-btn-item">
                        <h3><?php echo wp_kses($settings['arts_btn_title'], true); ?></h3>
                    </li>
                    <li data-tab="#sports-fitness" class="tab-btn-item">
                        <h3><?php echo wp_kses($settings['sports_btn_title'], true); ?></h3>
                    </li>
                </ul>
            </div>
            
            <div class="tabs-content-box">

                <!--Tab-->
                <div class="tab-content-box-item tab-content-box-item-active" id="arts-culture">
                    <div class="tabs-content-box__single-item">
                        <div class="row">
                            <?php foreach($settings['features_tab'] as $keys => $item): ?>
                            <!--Start Single Involment Activities Box-->
                            <div class="col-xl-4 col-lg-4">
                                <div class="single-involment-activities-box">
                                    <div class="img-box">
                                        <?php if($item['tab_image']['id']) { ?>
                                        <div class="inner">
                                            <img src="<?php echo esc_url(wp_get_attachment_url($item['tab_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                                        </div>
                                        <?php } ?>
                                        <div class="text-holder">
                                            <?php if($item['tab_title']) { ?><h3><?php echo wp_kses($item['tab_title'], true); ?></h3><?php } ?>
                                            <?php if($item['tab_text']) { ?><p><?php echo wp_kses($item['tab_text'], true); ?></p><?php } ?>
                                            <?php $features_list = $item['features_list'];
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
                            <!--End Single Involment Activities Box-->
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>

                <!--Tab-->
                <div class="tab-content-box-item" id="sports-fitness">
                    <div class="tabs-content-box__single-item">
                        <div class="row">
                            <?php foreach($settings['features_tab2'] as $keys => $item): ?>
                            <!--Start Single Involment Activities Box-->
                            <div class="col-xl-4 col-lg-4">
                                <div class="single-involment-activities-box">
                                    <div class="img-box">
                                        <?php if($item['tab_image2']['id']) { ?>
                                        <div class="inner">
                                            <img src="<?php echo esc_url(wp_get_attachment_url($item['tab_image2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                                        </div>
                                        <?php } ?>
                                        <div class="text-holder">
                                            <?php if($item['tab_title2']) { ?><h3><?php echo wp_kses($item['tab_title2'], true); ?></h3><?php } ?>
                                            <?php if($item['tab_text2']) { ?><p><?php echo wp_kses($item['tab_text2'], true); ?></p><?php } ?>
                                            <?php $features_list = $item['features_list2'];
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
                            <!--End Single Involment Activities Box-->
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Involment  Activities Area-->
             
	<?php 
	}

}
