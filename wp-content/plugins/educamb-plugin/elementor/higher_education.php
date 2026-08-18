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
class Higher_Education extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'educamb_higher_education';
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
        return esc_html__( 'Higher Education', 'educamb' );
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
            'higher_education',
            [
                'label' => esc_html__( 'Higher Education', 'educamb' ),
            ]
        );
		$this->add_control(
			'pattern_image',
			[
				'label' => __( 'Pattern Image', 'educamb' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
			'author_name',
			[
				'label'       => __( 'Author Name', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Author', 'educamb' ),
			]
		);
		$this->add_control(
			'author_designation',
			[
				'label'       => __( 'Designation', 'educamb' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Designation', 'educamb' ),
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
					'two' => esc_html__( 'Choose Style Two', 'educamb' ),
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
    ?>
	
    <!--Start Academics Overview Style1 Area-->
    <section class="academics-overview-style1-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="academics-overview-style1-content <?php if($settings['style_two'] == 'two') echo 'academics-overview-style1-content--in-style2'; else echo ''; ?>">
                        <?php if($settings['pattern_image']['id']){ ?>
                        <div class="academics-overview-style1-content__shape"
                            style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['pattern_image']['id'])); ?>);">
                        </div>
                        <?php } ?>
                        <div class="text-box">
                            <?php if($settings['title']) { ?>
                            <div class="sec-title">
                                <h2><?php echo wp_kses($settings['title'], true);?></h2>
                            </div>
                            <?php } ?>
                            <?php if($settings['text']) { ?>
                            <div class="text">
                                <p><?php echo wp_kses($settings['text'], true);?></p>
                            </div>
                            <?php } ?>
                            <?php if($settings['author_name'] || $settings['author_designation']) { ?>
                            <div class="authorized-person">
                                <?php if($settings['author_name']) { ?><h3><?php echo wp_kses($settings['author_name'], true);?></h3><?php } ?>
                                <?php if($settings['author_designation']) { ?><p><?php echo wp_kses($settings['author_designation'], true);?></p><?php } ?>
                            </div>
                            <?php } ?>
                        </div>
                        <?php if($settings['image']['id']){ ?>
                        <div class="academics-overview-style1-img-box"
                            style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>);">
                        </div>
						<?php } ?>
                        <div class="academics-overview-search-box">
                            <div class="top">
                                <div class="left">
                                    <h3>Search Your Program:</h3>
                                </div>
                                <div class="right">
                                    <ul>
                                        <li>
                                            <div class="single-box">
                                                <input type="radio" name="programs" id="undergraduate" checked>
                                                <label for="undergraduate"><span></span>
                                                    Undergraduate Programs
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="single-box">
                                                <input type="radio" name="programs" id="graduate">
                                                <label for="graduate"><span></span>
                                                    Graduate Programs
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="programs-search-box">
                                <form class="search-form" action="#">
                                    <input placeholder="Search ..." type="text">
                                    <button type="submit">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        Search
                                    </button>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Academics Overview Style1 Area-->      
        
    <?php
    }
}
