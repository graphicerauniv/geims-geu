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
	
    <!--Start footer Style8 area -->
    <footer class="footer-style8-area">
		<?php if ( is_active_sidebar( 'footer-sidebar8' ) ) { ?>
        <!--Start Footer-->
        <div class="footer-top-style8">
            <div class="container">
                <div class="row text-right-rtl">
					<?php dynamic_sidebar( 'footer-sidebar8' ); ?>
                </div>
            </div>
        </div>
        <!--End Footer-->
		<?php } ?>
        <div class="footer-bottom-style8">
            <div class="container">
                <div class="bottom-inner">
                    <?php if($options->get( 'footer_v8_copyright_text' )){?>
                    <div class="copyright">
                        <p><?php echo wp_kses( $options->get( 'footer_v8_copyright_text'), true ); ?></p>
                    </div>
					<?php } ?>
					<?php if($options->get( 'footer_v8_menu' )){?>
                    <div class="footer-menu-style8">
                        <ul>
                            <?php echo wp_kses( $options->get( 'footer_v8_menu'), true ); ?>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    </footer>
    <!--End footer Style8 area -->


    <button class="scroll-top scroll-to-target" data-target="html">
        <span class="icon-top"></span>
    </button>