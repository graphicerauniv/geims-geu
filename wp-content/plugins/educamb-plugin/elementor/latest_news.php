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
class Latest_News extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'educamb_latest_news';
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
		return esc_html__( 'Latest News', 'educamb' );
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
			'latest_news',
			[
				'label' => esc_html__( 'Latest News', 'educamb' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
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
			'image',
			[
				'label' => __( 'Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->end_controls_section();
		
		//Product Grid View
		$this->start_controls_section(
            'grid_view',
            [
                'label' => esc_html__( 'Product Grid View', 'educamb' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
            ]
        );
        $this->add_control(
            'text_limit',
            [
                'label'   => esc_html__( 'Text Limit', 'educamb' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 18,
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
                'default' => 5,
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
                'default' => 'ASC',
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
                'options' => get_blog_categories(),
            ]
        );
        $this->end_controls_section();
		
		//Blog Listview Image
		$this->start_controls_section(
            'list_view',
            [
                'label' => esc_html__( 'Post List View', 'educamb' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
            ]
        );
        $this->add_control(
            'text_limits',
            [
                'label'   => esc_html__( 'Text Limit', 'educamb' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 18,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            ]
        );
		$this->add_control(
            'query_numbers',
            [
                'label'   => esc_html__( 'Number of post', 'educamb' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 5,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            ]
        );
        $this->add_control(
            'query_orderbys',
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
            'query_orders',
            [
                'label'   => esc_html__( 'Order', 'educamb' ),
				'label_block' => true,
                'type'    => Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => array(
                    'DESC' => esc_html__( 'DESC', 'educamb' ),
                    'ASC'  => esc_html__( 'ASC', 'educamb' ),
                ),
            ]
        );
        $this->add_control(
            'query_categorys',
            [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Category', 'educamb'),
				'label_block' => true,
                'options' => get_blog_categories(),
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
            'post_type'      => 'post',
            'posts_per_page' => educamb_set( $settings, 'query_number' ),
            'orderby'        => educamb_set( $settings, 'query_orderby' ),
            'order'          => educamb_set( $settings, 'query_order' ),
            'paged'          => $paged
        );

        if( educamb_set( $settings, 'query_category' ) ) $args['category_name'] = educamb_set( $settings, 'query_category' );
        $query = new \WP_Query( $args );
		
		//Second Query

		$args2 = array(
            'post_type'      => 'post',
            'posts_per_page' => educamb_set( $settings, 'query_numbers' ),
            'orderby'        => educamb_set( $settings, 'query_orderbys' ),
            'order'          => educamb_set( $settings, 'query_orders' ),
            'paged'         => $paged
        );
		
		if( educamb_set( $settings, 'query_categorys' ) ) $args2['category_name'] = educamb_set( $settings, 'query_categorys' );
        $query2 = new \WP_Query( $args2 );
		
        if ( $query->have_posts() ) { 
	?>
	
    <!--Start Blog Style1 Area-->
    <section class="blog-style1-area">
        <div class="container">
            <?php if($settings['title'] || $settings['text']) { ?>
            <div class="sec-title text-center">
                <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                <?php if($settings['text']) { ?>
                <div class="sub-title">
                    <p><?php echo wp_kses($settings['text'], true);?></p>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
            <div class="row">

                <!--Start Single Blog Style1-->
                <div class="col-xl-4 col-lg-12">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="single-blog-style1 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.1s">
                        <?php if(has_post_thumbnail()){ ?>
                        <div class="img-holder">
                            <div class="inner">
                                <?php the_post_thumbnail('educamb_370x240'); ?>
                            </div>
                            <div class="category-box">
                                <div class="dot-box"></div>
                                <p><?php the_category(' '); ?></p>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="text-holder">
                            <h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
                            <div class="text">
                                <?php echo wp_kses(wp_trim_words(get_the_content(), $settings['text_limit']), true); ?>
                            </div>
                            <div class="bottom-box">
                                <div class="btn-box">
                                    <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>">
                                        <span class="icon-right-arrow-1"></span><?php esc_html_e('Read more', 'educamb'); ?>
                                    </a>
                                </div>
                                <div class="meta-info">
                                    <ul>
                                        <li><span class="icon-calendar"></span><a href="<?php echo get_month_link(get_the_date('Y'), get_the_date('m')); ?>"><?php echo get_the_date(); ?></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <!--End Single Blog Style1-->
				<?php if($settings['image']['id']) { ?>
                <div class="col-xl-4 col-lg-12">
                    <div class="blog-style1-img-box wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">
                        <img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                    </div>
                </div>
				<?php } ?>
                <div class="col-xl-4 col-lg-12">
                    <?php while ( $query2->have_posts() ) : $query2->the_post(); ?>
                    <!--Start Single Blog Style1 in Style2-->
                    <div class="single-blog-style1 single-blog-style1--in-style2 wow fadeInRight"
                        data-wow-duration="1s" data-wow-delay="0.1s">
                        <div class="text-holder">
                            <?php if(has_category()){ ?>
                            <div class="category-box">
                                <div class="dot-box"></div>
                                <p><?php the_category(' '); ?></p>
                            </div>
                            <?php } ?>
                            <h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
                            <div class="bottom-box">
                                <div class="btn-box">
                                    <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>">
                                        <span class="icon-right-arrow-1"></span><?php esc_html_e('Read more', 'educamb'); ?>
                                    </a>
                                </div>
                                <div class="meta-info">
                                    <ul>
                                        <li><span class="icon-calendar"></span><a href="<?php echo get_month_link(get_the_date('Y'), get_the_date('m')); ?>"><?php echo get_the_date(); ?></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Single Blog Style1 in Style2-->
                    <?php endwhile; ?>
                </div>

            </div>
        </div>
    </section>
    <!--End Blog Style1 Area-->
                
        <?php }
		wp_reset_postdata();
	}

}
