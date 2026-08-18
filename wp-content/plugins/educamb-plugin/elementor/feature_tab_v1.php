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
class Feature_Tab_V1 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'educamb_feature_tab_v1';
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
		return esc_html__( 'Feature Tab V1', 'educamb' );
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
			'feature_tab_v1',
			[
				'label' => esc_html__( 'Feature Tab V1', 'educamb' ),
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
		  'features_tab', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['btn_title' => esc_html__('Fresh Students', 'educamb')],
						['btn_title' => esc_html__('Graduate', 'educamb')],
						['btn_title' => esc_html__('Transfer to Educamb', 'educamb')],
						['btn_title' => esc_html__('Research', 'educamb')],

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
    
    <!--Start Explore Future Area-->
    <section class="explore-future-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="explore-future-tab">
                        <div class="row">

                            <div class="col-xl-4">
                                <div class="explore-future-tab__button">
                                    <?php if($settings['title'] || $settings['text']) { ?>
                                    <div class="sec-title">
                                        <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                                        <?php if($settings['text']) { ?>
                                        <div class="sub-title">
                                            <p><?php echo wp_kses($settings['text'], true);?></p>
                                        </div>
                                    	<?php } ?>
                                    </div>
                                    <?php } ?>
                                    <ul class="tab-btns clearfix">
                                        <?php $count = 1; foreach($settings['features_tab'] as $key => $item): ?>
                                        <li data-tab="#<?php echo esc_attr($count); ?>" class="tab-btn <?php if($count == 1) echo 'active-btn' ?>">
                                            <?php if($item['btn_title']) { ?><h3><?php echo wp_kses($item['btn_title'], true); ?></h3>
                                            <div class="round-box"></div><?php } ?>
                                        </li>
                                        <?php $count++; endforeach; ?>
                                    </ul>
                                </div>
                            </div>


                            <div class="col-xl-8">
                                <div class="pr-content">
                                	<?php $count = 1; foreach($settings['features_tab'] as $keys => $item): ?>
                                    <!--Tab-->
                                    <div class="pr-tab <?php if($count == 1) echo 'active-tab';?>" id="<?php echo esc_attr($count);?>">
                                        <div class="explore-future-tab__content">
                                            <?php if($item['tab_image']['id']) { ?>
                                            <div class="img-holder">
                                                <img src="<?php echo esc_url(wp_get_attachment_url($item['tab_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                                            </div>
                                            <?php } ?>
                                            <div class="text-holder">
                                                <?php if($item['btn_title']) { ?><h2><a href="<?php echo esc_url($item['btn_link']['url']); ?>"><?php echo wp_kses($item['btn_title'], true); ?></a></h2><?php } ?>
                                                <?php if($item['tab_text']) { ?><p><?php echo wp_kses($item['tab_text'], true); ?></p><?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Tab-->
                                    <?php $count++; endforeach;?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Explore Future Area-->
        
		<?php 
	}

}
