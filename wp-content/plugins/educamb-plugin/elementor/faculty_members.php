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
class Faculty_Members extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'educamb_faculty_members';
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
		return esc_html__( 'Faculty Members', 'educamb' );
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
			'faculty_members',
			[
				'label' => esc_html__( 'Faculty Members', 'educamb' ),
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
		    'info', 
		    [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Item1', 'educamb')],
						['block_title' => esc_html__('Item2', 'educamb')],
					],
				'fields' => 
				[
					[
						'name' => 'image',
						'label' => __( 'Staff Image', 'eminent' ),
						 'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'block_title',
						'label' => esc_html__('Title', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'designation',
						'label' => esc_html__('Designation', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'faculty',
						'label' => esc_html__('Faculty', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'educamb')
					],
					[
						'name' => 'email',
						'label' => esc_html__('Email Address', 'educamb'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'educamb')
					],
				],
				'title_field' => '{{block_title}}',
			 ]
        );
		$this->add_control(
			'bg_color_style',
			 [
				'label'   => esc_html__( 'Choose Different BG Color Style', 'educamb' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'bg_one',
				'options' => array(
					'bg_one' => esc_html__( 'Choose Style One', 'educamb' ),
					'bg_two' => esc_html__( 'Choose Style Two', 'educamb' ),
				),
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
    
    <!--Start Faculty Members Area-->
    <section id="faculty" class="faculty-members-area <?php if($settings['bg_color_style'] == 'bg_two') echo 'gray-bg'; else echo ''; ?>">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="faculty-members-title-box">
                        <div class="sec-title">
                            <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                            <?php if($settings['text']) { ?>
                            <div class="sub-title">
                                <p><?php echo wp_kses($settings['text'], true);?></p>
                            </div>
                            <?php } ?>
                        </div>
                        <?php if($settings['btn_title']){ ?>
                        <div class="btns-box">
                            <a class="btn-one btn-one--style2" href="<?php echo esc_url($settings['btn_link']['url']); ?>">
                                <span class="txt"><?php echo wp_kses($settings['btn_title'], true);?></span>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="faculty-members-content-box">
                        <?php foreach($settings['info'] as $key => $item): ?>
                        <!--Start Faculty Members Single Box-->
                        <div class="faculty-members-single-box">
                            <?php if($item['image']['id']){ ?>
                            <div class="img-box">
                                <img src="<?php echo esc_url(wp_get_attachment_url($item['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                            </div>
                            <?php } ?>
                            <div class="text-box">
                                <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                <p><?php echo wp_kses($item['designation'], true);?></p>
                                <p class="color-thm-base"><?php echo wp_kses($item['faculty'], true);?></p>
                                <?php if($item['email']) { ?>
                                <div class="mail-info">
                                    <div class="icon">
                                        <span class="icon-send"></span>
                                    </div>
                                    <a href="mailto:<?php echo esc_attr($item['email']); ?>"><?php echo wp_kses($item['email'], true);?></a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!--End Faculty Members Single Box-->
						<?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Faculty Members Area-->
              	
		<?php 
	}
}