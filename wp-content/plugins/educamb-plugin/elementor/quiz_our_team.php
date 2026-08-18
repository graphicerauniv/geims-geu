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
class Quiz_Our_Team extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'educamb_quiz_our_team';
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
		return esc_html__( 'Quiz Our Team', 'educamb' );
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
			'quiz_our_team',
			[
				'label' => esc_html__( 'Quiz Our Team', 'educamb' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'educamb' ),
				'label_block' => true,
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
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'educamb' ),
			]
		);
		$this->add_control(
			'query_number',
			[
				'label'   => esc_html__( 'Number of post', 'educamb' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 4,
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
			  'options' => get_instructors_categories()
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
			'post_type'      =>  'instructors',
			'posts_per_page' => educamb_set( $settings, 'query_number' ),
			'orderby'        => educamb_set( $settings, 'query_orderby' ),
			'order'          => educamb_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		
		if( educamb_set( $settings, 'query_category' ) ) $args['instructors_cat'] = educamb_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );
		if ( $query->have_posts() ) 
		{ 
	?>
    
    <!--Start Team Style8 Area-->
    <section class="team-style8-area">
        <div class="container">
            <div class="sec-title-style8 text-center">
                <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                <?php if($settings['text']) { ?><p><?php echo wp_kses($settings['text'], true);?></p><?php } ?>
            </div>
            <div class="row">
				<?php 
					while ( $query->have_posts() ) : $query->the_post(); 		
				?>
                <!--Start Single Team Style1-->
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="single-team-style8 wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1500ms">
                        <div class="img-holder">
                            <div class="inner">
                                <?php the_post_thumbnail('educamb_370x370'); ?>
                            </div>
                            <div class="ovarlay-social-links">
                                <?php
									$icons = get_post_meta( get_the_id(), 'social_profile', true );
									if ( ! empty( $icons ) ) :
								?>
								<ul class="social-links">
		
									<?php
										foreach ( $icons as $h_icon ) :
										$header_social_icons = json_decode( urldecode( educamb_set( $h_icon, 'data' ) ) );
										if ( educamb_set( $header_social_icons, 'enable' ) == '' ) {
											continue;
										}
										$icon_class = explode( '-', educamb_set( $header_social_icons, 'icon' ) );
										?>
										<li><a href="<?php echo esc_url(educamb_set( $header_social_icons, 'url' )); ?>" <?php if( educamb_set( $header_social_icons, 'background' ) || educamb_set( $header_social_icons, 'color' ) ):?>style="background-color:<?php echo esc_attr(educamb_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(educamb_set( $header_social_icons, 'color' )); ?>"<?php endif;?>><i class="fab <?php echo esc_attr( educamb_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
									<?php endforeach; ?>
							
								</ul>
								<?php endif; ?>
                            </div>
                        </div>
                        <div class="title-holder text-center">
                            <h3><a href="<?php echo (get_post_meta( get_the_id(), 'instructors_link', true ));?>"><?php the_title(); ?></a></h3>
                            <p><?php echo (get_post_meta( get_the_id(), 'designation', true ));?></p>
                        </div>
                    </div>
                </div>
                <!--End Single Team Style1-->
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <!--End Team Style1 Area-->
              	
		<?php }
		wp_reset_postdata();
	}
}