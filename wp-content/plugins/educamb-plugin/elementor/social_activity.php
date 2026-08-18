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
class Social_Activity extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'educamb_social_activity';
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
		return esc_html__( 'Social Activity', 'educamb' );
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
			'social_activity',
			[
				'label' => esc_html__( 'Social Activity', 'educamb' ),
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
		
		if ( $query->have_posts() ) { 
	?>
	
    <!--Start social activity Area-->
    <section class="social-activity-area">
        <div class="auto-container">
            <div class="social-activity-content">
    
                <!--Start Single Social Activity Box-->
                <?php global $post; 
					$count = 1;
					while ( $query->have_posts() ) : $query->the_post(); 
					$post_thumbnail_id = get_post_thumbnail_id($post->ID);
					$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
				?>
                <?php if( $count % 2 ):?>
                
                <div class="single-social-activity-box width20">
                    <div class="single-social-activity-box__inner">
                        <?php if(! empty( $post_thumbnail_url ) ):?>
                        <div class="img-box-outer heigh325">
                            <div class="img-box"
                                style="background-image: url(<?php echo esc_url( $post_thumbnail_url );?>);">
                            </div>
                        </div>
                        <?php endif;?>
                        <div class="text-box tk-clr-<?php echo $count;?> mt-30">
                            <div class="top-box">
                                <div class="social-link">
                                    <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>">
                                        <span class="flaticon-user"></span>
                                    </a>
                                </div>
                                <div class="date-box">
                                    <p><?php echo wp_kses( get_the_date(), true );?></p>
                                </div>
                            </div>
                            <div class="inner-title">
                                <h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title();?></a></h3>
                            </div>
                            <div class="text">
                                <p><?php echo wp_kses(wp_trim_words(get_the_content(), $settings['text_limit']), true); ?></p>
                            </div>
                            <div class="post-info">
                                <ul>
                                    <li>
                                        <span class="icon-heart-1"></span><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a>
                                    </li>
                                    <li>
                                        <span class="icon-chat"></span><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>#comments"><?php comments_number( wp_kses(__('0 Comments' , 'educamb'), true), wp_kses(__('1 Comment' , 'educamb'), true), wp_kses(__('% Comments' , 'educamb'), true)); ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php else:?>
                <div class="single-social-activity-box width20">
                    <div class="single-social-activity-box__inner">
                        
                        <div class="text-box tk-clr-<?php echo $count;?> mb-30">
                            <div class="top-box">
                                <div class="social-link">
                                    <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>">
                                        <span class="flaticon-user"></span>
                                    </a>
                                </div>
                                <div class="date-box">
                                    <p><?php echo wp_kses( get_the_date(), true );?></p>
                                </div>
                            </div>
                            <div class="inner-title">
                                <h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title();?></a></h3>
                            </div>
                            <div class="text">
                                <p><?php echo wp_kses(wp_trim_words(get_the_content(), $settings['text_limit']), true); ?></p>
                            </div>
                            <div class="post-info">
                                <ul>
                                    <li>
                                        <span class="icon-heart-1"></span><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a>
                                    </li>
                                    <li>
                                        <span class="icon-chat"></span><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>#comments"><?php comments_number( wp_kses(__('0 Comments' , 'educamb'), true), wp_kses(__('1 Comment' , 'educamb'), true), wp_kses(__('% Comments' , 'educamb'), true)); ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <?php if(! empty( $post_thumbnail_url ) ):?>
                        <div class="img-box-outer heigh325">
                            <div class="img-box"
                                style="background-image: url(<?php echo esc_url( $post_thumbnail_url );?>);">
                            </div>
                        </div>
                        <?php endif;?>
                        
                    </div>
                </div>
                <?php endif;?>
                <?php $count++; endwhile;?>
                <!--End Single Social Activity Box-->
    
    
            </div>
        </div>
    </section>
    <!--End social activity Area-->     
        <?php }
		wp_reset_postdata();
	}

}
