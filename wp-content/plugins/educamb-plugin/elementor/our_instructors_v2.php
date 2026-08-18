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
class Our_Instructors_V2 extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'educamb_our_instructors_v2';
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
		return esc_html__( 'Our Instructors V2', 'educamb' );
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
			'our_instructors_v2',
			[
				'label' => esc_html__( 'Our Instructors V2', 'educamb' ),
			]
		);
		$this->add_control(
			'sub_title',
			[
				'label'       => __( 'Sub Title', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub Title', 'educamb' ),
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
				'placeholder' => __( 'Enter your Title', 'educamb' ),
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
    
    <!--Start Instructors Style5 Area-->
    <section class="instructors-style5-area">
        <div class="container">
            <?php if($settings['sub_title'] || $settings['title']) { ?>
            <div class="sec-title-style5 text-center">
                <?php if($settings['sub_title']) { ?><h2><?php echo wp_kses($settings['sub_title'], true);?></h2><?php } ?>
                <?php if($settings['title']) { ?>
                <div class="sub-title">
                    <div class="line left"></div>
                    <p><?php echo wp_kses($settings['title'], true);?></p>
                    <div class="line right"></div>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
            <div class="row">
                <div class="col-xl-12">
                    <div class="theme_carousel instructors-style5-carousel owl-theme owl-carousel owl-nav-style-one"
                        data-options='{
                            "loop": true, 
                            "margin": 30, 
                            "autoheight":true, 
                            "lazyload":true, 
                            "nav": true, 
                            "dots": true, 
                            "autoplay": true, 
                            "autoplayTimeout": 5000, 
                            "smartSpeed": 500, 
                            "navText": ["<span class=\"left icon-right-arrow-1\"></span>",
                            "<span class=\"right icon-right-arrow-1\"></span>"], 
                            "responsive":{ 
                            "0" :{ "items": "1" }, 
                            "600" :{ "items" : "1" }, 
                            "768" :{ "items" : "2" }, 
                            "992":{ "items" : "3" }, 
                            "1200":{ "items" : "4" }
                            }
                        }'>

						<?php 
							while ( $query->have_posts() ) : $query->the_post(); 		
						?>
                        <!--Start Single Team Style3 Outer-->
                        <div class="single-team-style3__outer">
                            <?php $icon_image = get_post_meta( get_the_id(), 'bg_image', true ); ?>
                            <?php if( $icon_image ){?>
                            <div class="single-team-style3__main-img-box">
                                <img src="<?php echo wp_get_attachment_url($icon_image['id']);?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                            </div>
                            <?php };?>
                            <div class="single-team-style3">
                                <div class="img-holder">
                                    <div class="inner">
                                        <?php the_post_thumbnail('educamb_120x120'); ?>
                                    </div>
                                </div>
                                <div class="single-team-style3__inner">
                                    <div class="title-holder text-center">
                                        <div class="title">
                                            <h3><a href="<?php echo (get_post_meta( get_the_id(), 'instructors_link', true ));?>"><?php the_title(); ?></a></h3>
                                            <p><?php echo (get_post_meta( get_the_id(), 'designation', true ));?></p>
                                        </div>
                                        <div class="btn-box">
                                            <div class="single-btn">
                                                <a class="chat" href="#"><span class="icon-chat-2"></span><?php esc_html_e('Chat', 'educamb');?></a>
                                            </div>
                                            <div class="single-btn style2">
                                                <div class="social-icon">
                                                    <span class="icon-share-1"></span><?php esc_html_e('Follow', 'educamb');?>
                                                </div>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Single Team Style3 Outer-->
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Instructors Style5 Area-->
              	
		<?php }
		wp_reset_postdata();
	}
}