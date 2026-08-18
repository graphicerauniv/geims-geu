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
class Our_Skills extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'educamb_our_skills';
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
		return esc_html__( 'Our Skills ', 'educamb' );
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
			'our_skills',
			[
				'label' => esc_html__( 'Our Skills', 'educamb' ),
			]
		);
		$this->add_control(
              'skills', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['block_title' => esc_html__('Replacement', 'educamb')],
                			['block_title' => esc_html__('Glass Tinting', 'educamb')],
							['block_title' => esc_html__('Chip Repair', 'educamb')],
							['block_title' => esc_html__('Tire Replacement', 'educamb')],
            			],
            		'fields' => 
						[
							[
                    			'name' => 'block_title',
                    			'label' => esc_html__('Title', 'educamb'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'educamb')
                			],
							[
                    			'name' => 'counter_stop',
                    			'label' => esc_html__('Count Stop Value', 'educamb'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
								'default' => esc_html__('', 'educamb')
                			],
							[
                    			'name' => 'alphabet_letter',
                    			'label' => esc_html__('Alphabet Letters', 'educamb'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
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
		
        $paged = get_query_var('paged');
		$paged = educamb_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;
		
		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-educamb' );
		$args = array(
			'post_type'      => 'faqs',
			'posts_per_page' => educamb_set( $settings, 'query_number' ),
			'orderby'        => educamb_set( $settings, 'query_orderby' ),
			'order'          => educamb_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( educamb_set( $settings, 'query_category' ) ) $args['faqs_cat'] = educamb_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>
    
    
         

        <!-- faq-section -->
        <section class="faq-section bg-color-1 pb-215">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-12 skills-column">
                        <div class="skills-inner">
                            <div class="progress-inner">
                                <?php foreach($settings['skills'] as $key => $item): ?>
                                <div class="progress-box">
                                    <h5><?php echo wp_kses($item['block_title'], true);?></h5>
                                    <div class="bar">
                                        <div class="bar-inner count-bar" data-percent="<?php echo esc_attr($item['counter_stop']);?><?php echo esc_attr($item['alphabet_letter']);?>"><div class="count-text"><?php echo esc_attr($item['counter_stop']);?><?php echo esc_attr($item['alphabet_letter']);?></div></div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- faq-section end -->
         
        

		<?php }
		wp_reset_postdata();
	}

}