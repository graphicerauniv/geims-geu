<?php
/**
 * Footer Template  File
 *
 * @package EDUCAMB
 * @author  Template Path
 * @version 1.0
 */

$options = educamb_WSH()->option();

$footer_logo6 = $options->get( 'footer_logo6' );
$footer_logo6 = educamb_set( $footer_logo6, 'url', EDUCAMB_URI . 'assets/images/footer/footer-logo-3.png' );

$allowed_html = wp_kses_allowed_html( 'post' );

?>
	
    <!--Start footer Style6 area -->
    <footer class="footer-style6-area">

        <!--Start Footer Top Style6-->
        <div class="footer-top-style6">
            <div class="container">
                <div class="row text-right-rtl">
                    <div class="col-xl-12">
                        <div class="footer-top-style6__inner">
                            <div class="footer-logo-style6">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <img src="<?php echo esc_url($footer_logo6); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                                </a>
                            </div>
                            <div class="footer-top-style6__inner-footer-menu">
                                <ul>
                                    <?php wp_nav_menu( array( 'theme_location' => 'footer_menu', 'container_id' => 'navbar-collapse-1',
										'container_class'=>'navbar-collapse collapse navbar-right',
										'menu_class'=>'nav navbar-nav',
										'fallback_cb'=>false,
										'items_wrap' => '%3$s',
										'container'=>false,
										'depth'=>'3',
										'walker'=> new Bootstrap_walker()
									) ); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Footer Top Style6-->

        <!--Start Footer Style6-->
        <div class="footer-style6">
            <div class="container">
                <div class="row text-center">
                    <!--Start Footer Style6 Contact Info Single Box -->
                    <?php if($options->get( 'footer_v6_phone_title') || $options->get( 'footer_v6_phone_text') ||$options->get( 'footer_v6_phone_no')) { ?>
                    <div class="col-xl-4">
                        <div class="single-contact-info-footer-style6">
                            <div class="icon">
                                <span class="flaticon-telephone"></span>
                            </div>
                            <div class="text">
                                <h3><?php echo wp_kses( $options->get( 'footer_v6_phone_title'), true ); ?></h3>
                                <p><?php echo wp_kses( $options->get( 'footer_v6_phone_text'), true ); ?></p>
                                <h4><a href="tel:<?php echo esc_attr( $options->get( 'footer_v6_phone_no'), true ); ?>"><?php echo wp_kses( $options->get( 'footer_v6_phone_no'), true ); ?></a></h4>
                            </div>
                        </div>
                    </div>
                    <!--End Footer Style6 Contact Info Single Box -->
                    <?php } ?>
                    <?php if($options->get( 'footer_v6_email_title') || $options->get( 'footer_v6_email_text') ||$options->get( 'footer_v6_email')) { ?>
                    <!--Start Footer Style6 Contact Info Single Box -->
                    <div class="col-xl-4">
                        <div class="single-contact-info-footer-style6">
                            <div class="icon">
                                <span class="flaticon-email"></span>
                            </div>
                            <div class="text">
                                <h3><?php echo wp_kses( $options->get( 'footer_v6_email_title'), true ); ?></h3>
                                <p><?php echo wp_kses( $options->get( 'footer_v6_email_text'), true ); ?></p>
                                <h4><a href="mailto:<?php echo esc_attr( $options->get( 'footer_v6_email'), true ); ?>"><?php echo wp_kses( $options->get( 'footer_v6_email'), true ); ?></a></h4>
                            </div>
                        </div>
                    </div>
                    <!--End Footer Style6 Contact Info Single Box -->
                    <?php } ?>
                    <?php if($options->get( 'footer_v6_faq_title') || $options->get( 'footer_v6_faq_text') ||$options->get( 'footer_v6_faq_text2')) { ?>
                    <!--Start Footer Style6 Contact Info Single Box -->
                    <div class="col-xl-4">
                        <div class="single-contact-info-footer-style6">
                            <div class="icon">
                                <span class="flaticon-search"></span>
                            </div>
                            <div class="text">
                                <h3><?php echo wp_kses( $options->get( 'footer_v6_faq_title'), true ); ?></h3>
                                <p><?php echo wp_kses( $options->get( 'footer_v6_faq_text'), true ); ?></p>
                                <h4><?php echo wp_kses( $options->get( 'footer_v6_faq_text2'), true ); ?></h4>
                            </div>
                        </div>
                    </div>
                    <!--End Footer Style6 Contact Info Single Box -->
                    <?php } ?>
                </div>
            </div>
        </div>
        <!--End Footer Style6-->

        <div class="footer-bottom-style6">
            <div class="container">
                <div class="bottom-inner">
                    <?php if($options->get( 'footer_v6_copyright_text' )){?>
                    <div class="copyright-style6">
                        <p>
                            <?php echo wp_kses( $options->get( 'footer_v6_copyright_text'), true ); ?>
                        </p>
                    </div>
                    <?php } ?>
                    <?php if($options->get( 'footer_v6_menu' )){?>
                    <div class="footer-menu-style6">
                        <ul>
                            <?php echo wp_kses( $options->get( 'footer_v6_menu'), true ); ?>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    </footer>
    <!--End footer Style5 area -->



    <button class="scroll-top scroll-top--style4 scroll-to-target" data-target="html">
        <span class="icon-top"></span>
    </button>