<?php
/**
 * Footer Template  File
 *
 * @package EDUCAMB
 * @author  Template Path
 * @version 1.0
 */

$options = educamb_WSH()->option();

$footer_logo7 = $options->get( 'footer_logo7' );
$footer_logo7 = educamb_set( $footer_logo7, 'url', EDUCAMB_URI . 'assets/images/footer/footer-logo-4.png' );

$allowed_html = wp_kses_allowed_html( 'post' );

?>
	
    <!--Start footer Style7 area -->
    <footer class="footer-style7-area">
        <?php if ( is_active_sidebar( 'footer-sidebar7' ) ) { ?>
        <!--Start Footer-->
        <div class="footer-top-style7">
            <div class="container">
                <div class="row text-right-rtl">
					<?php dynamic_sidebar( 'footer-sidebar7' ); ?>
                </div>
            </div>
        </div>
        <!--End Footer-->
		<?php } ?>
        <div class="footer-bottom-style7">
            <div class="container">
                <div class="bottom-inner">
                    <?php if($options->get( 'footer_v7_copyright_text' )){?>
                    <div class="copyright">
                        <p><?php echo wp_kses( $options->get( 'footer_v7_copyright_text'), true ); ?></p>
                    </div>
                    <?php } ?>
                    <div class="footer-logo-style7">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <img src="<?php echo esc_url($footer_logo7); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                        </a>
                    </div>
                    <?php if($options->get( 'footer_v7_menu' )){?>
                    <div class="footer-menu-style7">
                        <ul>
                            <?php echo wp_kses( $options->get( 'footer_v7_menu'), true ); ?>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    </footer>
    <!--End footer Style7 area -->

    <button class="scroll-top scroll-to-target" data-target="html">
        <span class="icon-top"></span>
    </button>