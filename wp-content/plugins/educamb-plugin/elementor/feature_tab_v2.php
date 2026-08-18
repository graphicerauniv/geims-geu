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
class Feature_Tab_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'educamb_feature_tab_v2';
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
		return esc_html__( 'Feature Tab V2', 'educamb' );
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
			'feature_tab_v2',
			[
				'label' => esc_html__( 'Feature Tab V2', 'educamb' ),
			]
		);
		$this->add_control(
			'bg_image',
			[
				'label' => __( 'BG Image', 'educamb' ),
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
						['btn_title' => esc_html__('Mission Statement', 'educamb')],
						['btn_title' => esc_html__('Vision Statement', 'educamb')],
						['btn_title' => esc_html__('Our Values', 'educamb')],
						['btn_title' => esc_html__('Sustainability', 'educamb')],

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
					[
						'name' => 'tab_text',
						'label' => esc_html__('Text', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
					],
					[
						'name' => 'iconss',
						'label' => esc_html__('Enter The icons', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::SELECT2,
						'options'  => get_fontawesome_icons(),
					],
					[
						'name' => 'btn_title2',
						'label' => esc_html__('Tab Button Title 2', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'btn_link2',
						'label' => __( 'External Url 2', 'educamb' ),
						 'type' => Controls_Manager::URL,
						 'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
					[
						'name' => 'tab_text2',
						'label' => esc_html__('Text 2', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
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
    
    <!--Start Statements style2 Area-->
    <section class="statements-style2-area">
        <div class="statements-area-bg" <?php if($settings['bg_image']['id']){ ?>
            style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);"<?php } ?>></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="statements-tab">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="tabs-content-box">
									<?php $count = 1; foreach($settings['features_tab'] as $keys => $item): ?>
                                    <!--Tab-->
                                    <div class="tab-content-box-item <?php if($count == 1) echo 'tab-content-box-item-active';?>" id="<?php echo esc_attr($count);?>">
                                        <div class="statements-tab__content">
                                            <div class="theme_carousel statements-tab-carousel owl-theme owl-carousel owl-nav-style-one"
                                                data-options='{
                                                    "loop": true, 
                                                    "margin": 0, 
                                                    "autoheight":true, 
                                                    "lazyload":true, 
                                                    "nav": true, 
                                                    "dots": false, 
                                                    "autoplay": true, 
                                                    "autoplayTimeout": 5000, 
                                                    "smartSpeed": 500, 
                                                    "navText": ["<span class=\"left icon-right-arrow-1\"></span>",
                                                    "<span class=\"right icon-right-arrow-1\"></span>"], 
                                                    "responsive":{ 
                                                    "0" :{ "items": "1" }, 
                                                    "600" :{ "items" : "1" }, 
                                                    "768" :{ "items" : "1" }, 
                                                    "992":{ "items" : "1" }, 
                                                    "1200":{ "items" : "1" }
                                                }
                                                }'>

                                                <!--Start Single Box-->
                                                <div class="single-box">
                                                    <div class="text-holder">
                                                        <h3><a href="<?php echo esc_url($item['btn_link']['url']); ?>"><?php echo wp_kses($item['btn_title'], true); ?></a></h3>
                                                        <?php if($item['tab_text']) { ?><p><?php echo wp_kses($item['tab_text'], true); ?></p><?php } ?>
                                                    </div>
                                                    <div class="icon-holder">
                                                        <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                                                    </div>
                                                </div>
                                                <!--End Single Box-->
                                                <!--Start Single Box-->
                                                <div class="single-box">
                                                    <div class="text-holder">
                                                        <h3><a href="<?php echo esc_url($item['btn_link2']['url']); ?>"><?php echo wp_kses($item['btn_title2'], true); ?></a></h3>
                                                        <?php if($item['tab_text2']) { ?><p><?php echo wp_kses($item['tab_text2'], true); ?></p><?php } ?>
                                                    </div>
                                                    <div class="icon-holder">
                                                        <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['iconss']), true);?>"></span>
                                                    </div>
                                                </div>
                                                <!--End Single Box-->

                                            </div>
                                        </div>
                                    </div>
									<?php $count++; endforeach;?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="statements-tab__button">
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

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Statements Style2 Area-->
        
		<?php 
	}

}
