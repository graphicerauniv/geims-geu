<?php
/**
 * Footer Template  File
 *
 * @package EDUCAMB
 * @author  Template Path
 * @version 1.0
 */

$options = educamb_WSH()->option();

$allowed_html = wp_kses_allowed_html( 'post' );

?>
    
    <!--Start footer Style2 area -->
    <footer class="footer-style2-area">
        <?php if ( is_active_sidebar( 'footer-sidebar2' ) ) { ?>
        <!--Start Footer-->
        <div class="footer-top-style2">
            <div class="container">
                <div class="row text-right-rtl">
					<?php dynamic_sidebar( 'footer-sidebar2' ); ?>
                </div>
            </div>
        </div>
        <!--End Footer-->
		<?php } ?>
        
        <div class="footer-bottom-style2">
            <div class="container">
                <?php if($options->get( 'footer_v2_copyright_text' )){?>
                <div class="copyright-style2">
                    <p>
                        <span><?php echo wp_kses( $options->get( 'footer_v2_copyright_text'), true ); ?></span>
                    </p>
                </div>
                <?php } ?>
            </div>

            <div class="container">
                <div class="bottom-inner">
                    <?php if($options->get( 'footer_v2_menu' )){?>
                    <div class="footer-menu-style2">
                        <ul>
                            <?php echo wp_kses( $options->get( 'footer_v2_menu'), true ); ?>
                        </ul>
                    </div>
					<?php } ?>
                    <div class="back-top-style2">
                        <button class="scroll-top-style2 scroll-to-target" data-target="html">
                            <?php esc_html_e('Back to Top', 'educamb'); ?>
                            <span class="icon-top"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!--End footer Style2 area -->