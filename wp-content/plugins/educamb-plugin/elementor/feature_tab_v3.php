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
class Feature_Tab_V3 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'educamb_feature_tab_v3';
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
		return esc_html__( 'Feature Tab V3', 'educamb' );
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
			'feature_tab_v3',
			[
				'label' => esc_html__( 'Feature Tab V3', 'educamb' ),
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'educamb' ),
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
						['btn_title' => esc_html__('Criminal Law', 'educamb')],
						['btn_title' => esc_html__('Business Law', 'educamb')],
						['btn_title' => esc_html__('Divorce Law', 'educamb')],
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
						'name' => 'text_limit',
						'label'   => esc_html__( 'Number of Text', 'educamb' ),
						'type'    => Controls_Manager::NUMBER,
						'default' => 3,
						'min'     => 1,
						'max'     => 100,
						'step'    => 1,
					],
					[
						'name' => 'query_number',
						'label'   => esc_html__( 'Number of post', 'educamb' ),
						'type'    => Controls_Manager::NUMBER,
						'default' => 3,
						'min'     => 1,
						'max'     => 100,
						'step'    => 1,
					],
					[
						'name' => 'query_orderby',
						'label'   => esc_html__( 'Order By', 'educamb' ),
						'label_block' => true,
						'type'    => Controls_Manager::SELECT,
						'default' => 'date',
						'options' => array(
							'date'       => esc_html__( 'Date', 'educamb' ),
							'title'      => esc_html__( 'Title', 'educamb' ),
							'menu_order' => esc_html__( 'Menu Order', 'educamb' ),
							'rand'       => esc_html__( 'Random', 'educamb' ),
						),
					],
					[
						'name' => 'query_order',
						'label'   => esc_html__( 'Order', 'educamb' ),
						'label_block' => true,
						'type'    => Controls_Manager::SELECT,
						'default' => 'DESC',
						'options' => array(
							'DESC' => esc_html__( 'DESC', 'educamb' ),
							'ASC'  => esc_html__( 'ASC', 'educamb' ),
						),
					],
					[
					  'name' => 'query_category',
					  'type' => Controls_Manager::SELECT,
					  'label' => esc_html__('Category', 'educamb'),
					  'label_block' => true,
					  'options' => get_service_categories()
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
    
    <!--Start academy Statements Area-->
    <section class="academy-statements-area">
        <div class="container">
            <div class="row">

                <div class="col-xl-4">
                    <div class="academy-statements-tab__button">
                        <div class="sec-title-style3">
                            <?php if($settings['subtitle']) { ?>
                            <div class="sub-title">
                                <h5><?php echo wp_kses($settings['subtitle'], true);?></h5>
                            </div>
                            <?php } ?>
                            <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                            <?php if($settings['text']) { ?><p><?php echo wp_kses($settings['text'], true);?></p><?php } ?>
                        </div>
                        <ul class="tabs-button-box clearfix">
							<?php $count = 1; foreach($settings['features_tab'] as $key => $item): ?>
                            <li data-tab="#<?php echo esc_attr($count); ?>" class="tab-btn-item <?php if($count == 1) echo 'active-btn-item' ?>">
                                <div class="inner-box">
                                    <?php if($item['btn_title']) { ?>
                                    <div class="icon">
                                        <span class="icon-right-arrow-1"></span>
                                    </div>
                                    <div class="inner-title">
                                        <h3><?php echo wp_kses($item['btn_title'], true); ?></h3>
                                    </div>
                                    <?php } ?>
                                    <div class="overlay-icon">
                                        <span class="icon-right-arrow-1"></span>
                                    </div>
                                </div>
                            </li>
							<?php $count++; endforeach; ?>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="tabs-content-box">
                        <div class="tabs-content-box__inner">
							<?php $count = 1; foreach($settings['features_tab'] as $keys => $item): 
								$paged = educamb_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;
						
								$this->add_render_attribute( 'wrapper', 'class', 'templatepath-educamb' );
								$args = array(
									'post_type'      => 'service',
									'posts_per_page' => educamb_set( $item, 'query_number' ),
									'orderby'        => educamb_set( $item, 'query_orderby' ),
									'order'          => educamb_set( $item, 'query_order' ),
									'text_limit'     => educamb_set( $item, 'text_limit' ),
									'paged'         => $paged
								);
								
								if( educamb_set( $item, 'query_category' ) ) $args['service_cat'] = educamb_set( $item, 'query_category' );
								$query = new \WP_Query( $args );
								if ( $query->have_posts()):	
							?>
                            
                            <!--Tab-->
                            <div class="tab-content-box-item <?php if($count == 1) echo 'tab-content-box-item-active';?>" id="<?php echo esc_attr($count);?>">
                                <div class="academy-statements-tab-content">
                                    <div class="theme_carousel academy-statements-tab-carousel owl-theme owl-carousel"
                                        data-options='{
                                        "loop": false, 
                                        "margin": 0, 
                                        "autoheight":true, 
                                        "lazyload":true, 
                                        "nav": false, 
                                        "dots": true, 
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
										
										<?php 
											global $post;
											while ( $query->have_posts() ) : $query->the_post(); 
											$post_thumbnail_id = get_post_thumbnail_id($post->ID);
											$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
											$term_list = wp_get_post_terms(get_the_id(), 'service_cat', array("fields" => "names"));
										?>                                        
                                        <!--Start Item-->
                                        <div class="item">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="text-box">
                                                        <div class="inner-title">
                                                            <h3><?php the_title(); ?></h3>
                                                        </div>
                                                        <p><?php echo wp_kses(wp_trim_words(get_the_content(), $item['text_limit']), true); ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="img-box">
                                                        <?php the_post_thumbnail('educamb_310x395'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End Item-->
                                        <?php endwhile;?>
                                    </div>
                                </div>
                            </div>
                            <?php endif;?>
                            <?php $count++; endforeach; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End academy Statements Area-->
        
		<?php 
	}

}
