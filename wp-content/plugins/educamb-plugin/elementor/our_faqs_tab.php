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
class Our_Faqs_Tab extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'educamb_our_faqs_tab';
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
		return esc_html__( 'Our Faqs Tab', 'educamb' );
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
			'our_faqs_tab',
			[
				'label' => esc_html__( 'Our Faqs Tab', 'educamb' ),
			]
		);
		$this->add_control(
		  'features_tab', 
		  [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['btn_title' => esc_html__('Students', 'educamb')],
						['btn_title' => esc_html__('Teachers', 'educamb')],
						['btn_title' => esc_html__('Future Students', 'educamb')],
						['btn_title' => esc_html__('International', 'educamb')],
						['btn_title' => esc_html__('Management', 'educamb')],

					],
				'fields' => 
				[
					[
						'name' => 'btn_title',
						'label' => esc_html__('Tab Button Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'tab_title',
						'label' => esc_html__('Tab Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'tab_text',
						'label' => esc_html__('Text', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
					],
					[
						'name' => 'tab_title2',
						'label' => esc_html__('Tab Title 2', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'tab_text2',
						'label' => esc_html__('Text 2', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
					],
					[
						'name' => 'tab_title3',
						'label' => esc_html__('Tab Title 3', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'tab_text3',
						'label' => esc_html__('Text 3', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
					],
					[
						'name' => 'tab_title4',
						'label' => esc_html__('Tab Title 4', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'tab_text4',
						'label' => esc_html__('Text 4', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
					],
					[
						'name' => 'tab_title5',
						'label' => esc_html__('Tab Title 5', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'tab_text5',
						'label' => esc_html__('Text 5', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
					],
					[
						'name' => 'tab_title6',
						'label' => esc_html__('Tab Title 6', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'tab_text6',
						'label' => esc_html__('Text 6', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
					],
					[
						'name' => 'tab_title7',
						'label' => esc_html__('Tab Title 7', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'tab_text7',
						'label' => esc_html__('Text 7', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
					],
					[
						'name' => 'tab_title8',
						'label' => esc_html__('Tab Title 8', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'tab_text8',
						'label' => esc_html__('Text 8', 'educamb'),
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
        $allowed_tags = wp_kses_allowed_html('post');
    ?>
    
    <!--Start Faq Page One-->
    <section class="faq-page-one">
        <div class="container">

            <div class="row">
                <div class="col-xl-12">
                    <div class="faq-tab-button">
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

            <div class="row">
                <div class="col-xl-12">
                    <div class="tabs-content-box">
						<?php $count = 1; foreach($settings['features_tab'] as $keys => $item): ?>
                        <!--Tab-->
                        <div class="tab-content-box-item <?php if($count == 1) echo 'tab-content-box-item-active';?>" id="<?php echo esc_attr($count);?>">
                            <div class="faq-style1-content">
                                <ul class="accordion-box">
                                    <li class="accordion block active-block">
                                        <div class="acc-btn active">
                                            <?php if($item['tab_title']) { ?>
                                            <h3>
                                                <?php echo wp_kses($item['tab_title'], true); ?>
                                            </h3>
                                            <div class="icon-outer">
                                                <i class="icon-play"></i>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div class="acc-content current">
                                            <?php if($item['tab_text']) { ?><p><?php echo wp_kses($item['tab_text'], true); ?></p><?php } ?>
                                        </div>
                                    </li>
                                    <li class="accordion block">
                                        <div class="acc-btn">
                                            <?php if($item['tab_title2']) { ?>
                                            <h3>
                                                <?php echo wp_kses($item['tab_title2'], true); ?>
                                            </h3>
                                            <div class="icon-outer">
                                                <i class="icon-play"></i>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div class="acc-content">
                                            <?php if($item['tab_text2']) { ?><p><?php echo wp_kses($item['tab_text2'], true); ?></p><?php } ?>
                                        </div>
                                    </li>
                                    <li class="accordion block">
                                        <div class="acc-btn">
                                            <?php if($item['tab_title3']) { ?>
                                            <h3>
                                                <?php echo wp_kses($item['tab_title3'], true); ?>
                                            </h3>
                                            <div class="icon-outer">
                                                <i class="icon-play"></i>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div class="acc-content">
                                            <?php if($item['tab_text3']) { ?><p><?php echo wp_kses($item['tab_text3'], true); ?></p><?php } ?>
                                        </div>
                                    </li>

                                    <li class="accordion block">
                                        <div class="acc-btn">
                                            <?php if($item['tab_title4']) { ?>
                                            <h3>
                                                <?php echo wp_kses($item['tab_title4'], true); ?>
                                            </h3>
                                            <div class="icon-outer">
                                                <i class="icon-play"></i>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div class="acc-content">
                                            <?php if($item['tab_text4']) { ?><p><?php echo wp_kses($item['tab_text4'], true); ?></p><?php } ?>
                                        </div>
                                    </li>
                                    <li class="accordion block">
                                        <div class="acc-btn">
                                            <?php if($item['tab_title5']) { ?>
                                            <h3>
                                                <?php echo wp_kses($item['tab_title5'], true); ?>
                                            </h3>
                                            <div class="icon-outer">
                                                <i class="icon-play"></i>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div class="acc-content">
                                            <?php if($item['tab_text5']) { ?><p><?php echo wp_kses($item['tab_text5'], true); ?></p><?php } ?>
                                        </div>
                                    </li>
                                    <li class="accordion block">
                                        <div class="acc-btn">
                                            <?php if($item['tab_title6']) { ?>
                                            <h3>
                                                <?php echo wp_kses($item['tab_title6'], true); ?>
                                            </h3>
                                            <div class="icon-outer">
                                                <i class="icon-play"></i>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div class="acc-content">
                                            <?php if($item['tab_text6']) { ?><p><?php echo wp_kses($item['tab_text6'], true); ?></p><?php } ?>
                                        </div>
                                    </li>

                                    <li class="accordion block">
                                        <div class="acc-btn">
                                            <?php if($item['tab_title7']) { ?>
                                            <h3>
                                                <?php echo wp_kses($item['tab_title7'], true); ?>
                                            </h3>
                                            <div class="icon-outer">
                                                <i class="icon-play"></i>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div class="acc-content">
                                            <?php if($item['tab_text7']) { ?><p><?php echo wp_kses($item['tab_text7'], true); ?></p><?php } ?>
                                        </div>
                                    </li>
                                    <li class="accordion block">
                                        <div class="acc-btn">
                                            <?php if($item['tab_title8']) { ?>
                                            <h3>
                                                <?php echo wp_kses($item['tab_title8'], true); ?>
                                            </h3>
                                            <div class="icon-outer">
                                                <i class="icon-play"></i>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div class="acc-content">
                                            <?php if($item['tab_text8']) { ?><p><?php echo wp_kses($item['tab_text8'], true); ?></p><?php } ?>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
						<?php $count++; endforeach;?>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--End Faq Page One-->
        
		<?php 
	}

}
