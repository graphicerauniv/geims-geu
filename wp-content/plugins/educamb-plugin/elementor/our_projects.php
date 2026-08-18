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
class Our_Projects extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'educamb_our_projects';
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
		return esc_html__( 'Our Projects', 'educamb' );
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
	protected function _register_controls() {
		$this->start_controls_section(
			'our_project',
			[
				'label' => esc_html__( 'Our Projects', 'educamb' ),
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
		{ ?>
		
       
      
       <!-- gallery-section -->
        <section class="gallery-section" id="gallery" >
            <div class="container-fluid">
               <?php if($settings['subtitle'] || $settings['title']) { ?>
                <div class="sec-title centred">
                     <?php if($settings['subtitle']) { ?><span class="top-text"><?php echo wp_kses($settings['subtitle'], true);?></span><?php } ?>
                     <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                </div>
                <?php } ?>
                <div class="four-item-carousel owl-carousel owl-theme owl-nav-none">
                    <?php 
						global $post;
						while ( $query->have_posts() ) : $query->the_post(); 
						$term_list = wp_get_post_terms(get_the_id(), 'project_cat', array("fields" => "names"));
						$post_thumbnail_id = get_post_thumbnail_id($post->ID);
						$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
					 ?>
                    <div class="project-block-one <?php if(get_post_meta( get_the_id(), 'project_dimension', true) == 'extra_height') echo ''; else echo 'small-image'?>">
                        <div class="inner-box">
                            <figure class="image-box">
                           		<?php 
								$dimention = get_post_meta( get_the_id(), 'project_dimension', true );
								if($dimention == 'extra_height'){
									$image_size = 'educamb_422x525';
								}else{
									$image_size = 'educamb_422X420'; 
								}
								the_post_thumbnail($image_size);
							?>
                            </figure>
                            <div class="content-box">
                                <div class="view-btn"><a href="<?php echo esc_url($post_thumbnail_url); ?>" class="lightbox-image" data-fancybox="gallery"><i class="fal fa-plus"></i></a></div>
                                <h3><a href="<?php echo esc_url($post_thumbnail_url); ?>"><?php the_title(); ?></a></h3>
                            </div>
                        </div>
                    </div>                    
                   <?php endwhile; ?>
                </div>
            </div>
        </section>
        <!-- gallery-section end -->


        <?php }
		wp_reset_postdata();
	}

}
