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
class Our_Gallery_V4 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'educamb_our_gallery_v4';
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
		return esc_html__( 'Our Gallery V4', 'educamb' );
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
			'our_gallery_v4',
			[
				'label' => esc_html__( 'Our Gallery V4', 'educamb' ),
			]
		);
		$this->add_control(
			'btn_title',
			[
				'label'       => __( 'Button Title', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'educamb' ),
			]
		);
		$this->add_control(
			'btn_link',
			[
				  'label' => __( 'Button Url', 'educamb' ),
				  'type' => Controls_Manager::URL,
				  'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				  'show_external' => true,
				  'default' => [
				    'url' => '',
				    'is_external' => true,
				    'nofollow' => true,
				  ],
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
				'options' => get_project_categories()
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
		
        $paged = educamb_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;

		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-educamb' );
		$args = array(
			'post_type'      => 'project',
			'posts_per_page' => educamb_set( $settings, 'query_number' ),
			'orderby'        => educamb_set( $settings, 'query_orderby' ),
			'order'          => educamb_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( educamb_set( $settings, 'query_category' ) ) $args['project_cat'] = educamb_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ 
	?>
	
    <!--Start Photography Work Gallery Area-->
    <section class="photography-work-gallery-area">
        <div class="container">
            <div class="row masonary-layout">
                <?php 
					global $post;
					while ( $query->have_posts() ) : $query->the_post(); 
					$term_list = wp_get_post_terms(get_the_id(), 'project_cat', array("fields" => "names"));
					$post_thumbnail_id = get_post_thumbnail_id($post->ID);
					$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
				 ?>
                <!--Start Single Photography Work Gallery Box -->
                <div class="<?php if(get_post_meta( get_the_id(), 'project_dimension', true) == 'normal_height_2') echo 'col-xl-8 col-lg-6'; if(get_post_meta( get_the_id(), 'project_dimension', true) == 'mixmum_height_1') echo 'col-xl-4 col-lg-6'; else echo 'col-xl-4 col-lg-6'?>">
                    <div class="single-photography-work-gallery-box">
                        <div class="img-holder">
                            <?php 
								$project_dimension = get_post_meta( get_the_id(), 'project_dimension', true );
								if($project_dimension == 'mixmum_height_1'){ 
									$size = 'educamb_370x340'; 
								} elseif($project_dimension == 'normal_height_2') { 
									$size = 'educamb_770x640'; 
								}else { 
									$size = 'educamb_370x270'; 
								} the_post_thumbnail($size);
							?>
                        </div>
                        <div class="overlay-content">
                            <div class="top">
                                <p><span class="flaticon-star-1"></span> By Theo Freddie</p>
                            </div>
                            <div class="inner-title">
                                <p><?php echo implode( ', ', (array)$term_list );?></p>
                                <h3><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'project_url', true ));?>"><?php the_title(); ?></a></h3>
                            </div>
                            <div class="btn-box">
                                <a href="<?php echo esc_url(get_post_meta( get_the_id(), 'project_url', true ));?>">
                                    <span class="icon-right-arrow-1"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Single Photography Work Gallery Box -->
                <?php endwhile; ?>

            </div>
            <?php if($settings['btn_title']){ ?>
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="btns-box">
                        <a class="btn-one btn-one--style6" href="<?php echo esc_url($settings['btn_link']['url']); ?>">
                            <span class="txt">
                                <?php echo wp_kses($settings['btn_title'], true); ?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
    <!--End Photography Work Gallery Area-->

        <?php }
		wp_reset_postdata();
	}

}
