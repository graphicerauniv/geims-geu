<?php namespace EDUCAMBPLUGIN\Element;

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
class Our_Mission extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_our_mission';
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
        return esc_html__( 'Our Mission', 'educamb' );
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
            'our_mission',
            [
                'label' => esc_html__( 'Our Mission', 'educamb' ),
            ]
        );
		$this->add_control(
			'bg_image',
			[
				'label' => __( 'BG Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
		    'info', 
		    [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('OUR MISSION', 'educamb')],
						['block_title' => esc_html__('OUR VISION', 'educamb')]
					],
				'fields' => 
				[
					[
						'name' => 'image',
						'label' => esc_html__('Image', 'educamb'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'icons',
						'label' => esc_html__('Enter The icons', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::SELECT2,
						'options'  => get_fontawesome_icons(),
					],
					[
						'name' => 'block_sub_title',
						'label' => esc_html__('Sub Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'block_title',
						'label' => esc_html__('Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'block_bold_text',
						'label' => esc_html__('Quote Description', 'educamb'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'block_text',
						'label' => esc_html__('Description', 'educamb'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'features_list',
						'label' => esc_html__('Feature List', 'educamb'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'block_btn_title',
						'label' => esc_html__('Button Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'block_btn_link',
						'label' => __( 'Button Url', 'educamb' ),
						 'type' => Controls_Manager::URL,
						 'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
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
    ?>
	
    <!--Start Mission Vision Area-->
    <section class="mission-vision-area">
        <?php if($settings['bg_image']['id']){ ?><div class="mission-vision-area-shape" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);"></div><?php } ?>
        <div class="container">
            <?php $count = 1; foreach($settings['info'] as $key => $item): ?>
            <?php if($count % 2) { ?>
            
            <div class="row">

                <div class="col-xl-6">
                    <div class="mission-vision-content-box">
                        <div class="sec-title-style2">
                            <div class="sub-title">
                                <h5><?php echo wp_kses($item['block_sub_title'], true);?></h5>
                            </div>
                            <h2><?php echo wp_kses($item['block_title'], true);?></h2>
                        </div>
                        
                        <div class="inner-content">
                            <?php if($item['block_bold_text']){ ?>
                            <div class="top-text">
                                <div class="quote-icon">
                                    <span class="icon-quote-2"></span>
                                </div>
                                <div class="text">
                                    <p><?php echo wp_kses($item['block_bold_text'], true);?></p>
                                </div>
                            </div>
                            <?php } ?>
                            
                            <div class="bottom-text">
                                <p><?php echo wp_kses($item['block_text'], true);?></p>
                            </div>
                            
							<?php if($item['block_btn_title']) { ?>
                            <div class="btns-box">
                                <a class="btn-one btn-one--style3" href="<?php echo esc_url($item['block_btn_link']['url']); ?>">
                                    <span class="txt"><?php echo wp_kses($item['block_btn_title'], true);?></span>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                
				<?php if($item['image']['id']) { ?>
                <div class="col-xl-6">
                    <div class="mission-vision-img-box">
                        <div class="mission-vision-img-box__inner">
                            <img src="<?php echo esc_url(wp_get_attachment_url($item['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                        </div>
                        <?php if($item['icons']){ ?>
                        <div class="icon">
                            <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
            </div>
            			
            <?php } else { ?>
            
            <div class="row">
                <div class="col-xl-12">
                    <div class="mission-vision-space-box">
                        <div class="dotted-line">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/dotted-line.png" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php if($item['image']['id']) { ?>
                <div class="col-xl-6 order-2">
                    <div class="mission-vision-img-box mission-vision-img-box--style2">
                        <div class="mission-vision-img-box__inner mission-vision-img-box__inner--style2">
                            <img src="<?php echo esc_url(wp_get_attachment_url($item['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                        </div>
                        <?php if($item['icons']){ ?>
                        <div class="icon">
                            <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
                <div class="col-xl-6 order-1">
                    <div class="mission-vision-content-box">
                        <div class="sec-title-style2">
                            <div class="sub-title">
                                <h5><?php echo wp_kses($item['block_sub_title'], true);?></h5>
                            </div>
                            <h2><?php echo wp_kses($item['block_title'], true);?></h2>
                        </div>
                        <div class="inner-content">
                            <div class="text1">
                                <p><?php echo wp_kses($item['block_text'], true);?></p>
                            </div>
                            <?php $features_list = $item['features_list'];
								if(!empty($features_list)){
								$features_list = explode("\n", ($features_list)); 
							?>
                            <ul>
                                <?php foreach($features_list as $features): ?>
                               	<li><div class="icon"><span class="icon-right-arrow-3"></span></div><p><?php echo wp_kses($features, true); ?></p></li>
                            	<?php endforeach; ?>
                            </ul>
                            <?php } ?>
                            <?php if($item['block_btn_title']) { ?>
                            <div class="btns-box">
                                <a class="btn-one btn-one--style3" href="<?php echo esc_url($item['block_btn_link']['url']); ?>">
                                    <span class="txt"><?php echo wp_kses($item['block_btn_title'], true);?></span>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            
			<?php } ?>
            <?php $count++; endforeach; ?>
        </div>
    </section>
    <!--End Mission Vision Area-->
    
                     
        <?php
    }
}
