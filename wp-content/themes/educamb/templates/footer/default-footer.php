<?php
/**
 * Footer Template  File
 *
 * @package EDUCAMB
 * @author  Template Path
 * @version 1.0
 */

$options = educamb_WSH()->option();

$footer_logo = $options->get( 'footer_logo' );
$footer_logo = educamb_set( $footer_logo, 'url', EDUCAMB_URI . 'assets/images/footer/footer-logo.png' );

$allowed_html = wp_kses_allowed_html( 'post' );

?>
    
    <div class="bottom-parallax">
        <!--Start footer area -->
        <footer class="footer-area">
            
            <!--Start Footer-->
            <div class="footer">
                <div class="container">
                    <div class="row text-right-rtl">
						<?php dynamic_sidebar( 'footer-sidebar' ); ?>
                    </div>
                </div>
            </div>
            <!--End Footer-->
			
            <div class="footer-bottom">
                <div class="container">
                    <div class="bottom-inner">
                        <?php if($options->get( 'footer_v1_copyright_text' )){?>
                        <div class="copyright">
                            <p><?php echo wp_kses( $options->get( 'footer_v1_copyright_text'), true ); ?></p>
                        </div>
                        <?php } ?>
                        <div class="footer-logo-style1">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <img src="<?php echo esc_url($footer_logo); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                            </a>
                        </div>
                        <?php if($options->get( 'footer_v1_menu' )){?>
                        <div class="footer-menu">
                            <ul>
                                <?php echo wp_kses( $options->get( 'footer_v1_menu'), true ); ?>
                            </ul>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </footer>
        <!--End footer area-->
    </div>
    
    <!--Scroll to top-->
    <button class="scroll-top scroll-to-target" data-target="html">
        <span class="icon-top"></span>
    </button>