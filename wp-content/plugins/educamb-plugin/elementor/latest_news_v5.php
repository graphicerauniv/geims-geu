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
class Latest_News_V5 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'educamb_latest_news_v5';
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
		return esc_html__( 'Latest News V5', 'educamb' );
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
			'latest_news_v5',
			[
				'label' => esc_html__( 'Latest News V5', 'educamb' ),
			]
		);
		$this->add_control(
			'style_two',
			 [
				'label'   => esc_html__( 'Choose Different Style', 'educamb' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
				'one' => esc_html__( 'Choose Style One', 'educamb' ),
				'two' => esc_html__( 'Choose Style Grid View', 'educamb' ),
				),
			 ]
		);
		$this->add_control(
			'sub_title',
			[
				'label'       => __( 'Sub Title', 'educamb' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
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
			'text_limit',
			[
				'label'   => esc_html__( 'Text Limit', 'educamb' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 12,
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
			  'options' => get_blog_categories()
			]
		);
		$this->add_control(
			'show_pagination',
			[
				'label'       => __( 'Enable/Disable Pagination Style', 'educamb' ),
						'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'educamb' ),
				'label_off' => __( 'Hide', 'educamb' ),
				'return_value' => 'yes',
				'default' => 'no',
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
			'post_type'      => 'post',
			'posts_per_page' => educamb_set( $settings, 'query_number' ),
			'orderby'        => educamb_set( $settings, 'query_orderby' ),
			'order'          => educamb_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( educamb_set( $settings, 'query_category' ) ) $args['category_name'] = educamb_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ 
	?>
	
    <!--Start Blog Style7 Area-->
        <section class="<?php if($settings['style_two'] == 'two') echo 'blog-style7-area cooking-blog-page-two'; else echo 'blog-style7-area'; ?>">
            <div class="container">
                <?php if($settings['sub_title'] || $settings['title']) { ?>
                <div class="sec-title-style7 text-center">
                    <?php if($settings['sub_title']) { ?>
                    <div class="sub-title">
                        <p><?php echo wp_kses($settings['sub_title'], true);?></p>
                        <div class="zigzag gray-bg"></div>
                    </div>
                    <?php } ?>
                	<?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                </div>
                <?php } ?>
                <div class="row">
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <!--Start Single Blog Style7-->
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="single-blog-style7">
                            <?php if(has_post_thumbnail()){ ?>
                            <div class="img-holder">
                                <div class="inner">
                                    <?php the_post_thumbnail('educamb_270x340'); ?>
                                    <div class="date-box">
                                        <h3><?php echo get_the_date('d'); ?></h3>
                                        <h5><?php echo get_the_date('M'); ?></h5>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="text-holder">
                                <div class="category-box">
                                    <p><?php the_category(' '); ?></p>
                                </div>
                                <h3>
                                    <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <div class="author-info">
                                    <div class="img-box">
                                        <?php echo get_avatar(get_the_author_meta('ID'), 40); ?>
                                    </div>
                                    <div class="text-box">
                                        <h5><?php the_author(); ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Single Blog Style7-->
                    <?php endwhile; ?>
                </div>
                <?php if($settings['show_pagination']) { ?>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="styled-pagination text-center clearfix">
                            <?php educamb_the_pagination2(array('total'=>$query->max_num_pages, 'next_text' => '<span class="icon-right-arrow-1 right"></span>', 'prev_text' => '<span class="icon-right-arrow-1 left"></span>')); ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </section>
        <!--End Blog Style7 Area-->

                
        <?php }
		wp_reset_postdata();
	}

}
