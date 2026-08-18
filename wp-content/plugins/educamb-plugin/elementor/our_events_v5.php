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
class Our_Events_V5 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_our_events_v5';
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
        return esc_html__( 'Our Events V5', 'educamb' );
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
            'our_events_v5',
            [
                'label' => esc_html__( 'Our Events V5', 'educamb' ),
			]
        );
		$this->add_control(
			'text_limit',
			[
				'label'   => esc_html__( 'Text Limit', 'educamb' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
        $this->add_control(
			'query_number',
			[
				'label'   => esc_html__( 'Number of post', 'educamb' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_orderby',
			[
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
			]
		);
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'educamb' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESC' => esc_html__( 'DESC', 'educamb' ),
					'ASC'  => esc_html__( 'ASC', 'educamb' ),
				),
			]
		);
        $this->add_control(
            'query_category',
            [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Category', 'educamb'),
				'label_block' => true,
                'options' => get_events_categories()
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
		
		$count = 1;
		$events = tribe_get_events(array(
			'posts_per_page' => $settings['query_number'],
			'tax_query'=> array(
				array(
					'taxonomy' => 'tribe_events_cat',
					'field' => 'slug',
					'terms' => educamb_set ($settings, 'query_category'),
					'posts_per_page' => educamb_set( $settings, 'query_number' ),
					'orderby'        => educamb_set( $settings, 'query_orderby' ),
					'order'          => educamb_set( $settings, 'query_order' ),
					'text_limit'          => educamb_set( $settings, 'text_limit' ),
				)
			)
		)); ?>
    
    <!--Start Events page Three-->
    <section class="events-page-three">
        <div class="container">

            <div class="row">
				<?php 
					global $post;
					if ( empty( $events ) ) :
					echo 'Sorry, nothing found.';
					else: 
					foreach( $events as $event ) : 
					
					$event_thumbnail_id = get_post_thumbnail_id($event->ID);
					$event_thumbnail_url = wp_get_attachment_url($event_thumbnail_id);
					
					$start_datetime = tribe_get_start_date( $event->ID );
					$end_datetime = tribe_get_end_date( $event->ID );
					
					$start_date = tribe_get_start_date($event->ID, true, 'd' );
					$start_month = tribe_get_end_date($event->ID, true, 'M' );
					$start_year = tribe_get_end_date($event->ID, true, 'Y' );
					
					$start_time = tribe_get_start_time ( $event->ID, 'h:i A' );
					$end_time = tribe_get_end_time ( $event->ID, 'h:i A' );
					
					$location = get_option('location');
				?>
                <!--Start Single Event Three-->
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="single-event-three">
                        <div class="single-event-three__inner">
                            <div class="static-content">
                                <div class="top-box">
                                    <div class="date-box">
                                        <h2><?php echo wp_kses($start_date, true); ?></h2>
                                        <h4><?php echo wp_kses($start_month, true); ?>, <?php echo wp_kses($start_year, true); ?></h4>
                                    </div>
                                    <?php 
									$price = get_post_meta( $event->ID, 'event_price', true );
									if( $price ){ ?>
									<div class="price-box">
										<div class="inner">
											<h3><?php echo wp_kses( $price, true );?></h3>
										</div>
									</div>
									<?php } ?>
                                </div>
                                <div class="text-holder">
                                    <h3>
                                        <a href="<?php echo esc_url(get_permalink($event->ID)); ?>">
											<?php echo wp_kses(get_the_title( $event->ID ), true);?>
                                        </a>
                                    </h3>
                                    <div class="text">
                                        <p><?php echo wp_trim_words( tribe_events_get_the_excerpt( $event->ID ), $settings['text_limit'] ); ?></p>
                                    </div>
                                    <ul>
                                        <li><span class="icon-time"></span> <?php echo wp_kses($start_time, true); ?> - <?php echo wp_kses($end_time, true); ?></li>
                                        <li><span class="icon-location-1"></span> <?php echo tribe_get_venue( $event->ID ); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="overlay-content">
                                <div class="img-bg"
                                    style="background-image: url(<?php echo esc_url($event_thumbnail_url);?>);"></div>
                                <div class="button-box">
                                    <a class="btn-one" href="<?php echo esc_url(get_permalink($event->ID)); ?>">
                                        <span class="txt"><?php esc_html_e('Read More', 'educamb');?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Single Event Three-->
                <?php endforeach; endif;  ?>
            </div>
        </div>
    </section>
    <!--End Events page Three-->
        
		<?php 
	}

}
