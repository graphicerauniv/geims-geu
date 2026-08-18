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
class Programmes_Offered_Tab extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'educamb_programmes_offered_tab';
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
		return esc_html__( 'Programmes Offered Tab', 'educamb' );
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
			'programmes_offered_tab',
			[
				'label' => esc_html__( 'Programmes Offered Tab', 'educamb' ),
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
		  'features_tab', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['btn_title' => esc_html__('b.a', 'educamb')],
						['btn_title' => esc_html__('m.a', 'educamb')],
						['btn_title' => esc_html__('m.phil / ph.d', 'educamb')],

					],
				'fields' => 
				[
					[
						'name' => 'btn_title',
						'label' => esc_html__('Tab Button Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'title',
						'label' => esc_html__('Tab Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'text',
						'label' => esc_html__('Text', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'title2',
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
						'name' => 'feature_text',
						'label' => esc_html__('Feature Text', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'btn_title2',
						'label' => esc_html__('Button Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'educamb')
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
				'title_field' => '{{btn_title}}',
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
    
    <!--Start Programmes Offered Area-->
    <section id="programmes" class="programmes-offered-area">
        <div class="auto-container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="programmes-offered-img-box">
                        <?php if($settings['bg_image']['id']){ ?>
                        <div class="programmes-offered-img-bg"
                            style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);">
                        </div>
                        <?php } ?>
                        <div class="programmes-offered-tab-btn">
                            <ul class="tabs-button-box clearfix">
                                <?php $count = 1; foreach($settings['features_tab'] as $key => $item): ?>
                                <li data-tab="#<?php echo esc_attr($count); ?>" class="tab-btn-item <?php if($count == 1) echo 'active-btn-item' ?>">
                                    <?php if($item['btn_title']) { ?><h3><?php echo wp_kses($item['btn_title'], true); ?></h3><?php } ?>
                                </li>
                                <?php $count++; endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="tabs-content-box">
                        <?php $count = 1; foreach($settings['features_tab'] as $keys => $item): ?>
                        <!--Tab-->
                        <div class="tab-content-box-item <?php if($count == 1) echo 'tab-content-box-item-active';?>" id="<?php echo esc_attr($count);?>">
                            <div class="programmes-offered-content-box">
                                <div class="sec-title">
                                    <?php if($item['title']) { ?><h2><?php echo wp_kses($item['title'], true); ?></h2><?php } ?>
                                    <?php if($item['text']) { ?>
                                    <div class="sub-title">
                                        <p><?php echo wp_kses($item['text'], true); ?></p>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="inner-content">
                                    <?php if($item['title2']) { ?>
                                    <div class="icon">
                                        <span class="icon-mortarboard"></span>
                                    </div>
                                    <h3><?php echo wp_kses($item['title2'], true); ?></h3>
                                    <?php } ?>
                                    <?php if($item['tab_text']) { ?><p><?php echo wp_kses($item['tab_text'], true); ?></p><?php } ?>
                                    <?php if($item['feature_text']) { ?>
                                    <ul>
                                        <?php echo wp_kses($item['feature_text'], true); ?>
                                    </ul>
                                    <?php } ?>
                                    <?php if($item['btn_title2']) { ?>
                                    <div class="btns-box">
                                        <a class="btn-one btn-one--style2" href="<?php echo esc_url($item['btn_link']['url']); ?>">
                                            <span class="txt"><span class="icon-down-arrow-1"></span><?php echo wp_kses($item['btn_title2'], true); ?></span>
                                        </a>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php $count++; endforeach;?>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Programmes Offered Area-->
        
		<?php 
	}

}
