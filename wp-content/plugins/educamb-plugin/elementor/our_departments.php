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
class our_departments extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'educamb_our_departments';
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
		return esc_html__( 'Our Departments', 'educamb' );
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
			'our_departments',
			[
				'label' => esc_html__( 'Our Departments', 'educamb' ),
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
		  'features_tab', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title1' => esc_html__('Accounting', 'educamb')],
						['block_title1' => esc_html__('Business', 'educamb')],
						['block_title1' => esc_html__('Undergraduate', 'educamb')],
						['block_title1' => esc_html__('Computer', 'educamb')],
						['block_title1' => esc_html__('Health Sciences', 'educamb')],
						['block_title1' => esc_html__('Plant Sciences', 'educamb')],
						['block_title1' => esc_html__('Public Safety', 'educamb')],
						['block_title1' => esc_html__('Health Sciences', 'educamb')],
						['block_title1' => esc_html__('Plant Sciences', 'educamb')],
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
						'name' => 'block_title1',
						'label' => esc_html__('Block Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'description',
						'label' => esc_html__('Text', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
					],
					[
						'name' => 'feature_image',
						'label' => __( 'Feature Image', 'educamb' ),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'sub_title',
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
					[
						'name' => 'features_list',
						'label' => esc_html__('Feature List', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
					],
					[
						'name' => 'btn_title',
						'label' => esc_html__('Tab Button Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'btn_link',
						'label' => __( 'External Url', 'educamb' ),
						 'type' => Controls_Manager::URL,
						 'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
				'title_field' => '{{block_title1}}',
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
    
    <!--Start Departments Style2 Area-->
    <section class="departments-style2-area">
        <div class="container">
            <?php if($settings['title'] || $settings['text']){ ?>
            <div class="sec-title text-center">
                <?php if($settings['title']){ ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                
				<?php if($settings['text']){ ?>
                <div class="sub-title">
                    <p><?php echo wp_kses($settings['text'], true);?></p>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
            
            <div class="row">
				<?php foreach($settings['features_tab'] as $keys => $item): ?>
                <!--Start Single Departments Box Style2-->
                <div class="col-xl-4 col-lg-4">
                    <div class="single-departments-box single-department-box-style2">
                        <div class="single-department-box-style2__inner text-center">
                            <div class="static-content">
                                
								<?php if($item['icons']){ ?>
                                <div class="icon">
                                    <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                                    <div class="round-box"></div>
                                </div>
                                <?php } ?>
                                
                                <div class="text-holder">
                                    <?php if($item['block_title1']){ ?>
                                    <a href="<?php echo esc_url($item['btn_link']['url']); ?>"><?php echo wp_kses($item['block_title1'], true); ?></a>
                                    <?php } ?>
                                    
                                    <div class="text">
                                        <p><?php echo wp_kses($item['description'], true); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="overlay-box"
                                style="background-image: url(<?php echo esc_url(wp_get_attachment_url($item['feature_image']['id'])); ?>);">
                            </div>
                        </div>

                        <div class="single-department-box-style2__ovarlay-content">
                            <div class="inner">
                                <h5><?php echo wp_kses($item['sub_title'], true); ?></h5>
                                <h3><?php echo wp_kses($item['block_title'], true); ?></h3>
                                <p><?php echo wp_kses($item['description'], true); ?></p>
                                <?php $features_list = $item['features_list'];
									if(!empty($features_list)){
									$features_list = explode("\n", ($features_list)); 
								?>
                                <ul>
                                    <?php foreach($features_list as $features): ?>
                                    <li>
                                        <div class="dot-box"></div>
                                        <div class="inner-text">
                                            <?php echo wp_kses($features, true); ?>
                                        </div>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php } ?>
                                <?php if($item['btn_title']){ ?>
                                <div class="btn-box">
                                    <a class="btn-one btn-one--style2" href="<?php echo esc_url($item['btn_link']['url']); ?>">
                                        <span class="txt"><?php echo wp_kses($item['btn_title'], true); ?></span>
                                    </a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                </div>
                <!--End Single Departments Box Style2-->
				<?php endforeach;?>
            </div>
        </div>
    </section>
    <!--End Departments Style2 Area-->
            
	<?php 
	}

}
